<?php

namespace App\Controller;

use App\Service\TranslationService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

class ChatbotController extends AbstractController
{
    private $translationService;

    public function __construct(TranslationService $translationService)
    {
        $this->translationService = $translationService;
    }

    #[Route('/chatbot', name: 'app_chatbot')]
    public function index(): Response
    {
        return $this->render('chatbot/chatbot.html.twig');
    }

    #[Route('/chatbot/ask', name: 'app_chatbot_ask', methods: ['POST'])]
    public function ask(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        $userMessage = $data['message'] ?? '';

        if (empty($userMessage)) {
            return new JsonResponse(['error' => 'No message provided'], Response::HTTP_BAD_REQUEST);
        }

        try {
            $response = $this->translationService->getChatbotResponse($userMessage);
            return new JsonResponse(['reply' => $response]);
        } catch (\Exception $e) {
            return new JsonResponse(['error' => 'Failed to get response from AI service.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}