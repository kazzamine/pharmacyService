<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Table(name: 'ua_t_lot_cab')]
#[ORM\Entity(repositoryClass: \App\Repository\uaTLotCabRepository::class)]
class UaTLotCab
{
    use  DetailChampCalcule;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

     #[ORM\OneToMany(targetEntity: \uaTLotDet::class, mappedBy: 'lotCab')]
    private $lotDetails;

    #[ORM\JoinColumn(name: 'p_natureprix_id', referencedColumnName: 'id')]
    #[Assert\NotBlank]
    #[ORM\ManyToOne(targetEntity: \App\Entity\PNaturePrix::class)]
    private $natureprix;

  
    /**
     * @var string|null
     */
    #[ORM\Column(name: 'lot', type: 'string')]
    private $lot;

    #[ORM\JoinColumn(name: 'ua_t_livraisonfrsdet_id', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \App\Entity\UaTLivraisonfrsdet::class, inversedBy: 'details')]
    private $cab;
    
    #[ORM\Column(type: 'datetime', nullable: true)]
    private $datePeremp;

    #[ORM\Column(type: 'float', nullable: true)]
    private $quantite;




    public function getId(): ?int
    {
        return $this->id;
    }

    
 

    public function __construct()
    {
        $this->lotDetails = new ArrayCollection();
    }
/**
     * @return Collection|uaTLotDet[]
     */
    public function getLotDetails(): Collection
    {
        return $this->lotDetails;
    }
    public function addLotDetail(uaTLotDet $lotDetail): self
    {
        if (!$this->lotDetails->contains($lotDetail)) {
            $this->lotDetails[] = $lotDetail;
            $lotDetail->setLotCab($this);
        }

        return $this;
    }

    public function removeLotDetail(uaTLotDet $lotDetail): self
    {
        if ($this->lotDetails->removeElement($lotDetail)) {
            // set the owning side to null
            if ($lotDetail->getLotCab() === $this) {
                $lotDetail->setLotCab(null);
            }
        }

        return $this;
    }

    public function getNatureprix(): ?PNaturePrix
    {
        return $this->natureprix;
    }

    public function setNatureprix(?PNaturePrix $natureprix): self
    {
        $this->natureprix = $natureprix;

        return $this;
    }

    public function getLot(): ?string
    {
        return $this->lot;
    }

    public function setLot(?string $lot): self
    {
        $this->lot = $lot;

        return $this;
    }
  

    public function getCab(): ?UaTLivraisonfrsdet
    {
        return $this->cab;
    }

    public function setCab(?UaTLivraisonfrsdet $cab): self
    {
        $this->cab = $cab;

        return $this;
    }
    
    public function getDatePeremp(): ?\DateTimeInterface
    {
        return $this->datePeremp;
    }

    public function setDatePeremp(?\DateTimeInterface $datePeremp): self
    {
        $this->datePeremp = $datePeremp;

        return $this;
    }


    public function getQuantite(): ?float
    {
        return $this->quantite;
    }

    public function setQuantite(?float $quantite): self
    {
        $this->quantite = $quantite;

        return $this;
    }
}
