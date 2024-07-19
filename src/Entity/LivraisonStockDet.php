<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use App\Repository\LivraisonStockDetRepository;
use Doctrine\Common\Collections\ArrayCollection;

#[ORM\Entity(repositoryClass: LivraisonStockDetRepository::class)]
class LivraisonStockDet
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;
    #[ORM\ManyToOne(targetEntity: Uarticle::class, inversedBy: 'demandeStockDets')]
    private $uarticle;
    #[ORM\OneToMany(targetEntity: LivraisonStockDetail::class, mappedBy: 'livraisonStockDet')]
    private $livraisonStockDetails;
    #[ORM\ManyToOne(targetEntity: LivraisonStockCab::class, inversedBy: 'livraisonStockDets', cascade: ['persist'])]
    private $livraisonCab;

    #[ORM\Column(type: 'float', nullable: true)]
    private $quantity;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $observation;

    public function __construct()
    {
        $this->livraisonStockDetails = new ArrayCollection();
    }
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLivraisonCab(): ?LivraisonStockCab
    {
        return $this->livraisonCab;
    }

    public function setLivraisonCab(?LivraisonStockCab $livraisonCab): self
    {
        $this->livraisonCab = $livraisonCab;
        return $this;
    }

    public function getQuantity(): ?float
    {
        return $this->quantity;
    }

    public function setQuantity(?float $quantity): self
    {
        $this->quantity = $quantity;
        return $this;
    }

    public function getObservation(): ?string
    {
        return $this->observation;
    }

    public function setObservation(?string $observation): self
    {
        $this->observation = $observation;
        return $this;
    }
    public function getUarticle(): ?Uarticle
    {
        return $this->uarticle;
    }

    public function setUarticle(?Uarticle $uarticle): self
    {
        $this->uarticle = $uarticle;

        return $this;
    }
    /**
     * @return Collection|LivraisonStockDetail[]
     */
    public function getLivraisonStockDetails(): Collection
    {
        return $this->livraisonStockDetails;
    }

    public function addLivraisonStockDetail(LivraisonStockDetail $livraisonStockDetail): self
    {
        if (!$this->livraisonStockDetails->contains($livraisonStockDetail)) {
            $this->livraisonStockDetails[] = $livraisonStockDetail;
            $livraisonStockDetail->setLivraisonStockDet($this);
        }

        return $this;
    }

    public function removeLivraisonStockDetail(LivraisonStockDetail $livraisonStockDetail): self
    {
        if ($this->livraisonStockDetails->removeElement($livraisonStockDetail)) {
            // set the owning side to null (unless already changed)
            if ($livraisonStockDetail->getLivraisonStockDet() === $this) {
                $livraisonStockDetail->setLivraisonStockDet(null);
            }
        }

        return $this;
    }
}
