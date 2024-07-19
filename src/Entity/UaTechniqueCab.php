<?php

namespace App\Entity;

use App\Repository\UaTechniqueCabRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UaTechniqueCabRepository::class)]
class UaTechniqueCab
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\ManyToOne(targetEntity: TAchatdemandeinternedet::class, inversedBy: 'uaTechniqueCabs')]
    private $da;

    #[ORM\OneToMany(targetEntity: UaTechniqueDet::class, mappedBy: 'UaTechniqueCab')]
    private $uaTechniqueDets;
    #[ORM\ManyToOne(targetEntity: UGeneralOperation::class, inversedBy: 'uaTechniqueCabs')]
    private $uGeneralOperation;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $reference;



    public function __construct()
    {
        $this->uaTechniqueDets = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDa(): ?TAchatdemandeinternedet
    {
        return $this->da;
    }

    public function setDa(?TAchatdemandeinternedet $da): self
    {
        $this->da = $da;

        return $this;
    }
    public function getUGeneralOperation(): ?UGeneralOperation
    {
        return $this->uGeneralOperation;
    }

    public function setUGeneralOperation(?UGeneralOperation $uGeneralOperation): self
    {
        $this->uGeneralOperation = $uGeneralOperation;

        return $this;
    }

    public function getReference(): ?string
    {
        return $this->reference;
    }

    public function setReference(?string $reference): self
    {
        $this->reference = $reference;

        return $this;
    }

    /**
     * @return Collection|UaTechniqueDet[]
     */
    public function getUaTechniqueDets(): Collection
    {
        return $this->uaTechniqueDets;
    }
    
    public function addUaTechniqueDet(UaTechniqueDet $uaTechniqueDet): self
    {
        if (!$this->uaTechniqueDets->contains($uaTechniqueDet)) {
            $this->uaTechniqueDets[] = $uaTechniqueDet;
            $uaTechniqueDet->setUaTechniqueCab($this);
        }

        return $this;
    }
    

    public function removeUaTechniqueDet(UaTechniqueDet $uaTechniqueDet): self
    {
        if ($this->uaTechniqueDets->removeElement($uaTechniqueDet)) {
            // set the owning side to null (unless already changed)
            if ($uaTechniqueDet->getUaTechniqueCab() === $this) {
                $uaTechniqueDet->setUaTechniqueCab(null);
            }
        }

        return $this;
    }
    
    


}
