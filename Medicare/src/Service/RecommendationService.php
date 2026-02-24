<?php

namespace App\Service;

use App\Entity\ForumTopic;
use App\Repository\ForumTopicRepository;

class RecommendationService
{
    /**
     * @var array<string, list<string>>
     */
    private array $keywordCache = [];

    /**
     * @var array<string, list<string>>
     */
    private array $tagCache = [];

    /**
     * Basic FR stopwords for local keyword extraction.
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
        'etc' => true, 'etre' => true, 'avoir' => true, 'faire' => true, 'sans' => true, 'chez' => true,
    ];

    public function __construct(
        private readonly ForumTopicRepository $topicRepository,
    ) {
    }

    /**
     * @return array{items:list<array{topic:ForumTopic,score:int,common_tags:list<string>,common_keywords:list<string>,is_fallback:bool}>,is_fallback:bool}
     */
    public function recommendForTopic(ForumTopic $topic, int $limit = 5): array
    {
        $safeLimit = max(3, min(5, $limit));

        $sourceTags = $this->extractTags($topic);
        $sourceKeywords = $this->extractKeywords($topic);

        $candidates = $this->topicRepository->findRecommendationCandidates(
            $topic,
            $sourceTags,
            $sourceKeywords,
            max($safeLimit * 6, 20)
        );

        $items = [];
        foreach ($candidates as $candidate) {
            if ($candidate->getId() === $topic->getId()) {
                continue;
            }

            $candidateTags = $this->extractTags($candidate);
            $candidateKeywords = $this->extractKeywords($candidate);

            $commonTags = array_values(array_intersect($sourceTags, $candidateTags));
            $commonKeywords = array_values(array_intersect($sourceKeywords, $candidateKeywords));
            $score = (count($commonTags) * 2) + count($commonKeywords);

            if ($score <= 0) {
                continue;
            }

            $items[] = [
                'topic' => $candidate,
                'score' => $score,
                'common_tags' => $commonTags,
                'common_keywords' => $commonKeywords,
                'is_fallback' => false,
            ];
        }

        usort($items, static function (array $a, array $b): int {
            if ($a['score'] === $b['score']) {
                $aDate = $a['topic']->getCreatedAt()?->getTimestamp() ?? 0;
                $bDate = $b['topic']->getCreatedAt()?->getTimestamp() ?? 0;
                return $bDate <=> $aDate;
            }

            return $b['score'] <=> $a['score'];
        });

        $items = array_slice($items, 0, $safeLimit);
        if ($items !== []) {
            return ['items' => $items, 'is_fallback' => false];
        }

        $popular = $this->topicRepository->findPopularSince(new \DateTimeImmutable('-7 days'), $safeLimit, $topic);
        $fallback = [];
        foreach ($popular as $pop) {
            $fallback[] = [
                'topic' => $pop,
                'score' => 0,
                'common_tags' => [],
                'common_keywords' => [],
                'is_fallback' => true,
            ];
        }

        return ['items' => $fallback, 'is_fallback' => true];
    }

    /**
     * @return list<string>
     */
    private function extractTags(ForumTopic $topic): array
    {
        $cacheKey = $this->buildCacheKey($topic, 'tags');
        if (isset($this->tagCache[$cacheKey])) {
            return $this->tagCache[$cacheKey];
        }

        $title = trim((string) $topic->getTitle());
        $content = trim((string) $topic->getContent());
        $joined = $title . ' ' . $content;

        preg_match_all('/#([\p{L}\p{N}_-]{2,30})/u', $joined, $hashtagMatches);
        $hashtags = [];
        foreach ($hashtagMatches[1] ?? [] as $tag) {
            $hashtags[] = $this->normalizeToken($tag);
        }

        $titleTokens = $this->tokenize($title, 4);
        $titleFreq = [];
        foreach ($titleTokens as $token) {
            $titleFreq[$token] = ($titleFreq[$token] ?? 0) + 1;
        }
        arsort($titleFreq);
        $topTitleTags = array_slice(array_keys($titleFreq), 0, 4);

        $typeTag = $topic->isVideoType() ? ['video'] : ['article'];
        $tags = array_values(array_unique(array_filter(array_merge($hashtags, $topTitleTags, $typeTag))));

        $this->tagCache[$cacheKey] = $tags;
        return $tags;
    }

    /**
     * @return list<string>
     */
    private function extractKeywords(ForumTopic $topic): array
    {
        $cacheKey = $this->buildCacheKey($topic, 'keywords');
        if (isset($this->keywordCache[$cacheKey])) {
            return $this->keywordCache[$cacheKey];
        }

        $text = trim((string) $topic->getTitle() . ' ' . (string) $topic->getContent() . ' ' . (string) $topic->getSummary());
        $tokens = $this->tokenize($text, 3);
        $counts = [];
        foreach ($tokens as $token) {
            $counts[$token] = ($counts[$token] ?? 0) + 1;
        }
        arsort($counts);

        $keywords = array_slice(array_keys($counts), 0, 10);
        $this->keywordCache[$cacheKey] = $keywords;

        return $keywords;
    }

    private function buildCacheKey(ForumTopic $topic, string $prefix): string
    {
        return $prefix . ':' . (string) $topic->getId() . ':' . ($topic->getUpdatedAt()?->getTimestamp() ?? 0);
    }

    /**
     * @return list<string>
     */
    private function tokenize(string $text, int $minLength = 3): array
    {
        preg_match_all('/[\p{L}\p{N}]+/u', mb_strtolower($text), $matches);
        $tokens = [];
        foreach ($matches[0] ?? [] as $rawToken) {
            $token = $this->normalizeToken($rawToken);
            if ($token === '' || mb_strlen($token) < $minLength) {
                continue;
            }
            if (isset(self::STOPWORDS_FR[$token])) {
                continue;
            }
            $tokens[] = $token;
        }

        return $tokens;
    }

    private function normalizeToken(string $token): string
    {
        return trim((string) preg_replace('/[^\p{L}\p{N}_-]+/u', '', mb_strtolower($token)));
    }
}
