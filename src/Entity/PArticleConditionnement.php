<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: \App\Repository\PArticleConditionnementRepository::class)]
class PArticleConditionnement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $designation;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $code;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $parent;

    #[ORM\OneToMany(targetEntity: \App\Entity\UaTLotDet::class, mappedBy: 'cdmtNv1')]
    private $uaTLotDets;

    #[ORM\OneToMany(targetEntity: \App\Entity\UaTLotDet::class, mappedBy: 'cmdtNv3')]
    private $UaTLotDetsNv3;

    public function __construct()
    {
        $this->uaTLotDets = new ArrayCollection();
        $this->UaTLotDetsNv3 = new ArrayCollection();
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

    public function getParent(): ?int
    {
        return $this->parent;
    }

    public function setParent(?int $parent): self
    {
        $this->parent = $parent;

        return $this;
    }

    /**
     * @return Collection|UaTLotDet[]
     */
    public function getUaTLotDets(): Collection
    {
        return $this->uaTLotDets;
    }

    public function addUaTLotDet(UaTLotDet $uaTLotDet): self
    {
        if (!$this->uaTLotDets->contains($uaTLotDet)) {
            $this->uaTLotDets[] = $uaTLotDet;
            $uaTLotDet->setCdmtNv1($this);
        }

        return $this;
    }

    public function removeUaTLotDet(UaTLotDet $uaTLotDet): self
    {
        if ($this->uaTLotDets->contains($uaTLotDet)) {
            $this->uaTLotDets->removeElement($uaTLotDet);
            // set the owning side to null (unless already changed)
            if ($uaTLotDet->getCdmtNv1() === $this) {
                $uaTLotDet->setCdmtNv1(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|UaTLotDet[]
     */
    public function getUaTLotDetsNv3(): Collection
    {
        return $this->UaTLotDetsNv3;
    }

    public function addUaTLotDetsNv3(UaTLotDet $uaTLotDetsNv3): self
    {
        if (!$this->UaTLotDetsNv3->contains($uaTLotDetsNv3)) {
            $this->UaTLotDetsNv3[] = $uaTLotDetsNv3;
            $uaTLotDetsNv3->setCmdtNv3($this);
        }

        return $this;
    }

    public function removeUaTLotDetsNv3(UaTLotDet $uaTLotDetsNv3): self
    {
        if ($this->UaTLotDetsNv3->contains($uaTLotDetsNv3)) {
            $this->UaTLotDetsNv3->removeElement($uaTLotDetsNv3);
            // set the owning side to null (unless already changed)
            if ($uaTLotDetsNv3->getCmdtNv3() === $this) {
                $uaTLotDetsNv3->setCmdtNv3(null);
            }
        }

        return $this;
    }
}
