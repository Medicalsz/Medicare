<?php

namespace App\Entity;

use App\Enum\ModePaiement;
use App\Enum\StatutDon;
use App\Enum\TypeDon;
use App\Repository\DonRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: DonRepository::class)]
class Don
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(enumType: TypeDon::class)]
    #[Assert\NotBlank(message: 'Veuillez sélectionner un type de don (matériel ou argent).')]
    private ?TypeDon $typeDon = null;

    #[ORM\Column]
    #[Assert\NotNull(message: 'Le montant ne peut pas être vide.')]
    #[Assert\Type(type: 'float', message: 'Le montant doit être un nombre valide.')]
    #[Assert\Positive(message: 'Le montant du don doit obligatoirement être supérieur à 0 DT.')]
    private ?float $montant = 0;

    #[ORM\Column(type: Types::TEXT)]
    #[Assert\NotBlank(message: 'La description est nécessaire pour traiter votre don.')]
    #[Assert\Length(
        min: 10, 
        max: 500,
        minMessage: 'Votre description est trop courte (minimum {{ limit }} caractères).',
        maxMessage: 'Votre description ne peut pas dépasser {{ limit }} caractères.'
    )]
    private ?string $description = null;

    #[ORM\Column(type: Types::DATETIME_IMMUTABLE)]
    private ?\DateTimeImmutable $dateDon = null;

    #[ORM\Column(enumType: ModePaiement::class)]
    private ?ModePaiement $modePaiement = null;

    #[ORM\Column(enumType: StatutDon::class)]
    private ?StatutDon $statutDon = null;

    #[ORM\ManyToOne(inversedBy: 'dons')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Cause $cause = null;

    #[ORM\ManyToOne(inversedBy: 'dons')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Donateur $donateur = null;

    #[ORM\OneToMany(mappedBy: 'don', targetEntity: ObjetDon::class, orphanRemoval: true, cascade: ['persist'])]
    private Collection $objets;

    #[ORM\Column(length: 255, nullable: true)]
    #[Assert\Length(
        max: 255,
        maxMessage: 'L\'adresse ne peut pas dépasser {{ limit }} caractères.'
    )]
    private ?string $adresse = null;

    #[ORM\Column(options: ['default' => false])]
    private ?bool $isPickupAddressConfirmed = false;

    public function __construct()
    {
        $this->objets = new ArrayCollection();
        $this->dateDon = new \DateTimeImmutable();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(?string $adresse): static
    {
        $this->adresse = $adresse;
        return $this;
    }

    public function isPickupAddressConfirmed(): ?bool
    {
        return $this->isPickupAddressConfirmed;
    }

    public function setIsPickupAddressConfirmed(bool $isPickupAddressConfirmed): static
    {
        $this->isPickupAddressConfirmed = $isPickupAddressConfirmed;
        return $this;
    }

    public function getTypeDon(): ?TypeDon
    {
        return $this->typeDon;
    }

    public function setTypeDon(TypeDon $typeDon): static
    {
        $this->typeDon = $typeDon;
        return $this;
    }

    public function getMontant(): ?float
    {
        return $this->montant;
    }

    public function setMontant(float $montant): static
    {
        $this->montant = $montant;
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

    public function getDateDon(): ?\DateTimeImmutable
    {
        return $this->dateDon;
    }

    public function setDateDon(\DateTimeImmutable $dateDon): static
    {
        $this->dateDon = $dateDon;
        return $this;
    }

    public function getModePaiement(): ?ModePaiement
    {
        return $this->modePaiement;
    }

    public function setModePaiement(ModePaiement $modePaiement): static
    {
        $this->modePaiement = $modePaiement;
        return $this;
    }

    public function getStatutDon(): ?StatutDon
    {
        return $this->statutDon;
    }

    public function setStatutDon(StatutDon $statutDon): static
    {
        $this->statutDon = $statutDon;
        return $this;
    }

    public function getCause(): ?Cause
    {
        return $this->cause;
    }

    public function setCause(?Cause $cause): static
    {
        $this->cause = $cause;
        return $this;
    }

    public function getDonateur(): ?Donateur
    {
        return $this->donateur;
    }

    public function setDonateur(?Donateur $donateur): static
    {
        $this->donateur = $donateur;
        return $this;
    }

    /**
     * @return Collection<int, ObjetDon>
     */
    public function getObjets(): Collection
    {
        return $this->objets;
    }

    public function addObjet(ObjetDon $objet): static
    {
        if (!$this->objets->contains($objet)) {
            $this->objets->add($objet);
            $objet->setDon($this);
        }
        return $this;
    }

    public function removeObjet(ObjetDon $objet): static
    {
        if ($this->objets->removeElement($objet)) {
            // set the owning side to null (unless already changed)
            if ($objet->getDon() === $this) {
                $objet->setDon(null);
            }
        }
        return $this;
    }
}
