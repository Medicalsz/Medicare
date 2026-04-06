<?php

namespace App\Controller;

use App\Entity\Notification;
use App\Entity\User;
use App\Repository\NotificationRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/notifications', name: 'app_notifications_')]
class NotificationController extends AbstractController
{
    #[Route('', name: 'index', methods: ['GET'])]
    public function index(NotificationRepository $notificationRepository): Response
    {
        $this->denyAccessUnlessGranted('ROLE_USER');

        $user = $this->getUser();
        if (!$user instanceof User) {
            throw $this->createAccessDeniedException();
        }

        $notifications = $notificationRepository->findAllForUser($user);
        $template = $this->isGranted('ROLE_ADMIN')
            ? 'notifications/index_admin.html.twig'
            : 'notifications/index_user.html.twig';

        return $this->render($template, [
            'notifications' => $notifications,
        ]);
    }

    #[Route('/{id}/read', name: 'read', methods: ['POST'])]
    public function read(int $id, Request $request, NotificationRepository $notificationRepository, EntityManagerInterface $entityManager): Response
    {
        $this->denyAccessUnlessGranted('ROLE_USER');

        $user = $this->getUser();
        if (!$user instanceof User) {
            throw $this->createAccessDeniedException();
        }

        $notification = $notificationRepository->find($id);
        if (!$notification instanceof Notification) {
            throw new NotFoundHttpException('Notification introuvable.');
        }
        if ($notification->getRecipient()?->getId() !== $user->getId()) {
            throw $this->createAccessDeniedException();
        }

        if ($this->isCsrfTokenValid('notification_read_' . $notification->getId(), (string) $request->request->get('_token'))) {
            $notification->setIsRead(true);
            $entityManager->flush();
        }

        $referer = (string) $request->headers->get('referer');
        if ($referer !== '') {
            return $this->redirect($referer);
        }

        return $this->redirectToRoute('app_notifications_index');
    }

    #[Route('/read-all', name: 'read_all', methods: ['POST'])]
    public function readAll(Request $request, NotificationRepository $notificationRepository): Response
    {
        $this->denyAccessUnlessGranted('ROLE_USER');

        $user = $this->getUser();
        if (!$user instanceof User) {
            throw $this->createAccessDeniedException();
        }

        if ($this->isCsrfTokenValid('notifications_read_all', (string) $request->request->get('_token'))) {
            $notificationRepository->markAllAsReadForUser($user);
        }

        $referer = (string) $request->headers->get('referer');
        if ($referer !== '') {
            return $this->redirect($referer);
        }

        return $this->redirectToRoute('app_notifications_index');
    }
}

