<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: \App\Repository\UsStockConditionnementCabRepository::class)]
class UsStockConditionnementCab
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $code;

    #[ORM\ManyToOne(targetEntity: \App\Entity\UaTLotDet::class, inversedBy: 'usStockConditionnementCabs')]
    private $lotDet;
    #[ORM\JoinColumn(name: 'umouvement_antenne_id', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \App\Entity\UmouvementAntenne::class, inversedBy: 'conditionnementCabs')]
    private $umouvementAntenne;

     #[ORM\ManyToOne(targetEntity: \App\Entity\UsPAdresseStockage::class, inversedBy: 'usStockConditionnementCabs')]
    private $adresse;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private $datePeremption;

    #[ORM\OneToMany(targetEntity: \App\Entity\UsStockConditionnementDet::class, mappedBy: 'grp')]
    private $usStockConditionnementDets;
    
     #[ORM\ManyToOne(targetEntity: \App\Entity\Uarticle::class, inversedBy: 'usStockConditionnementCabs')]
    private $article;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $cdmt;

    #[ORM\Column(type: 'float', nullable: true)]
    private $qt;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private $dateSyst;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private $datePeremp;

    #[ORM\Column(type: 'text', nullable: true)]
    private $codeBarre;

    #[ORM\OneToOne(targetEntity: \App\Entity\StockSs::class, mappedBy: 'cdmtCab', cascade: ['persist', 'remove'])]
    private $stockSs;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $active;

    #[ORM\OneToOne(targetEntity: \App\Entity\UsStockConditionnementCab::class, inversedBy: 'usStockConditionnementCab', cascade: ['persist', 'remove'])]
    private $parentTransfert;

    #[ORM\OneToOne(targetEntity: \App\Entity\UsStockConditionnementCab::class, mappedBy: 'parentTransfert', cascade: ['persist', 'remove'])]
    private $usStockConditionnementCab;


    #[ORM\Column(type: 'integer')]
    private $level;

    #[ORM\Column(type: 'float')]
    private $ajoSup;
    



    public function __construct()
    {
        $this->usStockConditionnementDets = new ArrayCollection();
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

    public function getLotDet(): ?UaTLotDet
    {
        return $this->lotDet;
    }

    public function setLotDet(?UaTLotDet $lotDet): self
    {
        $this->lotDet = $lotDet;

        return $this;
    }

    public function getAdresse(): ?UsPAdresseStockage
    {
        return $this->adresse;
    }

    public function setAdresse(?UsPAdresseStockage $adresse): self
    {
        $this->adresse = $adresse;

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

    public function getCodeBarre(): ?string
    {
        return $this->codeBarre;
    }

    public function setCodeBarre(?string $codeBarre): self
    {
        $this->codeBarre = $codeBarre;

        return $this;
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

    public function getCdmt(): ?string
    {
        return $this->cdmt;
    }

    public function setCdmt(?string $cdmt): self
    {
        $this->cdmt = $cdmt;

        return $this;
    }

    public function getQt(): ?float
    {
        return $this->qt;
    }

    public function setQt(?float $qt): self
    {
        $this->qt = $qt;

        return $this;
    }

    public function getDateSyst(): ?\DateTimeInterface
    {
        return $this->dateSyst;
    }

    public function setDateSyst(?\DateTimeInterface $dateSyst): self
    {
        $this->dateSyst = $dateSyst;

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

    /**
     * @return Collection|UsStockConditionnementDet[]
     */
    public function getUsStockConditionnementDets(): Collection
    {
        return $this->usStockConditionnementDets;
    }

    public function addUsStockConditionnementDet(UsStockConditionnementDet $usStockConditionnementDet): self
    {
        if (!$this->usStockConditionnementDets->contains($usStockConditionnementDet)) {
            $this->usStockConditionnementDets[] = $usStockConditionnementDet;
            $usStockConditionnementDet->setGrp($this);
        }

        return $this;
    }

    public function removeUsStockConditionnementDet(UsStockConditionnementDet $usStockConditionnementDet): self
    {
        if ($this->usStockConditionnementDets->contains($usStockConditionnementDet)) {
            $this->usStockConditionnementDets->removeElement($usStockConditionnementDet);
            // set the owning side to null (unless already changed)
            if ($usStockConditionnementDet->getGrp() === $this) {
                $usStockConditionnementDet->setGrp(null);
            }
        }

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
        $newCdmtCab = null === $stockSs ? null : $this;
        if ($stockSs->getCdmtCab() !== $newCdmtCab) {
            $stockSs->setCdmtCab($newCdmtCab);
        }

        return $this;
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

    public function getLevel(): ?int
    {
        return $this->level;
    }

    public function setLevel(int $level): self
    {
        $this->level = $level;

        return $this;
    }

    public function getUsStockConditionnementCab(): ?self
    {
        return $this->usStockConditionnementCab;
    }

    public function setUsStockConditionnementCab(?self $usStockConditionnementCab): self
    {
        $this->usStockConditionnementCab = $usStockConditionnementCab;

        // set (or unset) the owning side of the relation if necessary
        $newParentTransfert = null === $usStockConditionnementCab ? null : $this;
        if ($usStockConditionnementCab->getParentTransfert() !== $newParentTransfert) {
            $usStockConditionnementCab->setParentTransfert($newParentTransfert);
        }

        return $this;
    }

    public function getAjoSup(): ?float
    {
        return $this->ajoSup;
    }

    public function setAjoSup(float $ajoSup): self
    {
        $this->ajoSup = $ajoSup;

        return $this;
    }
    
    
    public function getUmouvementAntenne(): ?UmouvementAntenne
    {
        return $this->umouvementAntenne;
    }

    public function setUmouvementAntenne(?UmouvementAntenne $umouvementAntenne): self
    {
        $this->umouvementAntenne = $umouvementAntenne;
        return $this;
    }
}
