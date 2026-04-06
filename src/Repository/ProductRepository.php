<?php

namespace App\Repository;

use App\Entity\Product;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Product>
 */
class ProductRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Product::class);
    }

    public function findAllPaginated(int $page = 1, int $limit = 10): array
    {
        $offset = ($page - 1) * $limit;
        return $this->createQueryBuilder('p')
            ->orderBy('p.createdAt', 'DESC')
            ->setFirstResult($offset)
            ->setMaxResults($limit)
            ->getQuery()
            ->getResult();
    }

    public function countAll(): int
    {
        return (int) $this->createQueryBuilder('p')
            ->select('COUNT(p.id)')
            ->getQuery()
            ->getSingleScalarResult();
    }

    public function findActiveProducts(): array
    {
        return $this->createQueryBuilder('p')
            ->where('p.isActive = true')
            ->orderBy('p.createdAt', 'DESC')
            ->getQuery()
            ->getResult();
    }

    /**
     * Find similar products by same type and price range (±30%), excluding the given product.
     *
     * @return Product[]
     */
    public function findSimilarProducts(Product $product, int $limit = 4): array
    {
        $minPrice = $product->getPrice() * 0.7;
        $maxPrice = $product->getPrice() * 1.3;

        return $this->createQueryBuilder('p')
            ->where('p.isActive = true')
            ->andWhere('p.id != :id')
            ->andWhere('p.type = :type')
            ->andWhere('p.price BETWEEN :min AND :max')
            ->setParameter('id', $product->getId())
            ->setParameter('type', $product->getType())
            ->setParameter('min', $minPrice)
            ->setParameter('max', $maxPrice)
            ->setMaxResults($limit)
            ->orderBy('p.createdAt', 'DESC')
            ->getQuery()
            ->getResult();
    }

    /**
     * Find most ordered products (by number of commandes).
     *
     * @return array [['product' => Product, 'orderCount' => int], ...]
     */
    public function findMostOrdered(int $limit = 5): array
    {
        return $this->createQueryBuilder('p')
            ->select('p AS product, COUNT(c.id) AS orderCount')
            ->join('p.commandes', 'c')
            ->where('p.isActive = true')
            ->groupBy('p.id')
            ->orderBy('orderCount', 'DESC')
            ->setMaxResults($limit)
            ->getQuery()
            ->getResult();
    }

    /**
     * Find active products within a price range.
     *
     * @return Product[]
     */
    public function findByPriceRange(float $min, float $max, int $limit = 5): array
    {
        return $this->createQueryBuilder('p')
            ->where('p.isActive = true')
            ->andWhere('p.price BETWEEN :min AND :max')
            ->setParameter('min', $min)
            ->setParameter('max', $max)
            ->setMaxResults($limit)
            ->orderBy('p.createdAt', 'DESC')
            ->getQuery()
            ->getResult();
    }
}
