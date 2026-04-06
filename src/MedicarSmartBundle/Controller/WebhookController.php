<?php

namespace App\MedicarSmartBundle\Controller;

use App\Repository\CommandeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

/**
 * Stripe webhook endpoint (stub).
 * For production, implement full signature verification.
 */
class WebhookController extends AbstractController
{
    #[Route('/stripe/webhook', name: 'stripe_webhook', methods: ['POST'])]
    public function handleWebhook(
        Request $request,
        CommandeRepository $commandeRepository,
        EntityManagerInterface $em,
    ): Response {
        $payload = $request->getContent();
        $data = json_decode($payload, true);

        if (!$data || !isset($data['type'])) {
            return new Response('Invalid payload', Response::HTTP_BAD_REQUEST);
        }

        // Handle payment_intent.succeeded
        if ($data['type'] === 'payment_intent.succeeded') {
            $piData = $data['data']['object'] ?? [];
            $commandeId = $piData['metadata']['commande_id'] ?? null;

            if ($commandeId) {
                $commande = $commandeRepository->find($commandeId);
                if ($commande && $commande->getStatus() === 'PENDING') {
                    $commande->setStatus('PAID');
                    $em->flush();
                }
            }
        }

        return new Response('OK', Response::HTTP_OK);
    }
}
