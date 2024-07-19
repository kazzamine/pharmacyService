<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: \App\Repository\StockSsRepository::class)]
class StockSs
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $code;

    #[ORM\ManyToOne(targetEntity: \App\Entity\Uarticle::class, inversedBy: 'stockSses')]
    private $article;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $cdmt;

    #[ORM\Column(type: 'float', nullable: true)]
    private $qt;

    #[ORM\OneToOne(targetEntity: \App\Entity\UsStockConditionnementCab::class, inversedBy: 'stockSs', cascade: ['persist', 'remove'])]
    private $cdmtCab;

    #[ORM\OneToOne(targetEntity: \App\Entity\UmouvementAntenne::class, inversedBy: 'stockSs', cascade: ['persist', 'remove'])]
    private $mvmtAntenne;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $codeBarre;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $CodePack;

    #[ORM\Column(type: 'float')]
    private $ajoSup;

    #[ORM\ManyToOne(targetEntity: \App\Entity\DemandStockCab::class, inversedBy: 'stockSses')]
    private $demandeCab;

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

    public function getCdmtCab(): ?UsStockConditionnementCab
    {
        return $this->cdmtCab;
    }

    public function setCdmtCab(?UsStockConditionnementCab $cdmtCab): self
    {
        $this->cdmtCab = $cdmtCab;

        return $this;
    }

    public function getMvmtAntenne(): ?UmouvementAntenne
    {
        return $this->mvmtAntenne;
    }

    public function setMvmtAntenne(?UmouvementAntenne $mvmtAntenne): self
    {
        $this->mvmtAntenne = $mvmtAntenne;

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

    public function getCodePack(): ?string
    {
        return $this->CodePack;
    }

    public function setCodePack(?string $CodePack): self
    {
        $this->CodePack = $CodePack;

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

     public function getDemandeCab(): ?DemandStockCab
    {
        return $this->demandeCab;
    }

    public function setDemandeCab(?DemandStockCab $demandeCab): self
    {
        $this->demandeCab = $demandeCab;

        return $this;
    }
}
