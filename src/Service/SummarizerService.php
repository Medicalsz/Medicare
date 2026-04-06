<?php

namespace App\Service;

class SummarizerService
{
    /**
     * Minimal FR stopwords list for keyword extraction/ranking.
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
        'l' => true, 'y' => true,
    ];

    public function __construct(
        private readonly ForumSummaryClient $forumSummaryClient,
    ) {
    }

    public function summarize(string $text, int $sentenceCount = 2): ?string
    {
        $content = trim(preg_replace('/\s+/u', ' ', $text) ?? '');
        if ($content === '') {
            return null;
        }

        $target = max(1, min(6, $sentenceCount));
        $sentences = $this->splitSentences($content);
        if ($sentences === []) {
            return $this->hardTrim($content, $target);
        }

        if (count($sentences) <= $target) {
            $joined = implode(' ', array_slice($sentences, 0, $target));
            if ($this->isProbablyRawPayload($joined, $content)) {
                return $this->hardTrim($joined, $target);
            }

            return $joined;
        }

        $base = trim((string) $this->forumSummaryClient->summarize($content));
        $picked = [];

        if ($base !== '') {
            $picked[] = $this->ensureSentenceEnd($base);
        }

        foreach ($sentences as $sentence) {
            if (count($picked) >= $target) {
                break;
            }

            $normalizedSentence = $this->normalizeForCompare($sentence);
            $exists = false;
            foreach ($picked as $existing) {
                if ($this->normalizeForCompare($existing) === $normalizedSentence) {
                    $exists = true;
                    break;
                }
            }

            if (!$exists) {
                $picked[] = $this->ensureSentenceEnd($sentence);
            }
        }

        if ($picked === []) {
            $picked[] = $this->ensureSentenceEnd($sentences[0]);
        }

        $picked = array_slice($picked, 0, $target);
        $result = implode(' ', $picked);

        if ($this->isProbablyRawPayload($result, $content)) {
            return $this->hardTrim($result, $target);
        }

        return $result;
    }

    /**
     * Generate a non-deterministic variant without external APIs.
     *
     * @return array{summary: ?string, variant: string}
     */
    public function summarizeVariant(string $text, int $sentenceCount = 2, int $variantIndex = 0): array
    {
        $content = trim(preg_replace('/\s+/u', ' ', $text) ?? '');
        if ($content === '') {
            return ['summary' => null, 'variant' => 'empty'];
        }

        $target = max(1, min(6, $sentenceCount));
        $ranked = $this->rankSentences($content, 8);

        if ($ranked === []) {
            return [
                'summary' => $this->hardTrim($content, $target),
                'variant' => 'fallback-trim',
            ];
        }

        $mode = $variantIndex % 4;
        if ($mode === 0) {
            $summary = $this->variantExtractive($ranked, $target, $variantIndex);
            return ['summary' => $summary, 'variant' => 'extractive'];
        }

        if ($mode === 1) {
            $summary = $this->variantBullets($ranked, max(2, min(4, $target + 1)), $variantIndex);
            return ['summary' => $summary, 'variant' => 'bullets'];
        }

        if ($mode === 2) {
            $summary = $this->variantKeywords($content, $ranked, $target);
            return ['summary' => $summary, 'variant' => 'keywords'];
        }

        $summary = $this->variantVeryShort($ranked, $variantIndex);
        return ['summary' => $summary, 'variant' => 'very-short'];
    }

    public function isVariantIntent(string $prompt): bool
    {
        $text = mb_strtolower(trim($prompt));
        if ($text === '') {
            return false;
        }

        return str_contains($text, 'autre')
            || str_contains($text, 'variante')
            || str_contains($text, 'reformule')
            || str_contains($text, 'reformuler')
            || str_contains($text, 'different')
            || str_contains($text, 'différent');
    }

    public function inferSentenceCount(string $prompt, int $default = 2): int
    {
        $text = mb_strtolower(trim($prompt));
        if ($text === '') {
            return max(1, min(6, $default));
        }

        if (preg_match('/\b([2-6])\s*(ligne|lignes|phrase|phrases)\b/u', $text, $m) === 1) {
            return max(1, min(6, (int) $m[1]));
        }

        if (str_contains($text, 'tres court') || str_contains($text, 'très court') || str_contains($text, 'court')) {
            return 2;
        }

        if (str_contains($text, 'detail') || str_contains($text, 'détail') || str_contains($text, 'complet')) {
            return 5;
        }

        return max(1, min(6, $default));
    }

    /**
     * @return list<array{index:int,text:string,score:float}>
     */
    private function rankSentences(string $text, int $topK = 8): array
    {
        $sentences = $this->splitSentences($text);
        if ($sentences === []) {
            return [];
        }

        $freq = [];
        $tokensBySentence = [];
        foreach ($sentences as $idx => $sentence) {
            $tokens = $this->tokenize($sentence);
            $tokensBySentence[$idx] = $tokens;
            foreach ($tokens as $token) {
                $freq[$token] = ($freq[$token] ?? 0) + 1;
            }
        }

        $ranked = [];
        foreach ($sentences as $idx => $sentence) {
            $tokens = $tokensBySentence[$idx] ?? [];
            if ($tokens === []) {
                $score = 0.0;
            } else {
                $sum = 0.0;
                foreach ($tokens as $token) {
                    $sum += (float) ($freq[$token] ?? 0);
                }
                $score = $sum / max(1.0, (float) count($tokens));
            }

            $ranked[] = ['index' => $idx, 'text' => $sentence, 'score' => $score];
        }

        usort($ranked, static function (array $a, array $b): int {
            if ($a['score'] === $b['score']) {
                return $a['index'] <=> $b['index'];
            }
            return $a['score'] > $b['score'] ? -1 : 1;
        });

        return array_slice($ranked, 0, max(1, $topK));
    }

    private function variantExtractive(array $ranked, int $target, int $variantIndex): string
    {
        $maxPool = min(7, count($ranked));
        $positions = range(0, $maxPool - 1);
        $k = min($target, $maxPool);
        $combos = $this->combinations($positions, $k);

        if ($combos === []) {
            $text = $ranked[0]['text'] ?? '';
            return $this->ensureSentenceEnd($text);
        }

        $choice = $combos[$variantIndex % count($combos)];
        $picked = [];
        foreach ($choice as $position) {
            $item = $ranked[$position] ?? null;
            if (is_array($item) && isset($item['index'], $item['text'])) {
                $picked[] = ['index' => (int) $item['index'], 'text' => (string) $item['text']];
            }
        }

        usort($picked, static fn (array $a, array $b): int => $a['index'] <=> $b['index']);

        $parts = [];
        foreach ($picked as $item) {
            $parts[] = $this->ensureSentenceEnd($item['text']);
        }

        return implode(' ', $parts);
    }

    private function variantBullets(array $ranked, int $count, int $variantIndex): string
    {
        $count = min($count, count($ranked));
        if ($count <= 0) {
            return '';
        }

        $start = $variantIndex % count($ranked);
        $picked = [];
        for ($i = 0; $i < $count; $i++) {
            $picked[] = $ranked[($start + $i) % count($ranked)];
        }

        $lines = [];
        foreach ($picked as $item) {
            $text = trim((string) ($item['text'] ?? ''));
            if ($text === '') {
                continue;
            }
            $lines[] = '- ' . rtrim($this->ensureSentenceEnd($text), '.');
        }

        return implode("\n", array_slice($lines, 0, $count));
    }

    private function variantKeywords(string $content, array $ranked, int $target): string
    {
        $keywords = $this->extractKeywords($content, 6);
        $headline = $keywords !== [] ? 'Mots-cles: ' . implode(', ', $keywords) . '.' : '';

        $body = $this->variantExtractive($ranked, $target, 0);
        $parts = array_filter([$headline, $body], static fn (string $s): bool => trim($s) !== '');

        return implode("\n\n", $parts);
    }

    private function variantVeryShort(array $ranked, int $variantIndex): string
    {
        $idx = $variantIndex % count($ranked);
        $text = trim((string) ($ranked[$idx]['text'] ?? ''));
        if ($text === '') {
            $text = trim((string) ($ranked[0]['text'] ?? ''));
        }

        return $this->hardTrim($text, 1);
    }

    /**
     * @return list<string>
     */
    private function splitSentences(string $text): array
    {
        $parts = preg_split('/(?<=[.!?])\s+/u', trim($text)) ?: [];
        $parts = array_values(array_filter(array_map('trim', $parts), static fn (string $s): bool => $s !== ''));
        return $parts;
    }

    private function ensureSentenceEnd(string $sentence): string
    {
        $trim = rtrim($sentence);
        if ($trim === '') {
            return '';
        }
        if (preg_match('/[.!?]$/u', $trim) === 1) {
            return $trim;
        }
        return $trim . '.';
    }

    private function normalizeForCompare(string $text): string
    {
        return trim(mb_strtolower(preg_replace('/\s+/u', ' ', $text) ?? ''));
    }

    private function isProbablyRawPayload(string $candidate, string $source): bool
    {
        $c = $this->normalizeForCompare($candidate);
        $s = $this->normalizeForCompare($source);
        if ($c === '' || $s === '') {
            return false;
        }

        return mb_strlen($c) > 0.9 * mb_strlen($s);
    }

    private function hardTrim(string $text, int $targetSentences): string
    {
        $maxLen = $targetSentences <= 2 ? 260 : 420;
        $clean = trim($text);
        if (mb_strlen($clean) <= $maxLen) {
            return $clean;
        }

        $slice = mb_substr($clean, 0, $maxLen);
        $lastSpace = mb_strrpos($slice, ' ');
        if ($lastSpace !== false) {
            $slice = mb_substr($slice, 0, $lastSpace);
        }

        return rtrim($slice, " ,;:") . '...';
    }

    /**
     * @return list<string>
     */
    private function extractKeywords(string $text, int $limit = 8): array
    {
        $tokens = $this->tokenize($text);
        $counts = [];
        foreach ($tokens as $token) {
            $counts[$token] = ($counts[$token] ?? 0) + 1;
        }
        arsort($counts);

        return array_slice(array_keys($counts), 0, max(1, $limit));
    }

    /**
     * @return list<string>
     */
    private function tokenize(string $text): array
    {
        preg_match_all('/[\p{L}\p{N}]+/u', mb_strtolower($text), $matches);
        $tokens = [];
        foreach ($matches[0] ?? [] as $rawToken) {
            $token = trim((string) preg_replace('/[^\p{L}\p{N}_-]+/u', '', $rawToken));
            if ($token === '' || mb_strlen($token) < 3) {
                continue;
            }
            if (isset(self::STOPWORDS_FR[$token])) {
                continue;
            }
            $tokens[] = $token;
        }

        return $tokens;
    }

    /**
     * @param int[] $items
     * @return list<list<int>>
     */
    private function combinations(array $items, int $k): array
    {
        if ($k <= 0) {
            return [[]];
        }
        if ($items === []) {
            return [];
        }

        $result = [];
        $head = $items[0];
        $tail = array_slice($items, 1);

        foreach ($this->combinations($tail, $k - 1) as $combo) {
            $result[] = array_merge([$head], $combo);
        }
        foreach ($this->combinations($tail, $k) as $combo) {
            $result[] = $combo;
        }

        return $result;
    }
}

