<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Table(name: 'univ_xseance_capitaliser')]
#[ORM\Entity(repositoryClass: \App\Repository\UnivXSeanceCapitaliserRepository::class)]
class UnivXSeanceCapitaliser
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: 'Auto', type: 'integer')]
    private $id;

    #[ORM\Column(name: 'ID_Admission', type: 'string', length: 30)]
    private $idAdmission;

    #[ORM\Column(name: 'ID_Promotion', type: 'string', length: 45)]
    private $idPromotion;

    #[ORM\Column(name: 'ID_Module', type: 'string', length: 45)]
    private $idModule;

    #[ORM\Column(name: 'ID_Semestre', type: 'string', length: 45)]
    private $idSemestre;

    #[ORM\Column(name: 'ID_Année', type: 'string', length: 45)]
    private $idAnnee;

    #[ORM\Column(name: 'Date_Sys', type: 'datetime')]
    private $dateSys;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getIdPromotion(): ?string
    {
        return $this->idPromotion;
    }

    public function setIdPromotion(string $idPromotion): self
    {
        $this->idPromotion = $idPromotion;

        return $this;
    }

    public function getIdModule(): ?string
    {
        return $this->idModule;
    }

    public function setIdModule(string $idModule): self
    {
        $this->idModule = $idModule;

        return $this;
    }

    public function getIdSemestre(): ?string
    {
        return $this->idSemestre;
    }

    public function setIdSemestre(string $idSemestre): self
    {
        $this->idSemestre = $idSemestre;

        return $this;
    }

    public function getIdAnnee(): ?string
    {
        return $this->idAnnee;
    }

    public function setIdAnnee(string $idAnnee): self
    {
        $this->idAnnee = $idAnnee;

        return $this;
    }

    public function getDateSys(): ?\DateTimeInterface
    {
        return $this->dateSys;
    }

    public function setDateSys(\DateTimeInterface $dateSys): self
    {
        $this->dateSys = $dateSys;

        return $this;
    }
}
