<?php

namespace App\Security;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Http\Authenticator\AbstractLoginFormAuthenticator;
use Symfony\Component\Security\Http\Authenticator\Passport\Passport;
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\UserBadge;
use Symfony\Component\Security\Http\Authenticator\Passport\Credentials\PasswordCredentials;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\Security\Core\Exception\CustomUserMessageAuthenticationException;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\User;
use App\Entity\Medecin;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class CustomAuthenticator extends AbstractLoginFormAuthenticator
{
    private EntityManagerInterface $entityManager;
    private RouterInterface $router;
    private UserPasswordHasherInterface $passwordHasher;

    public function __construct(EntityManagerInterface $entityManager, RouterInterface $router, UserPasswordHasherInterface $passwordHasher)
    {
        $this->entityManager = $entityManager;
        $this->router = $router;
        $this->passwordHasher = $passwordHasher;
    }

    public function authenticate(Request $request): Passport
    {
        $username = $request->request->get('_username', '');
        $password = $request->request->get('_password', '');

        if (empty($username) || empty($password)) {
            throw new CustomUserMessageAuthenticationException('Email ou mot de passe incorrect');
        }

        $userIdentifier = null;
        $loggedInUser = null;

        // Try to find in User repository (Patients)
        $user = $this->entityManager->getRepository(User::class)->findOneBy(['email' => $username]);
        if (!$user) {
            $user = $this->entityManager->getRepository(User::class)->findOneBy(['username' => $username]);
        }

        // If found in User repository
        if ($user) {
            if (!$this->passwordHasher->isPasswordValid($user, $password)) {
                throw new CustomUserMessageAuthenticationException('Email ou mot de passe incorrect');
            }
            $userIdentifier = $user->getUsername() ?? $user->getEmail();
            return new Passport(
                new UserBadge($userIdentifier, function($identifier) {
                    $u = $this->entityManager->getRepository(User::class)->findOneBy(['username' => $identifier]);
                    return $u ?: $this->entityManager->getRepository(User::class)->findOneBy(['email' => $identifier]);
                }),
                new PasswordCredentials($password)
            );
        }

        // Try to find in Medecin repository (Doctors)
        $medecin = $this->entityManager->getRepository(Medecin::class)->findOneBy(['email' => $username]);
        if (!$medecin) {
            $medecin = $this->entityManager->getRepository(Medecin::class)->findOneBy(['username' => $username]);
        }

        if ($medecin) {
            if (!$this->passwordHasher->isPasswordValid($medecin, $password)) {
                throw new CustomUserMessageAuthenticationException('Email ou mot de passe incorrect');
            }
            $userIdentifier = $medecin->getUsername() ?? $medecin->getEmail();
            return new Passport(
                new UserBadge($userIdentifier, function($identifier) {
                    $m = $this->entityManager->getRepository(Medecin::class)->findOneBy(['username' => $identifier]);
                    return $m ?: $this->entityManager->getRepository(Medecin::class)->findOneBy(['email' => $identifier]);
                }),
                new PasswordCredentials($password)
            );
        }

        throw new CustomUserMessageAuthenticationException('Email ou mot de passe incorrect');
    }

    public function onAuthenticationSuccess(Request $request, $token, string $firewallName): ?Response
    {
        $user = $token->getUser();
        
        // Check if the logged-in user is a medecin and not verified
        if ($user instanceof Medecin && !$user->isVerified()) {
            // Set flash message to show on home page
            $request->getSession()->getFlashBag()->add('warning', 'Votre compte est en cours de vérification. Vous pourrez accéder à toutes les fonctionnalités une fois approuvé par l\'administrateur.');
        }

        // Redirect to dashboard based on role
        if (in_array('ROLE_ADMIN', $user->getRoles())) {
            return new Response(
                $this->router->generate('app_admin_dashboard')
            );
        }

        // Redirect to home page on successful login
        return new Response(
            $this->router->generate('app_home')
        );
    }

    protected function getLoginUrl(Request $request): string
    {
        return $this->router->generate('app_login');
    }
}
