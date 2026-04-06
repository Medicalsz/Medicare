<?php

namespace App\Service;

final class ProfanityFilterService
{
    /**
     * @var string[]
     */
    private array $badWords = [
        'fuck',
        'shit',
        'bitch',
        'asshole',
        'merde',
        'connard',
        'pute',
        'enculé',
    ];

    /**
     * @var array<string, true>
     */
    private array $badWordsMap = [];

    private string $badWordsPattern;

    public function __construct()
    {
        foreach ($this->badWords as $word) {
            $normalized = mb_strtolower($word);
            $this->badWordsMap[$normalized] = true;
        }

        $escaped = array_map(
            static fn (string $word): string => preg_quote($word, '/'),
            array_keys($this->badWordsMap)
        );
        $this->badWordsPattern = '/(?<!\p{L})(' . implode('|', $escaped) . ')(?!\p{L})/iu';
    }

    public function containsProfanity(string $text): bool
    {
        if ($text === '') {
            return false;
        }

        return preg_match($this->badWordsPattern, $text) === 1;
    }

    public function censor(string $text): string
    {
        if ($text === '') {
            return $text;
        }

        return preg_replace_callback(
            $this->badWordsPattern,
            static fn (array $match): string => str_repeat('*', mb_strlen($match[0])),
            $text
        ) ?? $text;
    }

    /**
     * @return array{has_profanity: bool, count: int, severity: string}
     */
    public function analyze(string $text): array
    {
        if ($text === '') {
            return [
                'has_profanity' => false,
                'count' => 0,
                'severity' => 'none',
            ];
        }

        $count = 0;
        if (preg_match_all($this->badWordsPattern, $text, $matches) > 0) {
            $count = count($matches[0]);
        }

        $severity = 'none';
        if ($count === 1) {
            $severity = 'low';
        } elseif ($count >= 2 && $count <= 3) {
            $severity = 'medium';
        } elseif ($count >= 4) {
            $severity = 'high';
        }

        return [
            'has_profanity' => $count > 0,
            'count' => $count,
            'severity' => $severity,
        ];
    }
}

