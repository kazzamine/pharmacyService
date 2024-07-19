<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: \App\Repository\UFactureTypeRepository::class)]
class UFactureType
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $code;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $designation;

    #[ORM\OneToMany(targetEntity: \App\Entity\UaTFacturefrscab::class, mappedBy: 'factureType')]
    private $uaTFacturefrscabs;

    public function __construct()
    {
        $this->uaTFacturefrscabs = new ArrayCollection();
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

    /**
     * @return Collection|UaTFacturefrscab[]
     */
    public function getUaTFacturefrscabs(): Collection
    {
        return $this->uaTFacturefrscabs;
    }

    public function addUaTFacturefrscab(UaTFacturefrscab $uaTFacturefrscab): self
    {
        if (!$this->uaTFacturefrscabs->contains($uaTFacturefrscab)) {
            $this->uaTFacturefrscabs[] = $uaTFacturefrscab;
            $uaTFacturefrscab->setFactureType($this);
        }

        return $this;
    }

    public function removeUaTFacturefrscab(UaTFacturefrscab $uaTFacturefrscab): self
    {
        if ($this->uaTFacturefrscabs->contains($uaTFacturefrscab)) {
            $this->uaTFacturefrscabs->removeElement($uaTFacturefrscab);
            // set the owning side to null (unless already changed)
            if ($uaTFacturefrscab->getFactureType() === $this) {
                $uaTFacturefrscab->setFactureType(null);
            }
        }

        return $this;
    }
}
