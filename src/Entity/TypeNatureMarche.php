<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: \App\Repository\TypeNatureMarcheRepository::class)]
class TypeNatureMarche
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $designation;

    #[ORM\ManyToOne(targetEntity: \App\Entity\NatureMarche::class, inversedBy: 'typeNatureMarches')]
    private $natureMarche;

    #[ORM\OneToMany(targetEntity: \App\Entity\PMarche::class, mappedBy: 'typeNatureMarche')]
    private $pMarches;

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

    public function getNatureMarche(): ?NatureMarche
    {
        return $this->natureMarche;
    }

    public function setNatureMarche(?NatureMarche $natureMarche): self
    {
        $this->natureMarche = $natureMarche;

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
            $pMarch->setTypeNatureMarche($this);
        }

        return $this;
    }

    public function removePMarch(PMarche $pMarch): self
    {
        if ($this->pMarches->contains($pMarch)) {
            $this->pMarches->removeElement($pMarch);
            // set the owning side to null (unless already changed)
            if ($pMarch->getTypeNatureMarche() === $this) {
                $pMarch->setTypeNatureMarche(null);
            }
        }

        return $this;
    }
}
