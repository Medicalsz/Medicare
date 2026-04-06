<?php

namespace App\Controller;

use App\Service\ImageGeneratorService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

class ImageGeneratorController extends AbstractController
{
    public function __construct(private readonly ImageGeneratorService $imageGeneratorService)
    {
    }

    #[Route('/image-generator', name: 'app_image_generator', methods: ['GET'])]
    public function index(): Response
    {
        return $this->render('image_generator/index.html.twig');
    }

    #[Route('/image-generator/generate', name: 'app_image_generator_generate', methods: ['POST'])]
    public function generate(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        $prompt = $data['prompt'] ?? '';

        if (empty($prompt)) {
            return new JsonResponse(['error' => 'No prompt provided'], Response::HTTP_BAD_REQUEST);
        }

        try {
            $imageUrl = $this->imageGeneratorService->generateImage($prompt);
            return new JsonResponse(['imageUrl' => $imageUrl]);
        } catch (\Exception $e) {
            return new JsonResponse(['error' => 'Failed to generate image.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}