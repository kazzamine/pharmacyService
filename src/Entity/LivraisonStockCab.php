<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\LivraisonStockCabRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;


#[ORM\Entity(repositoryClass: LivraisonStockCabRepository::class)]
class LivraisonStockCab
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

   #[ORM\OneToMany(targetEntity: LivraisonStockDet::class, mappedBy: 'livraisonCab')]
    private $livraisonStockDets;


    
      #[ORM\JoinColumn(name: 'demand_stockcab_id', nullable: false)]
    #[ORM\ManyToOne(targetEntity: DemandStockCab::class, inversedBy: 'livraisonStockCabs')]
    private $demandStockCab;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $code;
    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $idmovimiento;
    
     #[ORM\Column(type: 'float', length: 11, nullable: true)]
    private $urgent;
    
        #[ORM\JoinColumn(name: 'user_created', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \User::class)]
    private $userCreated;
    /**
    
    /**
    */
    #[ORM\Column(type: 'datetime', nullable: true)]
    private $date;
    
       #[ORM\Column(type: 'float', length: 11, nullable: true)]
    private $active;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->livraisonStockDets = new ArrayCollection();
        
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
    public function getIdmovimiento(): ?string
    {
        return $this->idmovimiento;
    }

    public function setIdmovimiento(?string $idmovimiento): self
    {
        $this->idmovimiento = $idmovimiento;
        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(?\DateTimeInterface $date): self
    {
        $this->date = $date;
        return $this;
    }
    public function getActive(): ?float
    {
        return $this->active;
    }

    public function setActive(?float $active): self
    {
        $this->active = $active;

        return $this;
    }
    
    public function getUrgent(): ?float
    {
        return $this->urgent;
    }

    public function setUrgent(?float $urgent): self
    {
        $this->urgent = $urgent;

        return $this;
    }

    public function getUserCreated(): ?User {
        return $this->userCreated;
    }

    public function setUserCreated(?User $userCreated): self {
        $this->userCreated = $userCreated;

        return $this;
    }


    /**
     * @return Collection|LivraisonStockDet[]
     */
    public function getLivraisonStockDets(): Collection
    {
        return $this->livraisonStockDets;
    }

    public function addLivraisonStockDet(LivraisonStockDet $livraisonStockDet): self
    {
        if (!$this->livraisonStockDets->contains($livraisonStockDet)) {
            $this->livraisonStockDets[] = $livraisonStockDet;
            $livraisonStockDet->setLivraisonCab($this);
        }
        return $this;
    }

    public function removeLivraisonStockDet(LivraisonStockDet $livraisonStockDet): self
    {
        if ($this->livraisonStockDets->removeElement($livraisonStockDet)) {
            // Set the owning side to null (unless already changed)
            if ($livraisonStockDet->getLivraisonCab() === $this) {
                $livraisonStockDet->setLivraisonCab(null);
            }
        }
        return $this;
    }
    
    public function getDemandStockCab(): ?DemandStockCab
    {
        return $this->demandStockCab;
    }

    public function setDemandStockCab(?DemandStockCab $demandStockCab): self
    {
        $this->demandStockCab = $demandStockCab;

        return $this;
    }
    
    

}
