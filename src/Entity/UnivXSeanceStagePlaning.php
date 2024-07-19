<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Table(name: 'univ_xseance_stage_planing')]
#[ORM\Entity(repositoryClass: \App\Repository\UnivXSeanceStagePlaningRepository::class)]
class UnivXSeanceStagePlaning
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: 'Auto', type: 'integer')]
    private $id;

    #[ORM\Column(name: 'ID_Promotion', type: 'string', length: 45)]
    private $idPromotion;

    #[ORM\Column(name: 'ID_Seance', type: 'integer')]
    private $idSeance;

    #[ORM\Column(name: 'ID_Année', type: 'string', length: 45)]
    private $idAnnee;

    #[ORM\Column(name: 'Année_Lib', type: 'string', length: 45, nullable: true)]
    private $anneeLib;

    #[ORM\Column(name: 'Groupe', type: 'integer', nullable: true)]
    private $groupe;

    #[ORM\Column(name: 'ID_Service', type: 'integer')]
    private $idService;

    #[ORM\Column(name: 'Semaine', type: 'integer', nullable: true)]
    private $semaine;

    #[ORM\Column(name: 'Date_Seance', type: 'date')]
    private $dateSeance;

    #[ORM\Column(name: 'Heure_D', type: 'datetime')]
    private $heureD;

    #[ORM\Column(name: 'Heure_F', type: 'datetime')]
    private $heureF;

    #[ORM\Column(name: 'Date_Sys', type: 'datetime')]
    private $dateSys;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getIdSeance(): ?int
    {
        return $this->idSeance;
    }

    public function setIdSeance(int $idSeance): self
    {
        $this->idSeance = $idSeance;

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

    public function getAnneeLib(): ?string
    {
        return $this->anneeLib;
    }

    public function setAnneeLib(?string $anneeLib): self
    {
        $this->anneeLib = $anneeLib;

        return $this;
    }

    public function getGroupe(): ?int
    {
        return $this->groupe;
    }

    public function setGroupe(?int $groupe): self
    {
        $this->groupe = $groupe;

        return $this;
    }

    public function getIdService(): ?int
    {
        return $this->idService;
    }

    public function setIdService(int $idService): self
    {
        $this->idService = $idService;

        return $this;
    }

    public function getSemaine(): ?int
    {
        return $this->semaine;
    }

    public function setSemaine(?int $semaine): self
    {
        $this->semaine = $semaine;

        return $this;
    }

    public function getDateSeance(): ?\DateTimeInterface
    {
        return $this->dateSeance;
    }

    public function setDateSeance(\DateTimeInterface $dateSeance): self
    {
        $this->dateSeance = $dateSeance;

        return $this;
    }

    public function getHeureD(): ?\DateTimeInterface
    {
        return $this->heureD;
    }

    public function setHeureD(\DateTimeInterface $heureD): self
    {
        $this->heureD = $heureD;

        return $this;
    }

    public function getHeureF(): ?\DateTimeInterface
    {
        return $this->heureF;
    }

    public function setHeureF(\DateTimeInterface $heureF): self
    {
        $this->heureF = $heureF;

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
