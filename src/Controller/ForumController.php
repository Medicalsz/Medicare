<?php

namespace App\Controller;

use App\Entity\ForumComment;
use App\Entity\ForumTopic;
use App\Entity\User;
use App\Form\ForumCommentType;
use App\Form\ForumTopicType;
use App\Repository\ForumCommentReactionRepository;
use App\Repository\ForumCommentRepository;
use App\Repository\ForumTopicReactionRepository;
use App\Repository\ForumTopicRepository;
use App\Service\ForumSummaryClient;
use App\Service\NotificationService;
use App\Service\ProfanityFilterService;
use App\Service\RecommendationService;
use App\Service\TagGeneratorService;
use DateTimeImmutable;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormError;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[Route('/dashboard/forum', name: 'app_admin_forum_')]
#[IsGranted('ROLE_ADMIN')]
class ForumController extends AbstractController
{
    #[Route('/', name: 'index', methods: ['GET'])]
    public function index(Request $request, ForumTopicRepository $repo, ForumTopicReactionRepository $reactionRepository): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');

        $kind = (string) $request->query->get('kind', 'article');
        if (!in_array($kind, ['article', 'video'], true)) {
            $kind = 'article';
        }
        $rawFrom = trim((string) $request->query->get('from', ''));
        $rawTo = trim((string) $request->query->get('to', ''));
        $sort = strtolower((string) $request->query->get('sort', 'desc'));
        $tag = trim((string) $request->query->get('tag', ''));
        if (!in_array($sort, ['asc', 'desc'], true)) {
            $sort = 'desc';
        }

        $from = $this->parseDateOnly($rawFrom);
        $to = $this->parseDateOnly($rawTo);
        if ($to !== null) {
            $to = $to->setTime(23, 59, 59);
        }

        if ($from !== null && $to !== null && $from > $to) {
            $tmp = $from;
            $from = $to->setTime(0, 0, 0);
            $to = $tmp->setTime(23, 59, 59);
        }

        $topics = $repo->findFiltered($from, $to, $sort);
        $topics = array_values(array_filter(
            $topics,
            static fn (ForumTopic $topic): bool => $kind === 'video' ? $topic->isVideoType() : $topic->isTextType()
        ));
        if ($tag !== '') {
            $normalizedTag = mb_strtolower($tag);
            $topics = array_values(array_filter(
                $topics,
                static function (ForumTopic $topic) use ($normalizedTag): bool {
                    foreach ($topic->getTags() as $topicTag) {
                        if (mb_strtolower($topicTag) === $normalizedTag) {
                            return true;
                        }
                    }
                    return false;
                }
            ));
        }
        $topicIds = array_map(static fn (ForumTopic $topic): int => (int) $topic->getId(), $topics);
        $reactionCounts = $reactionRepository->getCountsByTopicIds($topicIds);
        $userReactionMap = [];
        $user = $this->getUser();
        if ($user instanceof User) {
            $userReactionMap = $reactionRepository->getUserReactionMap($user, $topicIds);
        }

        return $this->render('dashboard/forum/index.html.twig', [
            'topics' => $topics,
            'current_kind' => $kind,
            'filters' => [
                'from' => $from ? $from->format('Y-m-d') : ($rawFrom !== '' ? $rawFrom : ''),
                'to' => $to ? $to->format('Y-m-d') : ($rawTo !== '' ? $rawTo : ''),
                'sort' => $sort,
                'tag' => $tag,
            ],
            'filter_summary' => $this->buildFilterSummary($from, $to, $sort),
            'reaction_counts' => $reactionCounts,
            'user_reaction_map' => $userReactionMap,
        ]);
    }

    #[Route('/new', name: 'new', methods: ['GET', 'POST'])]
    public function new(
        Request $request,
        EntityManagerInterface $em,
        ForumSummaryClient $summaryClient,
        NotificationService $notificationService,
        ProfanityFilterService $profanityFilter,
        TagGeneratorService $tagGenerator
    ): Response {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');

        $topic = new ForumTopic();
        $form = $this->createForm(ForumTopicType::class, $topic);
        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            $message = 'Votre message contient des mots inappropriés. Merci de respecter les règles du forum.';
            $titleText = (string) $topic->getTitle();
            $contentText = (string) $topic->getContent();
            if ($titleText !== '' && $profanityFilter->containsProfanity($titleText)) {
                $form->get('title')->addError(new FormError($message));
            }
            if ($contentText !== '' && $profanityFilter->containsProfanity($contentText)) {
                $form->get('content')->addError(new FormError($message));
            }
        }

        if ($form->isSubmitted() && $form->isValid()) {
            $user = $this->getUser();
            if (!$user instanceof User) {
                throw $this->createAccessDeniedException();
            }
            $topic->setAuthor($user);
            if ($topic->isTextType()) {
                $topic->setVideoUrl(null);
            }
            $topic->setSummary($summaryClient->summarize((string) $topic->getContent()));
            $topic->setTags($tagGenerator->generateTags((string) $topic->getTitle(), (string) $topic->getContent()));
            $em->persist($topic);
            $em->flush();
            $notificationService->notifyNewTopic($topic);

            return $this->redirectToRoute('app_admin_forum_index');
        }

        return $this->render('dashboard/forum/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}/edit', name: 'edit', methods: ['GET', 'POST'])]
    public function edit(
        int $id,
        ForumTopicRepository $repo,
        Request $request,
        EntityManagerInterface $em,
        ForumSummaryClient $summaryClient,
        ProfanityFilterService $profanityFilter,
        TagGeneratorService $tagGenerator
    ): Response {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');

        $topic = $repo->find($id);
        if (!$topic instanceof ForumTopic) {
            throw new NotFoundHttpException('Sujet introuvable.');
        }

        $form = $this->createForm(ForumTopicType::class, $topic);
        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            $message = 'Votre message contient des mots inappropriés. Merci de respecter les règles du forum.';
            $titleText = (string) $topic->getTitle();
            $contentText = (string) $topic->getContent();
            if ($titleText !== '' && $profanityFilter->containsProfanity($titleText)) {
                $form->get('title')->addError(new FormError($message));
            }
            if ($contentText !== '' && $profanityFilter->containsProfanity($contentText)) {
                $form->get('content')->addError(new FormError($message));
            }
        }

        if ($form->isSubmitted() && $form->isValid()) {
            if ($topic->isTextType()) {
                $topic->setVideoUrl(null);
            }
            $topic->setUpdatedAt(new \DateTimeImmutable());
            $topic->setSummary($summaryClient->summarize((string) $topic->getContent()));
            $topic->setTags($tagGenerator->generateTags((string) $topic->getTitle(), (string) $topic->getContent()));
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
        if (!$topic instanceof ForumTopic) {
            throw new NotFoundHttpException('Sujet introuvable.');
        }

        if ($this->isCsrfTokenValid('delete_topic_' . $topic->getId(), (string) $request->request->get('_token'))) {
            $em->remove($topic);
            $em->flush();
        }

        return $this->redirectToRoute('app_admin_forum_index');
    }

    #[Route('/{id}', name: 'show', methods: ['GET', 'POST'])]
    public function show(
        int $id,
        ForumTopicRepository $repo,
        ForumTopicReactionRepository $reactionRepository,
        ForumCommentReactionRepository $commentReactionRepository,
        RecommendationService $recommendationService,
        NotificationService $notificationService,
        ProfanityFilterService $profanityFilter,
        Request $request,
        EntityManagerInterface $em
    ): Response {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');

        $topic = $repo->find($id);
        if (!$topic instanceof ForumTopic) {
            throw new NotFoundHttpException('Sujet introuvable.');
        }

        $comment = new ForumComment();
        $form = $this->createForm(ForumCommentType::class, $comment);
        $form->handleRequest($request);
        $replyToId = (int) $request->query->get('replyTo', 0);
        $replyParent = $replyToId > 0 ? $this->findTopicCommentById($topic, $replyToId) : null;
        $postedParentId = (int) $request->request->get('parent_id', 0);

        if ($form->isSubmitted()) {
            $message = 'Votre message contient des mots inappropriés. Merci de respecter les règles du forum.';
            $text = (string) $comment->getContent();
            if ($text !== '' && $profanityFilter->containsProfanity($text)) {
                $form->get('content')->addError(new FormError($message));
            }
        }

        if ($form->isSubmitted() && $form->isValid()) {
            $user = $this->getUser();
            if (!$user instanceof User) {
                throw $this->createAccessDeniedException();
            }
            $comment->setAuthor($user);
            $comment->setTopic($topic);
            if ($postedParentId > 0) {
                $parent = $this->findTopicCommentById($topic, $postedParentId);
                if ($parent !== null) {
                    $comment->setParent($parent);
                }
            }
            $em->persist($comment);
            $em->flush();
            $notificationService->notifyNewComment($comment);

            return $this->redirectToRoute('app_admin_forum_show', ['id' => $topic->getId()]);
        }

        $allComments = [];
        foreach ($topic->getComments() as $commentItem) {
            $allComments[] = $commentItem;
        }
        $commentTree = $this->buildCommentTree($allComments);
        $commentIds = [];
        foreach ($allComments as $commentItem) {
            if ($commentItem->getId() !== null) {
                $commentIds[] = (int) $commentItem->getId();
            }
        }
        $visibleCount = 0;
        foreach ($allComments as $commentItem) {
            if (!$commentItem->isHidden()) {
                $visibleCount++;
            }
        }
        $counts = $reactionRepository->getCountsByTopicIds([(int) $topic->getId()]);
        $userReaction = null;
        $user = $this->getUser();
        if ($user instanceof User) {
            $userMap = $reactionRepository->getUserReactionMap($user, [(int) $topic->getId()]);
            $userReaction = $userMap[(int) $topic->getId()] ?? null;
        }
        $commentReactionCounts = $commentReactionRepository->getCountsByCommentIds($commentIds);
        $commentUserReactionMap = [];
        if ($user instanceof User) {
            $commentUserReactionMap = $commentReactionRepository->getUserReactionMap($user, $commentIds);
        }
        $recommendationPayload = $recommendationService->recommendForTopic($topic, 5);

        return $this->render('dashboard/forum/show.html.twig', [
            'topic' => $topic,
            'form' => $form->createView(),
            'reaction_counts' => $counts[(int) $topic->getId()] ?? ['like' => 0, 'love' => 0, 'total' => 0],
            'user_reaction' => $userReaction,
            'comment_tree' => $commentTree,
            'comment_reaction_counts' => $commentReactionCounts,
            'comment_user_reaction_map' => $commentUserReactionMap,
            'visible_comments_count' => $visibleCount,
            'reply_parent' => $replyParent,
            'recommended_topics' => $recommendationPayload['items'],
            'recommendations_fallback' => $recommendationPayload['is_fallback'],
        ]);
    }

    #[Route('/{id}/hide', name: 'hide', methods: ['POST'])]
    public function hide(int $id, ForumTopicRepository $repo, Request $request, EntityManagerInterface $em): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');

        $topic = $repo->find($id);
        if (!$topic instanceof ForumTopic) {
            throw new NotFoundHttpException('Sujet introuvable.');
        }

        if ($this->isCsrfTokenValid('hide_topic_' . $topic->getId(), (string) $request->request->get('_token'))) {
            $topic->setIsHidden(true);
            $em->flush();
        }

        $referer = (string) $request->headers->get('referer');
        if ($referer !== '' && str_contains($referer, '/dashboard/forum')) {
            return $this->redirect($referer);
        }

        return $this->redirectToRoute('app_admin_forum_index');
    }

    #[Route('/{id}/report-topic', name: 'report_topic', methods: ['POST'])]
    public function reportTopic(int $id, ForumTopicRepository $repo, Request $request, EntityManagerInterface $em): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');

        $topic = $repo->find($id);
        if (!$topic instanceof ForumTopic) {
            throw new NotFoundHttpException('Sujet introuvable.');
        }

        if ($this->isCsrfTokenValid('report_topic_' . $topic->getId(), (string) $request->request->get('_token'))) {
            $reason = trim((string) $request->request->get('reason'));
            $topic->setIsReported(true);
            $topic->setReportedReason($reason !== '' ? $reason : 'Signalement admin');
            $topic->setReportedAt(new \DateTimeImmutable());
            $reportedBy = $this->getUser();
            $topic->setReportedBy($reportedBy instanceof User ? $reportedBy : null);
            $em->flush();
        }

        $referer = (string) $request->headers->get('referer');
        if ($referer !== '' && str_contains($referer, '/dashboard/forum')) {
            return $this->redirect($referer);
        }

        return $this->redirectToRoute('app_admin_forum_show', ['id' => $topic->getId()]);
    }

    #[Route('/{id}/resolve-topic-report', name: 'resolve_topic_report', methods: ['POST'])]
    public function resolveTopicReport(int $id, ForumTopicRepository $repo, Request $request, EntityManagerInterface $em): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');

        $topic = $repo->find($id);
        if (!$topic instanceof ForumTopic) {
            throw new NotFoundHttpException('Sujet introuvable.');
        }

        if ($this->isCsrfTokenValid('resolve_topic_report_' . $topic->getId(), (string) $request->request->get('_token'))) {
            $topic->setIsReported(false);
            $topic->setReportedReason(null);
            $topic->setReportedAt(null);
            $topic->setReportedBy(null);
            $em->flush();
        }

        return $this->redirectToRoute('admin_dashboard');
    }

    #[Route('/comment/{id}/resolve-comment-report', name: 'resolve_comment_report', methods: ['POST'])]
    public function resolveCommentReport(int $id, ForumCommentRepository $repo, Request $request, EntityManagerInterface $em): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');

        $comment = $repo->find($id);
        if (!$comment instanceof ForumComment) {
            throw new NotFoundHttpException('Commentaire introuvable.');
        }

        if ($this->isCsrfTokenValid('resolve_comment_report_' . $comment->getId(), (string) $request->request->get('_token'))) {
            $comment->setIsReported(false);
            $comment->setReportedReason(null);
            $comment->setReportedAt(null);
            $comment->setReportedBy(null);
            $em->flush();
        }

        return $this->redirectToRoute('admin_dashboard');
    }

    #[Route('/comment/{id}/delete-comment', name: 'delete_comment', methods: ['POST'])]
    public function deleteComment(int $id, ForumCommentRepository $repo, Request $request, EntityManagerInterface $em): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');

        $comment = $repo->find($id);
        if (!$comment instanceof ForumComment) {
            throw new NotFoundHttpException('Commentaire introuvable.');
        }

        if ($this->isCsrfTokenValid('delete_comment_' . $comment->getId(), (string) $request->request->get('_token'))) {
            $em->remove($comment);
            $em->flush();
        }

        $referer = (string) $request->headers->get('referer');
        if ($referer !== '' && str_contains($referer, '/dashboard/forum')) {
            return $this->redirect($referer);
        }

        return $this->redirectToRoute('admin_dashboard');
    }

    #[Route('/comment/{id}/report-comment', name: 'report_comment', methods: ['POST'])]
    public function reportComment(int $id, ForumCommentRepository $repo, Request $request, EntityManagerInterface $em): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');

        $comment = $repo->find($id);
        if (!$comment instanceof ForumComment) {
            throw new NotFoundHttpException('Commentaire introuvable.');
        }

        if ($this->isCsrfTokenValid('report_comment_' . $comment->getId(), (string) $request->request->get('_token'))) {
            $reason = trim((string) $request->request->get('reason'));
            $comment->setIsReported(true);
            $comment->setReportedReason($reason !== '' ? $reason : 'Signalement admin');
            $comment->setReportedAt(new \DateTimeImmutable());
            $reportedBy = $this->getUser();
            $comment->setReportedBy($reportedBy instanceof User ? $reportedBy : null);
            $em->flush();
        }

        $referer = (string) $request->headers->get('referer');
        if ($referer !== '' && str_contains($referer, '/dashboard/forum')) {
            return $this->redirect($referer);
        }

        return $this->redirectToRoute('app_admin_forum_show', ['id' => $comment->getTopic()?->getId()]);
    }

    #[Route('/comment/{id}/hide-comment', name: 'hide_comment', methods: ['POST'])]
    public function hideComment(int $id, ForumCommentRepository $repo, Request $request, EntityManagerInterface $em): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');

        $comment = $repo->find($id);
        if (!$comment instanceof ForumComment) {
            throw new NotFoundHttpException('Commentaire introuvable.');
        }

        if ($this->isCsrfTokenValid('hide_comment_' . $comment->getId(), (string) $request->request->get('_token'))) {
            $comment->setIsHidden(true);
            $em->flush();
        }

        $referer = (string) $request->headers->get('referer');
        if ($referer !== '' && str_contains($referer, '/dashboard/forum')) {
            return $this->redirect($referer);
        }

        return $this->redirectToRoute('admin_dashboard');
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

    private function parseDateOnly(string $value): ?DateTimeImmutable
    {
        if ($value === '') {
            return null;
        }

        $date = DateTimeImmutable::createFromFormat('!Y-m-d', $value);
        if ($date === false) {
            return null;
        }

        return $date;
    }

    private function buildFilterSummary(?DateTimeImmutable $from, ?DateTimeImmutable $to, string $sort): ?string
    {
        if ($from === null && $to === null) {
            return null;
        }

        $period = 'Periode ';
        if ($from !== null && $to !== null) {
            $period .= 'du ' . $from->format('d/m/Y') . ' au ' . $to->format('d/m/Y');
        } elseif ($from !== null) {
            $period .= 'a partir du ' . $from->format('d/m/Y');
        } else {
            $period .= 'jusqu\'au ' . $to->format('d/m/Y');
        }

        $sortLabel = $sort === 'asc' ? 'plus ancien' : 'plus recent';
        return $period . ' (' . $sortLabel . ')';
    }
}

