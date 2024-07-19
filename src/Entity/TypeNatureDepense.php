<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: \App\Repository\TypeNatureDepenseRepository::class)]
class TypeNatureDepense
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $designation;

    #[ORM\ManyToOne(targetEntity: \App\Entity\natureDepense::class, inversedBy: 'typeNatureDepenses')]
    private $natureDepense;

    #[ORM\ManyToMany(targetEntity: \App\Entity\PMarche::class, inversedBy: 'typeNatureDepenses')]
    private $marche;

    public function __construct()
    {
        $this->marche = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDesignation(): ?string
    {
        return $this->designation;
    }

    public function setDesignation(?string $designation): self
    {
        $this->designation = $designation;

        return $this;
    }

    public function getNatureDepense(): ?natureDepense
    {
        return $this->natureDepense;
    }

    public function setNatureDepense(?natureDepense $natureDepense): self
    {
        $this->natureDepense = $natureDepense;

        return $this;
    }

    /**
     * @return Collection|PMarche[]
     */
    public function getMarche(): Collection
    {
        return $this->marche;
    }

    public function addMarche(PMarche $marche): self
    {
        if (!$this->marche->contains($marche)) {
            $this->marche[] = $marche;
        }

        return $this;
    }

    public function removeMarche(PMarche $marche): self
    {
        if ($this->marche->contains($marche)) {
            $this->marche->removeElement($marche);
        }

        return $this;
    }
}
