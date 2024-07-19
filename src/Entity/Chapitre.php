<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: \App\Repository\ChapitreRepository::class)]
class Chapitre
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $nom;

    #[ORM\OneToMany(targetEntity: \App\Entity\Programme::class, mappedBy: 'chapitre')]
    private $programmes;

    #[ORM\OneToMany(targetEntity: \App\Entity\PMarche::class, mappedBy: 'chapitre')]
    private $pMarches;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $code;

    #[ORM\OneToMany(targetEntity: \App\Entity\ImputationBudgetaire::class, mappedBy: 'Chapitre')]
    private $imputationBudgetaires;


    public function getConcatenatedCodeAndNom(): string
    {
        return $this->code . ' - ' . $this->nom;
    }

    public function __construct()
    {
        $this->programmes = new ArrayCollection();
        $this->pMarches = new ArrayCollection();
        $this->imputationBudgetaires = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(?string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * @return Collection|Programme[]
     */
    public function getProgrammes(): Collection
    {
        return $this->programmes;
    }

    public function addProgramme(Programme $programme): self
    {
        if (!$this->programmes->contains($programme)) {
            $this->programmes[] = $programme;
            $programme->setChapitre($this);
        }

        return $this;
    }

    public function removeProgramme(Programme $programme): self
    {
        if ($this->programmes->contains($programme)) {
            $this->programmes->removeElement($programme);
            // set the owning side to null (unless already changed)
            if ($programme->getChapitre() === $this) {
                $programme->setChapitre(null);
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
            $pMarch->setChapitre($this);
        }

        return $this;
    }

    public function removePMarch(PMarche $pMarch): self
    {
        if ($this->pMarches->contains($pMarch)) {
            $this->pMarches->removeElement($pMarch);
            // set the owning side to null (unless already changed)
            if ($pMarch->getChapitre() === $this) {
                $pMarch->setChapitre(null);
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
            $imputationBudgetaire->setChapitre($this);
        }

        return $this;
    }

    public function removeImputationBudgetaire(ImputationBudgetaire $imputationBudgetaire): self
    {
        if ($this->imputationBudgetaires->contains($imputationBudgetaire)) {
            $this->imputationBudgetaires->removeElement($imputationBudgetaire);
            // set the owning side to null (unless already changed)
            if ($imputationBudgetaire->getChapitre() === $this) {
                $imputationBudgetaire->setChapitre(null);
            }
        }

        return $this;
    }


}
