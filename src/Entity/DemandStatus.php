<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

#[ORM\Entity(repositoryClass: \App\Repository\DemandStatusRepository::class)]
#[ORM\HasLifecycleCallbacks]
class DemandStatus
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

  
    #[ORM\Column(type: 'text', nullable: true)]
    private $designation;

   
    public function getId(): ?int
    {
        return $this->id;
    }
      #[ORM\OneToMany(targetEntity: DemandStockCab::class, mappedBy: 'status')]
    private $demandStockCabs;

    public function __construct()
    {
        $this->demandStockCabs = new ArrayCollection();
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
            $demandStockCab->setStatus($this);
        }

        return $this;
    }

    public function removeDemandStockCab(DemandStockCab $demandStockCab): self
    {
        if ($this->demandStockCabs->removeElement($demandStockCab)) {
            // set the owning side to null (unless already changed)
            if ($demandStockCab->getStatus() === $this) {
                $demandStockCab->setStatus(null);
            }
        }

        return $this;
    }

    
}
