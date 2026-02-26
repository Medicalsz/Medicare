<?php

namespace App\Entity\Medical;

use App\Entity\User;

use Doctrine\ORM\Mapping as ORM;
use App\Enum\Medical\StatutDemandeMedecin;

#[ORM\Entity(repositoryClass: \App\Repository\Medical\DemandeMedecinRepository::class)]
#[ORM\Table(name: 'demande_medecin')]
class DemandeMedecin
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: User::class)]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $user = null;

    #[ORM\Column(length: 255)]
    private ?string $specialite = null;

    #[ORM\Column(length: 255)]
    private ?string $cabinet = null;

    #[ORM\Column(length: 500)]
    private ?string $adresse = null;

    #[ORM\Column(type: 'text', nullable: true)]
    private ?string $bio = null;

    #[ORM\Column(length: 500, nullable: true)]
    private ?string $certificats = null; // Chemins des fichiers séparés par virgule

    #[ORM\Column(type: 'string', enumType: StatutDemandeMedecin::class)]
    private ?StatutDemandeMedecin $statut = null;

    #[ORM\Column(type: 'datetime')]
    private ?\DateTimeInterface $dateDemande = null;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dateTraitement = null;

    #[ORM\Column(type: 'text', nullable: true)]
    private ?string $raisonRejet = null;

    // ✅ CONSTRUCTEUR
    public function __construct()
    {
        $this->dateDemande = new \DateTime();
        $this->statut = StatutDemandeMedecin::EN_ATTENTE;
    }

    // ---------------- GETTERS & SETTERS ----------------

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): static
    {
        $this->user = $user;
        return $this;
    }

    public function getSpecialite(): ?string
    {
        return $this->specialite;
    }

    public function setSpecialite(string $specialite): static
    {
        $this->specialite = $specialite;
        return $this;
    }

    public function getCabinet(): ?string
    {
        return $this->cabinet;
    }

    public function setCabinet(string $cabinet): static
    {
        $this->cabinet = $cabinet;
        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): static
    {
        $this->adresse = $adresse;
        return $this;
    }

    public function getBio(): ?string
    {
        return $this->bio;
    }

    public function setBio(?string $bio): static
    {
        $this->bio = $bio;
        return $this;
    }

    public function getCertificats(): ?string
    {
        return $this->certificats;
    }

    public function setCertificats(?string $certificats): static
    {
        $this->certificats = $certificats;
        return $this;
    }

    public function getStatut(): ?StatutDemandeMedecin
    {
        return $this->statut;
    }

    public function setStatut(StatutDemandeMedecin $statut): static
    {
        $this->statut = $statut;
        return $this;
    }

    public function getDateDemande(): ?\DateTimeInterface
    {
        return $this->dateDemande;
    }

    public function setDateDemande(\DateTimeInterface $dateDemande): static
    {
        $this->dateDemande = $dateDemande;
        return $this;
    }

    public function getDateTraitement(): ?\DateTimeInterface
    {
        return $this->dateTraitement;
    }

    public function setDateTraitement(?\DateTimeInterface $dateTraitement): static
    {
        $this->dateTraitement = $dateTraitement;
        return $this;
    }

    public function getRaisonRejet(): ?string
    {
        return $this->raisonRejet;
    }

    public function setRaisonRejet(?string $raisonRejet): static
    {
        $this->raisonRejet = $raisonRejet;
        return $this;
    }

    // ============ MÉTHODES UTILES ============

    public function isEnAttente(): bool
    {
        return $this->statut === StatutDemandeMedecin::EN_ATTENTE;
    }

    public function isAcceptee(): bool
    {
        return $this->statut === StatutDemandeMedecin::ACCEPTEE;
    }

    public function isRejetee(): bool
    {
        return $this->statut === StatutDemandeMedecin::REJETEE;
    }
}