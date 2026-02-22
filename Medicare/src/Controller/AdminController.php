<?php

namespace App\Controller;

use App\Repository\ForumCommentRepository;
use App\Repository\ForumTopicRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin', name: 'app_admin_')]
class AdminController extends AbstractController
{
    #[Route('/dashboard', name: 'dashboard')]
    public function dashboard(ForumTopicRepository $topicRepository, ForumCommentRepository $commentRepository): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');

        $today = new \DateTimeImmutable('today');

        $totalTopics = $topicRepository->count([]);
        $totalComments = $commentRepository->count([]);
        $topicsToday = (int) $topicRepository->createQueryBuilder('t')
            ->select('COUNT(t.id)')
            ->andWhere('t.createdAt >= :today')
            ->setParameter('today', $today)
            ->getQuery()
            ->getSingleScalarResult();
        $commentsToday = (int) $commentRepository->createQueryBuilder('c')
            ->select('COUNT(c.id)')
            ->andWhere('c.createdAt >= :today')
            ->setParameter('today', $today)
            ->getQuery()
            ->getSingleScalarResult();

        $allTopics = $topicRepository->findAll();
        $allComments = $commentRepository->findAll();
        $reportedTopics = $topicRepository->findBy(['isReported' => true], ['reportedAt' => 'DESC'], 5);
        $reportedComments = $commentRepository->findBy(['isReported' => true], ['reportedAt' => 'DESC'], 5);

        $topCategory = $this->computeTopCategory($allTopics);
        $activityRows = $this->buildWeeklyActivity($allTopics, $allComments);

        return $this->render('admin/dashboard.html.twig', [
            'forum_stats' => [
                'total_topics' => $totalTopics,
                'total_comments' => $totalComments,
                'topics_today' => $topicsToday,
                'comments_today' => $commentsToday,
                'reported_topics' => $topicRepository->count(['isReported' => true]),
                'reported_comments' => $commentRepository->count(['isReported' => true]),
                'top_category' => $topCategory,
            ],
            'reported_topics_list' => $reportedTopics,
            'reported_comments_list' => $reportedComments,
            'forum_activity_rows' => $activityRows,
        ]);
    }

    /**
     * @param array<int, \App\Entity\ForumTopic> $topics
     */
    private function computeTopCategory(array $topics): string
    {
        $categories = [
            'Sante mentale' => ['mental', 'stress', 'anx', 'depress', 'bien-etre'],
            'Nutrition' => ['nutrition', 'alimentation', 'regime', 'vitamine'],
            'Cardiologie' => ['coeur', 'cardio', 'tension', 'hypertension'],
            'Pediatrie' => ['enfant', 'bebe', 'pediatr'],
            'General' => [],
        ];
        $scores = array_fill_keys(array_keys($categories), 0);

        foreach ($topics as $topic) {
            $content = mb_strtolower(($topic->getTitle() ?? '') . ' ' . ($topic->getContent() ?? ''));
            $matched = false;
            foreach ($categories as $category => $tokens) {
                if ($category === 'General') {
                    continue;
                }
                foreach ($tokens as $token) {
                    if (str_contains($content, $token)) {
                        $scores[$category]++;
                        $matched = true;
                        break;
                    }
                }
            }
            if (!$matched) {
                $scores['General']++;
            }
        }

        arsort($scores);
        return (string) array_key_first($scores);
    }

    /**
     * @param array<int, \App\Entity\ForumTopic> $topics
     * @param array<int, \App\Entity\ForumComment> $comments
     * @return array<int, array{day: string, topics: int, comments: int, topic_pct: int, comment_pct: int}>
     */
    private function buildWeeklyActivity(array $topics, array $comments): array
    {
        $days = [];
        $today = new \DateTimeImmutable('today');
        for ($i = 6; $i >= 0; $i--) {
            $date = $today->modify("-{$i} day");
            $key = $date->format('Y-m-d');
            $days[$key] = [
                'day' => $date->format('d/m'),
                'topics' => 0,
                'comments' => 0,
            ];
        }

        foreach ($topics as $topic) {
            $key = $topic->getCreatedAt()?->format('Y-m-d');
            if ($key !== null && isset($days[$key])) {
                $days[$key]['topics']++;
            }
        }
        foreach ($comments as $comment) {
            $key = $comment->getCreatedAt()?->format('Y-m-d');
            if ($key !== null && isset($days[$key])) {
                $days[$key]['comments']++;
            }
        }

        $maxTopics = 1;
        $maxComments = 1;
        foreach ($days as $row) {
            $maxTopics = max($maxTopics, $row['topics']);
            $maxComments = max($maxComments, $row['comments']);
        }

        foreach ($days as &$row) {
            $row['topic_pct'] = (int) round(($row['topics'] / $maxTopics) * 100);
            $row['comment_pct'] = (int) round(($row['comments'] / $maxComments) * 100);
        }
        unset($row);

        return array_values($days);
    }
}
