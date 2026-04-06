<?php

namespace App\MedicarSmartBundle\Controller;

use App\MedicarSmartBundle\Service\MarketingAnalysisService;
use App\MedicarSmartBundle\Service\OpenRouterClient;
use App\Repository\CommandeRepository;
use App\Repository\ProductRepository;
use App\Repository\Partnership\PartnerRepository;
use App\Repository\Partnership\CollaborationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

class DashboardAnalyticsController extends AbstractController
{
    #[Route('/admin/dashboard', name: 'admin_dashboard', priority: 10)]
    #[IsGranted('ROLE_ADMIN')]
    public function dashboard(
        MarketingAnalysisService $marketingService,
        CommandeRepository $commandeRepository,
        ProductRepository $productRepository,
        PartnerRepository $partnerRepository,
        CollaborationRepository $collaborationRepository,
    ): Response {
        $monthlyRevenue = $marketingService->getMonthlyRevenue(12);
        $topProducts = $marketingService->getTopProducts(5);
        $monthlyOrders = $marketingService->getMonthlyOrderCount(12);
        $avgBasket = $marketingService->getAverageBasket();
        $growthRate = $marketingService->getGrowthRate();

        $totalRevenue = array_sum(array_column($monthlyRevenue, 'revenue'));
        $totalOrders = $commandeRepository->countAll();
        $totalProducts = $productRepository->countAll();

        $totalPartners = $partnerRepository->count([]);
        $totalCollaborations = $collaborationRepository->count([]);

        return $this->render('admin/dashboard_analytics.html.twig', [
            'monthlyRevenue' => $monthlyRevenue,
            'topProducts' => $topProducts,
            'monthlyOrders' => $monthlyOrders,
            'avgBasket' => round($avgBasket, 2),
            'growthRate' => $growthRate,
            'totalRevenue' => round($totalRevenue, 2),
            'totalOrders' => $totalOrders,
            'totalProducts' => $totalProducts,
            'totalPartners' => $totalPartners,
            'totalCollaborations' => $totalCollaborations,
        ]);
    }

    #[Route('/admin/api/analytics', name: 'admin_api_analytics', methods: ['GET'])]
    #[IsGranted('ROLE_ADMIN')]
    public function analyticsApi(MarketingAnalysisService $marketingService): JsonResponse
    {
        $monthlyRevenue = $marketingService->getMonthlyRevenue(12);
        $topProducts = $marketingService->getTopProducts(5);
        $monthlyOrders = $marketingService->getMonthlyOrderCount(12);
        $avgBasket = $marketingService->getAverageBasket();
        $growthRate = $marketingService->getGrowthRate();

        return $this->json([
            'monthlyRevenue' => $monthlyRevenue,
            'topProducts' => $topProducts,
            'monthlyOrders' => $monthlyOrders,
            'avgBasket' => round($avgBasket, 2),
            'growthRate' => $growthRate,
        ]);
    }

    #[Route('/admin/api/ai-analysis', name: 'admin_ai_analysis', methods: ['POST'])]
    #[IsGranted('ROLE_ADMIN')]
    public function aiAnalysis(
        MarketingAnalysisService $marketingService,
        OpenRouterClient $openRouterClient,
    ): JsonResponse {
        try {
            $analysisData = $marketingService->getMonthlyAnalysisData();
            $result = $openRouterClient->analyzeSales($analysisData);

            return $this->json($result);
        } catch (\Throwable $e) {
            return $this->json([
                'summary' => 'Unable to generate AI analysis: ' . $e->getMessage(),
                'risks' => 'Service temporarily unavailable.',
                'opportunities' => 'Please try again later.',
                'recommendations' => 'Check your API configuration and network connectivity.',
            ], Response::HTTP_OK);
        }
    }
}
