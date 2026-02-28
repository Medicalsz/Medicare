<?php

namespace App\Repository\Partnership;

use App\Entity\Partnership\PartnerRating;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<PartnerRating>
 *
 * @method PartnerRating|null find($id, $lockMode = null, $lockVersion = null)
 * @method PartnerRating|null findOneBy(array $criteria, array $orderBy = null)
 * @method PartnerRating[]    findAll()
 * @method PartnerRating[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PartnerRatingRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PartnerRating::class);
    }
}