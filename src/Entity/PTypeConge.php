<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: \App\Repository\PTypeCongeRepository::class)]
class PTypeConge
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[Assert\NotBlank]
    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $titre;

    #[Assert\NotBlank]
    #[ORM\Column(type: 'string', length: 100, nullable: true)]
    private $abreviation;

    #[ORM\Column(type: 'text', nullable: true)]
    private $description;

    #[ORM\Column(type: 'boolean', nullable: true)]
    private $active;
    #[ORM\OneToMany(targetEntity: \GrsGrilleConge::class, mappedBy: 'type')]
    protected $types;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $solde;

    public function __construct()
    {
        $this->types = new ArrayCollection();
    }
    

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(?string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getAbreviation(): ?string
    {
        return $this->abreviation;
    }

    public function setAbreviation(?string $abreviation): self
    {
        $this->abreviation = $abreviation;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getActive(): ?bool
    {
        return $this->active;
    }

    public function setActive(?bool $active): self
    {
        $this->active = $active;

        return $this;
    }

    public function getSolde(): ?int
    {
        return $this->solde;
    }

    public function setSolde(?int $solde): self
    {
        $this->solde = $solde;

        return $this;
    }

    /**
     * @return Collection|GrsGrilleConge[]
     */
    public function getTypes(): Collection
    {
        return $this->types;
    }

    public function addType(GrsGrilleConge $type): self
    {
        if (!$this->types->contains($type)) {
            $this->types[] = $type;
            $type->setType($this);
        }

        return $this;
    }

    public function removeType(GrsGrilleConge $type): self
    {
        if ($this->types->contains($type)) {
            $this->types->removeElement($type);
            // set the owning side to null (unless already changed)
            if ($type->getType() === $this) {
                $type->setType(null);
            }
        }

        return $this;
    }


   
}
