<?php

namespace App\Controller\Api;

use App\Entity\Partnership\Partner;
use App\Repository\Partnership\PartnerRepository;
use App\Service\AiSuggestionService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class PartnerController extends AbstractController
{
    #[Route('/api/partners', name: 'app_api_partners', methods: ['GET'])]
    public function index(PartnerRepository $partnerRepository, NormalizerInterface $normalizer): JsonResponse
    {
        $partners = $partnerRepository->findAll();
        
        $data = $normalizer->normalize($partners, 'json', ['groups' => 'partner:read']);

        return new JsonResponse($data);
    }

    #[Route('/api/partners/{id}', name: 'app_api_partner_show', methods: ['GET'])]
    public function show(Partner $partner, NormalizerInterface $normalizer): JsonResponse
    {
        $data = $normalizer->normalize($partner, 'json', ['groups' => 'partner:read']);

        return new JsonResponse($data);
    }

    #[Route('/api/partners/{id}/suggest-collaboration', name: 'app_api_partner_suggest_collaboration', methods: ['POST'])]
    public function suggestCollaboration(Partner $partner, AiSuggestionService $aiSuggestionService): JsonResponse
    {
        $result = $aiSuggestionService->getSuggestions($partner);

        return new JsonResponse(
            [
                'suggestions' => $result['suggestions'] ?? [],
                'error' => $result['error'] ?? null,
                'retry_after' => $result['retry_after'] ?? null,
            ],
            (int) ($result['status'] ?? 200)
        );
    }
}