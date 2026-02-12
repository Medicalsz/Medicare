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
    #[Route('/', name: 'dashboard_forum')]
    public function index(ForumTopicRepository $repo): Response
    {
        return $this->render('dashboard/forum/index.html.twig', [
            'topics' => $repo->findBy([], ['createdAt'=>'DESC'])
        ]);
    }

    #[Route('/new', name: 'forum_new')]
    public function new(Request $request, EntityManagerInterface $em): Response
    {
        $topic = new ForumTopic();
        $form = $this->createForm(ForumTopicType::class,$topic);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $topic->setAuthor($this->getUser());
            $em->persist($topic);
            $em->flush();

            return $this->redirectToRoute('dashboard_forum');
        }

        return $this->render('dashboard/forum/new.html.twig',[
            'form'=>$form->createView()
        ]);
    }

    #[Route('/{id}/edit', name: 'forum_edit')]
    public function edit(ForumTopic $topic, Request $request, EntityManagerInterface $em): Response
    {
        $form = $this->createForm(ForumTopicType::class,$topic);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $topic->setUpdatedAt(new \DateTimeImmutable());
            $em->flush();

            return $this->redirectToRoute('dashboard_forum');
        }

        return $this->render('dashboard/forum/edit.html.twig',[
            'form'=>$form->createView()
        ]);
    }

    #[Route('/{id}/delete', name: 'forum_delete')]
    public function delete(ForumTopic $topic, EntityManagerInterface $em): Response
    {
        $em->remove($topic);
        $em->flush();
        return $this->redirectToRoute('dashboard_forum');
    }

    #[Route('/{id}', name: 'forum_show')]
    public function show(ForumTopic $topic, Request $request, EntityManagerInterface $em): Response
    {
        $comment = new ForumComment();
        $form = $this->createForm(ForumCommentType::class,$comment);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $comment->setAuthor($this->getUser());
            $comment->setTopic($topic);
            $em->persist($comment);
            $em->flush();
        }

        return $this->render('dashboard/forum/show.html.twig',[
            'topic'=>$topic,
            'form'=>$form->createView()
        ]);
    }
}
