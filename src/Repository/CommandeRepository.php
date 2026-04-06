<?php

namespace App\Repository;

use App\Entity\Commande;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Commande>
 */
class CommandeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Commande::class);
    }

    public function findAllPaginated(int $page = 1, int $limit = 10, ?string $status = null, ?int $productId = null): array
    {
        $qb = $this->createQueryBuilder('c')
            ->leftJoin('c.product', 'p')
            ->addSelect('p')
            ->orderBy('c.createdAt', 'DESC');

        if ($status) {
            $qb->andWhere('c.status = :status')->setParameter('status', $status);
        }
        if ($productId) {
            $qb->andWhere('p.id = :productId')->setParameter('productId', $productId);
        }

        $offset = ($page - 1) * $limit;
        return $qb->setFirstResult($offset)
            ->setMaxResults($limit)
            ->getQuery()
            ->getResult();
    }

    public function countAll(?string $status = null, ?int $productId = null): int
    {
        $qb = $this->createQueryBuilder('c')
            ->select('COUNT(c.id)');

        if ($status) {
            $qb->andWhere('c.status = :status')->setParameter('status', $status);
        }
        if ($productId) {
            $qb->andWhere('c.product = :productId')->setParameter('productId', $productId);
        }

        return (int) $qb->getQuery()->getSingleScalarResult();
    }

    /**
     * Get monthly revenue for the last N months (ordered DESC by month).
     * @return array [['month' => 'YYYY-MM', 'revenue' => float], ...]
     */
    public function findMonthlyRevenue(int $months = 12): array
    {
        $since = new \DateTime("-{$months} months");
        $since->modify('first day of this month');

        $conn = $this->getEntityManager()->getConnection();
        $sql = "SELECT DATE_FORMAT(commande_date, '%Y-%m') AS month, 
                       SUM(total_price) AS revenue 
                FROM commande 
                WHERE commande_date >= :since 
                  AND status IN ('PAID', 'PENDING')
                GROUP BY month 
                ORDER BY month DESC";

        $result = $conn->executeQuery($sql, ['since' => $since->format('Y-m-d')])->fetchAllAssociative();

        return array_map(fn($r) => [
            'month' => $r['month'],
            'revenue' => round((float) $r['revenue'], 2),
        ], $result);
    }

    /**
     * Get top products by total revenue.
     * @return array [['productName' => string, 'totalRevenue' => float, 'orderCount' => int], ...]
     */
    public function findTopProductsByRevenue(int $limit = 5): array
    {
        $conn = $this->getEntityManager()->getConnection();
        $sql = "SELECT p.name AS productName, 
                       SUM(c.total_price) AS totalRevenue, 
                       COUNT(c.id) AS orderCount
                FROM commande c 
                JOIN product p ON c.product_id = p.id 
                GROUP BY p.id, p.name 
                ORDER BY totalRevenue DESC 
                LIMIT " . (int) $limit;

        $result = $conn->executeQuery($sql)->fetchAllAssociative();

        return array_map(fn($r) => [
            'productName' => $r['productName'],
            'totalRevenue' => round((float) $r['totalRevenue'], 2),
            'orderCount' => (int) $r['orderCount'],
        ], $result);
    }

    /**
     * Get monthly order count for the last N months.
     * @return array [['month' => 'YYYY-MM', 'count' => int], ...]
     */
    public function findMonthlyOrderCount(int $months = 12): array
    {
        $since = new \DateTime("-{$months} months");
        $since->modify('first day of this month');

        $conn = $this->getEntityManager()->getConnection();
        $sql = "SELECT DATE_FORMAT(commande_date, '%Y-%m') AS month, 
                       COUNT(id) AS cnt 
                FROM commande 
                WHERE commande_date >= :since 
                GROUP BY month 
                ORDER BY month DESC";

        $result = $conn->executeQuery($sql, ['since' => $since->format('Y-m-d')])->fetchAllAssociative();

        return array_map(fn($r) => [
            'month' => $r['month'],
            'count' => (int) $r['cnt'],
        ], $result);
    }

    /**
     * Get average basket value for paid commandes.
     */
    public function getAveragePaidBasket(): float
    {
        $conn = $this->getEntityManager()->getConnection();
        $sql = "SELECT AVG(total_price) AS avg_basket FROM commande WHERE status = 'PAID'";
        $result = $conn->executeQuery($sql)->fetchAssociative();

        return round((float) ($result['avg_basket'] ?? 0), 2);
    }
}
