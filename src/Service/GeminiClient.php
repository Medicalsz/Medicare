<?php

namespace App\Service;

use Psr\Log\LoggerInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class GeminiClient
{
    private const GEMINI_API_ENDPOINT = 'https://generativelanguage.googleapis.com/v1/models/gemini-2.5-flash:generateContent';

    public function __construct(
        private readonly HttpClientInterface $httpClient,
        private readonly string $geminiApiKey,
        private readonly LoggerInterface $logger
    ) {
    }

    /**
     * @param array $payload The full request payload for the Gemini API.
     * @return array The JSON-decoded response from the API.
     * @throws \Exception If the API request fails or returns a non-200 status code.
     */
    public function generateContent(array $payload): array
    {
        try {
            $response = $this->httpClient->request('POST', self::GEMINI_API_ENDPOINT . '?key=' . $this->geminiApiKey, [
                'headers' => [
                    'Content-Type' => 'application/json',
                ],
                'json' => $payload,
                // This is a temporary solution for local development.
                'verify_peer' => false,
                'verify_host' => false,
            ]);

            $statusCode = $response->getStatusCode();
            $content = $response->getContent(false); // false: do not throw on non-2xx codes

            $this->logger->info('Gemini API Response', ['status' => $statusCode, 'content' => $content]);

            if ($statusCode !== 200) {
                $errorData = json_decode($content, true);
                $errorMessage = $errorData['error']['message'] ?? 'Unknown error';
                $this->logger->error('Gemini API request failed', [
                    'status' => $statusCode,
                    'response' => $content,
                    'error_message' => $errorMessage,
                ]);
                throw new \Exception('Gemini API request failed: ' . $errorMessage);
            }

            return $response->toArray();

        } catch (TransportExceptionInterface $e) {
            $this->logger->error('Gemini API transport error: ' . $e->getMessage(), ['trace' => $e->getTraceAsString()]);
            throw new \Exception('Could not connect to the Gemini API service.', 0, $e);
        }
    }
}