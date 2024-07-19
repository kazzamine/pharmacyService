<?php

namespace App\Entity;

use App\Repository\UaTechniqueDetRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UaTechniqueDetRepository::class)]
class UaTechniqueDet
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'float', nullable: true)]
    private $qte;

    #[ORM\Column(type: 'float', nullable: true)]
    private $prixUntaire;

    #[ORM\Column(type: 'float', nullable: true)]
    private $tva;

    #[ORM\Column(type: 'float', nullable: true)]
    private $remise;

     #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $article;
     #[ORM\Column(type: 'string', length: 200, nullable: true)]
    private $iban;
     #[ORM\Column(type: 'string', length: 200, nullable: true)]
    private $swift;
     #[ORM\Column(type: 'string', length: 200, nullable: true)]
    private $adresse;
     #[ORM\Column(type: 'string', length: 200, nullable: true)]
    private $banque;

    #[ORM\ManyToOne(targetEntity: UaTechniqueCab::class, inversedBy: 'uaTechniqueDets')]
    private $UaTechniqueCab;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQte(): ?float
    {
        return $this->qte;
    }

    public function setQte(?float $qte): self
    {
        $this->qte = $qte;

        return $this;
    }

    public function getPrixUntaire(): ?float
    {
        return $this->prixUntaire;
    }

    public function setPrixUntaire(?float $prixUntaire): self
    {
        $this->prixUntaire = $prixUntaire;

        return $this;
    }

    public function getTva(): ?int
    {
        return $this->tva;
    }

    public function setTva(?int $tva): self
    {
        $this->tva = $tva;

        return $this;
    }

    public function getRemise(): ?float
    {
        return $this->remise;
    }

    public function setRemise(?float $remise): self
    {
        $this->remise = $remise;

        return $this;
    }
    
    public function getArticle(): ?string
    {
        return $this->article;
    }

    public function setArticle(?string $article): self
    {
        $this->article = $article;

        return $this;
    }

    public function getUaTechniqueCab(): ?UaTechniqueCab
    {
        return $this->UaTechniqueCab;
    }

    public function setUaTechniqueCab(?UaTechniqueCab $UaTechniqueCab): self
    {
        $this->UaTechniqueCab = $UaTechniqueCab;

        return $this;
    }
    
    
    
    public function getIban(): ?string
    {
        return $this->iban;
    }

    public function setIban(?string $iban): self
    {
        $this->iban = $iban;

        return $this;
    }
    public function getSwift(): ?string
    {
        return $this->swift;
    }

    public function setSwift(?string $swift): self
    {
        $this->swift = $swift;

        return $this;
    }
    
    
    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(?string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }
    public function getBanque(): ?string
    {
        return $this->banque;
    }

    public function setBanque(?string $banque): self
    {
        $this->banque = $banque;

        return $this;
    }
    
    
    
    
}
