<?php
require __DIR__ . '/vendor/autoload.php';

use Symfony\Component\Mailer\Transport;
use Symfony\Component\Mailer\Mailer;
use Symfony\Component\Mime\Email;

// DSN from .env.local
$dsn = 'gmail://samermfarrej%40gmail.com:puxtagywzvkooxmi@default';

echo "Test de connexion avec DSN: $dsn\n";

try {
    $transport = Transport::fromDsn($dsn);
    $mailer = new Mailer($transport);

    $email = (new Email())
        ->from('samermfarrej@gmail.com')
        ->to('samer.mfarrej@esprit.tn')
        ->subject('Test Envoi Direct Medicare à Esprit')
        ->text('Ceci est un test direct depuis le script PHP vers esprit.tn.');

    $mailer->send($email);
    echo "Email envoyé avec succès !\n";
} catch (\Throwable $e) {
    echo "Erreur d'envoi : " . $e->getMessage() . "\n";
    echo "Trace : " . $e->getTraceAsString() . "\n";
}
