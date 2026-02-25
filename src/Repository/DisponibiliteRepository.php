<?php

namespace App\Repository;

use App\Entity\Disponibilite;
use App\Entity\Medecin;
use App\Enum\JourSemaine;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Disponibilite>
 */
class DisponibiliteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Disponibilite::class);
    }

    /**
     * @return array<string, Disponibilite>
     */
    public function findPlanningMapByMedecin(Medecin $medecin): array
    {
        $rows = $this->createQueryBuilder('d')
            ->andWhere('d.medecin = :medecin')
            ->setParameter('medecin', $medecin)
            ->getQuery()
            ->getResult();

        $map = [];
        foreach ($rows as $row) {
            $jour = $row->getJourSemaine();
            if ($jour === null) {
                continue;
            }

            $map[$jour->value] = $row;
        }

        return $map;
    }

    public function findOneByMedecinAndJour(Medecin $medecin, JourSemaine $jour): ?Disponibilite
    {
        return $this->findOneBy([
            'medecin' => $medecin,
            'jourSemaine' => $jour,
        ]);
    }
}

