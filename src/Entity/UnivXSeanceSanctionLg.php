<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Table(name: 'univ_xseance_sanction_lg')]
#[ORM\Entity(repositoryClass: \App\Repository\UnivXSeanceSanctionLgRepository::class)]
class UnivXSeanceSanctionLg {

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: 'ID', type: 'integer')]
    private $id;

    
    #[ORM\Column(name: 'Auto', type: 'integer')]
    private $Auto;

    #[ORM\Column(name: 'ID_Admission', type: 'string', length: 45)]
    private $idAdmission;

    #[ORM\Column(name: 'Date_Exe', type: 'date')]
    private $dateExe;

    #[ORM\Column(name: 'Statut', type: 'integer')]
    private $statut;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAuto(): ?int
    {
        return $this->Auto;
    }

    public function setAuto(int $Auto): self
    {
        $this->Auto = $Auto;

        return $this;
    }

    public function getIdAdmission(): ?string
    {
        return $this->idAdmission;
    }

    public function setIdAdmission(string $idAdmission): self
    {
        $this->idAdmission = $idAdmission;

        return $this;
    }

    public function getDateExe(): ?\DateTimeInterface
    {
        return $this->dateExe;
    }

    public function setDateExe(\DateTimeInterface $dateExe): self
    {
        $this->dateExe = $dateExe;

        return $this;
    }

    public function getStatut(): ?int
    {
        return $this->statut;
    }

    public function setStatut(int $statut): self
    {
        $this->statut = $statut;

        return $this;
    }

}
