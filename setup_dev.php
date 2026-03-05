<?php
$pdo = new PDO('mysql:host=127.0.0.1', 'root', '');
try {
    $pdo->exec("CREATE USER IF NOT EXISTS 'dev'@'localhost' IDENTIFIED BY '123456'");
    $pdo->exec("GRANT ALL PRIVILEGES ON medicare.* TO 'dev'@'localhost'");
    $pdo->exec("FLUSH PRIVILEGES");
    echo "USER_SETUP_SUCCESS";
} catch (Exception $e) {
    echo "ERROR: " . $e->getMessage();
}
?>
