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

    #[ORM\ManyToOne(targetEntity: Specialite::class)]
    #[ORM\JoinColumn(nullable: true, onDelete: 'SET NULL')]
    private ?Specialite $specialiteRef = null;

    #[ORM\Column(length: 255)]
    private ?string $cabinet = null;

    #[ORM\Column(type: 'text', nullable: true)]
    private ?string $bio = null;

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

    public function getSpecialiteRef(): ?Specialite
    {
        return $this->specialiteRef;
    }

    public function setSpecialiteRef(?Specialite $specialiteRef): static
    {
        $this->specialiteRef = $specialiteRef;
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

    /**
     * @return Collection<int, RendezVous>
     */
    public function getRendezVous(): Collection
    {
        return $this->rendezVous;
    }

    /**
     * @return Collection<int, Consultation>
     */
    public function getConsultations(): Collection
    {
        return $this->consultations;
    }

    /**
     * @return Collection<int, Disponibilite>
     */
    public function getDisponibilites(): Collection
    {
        return $this->disponibilites;
    }

    public function addDisponibilite(Disponibilite $disponibilite): static
    {
        if (!$this->disponibilites->contains($disponibilite)) {
            $this->disponibilites->add($disponibilite);
            $disponibilite->setMedecin($this);
        }

        return $this;
    }

    public function removeDisponibilite(Disponibilite $disponibilite): static
    {
        $this->disponibilites->removeElement($disponibilite);

        return $this;
    }
}
