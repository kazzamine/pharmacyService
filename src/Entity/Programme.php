<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: \App\Repository\ProgrammeRepository::class)]
class Programme
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $intitule;

    #[ORM\ManyToOne(targetEntity: \App\Entity\Chapitre::class, inversedBy: 'programmes')]
    private $chapitre;

    #[ORM\OneToMany(targetEntity: \App\Entity\Region::class, mappedBy: 'programme')]
    private $regions;

    #[ORM\OneToMany(targetEntity: \App\Entity\PMarche::class, mappedBy: 'programme')]
    private $pMarches;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $code;

    #[ORM\OneToMany(targetEntity: \App\Entity\ImputationBudgetaire::class, mappedBy: 'programme')]
    private $imputationBudgetaires;


    public function getConcatenatedIntituleAndNom(): string
    {
        return $this->code . ' - ' . $this->intitule;
    }

    public function __construct()
    {
        $this->regions = new ArrayCollection();
        $this->pMarches = new ArrayCollection();
        $this->imputationBudgetaires = new ArrayCollection();

    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIntitule(): ?string
    {
        return $this->intitule;
    }

    public function setIntitule(?string $intitule): self
    {
        $this->intitule = $intitule;

        return $this;
    }

    public function getChapitre(): ?Chapitre
    {
        return $this->chapitre;
    }

    public function setChapitre(?Chapitre $chapitre): self
    {
        $this->chapitre = $chapitre;

        return $this;
    }

    /**
     * @return Collection|Region[]
     */
    public function getRegions(): Collection
    {
        return $this->regions;
    }

    public function addRegion(Region $region): self
    {
        if (!$this->regions->contains($region)) {
            $this->regions[] = $region;
            $region->setProgramme($this);
        }

        return $this;
    }

    public function removeRegion(Region $region): self
    {
        if ($this->regions->contains($region)) {
            $this->regions->removeElement($region);
            // set the owning side to null (unless already changed)
            if ($region->getProgramme() === $this) {
                $region->setProgramme(null);
            }
        }

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
            $pMarch->setProgramme($this);
        }

        return $this;
    }

    public function removePMarch(PMarche $pMarch): self
    {
        if ($this->pMarches->contains($pMarch)) {
            $this->pMarches->removeElement($pMarch);
            // set the owning side to null (unless already changed)
            if ($pMarch->getProgramme() === $this) {
                $pMarch->setProgramme(null);
            }
        }

        return $this;
    }

     public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(?string $code): self
    {
        $this->code = $code;

        return $this;
    }

    /**
     * @return Collection|ImputationBudgetaire[]
     */
    public function getImputationBudgetaires(): Collection
    {
        return $this->imputationBudgetaires;
    }

    public function addImputationBudgetaire(ImputationBudgetaire $imputationBudgetaire): self
    {
        if (!$this->imputationBudgetaires->contains($imputationBudgetaire)) {
            $this->imputationBudgetaires[] = $imputationBudgetaire;
            $imputationBudgetaire->setProgramme($this);
        }

        return $this;
    }

    public function removeImputationBudgetaire(ImputationBudgetaire $imputationBudgetaire): self
    {
        if ($this->imputationBudgetaires->contains($imputationBudgetaire)) {
            $this->imputationBudgetaires->removeElement($imputationBudgetaire);
            // set the owning side to null (unless already changed)
            if ($imputationBudgetaire->getProgramme() === $this) {
                $imputationBudgetaire->setProgramme(null);
            }
        }

        return $this;
    }
}
