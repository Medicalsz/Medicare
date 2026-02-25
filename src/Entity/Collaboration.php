<?php

namespace App\Entity;

use App\Repository\CollaborationRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CollaborationRepository::class)]
#[ORM\Table(name: 'collaboration')]
class Collaboration
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'bigint')]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: Partner::class)]
    #[ORM\JoinColumn(name: 'partner_id', referencedColumnName: 'id', nullable: false, onDelete: 'CASCADE')]
    private Partner $partner;

    #[ORM\Column(type: 'bigint', nullable: true, name: 'organization_id')]
    private ?int $organizationId = null;

    #[ORM\Column(type: 'date', name: 'contract_start')]
    private \DateTimeInterface $contractStart;

    #[ORM\Column(type: 'date', nullable: true, name: 'contract_end')]
    private ?\DateTimeInterface $contractEnd = null;

    #[ORM\Column(type: 'string', length: 30)]
    private string $status = 'active';

    #[ORM\Column(type: 'text', nullable: true)]
    private ?string $terms = null;

    #[ORM\Column(type: 'datetime', name: 'created_at')]
    private \DateTimeInterface $createdAt;

    #[ORM\Column(type: 'datetime', name: 'updated_at')]
    private \DateTimeInterface $updatedAt;

    public function __construct()
    {
        $this->createdAt = new \DateTimeImmutable();
        $this->updatedAt = new \DateTimeImmutable();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPartner(): Partner
    {
        return $this->partner;
    }

    public function setPartner(Partner $partner): self
    {
        $this->partner = $partner;

        return $this;
    }

    public function getOrganizationId(): ?int
    {
        return $this->organizationId;
    }

    public function setOrganizationId(?int $organizationId): self
    {
        $this->organizationId = $organizationId;

        return $this;
    }

    public function getContractStart(): \DateTimeInterface
    {
        return $this->contractStart;
    }

    public function setContractStart(\DateTimeInterface $contractStart): self
    {
        $this->contractStart = $contractStart;

        return $this;
    }

    public function getContractEnd(): ?\DateTimeInterface
    {
        return $this->contractEnd;
    }

    public function setContractEnd(?\DateTimeInterface $contractEnd): self
    {
        $this->contractEnd = $contractEnd;

        return $this;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function setStatus(string $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getTerms(): ?string
    {
        return $this->terms;
    }

    public function setTerms(?string $terms): self
    {
        $this->terms = $terms;

        return $this;
    }

    public function getCreatedAt(): \DateTimeInterface
    {
        return $this->createdAt;
    }

    public function getUpdatedAt(): \DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeInterface $dt): self
    {
        $this->updatedAt = $dt;

        return $this;
    }
}
