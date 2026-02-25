<?php

namespace App\Entity\Medical;

use Doctrine\ORM\Mapping as ORM;
use App\Enum\Medical\StatutRendezVous;
use Doctrine\ORM\Mapping\UniqueConstraint;


#[ORM\Entity(repositoryClass: \App\Repository\Medical\RendezVousRepository::class)]
#[ORM\Table]
#[ORM\UniqueConstraint(name: "unique_medecin_date_heure", columns: ["medecin_id", "date", "heure"])]
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