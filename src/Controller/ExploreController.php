<?php

namespace App\Controller;

use App\Entity\Medecin;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ExploreController extends AbstractController
{
    #[Route('/explore', name: 'app_explore')]
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {
        $search = $request->query->get('search', '');
        $specialite = $request->query->get('specialite', '');
        $prixMin = $request->query->get('prix_min', '');
        $prixMax = $request->query->get('prix_max', '');
        $ville = $request->query->get('ville', '');
        $delegation = $request->query->get('delegation', '');

        $queryBuilder = $entityManager->getRepository(Medecin::class)->createQueryBuilder('m');

        // Only show verified doctors
        $queryBuilder->andWhere('m.isVerified = :isVerified')
            ->setParameter('isVerified', true);

        // Search by doctor name
        if ($search) {
            $queryBuilder->andWhere('m.nom LIKE :search OR m.prenom LIKE :search')
                ->setParameter('search', '%' . $search . '%');
        }

        // Filter by specialty
        if ($specialite) {
            $queryBuilder->andWhere('m.specialite = :specialite')
                ->setParameter('specialite', $specialite);
        }

        // Filter by price range
        if ($prixMin) {
            $queryBuilder->andWhere('m.prixConsultation >= :prixMin')
                ->setParameter('prixMin', (float) $prixMin);
        }

        if ($prixMax) {
            $queryBuilder->andWhere('m.prixConsultation <= :prixMax')
                ->setParameter('prixMax', (float) $prixMax);
        }

        // Filter by ville
        if ($ville) {
            $queryBuilder->andWhere('m.ville = :ville')
                ->setParameter('ville', $ville);
        }

        // Filter by delegation
        if ($delegation) {
            $queryBuilder->andWhere('m.delegation = :delegation')
                ->setParameter('delegation', $delegation);
        }

        $medecins = $queryBuilder->getQuery()->getResult();

        // Get unique specialties for filter
        $specialties = $entityManager->getRepository(Medecin::class)
            ->createQueryBuilder('m')
            ->select('DISTINCT m.specialite')
            ->where('m.specialite IS NOT NULL')
            ->andWhere('m.isVerified = :isVerified')
            ->setParameter('isVerified', true)
            ->getQuery()
            ->getResult();

        // Get unique villes for filter
        $villes = $entityManager->getRepository(Medecin::class)
            ->createQueryBuilder('m')
            ->select('DISTINCT m.ville')
            ->where('m.ville IS NOT NULL')
            ->andWhere('m.isVerified = :isVerified')
            ->setParameter('isVerified', true)
            ->getQuery()
            ->getResult();

        // Get unique delegations for filter
        $delegations = $entityManager->getRepository(Medecin::class)
            ->createQueryBuilder('m')
            ->select('DISTINCT m.delegation')
            ->where('m.delegation IS NOT NULL')
            ->andWhere('m.isVerified = :isVerified')
            ->setParameter('isVerified', true)
            ->getQuery()
            ->getResult();

        return $this->render('frontend/explore.html.twig', [
            'medecins' => $medecins,
            'specialties' => array_column($specialties, 'specialite'),
            'villes' => array_column($villes, 'ville'),
            'delegations' => array_column($delegations, 'delegation'),
            'filters' => [
                'search' => $search,
                'specialite' => $specialite,
                'prix_min' => $prixMin,
                'prix_max' => $prixMax,
                'ville' => $ville,
                'delegation' => $delegation,
            ],
        ]);
    }
}
