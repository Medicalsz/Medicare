<?php

namespace App\Controller;

use App\Repository\PatientRepository;
use App\Repository\RendezVousRepository;
use App\Repository\MedecinRepository;
use App\Entity\Medecin;
use App\Entity\DemandeMedecin;
use App\Enum\StatutDemandeMedecin;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
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
    public function demandeMedecin(Request $request, EntityManagerInterface $em): Response
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        
        /** @var \App\Entity\User $user */
        $user = $this->getUser();
        
        // Vérifier si l'utilisateur est déjà médecin
        if (in_array('ROLE_MEDECIN', $user->getRoles())) {
            $this->addFlash('error', 'Vous êtes déjà enregistré comme médecin.');
            return $this->redirectToRoute('app_medecin_dashboard');
        }
        
        // Vérifier si une demande est déjà en attente
        $existingDemande = $em->getRepository(DemandeMedecin::class)->findOneBy([
            'user' => $user,
            'statut' => StatutDemandeMedecin::EN_ATTENTE
        ]);
        
        if ($existingDemande) {
            $this->addFlash('info', 'Votre demande est en cours de traitement par un administrateur.');
            return $this->redirectToRoute('app_dashboard');
        }
        
        // Traiter le formulaire si soumis
        if ($request->isMethod('POST')) {
            $demande = new DemandeMedecin();
            $demande->setUser($user);
            $demande->setSpecialite($request->request->get('specialite'));
            $demande->setCabinet($request->request->get('cabinet'));
            $demande->setAdresse($request->request->get('adresse_cabinet') . ' | Tel: ' . $request->request->get('numero_cabinet'));
            $demande->setBio($request->request->get('bio'));
            
            // Gérer l'upload des documents
            $uploadedFiles = $request->files->get('documents');
            $documentPaths = [];
            
            if ($uploadedFiles) {
                $uploadDir = $this->getParameter('kernel.project_dir') . '/public/uploads/demandes/';
                
                // Créer le dossier si nécessaire
                if (!file_exists($uploadDir)) {
                    mkdir($uploadDir, 0777, true);
                }
                
                foreach ($uploadedFiles as $file) {
                    if ($file) {
                        $originalFilename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
                        $safeFilename = transliterator_transliterate('Any-Latin; Latin-ASCII; [^A-Za-z0-9_] remove; Lower()', $originalFilename);
                        $newFilename = $safeFilename . '-' . uniqid() . '.' . $file->guessExtension();
                        
                        try {
                            $file->move($uploadDir, $newFilename);
                            $documentPaths[] = '/uploads/demandes/' . $newFilename;
                        } catch (FileException $e) {
                            $this->addFlash('error', 'Erreur lors de l\'upload du fichier : ' . $file->getClientOriginalName());
                        }
                    }
                }
            }
            
            $demande->setCertificats(implode(',', $documentPaths));
            
            $em->persist($demande);
            $em->flush();
            
            $this->addFlash('success', 'Votre demande a été soumise avec succès ! Elle sera traitée par un administrateur.');
            return $this->redirectToRoute('app_dashboard');
        }
        
        return $this->render('dashboard/demande_medecin.html.twig');
    }
    
    #[Route('/check-demande-status', name: 'app_check_demande_status')]
    public function checkDemandeStatus(EntityManagerInterface $em): Response
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        
        /** @var \App\Entity\User $user */
        $user = $this->getUser();
        
        // Vérifier si une demande a été acceptée
        $demandeAcceptee = $em->getRepository(DemandeMedecin::class)->findOneBy([
            'user' => $user,
            'statut' => StatutDemandeMedecin::ACCEPTEE
        ]);
        
        if ($demandeAcceptee) {
            return $this->json(['status' => 'acceptee']);
        }
        
        // Vérifier si une demande a été rejetée
        $demandeRejetee = $em->getRepository(DemandeMedecin::class)->findOneBy([
            'user' => $user,
            'statut' => StatutDemandeMedecin::REJETEE
        ]);
        
        if ($demandeRejetee) {
            return $this->json([
                'status' => 'rejetee',
                'raison' => $demandeRejetee->getRaisonRejet()
            ]);
        }
        
        return $this->json(['status' => 'en_attente']);
    }

    #[Route('/prendre-rendez-vous', name: 'app_prendre_rdv')]
    public function prendreRendezVous(MedecinRepository $medecinRepository): Response
    {
        $this->denyAccessUnlessGranted('ROLE_PATIENT');
        
        // Récupérer tous les médecins disponibles avec leurs spécialités
        $medecinsEntities = $medecinRepository->findAll();
        
        // Préparer les données pour JavaScript
        $medecins = [];
        foreach ($medecinsEntities as $medecin) {
            $medecins[] = [
                'id' => $medecin->getId(),
                'specialite' => $medecin->getSpecialite(),
                'cabinet' => $medecin->getCabinet(),
                'bio' => $medecin->getBio(),
                'user' => [
                    'prenom' => $medecin->getUser()->getPrenom(),
                    'nom' => $medecin->getUser()->getNom(),
                ]
            ];
        }
        
        return $this->render('rendezvous/prendre_rdv.html.twig', [
            'medecins' => $medecins,
        ]);
    }
}
