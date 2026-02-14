<?php

namespace App\Repository;

use App\Entity\RendezVous;
use App\Entity\Patient;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<RendezVous>
 */
class RendezVousRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RendezVous::class);
    }

    /**
     * Récupère tous les rendez-vous d'un patient, triés par date et heure décroissantes
     */
    public function findByPatientOrderByDate(Patient $patient): array
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.patient = :patient')
            ->setParameter('patient', $patient)
            ->orderBy('r.date', 'DESC')
            ->addOrderBy('r.heure', 'DESC')
            ->getQuery()
            ->getResult();
    }

    /**
     * Récupère les rendez-vous à venir d'un patient
     */
    public function findUpcomingByPatient(Patient $patient): array
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.patient = :patient')
            ->andWhere('r.date >= :today')
            ->setParameter('patient', $patient)
            ->setParameter('today', new \DateTime('today'))
            ->orderBy('r.date', 'ASC')
            ->addOrderBy('r.heure', 'ASC')
            ->getQuery()
            ->getResult();
    }

    /**
     * Récupère les rendez-vous passés d'un patient
     */
    public function findPastByPatient(Patient $patient): array
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.patient = :patient')
            ->andWhere('r.date < :today')
            ->setParameter('patient', $patient)
            ->setParameter('today', new \DateTime('today'))
            ->orderBy('r.date', 'DESC')
            ->addOrderBy('r.heure', 'DESC')
            ->getQuery()
            ->getResult();
    }
}
