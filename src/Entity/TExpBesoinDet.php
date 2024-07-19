<?php

namespace App\Entity;

use App\Entity\Uarticle;
use App\Entity\TExpBesoinCab;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\TExpBesoinDetRepository;


#[ORM\Table(name: 't_exp_besoin_det')]
#[ORM\Entity(repositoryClass: TExpBesoinDetRepository::class)]
class TExpBesoinDet
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\ManyToOne(targetEntity: Uarticle::class, inversedBy: 'TExpBesoinDets')]
    private $uarticle;

    #[ORM\Column(type: 'float', nullable: true)]
    private $prix;

    #[ORM\Column(type: 'float', nullable: true)]
    private $qte;

    #[ORM\ManyToOne(targetEntity: TExpBesoinCab::class, inversedBy: 'TExpBesoinDets')]
    private $BesoinCab;

    #[ORM\Column(type: 'float', nullable: true)]
    private $qt_livre;

     #[ORM\JoinColumn(name: 'conditionnement', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \App\Entity\PUnite::class)]
    private $conditionnement;
    
        #[ORM\JoinColumn(name: 'conditionnement_livre', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \App\Entity\PUnite::class)]
    private $conditionnement_livre;
    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $observation;

    // public function getConditionnement_livre(): ?string
    // {
    //     return $this->conditionnement_livre;
    // }

    // public function setConditionnement_livre(?string $conditionnement_livre): self
    // {
    //     $this->conditionnement_livre = $conditionnement_livre;

    //     return $this;
    // }


    // public function getConditionnement(): ?string
    // {
    //     return $this->conditionnement;
    // }

    // public function setConditionnement(?string $Conditionnement): self
    // {
    //     $this->conditionnement = $Conditionnement;

    //     return $this;
    // }
    public function getconditionnement(): ?PUnite
    {
        return $this->conditionnement;
    }

    public function setconditionnement(?PUnite $conditionnement): self
    {
        $this->conditionnement = $conditionnement;

        return $this;
    }
    public function getconditionnement_livre(): ?PUnite
    {
        return $this->conditionnement_livre;
    }

    public function setconditionnement_livre(?PUnite $conditionnement_livre): self
    {
        $this->conditionnement_livre = $conditionnement_livre;

        return $this;
    }

    public function getobservation(): ?string
    {
        return $this->observation;
    }

    public function setobservation(?string $observation): self
    {
        $this->observation = $observation;

        return $this;
    }
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

    public function getBesoinCab(): ?TExpBesoinCab
    {
        return $this->BesoinCab;
    }

    public function setBesoinCab(?TExpBesoinCab $BesoinCab): self
    {
        $this->BesoinCab = $BesoinCab;

        return $this;
    }

    public function getQt_livre(): ?float
    {
        return $this->qt_livre;
    }

    public function setQt_livre(?float $qt_livre): self
    {
        $this->qt_livre = $qt_livre;

        return $this;
    }
}
