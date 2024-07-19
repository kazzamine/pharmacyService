<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
#[ORM\Entity(repositoryClass: \App\Repository\PDossierOrganisationRepository::class)]
#[UniqueEntity('prefix')]
class PDossierOrganisation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[Assert\NotBlank]
    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $designation;

    /**
     * @var string
     *
     */
    #[ORM\Column(name: 'code', type: 'string', length: 100, nullable: true)]
    private $code;

    #[Assert\NotBlank]
    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $abreviation;

    #[ORM\Column(type: 'boolean', nullable: true)]
    private $active;

    
    #[Assert\Length(min: 2, max: 20, minMessage: 'Vous devez ajouter plus que {{ limit }} caractères.', maxMessage: 'Vous ne devez pas dépasser {{ limit }} caractères.')]
    #[Assert\NotBlank]
    #[ORM\Column(type: 'string', length: 100, unique: true)]
    private $prefix;

    #[ORM\OneToMany(targetEntity: \App\Entity\PDossier::class, mappedBy: 'organisation')]
    private $dossiers;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $ordr;


    public function __construct()
    {
        $this->dossiers = new ArrayCollection();
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

    public function getAbreviation(): ?string
    {
        return $this->abreviation;
    }

    public function setAbreviation(?string $abreviation): self
    {
        $this->abreviation = $abreviation;

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

    public function getPrefix(): ?string {
        return $this->prefix;
    }

    public function setPrefix(string $prefix): self {
        $this->prefix = $prefix;

        return $this;
    }

    /**
     * @return Collection|PDossier[]
     */
    public function getDossiers(): Collection
    {
        return $this->dossiers;
    }

    public function addDossiers(PDossier $pDossier): self
    { 
        if (!$this->dossiers->contains($pDossier)) {
            $this->dossiers[] = $pDossier;
            $pDossier->setOrganisation($this);
        }

        return $this;
    }

    public function removePDossier(PDossier $pDossier): self
    {
        if ($this->dossiers->contains($pDossier)) {
            $this->dossiers->removeElement($pDossier);
            // set the owning side to null (unless already changed)
            if ($pDossier->getOrganisation() === $this) {
                $pDossier->setOrganisation(null);
            }
        }

        return $this;
    }

    public function getOrdr(): ?int
    {
        return $this->ordr;
    }

    public function setOrdr(?int $ordr): self
    {
        $this->ordr = $ordr;

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
}
