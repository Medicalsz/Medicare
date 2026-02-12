<?php

namespace App\Controller;

use App\Repository\PatientRepository;
use App\Repository\RendezVousRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractController
{
    #[Route('/dashboard', name: 'app_dashboard')]
    public function index(): Response
    {
        // Vérifier que l'utilisateur est connecté
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        return $this->render('dashboard/index.html.twig');
    }

    #[Route('/profile', name: 'app_profile')]
    public function profile(): Response
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        
        // TODO: Créer la page profil
        return new Response('Page profil - À développer');
    }

    #[Route('/settings', name: 'app_settings')]
    public function settings(): Response
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        
        // TODO: Créer la page paramètres
        return new Response('Page paramètres - À développer');
    }

    #[Route('/appointments', name: 'app_appointments')]
    public function appointments(
        PatientRepository $patientRepository,
        RendezVousRepository $rendezVousRepository
    ): Response
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        
        /** @var \App\Entity\User $user */
        $user = $this->getUser();
        
        // Récupérer le patient associé à l'utilisateur connecté
        $patient = $patientRepository->findOneByUser($user);
        
        if (!$patient) {
            $this->addFlash('error', 'Votre profil patient n\'a pas été trouvé.');
            return $this->redirectToRoute('app_dashboard');
        }
        
        // Récupérer tous les rendez-vous du patient triés par date
        $rendezVous = $rendezVousRepository->findByPatientOrderByDate($patient);
        
        return $this->render('dashboard/rendezvous.html.twig', [
            'rendezVous' => $rendezVous,
        ]);
    }

    #[Route('/cabinets', name: 'app_cabinets')]
    public function cabinets(): Response
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        
        // TODO: Créer la page cabinets
        return new Response('Page cabinets - À développer');
    }

    #[Route('/consultations', name: 'app_consultations')]
    public function consultations(): Response
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        
        // TODO: Créer la page consultations
        return new Response('Page consultations - À développer');
    }

    #[Route('/demande-medecin', name: 'app_demande_medecin')]
    public function demandeMedecin(): Response
    {
        $this->denyAccessUnlessGranted('ROLE_PATIENT');
        
        // TODO: Créer le formulaire de demande médecin
        return new Response('Formulaire demande médecin - À développer');
    }

    #[Route('/prendre-rendez-vous', name: 'app_prendre_rdv')]
    public function prendreRendezVous(): Response
    {
        $this->denyAccessUnlessGranted('ROLE_PATIENT');
        
        // Composant multi-étapes pour prendre rendez-vous
        return $this->render('rendezvous/prendre_rdv.html.twig');
    }
}
