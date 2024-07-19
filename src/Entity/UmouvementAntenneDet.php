<?php

namespace App\Entity;

use App\Entity\DemandStockCab;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity]
class UmouvementAntenneDet
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\JoinColumn(name: 'umouvement_antenne_id', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \App\Entity\UmouvementAntenne::class, inversedBy: 'umouvementAntenneDets')]
    private $umouvementAntenne;
    #[ORM\Column(type: 'datetime', nullable: true)]
    private $created;

    #[ORM\JoinColumn(name: 'antenne_id', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \App\Entity\Uantenne::class)]
    private $antenne;

    #[ORM\ManyToOne(targetEntity: \App\Entity\Uarticle::class)]
    private $article;
    #[ORM\ManyToOne(targetEntity: \App\Entity\User::class)]
    private $userCreated;
    #[ORM\Column(type: 'float', nullable: true)]
    private $quantite;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUmouvementAntenne(): ?UmouvementAntenne
    {
        return $this->umouvementAntenne;
    }

    public function setUmouvementAntenne(?UmouvementAntenne $umouvementAntenne): self
    {
        $this->umouvementAntenne = $umouvementAntenne;

        return $this;
    }


    public function getCreated(): ?\DateTimeInterface
    {
        return $this->created;
    }

    public function setCreated(?\DateTimeInterface $created): self
    {
        $this->created = $created;

        return $this;
    }

    public function getUserCreated(): ?User
    {
        return $this->userCreated;
    }

    public function setUserCreated(?User $userCreated): self
    {
        $this->userCreated = $userCreated;

        return $this;
    }

    public function getQuantite(): ?float
    {
        return $this->quantite;
    }

    public function setQuantite(?float $quantite): self
    {
        $this->quantite = $quantite;

        return $this;
    }

    public function setAntenne(?Uantenne $antenne): self
    {
        $this->antenne = $antenne;
        return $this;
    }

    public function getAntenne(): ?Uantenne
    {
        return $this->antenne;
    }
    public function getArticle(): ?Uarticle
    {
        return $this->article;
    }

    public function setArticle(?Uarticle $article): self
    {
        $this->article = $article;

        return $this;
    }
}
