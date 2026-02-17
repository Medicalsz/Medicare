<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Enum\StatutRendezVous;

#[ORM\Entity]
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

    #[ORM\ManyToOne(inversedBy: "rendezVous")]
    #[ORM\JoinColumn(nullable: false)]
    private ?Medecin $medecin = null;

    #[ORM\ManyToOne(inversedBy: "rendezVous")]
    #[ORM\JoinColumn(nullable: false)]
    private ?Patient $patient = null;

    // getters setters ...
}
