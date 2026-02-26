<?php

namespace App\Controller;

use App\Entity\Disponibilite;
use App\Entity\Medecin;
use App\Entity\Patient;
use App\Entity\RendezVous;
use App\Entity\User;
use App\Enum\JourSemaine;
use App\Enum\StatutRendezVous;
use App\Repository\DisponibiliteRepository;
use App\Repository\MedecinRepository;
use App\Repository\PatientRepository;
use App\Repository\RendezVousRepository;
use App\Service\GoogleCalendarService;
use App\Service\PatientAssistantService;
use App\Service\SendGridService;
use Doctrine\DBAL\Exception\UniqueConstraintViolationException;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/api/assistant')]
class PatientAssistantController extends AbstractController
{
    #[Route('/triage', name: 'app_assistant_triage', methods: ['POST'])]
    public function triage(
        Request $request,
        PatientAssistantService $assistantService,
        PatientRepository $patientRepository,
        MedecinRepository $medecinRepository,
        DisponibiliteRepository $disponibiliteRepository,
        RendezVousRepository $rendezVousRepository
    ): JsonResponse {
        $this->denyAccessUnlessGranted('ROLE_PATIENT');

        $payload = json_decode((string) $request->getContent(), true);
        if (!is_array($payload)) {
            return $this->json(['error' => 'Payload invalide.'], 400);
        }

        $symptoms = trim((string) ($payload['symptoms'] ?? ''));
        if (mb_strlen($symptoms) < 4) {
            return $this->json(['error' => 'Veuillez decrire vos symptomes avec plus de details.'], 422);
        }

        /** @var User|null $user */
        $user = $this->getUser();
        if (!$user) {
            return $this->json(['error' => 'Utilisateur introuvable.'], 401);
        }

        $patient = $patientRepository->findOneByUser($user);
        if (!$patient instanceof Patient) {
            return $this->json(['error' => 'Profil patient introuvable.'], 404);
        }

        $allMedecins = $this->findActiveMedecins($medecinRepository);
        $specialites = $this->extractSpecialites($allMedecins);
        $analysis = $assistantService->analyze(
            $symptoms,
            is_array($payload['answers'] ?? null) ? $payload['answers'] : [],
            $specialites
        );

        $specialityKeys = array_map(
            static fn (array $row): string => (string) ($row['key'] ?? ''),
            $analysis['specialites']
        );
        $specialityKeys = array_values(array_filter($specialityKeys, static fn (string $key): bool => $key !== ''));

        $recommendedMedecins = $this->filterMedecinsBySpecialiteKeys($allMedecins, $specialityKeys, 6);
        $slots = $this->buildSlotSuggestions(
            $recommendedMedecins,
            $analysis['urgency']['level'],
            $disponibiliteRepository,
            $rendezVousRepository
        );

        $doctorRows = [];
        foreach ($recommendedMedecins as $medecin) {
            $doctorRows[] = [
                'id' => $medecin->getId(),
                'nom' => trim(sprintf(
                    'Dr %s %s',
                    (string) ($medecin->getUser()?->getPrenom() ?? ''),
                    (string) ($medecin->getUser()?->getNom() ?? '')
                )),
                'specialite' => $this->displaySpecialite($medecin),
                'cabinet' => (string) ($medecin->getCabinet() ?? ''),
            ];
        }

        return $this->json([
            'urgency' => $analysis['urgency'],
            'specialites' => $analysis['specialites'],
            'doctors' => $doctorRows,
            'slots' => $slots,
        ]);
    }

    #[Route('/book', name: 'app_assistant_book', methods: ['POST'])]
    public function book(
        Request $request,
        EntityManagerInterface $entityManager,
        PatientRepository $patientRepository,
        MedecinRepository $medecinRepository,
        DisponibiliteRepository $disponibiliteRepository,
        RendezVousRepository $rendezVousRepository,
        GoogleCalendarService $googleCalendarService,
        SendGridService $sendGridService
    ): JsonResponse {
        $this->denyAccessUnlessGranted('ROLE_PATIENT');

        $payload = json_decode((string) $request->getContent(), true);
        if (!is_array($payload)) {
            return $this->json(['error' => 'Payload invalide.'], 400);
        }

        $medecinId = (int) ($payload['medecin_id'] ?? 0);
        $dateInput = trim((string) ($payload['date_rdv'] ?? ''));
        $heureInput = trim((string) ($payload['heure_rdv'] ?? ''));

        /** @var User|null $user */
        $user = $this->getUser();
        if (!$user) {
            return $this->json(['error' => 'Utilisateur introuvable.'], 401);
        }

        $patient = $patientRepository->findOneByUser($user);
        if (!$patient instanceof Patient) {
            return $this->json(['error' => 'Profil patient introuvable.'], 404);
        }

        $medecin = $medecinRepository->find($medecinId);
        if (!$medecin instanceof Medecin) {
            return $this->json(['error' => 'Medecin introuvable.'], 404);
        }
        if ($medecin->getSpecialiteRef() && !$medecin->getSpecialiteRef()->isActive()) {
            return $this->json(['error' => 'La specialite de ce medecin est indisponible.'], 422);
        }

        $date = $this->parseDateInput($dateInput);
        if (!$date || $date < new \DateTimeImmutable('today')) {
            return $this->json(['error' => 'Date invalide.'], 422);
        }

        if (!$this->isValidTimeInput($heureInput)) {
            return $this->json(['error' => 'Heure invalide.'], 422);
        }

        $jour = $this->jourFromDate($date);
        if (!$jour) {
            return $this->json(['error' => 'Jour invalide.'], 422);
        }

        $disponibilite = $disponibiliteRepository->findOneByMedecinAndJour($medecin, $jour);
        if (!$disponibilite || !$this->isDisponibiliteActive($disponibilite)) {
            return $this->json(['error' => 'Ce medecin ne travaille pas ce jour.'], 422);
        }

        if (!$this->isHeureInDisponibilite($disponibilite, $heureInput)) {
            return $this->json(['error' => 'L heure choisie ne correspond pas au planning du medecin.'], 422);
        }

        $heure = $this->toTimeObject($heureInput);
        if ($rendezVousRepository->medecinHasRendezVousAt($medecin, $date, $heure)) {
            return $this->json(['error' => 'Ce medecin a deja un rendez-vous a cette heure.'], 409);
        }

        $rendezVous = new RendezVous();
        $rendezVous
            ->setPatient($patient)
            ->setMedecin($medecin)
            ->setDate($date)
            ->setHeure($heure)
            ->setStatut(StatutRendezVous::EN_ATTENTE);

        $entityManager->persist($rendezVous);
        try {
            $entityManager->flush();
        } catch (UniqueConstraintViolationException) {
            return $this->json(['error' => 'Ce medecin a deja un rendez-vous a cette heure.'], 409);
        }

        $warnings = [];
        $googleEventLink = null;

        if ($googleCalendarService->isConfigured()) {
            try {
                $googleEventLink = $googleCalendarService->createEventForRendezVous($rendezVous);
            } catch (\Throwable $exception) {
                $warnings[] = 'Synchronisation Google Calendar echouee.';
            }
        } else {
            $warnings[] = 'Google Calendar non configure.';
        }

        if ($sendGridService->isConfigured()) {
            try {
                $sendGridService->sendAppointmentConfirmation($rendezVous, $googleEventLink);
            } catch (\Throwable $exception) {
                $warnings[] = 'Email SendGrid non envoye.';
            }
        }

        $response = [
            'success' => true,
            'message' => 'Rendez-vous reserve avec succes via assistant.',
            'redirect' => $this->generateUrl('app_appointments'),
            'rendez_vous_id' => $rendezVous->getId(),
        ];
        if ($warnings !== []) {
            $response['warnings'] = $warnings;
        }

        return $this->json($response);
    }

    /**
     * @return Medecin[]
     */
    private function findActiveMedecins(MedecinRepository $medecinRepository): array
    {
        $rows = $medecinRepository->findBy([], ['id' => 'ASC']);

        return array_values(array_filter(
            $rows,
            static fn (Medecin $medecin): bool => !$medecin->getSpecialiteRef() || $medecin->getSpecialiteRef()->isActive()
        ));
    }

    /**
     * @param Medecin[] $medecins
     * @return array<int, array{key: string, label: string}>
     */
    private function extractSpecialites(array $medecins): array
    {
        $seen = [];
        $result = [];
        foreach ($medecins as $medecin) {
            $raw = $this->displaySpecialite($medecin);
            if ($raw === '') {
                continue;
            }
            $key = $this->normalizeSpecialiteKey($raw);
            if ($key === '' || isset($seen[$key])) {
                continue;
            }
            $seen[$key] = true;
            $result[] = [
                'key' => $key,
                'label' => $raw,
            ];
        }

        return $result;
    }

    /**
     * @param Medecin[] $medecins
     * @param string[] $specialityKeys
     * @return Medecin[]
     */
    private function filterMedecinsBySpecialiteKeys(array $medecins, array $specialityKeys, int $limit = 6): array
    {
        $result = [];
        foreach ($medecins as $medecin) {
            $specialite = $this->displaySpecialite($medecin);
            $key = $this->normalizeSpecialiteKey($specialite);
            if ($specialityKeys !== [] && !in_array($key, $specialityKeys, true)) {
                continue;
            }
            $result[] = $medecin;
            if (count($result) >= $limit) {
                break;
            }
        }

        if ($result === [] && $specialityKeys !== []) {
            return array_slice($medecins, 0, $limit);
        }

        return $result;
    }

    /**
     * @param Medecin[] $medecins
     * @return array<int, array{
     *     medecin_id: int,
     *     medecin_nom: string,
     *     date: string,
     *     time: string,
     *     datetime_iso: string,
     *     label: string
     * }>
     */
    private function buildSlotSuggestions(
        array $medecins,
        string $urgencyLevel,
        DisponibiliteRepository $disponibiliteRepository,
        RendezVousRepository $rendezVousRepository
    ): array {
        $daysWindow = $urgencyLevel === 'urgent' ? 14 : 30;
        $suggestions = [];
        $now = new \DateTimeImmutable();
        $today = new \DateTimeImmutable('today');

        foreach ($medecins as $medecin) {
            $planningMap = $disponibiliteRepository->findPlanningMapByMedecin($medecin);
            $foundForDoctor = false;

            for ($offset = 0; $offset <= $daysWindow; $offset++) {
                $date = $today->modify(sprintf('+%d day', $offset));
                $jour = $this->jourFromDate($date);
                if (!$jour) {
                    continue;
                }

                $disponibilite = $planningMap[$jour->value] ?? null;
                if (!$disponibilite instanceof Disponibilite || !$this->isDisponibiliteActive($disponibilite)) {
                    continue;
                }

                $slots = $this->buildSlotsForDisponibilite($disponibilite);
                if ($slots === []) {
                    continue;
                }

                $booked = $rendezVousRepository->findBookedHeuresForMedecinAndDate($medecin, $date);
                $bookedMap = array_fill_keys($booked, true);

                foreach ($slots as $slot) {
                    if (isset($bookedMap[$slot])) {
                        continue;
                    }

                    $slotDateTime = new \DateTimeImmutable($date->format('Y-m-d') . ' ' . $slot . ':00');
                    if ($slotDateTime <= $now) {
                        continue;
                    }

                    $doctorName = trim(sprintf(
                        'Dr %s %s',
                        (string) ($medecin->getUser()?->getPrenom() ?? ''),
                        (string) ($medecin->getUser()?->getNom() ?? '')
                    ));

                    $suggestions[] = [
                        'medecin_id' => (int) ($medecin->getId() ?? 0),
                        'medecin_nom' => $doctorName,
                        'date' => $date->format('Y-m-d'),
                        'time' => $slot,
                        'datetime_iso' => $slotDateTime->format(\DateTimeInterface::ATOM),
                        'label' => sprintf(
                            '%s - %s a %s',
                            $doctorName,
                            $date->format('d/m/Y'),
                            $slot
                        ),
                    ];
                    $foundForDoctor = true;
                    break;
                }

                if ($foundForDoctor) {
                    break;
                }
            }
        }

        usort(
            $suggestions,
            static fn (array $a, array $b): int => strcmp((string) $a['datetime_iso'], (string) $b['datetime_iso'])
        );

        return array_slice($suggestions, 0, 6);
    }

    private function displaySpecialite(Medecin $medecin): string
    {
        $specialiteRef = $medecin->getSpecialiteRef();
        if ($specialiteRef) {
            return trim((string) $specialiteRef->getNom());
        }

        return trim((string) $medecin->getSpecialite());
    }

    private function normalizeSpecialiteKey(string $specialite): string
    {
        $value = mb_strtolower(trim($specialite), 'UTF-8');
        if ($value === '') {
            return '';
        }

        if (function_exists('iconv')) {
            $ascii = iconv('UTF-8', 'ASCII//TRANSLIT//IGNORE', $value);
            if ($ascii !== false) {
                $value = strtolower($ascii);
            }
        }

        $value = preg_replace('/[^a-z0-9]+/u', ' ', $value) ?? $value;
        $value = preg_replace('/\s+/u', ' ', $value) ?? $value;

        return trim($value);
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
}
