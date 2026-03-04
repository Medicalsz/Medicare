<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserSettingsFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractController
{
    #[Route('/dashboard', name: 'app_dashboard')]
    public function index(): Response
    {
        // Vérifier que l'utilisateur est connecté
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        return $this->render('dashboard/index.html.twig');
    }


    #[Route('/settings', name: 'app_settings', methods: ['GET', 'POST'])]
    public function settings(Request $request, EntityManagerInterface $entityManager): Response
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        
        $user = $this->getUser();
        if (!$user) return $this->redirectToRoute('app_login');

        $formType = ($user instanceof \App\Entity\Medecin) ? \App\Form\MedecinUserSettingsType::class : \App\Form\UserSettingsFormType::class;
        $form = $this->createForm($formType, $user);
        $form->handleRequest($request);

        $message = null;
        if ($form->isSubmitted() && $form->isValid()) {
            try {
                // Handle cropped photo (base64)
                $croppedPhoto = $request->request->get('cropped_photo');
                if ($croppedPhoto) {
                    // Extract data from base64 string
                    if (preg_match('/^data:image\/(\w+);base64,/', $croppedPhoto, $type)) {
                        $data = substr($croppedPhoto, strpos($croppedPhoto, ',') + 1);
                        $type = strtolower($type[1]); // jpg, png, etc

                        if (in_array($type, ['jpg', 'jpeg', 'png', 'gif', 'webp'])) {
                            $data = base64_decode($data);
                            if ($data !== false) {
                                $newFilename = uniqid() . '.' . $type;
                                $uploadPath = $this->getParameter('profile_photos_directory');
                                file_put_contents($uploadPath . '/' . $newFilename, $data);
                                $user->setPhoto('/uploads/profile_photos/' . $newFilename);
                            }
                        }
                    }
                } else {
                    /** @var \Symfony\Component\HttpFoundation\File\UploadedFile|null $photoFile */
                    $photoFile = $form->get('photo')->getData();
                    if ($photoFile) {
                        $newFilename = uniqid() . '.' . $photoFile->guessExtension();
                        $photoFile->move($this->getParameter('profile_photos_directory'), $newFilename);
                        $user->setPhoto('/uploads/profile_photos/' . $newFilename);
                    }
                }

                $entityManager->flush();
                $message = 'Your profile has been updated successfully!';
            } catch (\Exception $e) {
                $message = 'An error occurred while updating your profile. Please try again.';
            }
        }

        return $this->render('dashboard/settings.html.twig', [
            'form' => $form,
            'message' => $message,
        ]);
    }

    #[Route('/settings/delete-account', name: 'app_delete_account', methods: ['POST'])]
    public function deleteAccount(Request $request, EntityManagerInterface $entityManager): Response
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        
        $user = $this->getUser();
        
        // Verify confirmation
        $confirmation = $request->request->get('confirmation');

        if ($confirmation !== 'DELETE') {
            $this->addFlash('error', 'Please confirm account deletion by typing DELETE.');
            return $this->redirectToRoute('app_settings');
        }

        try {
            // Delete the user
            $entityManager->remove($user);
            $entityManager->flush();

            // Logout the user
            return $this->redirectToRoute('app_logout');
        } catch (\Exception $e) {
            $this->addFlash('error', 'An error occurred while deleting your account.');
            return $this->redirectToRoute('app_settings');
        }
    }

    #[Route('/appointments', name: 'app_appointments')]
    public function appointments(): Response
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        
        // TODO: Créer la page rendez-vous
        return new Response('Page rendez-vous - À développer');
    }

    #[Route('/cabinets', name: 'app_cabinets')]
    public function cabinets(): Response
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        
        // TODO: Créer la page cabinets
        return new Response('Page cabinets - À développer');
    }

    #[Route('/consultations', name: 'app_consultations')]
    public function consultations(): Response
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        
        // TODO: Créer la page consultations
        return new Response('Page consultations - À développer');
    }

    #[Route('/demande-medecin', name: 'app_demande_medecin')]
    public function demandeMedecin(): Response
    {
        $this->denyAccessUnlessGranted('ROLE_PATIENT');
        
        // TODO: Créer le formulaire de demande médecin
        return new Response('Formulaire demande médecin - À développer');
    }
}
