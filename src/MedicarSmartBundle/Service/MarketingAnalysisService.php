<?php

namespace App\MedicarSmartBundle\Service;

use App\Repository\CommandeRepository;
use App\Repository\ProductRepository;

/**
 * Service for marketing analytics calculations.
 * Provides revenue, growth, and trend data from commande history.
 */
class MarketingAnalysisService
{
    public function __construct(
        private CommandeRepository $commandeRepository,
        private ProductRepository $productRepository,
    ) {}

    /**
     * Get monthly revenue for the last N months.
     *
     * @return array [['month' => 'YYYY-MM', 'revenue' => float], ...]
     */
    public function getMonthlyRevenue(int $months = 12): array
    {
        return $this->commandeRepository->findMonthlyRevenue($months);
    }

    /**
     * Get top products by total revenue.
     *
     * @return array [['productName' => string, 'totalRevenue' => float, 'orderCount' => int], ...]
     */
    public function getTopProducts(int $limit = 5): array
    {
        return $this->commandeRepository->findTopProductsByRevenue($limit);
    }

    /**
     * Get monthly order count.
     *
     * @return array [['month' => 'YYYY-MM', 'count' => int], ...]
     */
    public function getMonthlyOrderCount(int $months = 12): array
    {
        return $this->commandeRepository->findMonthlyOrderCount($months);
    }

    /**
     * Get average basket value for paid orders.
     */
    public function getAverageBasket(): float
    {
        return $this->commandeRepository->getAveragePaidBasket();
    }

    /**
     * Calculate month-over-month growth rate (%).
     * Compares last completed month to the one before.
     */
    public function getGrowthRate(): float
    {
        $revenue = $this->getMonthlyRevenue(2);

        if (count($revenue) < 2) {
            return 0.0;
        }

        $current = (float) $revenue[0]['revenue'];
        $previous = (float) $revenue[1]['revenue'];

        if ($previous == 0) {
            return $current > 0 ? 100.0 : 0.0;
        }

        return round((($current - $previous) / $previous) * 100, 2);
    }

    /**
     * Get month-over-month evolution rates for the last N months.
     *
     * @return array [['month' => 'YYYY-MM', 'rate' => float], ...]
     */
    public function getEvolutionRates(int $months = 6): array
    {
        $revenue = $this->getMonthlyRevenue($months + 1);
        $rates = [];

        for ($i = 0; $i < count($revenue) - 1; $i++) {
            $current = (float) $revenue[$i]['revenue'];
            $previous = (float) $revenue[$i + 1]['revenue'];
            $rate = $previous > 0 ? round((($current - $previous) / $previous) * 100, 2) : 0;

            $rates[] = [
                'month' => $revenue[$i]['month'],
                'rate' => $rate,
            ];
        }

        return $rates;
    }

    /**
     * Get aggregated analysis data for AI consumption.
     */
    public function getMonthlyAnalysisData(): array
    {
        $revenue = $this->getMonthlyRevenue(6);
        $topProducts = $this->getTopProducts(5);
        $orderCount = $this->getMonthlyOrderCount(6);
        $avgBasket = $this->getAverageBasket();
        $growthRate = $this->getGrowthRate();

        $totalRevenue = array_sum(array_column($revenue, 'revenue'));
        $totalOrders = array_sum(array_column($orderCount, 'count'));

        return [
            'period' => 'Last 6 months',
            'totalRevenue' => round($totalRevenue, 2),
            'totalOrders' => $totalOrders,
            'averageBasket' => round($avgBasket, 2),
            'growthRate' => $growthRate,
            'monthlyRevenue' => $revenue,
            'topProducts' => $topProducts,
            'monthlyOrders' => $orderCount,
        ];
    }

}
