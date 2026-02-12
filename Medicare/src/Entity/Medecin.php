<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

#[ORM\Entity]
class Medecin
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $specialite = null;

    #[ORM\Column(length: 255)]
    private ?string $cabinet = null;

    #[ORM\Column(type: 'text', nullable: true)]
    private ?string $adresseCabinet = null;

    #[ORM\Column(length: 20, nullable: true)]
    private ?string $numeroCabinet = null;

    #[ORM\Column(type: 'text', nullable: true)]
    private ?string $bio = null;

    #[ORM\Column(type: 'json', nullable: true)]
    private ?array $documents = [];

    #[ORM\OneToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $user = null;

    #[ORM\OneToMany(mappedBy: "medecin", targetEntity: RendezVous::class)]
    private Collection $rendezVous;

    #[ORM\OneToMany(mappedBy: "medecin", targetEntity: Consultation::class)]
    private Collection $consultations;

    #[ORM\OneToMany(mappedBy: "medecin", targetEntity: Disponibilite::class)]
    private Collection $disponibilites;

    // ✅ CONSTRUCTEUR ICI
    public function __construct()
    {
        $this->rendezVous = new ArrayCollection();
        $this->consultations = new ArrayCollection();
        $this->disponibilites = new ArrayCollection();
    }

    // ---------------- GETTERS & SETTERS ----------------

    public function getId(): ?int
    {
        return $this->id;
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

    public function getAdresseCabinet(): ?string
    {
        return $this->adresseCabinet;
    }

    public function setAdresseCabinet(?string $adresseCabinet): static
    {
        $this->adresseCabinet = $adresseCabinet;
        return $this;
    }

    public function getNumeroCabinet(): ?string
    {
        return $this->numeroCabinet;
    }

    public function setNumeroCabinet(?string $numeroCabinet): static
    {
        $this->numeroCabinet = $numeroCabinet;
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

    public function getDocuments(): ?array
    {
        return $this->documents;
    }

    public function setDocuments(?array $documents): static
    {
        $this->documents = $documents;
        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(User $user): static
    {
        $this->user = $user;
        return $this;
    }
}
