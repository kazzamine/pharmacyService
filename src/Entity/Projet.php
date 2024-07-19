<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: \App\Repository\ProjetRepository::class)]
class Projet
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $intitule;

    #[ORM\ManyToOne(targetEntity: \App\Entity\Region::class, inversedBy: 'projets')]
    private $region;

    #[ORM\OneToMany(targetEntity: \App\Entity\LigneBudgetaire::class, mappedBy: 'projet')]
    private $ligneBudgetaires;

    #[ORM\OneToMany(targetEntity: \App\Entity\PMarche::class, mappedBy: 'projet')]
    private $pMarches;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $code;


    #[ORM\OneToMany(targetEntity: \App\Entity\ImputationBudgetaire::class, mappedBy: 'Projet')]
    private $imputationBudgetaires;


    public function getConcatenatedIntituleAndNom(): string
    {
        return $this->code . ' - ' . $this->intitule;
    }

    public function __construct()
    {
        $this->ligneBudgetaires = new ArrayCollection();
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

    public function getRegion(): ?Region
    {
        return $this->region;
    }

    public function setRegion(?Region $region): self
    {
        $this->region = $region;

        return $this;
    }

    /**
     * @return Collection|LigneBudgetaire[]
     */
    public function getLigneBudgetaires(): Collection
    {
        return $this->ligneBudgetaires;
    }

    public function addLigneBudgetaire(LigneBudgetaire $ligneBudgetaire): self
    {
        if (!$this->ligneBudgetaires->contains($ligneBudgetaire)) {
            $this->ligneBudgetaires[] = $ligneBudgetaire;
            $ligneBudgetaire->setProjet($this);
        }

        return $this;
    }

    public function removeLigneBudgetaire(LigneBudgetaire $ligneBudgetaire): self
    {
        if ($this->ligneBudgetaires->contains($ligneBudgetaire)) {
            $this->ligneBudgetaires->removeElement($ligneBudgetaire);
            // set the owning side to null (unless already changed)
            if ($ligneBudgetaire->getProjet() === $this) {
                $ligneBudgetaire->setProjet(null);
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
            $pMarch->setProjet($this);
        }

        return $this;
    }

    public function removePMarch(PMarche $pMarch): self
    {
        if ($this->pMarches->contains($pMarch)) {
            $this->pMarches->removeElement($pMarch);
            // set the owning side to null (unless already changed)
            if ($pMarch->getProjet() === $this) {
                $pMarch->setProjet(null);
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
            $imputationBudgetaire->setProjet($this);
        }

        return $this;
    }

    public function removeImputationBudgetaire(ImputationBudgetaire $imputationBudgetaire): self
    {
        if ($this->imputationBudgetaires->contains($imputationBudgetaire)) {
            $this->imputationBudgetaires->removeElement($imputationBudgetaire);
            // set the owning side to null (unless already changed)
            if ($imputationBudgetaire->getProjet() === $this) {
                $imputationBudgetaire->setProjet(null);
            }
        }

        return $this;
    }

    
}
