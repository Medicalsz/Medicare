<?php

namespace App\Service;

use App\Entity\Partnership\Partner;
use Psr\Log\LoggerInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class AiSuggestionService
{
    private const OPENAI_API_ENDPOINT = 'https://api.openai.com/v1/chat/completions';

    public function __construct(
        private readonly HttpClientInterface $httpClient,
        private readonly string $openAiApiKey,
        private readonly LoggerInterface $logger
    ) {
    }

    public function getSuggestions(Partner $partner): array
    {
        $prompt = $this->buildPrompt($partner);

        try {
            $response = $this->httpClient->request('POST', self::OPENAI_API_ENDPOINT, [
                'headers' => [
                    'Authorization' => 'Bearer ' . $this->openAiApiKey,
                    'Content-Type' => 'application/json',
                ],
                'json' => [
                    'model' => 'gpt-3.5-turbo',
                    'messages' => [
                        ['role' => 'system', 'content' => 'You are a creative assistant for a healthcare organization. Suggest exactly 3 brief, actionable collaboration ideas. Each suggestion should be a single, complete sentence. Do not use numbered lists or markdown formatting.'],
                        ['role' => 'user', 'content' => $prompt],
                    ],
                    'max_tokens' => 150,
                    'n' => 1,
                    'stop' => null,
                    'temperature' => 0.7,
                ],
            ]);

            $data = $response->toArray();
            $suggestionText = $data['choices'][0]['message']['content'] ?? '';

            return array_filter(array_map('trim', explode("\n", $suggestionText)));

        } catch (TransportExceptionInterface $e) {
            $this->logger->error('Could not connect to the OpenAI API service.', ['error' => $e->getMessage()]);
            return ['error' => 'The AI suggestion service is currently unavailable. Please try again later.'];
        } catch (\Exception $e) {
            $this->logger->error('An unexpected error occurred in AI suggestion service: ' . $e->getMessage());
            return ['error' => 'An unexpected error occurred.'];
        }
    }

    private function buildPrompt(Partner $partner): string
    {
        // Create a concise profile for the prompt
        return sprintf(
            "Partner Profile:\nName: %s\nType: %s",
            $partner->getName(),
            $partner->getTypePartenaire() ? $partner->getTypePartenaire()->value : 'N/A'
        );
    }
}