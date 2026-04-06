<?php

namespace App\Controller\Core;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

use App\Repository\Partnership\PartnerRepository;
use App\Repository\Partnership\CollaborationRepository;

#[Route('/admin', name: 'app_admin_')]
#[IsGranted('ROLE_ADMIN')]
class AdminController extends AbstractController
{
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
        CollaborationRepository $collaborationRepository
    ): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');

        $totalPartners = $partnerRepository->count([]);
        $partnersByType = [];
        $allPartners = $partnerRepository->findAll();
        foreach ($allPartners as $p) {
            $type = $p->getTypePartenaire()->value;
            $partnersByType[$type] = ($partnersByType[$type] ?? 0) + 1;
        }

        $totalCollabs = $collaborationRepository->count([]);
        $collabsByStatus = [];
        $allCollabs = $collaborationRepository->findAll();
        foreach ($allCollabs as $c) {
            $status = $c->getStatut()->value;
            $collabsByStatus[$status] = ($collabsByStatus[$status] ?? 0) + 1;
        }

        $topPartners = [];
        foreach ($allPartners as $p) {
            $topPartners[$p->getName()] = count($p->getCollaborations());
        }
        arsort($topPartners);
        $topPartners = array_slice($topPartners, 0, 5);

        return $this->render('admin/statistiques.html.twig', [
            'totalPartners' => $totalPartners,
            'partnersByTypeLabels' => array_keys($partnersByType),
            'partnersByTypeData' => array_values($partnersByType),
            'totalCollabs' => $totalCollabs,
            'collabsByStatusLabels' => array_keys($collabsByStatus),
            'collabsByStatusData' => array_values($collabsByStatus),
            'collabsByStatus' => $collabsByStatus,
            'topPartners' => $topPartners,
        ]);
    }

    #[Route('/settings', name: 'settings')]
    public function settings(): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        return $this->render('admin/settings.html.twig');
    }
}
