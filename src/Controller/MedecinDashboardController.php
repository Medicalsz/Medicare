<?php

namespace App\Controller;

use App\Entity\Consultation;
use App\Entity\DemandeMedecin;
use App\Entity\Disponibilite;
use App\Entity\RendezVous;
use App\Entity\User;
use App\Enum\JourSemaine;
use App\Enum\StatutRendezVous;
use App\Enum\StatutDemandeMedecin;
use App\Enum\TypeConsultation;
use App\Repository\ConsultationRepository;
use App\Repository\DisponibiliteRepository;
use App\Repository\MedecinRepository;
use App\Repository\RendezVousRepository;
use Doctrine\DBAL\Exception\UniqueConstraintViolationException;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MedecinDashboardController extends AbstractController
{
    /**
     * @var array<string, string>
     */
    private const JOUR_LABELS = [
        'LUNDI' => 'Lundi',
        'MARDI' => 'Mardi',
        'MERCREDI' => 'Mercredi',
        'JEUDI' => 'Jeudi',
        'VENDREDI' => 'Vendredi',
        'SAMEDI' => 'Samedi',
        'DIMANCHE' => 'Dimanche',
    ];

    #[Route('/medecin/dashboard', name: 'app_medecin_dashboard')]
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {
        $this->denyAccessUnlessGranted('ROLE_MEDECIN');

        /** @var User|null $user */
        $user = $this->getUser();
        if (
            $user
            && $request->getSession()->get('medecin_recently_authenticated', false) !== true
        ) {
            $demandeAcceptee = $entityManager->getRepository(DemandeMedecin::class)->findOneBy(
                ['user' => $user, 'statut' => StatutDemandeMedecin::ACCEPTEE],
                ['id' => 'DESC']
            );

            if ($demandeAcceptee) {
                return $this->redirectToRoute('app_dashboard');
            }
        }

        return $this->render('medecin/dashboard.html.twig');
    }

    #[Route('/medecin/demandes-rendez-vous', name: 'app_medecin_demandes_rendez_vous')]
    public function demandesRendezVous(
        Request $request,
        EntityManagerInterface $entityManager,
        MedecinRepository $medecinRepository,
        RendezVousRepository $rendezVousRepository
    ): Response
    {
        $this->denyAccessUnlessGranted('ROLE_MEDECIN');

        if (!$this->canAccessMedecinArea($request, $entityManager)) {
            return $this->redirectToRoute('app_dashboard');
        }

        /** @var User|null $user */
        $user = $this->getUser();
        if (!$user) {
            return $this->redirectToRoute('app_login');
        }

        $medecin = $medecinRepository->findOneBy(['user' => $user]);
        if (!$medecin) {
            $this->addFlash('error', 'Profil medecin introuvable.');
            return $this->redirectToRoute('app_medecin_dashboard');
        }

        $rendezVous = $rendezVousRepository->findByMedecinOrderByDate($medecin);

        return $this->render('medecin/demandes_rendez_vous.html.twig', [
            'rendezVous' => $rendezVous,
        ]);
    }

    #[Route('/medecin/ordonnances', name: 'app_medecin_ordonnances', methods: ['GET'])]
    public function ordonnances(
        Request $request,
        EntityManagerInterface $entityManager,
        MedecinRepository $medecinRepository,
        ConsultationRepository $consultationRepository
    ): Response {
        $this->denyAccessUnlessGranted('ROLE_MEDECIN');

        if (!$this->canAccessMedecinArea($request, $entityManager)) {
            return $this->redirectToRoute('app_dashboard');
        }

        /** @var User|null $user */
        $user = $this->getUser();
        if (!$user) {
            return $this->redirectToRoute('app_login');
        }

        $medecin = $medecinRepository->findOneBy(['user' => $user]);
        if (!$medecin) {
            $this->addFlash('error', 'Profil medecin introuvable.');
            return $this->redirectToRoute('app_medecin_dashboard');
        }

        $consultations = $consultationRepository->findByMedecinLatest($medecin);

        return $this->render('medecin/ordonnances.html.twig', [
            'consultations' => $consultations,
        ]);
    }

    #[Route('/medecin/rendez-vous/{id}/accepter', name: 'app_medecin_accept_rendez_vous', methods: ['POST'])]
    public function accepterRendezVous(
        int $id,
        Request $request,
        EntityManagerInterface $entityManager,
        MedecinRepository $medecinRepository
    ): Response {
        $this->denyAccessUnlessGranted('ROLE_MEDECIN');

        if (!$this->canAccessMedecinArea($request, $entityManager)) {
            return $this->redirectToRoute('app_dashboard');
        }

        /** @var User|null $user */
        $user = $this->getUser();
        $medecin = $user ? $medecinRepository->findOneBy(['user' => $user]) : null;
        if (!$medecin) {
            $this->addFlash('error', 'Profil medecin introuvable.');
            return $this->redirectToRoute('app_medecin_demandes_rendez_vous');
        }

        $rdv = $entityManager->getRepository(RendezVous::class)->find($id);
        if (!$rdv || $rdv->getMedecin()?->getId() !== $medecin->getId()) {
            $this->addFlash('error', 'Rendez-vous introuvable.');
            return $this->redirectToRoute('app_medecin_demandes_rendez_vous');
        }

        if ($rdv->isReportPendingPatientResponse()) {
            $this->addFlash('error', 'Ce rendez-vous attend la reponse du patient au report propose.');
            return $this->redirectToRoute('app_medecin_demandes_rendez_vous');
        }

        if ($rdv->getStatut() !== StatutRendezVous::EN_ATTENTE) {
            $this->addFlash('error', 'Ce rendez-vous n est plus en attente.');
            return $this->redirectToRoute('app_medecin_demandes_rendez_vous');
        }

        $rdv
            ->setStatut(StatutRendezVous::CONFIRME)
            ->setProposedDate(null)
            ->setProposedHeure(null)
            ->setReportPendingPatientResponse(false);
        $entityManager->flush();

        $this->addFlash('success', 'Rendez-vous accepte.');
        return $this->redirectToRoute('app_medecin_demandes_rendez_vous');
    }

    #[Route('/medecin/rendez-vous/{id}/rejeter', name: 'app_medecin_reject_rendez_vous', methods: ['POST'])]
    public function rejeterRendezVous(
        int $id,
        Request $request,
        EntityManagerInterface $entityManager,
        MedecinRepository $medecinRepository
    ): Response {
        $this->denyAccessUnlessGranted('ROLE_MEDECIN');

        if (!$this->canAccessMedecinArea($request, $entityManager)) {
            return $this->redirectToRoute('app_dashboard');
        }

        /** @var User|null $user */
        $user = $this->getUser();
        $medecin = $user ? $medecinRepository->findOneBy(['user' => $user]) : null;
        if (!$medecin) {
            $this->addFlash('error', 'Profil medecin introuvable.');
            return $this->redirectToRoute('app_medecin_demandes_rendez_vous');
        }

        $rdv = $entityManager->getRepository(RendezVous::class)->find($id);
        if (!$rdv || $rdv->getMedecin()?->getId() !== $medecin->getId()) {
            $this->addFlash('error', 'Rendez-vous introuvable.');
            return $this->redirectToRoute('app_medecin_demandes_rendez_vous');
        }

        if ($rdv->isReportPendingPatientResponse()) {
            $this->addFlash('error', 'Ce rendez-vous attend la reponse du patient au report propose.');
            return $this->redirectToRoute('app_medecin_demandes_rendez_vous');
        }

        if ($rdv->getStatut() !== StatutRendezVous::EN_ATTENTE) {
            $this->addFlash('error', 'Ce rendez-vous n est plus en attente.');
            return $this->redirectToRoute('app_medecin_demandes_rendez_vous');
        }

        $rdv
            ->setStatut(StatutRendezVous::ANNULE)
            ->setProposedDate(null)
            ->setProposedHeure(null)
            ->setReportPendingPatientResponse(false);
        $entityManager->flush();

        $this->addFlash('success', 'Rendez-vous rejete.');
        return $this->redirectToRoute('app_medecin_demandes_rendez_vous');
    }

    #[Route('/medecin/rendez-vous/{id}', name: 'app_medecin_rendez_vous_show', methods: ['GET'])]
    public function showRendezVous(
        int $id,
        Request $request,
        EntityManagerInterface $entityManager,
        MedecinRepository $medecinRepository,
        ConsultationRepository $consultationRepository
    ): Response {
        $this->denyAccessUnlessGranted('ROLE_MEDECIN');

        if (!$this->canAccessMedecinArea($request, $entityManager)) {
            return $this->redirectToRoute('app_dashboard');
        }

        /** @var User|null $user */
        $user = $this->getUser();
        $medecin = $user ? $medecinRepository->findOneBy(['user' => $user]) : null;
        if (!$medecin) {
            $this->addFlash('error', 'Profil medecin introuvable.');
            return $this->redirectToRoute('app_medecin_demandes_rendez_vous');
        }

        $rdv = $entityManager->getRepository(RendezVous::class)->find($id);
        if (!$rdv || $rdv->getMedecin()?->getId() !== $medecin->getId()) {
            $this->addFlash('error', 'Rendez-vous introuvable.');
            return $this->redirectToRoute('app_medecin_demandes_rendez_vous');
        }

        $consultation = $consultationRepository->findOneByRendezVous($rdv);
        $isPastConfirmed = $rdv->getStatut() === StatutRendezVous::CONFIRME
            && $this->buildRendezVousDateTime($rdv) <= new \DateTimeImmutable();

        return $this->render('medecin/rendez_vous_details.html.twig', [
            'rendezVous' => $rdv,
            'consultation' => $consultation,
            'canWriteOrdonnance' => $isPastConfirmed,
        ]);
    }

    #[Route('/medecin/rendez-vous/{id}/annuler', name: 'app_medecin_cancel_rendez_vous', methods: ['POST'])]
    public function annulerRendezVous(
        int $id,
        Request $request,
        EntityManagerInterface $entityManager,
        MedecinRepository $medecinRepository
    ): Response {
        $this->denyAccessUnlessGranted('ROLE_MEDECIN');

        if (!$this->canAccessMedecinArea($request, $entityManager)) {
            return $this->redirectToRoute('app_dashboard');
        }

        if (!$this->isCsrfTokenValid('medecin_cancel_rdv_' . $id, (string) $request->request->get('_token'))) {
            $this->addFlash('error', 'Jeton de securite invalide.');
            return $this->redirectToRoute('app_medecin_rendez_vous_show', ['id' => $id]);
        }

        /** @var User|null $user */
        $user = $this->getUser();
        $medecin = $user ? $medecinRepository->findOneBy(['user' => $user]) : null;
        if (!$medecin) {
            $this->addFlash('error', 'Profil medecin introuvable.');
            return $this->redirectToRoute('app_medecin_demandes_rendez_vous');
        }

        $rdv = $entityManager->getRepository(RendezVous::class)->find($id);
        if (!$rdv || $rdv->getMedecin()?->getId() !== $medecin->getId()) {
            $this->addFlash('error', 'Rendez-vous introuvable.');
            return $this->redirectToRoute('app_medecin_demandes_rendez_vous');
        }

        if ($rdv->getStatut() === StatutRendezVous::ANNULE) {
            $this->addFlash('error', 'Ce rendez-vous est deja annule.');
            return $this->redirectToRoute('app_medecin_rendez_vous_show', ['id' => $id]);
        }

        $rdv
            ->setStatut(StatutRendezVous::ANNULE)
            ->setProposedDate(null)
            ->setProposedHeure(null)
            ->setReportPendingPatientResponse(false);
        $entityManager->flush();

        $this->addFlash('success', 'Rendez-vous annule.');
        return $this->redirectToRoute('app_medecin_rendez_vous_show', ['id' => $id]);
    }

    #[Route('/medecin/rendez-vous/{id}/reporter', name: 'app_medecin_report_rendez_vous', methods: ['POST'])]
    public function reporterRendezVous(
        int $id,
        Request $request,
        EntityManagerInterface $entityManager,
        MedecinRepository $medecinRepository,
        DisponibiliteRepository $disponibiliteRepository,
        RendezVousRepository $rendezVousRepository
    ): Response {
        $this->denyAccessUnlessGranted('ROLE_MEDECIN');

        if (!$this->canAccessMedecinArea($request, $entityManager)) {
            return $this->redirectToRoute('app_dashboard');
        }

        if (!$this->isCsrfTokenValid('medecin_report_rdv_' . $id, (string) $request->request->get('_token'))) {
            $this->addFlash('error', 'Jeton de securite invalide.');
            return $this->redirectToRoute('app_medecin_rendez_vous_show', ['id' => $id]);
        }

        /** @var User|null $user */
        $user = $this->getUser();
        $medecin = $user ? $medecinRepository->findOneBy(['user' => $user]) : null;
        if (!$medecin) {
            $this->addFlash('error', 'Profil medecin introuvable.');
            return $this->redirectToRoute('app_medecin_demandes_rendez_vous');
        }

        $rdv = $entityManager->getRepository(RendezVous::class)->find($id);
        if (!$rdv || $rdv->getMedecin()?->getId() !== $medecin->getId()) {
            $this->addFlash('error', 'Rendez-vous introuvable.');
            return $this->redirectToRoute('app_medecin_demandes_rendez_vous');
        }

        if ($rdv->getStatut() === StatutRendezVous::ANNULE) {
            $this->addFlash('error', 'Impossible de reporter un rendez-vous annule.');
            return $this->redirectToRoute('app_medecin_rendez_vous_show', ['id' => $id]);
        }

        $dateInput = trim((string) $request->request->get('date_rdv', ''));
        $heureInput = trim((string) $request->request->get('heure_rdv', ''));

        $date = $this->parseDateInput($dateInput);
        if (!$date || $date < new \DateTimeImmutable('today')) {
            $this->addFlash('error', 'Date invalide.');
            return $this->redirectToRoute('app_medecin_rendez_vous_show', ['id' => $id]);
        }

        if (!$this->isValidTimeInput($heureInput)) {
            $this->addFlash('error', 'Heure invalide.');
            return $this->redirectToRoute('app_medecin_rendez_vous_show', ['id' => $id]);
        }

        $jour = $this->jourFromDate($date);
        if (!$jour) {
            $this->addFlash('error', 'Jour invalide.');
            return $this->redirectToRoute('app_medecin_rendez_vous_show', ['id' => $id]);
        }

        $disponibilite = $disponibiliteRepository->findOneByMedecinAndJour($medecin, $jour);
        if (!$disponibilite || !$this->isDisponibiliteActive($disponibilite)) {
            $this->addFlash('error', 'Vous ne travaillez pas ce jour-la.');
            return $this->redirectToRoute('app_medecin_rendez_vous_show', ['id' => $id]);
        }

        if (!$this->isHeureInDisponibilite($disponibilite, $heureInput)) {
            $this->addFlash('error', 'L heure choisie ne correspond pas a votre planning.');
            return $this->redirectToRoute('app_medecin_rendez_vous_show', ['id' => $id]);
        }

        $heure = $this->toTimeObject($heureInput);
        $rdvId = (int) $rdv->getId();
        if ($rdvId > 0 && $rendezVousRepository->medecinHasRendezVousAtExcept($medecin, $date, $heure, $rdvId)) {
            $this->addFlash('error', 'Vous avez deja un rendez-vous a cette heure.');
            return $this->redirectToRoute('app_medecin_rendez_vous_show', ['id' => $id]);
        }

        $rdv
            ->setProposedDate($date)
            ->setProposedHeure($heure)
            ->setReportPendingPatientResponse(true)
            ->setStatut(StatutRendezVous::EN_ATTENTE);

        try {
            $entityManager->flush();
        } catch (UniqueConstraintViolationException) {
            $this->addFlash('error', 'Vous avez deja un rendez-vous a cette heure.');
            return $this->redirectToRoute('app_medecin_rendez_vous_show', ['id' => $id]);
        }

        $this->addFlash('success', 'Report propose au patient. En attente de sa decision.');
        return $this->redirectToRoute('app_medecin_rendez_vous_show', ['id' => $id]);
    }

    #[Route('/medecin/rendez-vous/{id}/ordonnance', name: 'app_medecin_rendez_vous_ordonnance', methods: ['GET', 'POST'])]
    public function ordonnanceRendezVous(
        int $id,
        Request $request,
        EntityManagerInterface $entityManager,
        MedecinRepository $medecinRepository,
        ConsultationRepository $consultationRepository
    ): Response {
        $this->denyAccessUnlessGranted('ROLE_MEDECIN');

        if (!$this->canAccessMedecinArea($request, $entityManager)) {
            return $this->redirectToRoute('app_dashboard');
        }

        /** @var User|null $user */
        $user = $this->getUser();
        $medecin = $user ? $medecinRepository->findOneBy(['user' => $user]) : null;
        if (!$medecin) {
            $this->addFlash('error', 'Profil medecin introuvable.');
            return $this->redirectToRoute('app_medecin_demandes_rendez_vous');
        }

        $rendezVous = $entityManager->getRepository(RendezVous::class)->find($id);
        if (!$rendezVous || $rendezVous->getMedecin()?->getId() !== $medecin->getId()) {
            $this->addFlash('error', 'Rendez-vous introuvable.');
            return $this->redirectToRoute('app_medecin_demandes_rendez_vous');
        }

        $consultation = $consultationRepository->findOneByRendezVous($rendezVous);
        $isPastConfirmed = $rendezVous->getStatut() === StatutRendezVous::CONFIRME
            && $this->buildRendezVousDateTime($rendezVous) <= new \DateTimeImmutable();
        if (!$isPastConfirmed && !$consultation) {
            $this->addFlash('error', 'L ordonnance est disponible uniquement apres un rendez-vous confirme termine.');
            return $this->redirectToRoute('app_medecin_rendez_vous_show', ['id' => $id]);
        }
        $formData = [
            'description' => (string) ($consultation?->getDescription() ?? ''),
            'ordonnance' => (string) ($consultation?->getOrdonnance() ?? ''),
        ];

        if ($request->isMethod('POST')) {
            if (!$this->isCsrfTokenValid('medecin_ordonnance_rdv_' . $id, (string) $request->request->get('_token'))) {
                $this->addFlash('error', 'Jeton de securite invalide.');
                return $this->redirectToRoute('app_medecin_rendez_vous_ordonnance', ['id' => $id]);
            }

            $formData['description'] = trim((string) $request->request->get('description', ''));
            $formData['ordonnance'] = trim((string) $request->request->get('ordonnance', ''));

            if ($formData['description'] === '' || mb_strlen($formData['description']) < 10) {
                $this->addFlash('error', 'Le compte rendu doit contenir au moins 10 caracteres.');
            } elseif (mb_strlen($formData['description']) > 5000) {
                $this->addFlash('error', 'Le compte rendu ne doit pas depasser 5000 caracteres.');
            } elseif ($formData['ordonnance'] === '' || mb_strlen($formData['ordonnance']) < 8) {
                $this->addFlash('error', 'Le contenu de l ordonnance est trop court.');
            } elseif (mb_strlen($formData['ordonnance']) > 8000) {
                $this->addFlash('error', 'Le contenu de l ordonnance est trop long.');
            } else {
                if (!$consultation) {
                    $consultation = new Consultation();
                    $consultation
                        ->setMedecin($medecin)
                        ->setPatient($rendezVous->getPatient())
                        ->setRendezVous($rendezVous);
                    $entityManager->persist($consultation);
                }

                $consultation
                    ->setDateConsultation($this->buildRendezVousDateTime($rendezVous))
                    ->setDescription($formData['description'])
                    ->setOrdonnance($formData['ordonnance'])
                    ->setType(TypeConsultation::PRESENTIELLE);

                $entityManager->flush();
                $this->addFlash('success', 'Ordonnance enregistree avec succes.');

                return $this->redirectToRoute('app_medecin_rendez_vous_show', ['id' => $id]);
            }
        }

        return $this->render('medecin/ordonnance_form.html.twig', [
            'rendezVous' => $rendezVous,
            'consultation' => $consultation,
            'formData' => $formData,
        ]);
    }

    #[Route('/medecin/rendez-vous/{id}/ordonnance/apercu', name: 'app_medecin_rendez_vous_ordonnance_preview', methods: ['GET'])]
    public function previewOrdonnanceRendezVous(
        int $id,
        Request $request,
        EntityManagerInterface $entityManager,
        MedecinRepository $medecinRepository,
        ConsultationRepository $consultationRepository
    ): Response {
        $this->denyAccessUnlessGranted('ROLE_MEDECIN');

        if (!$this->canAccessMedecinArea($request, $entityManager)) {
            return $this->redirectToRoute('app_dashboard');
        }

        /** @var User|null $user */
        $user = $this->getUser();
        $medecin = $user ? $medecinRepository->findOneBy(['user' => $user]) : null;
        if (!$medecin) {
            $this->addFlash('error', 'Profil medecin introuvable.');
            return $this->redirectToRoute('app_medecin_demandes_rendez_vous');
        }

        $rendezVous = $entityManager->getRepository(RendezVous::class)->find($id);
        if (!$rendezVous || $rendezVous->getMedecin()?->getId() !== $medecin->getId()) {
            $this->addFlash('error', 'Rendez-vous introuvable.');
            return $this->redirectToRoute('app_medecin_demandes_rendez_vous');
        }

        $consultation = $consultationRepository->findOneByRendezVous($rendezVous);
        if (!$consultation) {
            $this->addFlash('error', 'Aucune ordonnance disponible pour ce rendez-vous.');
            return $this->redirectToRoute('app_medecin_rendez_vous_show', ['id' => $id]);
        }

        return $this->render('medecin/ordonnance_preview.html.twig', [
            'rendezVous' => $rendezVous,
            'consultation' => $consultation,
        ]);
    }

    #[Route('/medecin/rendez-vous/{id}/ordonnance/supprimer', name: 'app_medecin_rendez_vous_ordonnance_delete', methods: ['POST'])]
    public function deleteOrdonnanceRendezVous(
        int $id,
        Request $request,
        EntityManagerInterface $entityManager,
        MedecinRepository $medecinRepository,
        ConsultationRepository $consultationRepository
    ): Response {
        $this->denyAccessUnlessGranted('ROLE_MEDECIN');

        if (!$this->canAccessMedecinArea($request, $entityManager)) {
            return $this->redirectToRoute('app_dashboard');
        }

        if (!$this->isCsrfTokenValid('medecin_delete_ordonnance_' . $id, (string) $request->request->get('_token'))) {
            $this->addFlash('error', 'Jeton de securite invalide.');
            return $this->redirectToRoute('app_medecin_rendez_vous_ordonnance_preview', ['id' => $id]);
        }

        /** @var User|null $user */
        $user = $this->getUser();
        $medecin = $user ? $medecinRepository->findOneBy(['user' => $user]) : null;
        if (!$medecin) {
            $this->addFlash('error', 'Profil medecin introuvable.');
            return $this->redirectToRoute('app_medecin_demandes_rendez_vous');
        }

        $rendezVous = $entityManager->getRepository(RendezVous::class)->find($id);
        if (!$rendezVous || $rendezVous->getMedecin()?->getId() !== $medecin->getId()) {
            $this->addFlash('error', 'Rendez-vous introuvable.');
            return $this->redirectToRoute('app_medecin_demandes_rendez_vous');
        }

        $consultation = $consultationRepository->findOneByRendezVous($rendezVous);
        if (!$consultation) {
            $this->addFlash('error', 'Aucune ordonnance a supprimer.');
            return $this->redirectToRoute('app_medecin_rendez_vous_show', ['id' => $id]);
        }

        $entityManager->remove($consultation);
        $entityManager->flush();

        $this->addFlash('success', 'Ordonnance supprimee avec succes.');
        return $this->redirectToRoute('app_medecin_rendez_vous_show', ['id' => $id]);
    }

    #[Route('/medecin/planning', name: 'app_medecin_planning')]
    public function planning(
        Request $request,
        EntityManagerInterface $entityManager,
        MedecinRepository $medecinRepository,
        DisponibiliteRepository $disponibiliteRepository
    ): Response
    {
        $this->denyAccessUnlessGranted('ROLE_MEDECIN');

        if (!$this->canAccessMedecinArea($request, $entityManager)) {
            return $this->redirectToRoute('app_dashboard');
        }

        /** @var User|null $user */
        $user = $this->getUser();
        if (!$user) {
            return $this->redirectToRoute('app_login');
        }

        $medecin = $medecinRepository->findOneBy(['user' => $user]);
        if (!$medecin) {
            $this->addFlash('error', 'Profil medecin introuvable.');
            return $this->redirectToRoute('app_medecin_dashboard');
        }

        $planningMap = $disponibiliteRepository->findPlanningMapByMedecin($medecin);
        if ($request->isMethod('POST')) {
            $payload = $request->request->all('planning');
            if (!is_array($payload)) {
                $payload = [];
            }

            $validation = $this->validatePlanningPayload($payload);
            if (!empty($validation['errors'])) {
                $this->addFlash('error', implode(' ', $validation['errors']));

                return $this->render('medecin/planning.html.twig', [
                    'planningRows' => $this->mergeRowsWithPayload(
                        $this->buildPlanningRows($planningMap),
                        $payload
                    ),
                ]);
            }

            /** @var array<string, array<string, mixed>> $normalizedByDay */
            $normalizedByDay = $validation['normalizedByDay'];
            foreach (JourSemaine::cases() as $jour) {
                $dayKey = $jour->value;
                $normalized = $normalizedByDay[$dayKey] ?? null;
                if (!is_array($normalized)) {
                    continue;
                }

                $disponibilite = $planningMap[$dayKey] ?? null;
                if (!$disponibilite) {
                    $disponibilite = new Disponibilite();
                    $disponibilite->setMedecin($medecin);
                    $disponibilite->setJourSemaine($jour);
                    $entityManager->persist($disponibilite);
                }

                $isFerme = (bool) ($normalized['ferme'] ?? false);
                $disponibilite->setFerme($isFerme);

                if ($isFerme) {
                    $disponibilite->clearHoraires();
                    continue;
                }

                $disponibilite
                    ->setMatinDebut($this->toTimeObject((string) $normalized['matinDebut']))
                    ->setMatinFin($this->toTimeObject((string) $normalized['matinFin']))
                    ->setPauseDebut($this->toTimeObject((string) $normalized['pauseDebut']))
                    ->setPauseFin($this->toTimeObject((string) $normalized['pauseFin']))
                    ->setApresMidiDebut($this->toTimeObject((string) $normalized['apresMidiDebut']))
                    ->setApresMidiFin($this->toTimeObject((string) $normalized['apresMidiFin']));
            }

            $entityManager->flush();

            $this->addFlash('success', 'Planning hebdomadaire mis a jour.');
            return $this->redirectToRoute('app_medecin_planning');
        }

        return $this->render('medecin/planning.html.twig', [
            'planningRows' => $this->buildPlanningRows($planningMap),
        ]);
    }

    private function canAccessMedecinArea(Request $request, EntityManagerInterface $entityManager): bool
    {
        /** @var User|null $user */
        $user = $this->getUser();
        if (!$user) {
            return false;
        }

        if ($request->getSession()->get('medecin_recently_authenticated', false) === true) {
            return true;
        }

        $demandeAcceptee = $entityManager->getRepository(DemandeMedecin::class)->findOneBy(
            ['user' => $user, 'statut' => StatutDemandeMedecin::ACCEPTEE],
            ['id' => 'DESC']
        );

        return $demandeAcceptee === null;
    }

    /**
     * @param array<string, Disponibilite> $planningMap
     * @return array<int, array<string, string|bool>>
     */
    private function buildPlanningRows(array $planningMap): array
    {
        $rows = [];
        foreach (JourSemaine::cases() as $jour) {
            $dayKey = $jour->value;
            $entry = $planningMap[$dayKey] ?? null;

            $rows[] = [
                'dayKey' => $dayKey,
                'label' => self::JOUR_LABELS[$dayKey] ?? $dayKey,
                'ferme' => $entry?->isFerme() ?? true,
                'matinDebut' => $this->formatTime($entry?->getMatinDebut(), '08:00'),
                'matinFin' => $this->formatTime($entry?->getMatinFin(), '12:00'),
                'pauseDebut' => $this->formatTime($entry?->getPauseDebut(), '12:00'),
                'pauseFin' => $this->formatTime($entry?->getPauseFin(), '14:00'),
                'apresMidiDebut' => $this->formatTime($entry?->getApresMidiDebut(), '14:00'),
                'apresMidiFin' => $this->formatTime($entry?->getApresMidiFin(), '18:00'),
            ];
        }

        return $rows;
    }

    /**
     * @param array<int, array<string, string|bool>> $rows
     * @param array<string, mixed> $payload
     * @return array<int, array<string, string|bool>>
     */
    private function mergeRowsWithPayload(array $rows, array $payload): array
    {
        foreach ($rows as &$row) {
            $dayKey = (string) ($row['dayKey'] ?? '');
            $incoming = $payload[$dayKey] ?? null;
            if (!is_array($incoming)) {
                continue;
            }

            $row['ferme'] = isset($incoming['ferme']) && (string) $incoming['ferme'] === '1';
            foreach (['matinDebut', 'matinFin', 'pauseDebut', 'pauseFin', 'apresMidiDebut', 'apresMidiFin'] as $field) {
                if (isset($incoming[$field])) {
                    $row[$field] = trim((string) $incoming[$field]);
                }
            }
        }
        unset($row);

        return $rows;
    }

    /**
     * @param array<string, mixed> $payload
     * @return array{errors: string[], normalizedByDay: array<string, array<string, string|bool>>}
     */
    private function validatePlanningPayload(array $payload): array
    {
        $errors = [];
        $normalizedByDay = [];

        foreach (JourSemaine::cases() as $jour) {
            $dayKey = $jour->value;
            $dayLabel = self::JOUR_LABELS[$dayKey] ?? $dayKey;
            $incoming = $payload[$dayKey] ?? [];
            if (!is_array($incoming)) {
                $incoming = [];
            }

            $isFerme = isset($incoming['ferme']) && (string) $incoming['ferme'] === '1';
            if ($isFerme) {
                $normalizedByDay[$dayKey] = ['ferme' => true];
                continue;
            }

            $fields = [
                'matinDebut',
                'matinFin',
                'pauseDebut',
                'pauseFin',
                'apresMidiDebut',
                'apresMidiFin',
            ];

            $normalized = ['ferme' => false];
            $dayHasInvalidFormat = false;
            foreach ($fields as $field) {
                $value = trim((string) ($incoming[$field] ?? ''));
                if (!$this->isValidTimeInput($value)) {
                    $errors[] = sprintf('%s: heure invalide pour %s.', $dayLabel, $field);
                    $dayHasInvalidFormat = true;
                }
                $normalized[$field] = $value;
            }

            if ($dayHasInvalidFormat) {
                $normalizedByDay[$dayKey] = $normalized;
                continue;
            }

            $matinDebut = $normalized['matinDebut'];
            $matinFin = $normalized['matinFin'];
            $pauseDebut = $normalized['pauseDebut'];
            $pauseFin = $normalized['pauseFin'];
            $apresMidiDebut = $normalized['apresMidiDebut'];
            $apresMidiFin = $normalized['apresMidiFin'];

            if (!$this->isChronological($matinDebut, $matinFin)) {
                $errors[] = sprintf('%s: la fin du matin doit etre apres le debut.', $dayLabel);
            }
            if (!$this->isChronological($pauseDebut, $pauseFin)) {
                $errors[] = sprintf('%s: la fin de la pause doit etre apres le debut.', $dayLabel);
            }
            if (!$this->isChronological($apresMidiDebut, $apresMidiFin)) {
                $errors[] = sprintf('%s: la fin de l apres-midi doit etre apres le debut.', $dayLabel);
            }
            if (!$this->isChronological($matinFin, $pauseDebut)) {
                $errors[] = sprintf('%s: la pause doit commencer apres la plage du matin.', $dayLabel);
            }
            if (!$this->isChronological($pauseFin, $apresMidiDebut)) {
                $errors[] = sprintf('%s: l apres-midi doit commencer apres la pause.', $dayLabel);
            }

            $normalizedByDay[$dayKey] = $normalized;
        }

        return [
            'errors' => $errors,
            'normalizedByDay' => $normalizedByDay,
        ];
    }

    private function isValidTimeInput(string $value): bool
    {
        if (!preg_match('/^\d{2}:\d{2}$/', $value)) {
            return false;
        }

        [$hour, $minute] = explode(':', $value);
        $h = (int) $hour;
        $m = (int) $minute;

        return $h >= 0 && $h <= 23 && in_array($m, [0, 30], true);
    }

    private function isChronological(string $start, string $end): bool
    {
        return strtotime($end) > strtotime($start);
    }

    private function buildRendezVousDateTime(RendezVous $rendezVous): \DateTimeImmutable
    {
        $date = $rendezVous->getDate()?->format('Y-m-d') ?? (new \DateTimeImmutable('today'))->format('Y-m-d');
        $heure = $rendezVous->getHeure()?->format('H:i:s') ?? '00:00:00';

        return new \DateTimeImmutable($date . ' ' . $heure);
    }

    private function parseDateInput(string $value): ?\DateTimeImmutable
    {
        if (!preg_match('/^\d{4}-\d{2}-\d{2}$/', $value)) {
            return null;
        }

        $date = \DateTimeImmutable::createFromFormat('Y-m-d', $value);
        if (!$date) {
            return null;
        }

        return $date->setTime(0, 0, 0);
    }

    private function jourFromDate(\DateTimeInterface $date): ?JourSemaine
    {
        return match ((int) $date->format('N')) {
            1 => JourSemaine::LUNDI,
            2 => JourSemaine::MARDI,
            3 => JourSemaine::MERCREDI,
            4 => JourSemaine::JEUDI,
            5 => JourSemaine::VENDREDI,
            6 => JourSemaine::SAMEDI,
            7 => JourSemaine::DIMANCHE,
            default => null,
        };
    }

    private function isDisponibiliteActive(Disponibilite $disponibilite): bool
    {
        if ($disponibilite->isFerme()) {
            return false;
        }

        return $disponibilite->getMatinDebut() !== null
            && $disponibilite->getMatinFin() !== null
            && $disponibilite->getPauseDebut() !== null
            && $disponibilite->getPauseFin() !== null
            && $disponibilite->getApresMidiDebut() !== null
            && $disponibilite->getApresMidiFin() !== null;
    }

    private function isHeureInDisponibilite(Disponibilite $disponibilite, string $heure): bool
    {
        $slots = $this->buildSlotsForDisponibilite($disponibilite);
        return in_array($heure, $slots, true);
    }

    /**
     * @return string[]
     */
    private function buildSlotsForDisponibilite(Disponibilite $disponibilite): array
    {
        if (!$this->isDisponibiliteActive($disponibilite)) {
            return [];
        }

        $slots = [];
        $matinDebut = $disponibilite->getMatinDebut();
        $matinFin = $disponibilite->getMatinFin();
        $apresMidiDebut = $disponibilite->getApresMidiDebut();
        $apresMidiFin = $disponibilite->getApresMidiFin();

        if ($matinDebut && $matinFin) {
            $slots = array_merge($slots, $this->buildRangeSlots($matinDebut, $matinFin));
        }
        if ($apresMidiDebut && $apresMidiFin) {
            $slots = array_merge($slots, $this->buildRangeSlots($apresMidiDebut, $apresMidiFin));
        }

        return array_values(array_unique($slots));
    }

    /**
     * @return string[]
     */
    private function buildRangeSlots(\DateTimeInterface $start, \DateTimeInterface $end): array
    {
        $cursor = (int) $start->format('H') * 60 + (int) $start->format('i');
        $limit = (int) $end->format('H') * 60 + (int) $end->format('i');
        $slots = [];

        while ($cursor < $limit) {
            $hour = (int) floor($cursor / 60);
            $minute = $cursor % 60;
            $slots[] = sprintf('%02d:%02d', $hour, $minute);
            $cursor += 30;
        }

        return $slots;
    }

    private function toTimeObject(string $hhmm): \DateTimeImmutable
    {
        return new \DateTimeImmutable(sprintf('1970-01-01 %s:00', $hhmm));
    }

    private function formatTime(?\DateTimeInterface $time, string $fallback): string
    {
        return $time ? $time->format('H:i') : $fallback;
    }
}
