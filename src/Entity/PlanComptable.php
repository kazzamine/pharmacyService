<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: \App\Repository\PlanComptableRepository::class)]
class PlanComptable
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $NumCompte;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $Nomenclature;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $classe;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $rubrique;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumCompte(): ?int
    {
        return $this->NumCompte;
    }

    public function setNumCompte(?int $NumCompte): self
    {
        $this->NumCompte = $NumCompte;

        return $this;
    }

    public function getNomenclature(): ?string
    {
        return $this->Nomenclature;
    }

    public function setNomenclature(?string $Nomenclature): self
    {
        $this->Nomenclature = $Nomenclature;

        return $this;
    }

    public function getClasse(): ?string
    {
        return $this->classe;
    }

    public function setClasse(?string $classe): self
    {
        $this->classe = $classe;

        return $this;
    }

    public function getRubrique(): ?string
    {
        return $this->rubrique;
    }

    public function setRubrique(?string $rubrique): self
    {
        $this->rubrique = $rubrique;

        return $this;
    }
}
