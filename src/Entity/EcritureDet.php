<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: \App\Repository\EcritureDetRepository::class)]
class EcritureDet
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
    private $freref;
    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $designation;
    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $libelleEcCp;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $pc;
    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $nom;
    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $lettrageAdonix;
    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $montant;
    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $sens;
    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $ligne;
    

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
    public function getFreref(): ?string
    {
        return $this->freref;
    }

    public function setFreref(?string $freref): self
    {
        $this->freref = $freref;

        return $this;
    }
    public function getDesignation(): ?string
    {
        return $this->designation;
    }

    public function setDesignation(?string $designation): self
    {
        $this->designation = $designation;

        return $this;
    }
    public function getLibelleEcCp(): ?string
    {
        return $this->libelleEcCp;
    }

    public function setLibelleEcCp(?string $libelleEcCp): self
    {
        $this->libelleEcCp = $libelleEcCp;

        return $this;
    }
    public function getPc(): ?string
    {
        return $this->pc;
    }

    public function setPc(?string $pc): self
    {
        $this->pc = $pc;

        return $this;
    }
    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(?string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }
    public function getLettrageAdonix(): ?string
    {
        return $this->lettrageAdonix;
    }

    public function setLettrageAdonix(?string $lettrageAdonix): self
    {
        $this->lettrageAdonix = $lettrageAdonix;

        return $this;
    }
    public function getMontant(): ?string
    {
        return $this->montant;
    }

    public function setMontant(?string $montant): self
    {
        $this->montant = $montant;

        return $this;
    }
    public function getSens(): ?string
    {
        return $this->sens;
    }

    public function setSens(?string $sens): self
    {
        $this->sens = $sens;

        return $this;
    }
    public function getLigne(): ?string
    {
        return $this->ligne;
    }

    public function setLigne(?string $ligne): self
    {
        $this->ligne = $ligne;

        return $this;
    }
   
   
   

}
