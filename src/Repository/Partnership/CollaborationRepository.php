<?php

namespace App\Repository\Partnership;

use App\Entity\Partnership\Collaboration;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Collaboration>
 */
class CollaborationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Collaboration::class);
    }

    /**
     * @return Collaboration[]
     */
    public function findActiveWithFilters(?string $searchTerm, ?string $status): array
    {
        $qb = $this->createQueryBuilder('c')
            ->leftJoin('c.partner', 'p')
            ->addSelect('p')
            ->orderBy('c.dateDebut', 'DESC');

        // Default filter to show only EN_COURS or TERMINEE unless a specific status is requested
        if (!$status) {
            $qb->where('c.statut IN (:statuts)')
                ->setParameter('statuts', [\App\Enum\Partnership\StatutCollaboration::EN_COURS, \App\Enum\Partnership\StatutCollaboration::TERMINEE]);
        }

        if ($searchTerm) {
            $qb->andWhere('c.titre LIKE :searchTerm OR p.name LIKE :searchTerm')
                ->setParameter('searchTerm', '%' . $searchTerm . '%');
        }

        if ($status) {
            $qb->andWhere('c.statut = :status')
                ->setParameter('status', $status);
        }

        return $qb->getQuery()->getResult();
    }

    //    /**
    //     * @return Collaboration[] Returns an array of Collaboration objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('c')
    //            ->andWhere('c.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('c.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Collaboration
    //    {
    //        return $this->createQueryBuilder('c')
    //            ->andWhere('c.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}