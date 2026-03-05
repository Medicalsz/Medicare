<?php

namespace App\Controller;

use App\Entity\Admin;
use App\Entity\Medecin;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use App\Form\AdminType;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;


#[Route('/admin', name: 'app_admin_')]
#[IsGranted('ROLE_ADMIN')]
class AdminController extends AbstractController
{
    #[Route('', name: 'index')]
    public function index(): Response
    {
        return $this->redirectToRoute('app_admin_dashboard');
    }

    #[Route('/dashboard', name: 'dashboard')]
    public function dashboard(EntityManagerInterface $entityManager): Response
    {
        // Statistics
        $totalUsers = $entityManager->getRepository(User::class)->count([]);
        $totalMedecins = $entityManager->getRepository(Medecin::class)->count([]);
        $totalAdmins = $entityManager->getRepository(Admin::class)->count([]);

        $activeMedecins = $entityManager->getRepository(Medecin::class)->count(['isVerified' => true]);
        $unverifiedMedecins = $entityManager->getRepository(Medecin::class)->findBy(['isVerified' => false]);
        $unverifiedCount = count($unverifiedMedecins);

        // Moyen age calculation
        $allBornUsers = $entityManager->createQuery('SELECT u.dateNaissance FROM App\Entity\User u WHERE u.dateNaissance IS NOT NULL')->getResult();
        $allBornMedecins = $entityManager->createQuery('SELECT m.dateNaissance FROM App\Entity\Medecin m WHERE m.dateNaissance IS NOT NULL')->getResult();
        
        $totalAge = 0;
        $countAge = 0;
        $now = new \DateTime();

        foreach (array_merge($allBornUsers, $allBornMedecins) as $born) {
            $date = $born['dateNaissance'];
            if ($date) {
                $age = $now->diff($date)->y;
                $totalAge += $age;
                $countAge++;
            }
        }
        $avgAge = $countAge > 0 ? round($totalAge / $countAge, 1) : 0;

        // Classification par spécialisation
        $specs = $entityManager->createQuery('SELECT m.specialite, COUNT(m.id) as count FROM App\Entity\Medecin m GROUP BY m.specialite')->getResult();

        return $this->render('admin/dashboard.html.twig', [
            'total_users_count' => $totalUsers + $totalMedecins + $totalAdmins,
            'total_medecins' => $totalMedecins,
            'total_patients' => $totalUsers,
            'active_medecins' => $activeMedecins,
            'unverified_medecins' => $unverifiedMedecins,
            'unverified_count' => $unverifiedCount,
            'avg_age' => $avgAge,
            'specialisations' => $specs
        ]);
    }

    #[Route('/verify-all-medecins', name: 'verify_all_medecins', methods: ['POST'])]
    public function verifyAllMedecins(EntityManagerInterface $entityManager): Response
    {
        $unverified = $entityManager->getRepository(Medecin::class)->findBy(['isVerified' => false]);
        foreach ($unverified as $medecin) {
            $medecin->setIsVerified(true);
        }
        $entityManager->flush();

        $this->addFlash('success', count($unverified) . ' médecins ont été vérifiés avec succès.');
        return $this->redirectToRoute('app_admin_dashboard');
    }

    #[Route('/users', name: 'users_list')]
    public function listUsers(EntityManagerInterface $entityManager): Response
    {
        $users = $entityManager->getRepository(User::class)->findAll();
        $medecins = $entityManager->getRepository(Medecin::class)->findAll();
        $admins = $entityManager->getRepository(Admin::class)->findAll();

        return $this->render('admin/users/index.html.twig', [
            'users' => $users,
            'medecins' => $medecins,
            'admins' => $admins,
        ]);
    }

    #[Route('/medecins/{id}/verify', name: 'medecins_verify', methods: ['GET'])]
    public function verifyMedecin(Medecin $medecin, EntityManagerInterface $entityManager): Response
    {
        $medecin->setIsVerified(true);
        $entityManager->flush();
        $this->addFlash('success', 'Médecin approuvé avec succès.');
        return $this->redirectToRoute('app_admin_users_list');
    }

    #[Route('/medecins/{id}/unverify', name: 'medecins_unverify', methods: ['GET'])]
    public function unverifyMedecin(Medecin $medecin, EntityManagerInterface $entityManager): Response
    {
        $medecin->setIsVerified(false);
        $entityManager->flush();
        $this->addFlash('warning', 'Approbation du médecin révoquée.');
        return $this->redirectToRoute('app_admin_users_list');
    }

    #[Route('/add-admin', name: 'add')]
    public function addAdmin(Request $request, UserPasswordHasherInterface $userPasswordHasher, EntityManagerInterface $entityManager): Response
    {
        $admin = new Admin();
        $form = $this->createForm(AdminType::class, $admin);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $admin->setPassword(
                $userPasswordHasher->hashPassword(
                    $admin,
                    $form->get('plainPassword')->getData()
                )
            );

            $admin->setRoles(['ROLE_ADMIN']);
            $entityManager->persist($admin);
            $entityManager->flush();

            $this->addFlash('success', 'Administrateur créé avec succès.');
            return $this->redirectToRoute('app_admin_users_list');
        }

        return $this->render('admin/add_admin.html.twig', [
            'registrationForm' => $form->createView(),
        ]);
    }

    #[Route('/notifications', name: 'notifications')]
    public function notifications(EntityManagerInterface $entityManager): Response
    {
        $unverifiedCount = $entityManager->getRepository(Medecin::class)->count(['isVerified' => false]);
        
        return $this->render('admin/notifications.html.twig', [
            'unverified_count' => $unverifiedCount
        ]);
    }
}
