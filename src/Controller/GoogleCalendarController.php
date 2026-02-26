<?php

namespace App\Controller;

use App\Service\GoogleCalendarService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/google-calendar')]
class GoogleCalendarController extends AbstractController
{
    #[Route('/connect', name: 'app_google_calendar_connect', methods: ['GET'])]
    public function connect(GoogleCalendarService $googleCalendarService): Response
    {
        $this->denyAccessUnlessGranted('ROLE_PATIENT');

        if (!$googleCalendarService->isConfigured()) {
            $this->addFlash('error', 'Google Calendar n est pas configure. Verifiez vos variables .env.local.');
            return $this->redirectToRoute('app_prendre_rdv');
        }

        return $this->redirect($googleCalendarService->buildAuthorizationUrl());
    }

    #[Route('/callback', name: 'app_google_calendar_callback', methods: ['GET'])]
    public function callback(Request $request, GoogleCalendarService $googleCalendarService): Response
    {
        $this->denyAccessUnlessGranted('ROLE_PATIENT');

        $error = trim((string) $request->query->get('error', ''));
        if ($error !== '') {
            $this->addFlash('error', sprintf('Connexion Google Calendar refusee: %s', $error));
            return $this->redirectToRoute('app_prendre_rdv');
        }

        $code = trim((string) $request->query->get('code', ''));
        if ($code === '') {
            $this->addFlash('error', 'Code d autorisation Google manquant.');
            return $this->redirectToRoute('app_prendre_rdv');
        }

        try {
            $googleCalendarService->exchangeAuthorizationCode($code);
            $this->addFlash('success', 'Google Calendar connecte avec succes.');
        } catch (\Throwable $exception) {
            $this->addFlash('error', 'Echec connexion Google Calendar: ' . $exception->getMessage());
        }

        return $this->redirectToRoute('app_prendre_rdv');
    }
}
