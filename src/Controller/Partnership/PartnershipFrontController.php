<?php

namespace App\Controller\Partnership;

use App\Repository\Partnership\PartnerRepository;
use App\Repository\Partnership\CollaborationRepository;
use App\Enum\Partnership\StatutPartenaire;
use App\Enum\Partnership\StatutCollaboration;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class PartnershipFrontController extends AbstractController
{
    #[Route('/partners', name: 'app_front_partners')]
    public function partners(PartnerRepository $partnerRepository, Request $request): Response
    {
        $searchTerm = $request->query->get('search');
        $type = $request->query->get('type');

        $partners = $partnerRepository->findActiveWithFilters($searchTerm, $type);

        return $this->render('partnership/partners.html.twig', [
            'partners' => $partners,
            'searchTerm' => $searchTerm,
            'selectedType' => $type,
        ]);
    }

    #[Route('/collaborations', name: 'app_front_collaborations')]
    public function collaborations(CollaborationRepository $collaborationRepository, Request $request): Response
    {
        $searchTerm = $request->query->get('search');
        $status = $request->query->get('status');

        $collaborations = $collaborationRepository->findActiveWithFilters($searchTerm, $status);

        return $this->render('partnership/collaborations.html.twig', [
            'collaborations' => $collaborations,
            'searchTerm' => $searchTerm,
            'selectedStatus' => $status,
        ]);
    }

    #[Route('/collaborations/{id}', name: 'app_front_collaboration_show')]
    public function showCollaboration(int $id, CollaborationRepository $collaborationRepository): Response
    {
        $collaboration = $collaborationRepository->find($id);

        if (!$collaboration) {
            throw $this->createNotFoundException('Collaboration introuvable.');
        }

        return $this->render('partnership/show_collaboration.html.twig', [
            'collaboration' => $collaboration,
        ]);
    }
}