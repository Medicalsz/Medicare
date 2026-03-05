<?php
require_once 'vendor/autoload.php';

use App\Kernel;
use App\Entity\Admin;
use Symfony\Component\Dotenv\Dotenv;

$dotenv = new Dotenv();
$dotenv->load(__DIR__.'/.env');
if (file_exists(__DIR__.'/.env.local')) {
    $dotenv->load(__DIR__.'/.env.local');
}

$kernel = new Kernel($_SERVER['APP_ENV'], (bool) $_SERVER['APP_DEBUG']);
$kernel->boot();
$container = $kernel->getContainer();
$entityManager = $container->get('doctrine.orm.entity_manager');
$passwordHasher = $container->get('security.password_hasher');

$adminEmail = 'admin@medicare.com';
$admin = $entityManager->getRepository(Admin::class)->findOneBy(['email' => $adminEmail]);

if (!$admin) {
    $admin = new Admin();
    $admin->setEmail($adminEmail);
    $admin->setNom('Admin');
    $admin->setPrenom('Medicare');
    // Using a simple hash for now if hasher is not available, but Symfony hasher is better
    try {
        $admin->setPassword($passwordHasher->hashPassword($admin, 'admin123'));
    } catch (\Exception $e) {
        $admin->setPassword(password_hash('admin123', PASSWORD_BCRYPT));
    }
    $admin->setRoles(['ROLE_ADMIN']);
    
    $entityManager->persist($admin);
    $entityManager->flush();
    echo "ADMIN_CREATED_SUCCESSFULLY";
} else {
    echo "ADMIN_ALREADY_EXISTS";
}
?>
