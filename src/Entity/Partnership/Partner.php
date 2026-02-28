<?php

namespace App\Entity\Partnership;

use App\Enum\Partnership\StatutPartenaire;
use App\Enum\Partnership\TypePartenaire;
use App\Repository\Partnership\PartnerRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Attribute as Vich;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

#[ORM\Entity(repositoryClass: \App\Repository\Partnership\PartnerRepository::class)]
#[UniqueEntity(fields: ['email'], message: 'Ce partenaire est déjà enregistré avec cet email.')]
#[Vich\Uploadable]
class Partner
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[Vich\UploadableField(mapping: 'partner_image', fileNameProperty: 'imageName')]
    #[Assert\File(
        maxSize: '2M',
        mimeTypes: ['image/jpeg', 'image/png', 'image/webp'],
        mimeTypesMessage: 'Veuillez uploader une image valide (JPG, PNG, WEBP)'
    )]
    private ?File $imageFile = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private ?string $imageName = null;

    #[ORM\Column(type: Types::DATETIME_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $updatedAt = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: 'Le nom est obligatoire')]
    #[Assert\Length(min: 2, max: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: 'L\'adresse est obligatoire')]
    private ?string $adresse = null;

    #[ORM\Column(length: 20)]
    #[Assert\NotBlank(message: 'Le téléphone est obligatoire')]
    private ?string $telephone = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: 'L\'email est obligatoire')]
    #[Assert\Email(message: 'L\'email {{ value }} n\'est pas valide')]
    private ?string $email = null;

    #[ORM\Column(type: Types::DATE_IMMUTABLE)]
    #[Assert\NotNull(message: 'La date de partenariat est obligatoire')]
    private ?\DateTimeImmutable $datePartenariat = null;

    #[ORM\Column(type: 'string', enumType: TypePartenaire::class)]
    #[Assert\NotNull(message: 'Le type de partenaire est obligatoire')]
    private ?TypePartenaire $typePartenaire = null;

    #[ORM\Column(type: 'string', enumType: StatutPartenaire::class)]
    #[Assert\NotNull(message: 'Le statut est obligatoire')]
    private ?StatutPartenaire $statut = null;

    #[ORM\OneToMany(mappedBy: 'partner', targetEntity: Collaboration::class, orphanRemoval: true)]
    private Collection $collaborations;

    #[ORM\OneToMany(mappedBy: 'partner', targetEntity: PartnerRating::class, orphanRemoval: true)]
    private Collection $ratings;

    public function __construct()
    {
        $this->collaborations = new ArrayCollection();
        $this->datePartenariat = new \DateTimeImmutable();
        $this->ratings = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): static
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(string $telephone): static
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getDatePartenariat(): ?\DateTimeImmutable
    {
        return $this->datePartenariat;
    }

    public function setDatePartenariat(\DateTimeImmutable $datePartenariat): static
    {
        $this->datePartenariat = $datePartenariat;

        return $this;
    }

    public function getTypePartenaire(): ?TypePartenaire
    {
        return $this->typePartenaire;
    }

    public function setTypePartenaire(TypePartenaire $typePartenaire): static
    {
        $this->typePartenaire = $typePartenaire;

        return $this;
    }

    public function getStatut(): ?StatutPartenaire
    {
        return $this->statut;
    }

    public function setStatut(StatutPartenaire $statut): static
    {
        $this->statut = $statut;

        return $this;
    }

    public function setImageFile(?File $imageFile = null): void
    {
        $this->imageFile = $imageFile;

        if (null !== $imageFile) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt = new \DateTimeImmutable();
        }
    }

    public function getImageFile(): ?File
    {
        return $this->imageFile;
    }

    public function setImageName(?string $imageName): void
    {
        $this->imageName = $imageName;
    }

    public function getImageName(): ?string
    {
        return $this->imageName;
    }

    /**
     * @return Collection<int, Collaboration>
     */
    public function getCollaborations(): Collection
    {
        return $this->collaborations;
    }

    public function addCollaboration(Collaboration $collaboration): static
    {
        if (!$this->collaborations->contains($collaboration)) {
            $this->collaborations->add($collaboration);
            $collaboration->setPartner($this);
        }

        return $this;
    }

    public function removeCollaboration(Collaboration $collaboration): static
    {
        if ($this->collaborations->removeElement($collaboration)) {
            // set the owning side to null (unless already changed)
            if ($collaboration->getPartner() === $this) {
                $collaboration->setPartner(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, PartnerRating>
     */
    public function getRatings(): Collection
    {
        return $this->ratings;
    }

    public function addRating(PartnerRating $rating): static
    {
        if (!$this->ratings->contains($rating)) {
            $this->ratings->add($rating);
            $rating->setPartner($this);
        }

        return $this;
    }

    public function removeRating(PartnerRating $rating): static
    {
        if ($this->ratings->removeElement($rating)) {
            // set the owning side to null (unless already changed)
            if ($rating->getPartner() === $this) {
                $rating->setPartner(null);
            }
        }

        return $this;
    }

    public function getAverageRating(): ?float
    {
        $ratings = $this->getRatings();

        if ($ratings->isEmpty()) {
            return null;
        }

        $total = 0;
        foreach ($ratings as $rating) {
            $total += $rating->getRating();
        }

        return $total / $ratings->count();
    }
}