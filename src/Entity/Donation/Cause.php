<?php

namespace App\Entity\Donation;

use App\Enum\Donation\StatutCause;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: \App\Repository\Donation\CauseRepository::class)]
class Cause
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $titre = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column(nullable: true)]
    private ?float $objectifMontant = null;

    #[ORM\Column(type: Types::DATE_IMMUTABLE)]
    private ?\DateTimeImmutable $dateDebut = null;

    #[ORM\Column(type: Types::DATE_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $dateFin = null;

    #[ORM\Column(enumType: StatutCause::class)]
    private ?StatutCause $statut = null;

    #[ORM\OneToMany(mappedBy: 'cause', targetEntity: \App\Entity\Donation\ImageCause::class, orphanRemoval: true)]
    private Collection $images;

    #[ORM\OneToMany(mappedBy: 'cause', targetEntity: \App\Entity\Donation\Don::class)]
    private Collection $dons;

    public function __construct()
    {
        $this->images = new ArrayCollection();
        $this->dons = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): static
    {
        $this->titre = $titre;
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

    public function getObjectifMontant(): ?float
    {
        return $this->objectifMontant;
    }

    public function setObjectifMontant(?float $objectifMontant): static
    {
        $this->objectifMontant = $objectifMontant;
        return $this;
    }

    public function getDateDebut(): ?\DateTimeImmutable
    {
        return $this->dateDebut;
    }

    public function setDateDebut(\DateTimeImmutable $dateDebut): static
    {
        $this->dateDebut = $dateDebut;
        return $this;
    }

    public function getDateFin(): ?\DateTimeImmutable
    {
        return $this->dateFin;
    }

    public function setDateFin(?\DateTimeImmutable $dateFin): static
    {
        $this->dateFin = $dateFin;
        return $this;
    }

    public function getStatut(): ?StatutCause
    {
        return $this->statut;
    }

    public function setStatut(StatutCause $statut): static
    {
        $this->statut = $statut;
        return $this;
    }

    /**
     * @return Collection<int, ImageCause>
     */
    public function getImages(): Collection
    {
        return $this->images;
    }

    public function addImage(ImageCause $image): static
    {
        if (!$this->images->contains($image)) {
            $this->images->add($image);
            $image->setCause($this);
        }
        return $this;
    }

    public function removeImage(ImageCause $image): static
    {
        if ($this->images->removeElement($image)) {
            // set the owning side to null (unless already changed)
            if ($image->getCause() === $this) {
                $image->setCause(null);
            }
        }
        return $this;
    }

    /**
     * @return Collection<int, Don>
     */
    public function getDons(): Collection
    {
        return $this->dons;
    }

    public function addDon(Don $don): static
    {
        if (!$this->dons->contains($don)) {
            $this->dons->add($don);
            $don->setCause($this);
        }
        return $this;
    }

    public function removeDon(Don $don): static
    {
        if ($this->dons->removeElement($don)) {
            // set the owning side to null (unless already changed)
            if ($don->getCause() === $this) {
                $don->setCause(null);
            }
        }
        return $this;
    }
}

