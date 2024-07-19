<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: \App\Repository\DelaiRepository::class)]
class Delai
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'integer')]
    private $ordre;

    #[ORM\Column(type: 'integer')]
    private $pourcentage;

    #[ORM\Column(type: 'integer')]
    private $delai;

    #[ORM\ManyToOne(targetEntity: \App\Entity\PMarcheDet::class, inversedBy: 'delais')]
    private $PMarcheDet;

    #[ORM\Column(type: 'float', nullable: true)]
    private $delaiMois;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOrdre(): ?int
    {
        return $this->ordre;
    }

    public function setOrdre(int $ordre): self
    {
        $this->ordre = $ordre;

        return $this;
    }

    public function getPourcentage(): ?int
    {
        return $this->pourcentage;
    }

    public function setPourcentage(int $pourcentage): self
    {
        $this->pourcentage = $pourcentage;

        return $this;
    }

    public function getDelai(): ?int
    {
        return $this->delai;
    }

    public function setDelai(int $delai): self
    {
        $this->delai = $delai;

        return $this;
    }

    public function getPMarcheDet(): ?PMarcheDet
    {
        return $this->PMarcheDet;
    }

    public function setPMarcheDet(?PMarcheDet $PMarcheDet): self
    {
        $this->PMarcheDet = $PMarcheDet;

        return $this;
    }

    public function getDelaiMois(): ?float
    {
        return $this->delaiMois;
    }

    public function setDelaiMois(?float $delaiMois): self
    {
        $this->delaiMois = $delaiMois;

        return $this;
    }
}
