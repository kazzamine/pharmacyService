<?php

namespace App\Entity;

use App\Entity\DemandStockCab;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\UmouvementAntenneDet;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: \App\Repository\UmouvementAntenneRepository::class)]
#[ORM\HasLifecycleCallbacks]
class UmouvementAntenne
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;
    
       #[ORM\JoinColumn(nullable: false)]
    #[ORM\ManyToOne(targetEntity: \App\Entity\Umouvementcab::class, inversedBy: 'mouvementAntennes')]
    private $umouvementcab;

    #[ORM\ManyToOne(targetEntity: \App\Entity\Uarticle::class)]
    private $article;

    #[ORM\ManyToOne(targetEntity: DemandStockCab::class, inversedBy: 'demandeStockDets')]
    private $demandeCab;


    #[ORM\ManyToOne(targetEntity: \App\Entity\Uantenne::class, inversedBy: 'mouvements')]
    private $antenne;
    #[JoinColumn(name: 'source_id', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \App\Entity\UaTLivraisonfrscab::class)]
    private $source;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private $created;
    #[ORM\Column(type: 'datetime', nullable: true)]
    private $datePeremption;

   #[JoinColumn(name: 'type_mouvement_id', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \App\Entity\UmouvementType::class)]
    private $typeMouvement;
    #[JoinColumn(name: 'transfer_id', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \App\Entity\Utransfercab::class)]
    private $transfer;

    #[ORM\ManyToOne(targetEntity: \App\Entity\User::class)]
    private $UserCreated;    

       #[ORM\Column(type: 'string', length: 255)]
    private $lot;
    #[ORM\Column(type: 'float', nullable: true)]
    private $ajoSup;
    #[ORM\Column(type: 'float', nullable: true)]
    private $prix;
    #[ORM\Column(type: 'float', nullable: true)]
    private $quantite;
    
   #[ORM\Column(type: 'boolean')]
    private $outFlag;
     #[ORM\JoinColumn(nullable: false)]
    #[ORM\ManyToOne(targetEntity: PNaturePrix::class)]
    private $nature_prix;
    
    #[ORM\Column(type: 'integer', nullable: true)]
    private $level;
    #[ORM\Column(type: 'float', nullable: true)]
    private $qtCdmt;
    #[ORM\Column(type: 'string', nullable: true)]
    private $cmtCode;

      #[ORM\OneToMany(targetEntity: \App\Entity\UmouvementAntenneDet::class, mappedBy: 'umouvementAntenne', cascade: ['persist', 'remove'])]
    private $umouvementAntenneDets;

    #[JoinColumn(name: 'parant_id', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \App\Entity\UmouvementAntenne::class)]
    private $parant;

    #[ORM\OneToOne(targetEntity: \App\Entity\StockSs::class, mappedBy: 'mvmtAntenne', cascade: ['persist', 'remove'])]
    private $stockSs;

     #[ORM\Column(type: 'integer', nullable: true)]
    private $active;

    #[ORM\OneToOne(targetEntity: \App\Entity\UmouvementAntenne::class, inversedBy: 'umouvementAntenne', cascade: ['persist', 'remove'])]
    private $parentTransfert;
    #[ORM\OneToMany(targetEntity: \App\Entity\UsStockConditionnementCab::class, mappedBy: 'umouvementAntenne')]
    private $conditionnementCabs;
    #[ORM\OneToOne(targetEntity: \App\Entity\UmouvementAntenne::class, mappedBy: 'parentTransfert', cascade: ['persist', 'remove'])]
    private $umouvementAntenne;

    public function __construct()
    {
        $this->umouvementAntenneDets = new ArrayCollection();
    }
    /**
     * @return Collection|UmouvementAntenneDet[]
     */
    public function getUmouvementAntenneDets(): Collection
    {
         $this->conditionnementCabs = new ArrayCollection();
        return $this->umouvementAntenneDets;
    }

    public function addUmouvementAntenneDet(UmouvementAntenneDet $umouvementAntenneDet): self
    {
        if (!$this->umouvementAntenneDets->contains($umouvementAntenneDet)) {
            $this->umouvementAntenneDets[] = $umouvementAntenneDet;
            $umouvementAntenneDet->setUmouvementAntenne($this);
        }

        return $this;
    }

    public function removeUmouvementAntenneDet(UmouvementAntenneDet $umouvementAntenneDet): self
    {
        if ($this->umouvementAntenneDets->removeElement($umouvementAntenneDet)) {
            // set the owning side to null (unless already changed)
            if ($umouvementAntenneDet->getUmouvementAntenne() === $this) {
                $umouvementAntenneDet->setUmouvementAntenne(null);
            }
        }

        return $this;
    }

    
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getArticle(): ?Uarticle
    {
        return $this->article;
    }

    public function setArticle(?Uarticle $article): self
    {
        $this->article = $article;

        return $this;
    }
    public function getAntenne(): ?Uantenne
    {
        return $this->antenne;
    }

     public function getActive(): ?int
    {
        return $this->active;
    }

    public function setActive(?int $active): self
    {
        $this->active = $active;

        return $this;
    }

        public function getParentTransfert(): ?self
    {
        return $this->parentTransfert;
    }

    public function setParentTransfert(?self $parentTransfert): self
    {
        $this->parentTransfert = $parentTransfert;

        return $this;
    }


    public function setAntenne(?Uantenne $antenne): self
    {
        $this->antenne = $antenne;

        return $this;
    }
    public function getTypeMouvement(): ?UmouvementType
    {
        return $this->typeMouvement;
    }

    public function setTypeMouvement(?UmouvementType $typeMouvement): self
    {
        $this->typeMouvement = $typeMouvement;

        return $this;
    }
    public function getSource(): ?UaTLivraisonfrscab
    {
        return $this->source;
    }

    public function setSource(?UaTLivraisonfrscab $source): self
    {
        $this->source = $source;

        return $this;
    }

    public function getCreated(): ?\DateTimeInterface
    {
        return $this->created;
    }

    public function setCreated(?\DateTimeInterface $created): self
    {
        $this->created = $created;

        return $this;
    }
    public function getDatePeremption(): ?\DateTimeInterface
    {
        return $this->datePeremption;
    }

    public function setDatePeremption(?\DateTimeInterface $datePeremption): self
    {
        $this->datePeremption = $datePeremption;

        return $this;
    }


    public function getUserCreated(): ?User
    {
        return $this->UserCreated;
    }

    public function setUserCreated(?User $UserCreated): self
    {
        $this->UserCreated = $UserCreated;

        return $this;
    }


    public function getCmtCode(): ?string
    {
        return $this->cmtCode;
    }

    public function setCmtCode(?string $cmtCode): self
    {
        $this->cmtCode = $cmtCode;

        return $this;
    }
    public function getAjoSup(): ?float
    {
        return $this->ajoSup;
    }

    public function setAjoSup(?float $ajoSup): self
    {
        $this->ajoSup = $ajoSup;

        return $this;
    }
    
    public function getprix(): ?float
    {
        return $this->prix;
    }

    public function setprix(?float $prix): self
    {
        $this->prix = $prix;

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
    public function getOutFlag(): ?bool
    {
        return $this->outFlag;
    }
    
    public function setOutFlag(?bool $outFlag): self
    {
        $this->outFlag = $outFlag;
    
        return $this;
    }
    public function getLevel(): ?int
    {
        return $this->level;
    }

    public function setLevel(?int $level): self
    {
        $this->level = $level;

        return $this;
    }
    public function getParant(): ?UmouvementAntenne
    {
        return $this->parant;
    }
    
    public function setParant(?UmouvementAntenne $parant): self
    {
        $this->parant = $parant;
    
        return $this;
    }
    public function getQtCdmt(): ?float
    {
        return $this->qtCdmt;
    }

    public function setQtCdmt(?float $qtCdmt): self
    {
        $this->qtCdmt = $qtCdmt;

        return $this;
    }


    public function getDemandeCab(): ?DemandStockCab
    {
        return $this->demandeCab;
    }

    public function setDemandeCab(?DemandStockCab $demandeCab): self
    {
        $this->demandeCab = $demandeCab;

        return $this;
    }
    public function getTransfer(): ?Utransfercab
    {
        return $this->transfer;
    }

    public function setTransfer(?Utransfercab $transfer): self
    {
        $this->transfer = $transfer;

        return $this;
    }


    public function getStockSs(): ?StockSs
    {
        return $this->stockSs;
    }

    public function setStockSs(?StockSs $stockSs): self
    {
        $this->stockSs = $stockSs;

        // set (or unset) the owning side of the relation if necessary
        $newMvmtAntenne = null === $stockSs ? null : $this;
        if ($stockSs->getMvmtAntenne() !== $newMvmtAntenne) {
            $stockSs->setMvmtAntenne($newMvmtAntenne);
        }

        return $this;
    }

    public function getUmouvementAntenne(): ?self
    {
        return $this->umouvementAntenne;
    }

    public function setUmouvementAntenne(?self $umouvementAntenne): self
    {
        $this->umouvementAntenne = $umouvementAntenne;

        // set (or unset) the owning side of the relation if necessary
        $newParentTransfert = null === $umouvementAntenne ? null : $this;
        if ($umouvementAntenne->getParentTransfert() !== $newParentTransfert) {
            $umouvementAntenne->setParentTransfert($newParentTransfert);
        }

        return $this;
    }
    public function getNaturePrix(): ?PNaturePrix
    {
        return $this->nature_prix;
    }

    public function setNaturePrix(?PNaturePrix $nature_prix): self
    {
        $this->nature_prix = $nature_prix;

        return $this;
    }
    public function getLot(): ?string
    {
        return $this->lot;
    }

    public function setLot(string $lot): self
    {
        $this->lot = $lot;

        return $this;
    }
    
    public function getUmouvementcab(): ?Umouvementcab
    {
        return $this->umouvementcab;
    }

    public function setUmouvementcab(?Umouvementcab $umouvementcab): self
    {
        $this->umouvementcab = $umouvementcab;

        return $this;
    }
    
}
