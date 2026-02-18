<?php

namespace App\Controller;

use App\Entity\ForumComment;
use App\Entity\ForumTopic;
use App\Form\ForumCommentType;
use App\Form\ForumTopicType;
use App\Repository\ForumTopicRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/dashboard/forum', name: 'app_user_forum_')]
class UserForumController extends AbstractController
{
    #[Route('/', name: 'index', methods: ['GET'])]
    public function index(ForumTopicRepository $repo): Response
    {
        $this->denyAccessUnlessGranted('ROLE_USER');

        return $this->render('dashboard/user_forum/index.html.twig', [
            'topics' => $repo->findBy([], ['createdAt' => 'DESC']),
        ]);
    }

    #[Route('/new', name: 'new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $em): Response
    {
        $this->denyAccessUnlessGranted('ROLE_USER');

        $topic = new ForumTopic();
        $form = $this->createForm(ForumTopicType::class, $topic);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $topic->setAuthor($this->getUser());
            $em->persist($topic);
            $em->flush();

            return $this->redirectToRoute('app_user_forum_index');
        }

        return $this->render('dashboard/user_forum/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: 'show', methods: ['GET', 'POST'])]
    public function show(int $id, ForumTopicRepository $repo, Request $request, EntityManagerInterface $em): Response
    {
        $this->denyAccessUnlessGranted('ROLE_USER');

        $topic = $repo->find($id);
        if (!$topic) {
            throw new NotFoundHttpException('Sujet introuvable.');
        }

        $comment = new ForumComment();
        $form = $this->createForm(ForumCommentType::class, $comment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $comment->setAuthor($this->getUser());
            $comment->setTopic($topic);
            $em->persist($comment);
            $em->flush();

            return $this->redirectToRoute('app_user_forum_show', ['id' => $topic->getId()]);
        }

        return $this->render('dashboard/user_forum/show.html.twig', [
            'topic' => $topic,
            'form' => $form->createView(),
        ]);
    }
}
