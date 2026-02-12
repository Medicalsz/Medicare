<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Repository\DonRepository;
use App\Enum\TypeDon;
use App\Enum\StatutDon;
use App\Entity\Don;
use Doctrine\ORM\EntityManagerInterface;

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
    public function donations(DonRepository $donRepository): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');

        $donsArgent = $donRepository->findBy(['typeDon' => TypeDon::ARGENT], ['dateDon' => 'DESC']);
        $donsMateriel = $donRepository->findBy(['typeDon' => TypeDon::MATERIEL], ['dateDon' => 'DESC']);

        // Calcul des statistiques par cause pour le camembert
        $statsCauses = [];
        $totalArgent = 0;
        foreach ($donsArgent as $don) {
            $causeTitre = $don->getCause()->getTitre();
            if (!isset($statsCauses[$causeTitre])) {
                $statsCauses[$causeTitre] = 0;
            }
            $statsCauses[$causeTitre] += $don->getMontant();
            $totalArgent += $don->getMontant();
        }

        return $this->render('admin/donations.html.twig', [
            'donsArgent' => $donsArgent,
            'donsMateriel' => $donsMateriel,
            'statsCauses' => $statsCauses,
            'totalArgent' => $totalArgent,
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
}
