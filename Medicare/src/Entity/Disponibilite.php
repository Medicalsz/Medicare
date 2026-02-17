<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Enum\JourSemaine;

#[ORM\Entity]
class Disponibilite
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(enumType: JourSemaine::class)]
    private ?JourSemaine $jourSemaine = null;

    #[ORM\Column(type: 'time')]
    private ?\DateTimeInterface $heureDebut = null;

    #[ORM\Column(type: 'time')]
    private ?\DateTimeInterface $heureFin = null;

    #[ORM\ManyToOne(inversedBy: "disponibilites")]
    #[ORM\JoinColumn(nullable: false)]
    private ?Medecin $medecin = null;

    // getters setters ...
}
