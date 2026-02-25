<?php

namespace App\Command;

use App\Entity\User\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

#[AsCommand(
    name: 'app:create-admins',
    description: 'Crée les admins par défaut du système Medicare',
)]
class CreateAdminsCommand extends Command
{
    private EntityManagerInterface $entityManager;
    private UserPasswordHasherInterface $passwordHasher;

    public function __construct(EntityManagerInterface $entityManager, UserPasswordHasherInterface $passwordHasher)
    {
        parent::__construct();
        $this->entityManager = $entityManager;
        $this->passwordHasher = $passwordHasher;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        // Liste des admins à créer
        $admins = [
            ['email' => 'ayoub@admin.com', 'nom' => 'Ayoub', 'prenom' => 'Admin', 'numero' => '+216 12 345 678'],
            ['email' => 'samer@admin.com', 'nom' => 'Samer', 'prenom' => 'Admin', 'numero' => '+216 12 345 679'],
            ['email' => 'dhia@admin.com', 'nom' => 'Dhia', 'prenom' => 'Admin', 'numero' => '+216 12 345 680'],
            ['email' => 'rayen@admin.com', 'nom' => 'Rayen', 'prenom' => 'Admin', 'numero' => '+216 12 345 681'],
            ['email' => 'asser@admin.com', 'nom' => 'Asser', 'prenom' => 'Admin', 'numero' => '+216 12 345 682'],
            ['email' => 'malek@admin.com', 'nom' => 'Malek', 'prenom' => 'Admin', 'numero' => '+216 12 345 683'],
        ];

        $password = '123456';
        $createdCount = 0;
        $skippedCount = 0;

        $io->title('🏥 Création des admins Medicare');

        foreach ($admins as $adminData) {
            // Vérifier si l'admin existe déjà
            $existingUser = $this->entityManager->getRepository(User::class)
                ->findOneBy(['email' => $adminData['email']]);

            if ($existingUser) {
                $io->text("⏭️  {$adminData['email']} existe déjà, ignoré.");
                $skippedCount++;
                continue;
            }

            // Créer le nouvel admin
            $admin = new User();
            $admin->setEmail($adminData['email']);
            $admin->setNom($adminData['nom']);
            $admin->setPrenom($adminData['prenom']);
            $admin->setNumero($adminData['numero']);
            $admin->setRoles(['ROLE_ADMIN', 'ROLE_USER']);
            $admin->setIsVerified(true);

            // Hasher le mot de passe
            $hashedPassword = $this->passwordHasher->hashPassword($admin, $password);
            $admin->setPassword($hashedPassword);

            $this->entityManager->persist($admin);
            $io->text("✅ {$adminData['email']} créé avec succès.");
            $createdCount++;
        }

        // Sauvegarder en base
        $this->entityManager->flush();

        $io->newLine();
        $io->success([
            "Admins créés : $createdCount",
            "Admins déjà existants : $skippedCount",
            "Total : " . count($admins)
        ]);

        if ($createdCount > 0) {
            $io->note('Mot de passe par défaut pour tous les admins : 123456');
        }

        return Command::SUCCESS;
    }
}
