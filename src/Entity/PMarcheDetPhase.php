<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: \App\Repository\PMarcheDetPhaseRepository::class)]
class PMarcheDetPhase
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\ManyToOne(targetEntity: \App\Entity\PMarcheDet::class, inversedBy: 'pMarcheDetPhases')]
    private $marcheDet;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $phase;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $ObjetPhase;

    #[ORM\Column(type: 'float', nullable: true)]
    private $quantite;

    #[ORM\Column(type: 'float', nullable: true)]
    private $prixUnitaire;

    #[ORM\Column(type: 'integer')]
    private $tva;

    #[ORM\Column(type: 'float', nullable: true)]
    private $prixHT;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $pourcentage;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $delaiJ;

    #[ORM\Column(type: 'float', nullable: true)]
    private $delaisMois;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMarcheDet(): ?PMarcheDet
    {
        return $this->marcheDet;
    }

    public function setMarcheDet(?PMarcheDet $marcheDet): self
    {
        $this->marcheDet = $marcheDet;

        return $this;
    }

    public function getPhase(): ?int
    {
        return $this->phase;
    }

    public function setPhase(?int $phase): self
    {
        $this->phase = $phase;

        return $this;
    }

    public function getObjetPhase(): ?string
    {
        return $this->ObjetPhase;
    }

    public function setObjetPhase(?string $ObjetPhase): self
    {
        $this->ObjetPhase = $ObjetPhase;

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

    public function getPrixUnitaire(): ?float
    {
        return $this->prixUnitaire;
    }

    public function setPrixUnitaire(?float $prixUnitaire): self
    {
        $this->prixUnitaire = $prixUnitaire;

        return $this;
    }

    public function getTva(): ?int
    {
        return $this->tva;
    }

    public function setTva(int $tva): self
    {
        $this->tva = $tva;

        return $this;
    }

    public function getPrixHT(): ?float
    {
        return $this->prixHT;
    }

    public function setPrixHT(?float $prixHT): self
    {
        $this->prixHT = $prixHT;

        return $this;
    }

    public function getPourcentage(): ?int
    {
        return $this->pourcentage;
    }

    public function setPourcentage(?int $pourcentage): self
    {
        $this->pourcentage = $pourcentage;

        return $this;
    }

    public function getDelaiJ(): ?int
    {
        return $this->delaiJ;
    }

    public function setDelaiJ(?int $delaiJ): self
    {
        $this->delaiJ = $delaiJ;

        return $this;
    }

    public function getDelaisMois(): ?float
    {
        return $this->delaisMois;
    }

    public function setDelaisMois(?float $delaisMois): self
    {
        $this->delaisMois = $delaisMois;

        return $this;
    }
}
