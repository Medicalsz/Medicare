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

    public function __construct()
    {
        $this->rendezVous = new ArrayCollection();
        $this->consultations = new ArrayCollection();
        $this->disponibilites = new ArrayCollection();
    }

    // Getters & Setters ...
}
