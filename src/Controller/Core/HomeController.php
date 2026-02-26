<?php

namespace App\Controller\Core;

use App\Repository\Partnership\PartnerRepository;
use App\Repository\Partnership\CollaborationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(PartnerRepository $partnerRepository, CollaborationRepository $collaborationRepository): Response
    {
        return $this->render('home/index.html.twig', [
            'partners' => $partnerRepository->findAll(),
            'collaborations' => $collaborationRepository->findAll(),
        ]);
    }
}
