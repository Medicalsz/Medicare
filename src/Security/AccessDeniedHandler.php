<?php

namespace App\Security;

use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Security\Http\Authorization\AccessDeniedHandlerInterface;

class AccessDeniedHandler implements AccessDeniedHandlerInterface
{
    public function __construct(
        private readonly TokenStorageInterface $tokenStorage,
        private readonly UrlGeneratorInterface $urlGenerator,
    ) {
    }

    public function handle(Request $request, \Throwable $accessDeniedException): ?Response
    {
        $user = $this->tokenStorage->getToken()?->getUser();
        if (!is_object($user) || !method_exists($user, 'getRoles')) {
            return null;
        }

        $roles = $user->getRoles();
        $path = $request->getPathInfo();

        if (!in_array('ROLE_ADMIN', $roles, true) && (str_starts_with($path, '/admin') || str_starts_with($path, '/dashboard'))) {
            return new RedirectResponse($this->urlGenerator->generate('app_user_forum_index'));
        }

        return null;
    }
}
