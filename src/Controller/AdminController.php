<?php

namespace App\Controller;

use App\Entity\Consultation;
use App\Entity\DemandeMedecin;
use App\Entity\Disponibilite;
use App\Entity\Medecin;
use App\Entity\Patient;
use App\Entity\RendezVous;
use App\Entity\Specialite;
use App\Entity\User;
use App\Enum\StatutDemandeMedecin;
use App\Repository\SpecialiteRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin', name: 'app_admin_')]
class AdminController extends AbstractController
{
    #[Route('/dashboard', name: 'dashboard')]
    public function dashboard(): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');

        return $this->render('admin/dashboard.html.twig');
    }

    #[Route('/medecins', name: 'medecins', methods: ['GET'])]
    public function medecins(EntityManagerInterface $entityManager): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');

        $medecins = $entityManager->getRepository(Medecin::class)->findBy([], ['id' => 'DESC']);
        $demandes = $entityManager->getRepository(DemandeMedecin::class)->findBy([], ['dateDemande' => 'DESC']);
        $demandesAcceptees = $entityManager->getRepository(DemandeMedecin::class)->findBy(
            ['statut' => StatutDemandeMedecin::ACCEPTEE],
            ['dateTraitement' => 'DESC']
        );

        return $this->render('admin/medecins.html.twig', [
            'medecins' => $medecins,
            'demandes' => $demandes,
            'demandesAcceptees' => $demandesAcceptees,
        ]);
    }

    #[Route('/utilisateurs', name: 'users', methods: ['GET'])]
    public function users(EntityManagerInterface $entityManager): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');

        $users = $entityManager->getRepository(User::class)->findBy([], ['id' => 'DESC']);
        $patientRepository = $entityManager->getRepository(Patient::class);
        $medecinRepository = $entityManager->getRepository(Medecin::class);
        $demandeRepository = $entityManager->getRepository(DemandeMedecin::class);

        $userMeta = [];
        foreach ($users as $user) {
            $userId = $user->getId();
            if ($userId === null) {
                continue;
            }

            $patient = $patientRepository->findOneBy(['user' => $user]);
            $medecin = $medecinRepository->findOneBy(['user' => $user]);
            $userMeta[$userId] = [
                'isPatient' => $patient !== null,
                'isMedecin' => $medecin !== null,
                'demandesCount' => $demandeRepository->count(['user' => $user]),
            ];
        }

        return $this->render('admin/users.html.twig', [
            'users' => $users,
            'userMeta' => $userMeta,
        ]);
    }

    #[Route('/utilisateurs/{id}', name: 'show_user', methods: ['GET'])]
    public function showUser(int $id, EntityManagerInterface $entityManager): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');

        $user = $entityManager->getRepository(User::class)->find($id);
        if (!$user) {
            throw $this->createNotFoundException('Utilisateur introuvable.');
        }

        $patient = $entityManager->getRepository(Patient::class)->findOneBy(['user' => $user]);
        $medecin = $entityManager->getRepository(Medecin::class)->findOneBy(['user' => $user]);

        $stats = [
            'demandesCount' => $entityManager->getRepository(DemandeMedecin::class)->count(['user' => $user]),
            'patientRendezVousCount' => 0,
            'patientConsultationsCount' => 0,
            'medecinRendezVousCount' => 0,
            'medecinConsultationsCount' => 0,
            'medecinDisponibilitesCount' => 0,
        ];

        if ($patient) {
            $stats['patientRendezVousCount'] = $entityManager->getRepository(RendezVous::class)->count(['patient' => $patient]);
            $stats['patientConsultationsCount'] = $entityManager->getRepository(Consultation::class)->count(['patient' => $patient]);
        }

        if ($medecin) {
            $stats['medecinRendezVousCount'] = $entityManager->getRepository(RendezVous::class)->count(['medecin' => $medecin]);
            $stats['medecinConsultationsCount'] = $entityManager->getRepository(Consultation::class)->count(['medecin' => $medecin]);
            $stats['medecinDisponibilitesCount'] = $entityManager->getRepository(Disponibilite::class)->count(['medecin' => $medecin]);
        }

        return $this->render('admin/user_show.html.twig', [
            'user' => $user,
            'patient' => $patient,
            'medecin' => $medecin,
            'stats' => $stats,
        ]);
    }

    #[Route('/utilisateurs/{id}/supprimer', name: 'delete_user', methods: ['POST'])]
    public function deleteUser(int $id, EntityManagerInterface $entityManager): RedirectResponse
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');

        $user = $entityManager->getRepository(User::class)->find($id);
        if (!$user) {
            throw $this->createNotFoundException('Utilisateur introuvable.');
        }

        /** @var User|null $currentUser */
        $currentUser = $this->getUser();
        if ($currentUser && $currentUser->getId() === $user->getId()) {
            $this->addFlash('error', 'Suppression impossible: vous ne pouvez pas supprimer votre propre compte.');
            return $this->redirectToRoute('app_admin_users');
        }

        $patientRepository = $entityManager->getRepository(Patient::class);
        $medecinRepository = $entityManager->getRepository(Medecin::class);
        $demandeRepository = $entityManager->getRepository(DemandeMedecin::class);
        $rdvRepository = $entityManager->getRepository(RendezVous::class);
        $consultationRepository = $entityManager->getRepository(Consultation::class);
        $disponibiliteRepository = $entityManager->getRepository(Disponibilite::class);

        $blockingReasons = [];
        $patient = $patientRepository->findOneBy(['user' => $user]);
        $medecin = $medecinRepository->findOneBy(['user' => $user]);
        $demandesCount = $demandeRepository->count(['user' => $user]);

        if ($demandesCount > 0) {
            $blockingReasons[] = sprintf('%d demande(s) medecin associee(s)', $demandesCount);
        }

        if ($patient) {
            $patientRdvCount = $rdvRepository->count(['patient' => $patient]);
            $patientConsultCount = $consultationRepository->count(['patient' => $patient]);
            if ($patientRdvCount > 0) {
                $blockingReasons[] = sprintf('%d rendez-vous patient', $patientRdvCount);
            }
            if ($patientConsultCount > 0) {
                $blockingReasons[] = sprintf('%d consultation(s) patient', $patientConsultCount);
            }
        }

        if ($medecin) {
            $medecinRdvCount = $rdvRepository->count(['medecin' => $medecin]);
            $medecinConsultCount = $consultationRepository->count(['medecin' => $medecin]);
            if ($medecinRdvCount > 0) {
                $blockingReasons[] = sprintf('%d rendez-vous medecin', $medecinRdvCount);
            }
            if ($medecinConsultCount > 0) {
                $blockingReasons[] = sprintf('%d consultation(s) medecin', $medecinConsultCount);
            }
        }

        if (!empty($blockingReasons)) {
            $this->addFlash(
                'error',
                'Suppression impossible: ce compte contient des donnees liees (' . implode(', ', $blockingReasons) . ').'
            );

            return $this->redirectToRoute('app_admin_users');
        }

        if ($medecin) {
            $disponibilites = $disponibiliteRepository->findBy(['medecin' => $medecin]);
            foreach ($disponibilites as $disponibilite) {
                $entityManager->remove($disponibilite);
            }
            $entityManager->remove($medecin);
        }

        if ($patient) {
            $entityManager->remove($patient);
        }

        $entityManager->remove($user);
        $entityManager->flush();

        $this->addFlash('success', 'Utilisateur supprime avec succes.');

        return $this->redirectToRoute('app_admin_users');
    }

    #[Route('/rendez-vous', name: 'rendez_vous', methods: ['GET'])]
    public function rendezVous(EntityManagerInterface $entityManager): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');

        $rendezVous = $entityManager->createQueryBuilder()
            ->select('r', 'p', 'pu', 'm', 'mu', 's')
            ->from(RendezVous::class, 'r')
            ->leftJoin('r.patient', 'p')
            ->leftJoin('p.user', 'pu')
            ->leftJoin('r.medecin', 'm')
            ->leftJoin('m.user', 'mu')
            ->leftJoin('m.specialiteRef', 's')
            ->orderBy('r.id', 'DESC')
            ->getQuery()
            ->getResult();

        return $this->render('admin/rendez_vous.html.twig', [
            'rendezVous' => $rendezVous,
        ]);
    }

    #[Route('/specialites', name: 'specialites', methods: ['GET'])]
    public function specialites(EntityManagerInterface $entityManager): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');

        $specialites = $entityManager->getRepository(Specialite::class)->findBy([], ['nom' => 'ASC']);
        $medecinRepository = $entityManager->getRepository(Medecin::class);
        $demandeRepository = $entityManager->getRepository(DemandeMedecin::class);

        $usageCounts = [];
        foreach ($specialites as $specialite) {
            $specialiteId = $specialite->getId();
            if ($specialiteId === null) {
                continue;
            }

            $usageCounts[$specialiteId] = $medecinRepository->count(['specialiteRef' => $specialite])
                + $demandeRepository->count(['specialiteRef' => $specialite]);
        }

        return $this->render('admin/specialites.html.twig', [
            'specialites' => $specialites,
            'usageCounts' => $usageCounts,
        ]);
    }

    #[Route('/specialites/ajouter', name: 'add_specialite', methods: ['POST'])]
    public function addSpecialite(
        Request $request,
        EntityManagerInterface $entityManager,
        SpecialiteRepository $specialiteRepository
    ): RedirectResponse {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');

        $nom = trim((string) $request->request->get('nom', ''));
        if (mb_strlen($nom) < 2 || mb_strlen($nom) > 120) {
            $this->addFlash('error', 'Nom de specialite invalide (2 a 120 caracteres).');
            return $this->redirectToRoute('app_admin_specialites');
        }

        $existing = $specialiteRepository->findOneByNomInsensitive($nom);
        if ($existing) {
            $this->addFlash('error', 'Cette specialite existe deja.');
            return $this->redirectToRoute('app_admin_specialites');
        }

        $specialite = new Specialite();
        $specialite->setNom($nom);

        $entityManager->persist($specialite);
        $entityManager->flush();

        $this->addFlash('success', 'Specialite ajoutee avec succes.');

        return $this->redirectToRoute('app_admin_specialites');
    }

    #[Route('/specialites/{id}/modifier', name: 'edit_specialite', methods: ['POST'])]
    public function editSpecialite(
        int $id,
        Request $request,
        EntityManagerInterface $entityManager,
        SpecialiteRepository $specialiteRepository
    ): RedirectResponse {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');

        $specialite = $specialiteRepository->find($id);
        if (!$specialite) {
            throw $this->createNotFoundException('Specialite introuvable.');
        }

        $nom = trim((string) $request->request->get('nom', ''));
        if (mb_strlen($nom) < 2 || mb_strlen($nom) > 120) {
            $this->addFlash('error', 'Nom de specialite invalide (2 a 120 caracteres).');
            return $this->redirectToRoute('app_admin_specialites');
        }

        $existing = $specialiteRepository->findOneByNomInsensitive($nom);
        if ($existing && $existing->getId() !== $specialite->getId()) {
            $this->addFlash('error', 'Une autre specialite porte deja ce nom.');
            return $this->redirectToRoute('app_admin_specialites');
        }

        $specialite->setNom($nom);
        $entityManager->flush();

        $this->addFlash('success', 'Specialite modifiee avec succes.');

        return $this->redirectToRoute('app_admin_specialites');
    }

    #[Route('/specialites/{id}/toggle', name: 'toggle_specialite', methods: ['POST'])]
    public function toggleSpecialite(int $id, EntityManagerInterface $entityManager): RedirectResponse
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');

        $specialite = $entityManager->getRepository(Specialite::class)->find($id);
        if (!$specialite) {
            throw $this->createNotFoundException('Specialite introuvable.');
        }

        $specialite->setActive(!$specialite->isActive());
        $entityManager->flush();

        $this->addFlash('success', $specialite->isActive()
            ? 'Specialite activee.'
            : 'Specialite desactivee.');

        return $this->redirectToRoute('app_admin_specialites');
    }

    #[Route('/specialites/{id}/supprimer', name: 'delete_specialite', methods: ['POST'])]
    public function deleteSpecialite(int $id, EntityManagerInterface $entityManager): RedirectResponse
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');

        $specialite = $entityManager->getRepository(Specialite::class)->find($id);
        if (!$specialite) {
            throw $this->createNotFoundException('Specialite introuvable.');
        }

        $medecinCount = $entityManager->getRepository(Medecin::class)->count(['specialiteRef' => $specialite]);
        $demandeCount = $entityManager->getRepository(DemandeMedecin::class)->count(['specialiteRef' => $specialite]);
        if ($medecinCount > 0 || $demandeCount > 0) {
            $this->addFlash('error', 'Suppression impossible: specialite deja utilisee. Desactivez-la plutot.');
            return $this->redirectToRoute('app_admin_specialites');
        }

        $entityManager->remove($specialite);
        $entityManager->flush();

        $this->addFlash('success', 'Specialite supprimee avec succes.');

        return $this->redirectToRoute('app_admin_specialites');
    }

    #[Route('/demandes-medecin/{id}', name: 'show_demande_medecin', methods: ['GET'])]
    public function showDemandeMedecin(int $id, EntityManagerInterface $entityManager): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');

        $demande = $entityManager->getRepository(DemandeMedecin::class)->find($id);
        if (!$demande) {
            throw $this->createNotFoundException('Demande medecin introuvable.');
        }

        $certificats = [];
        $stored = $demande->getCertificats();
        if ($stored) {
            $certificats = array_values(array_filter(array_map('trim', explode(',', $stored))));
        }

        return $this->render('admin/demande_medecin_show.html.twig', [
            'demande' => $demande,
            'certificats' => $certificats,
        ]);
    }

    #[Route('/demandes-medecin/{id}/approuver', name: 'approve_medecin', methods: ['POST'])]
    public function approveMedecin(
        int $id,
        Request $request,
        EntityManagerInterface $entityManager
    ): RedirectResponse {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');

        $demande = $entityManager->getRepository(DemandeMedecin::class)->find($id);
        if (!$demande) {
            throw $this->createNotFoundException('Demande medecin introuvable.');
        }

        if ($demande->isAcceptee()) {
            $this->addFlash('info', 'Cette demande est deja approuvee.');
            return $this->redirectAfterModeration($request, $demande);
        }

        $demande->setStatut(StatutDemandeMedecin::ACCEPTEE);
        $demande->setDateTraitement(new \DateTimeImmutable());

        $user = $demande->getUser();
        if ($user) {
            $roles = $user->getRoles();
            if (!in_array('ROLE_MEDECIN', $roles, true)) {
                $roles[] = 'ROLE_MEDECIN';
            }
            $user->setRoles($roles);

            $medecinRepository = $entityManager->getRepository(Medecin::class);
            $existingMedecin = $medecinRepository->findOneBy(['user' => $user]);
            if (!$existingMedecin) {
                $medecin = new Medecin();
                $medecin->setUser($user);
                $medecin->setSpecialite((string) $demande->getSpecialite());
                $medecin->setSpecialiteRef($demande->getSpecialiteRef());
                $medecin->setCabinet((string) $demande->getCabinet());
                $medecin->setBio($demande->getBio());
                $entityManager->persist($medecin);
            } else {
                $existingMedecin->setSpecialite((string) $demande->getSpecialite());
                $existingMedecin->setSpecialiteRef($demande->getSpecialiteRef());
                $existingMedecin->setCabinet((string) $demande->getCabinet());
                $existingMedecin->setBio($demande->getBio());
            }
        }

        $entityManager->flush();

        $this->addFlash('success', 'Demande approuvee. Le compte est maintenant medecin.');

        return $this->redirectAfterModeration($request, $demande);
    }

    #[Route('/demandes-medecin/{id}/rejeter', name: 'reject_medecin', methods: ['POST'])]
    public function rejectMedecin(
        int $id,
        Request $request,
        EntityManagerInterface $entityManager
    ): RedirectResponse {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');

        $demande = $entityManager->getRepository(DemandeMedecin::class)->find($id);
        if (!$demande) {
            throw $this->createNotFoundException('Demande medecin introuvable.');
        }

        if ($demande->isRejetee()) {
            $this->addFlash('info', 'Cette demande est deja rejetee.');
            return $this->redirectAfterModeration($request, $demande);
        }

        if ($demande->isAcceptee()) {
            $this->addFlash('error', 'Cette demande a deja ete acceptee. Le rejet n est plus possible.');
            return $this->redirectAfterModeration($request, $demande);
        }

        $raison = trim((string) $request->request->get('raison_rejet', ''));
        if ($raison === '') {
            $raison = 'Demande rejetee par l administration.';
        }

        $demande->setStatut(StatutDemandeMedecin::REJETEE);
        $demande->setDateTraitement(new \DateTimeImmutable());
        $demande->setRaisonRejet($raison);

        $entityManager->flush();

        $this->addFlash('success', 'Demande rejetee avec succes.');

        return $this->redirectAfterModeration($request, $demande);
    }

    private function redirectAfterModeration(Request $request, DemandeMedecin $demande): RedirectResponse
    {
        $redirectTo = (string) $request->request->get('redirect_to', '');
        if ($redirectTo === 'medecins') {
            return $this->redirectToRoute('app_admin_medecins');
        }

        return $this->redirectToRoute('app_admin_show_demande_medecin', ['id' => $demande->getId()]);
    }
}
