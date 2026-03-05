<?php
// Simple PDO script to insert admin
$dsn = 'mysql:host=127.0.0.1;dbname=medicare;charset=utf8mb4';
$user = 'root';
$pass = '';

try {
    $pdo = new PDO($dsn, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $email = 'admin@medicare.com';
    $password = password_hash('admin123', PASSWORD_BCRYPT);
    $roles = '["ROLE_ADMIN"]';
    $nom = 'Admin';
    $prenom = 'Medicare';

    $stmt = $pdo->prepare("INSERT INTO admin (email, password, roles, nom, prenom) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$email, $password, $roles, $nom, $prenom]);
    echo "ADMIN_CREATED";
} catch (PDOException $e) {
    echo "ERROR: " . $e->getMessage();
}
?>
