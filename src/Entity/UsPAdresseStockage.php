<?php

namespace App\Entity;

use App\Repository\UsPAdresseStockageRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;



#[ORM\Table(name: 'us_p_adresse_stockage')]
#[ORM\Entity(repositoryClass: UsPAdresseStockageRepository::class)]
class UsPAdresseStockage
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $code;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $designation;

    #[ORM\ManyToOne(targetEntity: Uantenne::class, inversedBy: 'usPAdresseStockages')]
    private $uantenne;

    #[ORM\OneToMany(targetEntity: \App\Entity\UsStockConditionnementCab::class, mappedBy: 'adresse')]
    private $usStockConditionnementCabs;
    
    
    public function __construct()
    {
        $this->usStockConditionnementCabs = new ArrayCollection();
    }
    
    public function getId(): ?int
    {
        return $this->id;
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

    public function getDesignation(): ?string
    {
        return $this->designation;
    }

    public function setDesignation(?string $designation): self
    {
        $this->designation = $designation;

        return $this;
    }

    public function getUantenne(): ?Uantenne
    {
        return $this->uantenne;
    }

    public function setUantenne(?Uantenne $uantenne): self
    {
        $this->uantenne = $uantenne;

        return $this;
    }
     /**
     * @return Collection|UsStockConditionnementCab[]
     */
    public function getUsStockConditionnementCabs(): Collection
    {
        return $this->usStockConditionnementCabs;
    }

    public function addUsStockConditionnementCab(UsStockConditionnementCab $usStockConditionnementCab): self
    {
        if (!$this->usStockConditionnementCabs->contains($usStockConditionnementCab)) {
            $this->usStockConditionnementCabs[] = $usStockConditionnementCab;
            $usStockConditionnementCab->setAdresse($this);
        }

        return $this;
    }

    public function removeUsStockConditionnementCab(UsStockConditionnementCab $usStockConditionnementCab): self
    {
        if ($this->usStockConditionnementCabs->contains($usStockConditionnementCab)) {
            $this->usStockConditionnementCabs->removeElement($usStockConditionnementCab);
            // set the owning side to null (unless already changed)
            if ($usStockConditionnementCab->getAdresse() === $this) {
                $usStockConditionnementCab->setAdresse(null);
            }
        }

        return $this;
    }
}
