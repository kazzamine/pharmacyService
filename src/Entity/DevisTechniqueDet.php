<?php

namespace App\Entity;

use App\Repository\DevisTechniqueDetRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DevisTechniqueDetRepository::class)]
class DevisTechniqueDet
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

    #[ORM\ManyToOne(targetEntity: DevisTechniqueCab::class, inversedBy: 'devisTechniqueDets')]
    private $DevisTechniqueCab;

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

    public function getTva(): ?float
    {
        return $this->tva;
    }

    public function setTva(?float $tva): self
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

    public function getDevisTechniqueCab(): ?DevisTechniqueCab
    {
        return $this->DevisTechniqueCab;
    }

    public function setDevisTechniqueCab(?DevisTechniqueCab $DevisTechniqueCab): self
    {
        $this->DevisTechniqueCab = $DevisTechniqueCab;

        return $this;
    }
}

