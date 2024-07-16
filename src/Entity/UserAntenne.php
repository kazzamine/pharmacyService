<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: "App\Repository\UserAntenneRepository")]
class UserAntenne
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    private $id;

    #[ORM\ManyToOne(targetEntity: "User", inversedBy: "userAntennes")]
    #[ORM\JoinColumn(nullable: false)]
    private $user;

    #[ORM\ManyToOne(targetEntity: "Uantenne", inversedBy: "userAntennes")]
    #[ORM\JoinColumn(nullable: false)]
    private $uantenne;

    #[ORM\Column(type: "datetime")]
    private $dateCreated;

    #[ORM\Column(type: "boolean")]
    private $active;

    // Getters and setters
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;
        return $this;
    }

    public function getUantenne(): ?Uantenne
    {
        return $this->uantenne;
    }

    public function setUantenne(?Uantenne $uantenne): self
    {
        $this->uantenne = $uantenne;
        return $this;
    }

    public function getDateCreated(): ?\DateTimeInterface
    {
        return $this->dateCreated;
    }

    public function setDateCreated(\DateTimeInterface $dateCreated): self
    {
        $this->dateCreated = $dateCreated;
        return $this;
    }

    public function isActive(): ?bool
    {
        return $this->active;
    }

    public function setActive(bool $active): self
    {
        $this->active = $active;
        return $this;
    }
}
