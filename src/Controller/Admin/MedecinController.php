<?php

namespace App\Controller\Admin;

use App\Entity\Medecin;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[Route('/admin/medecins', name: 'admin_medecins_')]
#[IsGranted('ROLE_ADMIN')]
class MedecinController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $medecins = $entityManager->getRepository(Medecin::class)->findAll();

        return $this->render('admin/medecins/index.html.twig', [
            'medecins' => $medecins,
        ]);
    }

    #[Route('/verify/{id}', name: 'verify')]
    public function verify(Medecin $medecin, EntityManagerInterface $entityManager): Response
    {
        $medecin->setIsVerified(true);
        $entityManager->flush();

        $this->addFlash('success', 'Le médecin ' . $medecin->getFullName() . ' a été vérifié avec succès.');

        return $this->redirectToRoute('admin_medecins_index');
    }

    #[Route('/unverify/{id}', name: 'unverify')]
    public function unverify(Medecin $medecin, EntityManagerInterface $entityManager): Response
    {
        $medecin->setIsVerified(false);
        $entityManager->flush();

        $this->addFlash('warning', 'Le médecin ' . $medecin->getFullName() . ' a été marqué comme non vérifié.');

        return $this->redirectToRoute('admin_medecins_index');
    }

    #[Route('/delete/{id}', name: 'delete')]
    public function delete(Medecin $medecin, EntityManagerInterface $entityManager): Response
    {
        $name = $medecin->getFullName();
        $entityManager->remove($medecin);
        $entityManager->flush();

        $this->addFlash('danger', 'Le médecin ' . $name . ' a été supprimé.');

        return $this->redirectToRoute('admin_medecins_index');
    }
}
