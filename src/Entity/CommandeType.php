<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
#[ORM\Entity(repositoryClass: \App\Repository\CommandeTypeRepository::class)]
#[ORM\HasLifecycleCallbacks]
class CommandeType
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;
   #[ORM\OneToMany(targetEntity: DemandStockCab::class, mappedBy: 'commandeType', orphanRemoval: true)]
    private $demandStockCabs;
  
    #[ORM\Column(type: 'text', nullable: true)]
    private $designation;
    
     #[ORM\Column(type: 'boolean', nullable: true)]
    private $active;
    #[ORM\Column(type: 'text', nullable: true)]
    private $code;

    public function __construct()
    {
        $this->demandStockCabs = new ArrayCollection();
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
   
    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(?string $code): self
    {
        $this->code = $code;

        return $this;
    }
    
    public function getActive(): ?bool {
        return $this->active;
    }

    public function setActive(?bool $active): self {
        $this->active = $active;

        return $this;
    }
  /**
     * @return Collection|DemandStockCab[]
     */
    public function getDemandStockCabs(): Collection
    {
        return $this->demandStockCabs;
    }

    public function addDemandStockCab(DemandStockCab $demandStockCab): self
    {
        if (!$this->demandStockCabs->contains($demandStockCab)) {
            $this->demandStockCabs[] = $demandStockCab;
            $demandStockCab->setCommandeType($this);
        }

        return $this;
    }

    public function removeDemandStockCab(DemandStockCab $demandStockCab): self
    {
        if ($this->demandStockCabs->removeElement($demandStockCab)) {
            // set the owning side to null (unless already changed)
            if ($demandStockCab->getCommandeType() === $this) {
                $demandStockCab->setCommandeType(null);
            }
        }

        return $this;
    }
    
}
