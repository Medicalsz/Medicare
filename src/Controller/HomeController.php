<?php

namespace App\Controller;

use App\Entity\Commande;
use App\Entity\Product;
use App\Repository\CommandeRepository;
use App\Repository\ProductRepository;
use App\MedicarSmartBundle\Service\PdfService;
use App\MedicarSmartBundle\Service\RecommendationService;
use App\MedicarSmartBundle\Service\StripeService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(): Response
    {
        return $this->render('frontend/index.html.twig');
    }

    #[Route('/about', name: 'app_about')]
    public function about(): Response
    {
        return $this->render('frontend/about.html.twig');
    }

    #[Route('/departments', name: 'app_departments')]
    public function departments(): Response
    {
        return $this->render('frontend/departments.html.twig');
    }

    #[Route('/departments/{id}', name: 'app_department_details')]
    public function departmentDetails(int $id = 1): Response
    {
        return $this->render('frontend/department_details.html.twig');
    }

    #[Route('/services', name: 'app_services')]
    public function services(): Response
    {
        return $this->render('frontend/services.html.twig');
    }

    #[Route('/services/{id}', name: 'app_service_details')]
    public function serviceDetails(int $id = 1): Response
    {
        return $this->render('frontend/service_details.html.twig');
    }

    #[Route('/doctors', name: 'app_doctors')]
    public function doctors(): Response
    {
        return $this->render('frontend/doctors.html.twig');
    }

    #[Route('/appointment', name: 'app_appointment')]
    public function appointment(): Response
    {
        return $this->render('frontend/appointment.html.twig');
    }

    #[Route('/testimonials', name: 'app_testimonials')]
    public function testimonials(): Response
    {
        return $this->render('frontend/testimonials.html.twig');
    }

    #[Route('/faq', name: 'app_faq')]
    public function faq(): Response
    {
        return $this->render('frontend/faq.html.twig');
    }

    #[Route('/gallery', name: 'app_gallery')]
    public function gallery(): Response
    {
        return $this->render('frontend/gallery.html.twig');
    }

    #[Route('/contact', name: 'app_contact')]
    public function contact(): Response
    {
        return $this->render('frontend/contact.html.twig');
    }

    #[Route('/terms', name: 'app_terms')]
    public function terms(): Response
    {
        return $this->render('frontend/terms.html.twig');
    }

    #[Route('/privacy', name: 'app_privacy')]
    public function privacy(): Response
    {
        return $this->render('frontend/privacy.html.twig');
    }

    #[Route('/products', name: 'app_products')]
    public function products(Request $request, ProductRepository $repo): Response
    {
        $page = max(1, $request->query->getInt('page', 1));
        $limit = 9;
        $products = $repo->findActiveProducts();

        return $this->render('frontend/products.html.twig', [
            'products' => $products,
        ]);
    }

    #[Route('/products/{id}', name: 'app_product_detail', requirements: ['id' => '\d+'])]
    public function productDetail(Product $product, RecommendationService $recommendationService): Response
    {
        $recommendations = $recommendationService->getRecommendations($product, 4);

        return $this->render('frontend/product_detail.html.twig', [
            'product' => $product,
            'recommendations' => $recommendations,
        ]);
    }

    #[Route('/products/{id}/order', name: 'app_product_order', requirements: ['id' => '\d+'], methods: ['GET', 'POST'])]
    public function productOrder(Request $request, Product $product, EntityManagerInterface $em, ValidatorInterface $validator): Response
    {
        $errors = [];

        if ($request->isMethod('POST')) {
            $quantity = (int) $request->request->get('quantity', 1);
            $notes = trim((string) $request->request->get('notes', ''));

            // Backend validation
            if ($quantity < 1) {
                $errors[] = 'Quantity must be at least 1.';
            }
            if ($quantity > $product->getQuantity()) {
                $errors[] = 'Not enough stock. Only ' . $product->getQuantity() . ' available.';
            }
            if ($quantity > 9999) {
                $errors[] = 'Quantity cannot exceed 9,999.';
            }
            if (mb_strlen($notes) > 2000) {
                $errors[] = 'Notes cannot exceed 2,000 characters.';
            }
            if (!$product->isActive()) {
                $errors[] = 'This product is currently unavailable.';
            }

            if (empty($errors)) {
                $commande = new Commande();
                $commande->setCommandeNumber('CMD-' . strtoupper(uniqid()));
                $commande->setProduct($product);
                $commande->setQuantity($quantity);
                $commande->setCommandeDate(new \DateTime());
                $commande->setNotes($notes ?: null);
                $commande->calculateTotalPrice();

                // Validate entity constraints
                $violations = $validator->validate($commande);
                if (count($violations) > 0) {
                    foreach ($violations as $violation) {
                        $errors[] = $violation->getMessage();
                    }
                } else {
                    $em->persist($commande);
                    $em->flush();

                    // Redirect to payment page
                    return $this->redirectToRoute('app_product_pay', [
                        'id' => $product->getId(),
                        'commandeId' => $commande->getId(),
                    ]);
                }
            }
        }

        return $this->render('frontend/product_order.html.twig', [
            'product' => $product,
            'errors' => $errors,
        ]);
    }

    #[Route('/products/{id}/pay/{commandeId}', name: 'app_product_pay', requirements: ['id' => '\d+', 'commandeId' => '\d+'])]
    public function productPay(
        Product $product,
        int $commandeId,
        CommandeRepository $commandeRepository,
        StripeService $stripeService,
    ): Response {
        $commande = $commandeRepository->find($commandeId);

        if (!$commande || $commande->getProduct()->getId() !== $product->getId()) {
            throw $this->createNotFoundException('Order not found.');
        }

        if ($commande->getStatus() === 'PAID') {
            return $this->redirectToRoute('app_order_confirmation', ['id' => $commande->getId()]);
        }

        if ($commande->getStatus() === 'CANCELLED') {
            $this->addFlash('error', 'This order has been cancelled.');
            return $this->redirectToRoute('app_product_detail', ['id' => $product->getId()]);
        }

        // Create Stripe PaymentIntent
        $paymentIntent = $stripeService->createPaymentIntent($commande);

        return $this->render('frontend/payment.html.twig', [
            'product' => $product,
            'commande' => $commande,
            'clientSecret' => $paymentIntent->client_secret,
            'stripePublicKey' => $this->getParameter('stripe_public_key'),
        ]);
    }

    #[Route('/order/{id}/payment-success', name: 'app_payment_success', requirements: ['id' => '\d+'], methods: ['POST'])]
    public function paymentSuccess(
        int $id,
        Request $request,
        CommandeRepository $commandeRepository,
        EntityManagerInterface $em,
    ): Response {
        $data = json_decode($request->getContent(), true);
        $paymentIntentId = $data['payment_intent_id'] ?? null;

        $commande = $commandeRepository->find($id);

        if ($commande && $paymentIntentId && $commande->getStatus() === 'PENDING') {
            $commande->setStripePaymentIntentId($paymentIntentId);
            $commande->setStatus('PAID');

            // Reduce product stock
            $product = $commande->getProduct();
            if ($product) {
                $newQty = max(0, $product->getQuantity() - $commande->getQuantity());
                $product->setQuantity($newQty);
            }

            $em->flush();
        }

        return $this->json(['success' => true]);
    }

    #[Route('/order/{id}/confirmation', name: 'app_order_confirmation', requirements: ['id' => '\d+'])]
    public function orderConfirmation(
        int $id,
        CommandeRepository $commandeRepository,
        StripeService $stripeService,
        EntityManagerInterface $em,
    ): Response {
        $commande = $commandeRepository->find($id);

        if (!$commande) {
            throw $this->createNotFoundException('Order not found.');
        }

        // If still pending, check Stripe PI status
        if ($commande->getStatus() === 'PENDING' && $commande->getStripePaymentIntentId()) {
            $piStatus = $stripeService->confirmPaymentStatus($commande->getStripePaymentIntentId());
            if ($piStatus === 'succeeded') {
                $commande->setStatus('PAID');

                // Reduce product stock
                $product = $commande->getProduct();
                if ($product) {
                    $newQty = max(0, $product->getQuantity() - $commande->getQuantity());
                    $product->setQuantity($newQty);
                }

                $em->flush();
            }
        }

        return $this->render('frontend/order_confirmation.html.twig', [
            'commande' => $commande,
        ]);
    }

    #[Route('/order/{id}/invoice', name: 'app_order_invoice', requirements: ['id' => '\d+'])]
    public function orderInvoice(
        int $id,
        CommandeRepository $commandeRepository,
        PdfService $pdfService,
    ): Response {
        $commande = $commandeRepository->find($id);

        if (!$commande) {
            throw $this->createNotFoundException('Order not found.');
        }

        if ($commande->getStatus() !== 'PAID') {
            $this->addFlash('error', 'Invoice is only available for paid orders.');
            return $this->redirectToRoute('app_products');
        }

        $pdfContent = $pdfService->generateInvoice($commande);

        return new Response($pdfContent, Response::HTTP_OK, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'attachment; filename="invoice-' . $commande->getCommandeNumber() . '.pdf"',
        ]);
    }
}
