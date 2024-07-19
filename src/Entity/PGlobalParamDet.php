<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: \App\Repository\PGlobalParamDetRepository::class)]
class PGlobalParamDet
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;



    #[ORM\Column(type: 'string', length: 255)]
    private $k;

    #[ORM\Column(type: 'string', length: 255)]
    private $v;

    #[ORM\Column(type: 'boolean')]
    private $active;

    #[ORM\ManyToOne(targetEntity: \App\Entity\PGlobalParam::class, inversedBy: 'pGlobalParamDets')]
    private $cab;

    #[ORM\OneToMany(targetEntity: \App\Entity\GrsPaie::class, mappedBy: 'type')]
    private $grsPaies;


    public function __construct()
    {
        $this->grsPaies = new ArrayCollection();
      
    }

    public function getId(): ?int
    {
        return $this->id;
    }



    public function getK(): ?string
    {
        return $this->k;
    }

    public function setK(string $k): self
    {
        $this->k = $k;

        return $this;
    }

    public function getV(): ?string
    {
        return $this->v;
    }

    public function setV(string $v): self
    {
        $this->v = $v;

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

    public function getCab(): ?PGlobalParam
    {
        return $this->cab;
    }

    public function setCab(?PGlobalParam $cab): self
    {
        $this->cab = $cab;

        return $this;
    }

    /**
     * @return Collection|GrsPaie[]
     */
    public function getGrsPaies(): Collection
    {
        return $this->grsPaies;
    }

    public function addGrsPaie(GrsPaie $grsPaie): self
    {
        if (!$this->grsPaies->contains($grsPaie)) {
            $this->grsPaies[] = $grsPaie;
            $grsPaie->setType($this);
        }

        return $this;
    }

    public function removeGrsPaie(GrsPaie $grsPaie): self
    {
        if ($this->grsPaies->contains($grsPaie)) {
            $this->grsPaies->removeElement($grsPaie);
            // set the owning side to null (unless already changed)
            if ($grsPaie->getType() === $this) {
                $grsPaie->setType(null);
            }
        }

        return $this;
    }


}
