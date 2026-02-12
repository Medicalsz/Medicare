<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Enum\TypeConsultation;

#[ORM\Entity]
class Consultation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: 'datetime')]
    private ?\DateTimeInterface $dateConsultation = null;

    #[ORM\Column(type: 'text')]
    private ?string $description = null;

    #[ORM\Column(type: 'text')]
    private ?string $diagnostic = null;

    #[ORM\Column(type: 'text')]
    private ?string $traitement = null;

    #[ORM\Column(type: 'text', nullable: true)]
    private ?string $ordonnance = null;

    #[ORM\Column(type: 'text', nullable: true)]
    private ?string $notes = null;

    #[ORM\Column(enumType: TypeConsultation::class)]
    private ?TypeConsultation $type = null;

    #[ORM\ManyToOne(inversedBy: 'consultations')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Medecin $medecin = null;

    #[ORM\ManyToOne(inversedBy: 'consultations')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Patient $patient = null;

    #[ORM\OneToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?RendezVous $rendezVous = null;

    // ================= GETTERS & SETTERS =================

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateConsultation(): ?\DateTimeInterface
    {
        return $this->dateConsultation;
    }

    public function setDateConsultation(\DateTimeInterface $dateConsultation): static
    {
        $this->dateConsultation = $dateConsultation;
        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;
        return $this;
    }

    public function getDiagnostic(): ?string
    {
        return $this->diagnostic;
    }

    public function setDiagnostic(string $diagnostic): static
    {
        $this->diagnostic = $diagnostic;
        return $this;
    }

    public function getTraitement(): ?string
    {
        return $this->traitement;
    }

    public function setTraitement(string $traitement): static
    {
        $this->traitement = $traitement;
        return $this;
    }

    public function getOrdonnance(): ?string
    {
        return $this->ordonnance;
    }

    public function setOrdonnance(?string $ordonnance): static
    {
        $this->ordonnance = $ordonnance;
        return $this;
    }

    public function getNotes(): ?string
    {
        return $this->notes;
    }

    public function setNotes(?string $notes): static
    {
        $this->notes = $notes;
        return $this;
    }

    public function getType(): ?TypeConsultation
    {
        return $this->type;
    }

    public function setType(TypeConsultation $type): static
    {
        $this->type = $type;
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

    public function getRendezVous(): ?RendezVous
    {
        return $this->rendezVous;
    }

    public function setRendezVous(RendezVous $rendezVous): static
    {
        $this->rendezVous = $rendezVous;
        return $this;
    }
}
