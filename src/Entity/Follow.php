<?php

namespace App\Entity;

use App\Repository\FollowRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FollowRepository::class)]
class Follow
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $followedAt = null;

    #[ORM\ManyToOne(inversedBy: 'follows')]
    private ?User $followedBy = null;

    #[ORM\ManyToOne(inversedBy: 'follows')]
    private ?Forum $forum = null;

    #[ORM\ManyToOne(inversedBy: 'follows')]
    private ?Post $post = null;

    #[ORM\ManyToOne(inversedBy: 'follows')]
    private ?Category $category = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFollowedAt(): ?\DateTimeImmutable
    {
        return $this->followedAt;
    }

    public function setFollowedAt(\DateTimeImmutable $followedAt): static
    {
        $this->followedAt = $followedAt;

        return $this;
    }

    public function getFollowedBy(): ?User
    {
        return $this->followedBy;
    }

    public function setFollowedBy(?User $followedBy): static
    {
        $this->followedBy = $followedBy;

        return $this;
    }

    public function getForum(): ?Forum
    {
        return $this->forum;
    }

    public function setForum(?Forum $forum): static
    {
        $this->forum = $forum;

        return $this;
    }

    public function getPost(): ?Post
    {
        return $this->post;
    }

    public function setPost(?Post $post): static
    {
        $this->post = $post;

        return $this;
    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): static
    {
        $this->category = $category;

        return $this;
    }
}
