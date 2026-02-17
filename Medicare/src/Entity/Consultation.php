<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Enum\TypeConsultation;

#[ORM\Entity]
class Consultation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: 'datetime')]
    private ?\DateTimeInterface $dateConsultation = null;

    #[ORM\Column(type: 'text')]
    private ?string $description = null;

    #[ORM\Column(type: 'text', nullable: true)]
    private ?string $ordonnance = null;

    #[ORM\Column(enumType: TypeConsultation::class)]
    private ?TypeConsultation $type = null;

    #[ORM\ManyToOne(inversedBy: "consultations")]
    #[ORM\JoinColumn(nullable: false)]
    private ?Medecin $medecin = null;

    #[ORM\ManyToOne(inversedBy: "consultations")]
    #[ORM\JoinColumn(nullable: false)]
    private ?Patient $patient = null;

    #[ORM\OneToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?RendezVous $rendezVous = null;

    // getters setters ...
}
