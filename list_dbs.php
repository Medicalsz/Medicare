<?php
$pdo = new PDO('mysql:host=127.0.0.1', 'root', '');
foreach ($pdo->query('SHOW DATABASES') as $row) {
    echo $row[0] . PHP_EOL;
}
?>
