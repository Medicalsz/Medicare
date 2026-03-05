<?php

namespace App\Tests\Service;

use App\Entity\ForumTopic;
use App\Repository\ForumTopicRepository;
use App\Service\RecommendationService;
use PHPUnit\Framework\TestCase;

class RecommendationServiceTest extends TestCase
{
    public function testRecommendReturnsScoredItems(): void
    {
        $base = $this->makeTopic(1, 'Diabete et alimentation', 'Besoin de conseils sur le diabete.');
        $candidate = $this->makeTopic(2, 'Diabete type 2', 'Discussion sur diabete et traitement.');

        $repo = $this->createMock(ForumTopicRepository::class);
        $repo->method('findRecommendationCandidates')->willReturn([$candidate]);
        $repo->method('findPopularSince')->willReturn([]);

        $service = new RecommendationService($repo);
        $result = $service->recommendForTopic($base, 5);

        self::assertEquals(false, $result['is_fallback']);
        self::assertTrue(count($result['items']) > 0);
        self::assertTrue($result['items'][0]['score'] > 0);
    }

    public function testRecommendFallsBackWhenNoMatches(): void
    {
        $base = $this->makeTopic(1, 'Sujet unique', 'Texte sans correspondance.');
        $popular = $this->makeTopic(3, 'Sujet populaire', 'Autre contenu.');

        $repo = $this->createMock(ForumTopicRepository::class);
        $repo->method('findRecommendationCandidates')->willReturn([]);
        $repo->method('findPopularSince')->willReturn([$popular]);

        $service = new RecommendationService($repo);
        $result = $service->recommendForTopic($base, 5);

        self::assertEquals(true, $result['is_fallback']);
        self::assertTrue(count($result['items']) > 0);
    }

    private function makeTopic(int $id, string $title, string $content): ForumTopic
    {
        $topic = (new ForumTopic())
            ->setTitle($title)
            ->setContent($content)
            ->setSummary(null);

        $this->setEntityId($topic, $id);

        return $topic;
    }

    private function setEntityId(object $entity, int $id): void
    {
        $ref = new \ReflectionClass($entity);
        if (!$ref->hasProperty('id')) {
            return;
        }

        $prop = $ref->getProperty('id');
        $prop->setAccessible(true);
        $prop->setValue($entity, $id);
    }
}
