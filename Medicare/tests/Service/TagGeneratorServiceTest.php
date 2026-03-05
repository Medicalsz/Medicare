<?php

namespace App\Tests\Service;

use App\Service\TagGeneratorService;
use PHPUnit\Framework\TestCase;

class TagGeneratorServiceTest extends TestCase
{
    public function testSportTextGeneratesSportTags(): void
    {
        $service = new TagGeneratorService();
        $tags = $service->generateTags(
            'Activite physique et sport',
            'Je veux reprendre le sport pour ma sante.'
        );

        self::assertTrue(in_array('sport', $tags, true));
        self::assertTrue(in_array('activité physique', $tags, true));
    }

    public function testSommeilTextGeneratesSleepAndStressTags(): void
    {
        $service = new TagGeneratorService();
        $tags = $service->generateTags(
            'Troubles du sommeil',
            "Je n'arrive pas a dormir, insomnie et reveils nocturnes."
        );

        self::assertTrue(in_array('sommeil', $tags, true));
        self::assertTrue(in_array('stress', $tags, true));
    }

    public function testNoDuplicatesAndMaxLimit(): void
    {
        $service = new TagGeneratorService();
        $tags = $service->generateTags(
            'Sante et sport',
            'Sport sport sport. Activite physique. Nutrition alimentation regime.'
        );

        self::assertEquals(count($tags), count(array_unique($tags)));
        self::assertTrue(count($tags) <= 6);
    }

    public function testNoEmptyTags(): void
    {
        $service = new TagGeneratorService();
        $tags = $service->generateTags('   ', '   ');

        self::assertEquals([], $tags);
    }
}
