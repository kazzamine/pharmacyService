<?php

namespace App\Entity;

use App\Repository\UsersAffectRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UsersAffectRepository::class)]
class UsersAffect
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\ManyToOne(targetEntity: User::class)]
    private $user;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $dossier;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $modul;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $position;

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

    public function getDossier(): ?int
    {
        return $this->dossier;
    }

    public function setDossier(?int $dossier): self
    {
        $this->dossier = $dossier;

        return $this;
    }

    public function getModul(): ?int
    {
        return $this->modul;
    }

    public function setModul(?int $modul): self
    {
        $this->modul = $modul;

        return $this;
    }

    public function getPosition(): ?int
    {
        return $this->position;
    }

    public function setPosition(?int $position): self
    {
        $this->position = $position;

        return $this;
    }
}
