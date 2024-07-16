<?php

namespace App\Entity;

use App\Repository\DemandeStockDetRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DemandeStockDetRepository::class)]
class DemandeStockDet
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    private int $id;

    #[ORM\ManyToOne(targetEntity: Uarticle::class, inversedBy: "demandeStockDets")]
    private ?Uarticle $uarticle;

    #[ORM\Column(type: "float", nullable: true)]
    private ?float $prix;

    #[ORM\Column(type: "float", nullable: true)]
    private ?float $qte;

    #[ORM\ManyToOne(targetEntity: DemandStockCab::class, inversedBy: "demandeStockDets")]
    private ?DemandStockCab $demandeCab;

    #[ORM\Column(type: "float", nullable: true)]
    private ?float $qt_livre;

    #[ORM\Column(type: "string", length: 255, nullable: true)]
    private ?string $conditionnement;

    #[ORM\Column(type: "string", length: 255, nullable: true)]
    private ?string $conditionnement_livre;

    #[ORM\Column(type: "string", length: 255, nullable: true)]
    private ?string $observation;

    // Getters and setters for each attribute

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUarticle(): ?Uarticle
    {
        return $this->uarticle;
    }

    public function setUarticle(?Uarticle $uarticle): self
    {
        $this->uarticle = $uarticle;

        return $this;
    }

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(?float $prix): self
    {
        $this->prix = $prix;

        return $this;
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

    public function getDemandeCab(): ?DemandStockCab
    {
        return $this->demandeCab;
    }

    public function setDemandeCab(?DemandStockCab $demandeCab): self
    {
        $this->demandeCab = $demandeCab;

        return $this;
    }

    public function getQtLivre(): ?float
    {
        return $this->qt_livre;
    }

    public function setQtLivre(?float $qt_livre): self
    {
        $this->qt_livre = $qt_livre;

        return $this;
    }

    public function getConditionnement(): ?string
    {
        return $this->conditionnement;
    }

    public function setConditionnement(?string $conditionnement): self
    {
        $this->conditionnement = $conditionnement;

        return $this;
    }

    public function getConditionnementLivre(): ?string
    {
        return $this->conditionnement_livre;
    }

    public function setConditionnementLivre(?string $conditionnement_livre): self
    {
        $this->conditionnement_livre = $conditionnement_livre;

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
}
