<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: \App\Repository\NatureAchatRepository::class)]
class NatureAchat
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $designation;
    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $code;
    
    #[ORM\Column(type: 'boolean', nullable: true)]
    private $active;

        #[ORM\ManyToMany(targetEntity: \App\Entity\PMarche::class, inversedBy: 'natureAchats')]
    private $marche;

    

    public function __construct()
    {
        $this->marche = new ArrayCollection();
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

    /**
     * @return Collection|PMarche[]
     */
    public function getMarche(): Collection
    {
        return $this->marche;
    }

    public function addMarche(PMarche $marche): self
    {
        if (!$this->marche->contains($marche)) {
            $this->marche[] = $marche;
        }

        return $this;
    }

    public function removeMarche(PMarche $marche): self
    {
        if ($this->marche->contains($marche)) {
            $this->marche->removeElement($marche);
        }

        return $this;
    }

}
