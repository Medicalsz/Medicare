<?php

namespace App\Tests\Service;

use App\Service\ForumSummaryClient;
use PHPUnit\Framework\TestCase;
use Psr\Log\NullLogger;
use Symfony\Component\HttpClient\MockHttpClient;
use Symfony\Component\HttpClient\Response\MockResponse;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class ForumSummaryClientTest extends TestCase
{
    public function testSummarizeReturnsNullOnEmptyText(): void
    {
        $client = new MockHttpClient();
        $service = new ForumSummaryClient($client, 'http://localhost');

        self::assertEquals(null, $service->summarize(''));
    }

    public function testSummarizeReturnsApiSummaryOnSuccess(): void
    {
        $response = new MockResponse(json_encode(['summary' => 'Resume externe.']));
        $client = new MockHttpClient($response);
        $service = new ForumSummaryClient($client, 'http://localhost');

        self::assertEquals('Resume externe.', $service->summarize('Texte a resumer.'));
    }

    public function testSummarizeFallsBackOnNon200(): void
    {
        $response = new MockResponse('Server error', ['http_code' => 500]);
        $client = new MockHttpClient($response);
        $service = new ForumSummaryClient($client, 'http://localhost');

        $text = 'Premiere phrase. Deuxieme phrase.';
        $summary = $service->summarize($text);

        self::assertNotNull($summary);
        self::assertTrue(str_contains((string) $summary, 'Premiere phrase'));
    }

    public function testSummarizeFallsBackOnException(): void
    {
        $httpClient = $this->createMock(HttpClientInterface::class);
        $httpClient->method('request')->willThrowException(new \RuntimeException('boom'));

        $service = new ForumSummaryClient($httpClient, 'http://localhost', new NullLogger());
        $text = 'Premiere phrase. Deuxieme phrase.';

        $summary = $service->summarize($text);

        self::assertNotNull($summary);
        self::assertTrue(str_contains((string) $summary, 'Premiere phrase'));
    }
}
