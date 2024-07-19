<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: \App\Repository\NatureDepenseRepository::class)]
class NatureDepense
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $designation;

    #[ORM\OneToMany(targetEntity: \App\Entity\PMarche::class, mappedBy: 'natureDepense')]
    private $pMarches;

    #[ORM\OneToMany(targetEntity: \App\Entity\TypeNatureDepense::class, mappedBy: 'natureDepense')]
    private $typeNatureDepenses;



    public function __construct()
    {
        $this->pMarches = new ArrayCollection();
        $this->typeNatureDepenses = new ArrayCollection();

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

    /**
     * @return Collection|PMarche[]
     */
    public function getPMarches(): Collection
    {
        return $this->pMarches;
    }

    public function addPMarch(PMarche $pMarch): self
    {
        if (!$this->pMarches->contains($pMarch)) {
            $this->pMarches[] = $pMarch;
            $pMarch->setNatureDepense($this);
        }

        return $this;
    }

    public function removePMarch(PMarche $pMarch): self
    {
        if ($this->pMarches->contains($pMarch)) {
            $this->pMarches->removeElement($pMarch);
            // set the owning side to null (unless already changed)
            if ($pMarch->getNatureDepense() === $this) {
                $pMarch->setNatureDepense(null);
            }
        }

        return $this;
    }


    /**
     * @return Collection|TypeNatureDepense[]
     */
    public function getTypeNatureDepenses(): Collection
    {
        return $this->typeNatureDepenses;
    }

    public function addTypeNatureDepense(TypeNatureDepense $typeNatureDepense): self
    {
        if (!$this->typeNatureDepenses->contains($typeNatureDepense)) {
            $this->typeNatureDepenses[] = $typeNatureDepense;
            $typeNatureDepense->setNatureDepense($this);
        }

        return $this;
    }

    public function removeTypeNatureDepense(TypeNatureDepense $typeNatureDepense): self
    {
        if ($this->typeNatureDepenses->contains($typeNatureDepense)) {
            $this->typeNatureDepenses->removeElement($typeNatureDepense);
            // set the owning side to null (unless already changed)
            if ($typeNatureDepense->getNatureDepense() === $this) {
                $typeNatureDepense->setNatureDepense(null);
            }
        }

        return $this;
    }

    
}
