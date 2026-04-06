<?php

namespace App\Service;

final class TagGeneratorService
{
    /**
     * @var array<string, true>
     */
    private const STOPWORDS_FR = [
        'a' => true, 'ai' => true, 'ainsi' => true, 'alors' => true, 'au' => true, 'aucun' => true, 'aussi' => true,
        'autre' => true, 'aux' => true, 'avec' => true, 'car' => true, 'ce' => true, 'cela' => true, 'ces' => true,
        'cet' => true, 'cette' => true, 'comme' => true, 'dans' => true, 'de' => true, 'des' => true, 'du' => true,
        'elle' => true, 'en' => true, 'et' => true, 'est' => true, 'eux' => true, 'il' => true, 'ils' => true,
        'je' => true, 'la' => true, 'le' => true, 'les' => true, 'leur' => true, 'lui' => true, 'mais' => true,
        'me' => true, 'mes' => true, 'moi' => true, 'mon' => true, 'ne' => true, 'nos' => true, 'notre' => true,
        'nous' => true, 'on' => true, 'ou' => true, 'par' => true, 'pas' => true, 'pour' => true, 'qu' => true,
        'que' => true, 'qui' => true, 'sa' => true, 'se' => true, 'ses' => true, 'si' => true, 'son' => true,
        'sur' => true, 'ta' => true, 'te' => true, 'tes' => true, 'toi' => true, 'ton' => true, 'tu' => true,
        'un' => true, 'une' => true, 'vos' => true, 'votre' => true, 'vous' => true, 'c' => true, 'd' => true,
        'l' => true, 'y' => true, 'plus' => true, 'moins' => true, 'tres' => true, 'trop' => true, 'donc' => true,
        'etc' => true, 'etre' => true, 'avoir' => true, 'faire' => true, 'sans' => true, 'chez' => true, 'avant' => true,
        'apres' => true, 'après' => true, 'depuis' => true, 'toutes' => true, 'tous' => true, 'tout' => true,
        'mes' => true, 'vos' => true, 'leurs' => true, 'notre' => true,
    ];

    /**
     * @var array<string, string[]>
     */
    private const SYNONYMS = [
        'sport' => ['sport', 'exercice', 'entrainement', 'entraînement', 'activite', 'activité', 'physique'],
        'activité physique' => ['activité physique', 'activite physique'],
        'sommeil' => ['sommeil', 'insomnie', 'dormir', 'endormissement', 'reveil', 'réveil'],
        'stress' => ['stress', 'anxiete', 'anxiété', 'angoisse'],
        'alimentation' => ['alimentation', 'nutrition', 'regime', 'régime', 'diet', 'diète'],
        'santé' => ['sante', 'santé', 'bien etre', 'bien-etre', 'bien-être', 'hygiene de vie', 'hygiène de vie', 'prevention', 'prévention'],
        'diabète' => ['diabete', 'diabète', 'glycemie', 'glycémie'],
        'tension' => ['tension', 'hypertension'],
        'douleur' => ['douleur', 'migraine', 'maux'],
        'coeur' => ['coeur', 'cœur', 'cardiaque'],
    ];

    /**
     * @var array<string, list<string>>
     */
    private const RELATED = [
        'sommeil' => ['stress'],
        'sport' => ['activité physique'],
    ];

    /**
     * @var array<string, string>
     */
    private array $tokenToCanonical = [];

    /**
     * @var array<string, string>
     */
    private array $phrases = [
        'activite physique' => 'activité physique',
        'hygiene de vie' => 'hygiène de vie',
        'sante mentale' => 'santé mentale',
        'sante cardiovasculaire' => 'santé cardiovasculaire',
        'prise de sang' => 'prise de sang',
        'tension arterielle' => 'tension artérielle',
    ];

    public function __construct()
    {
        foreach (self::SYNONYMS as $canonical => $variants) {
            foreach ($variants as $variant) {
                $key = $this->fold($variant);
                $this->tokenToCanonical[$key] = $canonical;
            }
        }
    }

    /**
     * @return list<string>
     */
    public function generateTags(string $title, string $content, int $max = 6): array
    {
        $normalizedTitle = $this->normalize($title);
        $normalizedContent = $this->normalize($content);
        $joined = trim($normalizedTitle . ' ' . $normalizedContent);

        if ($joined === '') {
            return [];
        }

        $scores = [];

        $foldedText = $this->fold($joined);
        foreach ($this->phrases as $phraseKey => $label) {
            if (str_contains($foldedText, $phraseKey)) {
                $scores[$label] = ($scores[$label] ?? 0) + 6;
            }
        }

        $this->accumulateTokens($normalizedTitle, 2, $scores);
        $this->accumulateTokens($normalizedContent, 1, $scores);

        foreach (self::RELATED as $source => $relatedTags) {
            if (!isset($scores[$source])) {
                continue;
            }
            foreach ($relatedTags as $related) {
                $scores[$related] = ($scores[$related] ?? 0) + 2;
            }
        }

        arsort($scores);
        $tags = array_keys($scores);

        $max = max(3, min(7, $max));
        $tags = array_slice($tags, 0, $max);

        $clean = [];
        foreach ($tags as $tag) {
            $value = trim((string) $tag);
            if ($value === '') {
                continue;
            }
            $clean[] = $value;
        }

        return array_values(array_unique($clean));
    }

    /**
     * @param array<string, int> $scores
     */
    private function accumulateTokens(string $text, int $weight, array &$scores): void
    {
        if ($text === '') {
            return;
        }

        $tokens = preg_split('/\s+/u', $text) ?: [];
        foreach ($tokens as $token) {
            $clean = trim($token);
            if ($clean === '' || mb_strlen($clean) < 3) {
                continue;
            }

            $folded = $this->fold($clean);
            if ($folded === '' || isset(self::STOPWORDS_FR[$folded])) {
                continue;
            }

            if (isset($this->tokenToCanonical[$folded])) {
                $canonical = $this->tokenToCanonical[$folded];
                $scores[$canonical] = ($scores[$canonical] ?? 0) + (3 * $weight);
                continue;
            }

            $scores[$clean] = ($scores[$clean] ?? 0) + $weight;
        }
    }

    private function normalize(string $text): string
    {
        $lower = mb_strtolower($text);
        $clean = preg_replace('/[^\p{L}\p{N}]+/u', ' ', $lower);
        $clean = trim(preg_replace('/\s+/u', ' ', $clean) ?? '');

        return $clean;
    }

    private function fold(string $text): string
    {
        $normalized = $this->normalize($text);
        $ascii = iconv('UTF-8', 'ASCII//TRANSLIT//IGNORE', $normalized);
        if ($ascii !== false && $ascii !== '') {
            return mb_strtolower($ascii);
        }

        return $normalized;
    }
}

