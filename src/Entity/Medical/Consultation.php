<?php

namespace App\Entity\Medical;

use Doctrine\ORM\Mapping as ORM;
use App\Enum\Medical\TypeConsultation;

#[ORM\Entity(repositoryClass: \App\Repository\Medical\ConsultationRepository::class)]
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

    #[ORM\Column(type: 'text', nullable: true)]
    private ?string $ordonnance = null;

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

    public function getOrdonnance(): ?string
    {
        return $this->ordonnance;
    }

    public function setOrdonnance(?string $ordonnance): static
    {
        $this->ordonnance = $ordonnance;
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
