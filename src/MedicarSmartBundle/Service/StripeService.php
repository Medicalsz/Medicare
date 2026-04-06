<?php

namespace App\MedicarSmartBundle\Service;

use App\Entity\Commande;
use Stripe\PaymentIntent;
use Stripe\Stripe;
use Symfony\Component\DependencyInjection\Attribute\Autowire;

/**
 * Simple Stripe PaymentIntent service.
 * Creates and verifies payments for commandes.
 */
class StripeService
{
    public function __construct(
        #[Autowire('%env(STRIPE_SECRET_KEY)%')]
        private string $secretKey,
    ) {
        Stripe::setApiKey($this->secretKey);
    }

    /**
     * Create a PaymentIntent for a commande.
     *
     * @param Commande $commande The order to charge
     * @return PaymentIntent The created PaymentIntent with client_secret
     */
    public function createPaymentIntent(Commande $commande): PaymentIntent
    {
        $amountCents = (int) round((float) $commande->getTotalPrice() * 100);

        return PaymentIntent::create([
            'amount' => $amountCents,
            'currency' => 'usd',
            'metadata' => [
                'commande_id' => $commande->getId(),
                'commande_number' => $commande->getCommandeNumber(),
            ],
            'description' => 'Medicare Order ' . $commande->getCommandeNumber(),
        ]);
    }

    /**
     * Check a PaymentIntent's current status.
     *
     * @return string e.g. 'succeeded', 'requires_payment_method', etc.
     */
    public function confirmPaymentStatus(string $paymentIntentId): string
    {
        $pi = PaymentIntent::retrieve($paymentIntentId);
        return $pi->status;
    }
}
