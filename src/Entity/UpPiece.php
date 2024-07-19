<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: \App\Repository\UpPieceRepository::class)]
class UpPiece
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[Assert\NotBlank]
    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $code;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $designation;



     /**
     * @var string|null
     */
    #[ORM\Column(type: 'boolean', nullable: true)]
    private $active;

    #[ORM\Column(type: 'boolean', nullable: true)]
    private $isCharge;
    
    #[ORM\Column(type: 'integer', length: 1, nullable: true)]
    private $sens;

    #[ORM\OneToMany(targetEntity: \App\Entity\GrsPaie::class, mappedBy: 'piece')]
    private $grsPaies;



    public function __construct()
    {
        $this->grsPaies = new ArrayCollection();
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




    public function getActive(): ?bool
    {
        return $this->active;
    }

    public function setActive(?bool $active): self
    {
        $this->active = $active;

        return $this;
    }

    public function getIsCharge(): ?bool
    {
        return $this->isCharge;
    }

    public function setIsCharge(?bool $isCharge): self
    {
        $this->isCharge = $isCharge;

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

    public function getSens(): ?int
    {
        return $this->sens;
    }

    public function setSens(?int $sens): self
    {
        $this->sens = $sens;

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
            $grsPaie->setPiece($this);
        }

        return $this;
    }

    public function removeGrsPaie(GrsPaie $grsPaie): self
    {
        if ($this->grsPaies->contains($grsPaie)) {
            $this->grsPaies->removeElement($grsPaie);
            // set the owning side to null (unless already changed)
            if ($grsPaie->getPiece() === $this) {
                $grsPaie->setPiece(null);
            }
        }

        return $this;
    }

    
}
