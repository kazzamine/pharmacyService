<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Table(name: 'ua_t_lot_det')]
#[ORM\Entity(repositoryClass: \App\Repository\UaTLotDetRepository::class)]
class UaTLotDet
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\ManyToOne(targetEntity: \App\Entity\UaTLotCab::class, inversedBy: 'UaTLotDets')]
    private $lotCab;

    #[ORM\ManyToOne(targetEntity: \App\Entity\Uarticle::class, inversedBy: 'UaTLotDets')]
    private $article;

    #[ORM\ManyToOne(targetEntity: \App\Entity\PArticleConditionnement::class, inversedBy: 'UaTLotDets')]
    private $cdmtNv1;

    #[ORM\ManyToOne(targetEntity: \App\Entity\PArticleConditionnement::class, inversedBy: 'UaTLotDets')]
    private $cmdtNv2;

    #[ORM\OneToMany(targetEntity: \App\Entity\UsStockConditionnementCab::class, mappedBy: 'lotDet')]
    private $usStockConditionnementCabs;

    #[ORM\ManyToOne(targetEntity: \App\Entity\PArticleConditionnement::class, inversedBy: 'UaTLotDetsNv3')]
    private $cmdtNv3;

    #[ORM\Column(type: 'float', nullable: true)]
    private $qtCdmtNv1;

    #[ORM\Column(type: 'float', nullable: true)]
    private $qtCdmtNv2;

    #[ORM\Column(type: 'float', nullable: true)]
    private $qtCdmtNv3;

    #[ORM\Column(type: 'float', nullable: true)]
    private $qtCalcNv1;

    #[ORM\Column(type: 'float', nullable: true)]
    private $qtCalcNv2;

    #[ORM\Column(type: 'float', nullable: true)]
    private $qtCalcNv3;

    public function __construct()
    {
        $this->usStockConditionnementCabs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLotCab(): ?UaTLotCab
    {
        return $this->lotCab;
    }

    public function setLotCab(?UaTLotCab $lotCab): self
    {
        $this->lotCab = $lotCab;

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

    public function getCdmtNv1(): ?PArticleConditionnement
    {
        return $this->cdmtNv1;
    }

    public function setCdmtNv1(?PArticleConditionnement $cdmtNv1): self
    {
        $this->cdmtNv1 = $cdmtNv1;

        return $this;
    }

    public function getCmdtNv2(): ?PArticleConditionnement
    {
        return $this->cmdtNv2;
    }

    public function setCmdtNv2(?PArticleConditionnement $cmdtNv2): self
    {
        $this->cmdtNv2 = $cmdtNv2;

        return $this;
    }

    /**
     * @return Collection|UsStockConditionnementCab[]
     */
    public function getUsStockConditionnementCabs(): Collection
    {
        return $this->usStockConditionnementCabs;
    }

    public function addUsStockConditionnementCab(UsStockConditionnementCab $usStockConditionnementCab): self
    {
        if (!$this->usStockConditionnementCabs->contains($usStockConditionnementCab)) {
            $this->usStockConditionnementCabs[] = $usStockConditionnementCab;
            $usStockConditionnementCab->setLotDet($this);
        }

        return $this;
    }

    public function removeUsStockConditionnementCab(UsStockConditionnementCab $usStockConditionnementCab): self
    {
        if ($this->usStockConditionnementCabs->contains($usStockConditionnementCab)) {
            $this->usStockConditionnementCabs->removeElement($usStockConditionnementCab);
            // set the owning side to null (unless already changed)
            if ($usStockConditionnementCab->getLotDet() === $this) {
                $usStockConditionnementCab->setLotDet(null);
            }
        }

        return $this;
    }

    public function getCmdtNv3(): ?PArticleConditionnement
    {
        return $this->cmdtNv3;
    }

    public function setCmdtNv3(?PArticleConditionnement $cmdtNv3): self
    {
        $this->cmdtNv3 = $cmdtNv3;

        return $this;
    }

    public function getQtCdmtNv1(): ?float
    {
        return $this->qtCdmtNv1;
    }

    public function setQtCdmtNv1(?float $qtCdmtNv1): self
    {
        $this->qtCdmtNv1 = $qtCdmtNv1;

        return $this;
    }

    public function getQtCdmtNv2(): ?float
    {
        return $this->qtCdmtNv2;
    }

    public function setQtCdmtNv2(?float $qtCdmtNv2): self
    {
        $this->qtCdmtNv2 = $qtCdmtNv2;

        return $this;
    }

    public function getQtCdmtNv3(): ?float
    {
        return $this->qtCdmtNv3;
    }

    public function setQtCdmtNv3(?float $qtCdmtNv3): self
    {
        $this->qtCdmtNv3 = $qtCdmtNv3;

        return $this;
    }

    public function getQtCalcNv1(): ?float
    {
        return $this->qtCalcNv1;
    }

    public function setQtCalcNv1(?float $qtCalcNv1): self
    {
        $this->qtCalcNv1 = $qtCalcNv1;

        return $this;
    }

    public function getQtCalcNv2(): ?float
    {
        return $this->qtCalcNv2;
    }

    public function setQtCalcNv2(?float $qtCalcNv2): self
    {
        $this->qtCalcNv2 = $qtCalcNv2;

        return $this;
    }

    public function getQtCalcNv3(): ?float
    {
        return $this->qtCalcNv3;
    }

    public function setQtCalcNv3(?float $qtCalcNv3): self
    {
        $this->qtCalcNv3 = $qtCalcNv3;

        return $this;
    }
}
