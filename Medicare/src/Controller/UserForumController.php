<?php

namespace App\Controller;

use App\Entity\ForumComment;
use App\Entity\ForumCommentReaction;
use App\Entity\ForumTopic;
use App\Entity\ForumTopicReaction;
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
use Doctrine\ORM\EntityManagerInterface;
use DateTimeImmutable;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormError;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/dashboard/forum', name: 'app_user_forum_')]
class UserForumController extends AbstractController
{
    #[Route('/', name: 'index', methods: ['GET'])]
    public function index(Request $request, ForumTopicRepository $repo, ForumTopicReactionRepository $reactionRepository): Response
    {
        $this->denyUnlessForumMember();

        $user = $this->getUser();
        if (!$user instanceof User) {
            throw $this->createAccessDeniedException();
        }

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

        $topics = array_values(array_filter(
            $repo->findFiltered($from, $to, $sort),
            static fn (ForumTopic $topic): bool => !$topic->isHidden()
        ));
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
        $topicIds = array_map(static fn (ForumTopic $topic) => (int) $topic->getId(), $topics);
        $reactionCounts = $reactionRepository->getCountsByTopicIds($topicIds);
        $userReactionMap = $reactionRepository->getUserReactionMap($user, $topicIds);

        return $this->render('dashboard/user_forum/index.html.twig', [
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
    public function new(Request $request, EntityManagerInterface $em, ForumSummaryClient $summaryClient, NotificationService $notificationService, ProfanityFilterService $profanityFilter, TagGeneratorService $tagGenerator): Response
    {
        $this->denyUnlessForumMember();

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
            $topic->setAuthor($this->getUser());
            if ($topic->isTextType()) {
                $topic->setVideoUrl(null);
            }
            $topic->setSummary($summaryClient->summarize((string) $topic->getContent()));
            $topic->setTags($tagGenerator->generateTags((string) $topic->getTitle(), (string) $topic->getContent()));
            $em->persist($topic);
            $em->flush();
            $notificationService->notifyNewTopic($topic);

            return $this->redirectToRoute('app_user_forum_index');
        }

        return $this->render('dashboard/user_forum/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: 'show', methods: ['GET', 'POST'])]
    public function show(int $id, ForumTopicRepository $repo, ForumTopicReactionRepository $reactionRepository, ForumCommentReactionRepository $commentReactionRepository, RecommendationService $recommendationService, NotificationService $notificationService, ProfanityFilterService $profanityFilter, Request $request, EntityManagerInterface $em): Response
    {
        $this->denyUnlessForumMember();

        $topic = $repo->find($id);
        if (!$topic) {
            throw new NotFoundHttpException('Sujet introuvable.');
        }
        if ($topic->isHidden() && !$this->canModerateTopic($topic)) {
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
            $notificationService->notifyNewComment($comment);

            return $this->redirectToRoute('app_user_forum_show', ['id' => $topic->getId()]);
        }

        $user = $this->getUser();
        if (!$user instanceof User) {
            throw $this->createAccessDeniedException();
        }

        $counts = $reactionRepository->getCountsByTopicIds([(int) $topic->getId()]);
        $userMap = $reactionRepository->getUserReactionMap($user, [(int) $topic->getId()]);
        $commentIds = [];
        $visibleComments = $this->getVisibleCommentsForTopic($topic);
        foreach ($visibleComments as $commentItem) {
            if ($commentItem->getId() !== null) {
                $commentIds[] = (int) $commentItem->getId();
            }
        }
        $commentReactionCounts = $commentReactionRepository->getCountsByCommentIds($commentIds);
        $commentUserReactionMap = $commentReactionRepository->getUserReactionMap($user, $commentIds);
        $commentTree = $this->buildCommentTree($visibleComments);
        $recommendationPayload = $recommendationService->recommendForTopic($topic, 5);

        return $this->render('dashboard/user_forum/show.html.twig', [
            'topic' => $topic,
            'form' => $form->createView(),
            'reaction_counts' => $counts[(int) $topic->getId()] ?? ['like' => 0, 'love' => 0, 'total' => 0],
            'user_reaction' => $userMap[(int) $topic->getId()] ?? null,
            'comment_reaction_counts' => $commentReactionCounts,
            'comment_user_reaction_map' => $commentUserReactionMap,
            'comment_tree' => $commentTree,
            'visible_comments_count' => count($visibleComments),
            'reply_parent' => $replyParent,
            'recommended_topics' => $recommendationPayload['items'],
            'recommendations_fallback' => $recommendationPayload['is_fallback'],
        ]);
    }

    #[Route('/{id}/react', name: 'react', methods: ['POST'])]
    public function react(int $id, ForumTopicRepository $repo, ForumTopicReactionRepository $reactionRepository, Request $request, EntityManagerInterface $em): Response
    {
        $this->denyUnlessForumMember();

        $topic = $repo->find($id);
        if (!$topic) {
            throw new NotFoundHttpException('Sujet introuvable.');
        }

        if (!$this->isCsrfTokenValid('react_topic_' . $topic->getId(), $request->request->get('_token'))) {
            return $this->redirectToRoute('app_user_forum_show', ['id' => $topic->getId()]);
        }

        $type = (string) $request->request->get('type');
        if (!in_array($type, [ForumTopicReaction::TYPE_LIKE, ForumTopicReaction::TYPE_LOVE], true)) {
            return $this->redirectToRoute('app_user_forum_show', ['id' => $topic->getId()]);
        }

        $user = $this->getUser();
        if (!$user instanceof User) {
            throw $this->createAccessDeniedException();
        }
        $existing = $reactionRepository->findOneForUserAndTopic($user, $topic);
        if ($existing && $existing->getType() === $type) {
            $em->remove($existing);
        } elseif ($existing) {
            $existing->setType($type);
        } else {
            $reaction = new ForumTopicReaction();
            $reaction->setTopic($topic);
            $reaction->setUser($user);
            $reaction->setType($type);
            $em->persist($reaction);
        }

        $em->flush();

        $referer = (string) $request->headers->get('referer');
        if ($referer !== '' && (str_contains($referer, '/dashboard/forum') || str_contains($referer, '/admin/forum'))) {
            return $this->redirect($referer);
        }

        return $this->redirectToRoute('app_user_forum_show', ['id' => $topic->getId()]);
    }

    #[Route('/comment/{id}/react', name: 'react_comment', methods: ['POST'])]
    public function reactComment(int $id, ForumCommentRepository $repo, ForumCommentReactionRepository $reactionRepository, Request $request, EntityManagerInterface $em): Response
    {
        $this->denyUnlessForumMember();

        $comment = $repo->find($id);
        if (!$comment) {
            throw new NotFoundHttpException('Commentaire introuvable.');
        }

        if (!$this->isCsrfTokenValid('react_comment_' . $comment->getId(), $request->request->get('_token'))) {
            return $this->redirectToRoute('app_user_forum_show', ['id' => $comment->getTopic()?->getId()]);
        }

        $type = (string) $request->request->get('type');
        if (!in_array($type, [ForumCommentReaction::TYPE_LIKE, ForumCommentReaction::TYPE_LOVE], true)) {
            return $this->redirectToRoute('app_user_forum_show', ['id' => $comment->getTopic()?->getId()]);
        }

        $user = $this->getUser();
        if (!$user instanceof User) {
            throw $this->createAccessDeniedException();
        }

        $existing = $reactionRepository->findOneForUserAndComment($user, $comment);
        if ($existing && $existing->getType() === $type) {
            $em->remove($existing);
        } elseif ($existing) {
            $existing->setType($type);
        } else {
            $reaction = new ForumCommentReaction();
            $reaction->setComment($comment);
            $reaction->setUser($user);
            $reaction->setType($type);
            $em->persist($reaction);
        }

        $em->flush();

        $referer = (string) $request->headers->get('referer');
        if ($referer !== '' && (str_contains($referer, '/dashboard/forum') || str_contains($referer, '/admin/forum'))) {
            return $this->redirect($referer);
        }

        return $this->redirectToRoute('app_user_forum_show', ['id' => $comment->getTopic()?->getId()]);
    }

    #[Route('/{id}/report-topic', name: 'report_topic', methods: ['POST'])]
    public function reportTopic(int $id, ForumTopicRepository $repo, Request $request, EntityManagerInterface $em): Response
    {
        $this->denyUnlessForumMember();

        $topic = $repo->find($id);
        if (!$topic) {
            throw new NotFoundHttpException('Sujet introuvable.');
        }

        if ($this->isCsrfTokenValid('report_topic_' . $topic->getId(), $request->request->get('_token'))) {
            $reason = trim((string) $request->request->get('reason'));
            $topic->setIsReported(true);
            $topic->setReportedReason($reason !== '' ? $reason : 'Signalement utilisateur');
            $topic->setReportedAt(new \DateTimeImmutable());
            $topic->setReportedBy($this->getUser());
            $em->flush();
        }

        return $this->redirectToRoute('app_user_forum_show', ['id' => $id]);
    }

    #[Route('/comment/{id}/report-comment', name: 'report_comment', methods: ['POST'])]
    public function reportComment(int $id, ForumCommentRepository $repo, Request $request, EntityManagerInterface $em): Response
    {
        $this->denyUnlessForumMember();

        $comment = $repo->find($id);
        if (!$comment) {
            throw new NotFoundHttpException('Commentaire introuvable.');
        }

        if ($this->isCsrfTokenValid('report_comment_' . $comment->getId(), $request->request->get('_token'))) {
            $reason = trim((string) $request->request->get('reason'));
            $comment->setIsReported(true);
            $comment->setReportedReason($reason !== '' ? $reason : 'Signalement utilisateur');
            $comment->setReportedAt(new \DateTimeImmutable());
            $comment->setReportedBy($this->getUser());
            $em->flush();
        }

        return $this->redirectToRoute('app_user_forum_show', ['id' => $comment->getTopic()?->getId()]);
    }

    #[Route('/{id}/hide-topic', name: 'hide_topic', methods: ['POST'])]
    public function hideTopic(int $id, ForumTopicRepository $repo, Request $request, EntityManagerInterface $em): Response
    {
        $this->denyUnlessForumMember();

        $topic = $repo->find($id);
        if (!$topic) {
            throw new NotFoundHttpException('Sujet introuvable.');
        }
        if (!$this->canModerateTopic($topic)) {
            throw $this->createAccessDeniedException();
        }

        if ($this->isCsrfTokenValid('hide_topic_' . $topic->getId(), $request->request->get('_token'))) {
            $topic->setIsHidden(true);
            $em->flush();
        }

        return $this->redirectToRoute('app_user_forum_index');
    }

    #[Route('/{id}/delete-topic', name: 'delete_topic', methods: ['POST'])]
    public function deleteTopic(int $id, ForumTopicRepository $repo, Request $request, EntityManagerInterface $em): Response
    {
        $this->denyUnlessForumMember();

        $topic = $repo->find($id);
        if (!$topic) {
            throw new NotFoundHttpException('Sujet introuvable.');
        }
        if (!$this->canModerateTopic($topic)) {
            throw $this->createAccessDeniedException();
        }

        if ($this->isCsrfTokenValid('delete_topic_' . $topic->getId(), $request->request->get('_token'))) {
            $em->remove($topic);
            $em->flush();
        }

        return $this->redirectToRoute('app_user_forum_index');
    }

    #[Route('/comment/{id}/hide-comment', name: 'hide_comment', methods: ['POST'])]
    public function hideComment(int $id, ForumCommentRepository $repo, Request $request, EntityManagerInterface $em): Response
    {
        $this->denyUnlessForumMember();

        $comment = $repo->find($id);
        if (!$comment) {
            throw new NotFoundHttpException('Commentaire introuvable.');
        }
        if (!$this->canModerateComment($comment)) {
            throw $this->createAccessDeniedException();
        }

        if ($this->isCsrfTokenValid('hide_comment_' . $comment->getId(), $request->request->get('_token'))) {
            $comment->setIsHidden(true);
            $em->flush();
        }

        return $this->redirectToRoute('app_user_forum_show', ['id' => $comment->getTopic()?->getId()]);
    }

    #[Route('/comment/{id}/delete-comment', name: 'delete_comment', methods: ['POST'])]
    public function deleteComment(int $id, ForumCommentRepository $repo, Request $request, EntityManagerInterface $em): Response
    {
        $this->denyUnlessForumMember();

        $comment = $repo->find($id);
        if (!$comment) {
            throw new NotFoundHttpException('Commentaire introuvable.');
        }
        if (!$this->canModerateComment($comment)) {
            throw $this->createAccessDeniedException();
        }

        $topicId = $comment->getTopic()?->getId();
        if ($this->isCsrfTokenValid('delete_comment_' . $comment->getId(), $request->request->get('_token'))) {
            $em->remove($comment);
            $em->flush();
        }

        if ($topicId === null) {
            return $this->redirectToRoute('app_user_forum_index');
        }

        return $this->redirectToRoute('app_user_forum_show', ['id' => $topicId]);
    }

    private function canModerateTopic(ForumTopic $topic): bool
    {
        return $this->isGranted('ROLE_ADMIN');
    }

    private function canModerateComment(ForumComment $comment): bool
    {
        return $this->isGranted('ROLE_ADMIN');
    }

    private function denyUnlessForumMember(): void
    {
        if (!$this->isGranted('ROLE_USER') && !$this->isGranted('ROLE_ADMIN')) {
            throw $this->createAccessDeniedException();
        }
    }

    /**
     * @return ForumComment[]
     */
    private function getVisibleCommentsForTopic(ForumTopic $topic): array
    {
        $comments = [];
        foreach ($topic->getComments() as $comment) {
            if (!$comment->isHidden()) {
                $comments[] = $comment;
            }
        }

        return $comments;
    }

    /**
     * @param ForumComment[] $visibleComments
     * @return array<int, ForumComment[]>
     */
    private function buildCommentTree(array $visibleComments): array
    {
        $commentMap = [];
        foreach ($visibleComments as $comment) {
            if ($comment->getId() !== null) {
                $commentMap[(int) $comment->getId()] = $comment;
            }
        }

        $tree = [];
        foreach ($visibleComments as $comment) {
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
            if ($comment->getId() === $commentId && !$comment->isHidden()) {
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
