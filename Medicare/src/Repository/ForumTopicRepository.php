<?php

namespace App\Repository;

use App\Entity\ForumTopic;
use DateTimeInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Query\Expr\Orx;
use Doctrine\ORM\QueryBuilder;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ForumTopic>
 *
 * @method ForumTopic|null find($id, $lockMode = null, $lockVersion = null)
 * @method ForumTopic|null findOneBy(array $criteria, array $orderBy = null)
 * @method ForumTopic[]    findAll()
 * @method ForumTopic[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ForumTopicRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ForumTopic::class);
    }

    public function findFiltered(?DateTimeInterface $from, ?DateTimeInterface $to, string $sort = 'desc'): array
    {
        return $this->createFilteredQueryBuilder($from, $to, $sort)
            ->getQuery()
            ->getResult();
    }

    public function createFilteredQueryBuilder(?DateTimeInterface $from, ?DateTimeInterface $to, string $sort = 'desc'): QueryBuilder
    {
        $safeSort = strtolower($sort) === 'asc' ? 'ASC' : 'DESC';

        $qb = $this->createQueryBuilder('t');
        if ($from !== null) {
            $qb->andWhere('t.createdAt >= :from')
                ->setParameter('from', $from);
        }

        if ($to !== null) {
            $qb->andWhere('t.createdAt <= :to')
                ->setParameter('to', $to);
        }

        return $qb->orderBy('t.createdAt', $safeSort);
    }

    /**
     * @param list<string> $tags
     * @param list<string> $keywords
     * @return ForumTopic[]
     */
    public function findRecommendationCandidates(ForumTopic $topic, array $tags, array $keywords, int $limit = 30): array
    {
        $terms = array_values(array_unique(array_filter(
            array_merge($tags, $keywords),
            static fn (string $value): bool => trim($value) !== ''
        )));

        $qb = $this->createQueryBuilder('t')
            ->andWhere('t.id != :topicId')
            ->andWhere('t.isHidden = false')
            ->setParameter('topicId', $topic->getId())
            ->setMaxResults(max(5, $limit));

        if ($terms !== []) {
            $or = new Orx();
            foreach ($terms as $idx => $term) {
                $param = 'term_' . $idx;
                $or->add('LOWER(t.title) LIKE :' . $param);
                $or->add('LOWER(t.content) LIKE :' . $param);
                $qb->setParameter($param, '%' . mb_strtolower($term) . '%');
            }
            $qb->andWhere($or);
        }

        return $qb
            ->orderBy('t.createdAt', 'DESC')
            ->getQuery()
            ->getResult();
    }

    /**
     * @return ForumTopic[]
     */
    public function findPopularSince(DateTimeInterface $since, int $limit = 5, ?ForumTopic $exclude = null): array
    {
        $qb = $this->createQueryBuilder('t')
            ->leftJoin('t.comments', 'c')
            ->leftJoin('t.reactions', 'r')
            ->andWhere('t.isHidden = false')
            ->andWhere('t.createdAt >= :since')
            ->setParameter('since', $since)
            ->groupBy('t.id')
            ->orderBy('(COUNT(DISTINCT c.id) + COUNT(DISTINCT r.id))', 'DESC')
            ->addOrderBy('t.createdAt', 'DESC')
            ->setMaxResults(max(1, $limit));

        if ($exclude?->getId() !== null) {
            $qb->andWhere('t.id != :excludeId')
                ->setParameter('excludeId', $exclude->getId());
        }

        return $qb->getQuery()->getResult();
    }

//    /**
//     * @return ForumTopic[] Returns an array of ForumTopic objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('f')
//            ->andWhere('f.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('f.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?ForumTopic
//    {
//        return $this->createQueryBuilder('f')
//            ->andWhere('f.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
