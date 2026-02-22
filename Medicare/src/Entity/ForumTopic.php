<?php

namespace App\Entity;

use App\Repository\ForumTopicRepository;
use App\Entity\ForumTopicReaction;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\ForumComment;
use App\Entity\User;

#[ORM\Entity(repositoryClass: ForumTopicRepository::class)]
class ForumTopic
{
    public const TYPE_TEXT = 'text';
    public const TYPE_VIDEO = 'video';

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column(type: 'text')]
    private ?string $content = null;

    #[ORM\Column(length: 16, options: ['default' => self::TYPE_TEXT])]
    private string $type = self::TYPE_TEXT;

    #[ORM\Column(length: 500, nullable: true)]
    private ?string $videoUrl = null;

    #[ORM\Column(type: 'text', nullable: true)]
    private ?string $summary = null;

    #[ORM\ManyToOne(targetEntity: User::class)]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $author = null;

    #[ORM\OneToMany(mappedBy: 'topic', targetEntity: ForumComment::class, cascade: ['remove'], orphanRemoval: true)]
    #[ORM\OrderBy(['createdAt' => 'ASC'])]
    private Collection $comments;

    #[ORM\OneToMany(mappedBy: 'topic', targetEntity: ForumTopicReaction::class, cascade: ['remove'], orphanRemoval: true)]
    private Collection $reactions;

    #[ORM\Column]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $updatedAt = null;

    #[ORM\Column]
    private bool $isReported = false;

    #[ORM\Column]
    private bool $isHidden = false;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $reportedReason = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $reportedAt = null;

    #[ORM\ManyToOne(targetEntity: User::class)]
    #[ORM\JoinColumn(nullable: true)]
    private ?User $reportedBy = null;

    public function __construct()
    {
        $this->comments = new ArrayCollection();
        $this->reactions = new ArrayCollection();
        $this->createdAt = new \DateTimeImmutable();
        $this->updatedAt = new \DateTimeImmutable();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;
        return $this;
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

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $normalized = strtolower(trim($type));
        $this->type = in_array($normalized, [self::TYPE_TEXT, self::TYPE_VIDEO], true)
            ? $normalized
            : self::TYPE_TEXT;

        return $this;
    }

    public function isVideoType(): bool
    {
        return $this->type === self::TYPE_VIDEO;
    }

    public function isTextType(): bool
    {
        return $this->type === self::TYPE_TEXT;
    }

    public function getVideoUrl(): ?string
    {
        return $this->videoUrl;
    }

    public function setVideoUrl(?string $videoUrl): self
    {
        $this->videoUrl = $videoUrl !== null ? trim($videoUrl) : null;
        return $this;
    }

    public function getVideoProvider(): ?string
    {
        $url = $this->videoUrl;
        if ($url === null || $url === '') {
            return null;
        }

        $lower = strtolower($url);
        if (str_contains($lower, 'youtube.com') || str_contains($lower, 'youtu.be')) {
            return 'youtube';
        }
        if (str_contains($lower, 'vimeo.com')) {
            return 'vimeo';
        }
        if (preg_match('/\.(mp4|webm|ogg)(\?.*)?$/i', $url) === 1) {
            return 'html5';
        }

        return null;
    }

    public function getVideoEmbedUrl(): ?string
    {
        $url = $this->videoUrl;
        if ($url === null || $url === '') {
            return null;
        }

        $provider = $this->getVideoProvider();
        if ($provider === 'youtube') {
            if (preg_match('~youtu\.be/([^?&/]+)~i', $url, $m) === 1) {
                return 'https://www.youtube.com/embed/' . $m[1];
            }
            if (preg_match('~youtube\.com/watch\?v=([^?&/]+)~i', $url, $m) === 1) {
                return 'https://www.youtube.com/embed/' . $m[1];
            }
            if (preg_match('~youtube\.com/embed/([^?&/]+)~i', $url, $m) === 1) {
                return 'https://www.youtube.com/embed/' . $m[1];
            }
        }

        if ($provider === 'vimeo') {
            if (preg_match('~vimeo\.com/(?:video/)?([0-9]+)~i', $url, $m) === 1) {
                return 'https://player.vimeo.com/video/' . $m[1];
            }
        }

        if ($provider === 'html5') {
            return $url;
        }

        return null;
    }

    public function getSummary(): ?string
    {
        return $this->summary;
    }

    public function setSummary(?string $summary): self
    {
        $this->summary = $summary;
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

    public function getComments(): Collection
    {
        return $this->comments;
    }

    public function getReactions(): Collection
    {
        return $this->reactions;
    }

    public function addReaction(ForumTopicReaction $reaction): self
    {
        if (!$this->reactions->contains($reaction)) {
            $this->reactions->add($reaction);
            $reaction->setTopic($this);
        }

        return $this;
    }

    public function removeReaction(ForumTopicReaction $reaction): self
    {
        $this->reactions->removeElement($reaction);
        return $this;
    }

    public function addComment(ForumComment $comment): self
    {
        if (!$this->comments->contains($comment)) {
            $this->comments->add($comment);
            $comment->setTopic($this);
        }

        return $this;
    }

    public function removeComment(ForumComment $comment): self
    {
        $this->comments->removeElement($comment);
        // orphanRemoval: true supprime le commentaire en base, pas besoin de setTopic(null) (topic est non nullable)

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

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeImmutable $updatedAt): self
    {
        $this->updatedAt = $updatedAt;
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
