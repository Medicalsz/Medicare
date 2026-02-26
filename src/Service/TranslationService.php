<?php

namespace App\Service;

use Psr\Log\LoggerInterface;

class TranslationService
{
    public function __construct(
        private readonly GeminiClient $geminiClient,
        private readonly LoggerInterface $logger
    ) {
    }

    /**
     * Translates the given text to the target language.
     *
     * @param string $text The text to translate.
     * @param string $targetLanguage The language to translate the text into (e.g., "French", "Spanish").
     * @return string The translated text.
     * @throws \Exception If the translation fails.
     */
    public function translate(string $text, string $targetLanguage): string
    {
        $this->logger->info('Starting translation', ['target_language' => $targetLanguage]);

        // The system prompt instructs the model on its task.
        $systemPrompt = sprintf(
            'You are a professional translator. Translate the following text to %s. Respond with only the translated text and nothing else.',
            $targetLanguage
        );

        try {
            $payload = [
                'contents' => [
                    ['parts' => [['text' => $systemPrompt]]],
                    ['parts' => [['text' => $text]]],
                ]
            ];

            $data = $this->geminiClient->generateContent($payload);
            $translatedText = $data['candidates'][0]['content']['parts'][0]['text'] ?? '';

            if (empty($translatedText)) {
                throw new \Exception('Translation result was empty.');
            }

            $this->logger->info('Translation successful');

            return trim($translatedText);

        } catch (\Exception $e) {
            $this->logger->error('An error occurred during translation: ' . $e->getMessage(), [
                'trace' => $e->getTraceAsString()
            ]);

            // Re-throw the exception to be handled by the caller
            throw $e;
        }
    }

    /**
     * Gets a response from the AI for the chatbot.
     *
     * @param string $userMessage The user's message.
     * @return string The AI's response.
     * @throws \Exception If the AI call fails.
     */
    public function getChatbotResponse(string $userMessage): string
    {
        $this->logger->info('Getting chatbot response for user message.');

        $systemPrompt = 'You are a helpful and friendly AI assistant for a healthcare platform named Medicare. Answer the user\'s questions concisely and professionally. Do not invent medical advice. If asked for a diagnosis or treatment, you must advise the user to consult a real doctor.';

        try {
            $payload = [
                'contents' => [
                    ['parts' => [['text' => $systemPrompt]]],
                    ['parts' => [['text' => $userMessage]]],
                ]
            ];

            $data = $this->geminiClient->generateContent($payload);
            $responseText = $data['candidates'][0]['content']['parts'][0]['text'] ?? '';

            if (empty($responseText)) {
                throw new \Exception('Chatbot response was empty.');
            }

            $this->logger->info('Chatbot response generated successfully.');

            return trim($responseText);

        } catch (\Exception $e) {
            $this->logger->error('An error occurred during chatbot response generation: ' . $e->getMessage(), [
                'trace' => $e->getTraceAsString()
            ]);

            throw $e;
        }
    }
}