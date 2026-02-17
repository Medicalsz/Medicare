<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractController
{
    #[Route('/dashboard', name: 'app_dashboard')]
    public function index(): Response
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        return $this->render('dashboard/index.html.twig');
    }

    #[Route('/profile', name: 'app_profile')]
    public function profile(): Response
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        return new Response('Page profil - A developper');
    }

    #[Route('/settings', name: 'app_settings')]
    public function settings(): Response
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        return new Response('Page parametres - A developper');
    }

    #[Route('/appointments', name: 'app_appointments')]
    public function appointments(): Response
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        return new Response('Page rendez-vous - A developper');
    }

    #[Route('/cabinets', name: 'app_cabinets')]
    public function cabinets(): Response
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        return new Response('Page cabinets - A developper');
    }

    #[Route('/consultations', name: 'app_consultations')]
    public function consultations(): Response
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        return new Response('Page consultations - A developper');
    }

    #[Route('/demande-medecin', name: 'app_demande_medecin')]
    public function demandeMedecin(): Response
    {
        $this->denyAccessUnlessGranted('ROLE_PATIENT');

        return new Response('Formulaire demande medecin - A developper');
    }
}
