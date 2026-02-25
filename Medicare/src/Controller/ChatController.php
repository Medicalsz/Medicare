<?php

namespace App\Controller;

use App\Entity\ForumComment;
use App\Entity\ForumTopic;
use App\Entity\User;
use App\Repository\ForumTopicRepository;
use App\Service\SummarizerService;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;

class ChatController extends AbstractController
{
    #[Route('/chat-resume', name: 'app_chat_resume', methods: ['GET'])]
    public function index(Request $request, ForumTopicRepository $topicRepository): Response
    {
        $this->denyUnlessChatAllowed();

        $topics = $this->getAllowedTopics($topicRepository);
        $prefillTopicId = max(0, (int) $request->query->get('topicId', 0));

        return $this->render('chat/resume.html.twig', [
            'topics' => $topics,
            'prefill_topic_id' => $prefillTopicId,
            'test_messages' => [
                'Fais un resume professionnel en 3 points cles',
                'Donne une synthese executive en 4 phrases',
                'Resumer les messages avec recommandations pratiques',
            ],
        ]);
    }

    #[Route('/chat-resume/message', name: 'app_chat_resume_message', methods: ['POST'])]
    public function message(
        Request $request,
        ForumTopicRepository $topicRepository,
        SummarizerService $summarizerService,
        LoggerInterface $logger
    ): JsonResponse {
        $this->denyUnlessChatAllowed();

        $payload = json_decode($request->getContent(), true);
        if (!is_array($payload)) {
            return $this->json(['error' => 'Payload JSON invalide.'], 400);
        }

        $userMessage = trim((string) ($payload['message'] ?? ''));
        $manualText = trim((string) ($payload['text'] ?? ''));
        $topicId = max(0, (int) ($payload['topicId'] ?? 0));

        if ($userMessage === '') {
            return $this->json(['error' => 'Le message utilisateur est obligatoire.'], 400);
        }

        $fullText = '';
        $topicTitle = '';
        $sourceLabel = 'Texte colle';

        if ($topicId > 0) {
            $topic = $topicRepository->find($topicId);
            if (!$topic instanceof ForumTopic) {
                throw new NotFoundHttpException('Sujet introuvable.');
            }
            if (!$this->canReadTopic($topic)) {
                return $this->json(['error' => 'Vous ne pouvez pas utiliser ce sujet.'], 403);
            }

            // 1) Aggregate corpus as title + body, then summarize ONLY body.
            $corpus = $this->buildTopicCorpus($topic);
            $topicTitle = $corpus['title'];
            $fullText = $corpus['body'];
            $sourceLabel = 'Sujet: ' . (string) $topic->getTitle();
        } else {
            $fullText = $manualText;
        }

        $fullText = trim(strip_tags($fullText));
        if ($fullText === '') {
            return $this->json(['error' => 'Ajoutez un texte ou choisissez un sujet du forum.'], 400);
        }

        // 4) Debug guard: verify corpus size actually contains topic body/comments.
        $logger->debug('Chat resume input body length', [
            'body_len' => mb_strlen($fullText),
            'topic_title' => $topicTitle,
            'topic_id' => $topicId > 0 ? $topicId : null,
        ]);

        // 3) Short content guard.
        if (mb_strlen($fullText) < 200) {
            return $this->json([
                'reply' => "Analyse impossible: le contenu est trop court pour produire un resume professionnel fiable.\n\nAjoutez davantage de contexte (au moins un paragraphe detaille), puis relancez la demande.",
                'sentences' => 0,
                'source_label' => $sourceLabel,
                'source_title' => $topicTitle !== '' ? $topicTitle : null,
            ], 200);
        }

        // 2) Detect expected size from user instruction then summarize.
        $sentences = $summarizerService->inferSentenceCount($userMessage, 2);
        $isVariantIntent = $summarizerService->isVariantIntent($userMessage);
        $variant = 'standard';
        $summary = null;

        $session = $request->hasSession() ? $request->getSession() : null;
        $lastSummary = $session ? (string) $session->get('chat_resume_last_summary', '') : '';

        if ($isVariantIntent) {
            $baseIndex = $session ? (int) $session->get('chat_resume_variant_index', 0) : 0;
            $maxAttempts = 8;
            for ($attempt = 0; $attempt < $maxAttempts; $attempt++) {
                $candidate = $summarizerService->summarizeVariant($fullText, $sentences, $baseIndex + $attempt);
                $candidateText = trim((string) ($candidate['summary'] ?? ''));
                if ($candidateText === '') {
                    continue;
                }

                if ($this->normalizeForCompare($candidateText) !== $this->normalizeForCompare($lastSummary)) {
                    $summary = $candidateText;
                    $variant = (string) ($candidate['variant'] ?? 'variant');
                    if ($session) {
                        $session->set('chat_resume_variant_index', $baseIndex + $attempt + 1);
                    }
                    break;
                }
            }

            // If all variants collapsed to same output, still return a valid variant summary.
            if ($summary === null) {
                $fallbackVariant = $summarizerService->summarizeVariant($fullText, $sentences, $baseIndex + $maxAttempts);
                $summary = trim((string) ($fallbackVariant['summary'] ?? ''));
                $variant = (string) ($fallbackVariant['variant'] ?? 'variant-fallback');
                if ($session) {
                    $session->set('chat_resume_variant_index', $baseIndex + $maxAttempts + 1);
                }
            }
        } else {
            $summary = $summarizerService->summarize($fullText, $sentences);
            $variant = 'standard';
        }

        if ($summary === null || trim($summary) === '') {
            return $this->json(['error' => 'Impossible de generer un resume pour le moment.'], 500);
        }

        // 5) Simple controller-side check: summarize() must return condensed content.
        if ($this->looksLikeRawPayload($summary, $fullText)) {
            $summary = $this->fallbackCondensedSummary($fullText, $sentences);
            if ($summary === null) {
                return $this->json(['error' => 'Le service de resume a retourne un texte non exploitable.'], 500);
            }
        }

        if ($session) {
            $session->set('chat_resume_last_summary', $summary);
        }

        $summary = $this->polishSummaryText($summary);
        $reply = $this->buildProfessionalReply(
            $summary,
            $sentences,
            $sourceLabel,
            $topicTitle !== '' ? $topicTitle : null
        );

        return $this->json([
            // 3) Always return generated summary, never raw full text.
            'reply' => $reply,
            'sentences' => $sentences,
            'source_label' => $sourceLabel,
            'source_title' => $topicTitle !== '' ? $topicTitle : null,
            'variant' => $variant,
        ]);
    }

    private function denyUnlessChatAllowed(): void
    {
        if (!$this->isGranted('ROLE_USER') && !$this->isGranted('ROLE_ADMIN')) {
            $this->denyAccessUnlessGranted('ROLE_USER');
        }
    }

    /**
     * @return list<ForumTopic>
     */
    private function getAllowedTopics(ForumTopicRepository $topicRepository): array
    {
        $topics = $topicRepository->findBy([], ['createdAt' => 'DESC']);
        $allowed = [];
        foreach ($topics as $topic) {
            if ($topic instanceof ForumTopic && $this->canReadTopic($topic)) {
                $allowed[] = $topic;
            }
        }

        return $allowed;
    }

    private function canReadTopic(ForumTopic $topic): bool
    {
        if ($this->isGranted('ROLE_ADMIN')) {
            return true;
        }

        if (!$topic->isHidden()) {
            return true;
        }

        $user = $this->getUser();
        return $user instanceof User && $topic->getAuthor()?->getId() === $user->getId();
    }

    private function canReadComment(ForumComment $comment): bool
    {
        if ($this->isGranted('ROLE_ADMIN')) {
            return true;
        }

        if (!$comment->isHidden()) {
            return true;
        }

        $user = $this->getUser();
        return $user instanceof User && $comment->getAuthor()?->getId() === $user->getId();
    }

    /**
     * @return array{title: string, body: string}
     */
    private function buildTopicCorpus(ForumTopic $topic): array
    {
        $chunks = [];
        $title = trim(strip_tags((string) $topic->getTitle()));

        $topicContent = trim(strip_tags((string) $topic->getContent()));
        if ($topicContent !== '') {
            $chunks[] = $this->ensureEnded($topicContent);
        }

        foreach ($topic->getComments() as $comment) {
            if (!$comment instanceof ForumComment || !$this->canReadComment($comment)) {
                continue;
            }

            $commentText = trim(strip_tags((string) $comment->getContent()));
            if ($commentText !== '') {
                $chunks[] = $this->ensureEnded($commentText);
            }
        }

        return [
            'title' => $title,
            'body' => implode("\n\n", $chunks),
        ];
    }

    private function looksLikeRawPayload(string $summary, string $fullText): bool
    {
        $summaryNorm = $this->normalizeForCompare($summary);
        $fullNorm = $this->normalizeForCompare($fullText);

        if ($summaryNorm === '' || $fullNorm === '') {
            return true;
        }

        if ($summaryNorm === $fullNorm) {
            return true;
        }

        return mb_strlen($summaryNorm) >= (int) floor(mb_strlen($fullNorm) * 0.92);
    }

    private function fallbackCondensedSummary(string $fullText, int $sentences): ?string
    {
        $parts = preg_split('/(?<=[.!?])\s+|\n+/u', trim($fullText)) ?: [];
        $parts = array_values(array_filter(array_map('trim', $parts), static fn (string $p): bool => $p !== ''));
        if ($parts === []) {
            return null;
        }

        $target = max(1, min(6, $sentences));
        $selected = array_slice($parts, 0, $target);
        $summary = implode(' ', $selected);

        if (mb_strlen($summary) > 700) {
            $summary = mb_substr($summary, 0, 700);
            $lastSpace = mb_strrpos($summary, ' ');
            if ($lastSpace !== false) {
                $summary = mb_substr($summary, 0, $lastSpace);
            }
            $summary = rtrim($summary, " ,;:") . '...';
        }

        return trim($summary);
    }

    private function ensureEnded(string $text): string
    {
        $value = trim($text);
        if ($value === '') {
            return $value;
        }

        $last = mb_substr($value, -1);
        if (!in_array($last, ['.', '!', '?'], true)) {
            $value .= '.';
        }

        return $value;
    }

    private function normalizeForCompare(string $text): string
    {
        return mb_strtolower(trim(preg_replace('/\s+/u', ' ', $text) ?? ''));
    }

    private function polishSummaryText(string $text): string
    {
        $value = trim($text);
        if ($value === '') {
            return $value;
        }

        $value = str_replace(["\r\n", "\r"], "\n", $value);
        $value = str_replace(['â€¢', '•', '* '], '- ', $value);
        $value = preg_replace('/[ \t]+/u', ' ', $value) ?? $value;
        $value = preg_replace("/\n{3,}/u", "\n\n", $value) ?? $value;

        return trim($value);
    }

    private function buildProfessionalReply(string $summary, int $sentences, string $sourceLabel, ?string $topicTitle): string
    {
        $detail = 'niveau standard';
        if ($sentences <= 2) {
            $detail = 'niveau court';
        } elseif ($sentences >= 5) {
            $detail = 'niveau detaille';
        }

        $lines = [
            'Resume professionnel',
            'Source: ' . $sourceLabel,
            'Niveau: ' . $detail,
        ];

        if ($topicTitle !== null && trim($topicTitle) !== '') {
            $lines[] = 'Sujet: ' . trim($topicTitle);
        }

        $lines[] = '';
        $lines[] = 'Synthese:';

        if (preg_match('/^\s*-\s+/m', $summary) === 1) {
            $lines[] = $summary;
        } else {
            $parts = preg_split('/(?<=[.!?])\s+/u', trim($summary)) ?: [];
            $parts = array_values(array_filter(array_map('trim', $parts), static fn (string $p): bool => $p !== ''));
            if ($parts === []) {
                $parts = [trim($summary)];
            }

            $max = max(1, min(6, $sentences));
            $parts = array_slice($parts, 0, $max);
            foreach ($parts as $part) {
                $lines[] = '- ' . $part;
            }
        }

        return implode("\n", $lines);
    }
}
