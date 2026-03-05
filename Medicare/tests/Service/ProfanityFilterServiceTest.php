<?php

namespace App\Tests\Service;

use App\Service\ProfanityFilterService;
use PHPUnit\Framework\TestCase;

class ProfanityFilterServiceTest extends TestCase
{
    public function testContainsProfanityReturnsFalseForCleanText(): void
    {
        $service = new ProfanityFilterService();

        self::assertFalse($service->containsProfanity('Bonjour tout le monde.'));
    }

    public function testContainsProfanityReturnsTrueWhenBadWordIsPresent(): void
    {
        $service = new ProfanityFilterService();

        self::assertTrue($service->containsProfanity('This is shit.'));
    }

    public function testCensorReplacesBadWordsWithAsterisks(): void
    {
        $service = new ProfanityFilterService();

        self::assertSame('This is ****.', $service->censor('This is shit.'));
    }
}
