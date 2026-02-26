<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Enum\StatutRendezVous;
use App\Repository\RendezVousRepository;
use Doctrine\ORM\Mapping\UniqueConstraint;


#[ORM\Entity(repositoryClass: RendezVousRepository::class)]
#[ORM\Table(
    uniqueConstraints: [
        new UniqueConstraint(
            name: "unique_medecin_date_heure",
            columns: ["medecin_id", "date", "heure"]
        )
    ]
)]
class RendezVous
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: 'date')]
    private ?\DateTimeInterface $date = null;

    #[ORM\Column(type: 'time')]
    private ?\DateTimeInterface $heure = null;

    #[ORM\Column(type: 'date', nullable: true)]
    private ?\DateTimeInterface $proposedDate = null;

    #[ORM\Column(type: 'time', nullable: true)]
    private ?\DateTimeInterface $proposedHeure = null;

    #[ORM\Column(options: ['default' => false])]
    private bool $reportPendingPatientResponse = false;

    #[ORM\Column(options: ['default' => false])]
    private bool $reportPendingMedecinResponse = false;

    #[ORM\Column(options: ['default' => false])]
    private bool $reportProposedByAdmin = false;

    #[ORM\Column(options: ['default' => false])]
    private bool $hiddenByPatient = false;

    #[ORM\Column(options: ['default' => false])]
    private bool $hiddenByMedecin = false;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $reminderSentAt = null;

    #[ORM\Column(length: 80, nullable: true)]
    private ?string $patientNotificationType = null;

    #[ORM\Column(type: 'text', nullable: true)]
    private ?string $patientNotificationMessage = null;

    #[ORM\Column(options: ['default' => 0])]
    private int $patientNotificationVersion = 0;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $patientNotificationAt = null;

    #[ORM\Column(length: 80, nullable: true)]
    private ?string $medecinNotificationType = null;

    #[ORM\Column(type: 'text', nullable: true)]
    private ?string $medecinNotificationMessage = null;

    #[ORM\Column(options: ['default' => 0])]
    private int $medecinNotificationVersion = 0;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $medecinNotificationAt = null;

    #[ORM\Column(enumType: StatutRendezVous::class)]
    private ?StatutRendezVous $statut = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Medecin $medecin = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Patient $patient = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): static
    {
        $this->date = $date;
        return $this;
    }

    public function getHeure(): ?\DateTimeInterface
    {
        return $this->heure;
    }

    public function setHeure(\DateTimeInterface $heure): static
    {
        $this->heure = $heure;
        return $this;
    }

    public function getProposedDate(): ?\DateTimeInterface
    {
        return $this->proposedDate;
    }

    public function setProposedDate(?\DateTimeInterface $proposedDate): static
    {
        $this->proposedDate = $proposedDate;
        return $this;
    }

    public function getProposedHeure(): ?\DateTimeInterface
    {
        return $this->proposedHeure;
    }

    public function setProposedHeure(?\DateTimeInterface $proposedHeure): static
    {
        $this->proposedHeure = $proposedHeure;
        return $this;
    }

    public function isReportPendingPatientResponse(): bool
    {
        return $this->reportPendingPatientResponse;
    }

    public function setReportPendingPatientResponse(bool $reportPendingPatientResponse): static
    {
        $this->reportPendingPatientResponse = $reportPendingPatientResponse;
        return $this;
    }

    public function isReportPendingMedecinResponse(): bool
    {
        return $this->reportPendingMedecinResponse;
    }

    public function setReportPendingMedecinResponse(bool $reportPendingMedecinResponse): static
    {
        $this->reportPendingMedecinResponse = $reportPendingMedecinResponse;
        return $this;
    }

    public function isReportProposedByAdmin(): bool
    {
        return $this->reportProposedByAdmin;
    }

    public function setReportProposedByAdmin(bool $reportProposedByAdmin): static
    {
        $this->reportProposedByAdmin = $reportProposedByAdmin;
        return $this;
    }

    public function isHiddenByPatient(): bool
    {
        return $this->hiddenByPatient;
    }

    public function setHiddenByPatient(bool $hiddenByPatient): static
    {
        $this->hiddenByPatient = $hiddenByPatient;
        return $this;
    }

    public function isHiddenByMedecin(): bool
    {
        return $this->hiddenByMedecin;
    }

    public function setHiddenByMedecin(bool $hiddenByMedecin): static
    {
        $this->hiddenByMedecin = $hiddenByMedecin;
        return $this;
    }

    public function getReminderSentAt(): ?\DateTimeInterface
    {
        return $this->reminderSentAt;
    }

    public function setReminderSentAt(?\DateTimeInterface $reminderSentAt): static
    {
        $this->reminderSentAt = $reminderSentAt;
        return $this;
    }

    public function getPatientNotificationType(): ?string
    {
        return $this->patientNotificationType;
    }

    public function setPatientNotificationType(?string $patientNotificationType): static
    {
        $this->patientNotificationType = $patientNotificationType;
        return $this;
    }

    public function getPatientNotificationMessage(): ?string
    {
        return $this->patientNotificationMessage;
    }

    public function setPatientNotificationMessage(?string $patientNotificationMessage): static
    {
        $this->patientNotificationMessage = $patientNotificationMessage;
        return $this;
    }

    public function getPatientNotificationVersion(): int
    {
        return $this->patientNotificationVersion;
    }

    public function setPatientNotificationVersion(int $patientNotificationVersion): static
    {
        $this->patientNotificationVersion = $patientNotificationVersion;
        return $this;
    }

    public function getPatientNotificationAt(): ?\DateTimeInterface
    {
        return $this->patientNotificationAt;
    }

    public function setPatientNotificationAt(?\DateTimeInterface $patientNotificationAt): static
    {
        $this->patientNotificationAt = $patientNotificationAt;
        return $this;
    }

    public function getMedecinNotificationType(): ?string
    {
        return $this->medecinNotificationType;
    }

    public function setMedecinNotificationType(?string $medecinNotificationType): static
    {
        $this->medecinNotificationType = $medecinNotificationType;
        return $this;
    }

    public function getMedecinNotificationMessage(): ?string
    {
        return $this->medecinNotificationMessage;
    }

    public function setMedecinNotificationMessage(?string $medecinNotificationMessage): static
    {
        $this->medecinNotificationMessage = $medecinNotificationMessage;
        return $this;
    }

    public function getMedecinNotificationVersion(): int
    {
        return $this->medecinNotificationVersion;
    }

    public function setMedecinNotificationVersion(int $medecinNotificationVersion): static
    {
        $this->medecinNotificationVersion = $medecinNotificationVersion;
        return $this;
    }

    public function getMedecinNotificationAt(): ?\DateTimeInterface
    {
        return $this->medecinNotificationAt;
    }

    public function setMedecinNotificationAt(?\DateTimeInterface $medecinNotificationAt): static
    {
        $this->medecinNotificationAt = $medecinNotificationAt;
        return $this;
    }

    public function notifyPatient(string $type, ?string $message = null): static
    {
        $this->patientNotificationType = $type;
        $this->patientNotificationMessage = $message;
        $this->patientNotificationVersion += 1;
        $this->patientNotificationAt = new \DateTimeImmutable();

        return $this;
    }

    public function notifyMedecin(string $type, ?string $message = null): static
    {
        $this->medecinNotificationType = $type;
        $this->medecinNotificationMessage = $message;
        $this->medecinNotificationVersion += 1;
        $this->medecinNotificationAt = new \DateTimeImmutable();

        return $this;
    }

    public function getStatut(): ?StatutRendezVous
    {
        return $this->statut;
    }

    public function setStatut(StatutRendezVous $statut): static
    {
        $this->statut = $statut;
        return $this;
    }
    public function getMedecin(): ?Medecin
    {
        return $this->medecin;
    }

    public function setMedecin(Medecin $medecin): static
    {
        $this->medecin = $medecin;
        return $this;
    }

    public function getPatient(): ?Patient
    {
        return $this->patient;
    }

    public function setPatient(Patient $patient): static
    {
        $this->patient = $patient;
        return $this;
    }
}
