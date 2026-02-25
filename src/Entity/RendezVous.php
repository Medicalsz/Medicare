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
