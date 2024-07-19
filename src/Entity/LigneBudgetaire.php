<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: \App\Repository\LigneBudgetaireRepository::class)]
class LigneBudgetaire
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $intitule;

    #[ORM\ManyToOne(targetEntity: \App\Entity\Projet::class, inversedBy: 'ligneBudgetaires')]
    private $projet;

    #[ORM\OneToMany(targetEntity: \App\Entity\PMarche::class, mappedBy: 'ligneB')]
    private $pMarches;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $code;

    #[ORM\OneToMany(targetEntity: \App\Entity\ImputationBudgetaire::class, mappedBy: 'ligneB')]
    private $imputationBudgetaires;

    public function getConcatenatedIntituleAndNom(): string
    {
        return $this->code . ' - ' . $this->intitule;
    }


    public function __construct()
    {
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

    public function getProjet(): ?Projet
    {
        return $this->projet;
    }

    public function setProjet(?Projet $projet): self
    {
        $this->projet = $projet;

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
            $pMarch->setLigneB($this);
        }

        return $this;
    }

    public function removePMarch(PMarche $pMarch): self
    {
        if ($this->pMarches->contains($pMarch)) {
            $this->pMarches->removeElement($pMarch);
            // set the owning side to null (unless already changed)
            if ($pMarch->getLigneB() === $this) {
                $pMarch->setLigneB(null);
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
            $imputationBudgetaire->setLigneB($this);
        }

        return $this;
    }

    public function removeImputationBudgetaire(ImputationBudgetaire $imputationBudgetaire): self
    {
        if ($this->imputationBudgetaires->contains($imputationBudgetaire)) {
            $this->imputationBudgetaires->removeElement($imputationBudgetaire);
            // set the owning side to null (unless already changed)
            if ($imputationBudgetaire->getLigneB() === $this) {
                $imputationBudgetaire->setLigneB(null);
            }
        }

        return $this;
    }


}
