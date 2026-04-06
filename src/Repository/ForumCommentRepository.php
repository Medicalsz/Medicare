<?php

namespace App\Repository;

use App\Entity\ForumComment;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ForumComment>
 *
 * @method ForumComment|null find($id, $lockMode = null, $lockVersion = null)
 * @method ForumComment|null findOneBy(array $criteria, array $orderBy = null)
 * @method ForumComment[]    findAll()
 * @method ForumComment[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ForumCommentRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ForumComment::class);
    }

    /**
     * @return ForumComment[]
     */
    public function findReportedForModeration(?string $authorSearch = null, int $limit = 25): array
    {
        $qb = $this->createQueryBuilder('c')
            ->leftJoin('c.author', 'a')
            ->addSelect('a')
            ->leftJoin('c.topic', 't')
            ->addSelect('t')
            ->andWhere('c.isReported = :reported')
            ->setParameter('reported', true)
            ->orderBy('c.reportedAt', 'DESC')
            ->addOrderBy('c.id', 'DESC')
            ->setMaxResults(max(1, $limit));

        if ($authorSearch !== null && $authorSearch !== '') {
            $normalized = '%' . mb_strtolower(trim($authorSearch)) . '%';
            $qb
                ->andWhere('LOWER(a.prenom) LIKE :search OR LOWER(a.nom) LIKE :search OR LOWER(CONCAT(a.prenom, \' \', a.nom)) LIKE :search')
                ->setParameter('search', $normalized);
        }

        return $qb->getQuery()->getResult();
    }
}

