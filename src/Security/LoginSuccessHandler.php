<?php

namespace App\Security;

use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationSuccessHandlerInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use App\Entity\User;
use App\Entity\Medecin;
use App\Entity\Admin;

class LoginSuccessHandler implements AuthenticationSuccessHandlerInterface
{
    private UrlGeneratorInterface $urlGenerator;

    public function __construct(UrlGeneratorInterface $urlGenerator)
    {
        $this->urlGenerator = $urlGenerator;
    }

    public function onAuthenticationSuccess(Request $request, TokenInterface $token): Response
    {
        $user = $token->getUser();
        $session = $request->getSession();

        // Redirect based on user type
        if ($user instanceof Admin) {
            // Admin goes to admin dashboard
            return new RedirectResponse($this->urlGenerator->generate('app_admin_dashboard'));
        } elseif ($user instanceof Medecin) {
            // Check if doctor is verified
            if (!$user->isVerified()) {
                // Doctor is not verified - redirect to verification page
                $session->getFlashBag()->add('warning', 'Votre compte est en attente de vérification. Notre équipe va examiner votre demande sous 24-48 heures.');
                return new RedirectResponse($this->urlGenerator->generate('app_medecin_verification'));
            }
            // Verified doctor goes to their dashboard
            return new RedirectResponse($this->urlGenerator->generate('app_dashboard'));
        } elseif ($user instanceof User) {
            // Regular user goes to explore page
            return new RedirectResponse($this->urlGenerator->generate('app_explore'));
        }

        // Default fallback
        return new RedirectResponse($this->urlGenerator->generate('app_home'));
    }
}
