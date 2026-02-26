<?php

namespace App\Service;

use App\Entity\RendezVous;
use Psr\Log\LoggerInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class SendGridService
{
    private const SENDGRID_MAIL_ENDPOINT = 'https://api.sendgrid.com/v3/mail/send';

    public function __construct(
        private readonly HttpClientInterface $httpClient,
        private readonly LoggerInterface $logger,
        private readonly string $apiKey,
        private readonly string $fromEmail,
        private readonly string $fromName
    ) {
    }

    public function isConfigured(): bool
    {
        return $this->apiKey !== '' && $this->fromEmail !== '';
    }

    public function sendAppointmentConfirmation(RendezVous $rendezVous, ?string $calendarLink = null): void
    {
        if (!$this->isConfigured()) {
            throw new \RuntimeException('SendGrid n est pas configure.');
        }

        $patientEmail = trim((string) ($rendezVous->getPatient()?->getUser()?->getEmail() ?? ''));
        if ($patientEmail === '') {
            throw new \RuntimeException('Email patient introuvable.');
        }

        $response = $this->httpClient->request('POST', self::SENDGRID_MAIL_ENDPOINT, [
            'headers' => [
                'Authorization' => 'Bearer ' . $this->apiKey,
                'Content-Type' => 'application/json',
            ],
            'json' => $this->buildPayload($rendezVous, $patientEmail, $calendarLink),
        ]);

        $statusCode = $response->getStatusCode();
        if ($statusCode !== 202) {
            $body = $response->getContent(false);
            $this->logger->error('Echec envoi SendGrid.', [
                'status_code' => $statusCode,
                'body' => $body,
            ]);

            throw new \RuntimeException('Impossible d envoyer l email de confirmation.');
        }
    }

    private function buildPayload(RendezVous $rendezVous, string $patientEmail, ?string $calendarLink): array
    {
        $medecinUser = $rendezVous->getMedecin()?->getUser();
        $patientUser = $rendezVous->getPatient()?->getUser();
        $date = $rendezVous->getDate();
        $heure = $rendezVous->getHeure();

        $doctorName = trim(sprintf(
            'Dr %s %s',
            (string) ($medecinUser?->getPrenom() ?? ''),
            (string) ($medecinUser?->getNom() ?? '')
        ));
        $patientName = trim(sprintf(
            '%s %s',
            (string) ($patientUser?->getPrenom() ?? ''),
            (string) ($patientUser?->getNom() ?? '')
        ));

        $dateFormatted = $date ? $date->format('d/m/Y') : '-';
        $timeFormatted = $heure ? $heure->format('H:i') : '-';
        $cabinet = trim((string) ($rendezVous->getMedecin()?->getCabinet() ?? ''));

        $lines = [
            sprintf('Bonjour %s,', $patientName !== '' ? $patientName : ''),
            '',
            'Votre rendez-vous a bien ete enregistre.',
            sprintf('Medecin: %s', $doctorName !== '' ? $doctorName : 'Non renseigne'),
            sprintf('Date: %s', $dateFormatted),
            sprintf('Heure: %s', $timeFormatted),
            sprintf('Cabinet: %s', $cabinet !== '' ? $cabinet : 'Non renseigne'),
            '',
            'Statut initial: EN ATTENTE',
        ];

        if ($calendarLink) {
            $lines[] = sprintf('Lien Google Calendar: %s', $calendarLink);
        }

        $lines[] = '';
        $lines[] = 'Equipe Medicare';

        return [
            'personalizations' => [[
                'to' => [[
                    'email' => $patientEmail,
                    'name' => $patientName,
                ]],
                'subject' => 'Confirmation de rendez-vous Medicare',
            ]],
            'from' => [
                'email' => $this->fromEmail,
                'name' => $this->fromName !== '' ? $this->fromName : 'Medicare',
            ],
            'content' => [[
                'type' => 'text/plain',
                'value' => implode("\n", $lines),
            ]],
        ];
    }
}
