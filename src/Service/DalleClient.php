<?php

namespace App\Service;

use Psr\Log\LoggerInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;

class DalleClient
{
    private const DALLE_API_ENDPOINT = 'https://api.openai.com/v1/images/generations';

    public function __construct(
        private readonly HttpClientInterface $httpClient,
        private readonly string $openAiApiKey,
        private readonly LoggerInterface $logger
    ) {
    }

    /**
     * @param string $prompt The text prompt to generate an image from.
     * @param string $size The size of the generated image (e.g., '1024x1024').
     * @return string The URL of the generated image.
     * @throws \Exception If the API request fails.
     */
    public function generateImage(string $prompt, string $size = '1024x1024'): string
    {
        $this->logger->info('Requesting image from DALL-E', ['prompt' => $prompt]);

        try {
            $response = $this->httpClient->request('POST', self::DALLE_API_ENDPOINT, [
                'headers' => [
                    'Content-Type' => 'application/json',
                    'Authorization' => 'Bearer ' . $this->openAiApiKey,
                ],
                'json' => [
                    'model' => 'dall-e-3',
                    'prompt' => $prompt,
                    'n' => 1,
                    'size' => $size,
                ],
                // This is a temporary solution for local development.
                'verify_peer' => false,
                'verify_host' => false,
            ]);

            $statusCode = $response->getStatusCode();
            $content = $response->getContent(false);

            if ($statusCode !== 200) {
                $errorData = json_decode($content, true);
                $errorMessage = $errorData['error']['message'] ?? 'Unknown error';
                $this->logger->error('DALL-E API request failed', [
                    'status' => $statusCode,
                    'response' => $content,
                ]);
                throw new \Exception('DALL-E API request failed: ' . $errorMessage);
            }

            $data = $response->toArray();
            $imageUrl = $data['data'][0]['url'] ?? null;

            if (!$imageUrl) {
                throw new \Exception('Image URL not found in DALL-E response.');
            }

            $this->logger->info('DALL-E image generated successfully.');

            return $imageUrl;

        } catch (TransportExceptionInterface $e) {
            $this->logger->error('DALL-E API transport error: ' . $e->getMessage());
            throw new \Exception('Could not connect to the DALL-E API service.', 0, $e);
        }
    }
}