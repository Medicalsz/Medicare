<?php

namespace App\Entity;

use App\Enum\ProductType;
use App\Repository\ProductRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: ProductRepository::class)]
#[ORM\Index(columns: ['sku'], name: 'idx_sku')]
#[ORM\Index(columns: ['type'], name: 'idx_type')]
#[UniqueEntity(fields: ['sku'], message: 'This SKU is already in use.')]
class Product
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: 'The product name is required.')]
    #[Assert\Length(min: 2, max: 255, minMessage: 'Name must be at least {{ limit }} characters.', maxMessage: 'Name cannot exceed {{ limit }} characters.')]
    private ?string $name = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    #[Assert\Length(max: 5000, maxMessage: 'Description cannot exceed {{ limit }} characters.')]
    private ?string $description = null;

    #[ORM\Column(length: 100, unique: true)]
    #[Assert\NotBlank(message: 'The SKU is required.')]
    #[Assert\Length(min: 2, max: 100, minMessage: 'SKU must be at least {{ limit }} characters.', maxMessage: 'SKU cannot exceed {{ limit }} characters.')]
    #[Assert\Regex(pattern: '/^[A-Za-z0-9\-_]+$/', message: 'SKU can only contain letters, numbers, hyphens and underscores.')]
    private ?string $sku = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2)]
    #[Assert\NotBlank(message: 'The price is required.')]
    #[Assert\Positive(message: 'Price must be greater than zero.')]
    #[Assert\LessThan(value: 100000, message: 'Price cannot exceed $99,999.99.')]
    private ?string $price = null;

    #[ORM\Column(type: Types::INTEGER)]
    #[Assert\PositiveOrZero(message: 'Quantity cannot be negative.')]
    #[Assert\LessThan(value: 1000000, message: 'Quantity cannot exceed 999,999.')]
    private int $quantity = 0;

    #[ORM\Column(length: 255, enumType: ProductType::class)]
    #[Assert\NotNull(message: 'Please select a product type.')]
    private ?ProductType $type = null;

    #[ORM\Column(length: 100, nullable: true)]
    #[Assert\Length(max: 100, maxMessage: 'Dosage cannot exceed {{ limit }} characters.')]
    private ?string $dosage = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    #[Assert\GreaterThan('today', message: 'Expiry date must be in the future.')]
    private ?\DateTimeInterface $expiryDate = null;

    #[ORM\Column(type: Types::BOOLEAN)]
    private bool $isActive = true;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $createdAt = null;

    #[ORM\OneToMany(mappedBy: 'product', targetEntity: Commande::class, orphanRemoval: true)]
    private Collection $commandes;

    public function __construct()
    {
        $this->commandes = new ArrayCollection();
        $this->createdAt = new \DateTime();
    }

    public function getId(): ?int { return $this->id; }

    public function getName(): ?string { return $this->name; }
    public function setName(string $name): static { $this->name = $name; return $this; }

    public function getDescription(): ?string { return $this->description; }
    public function setDescription(?string $description): static { $this->description = $description; return $this; }

    public function getSku(): ?string { return $this->sku; }
    public function setSku(string $sku): static { $this->sku = $sku; return $this; }

    public function getPrice(): ?string { return $this->price; }
    public function setPrice(string $price): static { $this->price = $price; return $this; }

    public function getQuantity(): int { return $this->quantity; }
    public function setQuantity(int $quantity): static { $this->quantity = $quantity; return $this; }

    public function getType(): ?ProductType { return $this->type; }
    public function setType(ProductType $type): static { $this->type = $type; return $this; }

    public function getDosage(): ?string { return $this->dosage; }
    public function setDosage(?string $dosage): static { $this->dosage = $dosage; return $this; }

    public function getExpiryDate(): ?\DateTimeInterface { return $this->expiryDate; }
    public function setExpiryDate(?\DateTimeInterface $expiryDate): static { $this->expiryDate = $expiryDate; return $this; }

    public function isActive(): bool { return $this->isActive; }
    public function setIsActive(bool $isActive): static { $this->isActive = $isActive; return $this; }

    public function getCreatedAt(): ?\DateTimeInterface { return $this->createdAt; }
    public function setCreatedAt(\DateTimeInterface $createdAt): static { $this->createdAt = $createdAt; return $this; }

    /** @return Collection<int, Commande> */
    public function getCommandes(): Collection { return $this->commandes; }

    public function addCommande(Commande $commande): static
    {
        if (!$this->commandes->contains($commande)) {
            $this->commandes->add($commande);
            $commande->setProduct($this);
        }
        return $this;
    }

    public function removeCommande(Commande $commande): static
    {
        if ($this->commandes->removeElement($commande)) {
            if ($commande->getProduct() === $this) {
                $commande->setProduct(null);
            }
        }
        return $this;
    }

    public function __toString(): string
    {
        return $this->name ?? '';
    }
}
