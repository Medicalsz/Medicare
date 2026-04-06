<?php

namespace App\Service;

use Psr\Log\LoggerInterface;

class ImageGeneratorService
{
    public function __construct(
        private readonly DalleClient $dalleClient,
        private readonly LoggerInterface $logger
    ) {
    }

    /**
     * Generates an image based on a text prompt.
     *
     * @param string $prompt The text description of the image to generate.
     * @return string The URL of the generated image.
     * @throws \Exception If the image generation fails.
     */
    public function generateImage(string $prompt): string
    {
        $this->logger->info('Starting image generation', ['prompt' => $prompt]);

        try {
            $imageUrl = $this->dalleClient->generateImage($prompt);
            $this->logger->info('Image generation successful', ['url' => $imageUrl]);
            return $imageUrl;
        } catch (\Exception $e) {
            $this->logger->error('Image generation failed: ' . $e->getMessage());
            // Re-throw the exception to be handled by the controller
            throw $e;
        }
    }
}