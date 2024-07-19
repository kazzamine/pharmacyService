<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: \App\Repository\ConfPdfParameterRepository::class)]
class ConfPdfParameter
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255, unique: true)]
    private $abriviation;

    #[ORM\Column(type: 'string', length: 255)]
    private $parametre;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $valeur;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $valeurType;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $nomTable;


    #[ORM\JoinColumn(nullable: false)]
    #[ORM\ManyToOne(targetEntity: \App\Entity\ConfPdfType::class, inversedBy: 'confPdfParameters')]
    private $ConfPdfType;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getConfPdfType(): ?ConfPdfType
    {
        return $this->ConfPdfType;
    }

    public function setConfPdfType(?ConfPdfType $ConfPdfType): self
    {
        $this->ConfPdfType = $ConfPdfType;

        return $this;
    }

    public function getAbriviation(): ?string
    {
        return $this->abriviation;
    }

    public function setAbriviation(string $abriviation): self
    {
        $this->abriviation = $abriviation;

        return $this;
    }

    public function getParametre(): ?string
    {
        return $this->parametre;
    }

    public function setParametre(string $parametre): self
    {
        $this->parametre = $parametre;

        return $this;
    }

    public function getValeur(): ?string
    {
        return $this->valeur;
    }

    public function setValeur(string $valeur): self
    {
        $this->valeur = $valeur;

        return $this;
    }


    public function getValeurType(): ?string
    {
        return $this->valeurType;
    }

    public function setValeurType(string $valeurType): self
    {
        $this->valeurType = $valeurType;

        return $this;
    }


    public function getNomTable(): ?string
    {
        return $this->nomTable;
    }

    public function setNomTable(string $nomTable): self
    {
        $this->nomTable = $nomTable;

        return $this;
    }
}
