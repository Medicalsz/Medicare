<?php

namespace App\MedicarSmartBundle\Service;

use Symfony\Component\DependencyInjection\Attribute\Autowire;
use Symfony\Contracts\HttpClient\HttpClientInterface;

/**
 * Client for the OpenRouter API (Nemotron model).
 * Handles all AI-related HTTP calls with guardrails.
 */
class OpenRouterClient
{
    private const MODEL = 'nvidia/nemotron-3-nano-30b-a3b:free';
    private const API_URL = 'https://openrouter.ai/api/v1/chat/completions';
    private const TEMPERATURE = 0.3;

    public function __construct(
        private HttpClientInterface $httpClient,
        #[Autowire('%env(OPENROUTER_API_KEY)%')]
        private string $apiKey,
    ) {}

    /**
     * Send a chat completion request to OpenRouter.
     */
    private function chat(string $systemPrompt, string $userMessage, bool $jsonMode = false): string
    {
        $payload = [
            'model' => self::MODEL,
            'temperature' => self::TEMPERATURE,
            'messages' => [
                ['role' => 'system', 'content' => $systemPrompt],
                ['role' => 'user', 'content' => $userMessage],
            ],
        ];

        if ($jsonMode) {
            $payload['response_format'] = ['type' => 'json_object'];
        }

        $response = $this->httpClient->request('POST', self::API_URL, [
            'headers' => [
                'Authorization' => 'Bearer ' . $this->apiKey,
                'Content-Type' => 'application/json',
                'HTTP-Referer' => 'https://medicare.local',
                'X-Title' => 'Medicare AI Services',
            ],
            'json' => $payload,
        ]);

        $data = $response->toArray(false);

        if (isset($data['error'])) {
            throw new \RuntimeException('OpenRouter API error: ' . ($data['error']['message'] ?? 'Unknown error'));
        }

        return $data['choices'][0]['message']['content'] ?? '';
    }

    /**
     * Recommend products based on purchase history.
     *
     * @param array $history Array of product data [{id, name, type, price}, ...]
     * @return array List of recommended product IDs
     */
    public function recommendProducts(array $history): array
    {
        $systemPrompt = <<<PROMPT
You are a medical product recommendation engine.
Based on the user's purchase history, recommend complementary medical products.
Return ONLY a JSON array of product IDs (integers) that would be good recommendations.
Consider: same category products, complementary items, price range similarity.
Return between 3 and 6 product IDs. Respond ONLY with a JSON array like [1, 5, 12].
PROMPT;

        $userMsg = "Purchase history:\n" . json_encode($history, JSON_PRETTY_PRINT);

        $response = $this->chat($systemPrompt, $userMsg, true);

        $decoded = json_decode($response, true);
        if (is_array($decoded) && isset($decoded[0])) {
            return array_filter($decoded, 'is_int');
        }

        // Try to extract array from response
        if (preg_match('/\[[\d,\s]+\]/', $response, $matches)) {
            return json_decode($matches[0], true) ?: [];
        }

        return [];
    }

    /**
     * Suggest collaboration ideas for a partner profile.
     *
     * @return string[] List of suggestions (max 3)
     */
    public function suggestPartnerCollaborations(string $partnerName, ?string $partnerType = null): array
    {
        $systemPrompt = 'You are a creative assistant for a healthcare organization. '
            . 'Suggest exactly 3 brief, actionable collaboration ideas. '
            . 'Each suggestion should be a single, complete sentence. '
            . 'Do not use numbered lists or markdown formatting.';

        $userMsg = "Partner Profile:\nName: " . $partnerName . "\nType: " . ($partnerType ?: 'N/A');

        $response = trim($this->chat($systemPrompt, $userMsg, false));
        if ($response === '') {
            return [];
        }

        $lines = array_values(array_filter(array_map('trim', preg_split('/\R/u', $response) ?: [])));
        if (count($lines) === 1) {
            // Sometimes models return "A. ... B. ... C. ..." in one line
            $maybeSplit = preg_split('/\s*(?:\d+[\.\)]|[-•])\s+/u', $lines[0]) ?: [];
            $maybeSplit = array_values(array_filter(array_map('trim', $maybeSplit)));
            if (count($maybeSplit) >= 2) {
                $lines = $maybeSplit;
            }
        }

        return array_slice($lines, 0, 3);
    }

    /**
     * Analyze sales data and return structured marketing insights.
     *
     * @param array $salesData ['revenue' => float, 'topProducts' => [...], 'orderCount' => int, ...]
     * @return array{summary:string,risks:string,opportunities:string,recommendations:string}
     */
    public function analyzeSales(array $salesData): array
    {
        $systemPrompt = <<<PROMPT
You are a business analytics AI specialized in medical/pharmaceutical product sales.
Analyze the provided sales data and return a JSON object with exactly these keys:
- "summary": A brief overview of the current business performance (2-3 sentences)
- "risks": Key risks or concerns identified (2-3 points)
- "opportunities": Growth opportunities spotted (2-3 points)
- "recommendations": Actionable recommendations (2-3 points)

Keep each value as a string. Be specific and data-driven. Respond ONLY with valid JSON.
PROMPT;

        $userMsg = "Analyze this sales data:\n" . json_encode($salesData, JSON_PRETTY_PRINT);

        $response = $this->chat($systemPrompt, $userMsg, false);

        $decoded = json_decode($response, true);
        if (!$decoded && preg_match('/\{[\s\S]*\}/', $response, $matches)) {
            $decoded = json_decode($matches[0], true);
        }

        return $decoded ?: [
            'summary' => 'Unable to generate analysis at this time.',
            'risks' => 'Analysis unavailable.',
            'opportunities' => 'Analysis unavailable.',
            'recommendations' => 'Please try again later.',
        ];
    }

    /**
     * Generate a professional order summary for Finance and HR teams.
     *
     * @param array $orders Array of normalized orders sorted by highest value first
     */
    public function generateOrderSummaryForFinanceAndHR(array $orders): string
    {
        $systemPrompt = <<<PROMPT
You are an operations analyst assistant for a medical commerce company.
Create a professional summary for Finance and HR teams based on order data.

Rules:
1. Keep the summary concise but structured.
2. Mention that orders are ranked from highest-value to lowest-value (best first).
3. Include: key order volume insights, item/quantity patterns, special notes overview, and staffing/operations implications.
4. Do not invent missing data.
5. Use clear, business-friendly language.
PROMPT;

        $userMsg = "Generate a professional internal summary from these orders (already sorted by highest total first):\n"
            . json_encode($orders, JSON_PRETTY_PRINT);

        $response = trim($this->chat($systemPrompt, $userMsg, false));

        return $response !== ''
            ? $response
            : 'AI could not generate a summary at this time. Please try again.';
    }
}
