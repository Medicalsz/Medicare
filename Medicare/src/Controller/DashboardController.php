<?php

namespace App\Controller;

use App\Repository\ForumTopicRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractController
{
    #[Route('/dashboard', name: 'app_dashboard')]
    public function index(ForumTopicRepository $forumTopicRepository): Response
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        // Récupérer tous les topics
        $topics = $forumTopicRepository->findAll();

        return $this->render('dashboard/index.html.twig', [
            'topics' => $topics,
        ]);
    }

    #[Route('/profile', name: 'app_profile')]
    public function profile(): Response
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        return new Response('Page profil - À développer');
    }

    #[Route('/settings', name: 'app_settings')]
    public function settings(): Response
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        return new Response('Page paramètres - À développer');
    }

    #[Route('/appointments', name: 'app_appointments')]
    public function appointments(): Response
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        return new Response('Page rendez-vous - À développer');
    }

    #[Route('/cabinets', name: 'app_cabinets')]
    public function cabinets(): Response
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        return new Response('Page cabinets - À développer');
    }

    #[Route('/consultations', name: 'app_consultations')]
    public function consultations(): Response
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        return new Response('Page consultations - À développer');
    }

    #[Route('/demande-medecin', name: 'app_demande_medecin')]
    public function demandeMedecin(): Response
    {
        $this->denyAccessUnlessGranted('ROLE_PATIENT');

        return new Response('Formulaire demande médecin - À développer');
    }
}
