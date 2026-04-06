<?php

namespace App\Entity;

use App\Repository\CommandeRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: CommandeRepository::class)]
#[ORM\Index(columns: ['commande_number'], name: 'idx_commande_number')]
#[ORM\Index(columns: ['status'], name: 'idx_status')]
#[UniqueEntity(fields: ['commandeNumber'], message: 'This commande number already exists.')]
class Commande
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100, unique: true)]
    #[Assert\NotBlank(message: 'Commande number is required.')]
    #[Assert\Length(max: 100, maxMessage: 'Commande number cannot exceed {{ limit }} characters.')]
    private ?string $commandeNumber = null;

    #[ORM\ManyToOne(inversedBy: 'commandes')]
    #[ORM\JoinColumn(nullable: false)]
    #[Assert\NotNull(message: 'Please select a product.')]
    private ?Product $product = null;

    #[ORM\Column(type: Types::INTEGER)]
    #[Assert\NotBlank(message: 'Quantity is required.')]
    #[Assert\Positive(message: 'Quantity must be at least 1.')]
    #[Assert\LessThan(value: 10000, message: 'Quantity cannot exceed 9,999.')]
    private int $quantity = 1;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2)]
    private ?string $totalPrice = null;

    #[ORM\Column(length: 50)]
    #[Assert\NotBlank(message: 'Status is required.')]
    #[Assert\Choice(choices: ['PENDING', 'PAID', 'CANCELLED'], message: 'Invalid status value.')]
    private string $status = 'PENDING';

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $stripePaymentIntentId = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    #[Assert\Length(max: 2000, maxMessage: 'Notes cannot exceed {{ limit }} characters.')]
    private ?string $notes = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $commandeDate = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $deliveryDate = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $createdAt = null;

    public function __construct()
    {
        $this->createdAt = new \DateTime();
        $this->commandeDate = new \DateTime();
    }

    public function getId(): ?int { return $this->id; }

    public function getCommandeNumber(): ?string { return $this->commandeNumber; }
    public function setCommandeNumber(string $commandeNumber): static { $this->commandeNumber = $commandeNumber; return $this; }

    public function getProduct(): ?Product { return $this->product; }
    public function setProduct(?Product $product): static { $this->product = $product; return $this; }

    public function getQuantity(): int { return $this->quantity; }
    public function setQuantity(int $quantity): static { $this->quantity = $quantity; return $this; }

    public function getTotalPrice(): ?string { return $this->totalPrice; }
    public function setTotalPrice(string $totalPrice): static { $this->totalPrice = $totalPrice; return $this; }

    public function getStatus(): string { return $this->status; }
    public function setStatus(string $status): static { $this->status = $status; return $this; }

    public function getNotes(): ?string { return $this->notes; }
    public function setNotes(?string $notes): static { $this->notes = $notes; return $this; }

    public function getCommandeDate(): ?\DateTimeInterface { return $this->commandeDate; }
    public function setCommandeDate(\DateTimeInterface $commandeDate): static { $this->commandeDate = $commandeDate; return $this; }

    public function getDeliveryDate(): ?\DateTimeInterface { return $this->deliveryDate; }
    public function setDeliveryDate(?\DateTimeInterface $deliveryDate): static { $this->deliveryDate = $deliveryDate; return $this; }

    public function getCreatedAt(): ?\DateTimeInterface { return $this->createdAt; }
    public function setCreatedAt(\DateTimeInterface $createdAt): static { $this->createdAt = $createdAt; return $this; }

    public function getStripePaymentIntentId(): ?string { return $this->stripePaymentIntentId; }
    public function setStripePaymentIntentId(?string $stripePaymentIntentId): static { $this->stripePaymentIntentId = $stripePaymentIntentId; return $this; }

    public function calculateTotalPrice(): void
    {
        if ($this->product && $this->product->getPrice()) {
            $this->totalPrice = bcmul($this->product->getPrice(), (string) $this->quantity, 2);
        }
    }

    public function getStatusBadgeClass(): string
    {
        return match ($this->status) {
            'PENDING' => 'badge-warning',
            'PAID' => 'badge-success',
            'CANCELLED' => 'badge-danger',
            default => 'badge-secondary',
        };
    }
}
