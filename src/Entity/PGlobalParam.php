<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Table(name: 'p_global_param')]
#[ORM\Entity(repositoryClass: \App\Repository\PGlobalParamRepository::class)]
class PGlobalParam
{
    
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;    
    
     
    #[ORM\Column(type: 'boolean', nullable: true)]
    private $active;

    #[ORM\Column(type: 'string', length: 255)]
    private $designation;

    #[ORM\Column(type: 'string', length: 255)]
    private $abreviation;

    #[ORM\Column(type: 'string', length: 255)]
    private $code;

    #[ORM\Column(type: 'string', length: 5)]
    private $prefix;

    #[ORM\OneToMany(targetEntity: \App\Entity\PGlobalParamDet::class, mappedBy: 'cab')]
    private $pGlobalParamDets;

   

   

    public function __construct()
    {
        $this->pGlobalParamDets = new ArrayCollection();
      
    }
    
    

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDesignation(): ?string
    {
        return $this->designation;
    }

    public function setDesignation(string $designation): self
    {
        $this->designation = $designation;

        return $this;
    }

    public function getAbreviation(): ?string
    {
        return $this->abreviation;
    }

    public function setAbreviation(string $abreviation): self
    {
        $this->abreviation = $abreviation;

        return $this;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(string $code): self
    {
        $this->code = $code;

        return $this;
    }

    public function getPrefix(): ?string
    {
        return $this->prefix;
    }

    public function setPrefix(string $prefix): self
    {
        $this->prefix = $prefix;

        return $this;
    }

    /**
     * @return Collection|PGlobalParamDet[]
     */
    public function getPGlobalParamDets(): Collection
    {
        return $this->pGlobalParamDets;
    }

    public function addPGlobalParamDet(PGlobalParamDet $pGlobalParamDet): self
    {
        if (!$this->pGlobalParamDets->contains($pGlobalParamDet)) {
            $this->pGlobalParamDets[] = $pGlobalParamDet;
            $pGlobalParamDet->setCab($this);
        }

        return $this;
    }

    public function removePGlobalParamDet(PGlobalParamDet $pGlobalParamDet): self
    {
        if ($this->pGlobalParamDets->contains($pGlobalParamDet)) {
            $this->pGlobalParamDets->removeElement($pGlobalParamDet);
            // set the owning side to null (unless already changed)
            if ($pGlobalParamDet->getCab() === $this) {
                $pGlobalParamDet->setCab(null);
            }
        }

        return $this;
    }

    public function getActive(): ?bool
    {
        return $this->active;
    }

    public function setActive(bool $active): self
    {
        $this->active = $active;

        return $this;
    }


}
