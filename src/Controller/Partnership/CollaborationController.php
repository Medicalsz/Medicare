<?php

namespace App\Controller\Partnership;

use App\Entity\Partnership\Collaboration;
use App\Form\Partnership\CollaborationType;
use App\Repository\Partnership\CollaborationRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Dompdf\Dompdf;
use Dompdf\Options;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;

use Knp\Component\Pager\PaginatorInterface;

#[Route('/collaboration')]
class CollaborationController extends AbstractController
{
    #[Route('/', name: 'app_collaboration_index', methods: ['GET'])]
    public function index(CollaborationRepository $collaborationRepository, PaginatorInterface $paginator, Request $request): Response
    {
        $query = $collaborationRepository->createQueryBuilder('c')
            ->orderBy('c.id', 'DESC')
            ->getQuery();

        $pagination = $paginator->paginate(
            $query,
            $request->query->getInt('page', 1),
            9
        );

        // Check for collaborations expiring in the next 7 days
        $today = new \DateTimeImmutable();
        $nextWeek = $today->modify('+7 days');
        
        $expiringCollaborations = $collaborationRepository->createQueryBuilder('c')
            ->where('c.dateFin BETWEEN :today AND :nextWeek')
            ->andWhere('c.statut != :status')
            ->setParameter('today', $today)
            ->setParameter('nextWeek', $nextWeek)
            ->setParameter('status', 'TERMINEE') // Assuming 'TERMINEE' is the enum value for completed
            ->getQuery()
            ->getResult();

        return $this->render('collaboration/index.html.twig', [
            'collaborations' => $pagination,
            'expiringCollaborations' => $expiringCollaborations,
        ]);
    }

    #[Route('/new', name: 'app_collaboration_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $collaboration = new Collaboration();
        $form = $this->createForm(CollaborationType::class, $collaboration);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($collaboration);
            $entityManager->flush();

            $this->addFlash('success', 'Collaboration created successfully!');

            return $this->redirectToRoute('app_collaboration_index', [], Response::HTTP_SEE_OTHER);
        }

        if ($form->isSubmitted() && !$form->isValid()) {
            $this->addFlash('error', 'There were some errors with your submission.');
        }

        return $this->render('collaboration/new.html.twig', [
            'collaboration' => $collaboration,
            'form' => $form,
            'errors' => $form->getErrors(true), // Pass errors to the template
        ]);
    }

    #[Route('/{id}', name: 'app_collaboration_show', methods: ['GET'])]
    public function show(Collaboration $collaboration): Response
    {
        return $this->render('collaboration/show.html.twig', [
            'collaboration' => $collaboration,
        ]);
    }

    #[Route('/{id}/pdf', name: 'app_collaboration_pdf', methods: ['GET'])]
    public function exportPdf(Collaboration $collaboration): Response
    {
        // Configure Dompdf according to your needs
        $pdfOptions = new Options();
        $pdfOptions->set('defaultFont', 'Arial');
        
        // Instantiate Dompdf with our options
        $dompdf = new Dompdf($pdfOptions);
        
        // Retrieve the HTML generated in our twig file
        $html = $this->renderView('collaboration/pdf_template.html.twig', [
            'collaboration' => $collaboration,
        ]);
        
        // Load HTML to Dompdf
        $dompdf->loadHtml($html);
        
        // (Optional) Setup the paper size and orientation 'portrait' or 'portrait'
        $dompdf->setPaper('A4', 'portrait');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser (inline view)
        $pdfOutput = $dompdf->output();

        // In this case, we want to force a download
        $response = new Response($pdfOutput);
        $disposition = $response->headers->makeDisposition(
            ResponseHeaderBag::DISPOSITION_ATTACHMENT,
            'collaboration-' . $collaboration->getId() . '.pdf'
        );
        $response->headers->set('Content-Disposition', $disposition);

        return $response;
    }

    #[Route('/{id}/csv', name: 'app_collaboration_csv', methods: ['GET'])]
    public function exportCsv(Collaboration $collaboration): Response
    {
        $csvData = [];
        $csvData[] = ['ID', 'Titre', 'Description', 'Date Debut', 'Date Fin', 'Statut'];
        $csvData[] = [
            $collaboration->getId(),
            $collaboration->getTitre(),
            $collaboration->getDescription(),
            $collaboration->getDateDebut() ? $collaboration->getDateDebut()->format('Y-m-d') : '',
            $collaboration->getDateFin() ? $collaboration->getDateFin()->format('Y-m-d') : '',
            $collaboration->getStatut()->value,
        ];

        $output = fopen('php://temp', 'w');
        foreach ($csvData as $row) {
            fputcsv($output, $row);
        }
        rewind($output);
        $csvOutput = stream_get_contents($output);
        fclose($output);

        $response = new Response($csvOutput);
        $disposition = $response->headers->makeDisposition(
            ResponseHeaderBag::DISPOSITION_ATTACHMENT,
            'collaboration-' . $collaboration->getId() . '.csv'
        );
        $response->headers->set('Content-Disposition', $disposition);
        $response->headers->set('Content-Type', 'text/csv');

        return $response;
    }

    #[Route('/{id}/edit', name: 'app_collaboration_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Collaboration $collaboration, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(CollaborationType::class, $collaboration);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_collaboration_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('collaboration/edit.html.twig', [
            'collaboration' => $collaboration,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_collaboration_delete', methods: ['POST'])]
    public function delete(Request $request, Collaboration $collaboration, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$collaboration->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($collaboration);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_collaboration_index', [], Response::HTTP_SEE_OTHER);
    }
}