<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Table(name: 'univ_xseance_justif')]
#[ORM\Entity(repositoryClass: \App\Repository\UnivXSeanceJustifRepository::class)]
class UnivXSeanceJustif
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: 'Auto', type: 'integer')]
    private $id;

    #[ORM\Column(name: 'ID_Justif', type: 'string', length: 16)]
    private $idJustif;

    #[ORM\Column(name: 'ID_Promotion', type: 'string', length: 45)]
    private $idPromotion;

    #[ORM\Column(name: 'ID_Semestre', type: 'string', length: 45)]
    private $idSemestre;

    #[ORM\Column(name: 'ID_Année', type: 'string', length: 45)]
    private $idAnnee;

    #[ORM\Column(name: 'ID_Admission', type: 'string', length: 45)]
    private $idAdmission;

    #[ORM\Column(name: 'Date_Début', type: 'date')]
    private $dateDebut;

    #[ORM\Column(name: 'Date_Fin', type: 'date')]
    private $dateFin;

    #[ORM\Column(name: 'Date_Dépot', type: 'date')]
    private $dateDepot;

    #[ORM\Column(name: 'Durée', type: 'integer', nullable: true, length: 11)]
    private $duree;

    #[ORM\Column(name: 'Type_Justif', type: 'string', length: 20, nullable: true)]
    private $typeJustif;

    #[ORM\Column(name: 'Motif', type: 'string', length: 100, nullable: true)]
    private $motif;

    #[ORM\Column(name: 'Commission', type: 'integer', length: 1)]
    private $commission;

    #[ORM\Column(name: 'Décision', type: 'string', length: 60, nullable: true)]
    private $decision;

    #[ORM\Column(name: 'Obs', type: 'string', length: 100, nullable: true)]
    private $obs;

    #[ORM\Column(name: 'Date_Sys', type: 'datetime')]
    private $dateSys;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdJustif(): ?string
    {
        return $this->idJustif;
    }

    public function setIdJustif(string $idJustif): self
    {
        $this->idJustif = $idJustif;

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

    public function getIdAdmission(): ?string
    {
        return $this->idAdmission;
    }

    public function setIdAdmission(string $idAdmission): self
    {
        $this->idAdmission = $idAdmission;

        return $this;
    }

    public function getDateDebut(): ?\DateTimeInterface
    {
        return $this->dateDebut;
    }

    public function setDateDebut(\DateTimeInterface $dateDebut): self
    {
        $this->dateDebut = $dateDebut;

        return $this;
    }

    public function getDateFin(): ?\DateTimeInterface
    {
        return $this->dateFin;
    }

    public function setDateFin(\DateTimeInterface $dateFin): self
    {
        $this->dateFin = $dateFin;

        return $this;
    }

    public function getDateDepot(): ?\DateTimeInterface
    {
        return $this->dateDepot;
    }

    public function setDateDepot(\DateTimeInterface $dateDepot): self
    {
        $this->dateDepot = $dateDepot;

        return $this;
    }

    public function getDuree(): ?int
    {
        return $this->duree;
    }

    public function setDuree(?int $duree): self
    {
        $this->duree = $duree;

        return $this;
    }

    public function getTypeJustif(): ?string
    {
        return $this->typeJustif;
    }

    public function setTypeJustif(?string $typeJustif): self
    {
        $this->typeJustif = $typeJustif;

        return $this;
    }

    public function getMotif(): ?string
    {
        return $this->motif;
    }

    public function setMotif(?string $motif): self
    {
        $this->motif = $motif;

        return $this;
    }

    public function getCommission(): ?int
    {
        return $this->commission;
    }

    public function setCommission(int $commission): self
    {
        $this->commission = $commission;

        return $this;
    }

    public function getDecision(): ?string
    {
        return $this->decision;
    }

    public function setDecision(?string $decision): self
    {
        $this->decision = $decision;

        return $this;
    }

    public function getObs(): ?string
    {
        return $this->obs;
    }

    public function setObs(?string $obs): self
    {
        $this->obs = $obs;

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
