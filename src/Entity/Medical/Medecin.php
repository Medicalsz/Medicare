<?php

namespace App\Entity\Medical;

use App\Entity\User\User;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

#[ORM\Entity(repositoryClass: \App\Repository\Medical\MedecinRepository::class)]
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
    private ?string $bio = null;

    #[ORM\OneToOne(targetEntity: \App\Entity\User\User::class)]
    #[ORM\JoinColumn(nullable: false)]
    private ?\App\Entity\User\User $user = null;

    #[ORM\OneToMany(mappedBy: "medecin", targetEntity: \App\Entity\Medical\RendezVous::class)]
    private Collection $rendezVous;

    #[ORM\OneToMany(mappedBy: "medecin", targetEntity: \App\Entity\Medical\Consultation::class)]
    private Collection $consultations;

    #[ORM\OneToMany(mappedBy: "medecin", targetEntity: \App\Entity\Medical\Disponibilite::class)]
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

    public function getBio(): ?string
    {
        return $this->bio;
    }

    public function setBio(?string $bio): static
    {
        $this->bio = $bio;
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



