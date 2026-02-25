<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Enum\JourSemaine;
use App\Repository\DisponibiliteRepository;

#[ORM\Entity(repositoryClass: DisponibiliteRepository::class)]
#[ORM\Table(name: 'disponibilite')]
#[ORM\UniqueConstraint(name: 'uniq_disponibilite_medecin_jour', columns: ['medecin_id', 'jour_semaine'])]
class Disponibilite
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(enumType: JourSemaine::class)]
    private ?JourSemaine $jourSemaine = null;

    #[ORM\Column(options: ['default' => false])]
    private bool $ferme = false;

    #[ORM\Column(type: 'time', nullable: true)]
    private ?\DateTimeInterface $matinDebut = null;

    #[ORM\Column(type: 'time', nullable: true)]
    private ?\DateTimeInterface $matinFin = null;

    #[ORM\Column(type: 'time', nullable: true)]
    private ?\DateTimeInterface $pauseDebut = null;

    #[ORM\Column(type: 'time', nullable: true)]
    private ?\DateTimeInterface $pauseFin = null;

    #[ORM\Column(type: 'time', nullable: true)]
    private ?\DateTimeInterface $apresMidiDebut = null;

    #[ORM\Column(type: 'time', nullable: true)]
    private ?\DateTimeInterface $apresMidiFin = null;

    #[ORM\ManyToOne(inversedBy: 'disponibilites')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Medecin $medecin = null;

    // ================= GETTERS & SETTERS =================

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getJourSemaine(): ?JourSemaine
    {
        return $this->jourSemaine;
    }

    public function setJourSemaine(JourSemaine $jourSemaine): static
    {
        $this->jourSemaine = $jourSemaine;
        return $this;
    }

    public function isFerme(): bool
    {
        return $this->ferme;
    }

    public function setFerme(bool $ferme): static
    {
        $this->ferme = $ferme;
        return $this;
    }

    public function getMatinDebut(): ?\DateTimeInterface
    {
        return $this->matinDebut;
    }

    public function setMatinDebut(?\DateTimeInterface $matinDebut): static
    {
        $this->matinDebut = $matinDebut;
        return $this;
    }

    public function getMatinFin(): ?\DateTimeInterface
    {
        return $this->matinFin;
    }

    public function setMatinFin(?\DateTimeInterface $matinFin): static
    {
        $this->matinFin = $matinFin;
        return $this;
    }

    public function getPauseDebut(): ?\DateTimeInterface
    {
        return $this->pauseDebut;
    }

    public function setPauseDebut(?\DateTimeInterface $pauseDebut): static
    {
        $this->pauseDebut = $pauseDebut;
        return $this;
    }

    public function getPauseFin(): ?\DateTimeInterface
    {
        return $this->pauseFin;
    }

    public function setPauseFin(?\DateTimeInterface $pauseFin): static
    {
        $this->pauseFin = $pauseFin;
        return $this;
    }

    public function getApresMidiDebut(): ?\DateTimeInterface
    {
        return $this->apresMidiDebut;
    }

    public function setApresMidiDebut(?\DateTimeInterface $apresMidiDebut): static
    {
        $this->apresMidiDebut = $apresMidiDebut;
        return $this;
    }

    public function getApresMidiFin(): ?\DateTimeInterface
    {
        return $this->apresMidiFin;
    }

    public function setApresMidiFin(?\DateTimeInterface $apresMidiFin): static
    {
        $this->apresMidiFin = $apresMidiFin;
        return $this;
    }

    public function clearHoraires(): static
    {
        $this->matinDebut = null;
        $this->matinFin = null;
        $this->pauseDebut = null;
        $this->pauseFin = null;
        $this->apresMidiDebut = null;
        $this->apresMidiFin = null;
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
}
