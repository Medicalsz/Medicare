<?php

namespace App\Tests\Service;

use App\Entity\ForumComment;
use App\Entity\ForumTopic;
use App\Entity\Notification;
use App\Entity\User;
use App\Repository\UserRepository;
use App\Service\NotificationService;
use Doctrine\ORM\EntityManagerInterface;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class NotificationServiceTest extends TestCase
{
    public function testNotifyNewTopicCreatesNotificationsForRecipients(): void
    {
        $author = $this->makeUser(1, 'Jean', 'Dupont', ['ROLE_USER']);
        $recipient = $this->makeUser(2, 'Admin', 'Root', ['ROLE_ADMIN']);

        $topic = (new ForumTopic())
            ->setTitle('Sujet')
            ->setContent('Contenu')
            ->setAuthor($author);
        $this->setEntityId($topic, 10);

        $userRepo = $this->createMock(UserRepository::class);
        $userRepo->method('findAllRecipients')->willReturn([$author, $recipient]);

        $urlGenerator = $this->createMock(UrlGeneratorInterface::class);
        $urlGenerator->method('generate')->willReturn('/admin/forum/10');

        $entityManager = $this->createMock(EntityManagerInterface::class);
        $entityManager->expects(self::exactly(1))
            ->method('persist')
            ->with(self::callback(function (Notification $notification) use ($recipient): bool {
                return $notification->getRecipient() === $recipient
                    && $notification->getType() === Notification::TYPE_NEW_TOPIC
                    && str_contains($notification->getMessage(), 'a publie un nouveau sujet')
                    && $notification->getLink() !== '';
            }));
        $entityManager->expects(self::once())->method('flush');

        $service = new NotificationService($userRepo, $entityManager, $urlGenerator);
        $service->notifyNewTopic($topic);

        self::assertTrue(true);
    }

    public function testNotifyNewCommentCreatesLinkWithAnchor(): void
    {
        $author = $this->makeUser(1, 'Jean', 'Dupont', ['ROLE_USER']);
        $recipient = $this->makeUser(2, 'Sara', 'User', ['ROLE_USER']);

        $topic = (new ForumTopic())
            ->setTitle('Sujet')
            ->setContent('Contenu')
            ->setAuthor($author);
        $this->setEntityId($topic, 11);

        $comment = (new ForumComment())
            ->setContent('Commentaire')
            ->setAuthor($author)
            ->setTopic($topic);
        $this->setEntityId($comment, 55);

        $userRepo = $this->createMock(UserRepository::class);
        $userRepo->method('findAllRecipients')->willReturn([$author, $recipient]);

        $urlGenerator = $this->createMock(UrlGeneratorInterface::class);
        $urlGenerator->method('generate')->willReturn('/dashboard/forum/11');

        $entityManager = $this->createMock(EntityManagerInterface::class);
        $entityManager->expects(self::exactly(1))
            ->method('persist')
            ->with(self::callback(function (Notification $notification): bool {
                return $notification->getType() === Notification::TYPE_NEW_COMMENT
                    && str_contains($notification->getLink(), '#comment-55');
            }));
        $entityManager->expects(self::once())->method('flush');

        $service = new NotificationService($userRepo, $entityManager, $urlGenerator);
        $service->notifyNewComment($comment);

        self::assertTrue(true);
    }

    private function makeUser(int $id, string $prenom, string $nom, array $roles): User
    {
        $user = (new User())
            ->setPrenom($prenom)
            ->setNom($nom)
            ->setEmail($prenom . '.' . $nom . '@example.test')
            ->setPassword('secret')
            ->setNumero('0000')
            ->setRoles($roles);

        $this->setEntityId($user, $id);

        return $user;
    }

    private function setEntityId(object $entity, int $id): void
    {
        $ref = new \ReflectionClass($entity);
        if (!$ref->hasProperty('id')) {
            return;
        }

        $prop = $ref->getProperty('id');
        $prop->setAccessible(true);
        $prop->setValue($entity, $id);
    }
}
