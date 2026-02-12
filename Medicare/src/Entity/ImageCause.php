<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
class ImageCause
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $urlImage = null;

    #[ORM\ManyToOne(inversedBy: 'images')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Cause $cause = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUrlImage(): ?string
    {
        return $this->urlImage;
    }

    public function setUrlImage(string $urlImage): static
    {
        $this->urlImage = $urlImage;
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
}
