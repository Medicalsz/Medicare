<?php

namespace App\Controller;

use App\Entity\ForumTopic;
use App\Entity\ForumComment;
use App\Form\ForumTopicType;
use App\Form\ForumCommentType;
use App\Repository\ForumTopicRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/dashboard/forum')]
class ForumController extends AbstractController
{
    #[Route('/', name: 'dashboard_forum', methods: ['GET'])]
    public function index(ForumTopicRepository $repo): Response
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        return $this->render('dashboard/forum/index.html.twig', [
            'topics' => $repo->findBy([], ['createdAt' => 'DESC'])
        ]);
    }

    #[Route('/new', name: 'forum_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $em): Response
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        $topic = new ForumTopic();
        $form = $this->createForm(ForumTopicType::class, $topic);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $topic->setAuthor($this->getUser());
            $em->persist($topic);
            $em->flush();

            return $this->redirectToRoute('dashboard_forum');
        }

        return $this->render('dashboard/forum/new.html.twig', [
            'form' => $form->createView()
        ]);
    }

    #[Route('/{id}/edit', name: 'forum_edit', methods: ['GET', 'POST'])]
    public function edit(ForumTopic $topic, Request $request, EntityManagerInterface $em): Response
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        $form = $this->createForm(ForumTopicType::class, $topic);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $topic->setUpdatedAt(new \DateTimeImmutable());
            $em->flush();

            return $this->redirectToRoute('dashboard_forum');
        }

        return $this->render('dashboard/forum/edit.html.twig', [
            'form' => $form->createView(),
            'topic' => $topic,
        ]);
    }

    #[Route('/{id}/delete', name: 'forum_delete', methods: ['POST'])]
    public function delete(ForumTopic $topic, Request $request, EntityManagerInterface $em): Response
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        if ($this->isCsrfTokenValid('delete_topic_' . $topic->getId(), $request->request->get('_token'))) {
            $em->remove($topic);
            $em->flush();
        }

        return $this->redirectToRoute('dashboard_forum');
    }

    #[Route('/{id}', name: 'forum_show', methods: ['GET', 'POST'])]
    public function show(ForumTopic $topic, Request $request, EntityManagerInterface $em): Response
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        $comment = new ForumComment();
        $form = $this->createForm(ForumCommentType::class, $comment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $comment->setAuthor($this->getUser());
            $comment->setTopic($topic);
            $em->persist($comment);
            $em->flush();

            return $this->redirectToRoute('forum_show', ['id' => $topic->getId()]);
        }

        return $this->render('dashboard/forum/show.html.twig', [
            'topic' => $topic,
            'form' => $form->createView()
        ]);
    }
}
