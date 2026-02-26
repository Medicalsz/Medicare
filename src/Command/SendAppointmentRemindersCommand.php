<?php

namespace App\Command;

use App\Entity\RendezVous;
use App\Repository\RendezVousRepository;
use App\Service\AppointmentMailer;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(
    name: 'app:appointments:send-reminders',
    description: 'Envoie les rappels email 10 heures avant les rendez-vous confirmes.',
)]
class SendAppointmentRemindersCommand extends Command
{
    public function __construct(
        private readonly RendezVousRepository $rendezVousRepository,
        private readonly EntityManagerInterface $entityManager,
        private readonly AppointmentMailer $appointmentMailer
    ) {
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        $now = new \DateTimeImmutable();
        $windowStart = $now->modify('+10 hours');
        $windowEnd = $windowStart->modify('+15 minutes');
        $queryDateFrom = $windowStart->modify('-1 day');
        $queryDateTo = $windowEnd->modify('+1 day');

        $candidates = $this->rendezVousRepository->findConfirmedWithoutReminderBetweenDates($queryDateFrom, $queryDateTo);

        $sent = 0;
        $skipped = 0;
        $failed = 0;

        foreach ($candidates as $rendezVous) {
            $rdvDateTime = $this->buildRendezVousDateTime($rendezVous);
            if ($rdvDateTime < $windowStart || $rdvDateTime > $windowEnd) {
                $skipped++;
                continue;
            }

            try {
                $this->appointmentMailer->sendReminderTenHoursBefore($rendezVous);
                $rendezVous->setReminderSentAt(new \DateTimeImmutable());
                $sent++;
            } catch (\Throwable $exception) {
                $failed++;
                $io->warning(sprintf(
                    'Echec reminder RDV #%d: %s',
                    (int) ($rendezVous->getId() ?? 0),
                    $exception->getMessage()
                ));
            }
        }

        if ($sent > 0) {
            $this->entityManager->flush();
        }

        $io->success(sprintf(
            'Rappels traites. Envoyes: %d | Ignores: %d | Echecs: %d',
            $sent,
            $skipped,
            $failed
        ));

        return Command::SUCCESS;
    }

    private function buildRendezVousDateTime(RendezVous $rendezVous): \DateTimeImmutable
    {
        $date = $rendezVous->getDate()?->format('Y-m-d') ?? (new \DateTimeImmutable('today'))->format('Y-m-d');
        $heure = $rendezVous->getHeure()?->format('H:i:s') ?? '00:00:00';

        return new \DateTimeImmutable($date . ' ' . $heure);
    }
}

