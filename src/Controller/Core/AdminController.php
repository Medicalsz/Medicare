<?php

namespace App\Controller\Core;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

use App\Repository\Donation\DonRepository;
use App\Repository\Medical\PatientRepository;
use App\Repository\Medical\RendezVousRepository;
use App\Repository\Partnership\PartnerRepository;
use App\Repository\Partnership\CollaborationRepository;
use App\Enum\Donation\TypeDon;
use App\Enum\Donation\StatutDon;
use App\Entity\Donation\Don;
use App\Entity\Donation\Cause;
use App\Entity\Donation\ImageCause;
use App\Enum\Donation\StatutCause;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Component\HttpFoundation\File\Exception\FileException;

#[Route('/admin', name: 'app_admin_')]
class AdminController extends AbstractController
{
    #[Route('/dashboard', name: 'dashboard')]
    public function dashboard(): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        
        return $this->render('admin/dashboard.html.twig');
    }

    #[Route('/donations', name: 'donations')]
    public function donations(DonRepository $donRepository, EntityManagerInterface $entityManager): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');

        $donsArgent = $donRepository->findBy(['typeDon' => TypeDon::ARGENT], ['dateDon' => 'DESC']);
        $donsMateriel = $donRepository->findBy(['typeDon' => TypeDon::MATERIEL], ['dateDon' => 'DESC']);
        
        $allCauses = $entityManager->getRepository(Cause::class)->findAll();
        
        // Calcul des statistiques par cause
        $statsCauses = [];
        $totalArgent = 0;
        
        // Initialiser toutes les causes avec 0 pour la liste complète
        $causesCollecte = [];
        foreach ($allCauses as $cause) {
            $causesCollecte[$cause->getId()] = [
                'entity' => $cause,
                'montant' => 0
            ];
        }

        foreach ($donsArgent as $don) {
            $cause = $don->getCause();
            $causeTitre = $cause->getTitre();
            
            if (!isset($statsCauses[$causeTitre])) {
                $statsCauses[$causeTitre] = 0;
            }
            $statsCauses[$causeTitre] += $don->getMontant();
            $totalArgent += $don->getMontant();
            
            // Mise à jour pour le modal de gestion des causes
            if (isset($causesCollecte[$cause->getId()])) {
                $causesCollecte[$cause->getId()]['montant'] += $don->getMontant();
            }
        }

        return $this->render('admin/donations.html.twig', [
            'donsArgent' => $donsArgent,
            'donsMateriel' => $donsMateriel,
            'statsCauses' => $statsCauses,
            'totalArgent' => $totalArgent,
            'allCauses' => $causesCollecte,
        ]);
    }

    #[Route('/donations/confirm/{id}', name: 'don_confirm', methods: ['POST'])]
    public function confirmDon(int $id, DonRepository $donRepository, EntityManagerInterface $entityManager): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');

        $don = $donRepository->find($id);

        if (!$don) {
            $this->addFlash('error', 'Le don demandé n\'existe pas.');
            return $this->redirectToRoute('app_admin_donations');
        }

        $don->setStatutDon(StatutDon::CONFIRME);
        $entityManager->flush();

        $this->addFlash('success', 'Le don a été confirmé avec succès.');

        return $this->redirectToRoute('app_admin_donations');
    }

    #[Route('/donations/delete/{id}', name: 'don_delete', methods: ['POST'])]
    public function deleteDon(int $id, DonRepository $donRepository, EntityManagerInterface $entityManager): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');

        $don = $donRepository->find($id);

        if (!$don) {
            $this->addFlash('error', 'Le don demandé n\'existe pas.');
            return $this->redirectToRoute('app_admin_donations');
        }

        // Suppression de la base de données (don considéré comme livré)
        $entityManager->remove($don);
        $entityManager->flush();

        $this->addFlash('success', 'Le don a été marqué comme livré et supprimé avec succès.');

        return $this->redirectToRoute('app_admin_donations');
    }

    #[Route('/cause/add', name: 'cause_add', methods: ['POST'])]
    public function addCause(Request $request, EntityManagerInterface $entityManager): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');

        $titre = $request->request->get('titre');
        $description = $request->request->get('description');
        $objectif = $request->request->get('objectif');
        $imageUrl = $request->request->get('imageUrl');
        $imageFile = $request->files->get('imageFile');

        $cause = new Cause();
        $cause->setTitre($titre);
        $cause->setDescription($description);
        $cause->setObjectifMontant((float)$objectif);
        $cause->setDateDebut(new \DateTimeImmutable());
        $cause->setStatut(StatutCause::ACTIVE);

        $entityManager->persist($cause);

        // Handle Image via VichUploader
        if ($imageFile) {
            $imageCause = new ImageCause();
            $imageCause->setImageFile($imageFile);
            $imageCause->setCause($cause);
            $entityManager->persist($imageCause);
        } elseif ($imageUrl) {
            $imageCause = new ImageCause();
            $imageCause->setUrlImage($imageUrl);
            $imageCause->setCause($cause);
            $entityManager->persist($imageCause);
        }

        $entityManager->flush();

        $this->addFlash('success', 'La cause a été ajoutée avec succès.');

        return $this->redirectToRoute('app_admin_donations');
    }

    #[Route('/cause/delete/{id}', name: 'cause_delete', methods: ['POST'])]
    public function deleteCause(int $id, EntityManagerInterface $entityManager): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');

        $cause = $entityManager->getRepository(Cause::class)->find($id);

        if (!$cause) {
            $this->addFlash('error', 'La cause demandée n\'existe pas.');
            return $this->redirectToRoute('app_admin_donations');
        }

        // Vérifier si la cause a des dons associés
        if (!$cause->getDons()->isEmpty()) {
            $this->addFlash('error', 'Impossible de supprimer cette cause car elle contient déjà des dons.');
            return $this->redirectToRoute('app_admin_donations');
        }

        $entityManager->remove($cause);
        $entityManager->flush();

        $this->addFlash('success', 'La cause a été supprimée avec succès.');

        return $this->redirectToRoute('app_admin_donations');
    }

    #[Route('/users', name: 'users')]
    public function users(): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        return $this->render('admin/users.html.twig');
    }

    #[Route('/patients', name: 'patients')]
    public function patients(): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        return $this->render('admin/patients.html.twig');
    }

    #[Route('/medecins', name: 'medecins')]
    public function medecins(): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        return $this->render('admin/medecins.html.twig');
    }

    #[Route('/rendezvous', name: 'rendezvous')]
    public function rendezvous(): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        return $this->render('admin/rendezvous.html.twig');
    }

    #[Route('/statistiques', name: 'statistiques')]
    public function statistiques(
        PartnerRepository $partnerRepository, 
        CollaborationRepository $collaborationRepository,
        PatientRepository $patientRepository,
        RendezVousRepository $rendezVousRepository
    ): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');

        // Statistiques Partenaires
        $totalPartners = $partnerRepository->count([]);
        $partnersByType = [];
        $allPartners = $partnerRepository->findAll();
        foreach ($allPartners as $p) {
            $type = $p->getTypePartenaire()->value;
            $partnersByType[$type] = ($partnersByType[$type] ?? 0) + 1;
        }

        // Statistiques Collaborations
        $totalCollabs = $collaborationRepository->count([]);
        $collabsByStatus = [];
        $allCollabs = $collaborationRepository->findAll();
        foreach ($allCollabs as $c) {
            $status = $c->getStatut()->value;
            $collabsByStatus[$status] = ($collabsByStatus[$status] ?? 0) + 1;
        }

        // Top partenaires (par nombre de collaborations)
        $topPartners = [];
        foreach ($allPartners as $p) {
            $topPartners[$p->getName()] = count($p->getCollaborations());
        }
        arsort($topPartners);
        $topPartners = array_slice($topPartners, 0, 5);

        // Statistiques Rendez-vous
        $totalRendezvous = $rendezVousRepository->count([]);
        $rendezvousByStatus = [];
        $allRendezvous = $rendezVousRepository->findAll();
        foreach ($allRendezvous as $rdv) {
            $status = $rdv->getStatut()->value;
            $rendezvousByStatus[$status] = ($rendezvousByStatus[$status] ?? 0) + 1;
        }

        // Statistiques Patients
        $totalPatients = $patientRepository->count([]);

        return $this->render('admin/statistiques.html.twig', [
            'totalPartners' => $totalPartners,
            'partnersByTypeLabels' => array_keys($partnersByType),
            'partnersByTypeData' => array_values($partnersByType),
            'totalCollabs' => $totalCollabs,
            'collabsByStatusLabels' => array_keys($collabsByStatus),
            'collabsByStatusData' => array_values($collabsByStatus),
            'collabsByStatus' => $collabsByStatus,
            'topPartners' => $topPartners,
            'totalPatients' => $totalPatients,
            'totalRendezvous' => $totalRendezvous,
            'rendezvousByStatusLabels' => array_keys($rendezvousByStatus),
            'rendezvousByStatusData' => array_values($rendezvousByStatus),
        ]);
    }

    #[Route('/settings', name: 'settings')]
    public function settings(): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        return $this->render('admin/settings.html.twig');
    }
}