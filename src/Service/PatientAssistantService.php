<?php

namespace App\Service;

use Symfony\Component\HttpKernel\KernelInterface;

class PatientAssistantService
{
    /** @var array<string, mixed>|null */
    private ?array $dataset = null;

    public function __construct(private readonly KernelInterface $kernel)
    {
    }

    /**
     * @param array<int, array{key: string, label: string}> $availableSpecialites
     * @param array<string, mixed> $answers
     * @return array{
     *     urgency: array{level: string, score: int, message: string, reasons: string[]},
     *     specialites: array<int, array{key: string, label: string, score: int, reason: string}>
     * }
     */
    public function analyze(string $symptoms, array $answers, array $availableSpecialites): array
    {
        $dataset = $this->loadDataset();
        $symptomsNorm = $this->normalizeText($symptoms);
        $urgency = $this->buildUrgency($symptomsNorm, $answers, $dataset);
        $specialites = $this->buildSpecialityScores($symptomsNorm, $answers, $dataset, $availableSpecialites);

        return [
            'urgency' => $urgency,
            'specialites' => $specialites,
        ];
    }

    /**
     * @return array<string, mixed>
     */
    private function loadDataset(): array
    {
        if ($this->dataset !== null) {
            return $this->dataset;
        }

        $path = $this->kernel->getProjectDir() . '/config/assistant/symptoms_dataset.json';
        if (!is_file($path)) {
            $this->dataset = [
                'specialties' => [],
                'urgency_keywords' => [],
            ];
            return $this->dataset;
        }

        $raw = file_get_contents($path);
        if ($raw === false) {
            $this->dataset = [
                'specialties' => [],
                'urgency_keywords' => [],
            ];
            return $this->dataset;
        }

        $decoded = json_decode($raw, true);
        if (!is_array($decoded)) {
            $decoded = [];
        }

        $this->dataset = [
            'specialties' => is_array($decoded['specialties'] ?? null) ? $decoded['specialties'] : [],
            'urgency_keywords' => is_array($decoded['urgency_keywords'] ?? null) ? $decoded['urgency_keywords'] : [],
        ];

        return $this->dataset;
    }

    /**
     * @param array<string, mixed> $answers
     * @param array<string, mixed> $dataset
     * @return array{level: string, score: int, message: string, reasons: string[]}
     */
    private function buildUrgency(string $symptomsNorm, array $answers, array $dataset): array
    {
        $score = 0;
        $reasons = [];

        $painLevel = (int) ($answers['pain_level'] ?? 0);
        if ($painLevel >= 8) {
            $score += 3;
            $reasons[] = 'Niveau de douleur eleve';
        } elseif ($painLevel >= 6) {
            $score += 2;
        }

        if (($answers['chest_pain'] ?? '') === 'yes') {
            $score += 4;
            $reasons[] = 'Douleur thoracique signalee';
        }
        if (($answers['breathing_difficulty'] ?? '') === 'yes') {
            $score += 4;
            $reasons[] = 'Difficulte respiratoire signalee';
        }
        if (($answers['bleeding'] ?? '') === 'yes') {
            $score += 4;
            $reasons[] = 'Saignement signale';
        }
        if (($answers['high_fever'] ?? '') === 'yes') {
            $score += 2;
            $reasons[] = 'Fievre elevee signalee';
        }
        if (($answers['neurologic_alarm'] ?? '') === 'yes') {
            $score += 4;
            $reasons[] = 'Signal neurologique d alerte';
        }
        if (($answers['general_alarm'] ?? '') === 'yes') {
            $score += 3;
            $reasons[] = 'Signal clinique d alerte';
        }
        if (($answers['limb_walk'] ?? '') === 'yes') {
            $score += 2;
            $reasons[] = 'Difficulte de marche signalee';
        }
        if (($answers['limb_swelling'] ?? '') === 'yes') {
            $score += 2;
            $reasons[] = 'Gonflement ou inflammation du membre inferieur';
        }
        if (($answers['limb_trauma'] ?? '') === 'yes') {
            $score += 2;
            $reasons[] = 'Traumatisme recent du membre inferieur';
        }
        if (($answers['limb_zone'] ?? '') === 'mollet' && ($answers['limb_swelling'] ?? '') === 'yes') {
            $score += 2;
            $reasons[] = 'Mollet douloureux et gonfle';
        }

        $duration = (string) ($answers['duration'] ?? '');
        if ($duration === 'more_7d') {
            $score += 1;
        }

        $urgencyKeywords = is_array($dataset['urgency_keywords'] ?? null) ? $dataset['urgency_keywords'] : [];
        foreach ($urgencyKeywords as $entry) {
            if (!is_array($entry)) {
                continue;
            }
            $term = $this->normalizeText((string) ($entry['term'] ?? ''));
            if ($term === '' || !str_contains($symptomsNorm, $term)) {
                continue;
            }
            $score += (int) ($entry['score'] ?? 0);
            $reason = trim((string) ($entry['reason'] ?? ''));
            if ($reason !== '') {
                $reasons[] = $reason;
            }
        }

        $level = 'normal';
        $message = 'Votre situation semble non urgente. Une consultation rapide reste recommandee.';
        if ($score >= 7) {
            $level = 'urgent';
            $message = 'Cas potentiellement urgent. Prenez le premier creneau disponible et contactez les urgences si aggravation.';
        } elseif ($score >= 4) {
            $level = 'prioritaire';
            $message = 'Cas prioritaire. Nous recommandons un rendez-vous le plus tot possible.';
        }

        return [
            'level' => $level,
            'score' => $score,
            'message' => $message,
            'reasons' => array_values(array_unique($reasons)),
        ];
    }

    /**
     * @param array<string, mixed> $answers
     * @param array<string, mixed> $dataset
     * @param array<int, array{key: string, label: string}> $availableSpecialites
     * @return array<int, array{key: string, label: string, score: int, reason: string}>
     */
    private function buildSpecialityScores(
        string $symptomsNorm,
        array $answers,
        array $dataset,
        array $availableSpecialites
    ): array {
        $availableMap = [];
        foreach ($availableSpecialites as $specialite) {
            $key = (string) ($specialite['key'] ?? '');
            $label = (string) ($specialite['label'] ?? '');
            if ($key === '' || $label === '') {
                continue;
            }
            $availableMap[$key] = $label;
        }

        $scores = [];
        $reasons = [];
        $specialties = is_array($dataset['specialties'] ?? null) ? $dataset['specialties'] : [];

        foreach ($specialties as $entry) {
            if (!is_array($entry)) {
                continue;
            }
            $label = trim((string) ($entry['label'] ?? ''));
            if ($label === '') {
                continue;
            }
            $key = $this->normalizeSpecialiteKey($label);
            if (!isset($availableMap[$key])) {
                continue;
            }

            $keywords = is_array($entry['keywords'] ?? null) ? $entry['keywords'] : [];
            foreach ($keywords as $keywordEntry) {
                if (!is_array($keywordEntry)) {
                    continue;
                }
                $term = $this->normalizeText((string) ($keywordEntry['term'] ?? ''));
                if ($term === '' || !str_contains($symptomsNorm, $term)) {
                    continue;
                }
                $weight = max(1, (int) ($keywordEntry['weight'] ?? 1));
                $scores[$key] = ($scores[$key] ?? 0) + $weight;
                $reasons[$key][] = (string) ($keywordEntry['term'] ?? '');
            }
        }

        if (($answers['chest_pain'] ?? '') === 'yes') {
            $this->bumpScore($scores, $reasons, 'cardiologie', 4, 'douleur thoracique');
        }
        if (($answers['breathing_difficulty'] ?? '') === 'yes') {
            $this->bumpScore($scores, $reasons, 'pneumologie', 4, 'difficulte respiratoire');
        }
        if (($answers['high_fever'] ?? '') === 'yes') {
            $this->bumpScore($scores, $reasons, 'medecine generale', 2, 'fievre elevee');
        }
        if ((string) ($answers['limb_zone'] ?? '') !== '') {
            $this->bumpScore($scores, $reasons, 'orthopedie', 2, 'douleur membre inferieur');
        }
        if (($answers['limb_trauma'] ?? '') === 'yes') {
            $this->bumpScore($scores, $reasons, 'orthopedie', 4, 'traumatisme membre inferieur');
        }
        if (($answers['limb_walk'] ?? '') === 'yes') {
            $this->bumpScore($scores, $reasons, 'orthopedie', 3, 'difficulte a marcher');
        }
        if (($answers['limb_hip_pain'] ?? '') === 'yes') {
            $this->bumpScore($scores, $reasons, 'orthopedie', 3, 'douleur de hanche');
        }
        if (($answers['limb_swelling'] ?? '') === 'yes') {
            $this->bumpScore($scores, $reasons, 'medecine generale', 2, 'gonflement du membre inferieur');
        }

        if ($scores === []) {
            if (isset($availableMap['medecine generale'])) {
                $scores['medecine generale'] = 2;
                $reasons['medecine generale'] = ['orientation generale'];
            } elseif ($availableMap !== []) {
                $firstKey = (string) array_key_first($availableMap);
                $scores[$firstKey] = 1;
                $reasons[$firstKey] = ['orientation initiale'];
            }
        }

        arsort($scores);
        $result = [];
        foreach ($scores as $key => $score) {
            if (!isset($availableMap[$key])) {
                continue;
            }
            $reasonList = array_values(array_unique($reasons[$key] ?? []));
            $result[] = [
                'key' => $key,
                'label' => $availableMap[$key],
                'score' => (int) $score,
                'reason' => implode(', ', array_slice($reasonList, 0, 3)),
            ];
            if (count($result) >= 3) {
                break;
            }
        }

        return $result;
    }

    /**
     * @param array<string, int> $scores
     * @param array<string, string[]> $reasons
     */
    private function bumpScore(array &$scores, array &$reasons, string $specialiteKey, int $value, string $reason): void
    {
        $scores[$specialiteKey] = ($scores[$specialiteKey] ?? 0) + $value;
        $reasons[$specialiteKey][] = $reason;
    }

    private function normalizeText(string $value): string
    {
        $text = mb_strtolower(trim($value), 'UTF-8');
        if ($text === '') {
            return '';
        }

        if (function_exists('iconv')) {
            $ascii = iconv('UTF-8', 'ASCII//TRANSLIT//IGNORE', $text);
            if ($ascii !== false) {
                $text = strtolower($ascii);
            }
        }

        $text = preg_replace('/[^a-z0-9\s]+/u', ' ', $text) ?? $text;
        $text = preg_replace('/\s+/u', ' ', $text) ?? $text;

        return trim($text);
    }

    private function normalizeSpecialiteKey(string $specialite): string
    {
        return $this->normalizeText($specialite);
    }
}
