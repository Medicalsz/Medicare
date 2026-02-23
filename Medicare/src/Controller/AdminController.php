<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Repository\DonRepository;
use App\Enum\TypeDon;
use App\Enum\StatutDon;
use App\Entity\Don;
use App\Entity\Cause;
use App\Entity\ImageCause;
use App\Enum\StatutCause;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Service\GeminiService;

#[Route('/admin', name: 'app_admin_')]
class AdminController extends AbstractController
{
    #[Route('/dashboard', name: 'dashboard')]
    public function dashboard(): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        
        return $this->render('admin/dashboard.html.twig');
    }

    #[Route('/donations/analyze-photo', name: 'analyze_photo', methods: ['POST'])]
    public function analyzePhoto(Request $request, GeminiService $geminiService): JsonResponse
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');

        $data = json_decode($request->getContent(), true);
        $photoUrl = $data['photoUrl'] ?? null;

        if (!$photoUrl) {
            return new JsonResponse(['error' => 'URL de la photo manquante.'], 400);
        }

        // Nettoyer l'URL pour obtenir le chemin relatif du fichier
        // Ex: /uploads/donations/photo.jpg -> public/uploads/donations/photo.jpg
        $projectDir = $this->getParameter('kernel.project_dir');
        $relativePath = parse_url($photoUrl, PHP_URL_PATH);
        
        // Si l'app est dans un sous-dossier ou via un lien symbolique, il faut adapter.
        // On suppose ici que l'URL contient 'uploads/donations/'
        $parts = explode('/uploads/donations/', $relativePath);
        if (count($parts) < 2) {
            return new JsonResponse(['error' => 'Chemin de fichier invalide.'], 400);
        }
        
        $filename = $parts[1];
        $filePath = $projectDir . '/public/uploads/donations/' . $filename;

        if (!file_exists($filePath)) {
            return new JsonResponse(['error' => 'Fichier introuvable sur le serveur.'], 404);
        }

        $result = $geminiService->analyzeObjectCondition($filePath);

        if (isset($result['error'])) {
            return new JsonResponse(['error' => $result['error']], 500);
        }

        return new JsonResponse(['condition' => $result['condition']]);
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
    public function addCause(Request $request, EntityManagerInterface $entityManager, SluggerInterface $slugger): Response
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

        $finalImageUrl = null;

        if ($imageFile) {
            $originalFilename = pathinfo($imageFile->getClientOriginalName(), PATHINFO_FILENAME);
            $safeFilename = $slugger->slug($originalFilename);
            $newFilename = $safeFilename . '-' . uniqid() . '.' . $imageFile->guessExtension();

            try {
                $imageFile->move(
                    $this->getParameter('kernel.project_dir') . '/public/uploads/causes',
                    $newFilename
                );
                $finalImageUrl = '/uploads/causes/' . $newFilename;
            } catch (FileException $e) {
                $this->addFlash('error', 'Erreur lors de l\'upload de l\'image.');
                return $this->redirectToRoute('app_admin_donations');
            }
        } elseif ($imageUrl) {
            $finalImageUrl = $imageUrl;
        }

        if ($finalImageUrl) {
            $imageCause = new ImageCause();
            $imageCause->setUrlImage($finalImageUrl);
            $imageCause->setCause($cause);
            $entityManager->persist($imageCause);
        }

        $entityManager->persist($cause);
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
}
