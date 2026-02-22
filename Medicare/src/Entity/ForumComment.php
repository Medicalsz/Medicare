<?php

namespace App\Entity;

use App\Repository\ForumCommentRepository;
use App\Entity\ForumCommentReaction;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\User;

#[ORM\Entity(repositoryClass: ForumCommentRepository::class)]
class ForumComment
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: 'text')]
    private ?string $content = null;

    #[ORM\ManyToOne(targetEntity: User::class)]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $author = null;

    #[ORM\ManyToOne(inversedBy: 'comments')]
    #[ORM\JoinColumn(nullable: false)]
    private ?ForumTopic $topic = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\OneToMany(mappedBy: 'comment', targetEntity: ForumCommentReaction::class, cascade: ['remove'], orphanRemoval: true)]
    private Collection $reactions;

    #[ORM\Column]
    private bool $isReported = false;

    #[ORM\Column]
    private bool $isHidden = false;

    #[ORM\ManyToOne(targetEntity: self::class, inversedBy: 'replies')]
    #[ORM\JoinColumn(nullable: true, onDelete: 'SET NULL')]
    private ?self $parent = null;

    #[ORM\OneToMany(mappedBy: 'parent', targetEntity: self::class)]
    #[ORM\OrderBy(['createdAt' => 'ASC'])]
    private Collection $replies;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $reportedReason = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $reportedAt = null;

    #[ORM\ManyToOne(targetEntity: User::class)]
    #[ORM\JoinColumn(nullable: true)]
    private ?User $reportedBy = null;

    public function __construct()
    {
        $this->createdAt = new \DateTimeImmutable();
        $this->reactions = new ArrayCollection();
        $this->replies = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;
        return $this;
    }

    public function getAuthor(): ?User
    {
        return $this->author;
    }

    public function setAuthor(User $author): self
    {
        $this->author = $author;
        return $this;
    }

    public function getTopic(): ?ForumTopic
    {
        return $this->topic;
    }

    public function setTopic(?ForumTopic $topic): self
    {
        $this->topic = $topic;
        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): self
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    public function getReactions(): Collection
    {
        return $this->reactions;
    }

    public function addReaction(ForumCommentReaction $reaction): self
    {
        if (!$this->reactions->contains($reaction)) {
            $this->reactions->add($reaction);
            $reaction->setComment($this);
        }

        return $this;
    }

    public function removeReaction(ForumCommentReaction $reaction): self
    {
        $this->reactions->removeElement($reaction);
        return $this;
    }

    public function isReported(): bool
    {
        return $this->isReported;
    }

    public function setIsReported(bool $isReported): self
    {
        $this->isReported = $isReported;
        return $this;
    }

    public function isHidden(): bool
    {
        return $this->isHidden;
    }

    public function setIsHidden(bool $isHidden): self
    {
        $this->isHidden = $isHidden;
        return $this;
    }

    public function getParent(): ?self
    {
        return $this->parent;
    }

    public function setParent(?self $parent): self
    {
        $this->parent = $parent;
        return $this;
    }

    public function getReplies(): Collection
    {
        return $this->replies;
    }

    public function addReply(self $reply): self
    {
        if (!$this->replies->contains($reply)) {
            $this->replies->add($reply);
            $reply->setParent($this);
        }

        return $this;
    }

    public function removeReply(self $reply): self
    {
        if ($this->replies->removeElement($reply) && $reply->getParent() === $this) {
            $reply->setParent(null);
        }

        return $this;
    }

    public function getReportedReason(): ?string
    {
        return $this->reportedReason;
    }

    public function setReportedReason(?string $reportedReason): self
    {
        $this->reportedReason = $reportedReason;
        return $this;
    }

    public function getReportedAt(): ?\DateTimeImmutable
    {
        return $this->reportedAt;
    }

    public function setReportedAt(?\DateTimeImmutable $reportedAt): self
    {
        $this->reportedAt = $reportedAt;
        return $this;
    }

    public function getReportedBy(): ?User
    {
        return $this->reportedBy;
    }

    public function setReportedBy(?User $reportedBy): self
    {
        $this->reportedBy = $reportedBy;
        return $this;
    }
}
