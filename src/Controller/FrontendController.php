<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FrontendController extends AbstractController
{
    #[Route('/about', name: 'app_about')]
    public function about(): Response
    {
        return $this->render('frontend/about.html.twig');
    }

    #[Route('/services', name: 'app_services')]
    public function services(): Response
    {
        return $this->render('frontend/services.html.twig');
    }

    #[Route('/departments', name: 'app_departments')]
    public function departments(): Response
    {
        return $this->render('frontend/departments.html.twig');
    }

    #[Route('/doctors', name: 'app_doctors')]
    public function doctors(): Response
    {
        return $this->render('frontend/doctors.html.twig');
    }

    #[Route('/department/{id}', name: 'app_department_details', requirements: ['id' => '\d+'])]
    public function departmentDetails(int $id): Response
    {
        return $this->render('frontend/department-details.html.twig', [
            'departmentId' => $id,
        ]);
    }

    #[Route('/service/{id}', name: 'app_service_details', requirements: ['id' => '\d+'])]
    public function serviceDetails(int $id): Response
    {
        return $this->render('frontend/service-details.html.twig', [
            'serviceId' => $id,
        ]);
    }

    #[Route('/appointment', name: 'app_appointment')]
    public function appointment(): Response
    {
        return $this->render('frontend/appointment.html.twig');
    }

    #[Route('/testimonials', name: 'app_testimonials')]
    public function testimonials(): Response
    {
        return $this->render('frontend/testimonials.html.twig');
    }

    #[Route('/faq', name: 'app_faq')]
    public function faq(): Response
    {
        return $this->render('frontend/faq.html.twig');
    }

    #[Route('/gallery', name: 'app_gallery')]
    public function gallery(): Response
    {
        return $this->render('frontend/gallery.html.twig');
    }

    #[Route('/contact', name: 'app_contact')]
    public function contact(): Response
    {
        return $this->render('frontend/contact.html.twig');
    }

    #[Route('/terms', name: 'app_terms')]
    public function terms(): Response
    {
        return $this->render('frontend/terms.html.twig');
    }

    #[Route('/privacy', name: 'app_privacy')]
    public function privacy(): Response
    {
        return $this->render('frontend/privacy.html.twig');
    }
}
