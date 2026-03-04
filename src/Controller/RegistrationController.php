<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Medecin;
use App\Form\RegistrationFormType;
use App\Form\MedecinRegistrationFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

class RegistrationController extends AbstractController
{
    #[Route('/register', name: 'app_register')]
    public function register(Request $request, UserPasswordHasherInterface $userPasswordHasher, EntityManagerInterface $entityManager): Response
    {
        // Redirect logged-in users to dashboard
        if ($this->getUser()) {
            return $this->redirectToRoute('app_dashboard');
        }

        $user = new User();
        $form = $this->createForm(RegistrationFormType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Vérifier que les mots de passe correspondent
            $plainPassword = $form->get('plainPassword')->getData();
            $confirmPassword = $form->get('confirmPassword')->getData();
            
            if ($plainPassword !== $confirmPassword) {
                $this->addFlash('error', 'Les mots de passe ne correspondent pas');
                return $this->render('registration/register.html.twig', [
                    'registrationForm' => $form->createView(),
                ]);
            }
            
            // encode the plain password
            $user->setPassword(
                $userPasswordHasher->hashPassword(
                    $user,
                    $plainPassword
                )
            );

            // Vérifier si l'utilisateur est un médecin
            $isMedecin = $form->get('isMedecin')->getData();
            
            if ($isMedecin) {
                // Store data in session and redirect to doctor registration
                $request->getSession()->set('medecin_registration_data', [
                    'nom' => $user->getNom(),
                    'prenom' => $user->getPrenom(),
                    'username' => $user->getUsername(),
                    'email' => $user->getEmail(),
                    'numero' => $user->getNumero(),
                    'plainPassword' => $plainPassword,
                ]);

                return $this->redirectToRoute('app_medecin_register');
            } else {
                // C'est un utilisateur normal
                // Roles are automatically set to ['ROLE_USER'] in User::getRoles()
                
                $entityManager->persist($user);
                $entityManager->flush();
                
                // Rediriger vers la page d'accueil avec un message de succès
                $this->addFlash('success', 'Votre compte a été créé avec succès. Vous pouvez maintenant vous connecter.');
                return $this->redirectToRoute('app_home');
            }
        }

        return $this->render('registration/register.html.twig', [
            'registrationForm' => $form->createView(),
        ]);
    }

    #[Route('/medecin/register', name: 'app_medecin_register')]
    public function medecinRegister(Request $request, UserPasswordHasherInterface $userPasswordHasher, EntityManagerInterface $entityManager, SessionInterface $session): Response
    {
        // Redirect logged-in users to dashboard
        if ($this->getUser()) {
            return $this->redirectToRoute('app_dashboard');
        }

        // Retrieve data from session
        $data = $session->get('medecin_registration_data');
        
        if (!$data) {
            $this->addFlash('error', 'Veuillez commencer par la première étape de l\'inscription.');
            return $this->redirectToRoute('app_register');
        }

        $medecin = new Medecin();
        $medecin->setNom($data['nom'] ?? '');
        $medecin->setPrenom($data['prenom'] ?? '');
        $medecin->setUsername($data['username'] ?? null);
        $medecin->setEmail($data['email'] ?? '');
        $medecin->setNumero($data['numero'] ?? '');

        $form = $this->createForm(MedecinRegistrationFormType::class, $medecin);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Use the password from the first step
            $plainPassword = $data['plainPassword'];
            
            $medecin->setPassword(
                $userPasswordHasher->hashPassword(
                    $medecin,
                    $plainPassword
                )
            );

            // Handle photo upload
            $photoFile = $form->get('photo')->getData();
            if ($photoFile) {
                $photoFilename = uniqid() . '.' . $photoFile->guessExtension();
                $photoFile->move($this->getParameter('uploads_directory'), $photoFilename);
                $medecin->setPhoto('/uploads/' . $photoFilename);
            }

            // Handle certificate upload
            $certificateFile = $form->get('certificate')->getData();
            if ($certificateFile) {
                $certificateFilename = uniqid() . '.' . $certificateFile->guessExtension();
                $certificateFile->move($this->getParameter('uploads_directory'), $certificateFilename);
                $medecin->setCertificate('/uploads/' . $certificateFilename);
            }

            // Set role - roles are automatically set to ['ROLE_MEDECIN', 'ROLE_USER'] in Medecin::getRoles()
            $medecin->setIsVerified(false); // En attente de vérification

            $entityManager->persist($medecin);
            $entityManager->flush();
            
            // Clear session data
            $session->remove('medecin_registration_data');
            
            // Add success message and redirect to home page
            $this->addFlash('success', 'Votre inscription en tant que médecin a été soumise avec succès. Votre compte sera vérifié par l\'administrateur dans les plus brefs délais.');
            return $this->redirectToRoute('app_home');
        }

        return $this->render('registration/medecin_register.html.twig', [
            'registrationForm' => $form->createView(),
            'nom' => $data['nom'] ?? '',
            'prenom' => $data['prenom'] ?? '',
            'email' => $data['email'] ?? '',
        ]);
    }

    #[Route('/clear-registration-message', name: 'app_clear_registration_message')]
    public function clearRegistrationMessage(SessionInterface $session): Response
    {
        $session->remove('show_registration_message');
        return new Response('OK');
    }

    #[Route('/medecin/verification', name: 'app_medecin_verification')]
    public function medecinVerification(): Response
    {
        return $this->render('registration/medecin_verification.html.twig');
    }
}
