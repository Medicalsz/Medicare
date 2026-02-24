<?php

namespace App\Twig;

use App\Entity\User;
use App\Repository\NotificationRepository;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class NotificationExtension extends AbstractExtension
{
    public function __construct(
        private readonly TokenStorageInterface $tokenStorage,
        private readonly NotificationRepository $notificationRepository,
    ) {
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('notifications_unread_count', [$this, 'getUnreadCount']),
            new TwigFunction('notifications_latest', [$this, 'getLatest']),
        ];
    }

    public function getUnreadCount(): int
    {
        $user = $this->tokenStorage->getToken()?->getUser();
        if (!$user instanceof User) {
            return 0;
        }

        return $this->notificationRepository->countUnreadForUser($user);
    }

    /**
     * @return array<int, \App\Entity\Notification>
     */
    public function getLatest(int $limit = 5): array
    {
        $user = $this->tokenStorage->getToken()?->getUser();
        if (!$user instanceof User) {
            return [];
        }

        return $this->notificationRepository->findLatestForUser($user, $limit);
    }
}
