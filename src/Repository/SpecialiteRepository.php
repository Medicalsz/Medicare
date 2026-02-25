<?php

namespace App\Repository;

use App\Entity\Specialite;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Specialite>
 */
class SpecialiteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Specialite::class);
    }

    /**
     * @return array<int, Specialite>
     */
    public function findActiveOrderedByName(): array
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.active = :active')
            ->setParameter('active', true)
            ->orderBy('s.nom', 'ASC')
            ->getQuery()
            ->getResult();
    }

    public function findOneActiveById(int $id): ?Specialite
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.id = :id')
            ->andWhere('s.active = :active')
            ->setParameter('id', $id)
            ->setParameter('active', true)
            ->setMaxResults(1)
            ->getQuery()
            ->getOneOrNullResult();
    }

    public function findOneByNomInsensitive(string $nom): ?Specialite
    {
        return $this->createQueryBuilder('s')
            ->andWhere('LOWER(s.nom) = :nom')
            ->setParameter('nom', mb_strtolower(trim($nom), 'UTF-8'))
            ->setMaxResults(1)
            ->getQuery()
            ->getOneOrNullResult();
    }
}
