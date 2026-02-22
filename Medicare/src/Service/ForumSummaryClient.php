<?php

namespace App\Service;

use Psr\Log\LoggerInterface;
use Symfony\Contracts\HttpClient\Exception\ExceptionInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class ForumSummaryClient
{
    public function __construct(
        private readonly HttpClientInterface $httpClient,
        private readonly string $baseUrl,
        private readonly ?LoggerInterface $logger = null,
    ) {
    }

    public function summarize(string $text): ?string
    {
        $content = trim($text);
        if ($content === '') {
            return null;
        }

        try {
            $response = $this->httpClient->request('POST', rtrim($this->baseUrl, '/') . '/summarize', [
                'json' => ['text' => $content],
                'timeout' => 8,
            ]);

            if ($response->getStatusCode() !== 200) {
                return $this->fallbackSummary($content);
            }

            $data = $response->toArray(false);
            $summary = isset($data['summary']) ? trim((string) $data['summary']) : '';

            return $summary !== '' ? $summary : $this->fallbackSummary($content);
        } catch (ExceptionInterface|\Throwable $e) {
            if ($this->logger !== null) {
                $this->logger->warning('Forum summary generation failed, fallback used.', [
                    'error' => $e->getMessage(),
                ]);
            }

            return $this->fallbackSummary($content);
        }
    }

    private function fallbackSummary(string $text): ?string
    {
        $parts = preg_split('/(?<=[.!?])\s+/u', trim($text)) ?: [];
        $parts = array_values(array_filter(array_map('trim', $parts), static fn (string $s): bool => $s !== ''));

        if ($parts === []) {
            return null;
        }

        $summary = $parts[0];
        if (mb_strlen($summary) > 200) {
            $summary = mb_substr($summary, 0, 200);
            $lastSpace = mb_strrpos($summary, ' ');
            if ($lastSpace !== false) {
                $summary = mb_substr($summary, 0, $lastSpace);
            }
            $summary = rtrim($summary, " ,;:") . '...';
        }

        if (mb_strtolower(trim($summary)) === mb_strtolower(trim($text))) {
            $summary = 'Resume: ' . $summary;
        }

        return $summary;
    }
}
