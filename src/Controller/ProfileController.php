<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserSettingsFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;

class ProfileController extends AbstractController
{
    #[Route('/profile', name: 'app_profile')]
    public function index(): Response
    {
        $user = $this->getUser();
        
        if (!$user) {
            return $this->redirectToRoute('app_login');
        }

        if ($user instanceof \App\Entity\Medecin) {
            return $this->render('frontend/medecin_profile.html.twig', [
                'medecin' => $user,
            ]);
        }
        
        return $this->render('frontend/profile.html.twig', [
            'user' => $user,
        ]);
    }

    #[Route('/profile/edit', name: 'app_profile_edit')]
    public function edit(Request $request, EntityManagerInterface $entityManager, SluggerInterface $slugger): Response
    {
        $user = $this->getUser();

        if (!$user) {
            return $this->redirectToRoute('app_login');
        }

        // Choose form based on entity type
        $formType = ($user instanceof \App\Entity\Medecin) ? \App\Form\MedecinUserSettingsType::class : \App\Form\UserSettingsFormType::class;
        $form = $this->createForm($formType, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $croppedImage = $request->request->get('cropped_image');

            if ($croppedImage) {
                $data = explode(',', $croppedImage);
                if (count($data) > 1) {
                    $decodedImage = base64_decode($data[1]);
                    $newFilename  = 'profile-' . uniqid() . '.jpg';
                    $uploadDir    = $this->getParameter('profile_photos_directory');

                    if (!is_dir($uploadDir)) {
                        mkdir($uploadDir, 0777, true);
                    }

                    file_put_contents($uploadDir . '/' . $newFilename, $decodedImage);
                    $user->setPhoto('/uploads/profile_photos/' . $newFilename);
                }
            } else {
                /** @var \Symfony\Component\HttpFoundation\File\UploadedFile|null $photoFile */
                $photoFile = $form->get('photo')->getData();
                if ($photoFile) {
                    $safeFilename = $slugger->slug(pathinfo($photoFile->getClientOriginalName(), PATHINFO_FILENAME));
                    $newFilename  = $safeFilename . '-' . uniqid() . '.' . $photoFile->guessExtension();
                    try {
                        $photoFile->move($this->getParameter('profile_photos_directory'), $newFilename);
                        $user->setPhoto('/uploads/profile_photos/' . $newFilename);
                    } catch (FileException $e) {
                        $this->addFlash('error', 'Erreur lors de l\'upload de la photo.');
                    }
                }
            }

            $entityManager->flush();
            $this->addFlash('success', 'Votre profil a été mis à jour avec succès.');

            return $this->redirectToRoute('app_profile');
        }

        return $this->render('frontend/edit_profile.html.twig', [
            'form' => $form->createView(),
            'user' => $user,
        ]);
    }

    #[Route('/{username}', name: 'app_profile_public', priority: -10)]
    public function showPublicProfile(string $username, EntityManagerInterface $entityManager): Response
    {
        // Try User repository first (Patients)
        $user = $entityManager->getRepository(User::class)->findOneBy(['username' => $username]);

        // If not found, try Medecin repository (Doctors)
        if (!$user) {
            $user = $entityManager->getRepository(\App\Entity\Medecin::class)->findOneBy(['username' => $username]);
        }

        if (!$user) {
            throw $this->createNotFoundException('Utilisateur introuvable.');
        }

        if ($user instanceof \App\Entity\Medecin) {
            return $this->render('frontend/medecin_profile.html.twig', [
                'medecin' => $user,
            ]);
        }

        return $this->render('frontend/profile.html.twig', [
            'user' => $user,
        ]);
    }
}
