<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProfileController extends AbstractController
{
    #[Route('/profile', name: 'app_profile')]
    public function index(): Response
    {
        $user = $this->getUser();
        
        if (!$user) {
            return $this->redirectToRoute('app_login');
        }
        
        return $this->render('frontend/profile.html.twig', [
            'user' => $user,
        ]);
    }
    
    #[Route('/medecin/edit-profile', name: 'app_medecin_edit_profile')]
    public function editProfile(): Response
    {
        $user = $this->getUser();
        
        if (!$user) {
            return $this->redirectToRoute('app_login');
        }
        
        // Check if user is a doctor
        if (!in_array('ROLE_MEDECIN', $user->getRoles())) {
            return $this->redirectToRoute('app_profile');
        }
        
        return $this->render('frontend/medecin_profile.html.twig', [
            'medecin' => $user,
        ]);
    }
}
