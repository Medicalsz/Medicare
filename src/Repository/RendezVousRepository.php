<?php

namespace App\Repository;

use App\Entity\RendezVous;
use App\Entity\Medecin;
use App\Entity\Patient;
use App\Enum\StatutRendezVous;
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
            ->orderBy('r.id', 'DESC')
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

    /**
     * @return RendezVous[]
     */
    public function findByMedecinOrderByDate(Medecin $medecin): array
    {
        return $this->createQueryBuilder('r')
            ->addSelect('p', 'u')
            ->leftJoin('r.patient', 'p')
            ->leftJoin('p.user', 'u')
            ->andWhere('r.medecin = :medecin')
            ->setParameter('medecin', $medecin)
            ->addSelect('(CASE WHEN r.date >= :today THEN 0 ELSE 1 END) AS HIDDEN date_order')
            ->setParameter('today', new \DateTimeImmutable('today'))
            ->orderBy('date_order', 'ASC')
            ->addOrderBy('r.date', 'ASC')
            ->addOrderBy('r.heure', 'ASC')
            ->getQuery()
            ->getResult();
    }

    /**
     * @param StatutRendezVous[] $statuts
     * @return RendezVous[]
     */
    public function findRecentByPatientAndStatuts(Patient $patient, array $statuts, int $limit = 20): array
    {
        if ($statuts === []) {
            return [];
        }

        return $this->createQueryBuilder('r')
            ->addSelect('m', 'u')
            ->leftJoin('r.medecin', 'm')
            ->leftJoin('m.user', 'u')
            ->andWhere('r.patient = :patient')
            ->andWhere('r.statut IN (:statuts)')
            ->setParameter('patient', $patient)
            ->setParameter('statuts', $statuts)
            ->orderBy('r.id', 'DESC')
            ->setMaxResults($limit)
            ->getQuery()
            ->getResult();
    }

    public function findPendingReportResponseByPatient(Patient $patient): ?RendezVous
    {
        return $this->createQueryBuilder('r')
            ->addSelect('m', 'u')
            ->leftJoin('r.medecin', 'm')
            ->leftJoin('m.user', 'u')
            ->andWhere('r.patient = :patient')
            ->andWhere('r.reportPendingPatientResponse = :pending')
            ->setParameter('patient', $patient)
            ->setParameter('pending', true)
            ->orderBy('r.id', 'DESC')
            ->setMaxResults(1)
            ->getQuery()
            ->getOneOrNullResult();
    }

    public function medecinHasRendezVousAt(
        Medecin $medecin,
        \DateTimeInterface $date,
        \DateTimeInterface $heure
    ): bool {
        $count = (int) $this->createQueryBuilder('r')
            ->select('COUNT(r.id)')
            ->andWhere('r.medecin = :medecin')
            ->andWhere('r.date = :date')
            ->andWhere('r.heure = :heure')
            ->andWhere('r.statut != :annule')
            ->setParameter('medecin', $medecin)
            ->setParameter('date', $date)
            ->setParameter('heure', $heure)
            ->setParameter('annule', StatutRendezVous::ANNULE)
            ->getQuery()
            ->getSingleScalarResult();

        return $count > 0;
    }

    public function medecinHasRendezVousAtExcept(
        Medecin $medecin,
        \DateTimeInterface $date,
        \DateTimeInterface $heure,
        int $excludedRendezVousId
    ): bool {
        $count = (int) $this->createQueryBuilder('r')
            ->select('COUNT(r.id)')
            ->andWhere('r.medecin = :medecin')
            ->andWhere('r.date = :date')
            ->andWhere('r.heure = :heure')
            ->andWhere('r.id != :excludedId')
            ->andWhere('r.statut != :annule')
            ->setParameter('medecin', $medecin)
            ->setParameter('date', $date)
            ->setParameter('heure', $heure)
            ->setParameter('excludedId', $excludedRendezVousId)
            ->setParameter('annule', StatutRendezVous::ANNULE)
            ->getQuery()
            ->getSingleScalarResult();

        return $count > 0;
    }

    /**
     * @return string[]
     */
    public function findBookedHeuresForMedecinAndDate(Medecin $medecin, \DateTimeInterface $date): array
    {
        $rows = $this->createQueryBuilder('r')
            ->select('r.heure')
            ->andWhere('r.medecin = :medecin')
            ->andWhere('r.date = :date')
            ->andWhere('r.statut != :annule')
            ->setParameter('medecin', $medecin)
            ->setParameter('date', $date)
            ->setParameter('annule', StatutRendezVous::ANNULE)
            ->orderBy('r.heure', 'ASC')
            ->getQuery()
            ->getResult();

        $heures = [];
        foreach ($rows as $row) {
            $value = $row['heure'] ?? null;
            if ($value instanceof \DateTimeInterface) {
                $heures[] = $value->format('H:i');
            } elseif (is_string($value)) {
                $heures[] = substr($value, 0, 5);
            }
        }

        return array_values(array_unique($heures));
    }
}
