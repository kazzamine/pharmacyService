<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: \App\Repository\EcritureCabRepository::class)]
class EcritureCab
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $code;
    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $abrev;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $piece;
    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $source;
    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $observation;
    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $dateDocAsso;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $dateCreation;
    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $montantHt;
    #[ORM\Column(type: 'text')]
    private $reference;
    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $utilisateur;
    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $cce;
    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $partenaire;
    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $tier;

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
   
    public function getAbrev(): ?string
    {
        return $this->abrev;
    }

    public function setAbrev(?string $abrev): self
    {
        $this->abrev = $abrev;

        return $this;
    }
   
    public function getPiece(): ?string
    {
        return $this->piece;
    }

    public function setPiece(?string $piece): self
    {
        $this->piece = $piece;

        return $this;
    }
    public function getSource(): ?string
    {
        return $this->source;
    }

    public function setSource(?string $source): self
    {
        $this->source = $source;

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
    public function getDateDocAsso(): ?string
    {
        return $this->dateDocAsso;
    }

    public function setDateDocAsso(?string $dateDocAsso): self
    {
        $this->dateDocAsso = $dateDocAsso;

        return $this;
    }
    public function getDateCreation(): ?string
    {
        return $this->dateCreation;
    }

    public function setDateCreation(?string $dateCreation): self
    {
        $this->dateCreation = $dateCreation;

        return $this;
    }
    public function getMontantHt(): ?string
    {
        return $this->montantHt;
    }

    public function setMontantHt(?string $montantHt): self
    {
        $this->montantHt = $montantHt;

        return $this;
    }
    public function getReference(): ?string
    {
        return $this->reference;
    }

    public function setReference(?string $reference): self
    {
        $this->reference = $reference;

        return $this;
    }
    public function getUtilisateur(): ?string
    {
        return $this->utilisateur;
    }

    public function setUtilisateur(?string $utilisateur): self
    {
        $this->utilisateur = $utilisateur;

        return $this;
    }
    public function getCce(): ?string
    {
        return $this->cce;
    }

    public function setCce(?string $cce): self
    {
        $this->cce = $cce;

        return $this;
    }
    public function getPartenaire(): ?string
    {
        return $this->partenaire;
    }

    public function setPartenaire(?string $partenaire): self
    {
        $this->partenaire = $partenaire;

        return $this;
    }
   
    public function getTier(): ?string
    {
        return $this->tier;
    }

    public function setTier(?string $tier): self
    {
        $this->tier = $tier;

        return $this;
    }
   

}
