<?php

namespace App\Controller;

use App\Entity\Medecin;
use App\Entity\Disponibilite;
use App\Entity\RendezVous;
use App\Entity\Consultation;
use App\Repository\MedecinRepository;
use App\Repository\RendezVousRepository;
use App\Repository\ConsultationRepository;
use App\Enum\StatutRendezVous;
use App\Enum\JourSemaine;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/medecin')]
class MedecinController extends AbstractController
{
    #[Route('/dashboard', name: 'app_medecin_dashboard')]
    public function dashboard(
        MedecinRepository $medecinRepository,
        RendezVousRepository $rendezVousRepository
    ): Response {
        $this->denyAccessUnlessGranted('ROLE_MEDECIN');
        
        /** @var \App\Entity\User $user */
        $user = $this->getUser();
        
        $medecin = $medecinRepository->findOneBy(['user' => $user]);
        
        if (!$medecin) {
            $this->addFlash('error', 'Profil médecin non trouvé.');
            return $this->redirectToRoute('app_dashboard');
        }
        
        // Rendez-vous à venir
        $today = new \DateTime();
        $prochainRdv = $rendezVousRepository->createQueryBuilder('r')
            ->where('r.medecin = :medecin')
            ->andWhere('r.date >= :today')
            ->andWhere('r.statut = :statut')
            ->setParameter('medecin', $medecin)
            ->setParameter('today', $today)
            ->setParameter('statut', StatutRendezVous::CONFIRME)
            ->orderBy('r.date', 'ASC')
            ->addOrderBy('r.heure', 'ASC')
            ->setMaxResults(5)
            ->getQuery()
            ->getResult();
        
        return $this->render('medecin/dashboard.html.twig', [
            'medecin' => $medecin,
            'prochainRdv' => $prochainRdv,
        ]);
    }

    #[Route('/patients', name: 'app_medecin_patients')]
    public function patients(
        MedecinRepository $medecinRepository,
        RendezVousRepository $rendezVousRepository
    ): Response {
        $this->denyAccessUnlessGranted('ROLE_MEDECIN');
        
        /** @var \App\Entity\User $user */
        $user = $this->getUser();
        $medecin = $medecinRepository->findOneBy(['user' => $user]);
        
        if (!$medecin) {
            $this->addFlash('error', 'Profil médecin non trouvé.');
            return $this->redirectToRoute('app_dashboard');
        }
        
        // Récupérer tous les rendez-vous du médecin
        $rendezVous = $rendezVousRepository->findBy(['medecin' => $medecin]);
        
        // Extraire les patients uniques
        $patientsMap = [];
        foreach ($rendezVous as $rdv) {
            $patient = $rdv->getPatient();
            $patientId = $patient->getId();
            
            if (!isset($patientsMap[$patientId])) {
                $patientsMap[$patientId] = [
                    'patient' => $patient,
                    'totalRdv' => 0,
                    'lastRdv' => null
                ];
            }
            
            $patientsMap[$patientId]['totalRdv']++;
            
            if (!$patientsMap[$patientId]['lastRdv'] || 
                $rdv->getDate() > $patientsMap[$patientId]['lastRdv']) {
                $patientsMap[$patientId]['lastRdv'] = $rdv->getDate();
            }
        }
        
        $patients = array_values($patientsMap);
        
        return $this->render('medecin/patients.html.twig', [
            'medecin' => $medecin,
            'patients' => $patients,
        ]);
    }

    #[Route('/disponibilites', name: 'app_medecin_disponibilites')]
    public function disponibilites(
        Request $request,
        MedecinRepository $medecinRepository,
        EntityManagerInterface $em
    ): Response {
        $this->denyAccessUnlessGranted('ROLE_MEDECIN');
        
        /** @var \App\Entity\User $user */
        $user = $this->getUser();
        $medecin = $medecinRepository->findOneBy(['user' => $user]);
        
        if (!$medecin) {
            $this->addFlash('error', 'Profil médecin non trouvé.');
            return $this->redirectToRoute('app_dashboard');
        }
        
        // Traiter l'ajout de disponibilité
        if ($request->isMethod('POST')) {
            $jour = JourSemaine::from($request->request->get('jour'));
            $heureDebut = $request->request->get('heure_debut');
            $heureFin = $request->request->get('heure_fin');
            
            $dispo = new Disponibilite();
            $dispo->setMedecin($medecin);
            $dispo->setJourSemaine($jour);
            $dispo->setHeureDebut(new \DateTime($heureDebut));
            $dispo->setHeureFin(new \DateTime($heureFin));
            
            $em->persist($dispo);
            $em->flush();
            
            $this->addFlash('success', 'Disponibilité ajoutée avec succès !');
            return $this->redirectToRoute('app_medecin_disponibilites');
        }
        
        // Récupérer toutes les disponibilités
        $disponibilites = $em->getRepository(Disponibilite::class)->findBy(
            ['medecin' => $medecin],
            ['jourSemaine' => 'ASC', 'heureDebut' => 'ASC']
        );
        
        return $this->render('medecin/disponibilites.html.twig', [
            'medecin' => $medecin,
            'disponibilites' => $disponibilites,
        ]);
    }

    #[Route('/disponibilites/{id}/delete', name: 'app_medecin_disponibilites_delete', methods: ['POST'])]
    public function deleteDisponibilite(int $id, EntityManagerInterface $em): Response
    {
        $this->denyAccessUnlessGranted('ROLE_MEDECIN');
        
        $disponibilite = $em->getRepository(Disponibilite::class)->find($id);
        
        if ($disponibilite) {
            $em->remove($disponibilite);
            $em->flush();
            $this->addFlash('success', 'Disponibilité supprimée.');
        }
        
        return $this->redirectToRoute('app_medecin_disponibilites');
    }

    #[Route('/rendez-vous', name: 'app_medecin_rendezvous')]
    public function rendezVous(
        MedecinRepository $medecinRepository,
        RendezVousRepository $rendezVousRepository
    ): Response {
        $this->denyAccessUnlessGranted('ROLE_MEDECIN');
        
        /** @var \App\Entity\User $user */
        $user = $this->getUser();
        $medecin = $medecinRepository->findOneBy(['user' => $user]);
        
        if (!$medecin) {
            $this->addFlash('error', 'Profil médecin non trouvé.');
            return $this->redirectToRoute('app_dashboard');
        }
        
        // Tous les rendez-vous du médecin
        $rendezVous = $rendezVousRepository->createQueryBuilder('r')
            ->where('r.medecin = :medecin')
            ->setParameter('medecin', $medecin)
            ->orderBy('r.date', 'DESC')
            ->addOrderBy('r.heure', 'DESC')
            ->getQuery()
            ->getResult();
        
        return $this->render('medecin/rendezvous.html.twig', [
            'medecin' => $medecin,
            'rendezVous' => $rendezVous,
        ]);
    }

    #[Route('/rendez-vous/{id}/annuler', name: 'app_medecin_rendezvous_annuler', methods: ['POST'])]
    public function annulerRendezVous(int $id, EntityManagerInterface $em): Response
    {
        $this->denyAccessUnlessGranted('ROLE_MEDECIN');
        
        $rdv = $em->getRepository(RendezVous::class)->find($id);
        
        if ($rdv) {
            $rdv->setStatut(StatutRendezVous::ANNULE);
            $em->flush();
            $this->addFlash('success', 'Rendez-vous annulé.');
        }
        
        return $this->redirectToRoute('app_medecin_rendezvous');
    }

    #[Route('/consultations', name: 'app_medecin_consultations')]
    public function consultations(
        MedecinRepository $medecinRepository,
        ConsultationRepository $consultationRepository
    ): Response {
        $this->denyAccessUnlessGranted('ROLE_MEDECIN');
        
        /** @var \App\Entity\User $user */
        $user = $this->getUser();
        $medecin = $medecinRepository->findOneBy(['user' => $user]);
        
        if (!$medecin) {
            $this->addFlash('error', 'Profil médecin non trouvé.');
            return $this->redirectToRoute('app_dashboard');
        }
        
        // Toutes les consultations du médecin
        $consultations = $consultationRepository->findBy(
            ['medecin' => $medecin],
            ['dateConsultation' => 'DESC']
        );
        
        return $this->render('medecin/consultations.html.twig', [
            'medecin' => $medecin,
            'consultations' => $consultations,
        ]);
    }

    #[Route('/consultations/create/{rdvId}', name: 'app_medecin_consultations_create')]
    public function createConsultation(
        int $rdvId,
        Request $request,
        MedecinRepository $medecinRepository,
        EntityManagerInterface $em
    ): Response {
        $this->denyAccessUnlessGranted('ROLE_MEDECIN');
        
        /** @var \App\Entity\User $user */
        $user = $this->getUser();
        $medecin = $medecinRepository->findOneBy(['user' => $user]);
        
        $rdv = $em->getRepository(RendezVous::class)->find($rdvId);
        
        if (!$rdv || $rdv->getMedecin() !== $medecin) {
            $this->addFlash('error', 'Rendez-vous non trouvé.');
            return $this->redirectToRoute('app_medecin_rendezvous');
        }
        
        if ($request->isMethod('POST')) {
            $consultation = new Consultation();
            $consultation->setMedecin($medecin);
            $consultation->setPatient($rdv->getPatient());
            $consultation->setRendezVous($rdv);
            $consultation->setDateConsultation(new \DateTime());
            $consultation->setDiagnostic($request->request->get('diagnostic'));
            $consultation->setTraitement($request->request->get('traitement'));
            $consultation->setOrdonnance($request->request->get('ordonnance'));
            $consultation->setNotes($request->request->get('notes'));
            
            $em->persist($consultation);
            $em->flush();
            
            $this->addFlash('success', 'Consultation enregistrée avec succès !');
            return $this->redirectToRoute('app_medecin_consultations');
        }
        
        return $this->render('medecin/consultation_create.html.twig', [
            'medecin' => $medecin,
            'rdv' => $rdv,
        ]);
    }
}
