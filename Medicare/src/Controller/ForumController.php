<?php

namespace App\Controller;

use App\Entity\ForumTopic;
use App\Entity\ForumComment;
use App\Form\ForumTopicType;
use App\Form\ForumCommentType;
use App\Repository\ForumCommentRepository;
use App\Repository\ForumTopicRepository;
use App\Service\ForumSummaryClient;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/forum', name: 'app_admin_forum_')]
class ForumController extends AbstractController
{
    #[Route('/', name: 'index', methods: ['GET'])]
    public function index(Request $request, ForumTopicRepository $repo): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');

        $kind = (string) $request->query->get('kind', 'article');
        if (!in_array($kind, ['article', 'video'], true)) {
            $kind = 'article';
        }
        $topics = $repo->findBy([], ['createdAt' => 'DESC']);
        $topics = array_values(array_filter(
            $topics,
            static fn (ForumTopic $topic): bool => $kind === 'video' ? $topic->isVideoType() : $topic->isTextType()
        ));

        return $this->render('dashboard/forum/index.html.twig', [
            'topics' => $topics,
            'current_kind' => $kind,
        ]);
    }

    #[Route('/new', name: 'new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $em, ForumSummaryClient $summaryClient): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');

        $topic = new ForumTopic();
        $form = $this->createForm(ForumTopicType::class, $topic);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $topic->setAuthor($this->getUser());
            if ($topic->isTextType()) {
                $topic->setVideoUrl(null);
            }
            $topic->setSummary($summaryClient->summarize((string) $topic->getContent()));
            $em->persist($topic);
            $em->flush();

            return $this->redirectToRoute('app_admin_forum_index');
        }

        return $this->render('dashboard/forum/new.html.twig', [
            'form' => $form->createView()
        ]);
    }

    #[Route('/{id}/edit', name: 'edit', methods: ['GET', 'POST'])]
    public function edit(int $id, ForumTopicRepository $repo, Request $request, EntityManagerInterface $em, ForumSummaryClient $summaryClient): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');

        $topic = $repo->find($id);
        if (!$topic) {
            throw new NotFoundHttpException('Sujet introuvable.');
        }

        $form = $this->createForm(ForumTopicType::class, $topic);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            if ($topic->isTextType()) {
                $topic->setVideoUrl(null);
            }
            $topic->setUpdatedAt(new \DateTimeImmutable());
            $topic->setSummary($summaryClient->summarize((string) $topic->getContent()));
            $em->flush();

            return $this->redirectToRoute('app_admin_forum_index');
        }

        return $this->render('dashboard/forum/edit.html.twig', [
            'form' => $form->createView(),
            'topic' => $topic,
        ]);
    }

    #[Route('/{id}/delete', name: 'delete', methods: ['POST'])]
    public function delete(int $id, ForumTopicRepository $repo, Request $request, EntityManagerInterface $em): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');

        $topic = $repo->find($id);
        if (!$topic) {
            throw new NotFoundHttpException('Sujet introuvable.');
        }

        if ($this->isCsrfTokenValid('delete_topic_' . $topic->getId(), $request->request->get('_token'))) {
            $em->remove($topic);
            $em->flush();
        }

        return $this->redirectToRoute('app_admin_forum_index');
    }

    #[Route('/{id}', name: 'show', methods: ['GET', 'POST'])]
    public function show(int $id, ForumTopicRepository $repo, Request $request, EntityManagerInterface $em): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');

        $topic = $repo->find($id);
        if (!$topic) {
            throw new NotFoundHttpException('Sujet introuvable.');
        }

        $comment = new ForumComment();
        $form = $this->createForm(ForumCommentType::class, $comment);
        $form->handleRequest($request);
        $replyToId = (int) $request->query->get('replyTo', 0);
        $replyParent = $replyToId > 0 ? $this->findTopicCommentById($topic, $replyToId) : null;
        $postedParentId = (int) $request->request->get('parent_id', 0);

        if ($form->isSubmitted() && $form->isValid()) {
            $comment->setAuthor($this->getUser());
            $comment->setTopic($topic);
            if ($postedParentId > 0) {
                $parent = $this->findTopicCommentById($topic, $postedParentId);
                if ($parent !== null) {
                    $comment->setParent($parent);
                }
            }
            $em->persist($comment);
            $em->flush();

            return $this->redirectToRoute('app_admin_forum_show', ['id' => $topic->getId()]);
        }

        $allComments = [];
        foreach ($topic->getComments() as $commentItem) {
            $allComments[] = $commentItem;
        }
        $commentTree = $this->buildCommentTree($allComments);
        $visibleCount = 0;
        foreach ($allComments as $commentItem) {
            if (!$commentItem->isHidden()) {
                $visibleCount++;
            }
        }

        return $this->render('dashboard/forum/show.html.twig', [
            'topic' => $topic,
            'form' => $form->createView(),
            'comment_tree' => $commentTree,
            'visible_comments_count' => $visibleCount,
            'reply_parent' => $replyParent,
        ]);
    }

    #[Route('/{id}/hide', name: 'hide', methods: ['POST'])]
    public function hide(int $id, ForumTopicRepository $repo, Request $request, EntityManagerInterface $em): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');

        $topic = $repo->find($id);
        if (!$topic) {
            throw new NotFoundHttpException('Sujet introuvable.');
        }

        if ($this->isCsrfTokenValid('hide_topic_' . $topic->getId(), $request->request->get('_token'))) {
            $topic->setIsHidden(true);
            $em->flush();
        }

        $referer = (string) $request->headers->get('referer');
        if ($referer !== '' && str_contains($referer, '/admin/forum')) {
            return $this->redirect($referer);
        }

        return $this->redirectToRoute('app_admin_forum_index');
    }

    #[Route('/{id}/report-topic', name: 'report_topic', methods: ['POST'])]
    public function reportTopic(int $id, ForumTopicRepository $repo, Request $request, EntityManagerInterface $em): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');

        $topic = $repo->find($id);
        if (!$topic) {
            throw new NotFoundHttpException('Sujet introuvable.');
        }

        if ($this->isCsrfTokenValid('report_topic_' . $topic->getId(), $request->request->get('_token'))) {
            $reason = trim((string) $request->request->get('reason'));
            $topic->setIsReported(true);
            $topic->setReportedReason($reason !== '' ? $reason : 'Signalement admin');
            $topic->setReportedAt(new \DateTimeImmutable());
            $topic->setReportedBy($this->getUser());
            $em->flush();
        }

        $referer = (string) $request->headers->get('referer');
        if ($referer !== '' && str_contains($referer, '/admin/forum')) {
            return $this->redirect($referer);
        }

        return $this->redirectToRoute('app_admin_forum_show', ['id' => $topic->getId()]);
    }

    #[Route('/{id}/regenerate-summary', name: 'regenerate_summary', methods: ['POST'])]
    public function regenerateSummary(int $id, ForumTopicRepository $repo, Request $request, EntityManagerInterface $em, ForumSummaryClient $summaryClient): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');

        $topic = $repo->find($id);
        if (!$topic) {
            throw new NotFoundHttpException('Sujet introuvable.');
        }

        if ($this->isCsrfTokenValid('regenerate_summary_' . $topic->getId(), $request->request->get('_token'))) {
            $topic->setSummary($summaryClient->summarize((string) $topic->getContent()));
            $topic->setUpdatedAt(new \DateTimeImmutable());
            $em->flush();
        }

        $referer = (string) $request->headers->get('referer');
        if ($referer !== '' && str_contains($referer, '/admin/forum')) {
            return $this->redirect($referer);
        }

        return $this->redirectToRoute('app_admin_forum_show', ['id' => $topic->getId()]);
    }

    #[Route('/{id}/resolve-topic-report', name: 'resolve_topic_report', methods: ['POST'])]
    public function resolveTopicReport(int $id, ForumTopicRepository $repo, Request $request, EntityManagerInterface $em): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');

        $topic = $repo->find($id);
        if (!$topic) {
            throw new NotFoundHttpException('Sujet introuvable.');
        }

        if ($this->isCsrfTokenValid('resolve_topic_report_' . $topic->getId(), $request->request->get('_token'))) {
            $topic->setIsReported(false);
            $topic->setReportedReason(null);
            $topic->setReportedAt(null);
            $topic->setReportedBy(null);
            $em->flush();
        }

        return $this->redirectToRoute('app_admin_dashboard');
    }

    #[Route('/comment/{id}/resolve-comment-report', name: 'resolve_comment_report', methods: ['POST'])]
    public function resolveCommentReport(int $id, ForumCommentRepository $repo, Request $request, EntityManagerInterface $em): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');

        $comment = $repo->find($id);
        if (!$comment) {
            throw new NotFoundHttpException('Commentaire introuvable.');
        }

        if ($this->isCsrfTokenValid('resolve_comment_report_' . $comment->getId(), $request->request->get('_token'))) {
            $comment->setIsReported(false);
            $comment->setReportedReason(null);
            $comment->setReportedAt(null);
            $comment->setReportedBy(null);
            $em->flush();
        }

        return $this->redirectToRoute('app_admin_dashboard');
    }

    #[Route('/comment/{id}/delete-comment', name: 'delete_comment', methods: ['POST'])]
    public function deleteComment(int $id, ForumCommentRepository $repo, Request $request, EntityManagerInterface $em): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');

        $comment = $repo->find($id);
        if (!$comment) {
            throw new NotFoundHttpException('Commentaire introuvable.');
        }

        if ($this->isCsrfTokenValid('delete_comment_' . $comment->getId(), $request->request->get('_token'))) {
            $em->remove($comment);
            $em->flush();
        }

        $referer = (string) $request->headers->get('referer');
        if ($referer !== '' && str_contains($referer, '/admin/forum')) {
            return $this->redirect($referer);
        }

        return $this->redirectToRoute('app_admin_dashboard');
    }

    #[Route('/comment/{id}/report-comment', name: 'report_comment', methods: ['POST'])]
    public function reportComment(int $id, ForumCommentRepository $repo, Request $request, EntityManagerInterface $em): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');

        $comment = $repo->find($id);
        if (!$comment) {
            throw new NotFoundHttpException('Commentaire introuvable.');
        }

        if ($this->isCsrfTokenValid('report_comment_' . $comment->getId(), $request->request->get('_token'))) {
            $reason = trim((string) $request->request->get('reason'));
            $comment->setIsReported(true);
            $comment->setReportedReason($reason !== '' ? $reason : 'Signalement admin');
            $comment->setReportedAt(new \DateTimeImmutable());
            $comment->setReportedBy($this->getUser());
            $em->flush();
        }

        $referer = (string) $request->headers->get('referer');
        if ($referer !== '' && str_contains($referer, '/admin/forum')) {
            return $this->redirect($referer);
        }

        return $this->redirectToRoute('app_admin_forum_show', ['id' => $comment->getTopic()?->getId()]);
    }

    #[Route('/comment/{id}/hide-comment', name: 'hide_comment', methods: ['POST'])]
    public function hideComment(int $id, ForumCommentRepository $repo, Request $request, EntityManagerInterface $em): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');

        $comment = $repo->find($id);
        if (!$comment) {
            throw new NotFoundHttpException('Commentaire introuvable.');
        }

        if ($this->isCsrfTokenValid('hide_comment_' . $comment->getId(), $request->request->get('_token'))) {
            $comment->setIsHidden(true);
            $em->flush();
        }

        $referer = (string) $request->headers->get('referer');
        if ($referer !== '' && str_contains($referer, '/admin/forum')) {
            return $this->redirect($referer);
        }

        return $this->redirectToRoute('app_admin_dashboard');
    }

    /**
     * @param ForumComment[] $comments
     * @return array<int, ForumComment[]>
     */
    private function buildCommentTree(array $comments): array
    {
        $commentMap = [];
        foreach ($comments as $comment) {
            if ($comment->getId() !== null) {
                $commentMap[(int) $comment->getId()] = $comment;
            }
        }

        $tree = [];
        foreach ($comments as $comment) {
            $parent = $comment->getParent();
            if ($parent === null || $parent->getId() === null || !isset($commentMap[(int) $parent->getId()])) {
                $tree[0][] = $comment;
                continue;
            }

            $tree[(int) $parent->getId()][] = $comment;
        }

        return $tree;
    }

    private function findTopicCommentById(ForumTopic $topic, int $commentId): ?ForumComment
    {
        foreach ($topic->getComments() as $comment) {
            if ($comment->getId() === $commentId) {
                return $comment;
            }
        }

        return null;
    }
}
