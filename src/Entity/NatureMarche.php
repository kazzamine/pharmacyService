<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: \App\Repository\NatureMarcheRepository::class)]
class NatureMarche
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $Designation;

    #[ORM\OneToMany(targetEntity: \App\Entity\TypeNatureMarche::class, mappedBy: 'natureMarche')]
    private $typeNatureMarches;

    public function __construct()
    {
        $this->typeNatureMarches = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDesignation(): ?string
    {
        return $this->Designation;
    }

    public function setDesignation(?string $Designation): self
    {
        $this->Designation = $Designation;

        return $this;
    }



    /**
     * @return Collection|TypeNatureMarche[]
     */
    public function getTypeNatureMarches(): Collection
    {
        return $this->typeNatureMarches;
    }

    public function addTypeNatureMarch(TypeNatureMarche $typeNatureMarch): self
    {
        if (!$this->typeNatureMarches->contains($typeNatureMarch)) {
            $this->typeNatureMarches[] = $typeNatureMarch;
            $typeNatureMarch->setNatureMarche($this);
        }

        return $this;
    }

    public function removeTypeNatureMarch(TypeNatureMarche $typeNatureMarch): self
    {
        if ($this->typeNatureMarches->contains($typeNatureMarch)) {
            $this->typeNatureMarches->removeElement($typeNatureMarch);
            // set the owning side to null (unless already changed)
            if ($typeNatureMarch->getNatureMarche() === $this) {
                $typeNatureMarch->setNatureMarche(null);
            }
        }

        return $this;
    }
}
