<?php

namespace App\Controller\Partnership;

use App\Entity\Partnership\Partner;
use App\Entity\Partnership\PartnerRating;
use App\Form\Partnership\PartnerRatingType;
use App\Form\Partnership\PartnerType;
use App\Repository\Partnership\PartnerRepository;
use Dompdf\Dompdf;
use Dompdf\Options;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

use Knp\Component\Pager\PaginatorInterface;

#[Route('/partner')]
final class PartnerController extends AbstractController
{
    #[Route(name: 'app_partner_index', methods: ['GET'])]
    public function index(PartnerRepository $partnerRepository, PaginatorInterface $paginator, Request $request): Response
    {
        $search = trim((string) $request->query->get('q', ''));
        $status = trim((string) $request->query->get('status', ''));
        $sort = trim((string) $request->query->get('sort', 'newest'));
        $dir = strtolower(trim((string) $request->query->get('dir', 'desc'))) === 'asc' ? 'ASC' : 'DESC';

        $qb = $partnerRepository->createQueryBuilder('p');

        if ($search !== '') {
            $qb
                ->andWhere('LOWER(p.name) LIKE :q OR LOWER(p.email) LIKE :q OR p.telephone LIKE :q OR LOWER(p.adresse) LIKE :q')
                ->setParameter('q', '%' . mb_strtolower($search) . '%');
        }

        if ($status !== '') {
            // Enum is stored as string
            $qb->andWhere('p.statut = :status')->setParameter('status', $status);
        }

        $sortMap = [
            'newest' => 'p.id',
            'oldest' => 'p.id',
            'name' => 'p.name',
            'date' => 'p.datePartenariat',
        ];
        $sortField = $sortMap[$sort] ?? 'p.id';
        $sortDir = $sort === 'oldest' ? 'ASC' : $dir;

        $query = $qb->orderBy($sortField, $sortDir)->getQuery();

        $pagination = $paginator->paginate(
            $query,
            $request->query->getInt('page', 1),
            9
        );

        return $this->render('partner/index.html.twig', [
            'partners' => $pagination,
            'q' => $search,
            'status' => $status,
            'sort' => $sort,
            'dir' => strtolower($sortDir),
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

    #[Route('/{id}/pdf', name: 'app_partner_pdf', methods: ['GET'])]
    public function exportPdf(Partner $partner): Response
    {
        $pdfOptions = new Options();
        $pdfOptions->set('defaultFont', 'DejaVu Sans');

        $dompdf = new Dompdf($pdfOptions);

        $html = $this->renderView('partner/pdf_template.html.twig', [
            'partner' => $partner,
        ]);

        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        $pdfOutput = $dompdf->output();

        $response = new Response($pdfOutput);
        $disposition = $response->headers->makeDisposition(
            ResponseHeaderBag::DISPOSITION_ATTACHMENT,
            'partner-' . $partner->getId() . '.pdf'
        );
        $response->headers->set('Content-Disposition', $disposition);
        $response->headers->set('Content-Type', 'application/pdf');

        return $response;
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