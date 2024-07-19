<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: \App\Repository\ImputationBudgetaireRepository::class)]
class ImputationBudgetaire
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $designation;

    #[ORM\OneToMany(targetEntity: \App\Entity\PMarche::class, mappedBy: 'imputation')]
    private $pMarches;

    #[ORM\ManyToOne(targetEntity: \App\Entity\Chapitre::class, inversedBy: 'imputationBudgetaires')]
    private $Chapitre;

    #[ORM\ManyToOne(targetEntity: \App\Entity\Programme::class, inversedBy: 'imputationBudgetaires')]
    private $programme;

    #[ORM\ManyToOne(targetEntity: \App\Entity\Region::class, inversedBy: 'imputationBudgetaires')]
    private $region;

    #[ORM\ManyToOne(targetEntity: \App\Entity\Projet::class, inversedBy: 'imputationBudgetaires')]
    private $Projet;

    #[ORM\ManyToOne(targetEntity: \App\Entity\LigneBudgetaire::class, inversedBy: 'imputationBudgetaires')]
    private $ligneB;

    #[ORM\ManyToOne(targetEntity: \App\Entity\PMarche::class, inversedBy: 'imputationBudgetaires')]
    private $marche;

    #[ORM\Column(type: 'float', nullable: true)]
    private $montantBudgetaire;



    public function __construct()
    {
        $this->pMarches = new ArrayCollection();
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
            $pMarch->setImputation($this);
        }

        return $this;
    }

    public function removePMarch(PMarche $pMarch): self
    {
        if ($this->pMarches->contains($pMarch)) {
            $this->pMarches->removeElement($pMarch);
            // set the owning side to null (unless already changed)
            if ($pMarch->getImputation() === $this) {
                $pMarch->setImputation(null);
            }
        }

        return $this;
    }

    public function getChapitre(): ?Chapitre
    {
        return $this->Chapitre;
    }

    public function setChapitre(?Chapitre $Chapitre): self
    {
        $this->Chapitre = $Chapitre;

        return $this;
    }

    public function getProgramme(): ?Programme
    {
        return $this->programme;
    }

    public function setProgramme(?Programme $programme): self
    {
        $this->programme = $programme;

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

    public function getProjet(): ?Projet
    {
        return $this->Projet;
    }

    public function setProjet(?Projet $Projet): self
    {
        $this->Projet = $Projet;

        return $this;
    }

    public function getLigneB(): ?LigneBudgetaire
    {
        return $this->ligneB;
    }

    public function setLigneB(?LigneBudgetaire $ligneB): self
    {
        $this->ligneB = $ligneB;

        return $this;
    }

    public function getMarche(): ?PMarche
    {
        return $this->marche;
    }

    public function setMarche(?PMarche $marche): self
    {
        $this->marche = $marche;

        return $this;
    }

    public function getMontantBudgetaire(): ?float
    {
        return $this->montantBudgetaire;
    }

    public function setMontantBudgetaire(?float $montantBudgetaire): self
    {
        $this->montantBudgetaire = $montantBudgetaire;

        return $this;
    }
}
