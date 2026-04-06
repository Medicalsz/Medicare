<?php

namespace App\Service;

use App\Entity\ForumComment;
use App\Entity\ForumTopic;
use App\Entity\Notification;
use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class NotificationService
{
    public function __construct(
        private readonly UserRepository $userRepository,
        private readonly EntityManagerInterface $entityManager,
        private readonly UrlGeneratorInterface $urlGenerator,
    ) {
    }

    public function notifyNewTopic(ForumTopic $topic): void
    {
        $author = $topic->getAuthor();
        if (!$author instanceof User || $topic->getId() === null) {
            return;
        }

        $authorName = $this->formatUserName($author);
        $message = $authorName . ' a publie un nouveau sujet';
        $this->createNotificationsForAllUsers($author, Notification::TYPE_NEW_TOPIC, $message, $authorName, (int) $topic->getId());
    }

    public function notifyNewComment(ForumComment $comment): void
    {
        $author = $comment->getAuthor();
        $topic = $comment->getTopic();
        if (!$author instanceof User || !$topic instanceof ForumTopic || $topic->getId() === null) {
            return;
        }

        $authorName = $this->formatUserName($author);
        $message = $authorName . ' a publie un nouveau commentaire';
        $commentId = $comment->getId();
        $this->createNotificationsForAllUsers(
            $author,
            Notification::TYPE_NEW_COMMENT,
            $message,
            $authorName,
            (int) $topic->getId(),
            $commentId !== null ? (int) $commentId : null
        );
    }

    private function createNotificationsForAllUsers(
        User $author,
        string $type,
        string $message,
        string $authorName,
        int $topicId,
        ?int $commentId = null
    ): void {
        $users = $this->userRepository->findAllRecipients();
        foreach ($users as $recipient) {
            if ($recipient->getId() === null || $recipient->getId() === $author->getId()) {
                continue;
            }

            $route = $this->isAdminLike($recipient) ? 'app_admin_forum_show' : 'app_user_forum_show';
            $link = $this->urlGenerator->generate($route, ['id' => $topicId]);
            if ($commentId !== null) {
                $link .= '#comment-' . $commentId;
            }

            $notification = (new Notification())
                ->setRecipient($recipient)
                ->setType($type)
                ->setMessage($message)
                ->setLink($link)
                ->setAuthorName($authorName)
                ->setCreatedAt(new \DateTimeImmutable())
                ->setIsRead(false);

            $this->entityManager->persist($notification);
        }

        $this->entityManager->flush();
    }

    private function formatUserName(User $user): string
    {
        $fullName = trim((string) $user->getPrenom() . ' ' . (string) $user->getNom());
        if ($fullName !== '') {
            return $fullName;
        }

        return (string) $user->getUserIdentifier();
    }

    private function isAdminLike(User $user): bool
    {
        $roles = $user->getRoles();
        return in_array('ROLE_ADMIN', $roles, true) || in_array('ROLE_MODERATOR', $roles, true);
    }
}

