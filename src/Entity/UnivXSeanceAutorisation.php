<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Table(name: 'univ_xseance_autorisation')]
#[ORM\Entity(repositoryClass: \App\Repository\UnivXSeanceAutorisationRepository::class)]
class UnivXSeanceAutorisation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: 'Auto', type: 'integer')]
    private $id;

    #[ORM\Column(name: 'ID_Autoris', type: 'string', length: 45)]
    private $idAutoris;

    #[ORM\Column(name: 'Date_Autoris', type: 'date')]
    private $dateAutoris;

    #[ORM\Column(name: 'ID_Admission', type: 'string', length: 45)]
    private $idAdmission;

    #[ORM\Column(name: 'ID_Promotion', type: 'string', length: 45)]
    private $idPromotion;

    #[ORM\Column(name: 'Début_Autoris', type: 'date')]
    private $debutAutoris;

    #[ORM\Column(name: 'Fin_Autoris', type: 'date')]
    private $finAutoris;

    #[ORM\Column(name: 'ID_Motif', type: 'string', length: 45)]
    private $idMotif;

    #[ORM\Column(name: 'Obs_Autoris', type: 'string', length: 100, nullable: true)]
    private $obsAutoris;

    #[ORM\Column(name: 'Statut', type: 'integer', length: 11)]
    private $statut;

    #[ORM\Column(name: 'Date_Sys', type: 'date')]
    private $dateSys;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdAutoris(): ?string
    {
        return $this->idAutoris;
    }

    public function setIdAutoris(string $idAutoris): self
    {
        $this->idAutoris = $idAutoris;

        return $this;
    }

    public function getDateAutoris(): ?\DateTimeInterface
    {
        return $this->dateAutoris;
    }

    public function setDateAutoris(\DateTimeInterface $dateAutoris): self
    {
        $this->dateAutoris = $dateAutoris;

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

    public function getIdPromotion(): ?string
    {
        return $this->idPromotion;
    }

    public function setIdPromotion(string $idPromotion): self
    {
        $this->idPromotion = $idPromotion;

        return $this;
    }

    public function getDebutAutoris(): ?\DateTimeInterface
    {
        return $this->debutAutoris;
    }

    public function setDebutAutoris(\DateTimeInterface $debutAutoris): self
    {
        $this->debutAutoris = $debutAutoris;

        return $this;
    }

    public function getFinAutoris(): ?\DateTimeInterface
    {
        return $this->finAutoris;
    }

    public function setFinAutoris(\DateTimeInterface $finAutoris): self
    {
        $this->finAutoris = $finAutoris;

        return $this;
    }

    public function getIdMotif(): ?\DateTimeInterface
    {
        return $this->idMotif;
    }

    public function setIdMotif(\DateTimeInterface $idMotif): self
    {
        $this->idMotif = $idMotif;

        return $this;
    }

    public function getObsAutoris(): ?string
    {
        return $this->obsAutoris;
    }

    public function setObsAutoris(?string $obsAutoris): self
    {
        $this->obsAutoris = $obsAutoris;

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
