<?php

namespace App\Entity\Medical;

use App\Entity\User\User;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

#[ORM\Entity(repositoryClass: \App\Repository\Medical\PatientRepository::class)]
class Patient
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: 'date', nullable: true)]
    private ?\DateTimeInterface $dateNaissance = null;

    #[ORM\Column(length: 10, nullable: true)]
    private ?string $groupeSanguin = null;

    #[ORM\OneToOne(targetEntity: \App\Entity\User\User::class)]
    #[ORM\JoinColumn(nullable: false)]
    private ?\App\Entity\User\User $user = null;

    #[ORM\OneToMany(mappedBy: "patient", targetEntity: \App\Entity\Medical\RendezVous::class)]
    private Collection $rendezVous;

    #[ORM\OneToMany(mappedBy: "patient", targetEntity: \App\Entity\Medical\Consultation::class)]
    private Collection $consultations;

    // ✅ CONSTRUCTEUR
    public function __construct()
    {
        $this->rendezVous = new ArrayCollection();
        $this->consultations = new ArrayCollection();
    }

    // ---------------- GETTERS & SETTERS ----------------

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateNaissance(): ?\DateTimeInterface
    {
        return $this->dateNaissance;
    }

    public function setDateNaissance(?\DateTimeInterface $dateNaissance): static
    {
        $this->dateNaissance = $dateNaissance;
        return $this;
    }

    public function getGroupeSanguin(): ?string
    {
        return $this->groupeSanguin;
    }

    public function setGroupeSanguin(?string $groupeSanguin): static
    {
        $this->groupeSanguin = $groupeSanguin;
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

    public function getRendezVous(): Collection
    {
        return $this->rendezVous;
    }

    public function getConsultations(): Collection
    {
        return $this->consultations;
    }
}



