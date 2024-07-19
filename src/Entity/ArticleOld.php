<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: \App\Repository\ArticleOldRepository::class)]
class ArticleOld
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

     #[ORM\Column(type: 'integer')]
    private $iddet;
    
    
    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $code;

    #[ORM\Column(type: 'text', nullable: true)]
    private $article;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $unite;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $quantite;
    
    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $prixunitaire;
    
    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $tva;
    
    
        #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $prixttc;
    
    
    #[ORM\Column(type: 'text', nullable: true)]
    private $observation;
    
     #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $statut;
    
        #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $src;
    

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

    public function getArticle(): ?string
    {
        return $this->article;
    }

    public function setArticle(?string $article): self
    {
        $this->article = $article;

        return $this;
    }

    public function getUnite(): ?string
    {
        return $this->unite;
    }

    public function setUnite(?string $unite): self
    {
        $this->unite = $unite;

        return $this;
    }

    public function getQuantite(): ?string
    {
        return $this->quantite;
    }

    public function setQuantite(?string $quantite): self
    {
        $this->quantite = $quantite;

        return $this;
    }

    public function getPrixunitaire(): ?string
    {
        return $this->prixunitaire;
    }

    public function setPrixunitaire(?string $prixunitaire): self
    {
        $this->prixunitaire = $prixunitaire;

        return $this;
    }

    public function getTva(): ?string
    {
        return $this->tva;
    }

    public function setTva(?string $tva): self
    {
        $this->tva = $tva;

        return $this;
    }

    public function getPrixTtc(): ?string
    {
        return $this->prixttc;
    }

    public function setPrixttc(?string $prixttc): self
    {
        $this->prixttc = $prixttc;

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

    public function getStatut(): ?string
    {
        return $this->statut;
    }

    public function setStatut(?string $statut): self
    {
        $this->statut = $statut;

        return $this;
    }

    public function getSrc(): ?string
    {
        return $this->src;
    }

    public function setSrc(?string $src): self
    {
        $this->src = $src;

        return $this;
    }

    public function getIddet(): ?int
    {
        return $this->iddet;
    }

    public function setIddet(int $iddet): self
    {
        $this->iddet = $iddet;

        return $this;
    }
}
