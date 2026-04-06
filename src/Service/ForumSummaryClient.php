<?php

namespace App\Service;

use Psr\Log\LoggerInterface;
use Symfony\Contracts\HttpClient\Exception\ExceptionInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class ForumSummaryClient
{
    private const OPENROUTER_URL = 'https://openrouter.ai/api/v1/chat/completions';
    private const MODEL = 'nvidia/nemotron-3-nano-30b-a3b:free';

    public function __construct(
        private readonly HttpClientInterface $httpClient,
        private readonly string $baseUrl,
        private readonly string $openRouterApiKey = '',
        private readonly ?LoggerInterface $logger = null,
    ) {
    }

    public function summarize(string $text): ?string
    {
        $content = trim($text);
        if ($content === '') {
            return null;
        }

        $result = $this->summarizeViaOpenRouter($content);
        if ($result !== null) {
            return $result;
        }

        $result = $this->summarizeViaLocalApi($content);
        if ($result !== null) {
            return $result;
        }

        return $this->fallbackSummary($content);
    }

    private function summarizeViaOpenRouter(string $content): ?string
    {
        if ($this->openRouterApiKey === '') {
            return null;
        }

        $systemPrompt = "Tu es un assistant de synthèse professionnelle pour un forum médical. "
            . "Résume le texte fourni en 2-3 phrases claires et concises en français. "
            . "Concentre-toi sur les points clés. Ne rajoute pas d'introduction ni de conclusion. "
            . "Réponds uniquement avec le résumé.";

        $truncated = mb_strlen($content) > 3000 ? mb_substr($content, 0, 3000) . '...' : $content;

        try {
            $response = $this->httpClient->request('POST', self::OPENROUTER_URL, [
                'headers' => [
                    'Authorization' => 'Bearer ' . $this->openRouterApiKey,
                    'Content-Type' => 'application/json',
                    'HTTP-Referer' => 'https://medicare.local',
                    'X-Title' => 'Medicare Forum Summary',
                ],
                'json' => [
                    'model' => self::MODEL,
                    'temperature' => 0.3,
                    'messages' => [
                        ['role' => 'system', 'content' => $systemPrompt],
                        ['role' => 'user', 'content' => $truncated],
                    ],
                ],
                'timeout' => 15,
            ]);

            $data = $response->toArray(false);

            if (isset($data['error'])) {
                $this->log('OpenRouter API returned error: ' . ($data['error']['message'] ?? 'unknown'));
                return null;
            }

            $summary = trim($data['choices'][0]['message']['content'] ?? '');
            return $summary !== '' ? $summary : null;
        } catch (ExceptionInterface|\Throwable $e) {
            $this->log('OpenRouter summarization failed: ' . $e->getMessage());
            return null;
        }
    }

    private function summarizeViaLocalApi(string $content): ?string
    {
        try {
            $response = $this->httpClient->request('POST', rtrim($this->baseUrl, '/') . '/summarize', [
                'json' => ['text' => $content],
                'timeout' => 8,
            ]);

            if ($response->getStatusCode() !== 200) {
                return null;
            }

            $data = $response->toArray(false);
            $summary = isset($data['summary']) ? trim((string) $data['summary']) : '';
            return $summary !== '' ? $summary : null;
        } catch (ExceptionInterface|\Throwable $e) {
            $this->log('Local summarizer unavailable: ' . $e->getMessage());
            return null;
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

    private function log(string $message): void
    {
        $this->logger?->warning($message);
    }
}
