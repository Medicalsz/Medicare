<?php

namespace App\Service;

use App\Entity\RendezVous;
use Psr\Log\LoggerInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Address;
use Symfony\Component\Mime\Email;

class AppointmentMailer
{
    public function __construct(
        private readonly MailerInterface $mailer,
        private readonly LoggerInterface $logger,
        private readonly string $fromAddress,
        private readonly string $fromName
    ) {
    }

    public function sendConfirmedAppointment(RendezVous $rendezVous): void
    {
        $patientEmail = $this->resolvePatientEmail($rendezVous);
        $subject = 'Rendez-vous confirme - Medicare';

        $lines = [
            sprintf('Bonjour %s,', $this->resolvePatientLabel($rendezVous)),
            '',
            'Votre rendez-vous a ete confirme.',
            sprintf('Medecin: %s', $this->resolveDoctorLabel($rendezVous)),
            sprintf('Date: %s', $rendezVous->getDate()?->format('d/m/Y') ?? '-'),
            sprintf('Heure: %s', $rendezVous->getHeure()?->format('H:i') ?? '-'),
            sprintf('Cabinet: %s', $this->resolveCabinetLabel($rendezVous)),
            '',
            'Merci,',
            'Equipe Medicare',
        ];

        $this->sendTextMail($patientEmail, $subject, implode("\n", $lines));
    }

    public function sendConfirmedReportAppointment(
        RendezVous $rendezVous,
        \DateTimeInterface $oldDate,
        \DateTimeInterface $oldHeure
    ): void {
        $patientEmail = $this->resolvePatientEmail($rendezVous);
        $subject = 'Report de rendez-vous confirme - Medicare';

        $lines = [
            sprintf('Bonjour %s,', $this->resolvePatientLabel($rendezVous)),
            '',
            'Le report de votre rendez-vous a ete confirme.',
            sprintf('Medecin: %s', $this->resolveDoctorLabel($rendezVous)),
            sprintf('Ancienne date/heure: %s a %s', $oldDate->format('d/m/Y'), $oldHeure->format('H:i')),
            sprintf(
                'Nouvelle date/heure: %s a %s',
                $rendezVous->getDate()?->format('d/m/Y') ?? '-',
                $rendezVous->getHeure()?->format('H:i') ?? '-'
            ),
            sprintf('Cabinet: %s', $this->resolveCabinetLabel($rendezVous)),
            '',
            'Merci,',
            'Equipe Medicare',
        ];

        $this->sendTextMail($patientEmail, $subject, implode("\n", $lines));
    }

    public function sendReminderTenHoursBefore(RendezVous $rendezVous): void
    {
        $patientEmail = $this->resolvePatientEmail($rendezVous);
        $subject = 'Rappel: votre rendez-vous dans 10 heures - Medicare';

        $lines = [
            sprintf('Bonjour %s,', $this->resolvePatientLabel($rendezVous)),
            '',
            'Rappel: votre rendez-vous est prevu dans environ 10 heures.',
            sprintf('Medecin: %s', $this->resolveDoctorLabel($rendezVous)),
            sprintf('Date: %s', $rendezVous->getDate()?->format('d/m/Y') ?? '-'),
            sprintf('Heure: %s', $rendezVous->getHeure()?->format('H:i') ?? '-'),
            sprintf('Cabinet: %s', $this->resolveCabinetLabel($rendezVous)),
            '',
            'Merci,',
            'Equipe Medicare',
        ];

        $this->sendTextMail($patientEmail, $subject, implode("\n", $lines));
    }

    private function sendTextMail(string $toEmail, string $subject, string $text): void
    {
        if ($toEmail === '') {
            throw new \RuntimeException('Email patient introuvable.');
        }

        $email = (new Email())
            ->from(new Address($this->fromAddress, $this->fromName !== '' ? $this->fromName : 'Medicare'))
            ->to($toEmail)
            ->subject($subject)
            ->text($text);

        try {
            $this->mailer->send($email);
        } catch (\Throwable $exception) {
            $this->logger->error('Echec envoi email rendez-vous.', [
                'to' => $toEmail,
                'subject' => $subject,
                'exception' => $exception->getMessage(),
            ]);

            throw $exception;
        }
    }

    private function resolvePatientEmail(RendezVous $rendezVous): string
    {
        return trim((string) ($rendezVous->getPatient()?->getUser()?->getEmail() ?? ''));
    }

    private function resolvePatientLabel(RendezVous $rendezVous): string
    {
        $patientUser = $rendezVous->getPatient()?->getUser();
        $label = trim(sprintf(
            '%s %s',
            (string) ($patientUser?->getPrenom() ?? ''),
            (string) ($patientUser?->getNom() ?? '')
        ));

        return $label !== '' ? $label : 'Patient';
    }

    private function resolveDoctorLabel(RendezVous $rendezVous): string
    {
        $doctorUser = $rendezVous->getMedecin()?->getUser();
        $label = trim(sprintf(
            'Dr %s %s',
            (string) ($doctorUser?->getPrenom() ?? ''),
            (string) ($doctorUser?->getNom() ?? '')
        ));

        return $label !== '' ? $label : 'Non renseigne';
    }

    private function resolveCabinetLabel(RendezVous $rendezVous): string
    {
        $cabinet = trim((string) ($rendezVous->getMedecin()?->getCabinet() ?? ''));

        return $cabinet !== '' ? $cabinet : 'Non renseigne';
    }
}

