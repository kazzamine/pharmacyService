<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: \App\Repository\FormatPapierRepository::class)]
class FormatPapier
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255, unique: true)]
    private $abriviation;


    #[ORM\Column(type: 'string', length: 255)]
    private $item;

    #[ORM\Column(type: 'string', length: 255)]
    private $valeur;


    #[ORM\Column(type: 'string', length: 255)]
    private $nomTable;


    public function getNomTable(): ?string
    {
        return $this->nomTable;
    }

    public function setNomTable(string $nomTable): self
    {
        $this->nomTable = $nomTable;

        return $this;
    }

    public function getId(): ?int
    {
        return $this->id;
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


    public function getItem(): ?string
    {
        return $this->item;
    }

    public function setItem(string $item): self
    {
        $this->item = $item;

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

}
