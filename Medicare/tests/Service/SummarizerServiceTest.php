<?php

namespace App\Tests\Service;

use App\Service\ForumSummaryClient;
use App\Service\SummarizerService;
use PHPUnit\Framework\TestCase;

class SummarizerServiceTest extends TestCase
{
    public function testSummarizeReturnsNullOnEmptyText(): void
    {
        $client = $this->createMock(ForumSummaryClient::class);
        $service = new SummarizerService($client);

        self::assertEquals(null, $service->summarize('   '));
    }

    public function testSummarizeUsesClientAndReturnsSummary(): void
    {
        $client = $this->createMock(ForumSummaryClient::class);
        $client->method('summarize')->willReturn('Resume court.');
        $service = new SummarizerService($client);

        $text = 'Premiere phrase. Deuxieme phrase. Troisieme phrase.';
        $summary = $service->summarize($text, 2);

        self::assertNotNull($summary);
        self::assertTrue(str_contains((string) $summary, 'Resume court.'));
    }

    public function testSummarizeVariantReturnsStructuredResult(): void
    {
        $client = $this->createMock(ForumSummaryClient::class);
        $service = new SummarizerService($client);

        $result = $service->summarizeVariant('Une phrase. Deux phrases. Trois phrases.', 2, 1);

        self::assertEquals(true, isset($result['summary']));
        self::assertEquals(true, isset($result['variant']));
        self::assertNotNull($result['summary']);
    }

    public function testSummarizeRejectsInvalidArgumentType(): void
    {
        $client = $this->createMock(ForumSummaryClient::class);
        $service = new SummarizerService($client);

        $this->expectException(\TypeError::class);
        /** @phpstan-ignore-next-line */
        $service->summarize(['not a string']);
    }
}
