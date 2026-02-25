<?php

namespace App\Repository;

use App\Entity\Consultation;
use App\Entity\Medecin;
use App\Entity\Patient;
use App\Entity\RendezVous;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Consultation>
 */
class ConsultationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Consultation::class);
    }

    public function findOneByRendezVous(RendezVous $rendezVous): ?Consultation
    {
        return $this->createQueryBuilder('c')
            ->addSelect('m', 'mu', 'p', 'pu', 'r')
            ->leftJoin('c.medecin', 'm')
            ->leftJoin('m.user', 'mu')
            ->leftJoin('c.patient', 'p')
            ->leftJoin('p.user', 'pu')
            ->leftJoin('c.rendezVous', 'r')
            ->andWhere('c.rendezVous = :rendezVous')
            ->setParameter('rendezVous', $rendezVous)
            ->setMaxResults(1)
            ->getQuery()
            ->getOneOrNullResult();
    }

    /**
     * @return Consultation[]
     */
    public function findByPatientLatest(Patient $patient): array
    {
        return $this->createQueryBuilder('c')
            ->addSelect('m', 'mu', 'r')
            ->leftJoin('c.medecin', 'm')
            ->leftJoin('m.user', 'mu')
            ->leftJoin('c.rendezVous', 'r')
            ->andWhere('c.patient = :patient')
            ->setParameter('patient', $patient)
            ->orderBy('c.id', 'DESC')
            ->getQuery()
            ->getResult();
    }

    /**
     * @return Consultation[]
     */
    public function findByMedecinLatest(Medecin $medecin): array
    {
        return $this->createQueryBuilder('c')
            ->addSelect('p', 'pu', 'r')
            ->leftJoin('c.patient', 'p')
            ->leftJoin('p.user', 'pu')
            ->leftJoin('c.rendezVous', 'r')
            ->andWhere('c.medecin = :medecin')
            ->setParameter('medecin', $medecin)
            ->orderBy('c.id', 'DESC')
            ->getQuery()
            ->getResult();
    }

    public function findLatestByPatient(Patient $patient): ?Consultation
    {
        return $this->createQueryBuilder('c')
            ->addSelect('m', 'mu', 'r')
            ->leftJoin('c.medecin', 'm')
            ->leftJoin('m.user', 'mu')
            ->leftJoin('c.rendezVous', 'r')
            ->andWhere('c.patient = :patient')
            ->setParameter('patient', $patient)
            ->orderBy('c.id', 'DESC')
            ->setMaxResults(1)
            ->getQuery()
            ->getOneOrNullResult();
    }
}
