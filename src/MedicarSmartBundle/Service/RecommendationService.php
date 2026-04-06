<?php

namespace App\MedicarSmartBundle\Service;

use App\Entity\Product;
use App\Repository\ProductRepository;

/**
 * Hybrid product recommendation engine.
 * Combines rule-based logic (type, price, popularity) with optional AI recommendations.
 */
class RecommendationService
{
    public function __construct(
        private ProductRepository $productRepository,
        private OpenRouterClient $openRouterClient,
    ) {}

    /**
     * Get product recommendations using rule-based logic.
     *
     * @param Product $currentProduct The product to base recommendations on
     * @param int     $limit          Max number of recommendations
     * @return Product[]
     */
    public function getRecommendations(Product $currentProduct, int $limit = 4): array
    {
        $recommendations = [];
        $excludeIds = [$currentProduct->getId()];

        // 1. Same type products
        $sameType = $this->productRepository->findSimilarProducts($currentProduct, $limit);
        foreach ($sameType as $product) {
            if (!in_array($product->getId(), $excludeIds)) {
                $recommendations[$product->getId()] = $product;
                $excludeIds[] = $product->getId();
            }
        }

        // 2. Most ordered products (popular)
        if (count($recommendations) < $limit) {
            $popular = $this->productRepository->findMostOrdered($limit + count($excludeIds));
            foreach ($popular as $row) {
                if (count($recommendations) >= $limit) break;
                $product = $row['product'] ?? $row[0] ?? null;
                if ($product instanceof Product && !in_array($product->getId(), $excludeIds)) {
                    $recommendations[$product->getId()] = $product;
                    $excludeIds[] = $product->getId();
                }
            }
        }

        // 3. Price-similar products (±30%)
        if (count($recommendations) < $limit) {
            $priceSimilar = $this->productRepository->findByPriceRange(
                $currentProduct->getPrice() * 0.7,
                $currentProduct->getPrice() * 1.3,
                $limit + count($excludeIds)
            );
            foreach ($priceSimilar as $product) {
                if (count($recommendations) >= $limit) break;
                if (!in_array($product->getId(), $excludeIds)) {
                    $recommendations[$product->getId()] = $product;
                    $excludeIds[] = $product->getId();
                }
            }
        }

        return array_slice(array_values($recommendations), 0, $limit);
    }

    /**
     * Get AI-powered recommendations via OpenRouter.
     *
     * @param Product   $product       Current product
     * @param Product[] $orderHistory  Products from user's order history
     * @return Product[]
     */
    public function getAIRecommendations(Product $product, array $orderHistory = []): array
    {
        try {
            $historyData = array_map(fn(Product $p) => [
                'id' => $p->getId(),
                'name' => $p->getName(),
                'type' => $p->getType()->getLabel(),
                'price' => $p->getPrice(),
            ], $orderHistory);

            // Add current product context
            $historyData[] = [
                'id' => $product->getId(),
                'name' => $product->getName(),
                'type' => $product->getType()->getLabel(),
                'price' => $product->getPrice(),
                'current' => true,
            ];

            $recommendedIds = $this->openRouterClient->recommendProducts($historyData);
            $recommendedIds = array_filter($recommendedIds, fn($id) => $id !== $product->getId());

            if (empty($recommendedIds)) {
                return $this->getRecommendations($product);
            }

            $products = $this->productRepository->findBy([
                'id' => $recommendedIds,
                'isActive' => true,
            ]);

            return !empty($products) ? array_slice($products, 0, 4) : $this->getRecommendations($product);
        } catch (\Throwable) {
            // Fallback to rule-based if AI fails
            return $this->getRecommendations($product);
        }
    }
}
