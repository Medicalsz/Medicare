<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;

#[ORM\Entity]
#[UniqueEntity(fields: ['email'], message: 'There is already an account with this email', ignoreNull: true)]
#[UniqueEntity(fields: ['username'], message: 'There is already an account with this username', ignoreNull: true)]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $nom = null;

    #[ORM\Column(length: 100)]
    private ?string $prenom = null;

    #[ORM\Column(length: 100, unique: true)]
    private ?string $username = null;

    #[ORM\Column(length: 180, unique: true)]
    private ?string $email = null;

    #[ORM\Column(length: 255)]
    private ?string $password = null;

    #[ORM\Column(length: 20, nullable: true)]
    private ?string $numero = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $adresse = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $photo = null;

    #[ORM\Column(type: 'boolean')]
    private $isVerified = false;

    #[ORM\Column(name: 'email_privacy', length: 20, options: ['default' => 'public'])]
    private ?string $emailPrivacy = 'public';

    #[ORM\Column(name: 'phone_privacy', length: 20, options: ['default' => 'public'])]
    private ?string $phonePrivacy = 'public';

    #[ORM\Column(name: 'address_privacy', length: 20, options: ['default' => 'public'])]
    private ?string $addressPrivacy = 'public';

    #[ORM\Column(type: 'json', nullable: false)]
    private array $roles = [];

    #[ORM\Column(name: 'is_private', type: 'boolean', options: ['default' => false])]
    private bool $isPrivate = false;

    #[ORM\Column(name: 'password_reset_token', length: 255, nullable: true)]
    private ?string $passwordResetToken = null;

    #[ORM\Column(name: 'password_reset_token_expiry', type: 'datetime', nullable: true)]
    private ?\DateTime $passwordResetTokenExpiry = null;

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

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): static
    {
        $this->username = $username;
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

    public function setAdresse(?string $adresse): static
    {
        $this->adresse = $adresse;
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

    public function isPrivate(): bool
    {
        return $this->isPrivate;
    }

    public function setIsPrivate(bool $isPrivate): static
    {
        $this->isPrivate = $isPrivate;
        return $this;
    }

    public function getPasswordResetToken(): ?string
    {
        return $this->passwordResetToken;
    }

    public function setPasswordResetToken(?string $passwordResetToken): static
    {
        $this->passwordResetToken = $passwordResetToken;
        return $this;
    }

    public function getPasswordResetTokenExpiry(): ?\DateTime
    {
        return $this->passwordResetTokenExpiry;
    }

    public function setPasswordResetTokenExpiry(?\DateTime $passwordResetTokenExpiry): static
    {
        $this->passwordResetTokenExpiry = $passwordResetTokenExpiry;
        return $this;
    }

    public function getRoles(): array
    {
        $roles = $this->roles ?? [];
        // Ensure ROLE_USER is always present
        if (!in_array('ROLE_USER', $roles)) {
            $roles[] = 'ROLE_USER';
        }
        return $roles;
    }

    public function setRoles(array $roles): static
    {
        $this->roles = $roles;
        return $this;
    }

    public function getUserIdentifier(): string
    {
        return $this->username ?? $this->email;
    }

    public function eraseCredentials(): void
    {
        // If you store any temporary sensitive data, clean it here
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

    public function getFullName(): string
    {
        return $this->prenom . ' ' . $this->nom;
    }
}
