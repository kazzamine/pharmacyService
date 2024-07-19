<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: \App\Repository\UsStockConditionnementDetRepository::class)]
class UsStockConditionnementDet
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $ligne;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $nLot;

    #[ORM\ManyToOne(targetEntity: \App\Entity\UPPartenaire::class, inversedBy: 'usStockConditionnementDets')]
    private $tiers;

    #[ORM\ManyToOne(targetEntity: \App\Entity\UsStockConditionnementCab::class, inversedBy: 'usStockConditionnementDets')]
    private $grp;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $autreInfo;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $active;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $code_opr;

    #[ORM\ManyToOne(targetEntity: \App\Entity\Uarticle::class, inversedBy: 'usStockConditionnementDets')]
    private $article;

    #[ORM\ManyToOne(targetEntity: \App\Entity\Uantenne::class, inversedBy: 'usStockConditionnementDets')]
    private $antenne;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $cdmt;

    #[ORM\Column(type: 'float', nullable: true)]
    private $qtCdmt;



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLigne(): ?int
    {
        return $this->ligne;
    }

    public function setLigne(?int $ligne): self
    {
        $this->ligne = $ligne;

        return $this;
    }

    public function getNLot(): ?string
    {
        return $this->nLot;
    }

    public function setNLot(?string $nLot): self
    {
        $this->nLot = $nLot;

        return $this;
    }

    public function getTiers(): ?UPPartenaire
    {
        return $this->tiers;
    }

    public function setTiers(?UPPartenaire $tiers): self
    {
        $this->tiers = $tiers;

        return $this;
    }

    public function getGrp(): ?UsStockConditionnementCab
    {
        return $this->grp;
    }

    public function setGrp(?UsStockConditionnementCab $grp): self
    {
        $this->grp = $grp;

        return $this;
    }

    public function getAutreInfo(): ?string
    {
        return $this->autreInfo;
    }

    public function setAutreInfo(?string $autreInfo): self
    {
        $this->autreInfo = $autreInfo;

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

    public function getCodeOpr(): ?int
    {
        return $this->code_opr;
    }

    public function setCodeOpr(?int $code_opr): self
    {
        $this->code_opr = $code_opr;

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

    public function getAntenne(): ?Uantenne
    {
        return $this->antenne;
    }

    public function setAntenne(?Uantenne $antenne): self
    {
        $this->antenne = $antenne;

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

    public function getQtCdmt(): ?float
    {
        return $this->qtCdmt;
    }

    public function setQtCdmt(?float $qtCdmt): self
    {
        $this->qtCdmt = $qtCdmt;

        return $this;
    }
}
