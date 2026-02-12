<?php

namespace App\Controller;

use App\Repository\PatientRepository;
use App\Repository\MedecinRepository;
use App\Repository\RendezVousRepository;
use App\Entity\User;
use App\Entity\Medecin;
use App\Entity\DemandeMedecin;
use App\Enum\StatutDemandeMedecin;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin', name: 'app_admin_')]
class AdminController extends AbstractController
{
    #[Route('/dashboard', name: 'dashboard')]
    public function dashboard(): Response
    {
        // Vérifier que l'utilisateur est admin (à implémenter avec les rôles)
        // $this->denyAccessUnlessGranted('ROLE_ADMIN');
        
        return $this->render('admin/dashboard.html.twig');
    }

    #[Route('/collaborations', name: 'collaborations')]
    public function collaborations(): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        
        return $this->render('collaboration/list.html.twig');
    }

    #[Route('/utilisateurs', name: 'utilisateurs')]
    public function utilisateurs(EntityManagerInterface $em): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        
        $users = $em->getRepository(\App\Entity\User::class)->findAll();
        
        return $this->render('admin/utilisateurs.html.twig', [
            'users' => $users,
        ]);
    }

    #[Route('/utilisateurs/{id}/edit', name: 'utilisateurs_edit')]
    public function utilisateursEdit(Request $request, int $id, EntityManagerInterface $em): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');

        $user = $em->getRepository(User::class)->find($id);
        
        if (!$user) {
            throw $this->createNotFoundException('Utilisateur non trouvé');
        }

        if ($request->isMethod('POST')) {
            $user->setNom($request->request->get('nom'));
            $user->setPrenom($request->request->get('prenom'));
            $user->setEmail($request->request->get('email'));
            $user->setNumero($request->request->get('numero'));
            $user->setAdresse($request->request->get('adresse'));
            
            // Gestion des rôles
            $roles = $request->request->all('roles') ?? [];
            if (!empty($roles)) {
                $user->setRoles($roles);
            }
            
            $em->flush();
            
            $this->addFlash('success', 'Utilisateur modifié avec succès !');
            return $this->redirectToRoute('app_admin_utilisateurs');
        }

        return $this->render('admin/utilisateurs_edit.html.twig', [
            'user' => $user,
        ]);
    }

    #[Route('/utilisateurs/{id}/delete', name: 'utilisateurs_delete', methods: ['POST'])]
    public function utilisateursDelete(int $id, EntityManagerInterface $em): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');

        $user = $em->getRepository(User::class)->find($id);
        
        if (!$user) {
            throw $this->createNotFoundException('Utilisateur non trouvé');
        }

        $em->remove($user);
        $em->flush();

        $this->addFlash('success', 'Utilisateur supprimé avec succès !');
        return $this->redirectToRoute('app_admin_utilisateurs');
    }

    #[Route('/patients', name: 'patients')]
    public function patients(PatientRepository $patientRepository): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        
        $patients = $patientRepository->findAll();
        
        return $this->render('admin/patients.html.twig', [
            'patients' => $patients,
        ]);
    }

    #[Route('/medecins', name: 'medecins')]
    public function medecins(MedecinRepository $medecinRepository): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        
        $medecins = $medecinRepository->findAll();
        
        return $this->render('admin/medecins.html.twig', [
            'medecins' => $medecins,
        ]);
    }

    #[Route('/rendez-vous', name: 'rendezvous')]
    public function rendezvous(RendezVousRepository $rendezVousRepository): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        
        $rendezVous = $rendezVousRepository->findAll();
        
        return $this->render('admin/rendezvous.html.twig', [
            'rendezVous' => $rendezVous,
        ]);
    }
    #[Route('/demandes-medecin', name: 'demandes_medecin')]
    public function demandesMedecin(EntityManagerInterface $em): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        
        $demandes = $em->getRepository(DemandeMedecin::class)->findAll();
        
        return $this->render('admin/demandes_medecin.html.twig', [
            'demandes' => $demandes,
        ]);
    }

    #[Route('/demandes-medecin/{id}/accepter', name: 'demandes_medecin_accepter', methods: ['POST'])]
    public function accepterDemande(int $id, EntityManagerInterface $em): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        
        $demande = $em->getRepository(DemandeMedecin::class)->find($id);
        
        if (!$demande) {
            throw $this->createNotFoundException('Demande non trouvée');
        }
        
        // Créer le médecin
        $medecin = new Medecin();
        $medecin->setUser($demande->getUser());
        $medecin->setSpecialite($demande->getSpecialite());
        $medecin->setCabinet($demande->getCabinet());
        
        // Extraire l'adresse et le numéro
        $adresseComplete = $demande->getAdresse();
        $parts = explode(' | Tel: ', $adresseComplete);
        $medecin->setAdresseCabinet($parts[0] ?? '');
        $medecin->setNumeroCabinet($parts[1] ?? '');
        
        $medecin->setBio($demande->getBio());
        
        // Convertir les documents
        $certificats = $demande->getCertificats();
        if ($certificats) {
            $medecin->setDocuments(explode(',', $certificats));
        }
        
        // Changer le rôle : retirer ROLE_PATIENT et ajouter ROLE_MEDECIN
        $user = $demande->getUser();
        $roles = ['ROLE_USER', 'ROLE_MEDECIN']; // Soit patient, soit médecin, pas les deux
        $user->setRoles($roles);
        
        // Mettre à jour la demande
        $demande->setStatut(StatutDemandeMedecin::ACCEPTEE);
        $demande->setDateTraitement(new \DateTime());
        
        $em->persist($medecin);
        $em->flush();
        
        $this->addFlash('success', 'Demande acceptée avec succès !');
        return $this->redirectToRoute('app_admin_demandes_medecin');
    }

    #[Route('/demandes-medecin/{id}/refuser', name: 'demandes_medecin_refuser', methods: ['POST'])]
    public function refuserDemande(Request $request, int $id, EntityManagerInterface $em): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        
        $demande = $em->getRepository(DemandeMedecin::class)->find($id);
        
        if (!$demande) {
            throw $this->createNotFoundException('Demande non trouvée');
        }
        
        $raison = $request->request->get('raison', 'Demande refusée');
        
        $demande->setStatut(StatutDemandeMedecin::REJETEE);
        $demande->setDateTraitement(new \DateTime());
        $demande->setRaisonRejet($raison);
        
        $em->flush();
        
        $this->addFlash('success', 'Demande refusée.');
        return $this->redirectToRoute('app_admin_demandes_medecin');
    }
}
