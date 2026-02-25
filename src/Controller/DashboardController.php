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
use App\Repository\ConsultationRepository;
use App\Repository\DisponibiliteRepository;
use App\Repository\MedecinRepository;
use App\Repository\PatientRepository;
use App\Repository\RendezVousRepository;
use App\Repository\SpecialiteRepository;
use Dompdf\Dompdf;
use Dompdf\Options;
use Doctrine\DBAL\Exception\UniqueConstraintViolationException;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractController
{
    private const ALLOWED_UPLOAD_EXTENSIONS = ['pdf', 'jpg', 'jpeg', 'png', 'webp'];
    private const MAX_UPLOAD_SIZE_BYTES = 8 * 1024 * 1024;

    #[Route('/dashboard', name: 'app_dashboard')]
    public function index(
        Request $request,
        EntityManagerInterface $entityManager,
        PatientRepository $patientRepository,
        RendezVousRepository $rendezVousRepository,
        ConsultationRepository $consultationRepository
    ): Response
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        /** @var User|null $user */
        $user = $this->getUser();
        $mustForceReconnect = $this->shouldForceMedecinReconnect($entityManager, $request, $user);
        $showApprovedReconnectModal = false;
        $latestDemande = null;
        $showRejectedModal = false;
        $showRendezVousStatusModal = false;
        $rendezVousStatusType = null;
        $rendezVousStatusItem = null;
        $showReportProposalModal = false;
        $reportProposalRendezVous = null;
        $showOrdonnanceReadyModal = false;
        $latestOrdonnance = null;

        if ($user) {
            $latestDemande = $entityManager->getRepository(DemandeMedecin::class)
                ->findOneBy(['user' => $user], ['id' => 'DESC']);

            if ($mustForceReconnect && $latestDemande !== null && $latestDemande->isAcceptee()) {
                $showApprovedReconnectModal = $this->showModalOncePerDemande(
                    $request,
                    'seen_approved_demande_modal_id',
                    $latestDemande
                );
            }

            if (!$showApprovedReconnectModal && $latestDemande !== null && $latestDemande->isRejetee()) {
                $showRejectedModal = $this->showModalOncePerDemande(
                    $request,
                    'seen_rejected_demande_modal_id',
                    $latestDemande
                );
            }

            if (
                !$showApprovedReconnectModal
                && !$showRejectedModal
                && $this->isGranted('ROLE_PATIENT')
            ) {
                $patient = $patientRepository->findOneByUser($user);
                if ($patient) {
                    $reportProposalRendezVous = $rendezVousRepository->findPendingReportResponseByPatient($patient);
                    if ($reportProposalRendezVous instanceof RendezVous) {
                        $showReportProposalModal = true;
                    } else {
                        $recentStatusRdv = $rendezVousRepository->findRecentByPatientAndStatuts(
                            $patient,
                            [StatutRendezVous::CONFIRME, StatutRendezVous::ANNULE]
                        );

                        foreach ($recentStatusRdv as $rdv) {
                            $statut = $rdv->getStatut();
                            if ($statut === StatutRendezVous::CONFIRME) {
                                $show = $this->showModalOncePerRendezVous(
                                    $request,
                                    'seen_confirmed_rdv_modal_ids',
                                    $rdv
                                );
                                if ($show) {
                                    $showRendezVousStatusModal = true;
                                    $rendezVousStatusType = 'confirme';
                                    $rendezVousStatusItem = $rdv;
                                    break;
                                }
                            }

                            if ($statut === StatutRendezVous::ANNULE) {
                                $show = $this->showModalOncePerRendezVous(
                                    $request,
                                    'seen_rejected_rdv_modal_ids',
                                    $rdv
                                );
                                if ($show) {
                                    $showRendezVousStatusModal = true;
                                    $rendezVousStatusType = 'annule';
                                    $rendezVousStatusItem = $rdv;
                                    break;
                                }
                            }
                        }
                    }

                    if (!$showRendezVousStatusModal) {
                        $latestOrdonnance = $consultationRepository->findLatestByPatient($patient);
                        if ($latestOrdonnance instanceof Consultation) {
                            $showOrdonnanceReadyModal = $this->showModalOncePerConsultation(
                                $request,
                                'seen_ready_ordonnance_ids',
                                $latestOrdonnance
                            );
                        }
                    }
                }
            }
        }

        if (!$showApprovedReconnectModal && $this->isGranted('ROLE_MEDECIN')) {
            return $this->redirectToRoute('app_medecin_dashboard');
        }

        return $this->render('dashboard/index.html.twig', [
            'showApprovedReconnectModal' => $showApprovedReconnectModal,
            'showRejectedModal' => $showRejectedModal,
            'rejectedDemande' => $latestDemande,
            'showRendezVousStatusModal' => $showRendezVousStatusModal,
            'rendezVousStatusType' => $rendezVousStatusType,
            'rendezVousStatusItem' => $rendezVousStatusItem,
            'showReportProposalModal' => $showReportProposalModal,
            'reportProposalRendezVous' => $reportProposalRendezVous,
            'showOrdonnanceReadyModal' => $showOrdonnanceReadyModal,
            'latestOrdonnance' => $latestOrdonnance,
        ]);
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
    public function appointments(
        PatientRepository $patientRepository,
        RendezVousRepository $rendezVousRepository,
        ConsultationRepository $consultationRepository
    ): Response {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        /** @var \App\Entity\User $user */
        $user = $this->getUser();

        $patient = $patientRepository->findOneByUser($user);

        if (!$patient) {
            $this->addFlash('error', 'Votre profil patient n\'a pas ete trouve.');
            return $this->redirectToRoute('app_dashboard');
        }

        $rendezVous = $rendezVousRepository->findByPatientOrderByDate($patient);
        $reportProposalRendezVous = $rendezVousRepository->findPendingReportResponseByPatient($patient);
        $consultationByRdv = [];
        foreach ($consultationRepository->findByPatientLatest($patient) as $consultation) {
            $rdvId = $consultation->getRendezVous()?->getId();
            if ($rdvId) {
                $consultationByRdv[$rdvId] = $consultation;
            }
        }

        return $this->render('dashboard/rendezvous.html.twig', [
            'rendezVous' => $rendezVous,
            'showReportProposalModal' => $reportProposalRendezVous instanceof RendezVous,
            'reportProposalRendezVous' => $reportProposalRendezVous,
            'consultationByRdv' => $consultationByRdv,
        ]);
    }

    #[Route('/appointments/{id}', name: 'app_appointment_show', methods: ['GET'])]
    public function showAppointment(
        int $id,
        PatientRepository $patientRepository,
        RendezVousRepository $rendezVousRepository,
        ConsultationRepository $consultationRepository
    ): Response {
        $this->denyAccessUnlessGranted('ROLE_PATIENT');

        /** @var User|null $user */
        $user = $this->getUser();
        if (!$user) {
            return $this->redirectToRoute('app_login');
        }

        $patient = $patientRepository->findOneByUser($user);
        if (!$patient) {
            $this->addFlash('error', 'Votre profil patient n a pas ete trouve.');
            return $this->redirectToRoute('app_dashboard');
        }

        $rendezVous = $rendezVousRepository->findOneBy([
            'id' => $id,
            'patient' => $patient,
        ]);

        if (!$rendezVous) {
            $this->addFlash('error', 'Rendez-vous introuvable.');
            return $this->redirectToRoute('app_appointments');
        }

        return $this->render('dashboard/rendezvous_details.html.twig', [
            'rendezVous' => $rendezVous,
            'consultation' => $consultationRepository->findOneByRendezVous($rendezVous),
        ]);
    }

    #[Route('/appointments/{id}/update', name: 'app_appointment_update', methods: ['POST'])]
    public function updateAppointment(
        int $id,
        Request $request,
        EntityManagerInterface $entityManager,
        PatientRepository $patientRepository,
        RendezVousRepository $rendezVousRepository,
        DisponibiliteRepository $disponibiliteRepository
    ): Response {
        $this->denyAccessUnlessGranted('ROLE_PATIENT');

        if (!$this->isCsrfTokenValid('update_appointment_' . $id, (string) $request->request->get('_token'))) {
            $this->addFlash('error', 'Jeton de securite invalide.');
            return $this->redirectToRoute('app_appointment_show', ['id' => $id]);
        }

        /** @var User|null $user */
        $user = $this->getUser();
        if (!$user) {
            return $this->redirectToRoute('app_login');
        }

        $patient = $patientRepository->findOneByUser($user);
        if (!$patient) {
            $this->addFlash('error', 'Votre profil patient n a pas ete trouve.');
            return $this->redirectToRoute('app_dashboard');
        }

        $rendezVous = $rendezVousRepository->findOneBy([
            'id' => $id,
            'patient' => $patient,
        ]);
        if (!$rendezVous) {
            $this->addFlash('error', 'Rendez-vous introuvable.');
            return $this->redirectToRoute('app_appointments');
        }

        if ($rendezVous->getStatut() === StatutRendezVous::ANNULE) {
            $this->addFlash('error', 'Ce rendez-vous est deja annule.');
            return $this->redirectToRoute('app_appointment_show', ['id' => $id]);
        }

        $dateInput = trim((string) $request->request->get('date_rdv', ''));
        $heureInput = trim((string) $request->request->get('heure_rdv', ''));

        $date = $this->parseDateInput($dateInput);
        if (!$date || $date < new \DateTimeImmutable('today')) {
            $this->addFlash('error', 'Date invalide.');
            return $this->redirectToRoute('app_appointment_show', ['id' => $id]);
        }

        if (!$this->isValidTimeHhmm($heureInput)) {
            $this->addFlash('error', 'Heure invalide.');
            return $this->redirectToRoute('app_appointment_show', ['id' => $id]);
        }

        $medecin = $rendezVous->getMedecin();
        if (!$medecin) {
            $this->addFlash('error', 'Medecin introuvable.');
            return $this->redirectToRoute('app_appointment_show', ['id' => $id]);
        }
        if ($medecin->getSpecialiteRef() && !$medecin->getSpecialiteRef()->isActive()) {
            $this->addFlash('error', 'La specialite de ce medecin est indisponible.');
            return $this->redirectToRoute('app_appointment_show', ['id' => $id]);
        }

        $jour = $this->jourFromDate($date);
        if (!$jour) {
            $this->addFlash('error', 'Jour invalide.');
            return $this->redirectToRoute('app_appointment_show', ['id' => $id]);
        }

        $disponibilite = $disponibiliteRepository->findOneByMedecinAndJour($medecin, $jour);
        if (!$disponibilite || !$this->isDisponibiliteActive($disponibilite)) {
            $this->addFlash('error', 'Ce medecin ne travaille pas ce jour.');
            return $this->redirectToRoute('app_appointment_show', ['id' => $id]);
        }

        if (!$this->isHeureInDisponibilite($disponibilite, $heureInput)) {
            $this->addFlash('error', 'L heure choisie ne correspond pas au planning du medecin.');
            return $this->redirectToRoute('app_appointment_show', ['id' => $id]);
        }

        $heure = $this->toTimeObject($heureInput);
        $rendezVousId = (int) $rendezVous->getId();
        if (
            $rendezVousId > 0
            && $rendezVousRepository->medecinHasRendezVousAtExcept($medecin, $date, $heure, $rendezVousId)
        ) {
            $this->addFlash('error', 'Ce medecin a deja un rendez-vous a cette heure.');
            return $this->redirectToRoute('app_appointment_show', ['id' => $id]);
        }

        $rendezVous->setDate($date);
        $rendezVous->setHeure($heure);
        $this->clearReportProposal($rendezVous);

        try {
            $entityManager->flush();
        } catch (UniqueConstraintViolationException) {
            $this->addFlash('error', 'Ce medecin a deja un rendez-vous a cette heure.');
            return $this->redirectToRoute('app_appointment_show', ['id' => $id]);
        }

        $this->addFlash('success', 'Rendez-vous modifie avec succes.');
        return $this->redirectToRoute('app_appointment_show', ['id' => $id]);
    }

    #[Route('/appointments/{id}/cancel', name: 'app_appointment_cancel', methods: ['POST'])]
    public function cancelAppointment(
        int $id,
        Request $request,
        EntityManagerInterface $entityManager,
        PatientRepository $patientRepository,
        RendezVousRepository $rendezVousRepository
    ): Response {
        $this->denyAccessUnlessGranted('ROLE_PATIENT');

        if (!$this->isCsrfTokenValid('cancel_appointment_' . $id, (string) $request->request->get('_token'))) {
            $this->addFlash('error', 'Jeton de securite invalide.');
            return $this->redirectToRoute('app_appointment_show', ['id' => $id]);
        }

        /** @var User|null $user */
        $user = $this->getUser();
        if (!$user) {
            return $this->redirectToRoute('app_login');
        }

        $patient = $patientRepository->findOneByUser($user);
        if (!$patient) {
            $this->addFlash('error', 'Votre profil patient n a pas ete trouve.');
            return $this->redirectToRoute('app_dashboard');
        }

        $rendezVous = $rendezVousRepository->findOneBy([
            'id' => $id,
            'patient' => $patient,
        ]);
        if (!$rendezVous) {
            $this->addFlash('error', 'Rendez-vous introuvable.');
            return $this->redirectToRoute('app_appointments');
        }

        if ($rendezVous->getStatut() === StatutRendezVous::ANNULE) {
            $this->addFlash('error', 'Ce rendez-vous est deja annule.');
            return $this->redirectToRoute('app_appointment_show', ['id' => $id]);
        }

        $rendezVous->setStatut(StatutRendezVous::ANNULE);
        $this->clearReportProposal($rendezVous);
        $entityManager->flush();

        $this->addFlash('success', 'Rendez-vous annule avec succes.');
        return $this->redirectToRoute('app_appointment_show', ['id' => $id]);
    }

    #[Route('/appointments/{id}/report/accept', name: 'app_appointment_report_accept', methods: ['POST'])]
    public function acceptReportProposal(
        int $id,
        Request $request,
        EntityManagerInterface $entityManager,
        PatientRepository $patientRepository,
        RendezVousRepository $rendezVousRepository
    ): Response {
        $this->denyAccessUnlessGranted('ROLE_PATIENT');

        if (!$this->isCsrfTokenValid('accept_report_' . $id, (string) $request->request->get('_token'))) {
            $this->addFlash('error', 'Jeton de securite invalide.');
            return $this->redirectToRoute('app_dashboard');
        }

        /** @var User|null $user */
        $user = $this->getUser();
        if (!$user) {
            return $this->redirectToRoute('app_login');
        }

        $patient = $patientRepository->findOneByUser($user);
        if (!$patient) {
            $this->addFlash('error', 'Votre profil patient n a pas ete trouve.');
            return $this->redirectToRoute('app_dashboard');
        }

        $rendezVous = $rendezVousRepository->findOneBy([
            'id' => $id,
            'patient' => $patient,
        ]);
        if (!$rendezVous || !$rendezVous->isReportPendingPatientResponse()) {
            $this->addFlash('error', 'Aucun report en attente pour ce rendez-vous.');
            return $this->redirectToRoute('app_dashboard');
        }

        $proposedDate = $rendezVous->getProposedDate();
        $proposedHeure = $rendezVous->getProposedHeure();
        if (!$proposedDate || !$proposedHeure) {
            $this->addFlash('error', 'Le report propose est incomplet.');
            return $this->redirectToRoute('app_dashboard');
        }

        $rendezVous
            ->setDate($proposedDate)
            ->setHeure($proposedHeure)
            ->setStatut(StatutRendezVous::CONFIRME);
        $this->clearReportProposal($rendezVous);

        $entityManager->flush();

        $this->addFlash('success', 'Report accepte. Le rendez-vous est confirme.');
        return $this->redirectToRoute('app_dashboard');
    }

    #[Route('/appointments/{id}/report/reject', name: 'app_appointment_report_reject', methods: ['POST'])]
    public function rejectReportProposal(
        int $id,
        Request $request,
        EntityManagerInterface $entityManager,
        PatientRepository $patientRepository,
        RendezVousRepository $rendezVousRepository
    ): Response {
        $this->denyAccessUnlessGranted('ROLE_PATIENT');

        if (!$this->isCsrfTokenValid('reject_report_' . $id, (string) $request->request->get('_token'))) {
            $this->addFlash('error', 'Jeton de securite invalide.');
            return $this->redirectToRoute('app_dashboard');
        }

        /** @var User|null $user */
        $user = $this->getUser();
        if (!$user) {
            return $this->redirectToRoute('app_login');
        }

        $patient = $patientRepository->findOneByUser($user);
        if (!$patient) {
            $this->addFlash('error', 'Votre profil patient n a pas ete trouve.');
            return $this->redirectToRoute('app_dashboard');
        }

        $rendezVous = $rendezVousRepository->findOneBy([
            'id' => $id,
            'patient' => $patient,
        ]);
        if (!$rendezVous || !$rendezVous->isReportPendingPatientResponse()) {
            $this->addFlash('error', 'Aucun report en attente pour ce rendez-vous.');
            return $this->redirectToRoute('app_dashboard');
        }

        $rendezVous->setStatut(StatutRendezVous::ANNULE);
        $this->clearReportProposal($rendezVous);
        $entityManager->flush();

        $this->addFlash('success', 'Vous avez refuse le report. Le rendez-vous est annule.');
        return $this->redirectToRoute('app_dashboard');
    }

    #[Route('/cabinets', name: 'app_cabinets')]
    public function cabinets(): Response
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        return new Response('Page cabinets - A developper');
    }

    #[Route('/consultations', name: 'app_consultations')]
    public function consultations(
        PatientRepository $patientRepository,
        ConsultationRepository $consultationRepository
    ): Response
    {
        $this->denyAccessUnlessGranted('ROLE_PATIENT');

        /** @var User|null $user */
        $user = $this->getUser();
        if (!$user) {
            return $this->redirectToRoute('app_login');
        }

        $patient = $patientRepository->findOneByUser($user);
        if (!$patient) {
            $this->addFlash('error', 'Votre profil patient n a pas ete trouve.');
            return $this->redirectToRoute('app_dashboard');
        }

        return $this->render('dashboard/consultations.html.twig', [
            'consultations' => $consultationRepository->findByPatientLatest($patient),
        ]);
    }

    #[Route('/consultations/{id}/ordonnance-pdf', name: 'app_consultation_ordonnance_pdf', methods: ['GET'])]
    public function downloadOrdonnancePdf(
        int $id,
        ConsultationRepository $consultationRepository,
        PatientRepository $patientRepository,
        MedecinRepository $medecinRepository
    ): Response {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        /** @var User|null $user */
        $user = $this->getUser();
        if (!$user) {
            return $this->redirectToRoute('app_login');
        }

        $consultation = $consultationRepository->find($id);
        if (!$consultation) {
            throw $this->createNotFoundException('Consultation introuvable.');
        }

        $patient = $patientRepository->findOneByUser($user);
        $medecin = $medecinRepository->findOneBy(['user' => $user]);
        $isAllowedPatient = $patient && $consultation->getPatient()?->getId() === $patient->getId();
        $isAllowedMedecin = $medecin && $consultation->getMedecin()?->getId() === $medecin->getId();

        if (!$isAllowedPatient && !$isAllowedMedecin) {
            throw $this->createAccessDeniedException('Acces refuse a cette ordonnance.');
        }

        $options = new Options();
        $options->set('isRemoteEnabled', true);
        $options->set('defaultFont', 'DejaVu Sans');

        $dompdf = new Dompdf($options);
        $html = $this->renderView('pdf/ordonnance.html.twig', [
            'consultation' => $consultation,
            'generatedAt' => new \DateTimeImmutable(),
        ]);

        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4');
        $dompdf->render();

        $patientName = trim(sprintf(
            '%s-%s',
            strtolower((string) ($consultation->getPatient()?->getUser()?->getNom() ?? 'patient')),
            strtolower((string) ($consultation->getPatient()?->getUser()?->getPrenom() ?? 'medicare'))
        ));
        $safePatientName = preg_replace('/[^a-z0-9\-]+/', '-', $patientName) ?? 'patient';
        $filename = sprintf('ordonnance-%s-%d.pdf', trim($safePatientName, '-'), (int) $consultation->getId());

        return new Response(
            $dompdf->output(),
            200,
            [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => sprintf('attachment; filename="%s"', $filename),
            ]
        );
    }

    #[Route('/demande-medecin', name: 'app_demande_medecin', methods: ['GET', 'POST'])]
    public function demandeMedecin(
        Request $request,
        EntityManagerInterface $entityManager,
        SpecialiteRepository $specialiteRepository
    ): Response {
        $this->denyAccessUnlessGranted('ROLE_PATIENT');

        /** @var User $user */
        $user = $this->getUser();

        $demandeRepository = $entityManager->getRepository(DemandeMedecin::class);
        $existingDemande = $demandeRepository
            ->findOneBy(['user' => $user], ['id' => 'DESC']);
        $pendingDemande = $demandeRepository
            ->findOneBy(['user' => $user, 'statut' => StatutDemandeMedecin::EN_ATTENTE], ['id' => 'DESC']);

        $requestSubmitted = $request->query->get('submitted') === 'true';
        $showApprovedReconnectModal = $this->shouldForceMedecinReconnect($entityManager, $request, $user);
        $hasPendingDemande = $pendingDemande !== null;
        $showPendingModal = !$requestSubmitted && $hasPendingDemande && !$showApprovedReconnectModal;
        $canSubmitDemande = !$hasPendingDemande && !$showApprovedReconnectModal;

        if ($request->isMethod('POST')) {
            if ($showApprovedReconnectModal) {
                $this->addFlash('error', 'Votre demande a ete approuvee. Veuillez vous reconnecter.');
                return $this->redirectToRoute('app_demande_medecin');
            }

            if ($hasPendingDemande) {
                $this->addFlash('error', 'Vous avez deja une demande en cours. Veuillez attendre.');
                return $this->redirectToRoute('app_demande_medecin');
            }

            $specialiteId = (int) $request->request->get('specialite_id', 0);
            $cabinet = trim((string) $request->request->get('cabinet', ''));
            $adresse = trim((string) $request->request->get('adresse', ''));
            $bio = trim((string) $request->request->get('bio', ''));

            $selectedSpecialite = null;
            if ($specialiteId > 0) {
                $selectedSpecialite = $specialiteRepository->findOneActiveById($specialiteId);
            }

            $certificatFiles = $this->normalizeUploadedFiles($request->files->get('certificats', []));
            $carteIdentiteFile = $request->files->get('carte_identite');
            $carteServiceFile = $request->files->get('carte_service');

            if (!$selectedSpecialite || $cabinet === '' || $adresse === '') {
                $this->addFlash('error', 'Specialite, cabinet et adresse sont obligatoires.');
                return $this->redirectToRoute('app_demande_medecin');
            }

            $selectedSpecialiteNom = trim((string) $selectedSpecialite->getNom());
            if ($selectedSpecialiteNom === '') {
                $this->addFlash('error', 'La specialite selectionnee est invalide.');
                return $this->redirectToRoute('app_demande_medecin');
            }

            if (mb_strlen($cabinet) < 2 || mb_strlen($cabinet) > 120) {
                $this->addFlash('error', 'Le nom du cabinet est invalide (2 a 120 caracteres).');
                return $this->redirectToRoute('app_demande_medecin');
            }

            if (mb_strlen($adresse) < 5 || mb_strlen($adresse) > 255) {
                $this->addFlash('error', 'L\'adresse est invalide (5 a 255 caracteres).');
                return $this->redirectToRoute('app_demande_medecin');
            }

            if ($bio !== '' && mb_strlen($bio) > 1500) {
                $this->addFlash('error', 'La bio est trop longue (1500 caracteres max).');
                return $this->redirectToRoute('app_demande_medecin');
            }

            if (count($certificatFiles) === 0) {
                $this->addFlash('error', 'Ajoutez au moins un certificat (image ou PDF).');
                return $this->redirectToRoute('app_demande_medecin');
            }

            if (count($certificatFiles) > 5) {
                $this->addFlash('error', 'Maximum 5 certificats autorises.');
                return $this->redirectToRoute('app_demande_medecin');
            }

            if (!$carteIdentiteFile instanceof UploadedFile && !$carteServiceFile instanceof UploadedFile) {
                $this->addFlash('error', 'Ajoutez une carte de service ou une carte d\'identite.');
                return $this->redirectToRoute('app_demande_medecin');
            }

            $uploadDir = $this->getParameter('kernel.project_dir') . '/public/uploads/demandes-medecin';

            try {
                $storedCertificats = [];
                foreach ($certificatFiles as $certificatFile) {
                    $storedCertificats[] = $this->storeUploadedDocument($certificatFile, $uploadDir, 'certificat');
                }

                $storedCarteIdentite = null;
                if ($carteIdentiteFile instanceof UploadedFile) {
                    $storedCarteIdentite = $this->storeUploadedDocument($carteIdentiteFile, $uploadDir, 'carte-identite');
                }

                $storedCarteService = null;
                if ($carteServiceFile instanceof UploadedFile) {
                    $storedCarteService = $this->storeUploadedDocument($carteServiceFile, $uploadDir, 'carte-service');
                }
            } catch (\RuntimeException $e) {
                $this->addFlash('error', $e->getMessage());
                return $this->redirectToRoute('app_demande_medecin');
            }

            $demande = new DemandeMedecin();
            $demande->setUser($user);
            $demande->setSpecialite($selectedSpecialiteNom);
            $demande->setSpecialiteRef($selectedSpecialite);
            $demande->setCabinet($cabinet);
            $demande->setAdresse($adresse);
            $demande->setBio($bio !== '' ? $bio : null);
            $demande->setCertificats(implode(',', $storedCertificats));
            $demande->setCarteIdentite($storedCarteIdentite);
            $demande->setCarteService($storedCarteService);

            $entityManager->persist($demande);
            $entityManager->flush();

            $this->addFlash('success', 'Votre demande a ete envoyee avec succes.');
            return $this->redirectToRoute('app_demande_medecin', ['submitted' => 'true']);
        }

        $specialites = $specialiteRepository->findActiveOrderedByName();

        return $this->render('dashboard/demande_medecin.html.twig', [
            'existingDemande' => $existingDemande,
            'statusDemande' => $pendingDemande ?? $existingDemande,
            'canSubmitDemande' => $canSubmitDemande,
            'showPendingModal' => $showPendingModal,
            'showApprovedReconnectModal' => $showApprovedReconnectModal,
            'specialites' => $specialites,
        ]);
    }

    #[Route('/prendre-rendez-vous', name: 'app_prendre_rdv', methods: ['GET', 'POST'])]
    public function prendreRendezVous(
        Request $request,
        EntityManagerInterface $entityManager,
        MedecinRepository $medecinRepository,
        PatientRepository $patientRepository,
        RendezVousRepository $rendezVousRepository,
        DisponibiliteRepository $disponibiliteRepository
    ): Response {
        $this->denyAccessUnlessGranted('ROLE_PATIENT');

        /** @var User $user */
        $user = $this->getUser();
        $patient = $patientRepository->findOneByUser($user);
        if (!$patient) {
            $this->addFlash('error', 'Votre profil patient est introuvable.');
            return $this->redirectToRoute('app_dashboard');
        }

        if ($request->isMethod('POST')) {
            $medecinId = (int) $request->request->get('medecin_id', 0);
            $dateInput = trim((string) $request->request->get('date_rdv', ''));
            $heureInput = trim((string) $request->request->get('heure_rdv', ''));

            $medecin = $medecinRepository->find($medecinId);
            if (!$medecin) {
                $this->addFlash('error', 'Medecin introuvable.');
                return $this->redirectToRoute('app_prendre_rdv');
            }
            if ($medecin->getSpecialiteRef() && !$medecin->getSpecialiteRef()->isActive()) {
                $this->addFlash('error', 'La specialite de ce medecin est indisponible.');
                return $this->redirectToRoute('app_prendre_rdv');
            }

            $date = $this->parseDateInput($dateInput);
            if (!$date || $date < new \DateTimeImmutable('today')) {
                $this->addFlash('error', 'Date invalide.');
                return $this->redirectToRoute('app_prendre_rdv');
            }

            if (!$this->isValidTimeHhmm($heureInput)) {
                $this->addFlash('error', 'Heure invalide.');
                return $this->redirectToRoute('app_prendre_rdv');
            }

            $jour = $this->jourFromDate($date);
            if (!$jour) {
                $this->addFlash('error', 'Jour invalide.');
                return $this->redirectToRoute('app_prendre_rdv');
            }

            $disponibilite = $disponibiliteRepository->findOneByMedecinAndJour($medecin, $jour);
            if (!$disponibilite || !$this->isDisponibiliteActive($disponibilite)) {
                $this->addFlash('error', 'Ce medecin ne travaille pas ce jour.');
                return $this->redirectToRoute('app_prendre_rdv');
            }

            if (!$this->isHeureInDisponibilite($disponibilite, $heureInput)) {
                $this->addFlash('error', 'L heure choisie ne correspond pas au planning du medecin.');
                return $this->redirectToRoute('app_prendre_rdv');
            }

            $heure = $this->toTimeObject($heureInput);
            if ($rendezVousRepository->medecinHasRendezVousAt($medecin, $date, $heure)) {
                $this->addFlash('error', 'Ce medecin a deja un rendez-vous a cette heure.');
                return $this->redirectToRoute('app_prendre_rdv');
            }

            $rendezVous = new RendezVous();
            $rendezVous->setPatient($patient);
            $rendezVous->setMedecin($medecin);
            $rendezVous->setDate($date);
            $rendezVous->setHeure($heure);
            $rendezVous->setStatut(StatutRendezVous::EN_ATTENTE);

            $entityManager->persist($rendezVous);
            try {
                $entityManager->flush();
            } catch (UniqueConstraintViolationException) {
                $this->addFlash('error', 'Ce medecin a deja un rendez-vous a cette heure.');
                return $this->redirectToRoute('app_prendre_rdv');
            }

            $this->addFlash('success', 'Rendez-vous enregistre avec succes.');
            return $this->redirectToRoute('app_appointments');
        }

        $medecins = $medecinRepository->findBy([], ['id' => 'ASC']);
        $specialites = [];
        $medecinsBySpecialite = [];
        foreach ($medecins as $medecin) {
            $specialiteRef = $medecin->getSpecialiteRef();
            if ($specialiteRef && !$specialiteRef->isActive()) {
                continue;
            }

            $specialiteLabelRaw = $specialiteRef
                ? trim((string) $specialiteRef->getNom())
                : trim((string) $medecin->getSpecialite());
            if ($specialiteLabelRaw === '') {
                continue;
            }

            $specialiteKey = $this->normalizeSpecialiteKey($specialiteLabelRaw);
            if (!isset($specialites[$specialiteKey])) {
                $specialites[$specialiteKey] = [
                    'key' => $specialiteKey,
                    'label' => $this->formatSpecialiteLabel($specialiteLabelRaw),
                ];
            }

            $medecinUser = $medecin->getUser();
            $medecinsBySpecialite[$specialiteKey][] = [
                'id' => $medecin->getId(),
                'nomComplet' => trim(sprintf(
                    'Dr %s %s',
                    (string) ($medecinUser?->getPrenom() ?? ''),
                    (string) ($medecinUser?->getNom() ?? '')
                )),
                'specialite' => $specialites[$specialiteKey]['label'],
                'cabinet' => (string) ($medecin->getCabinet() ?? ''),
                'bio' => (string) ($medecin->getBio() ?? ''),
            ];
        }

        return $this->render('rendezvous/prendre_rdv.html.twig', [
            'specialites' => array_values($specialites),
            'medecinsBySpecialite' => $medecinsBySpecialite,
        ]);
    }

    #[Route('/api/rendez-vous/jours-disponibles/{id}', name: 'app_rdv_jours_disponibles', methods: ['GET'])]
    public function joursDisponibles(
        int $id,
        MedecinRepository $medecinRepository,
        DisponibiliteRepository $disponibiliteRepository
    ): JsonResponse {
        $this->denyAccessUnlessGranted('ROLE_PATIENT');

        $medecin = $medecinRepository->find($id);
        if (!$medecin) {
            return $this->json(['jours' => []], 404);
        }
        if ($medecin->getSpecialiteRef() && !$medecin->getSpecialiteRef()->isActive()) {
            return $this->json(['jours' => []]);
        }

        $planningMap = $disponibiliteRepository->findPlanningMapByMedecin($medecin);
        $today = new \DateTimeImmutable('today');
        $jours = [];
        foreach (JourSemaine::cases() as $jour) {
            $dispo = $planningMap[$jour->value] ?? null;
            if (!$dispo instanceof Disponibilite || !$this->isDisponibiliteActive($dispo)) {
                continue;
            }

            $nextDate = $this->nextDateForJour($today, $jour);
            $jours[] = [
                'date' => $nextDate->format('Y-m-d'),
                'label' => $this->formatJourLabel($jour),
            ];
        }

        return $this->json(['jours' => $jours]);
    }

    #[Route('/api/rendez-vous/horaires/{id}', name: 'app_rdv_horaires', methods: ['GET'])]
    public function horairesDisponibles(
        int $id,
        Request $request,
        MedecinRepository $medecinRepository,
        DisponibiliteRepository $disponibiliteRepository,
        RendezVousRepository $rendezVousRepository
    ): JsonResponse {
        $this->denyAccessUnlessGranted('ROLE_PATIENT');

        $dateInput = trim((string) $request->query->get('date', ''));
        $date = $this->parseDateInput($dateInput);
        if (!$date || $date < new \DateTimeImmutable('today')) {
            return $this->json(['slots' => []], 400);
        }

        $medecin = $medecinRepository->find($id);
        if (!$medecin) {
            return $this->json(['slots' => []], 404);
        }
        if ($medecin->getSpecialiteRef() && !$medecin->getSpecialiteRef()->isActive()) {
            return $this->json(['slots' => []]);
        }

        $jour = $this->jourFromDate($date);
        if (!$jour) {
            return $this->json(['slots' => []], 400);
        }

        $dispo = $disponibiliteRepository->findOneByMedecinAndJour($medecin, $jour);
        if (!$dispo || !$this->isDisponibiliteActive($dispo)) {
            return $this->json(['slots' => []]);
        }

        $slots = $this->buildSlotsForDisponibilite($dispo);
        if (empty($slots)) {
            return $this->json(['slots' => []]);
        }

        $booked = $rendezVousRepository->findBookedHeuresForMedecinAndDate($medecin, $date);
        $bookedMap = array_fill_keys($booked, true);

        $result = [];
        foreach ($slots as $slot) {
            $available = !isset($bookedMap[$slot]);
            $result[] = [
                'time' => $slot,
                'label' => $slot,
                'available' => $available,
                'message' => $available ? '' : 'Le docteur a deja un rendez-vous a cette heure.',
            ];
        }

        return $this->json(['slots' => $result]);
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

    private function isValidTimeHhmm(string $value): bool
    {
        if (!preg_match('/^\d{2}:\d{2}$/', $value)) {
            return false;
        }

        [$hour, $minute] = explode(':', $value);
        $h = (int) $hour;
        $m = (int) $minute;

        return $h >= 0 && $h <= 23 && in_array($m, [0, 30], true);
    }

    private function toTimeObject(string $hhmm): \DateTimeImmutable
    {
        return new \DateTimeImmutable(sprintf('1970-01-01 %s:00', $hhmm));
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

    private function nextDateForJour(\DateTimeImmutable $from, JourSemaine $jour): \DateTimeImmutable
    {
        $currentIndex = (int) $from->format('N');
        $targetIndex = $this->jourToIsoIndex($jour);
        $offset = ($targetIndex - $currentIndex + 7) % 7;

        return $from->modify(sprintf('+%d day', $offset));
    }

    private function jourToIsoIndex(JourSemaine $jour): int
    {
        return match ($jour) {
            JourSemaine::LUNDI => 1,
            JourSemaine::MARDI => 2,
            JourSemaine::MERCREDI => 3,
            JourSemaine::JEUDI => 4,
            JourSemaine::VENDREDI => 5,
            JourSemaine::SAMEDI => 6,
            JourSemaine::DIMANCHE => 7,
        };
    }

    private function formatJourLabel(JourSemaine $jour): string
    {
        return match ($jour) {
            JourSemaine::LUNDI => 'Lundi',
            JourSemaine::MARDI => 'Mardi',
            JourSemaine::MERCREDI => 'Mercredi',
            JourSemaine::JEUDI => 'Jeudi',
            JourSemaine::VENDREDI => 'Vendredi',
            JourSemaine::SAMEDI => 'Samedi',
            JourSemaine::DIMANCHE => 'Dimanche',
        };
    }

    /**
     * @param UploadedFile|array<int, UploadedFile>|null $files
     * @return array<int, UploadedFile>
     */
    private function normalizeUploadedFiles(UploadedFile|array|null $files): array
    {
        if ($files instanceof UploadedFile) {
            return [$files];
        }

        if (!is_array($files)) {
            return [];
        }

        return array_values(array_filter($files, static fn ($file) => $file instanceof UploadedFile));
    }

    private function storeUploadedDocument(UploadedFile $file, string $targetDirectory, string $prefix): string
    {
        if (!$file->isValid()) {
            throw new \RuntimeException('Le fichier envoye est invalide.');
        }

        if (($file->getSize() ?? 0) > self::MAX_UPLOAD_SIZE_BYTES) {
            throw new \RuntimeException('Un fichier depasse la taille maximale autorisee (8 MB).');
        }

        $extension = strtolower((string) $file->getClientOriginalExtension());
        if ($extension === '' || !in_array($extension, self::ALLOWED_UPLOAD_EXTENSIONS, true)) {
            throw new \RuntimeException('Format invalide. Formats acceptes: PDF, JPG, JPEG, PNG, WEBP.');
        }

        if (!is_dir($targetDirectory) && !mkdir($targetDirectory, 0775, true) && !is_dir($targetDirectory)) {
            throw new \RuntimeException('Impossible de creer le dossier de televersement.');
        }

        $safeFilename = sprintf('%s-%s.%s', $prefix, bin2hex(random_bytes(8)), $extension);

        try {
            $file->move($targetDirectory, $safeFilename);
        } catch (FileException) {
            throw new \RuntimeException('Echec lors de l\'envoi du fichier.');
        }

        return 'uploads/demandes-medecin/' . $safeFilename;
    }

    private function shouldForceMedecinReconnect(
        EntityManagerInterface $entityManager,
        Request $request,
        ?User $user
    ): bool
    {
        if (!$user) {
            return false;
        }

        if ($request->getSession()->get('medecin_recently_authenticated', false) === true) {
            return false;
        }

        $demandeAcceptee = $entityManager->getRepository(DemandeMedecin::class)->findOneBy(
            ['user' => $user, 'statut' => StatutDemandeMedecin::ACCEPTEE],
            ['id' => 'DESC']
        );

        return $demandeAcceptee !== null;
    }

    private function showModalOncePerDemande(
        Request $request,
        string $sessionKey,
        DemandeMedecin $demande
    ): bool {
        $demandeId = $demande->getId();
        if (!$demandeId) {
            return false;
        }

        $seenDemandeId = (int) $request->getSession()->get($sessionKey, 0);
        if ($seenDemandeId === $demandeId) {
            return false;
        }

        $request->getSession()->set($sessionKey, $demandeId);
        return true;
    }

    private function showModalOncePerRendezVous(
        Request $request,
        string $sessionKey,
        RendezVous $rendezVous
    ): bool {
        $rdvId = $rendezVous->getId();
        if (!$rdvId) {
            return false;
        }

        $seen = $request->getSession()->get($sessionKey, []);
        if (!is_array($seen)) {
            $seen = [];
        }

        if (in_array($rdvId, $seen, true)) {
            return false;
        }

        $seen[] = $rdvId;
        $request->getSession()->set($sessionKey, $seen);
        return true;
    }

    private function showModalOncePerConsultation(
        Request $request,
        string $sessionKey,
        Consultation $consultation
    ): bool {
        $consultationId = $consultation->getId();
        if (!$consultationId) {
            return false;
        }

        $seen = $request->getSession()->get($sessionKey, []);
        if (!is_array($seen)) {
            $seen = [];
        }

        if (in_array($consultationId, $seen, true)) {
            return false;
        }

        $seen[] = $consultationId;
        $request->getSession()->set($sessionKey, $seen);

        return true;
    }

    private function clearReportProposal(RendezVous $rendezVous): void
    {
        $rendezVous
            ->setProposedDate(null)
            ->setProposedHeure(null)
            ->setReportPendingPatientResponse(false);
    }

    private function normalizeSpecialiteKey(string $specialite): string
    {
        $value = mb_strtolower(trim($specialite), 'UTF-8');
        $value = preg_replace('/\s+/u', ' ', $value) ?? $value;

        $value = strtr($value, [
            'à' => 'a', 'á' => 'a', 'â' => 'a', 'ä' => 'a', 'ã' => 'a', 'å' => 'a',
            'ç' => 'c',
            'è' => 'e', 'é' => 'e', 'ê' => 'e', 'ë' => 'e',
            'ì' => 'i', 'í' => 'i', 'î' => 'i', 'ï' => 'i',
            'ñ' => 'n',
            'ò' => 'o', 'ó' => 'o', 'ô' => 'o', 'ö' => 'o', 'õ' => 'o',
            'ù' => 'u', 'ú' => 'u', 'û' => 'u', 'ü' => 'u',
            'ý' => 'y', 'ÿ' => 'y',
            'œ' => 'oe', 'æ' => 'ae',
        ]);

        if (function_exists('iconv')) {
            $transliterated = iconv('UTF-8', 'ASCII//TRANSLIT//IGNORE', $value);
            if ($transliterated !== false) {
                $value = strtolower($transliterated);
            }
        }

        $value = preg_replace('/[^a-z0-9]+/u', ' ', $value) ?? $value;
        $value = preg_replace('/\s+/u', ' ', $value) ?? $value;

        return trim($value);
    }

    private function formatSpecialiteLabel(string $specialite): string
    {
        $label = trim($specialite);
        $label = preg_replace('/\s+/u', ' ', $label) ?? $label;

        if ($label === '') {
            return $label;
        }

        return mb_convert_case($label, MB_CASE_TITLE, 'UTF-8');
    }
}
