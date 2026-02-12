<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
class ObjetDon
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nomObjet = null;

    #[ORM\Column]
    private ?int $quantite = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\ManyToOne(inversedBy: 'objets')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Don $don = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomObjet(): ?string
    {
        return $this->nomObjet;
    }

    public function setNomObjet(string $nomObjet): static
    {
        $this->nomObjet = $nomObjet;
        return $this;
    }

    public function getQuantite(): ?int
    {
        return $this->quantite;
    }

    public function setQuantite(int $quantite): static
    {
        $this->quantite = $quantite;
        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;
        return $this;
    }

    public function getDon(): ?Don
    {
        return $this->don;
    }

    public function setDon(?Don $don): static
    {
        $this->don = $don;
        return $this;
    }
}
