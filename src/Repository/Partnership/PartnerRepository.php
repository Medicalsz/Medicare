<?php

namespace App\Repository\Partnership;

use App\Entity\Partnership\Partner;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Partner>
 */
class PartnerRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Partner::class);
    }

    /**
     * @return Partner[]
     */
    public function findActiveWithFilters(?string $searchTerm, ?string $type): array
    {
        $qb = $this->createQueryBuilder('p')
            ->where('p.statut = :statut')
            ->setParameter('statut', \App\Enum\Partnership\StatutPartenaire::ACTIF)
            ->orderBy('p.id', 'DESC');

        if ($searchTerm) {
            $qb->andWhere('p.name LIKE :searchTerm OR p.adresse LIKE :searchTerm')
                ->setParameter('searchTerm', '%' . $searchTerm . '%');
        }

        if ($type) {
            $qb->andWhere('p.typePartenaire = :type')
                ->setParameter('type', $type);
        }

        return $qb->getQuery()->getResult();
    }

    //    /**
    //     * @return Partner[] Returns an array of Partner objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('p')
    //            ->andWhere('p.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('p.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Partner
    //    {
    //        return $this->createQueryBuilder('p')
    //            ->andWhere('p.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}