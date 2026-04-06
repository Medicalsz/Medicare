<?php

namespace App\Service;

use App\Entity\Partnership\Partner;
use App\MedicarSmartBundle\Service\OpenRouterClient;
use Psr\Log\LoggerInterface;
use Symfony\Contracts\HttpClient\Exception\HttpExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class AiSuggestionService
{
    private const OPENAI_API_ENDPOINT = 'https://api.openai.com/v1/chat/completions';

    public function __construct(
        private readonly HttpClientInterface $httpClient,
        private readonly string $openAiApiKey,
        private readonly LoggerInterface $logger,
        private readonly ?OpenRouterClient $openRouterClient = null,
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

            $lines = array_values(array_filter(array_map('trim', preg_split('/\R/u', $suggestionText) ?: [])));

            return [
                'suggestions' => $lines,
                'error' => null,
                'retry_after' => null,
                'status' => 200,
            ];

        } catch (TransportExceptionInterface $e) {
            $this->logger->error('Could not connect to the OpenAI API service.', ['error' => $e->getMessage()]);
            $fallback = $this->tryOpenRouterFallback($partner, 'transport_exception', $e->getMessage());
            if ($fallback !== null) {
                return $fallback;
            }

            return [
                'suggestions' => [],
                'error' => 'Le service de suggestion IA est indisponible. Réessayez plus tard.',
                'retry_after' => null,
                'status' => 503,
            ];
        } catch (HttpExceptionInterface $e) {
            $response = $e->getResponse();
            $status = $response->getStatusCode();

            $payload = null;
            try {
                $payload = $response->toArray(false);
            } catch (\Throwable) {
                $payload = null;
            }

            $message = null;
            if (is_array($payload)) {
                $message = $payload['error']['message'] ?? $payload['message'] ?? null;
            }

            $retryAfterHeader = $response->getHeaders(false)['retry-after'][0] ?? null;
            $retryAfter = null;
            if (is_string($retryAfterHeader) && ctype_digit($retryAfterHeader)) {
                $retryAfter = (int) $retryAfterHeader;
            }

            if ($status === 429) {
                $this->logger->warning('AI suggestion service rate-limited (429).', [
                    'status' => $status,
                    'message' => $message,
                ]);

                $fallback = $this->tryOpenRouterFallback($partner, 'openai_429', $message);
                if ($fallback !== null) {
                    return $fallback;
                }

                return [
                    'suggestions' => [],
                    'error' => 'Trop de requêtes (429). Réessayez dans quelques instants.' . ($retryAfter ? (' (~' . $retryAfter . 's)') : ''),
                    'retry_after' => $retryAfter,
                    'status' => 429,
                ];
            }

            $this->logger->error('AI suggestion service HTTP error.', [
                'status' => $status,
                'message' => $message,
            ]);

            $fallback = $this->tryOpenRouterFallback($partner, 'openai_http_' . $status, $message);
            if ($fallback !== null) {
                return $fallback;
            }

            return [
                'suggestions' => [],
                'error' => 'Erreur du service IA (HTTP ' . $status . ').',
                'retry_after' => $retryAfter,
                'status' => $status >= 400 && $status < 600 ? $status : 502,
            ];
        } catch (\Exception $e) {
            $this->logger->error('An unexpected error occurred in AI suggestion service: ' . $e->getMessage());
            $fallback = $this->tryOpenRouterFallback($partner, 'unexpected_exception', $e->getMessage());
            if ($fallback !== null) {
                return $fallback;
            }
            return [
                'suggestions' => [],
                'error' => 'Une erreur inattendue est survenue.',
                'retry_after' => null,
                'status' => 500,
            ];
        }
    }

    private function tryOpenRouterFallback(Partner $partner, string $reason, ?string $details): ?array
    {
        if ($this->openRouterClient === null) {
            return null;
        }

        try {
            $suggestions = $this->openRouterClient->suggestPartnerCollaborations(
                $partner->getName(),
                $partner->getTypePartenaire() ? $partner->getTypePartenaire()->value : null
            );

            if (!empty($suggestions)) {
                $this->logger->info('AI suggestions served by OpenRouter fallback.', [
                    'reason' => $reason,
                    'details' => $details,
                ]);

                return [
                    'suggestions' => $suggestions,
                    'error' => null,
                    'retry_after' => null,
                    'status' => 200,
                ];
            }
        } catch (\Throwable $t) {
            $this->logger->error('OpenRouter fallback failed.', [
                'reason' => $reason,
                'details' => $details,
                'error' => $t->getMessage(),
            ]);
        }

        return null;
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