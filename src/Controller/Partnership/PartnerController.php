<?php

namespace App\Controller\Partnership;

use App\Entity\Partnership\Partner;
use App\Entity\Partnership\PartnerRating;
use App\Form\Partnership\PartnerRatingType;
use App\Form\Partnership\PartnerType;
use App\Repository\Partnership\PartnerRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

use Knp\Component\Pager\PaginatorInterface;

#[Route('/partner')]
final class PartnerController extends AbstractController
{
    #[Route(name: 'app_partner_index', methods: ['GET'])]
    public function index(PartnerRepository $partnerRepository, PaginatorInterface $paginator, Request $request): Response
    {
        $query = $partnerRepository->createQueryBuilder('p')
            ->orderBy('p.id', 'DESC')
            ->getQuery();

        $pagination = $paginator->paginate(
            $query,
            $request->query->getInt('page', 1),
            9
        );

        return $this->render('partner/index.html.twig', [
            'partners' => $pagination,
        ]);
    }

    #[Route('/new', name: 'app_partner_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $partner = new Partner();
        $form = $this->createForm(PartnerType::class, $partner);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($partner);
            $entityManager->flush();

            $this->addFlash('success', 'Partner created successfully!');

            return $this->redirectToRoute('app_partner_index', [], Response::HTTP_SEE_OTHER);
        }

        if ($form->isSubmitted() && !$form->isValid()) {
            $this->addFlash('error', 'There were some errors with your submission.');
        }

        return $this->render('partner/new.html.twig', [
            'partner' => $partner,
            'form' => $form,
            'errors' => $form->getErrors(true), // Pass errors to the template
        ]);
    }

    #[Route('/{id}', name: 'app_partner_show', methods: ['GET'])]
    public function show(Partner $partner): Response
    {
        $ratingForm = $this->createForm(PartnerRatingType::class, null, [
            'action' => $this->generateUrl('app_partner_rate', ['id' => $partner->getId()]),
        ]);

        return $this->render('partner/show.html.twig', [
            'partner' => $partner,
            'rating_form' => $ratingForm->createView(),
        ]);
    }

    #[Route('/{id}/edit', name: 'app_partner_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Partner $partner, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(PartnerType::class, $partner);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_partner_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('partner/edit.html.twig', [
            'partner' => $partner,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_partner_delete', methods: ['POST'])]
    public function delete(Request $request, Partner $partner, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$partner->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($partner);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_partner_index', [], Response::HTTP_SEE_OTHER);
    }

    #[Route('/{id}/rate', name: 'app_partner_rate', methods: ['POST'])]
    #[IsGranted('ROLE_USER')]
    public function ratePartner(Request $request, Partner $partner, EntityManagerInterface $entityManager): Response
    {
        $rating = new PartnerRating();
        $form = $this->createForm(PartnerRatingType::class, $rating);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $rating->setPartner($partner);
            $rating->setAuthor($this->getUser());

            $entityManager->persist($rating);
            $entityManager->flush();

            $this->addFlash('success', 'Your rating has been submitted successfully!');
        } else {
            $this->addFlash('error', 'There was an error with your rating submission.');
        }

        return $this->redirectToRoute('app_partner_show', ['id' => $partner->getId()]);
    }
}