<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity]
class Medecin implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $nom = null;

    #[ORM\Column(length: 100)]
    private ?string $prenom = null;

    #[ORM\Column(length: 180, unique: true)]
    private ?string $email = null;

    #[ORM\Column(length: 255)]
    private ?string $password = null;

    #[ORM\Column(length: 20, nullable: true)]
    private ?string $numero = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $adresse = null;

    #[ORM\Column(length: 255)]
    private ?string $specialite = null;

    #[ORM\Column(length: 255)]
    private ?string $cabinet = null;

    #[ORM\Column(type: 'text', nullable: true)]
    private ?string $bio = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $ville = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $delegation = null;

    #[ORM\Column(name: 'prixConsultation', type: 'float', nullable: true)]
    private ?float $prixConsultation = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $photo = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $certificate = null;

    #[ORM\Column(length: 100, unique: true, nullable: true)]
    private ?string $username = null;

    #[ORM\Column(name: 'email_privacy', length: 20, options: ['default' => 'public'])]
    private ?string $emailPrivacy = 'public';

    #[ORM\Column(name: 'phone_privacy', length: 20, options: ['default' => 'public'])]
    private ?string $phonePrivacy = 'public';

    #[ORM\Column(name: 'address_privacy', length: 20, options: ['default' => 'public'])]
    private ?string $addressPrivacy = 'public';

    #[ORM\Column(name: 'isVerified', type: 'boolean')]
    private $isVerified = false;

    #[ORM\Column(type: 'date', nullable: true)]
    private ?\DateTimeInterface $dateNaissance = null;

    // ===== GETTERS & SETTERS =====

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;
        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): static
    {
        $this->prenom = $prenom;
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

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): static
    {
        $this->password = $password;
        return $this;
    }

    public function getNumero(): ?string
    {
        return $this->numero;
    }

    public function setNumero(?string $numero): static
    {
        $this->numero = $numero;
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

    public function getSpecialite(): ?string
    {
        return $this->specialite;
    }

    public function setSpecialite(string $specialite): static
    {
        $this->specialite = $specialite;
        return $this;
    }

    public function getCabinet(): ?string
    {
        return $this->cabinet;
    }

    public function setCabinet(string $cabinet): static
    {
        $this->cabinet = $cabinet;
        return $this;
    }

    public function getBio(): ?string
    {
        return $this->bio;
    }

    public function setBio(?string $bio): static
    {
        $this->bio = $bio;
        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(?string $ville): static
    {
        $this->ville = $ville;
        return $this;
    }

    public function getDelegation(): ?string
    {
        return $this->delegation;
    }

    public function setDelegation(?string $delegation): static
    {
        $this->delegation = $delegation;
        return $this;
    }

    public function getPrixConsultation(): ?float
    {
        return $this->prixConsultation;
    }

    public function setPrixConsultation(?float $prixConsultation): static
    {
        $this->prixConsultation = $prixConsultation;
        return $this;
    }

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(?string $photo): static
    {
        $this->photo = $photo;
        return $this;
    }

    public function getCertificate(): ?string
    {
        return $this->certificate;
    }

    public function setCertificate(?string $certificate): static
    {
        $this->certificate = $certificate;
        return $this;
    }

    public function isVerified(): bool
    {
        return $this->isVerified;
    }

    public function setIsVerified(bool $isVerified): static
    {
        $this->isVerified = $isVerified;
        return $this;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(?string $username): static
    {
        $this->username = $username;
        return $this;
    }

    public function getEmailPrivacy(): ?string
    {
        return $this->emailPrivacy;
    }

    public function setEmailPrivacy(?string $emailPrivacy): static
    {
        $this->emailPrivacy = $emailPrivacy ?? 'public';
        return $this;
    }

    public function getPhonePrivacy(): ?string
    {
        return $this->phonePrivacy;
    }

    public function setPhonePrivacy(?string $phonePrivacy): static
    {
        $this->phonePrivacy = $phonePrivacy ?? 'public';
        return $this;
    }

    public function getAddressPrivacy(): ?string
    {
        return $this->addressPrivacy;
    }

    public function setAddressPrivacy(?string $addressPrivacy): static
    {
        $this->addressPrivacy = $addressPrivacy ?? 'public';
        return $this;
    }

    public function getFullName(): string
    {
        return $this->prenom . ' ' . $this->nom;
    }

    public function getRoles(): array
    {
        return ['ROLE_MEDECIN', 'ROLE_USER'];
    }

    public function getUserIdentifier(): string
    {
        return $this->username ?? $this->email;
    }

    public function eraseCredentials(): void
    {
        // If you store any temporary sensitive data, clean it here
    }

    public function getDateNaissance(): ?\DateTimeInterface
    {
        return $this->dateNaissance;
    }

    public function setDateNaissance(?\DateTimeInterface $dateNaissance): static
    {
        $this->dateNaissance = $dateNaissance;
        return $this;
    }
}
