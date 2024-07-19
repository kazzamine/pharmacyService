<?php

namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: \App\Repository\DefStatutRepository::class)]
class DefStatut
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $module;
    
     #[ORM\Column(type: 'string', length: 100, nullable: true)]
    private $sousModule;
    
    
     #[ORM\Column(type: 'text', nullable: true)]
    private $description;

    #[ORM\Column(type: 'string', length: 100, nullable: true)]
    private $fonction;

    #[Assert\NotBlank]
    #[ORM\Column(type: 'string', length: 100, nullable: true)]
    private $titre;

    #[Assert\NotBlank]
    #[ORM\Column(type: 'string', length: 50, nullable: true)]
    private $abreviation;

    #[ORM\Column(type: 'smallint', nullable: true)]
    private $affectable;

    #[ORM\Column(type: 'smallint', nullable: true)]
    private $next;

    #[ORM\Column(type: 'smallint', nullable: true)]
    private $defaulte;

    #[ORM\Column(type: 'smallint', nullable: true)]
    private $total;

    #[ORM\Column(type: 'smallint', nullable: true)]
    private $partiel;

    #[ORM\Column(type: 'string', length: 20, nullable: true)]
    private $coulleur;

    #[ORM\Column(type: 'boolean', nullable: true)]
    private $active;

 

    public function __construct()
    {
     
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getModule(): ?string
    {
        return $this->module;
    }

    public function setModule(?string $module): self
    {
        $this->module = $module;

        return $this;
    }

    public function getSousModule(): ?string
    {
        return $this->sousModule;
    }

    public function setSousModule(?string $sousModule): self
    {
        $this->sousModule = $sousModule;

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

    public function getFonction(): ?string
    {
        return $this->fonction;
    }

    public function setFonction(?string $fonction): self
    {
        $this->fonction = $fonction;

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

    public function getAffectable(): ?int
    {
        return $this->affectable;
    }

    public function setAffectable(?int $affectable): self
    {
        $this->affectable = $affectable;

        return $this;
    }

    public function getNext(): ?int
    {
        return $this->next;
    }

    public function setNext(?int $next): self
    {
        $this->next = $next;

        return $this;
    }

    public function getDefaulte(): ?int
    {
        return $this->defaulte;
    }

    public function setDefaulte(?int $defaulte): self
    {
        $this->defaulte = $defaulte;

        return $this;
    }

    public function getTotal(): ?int
    {
        return $this->total;
    }

    public function setTotal(?int $total): self
    {
        $this->total = $total;

        return $this;
    }

    public function getPartiel(): ?int
    {
        return $this->partiel;
    }

    public function setPartiel(?int $partiel): self
    {
        $this->partiel = $partiel;

        return $this;
    }

    public function getCoulleur(): ?string
    {
        return $this->coulleur;
    }

    public function setCoulleur(?string $coulleur): self
    {
        $this->coulleur = $coulleur;

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

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(?string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

}
