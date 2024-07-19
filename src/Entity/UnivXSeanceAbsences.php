<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Table(name: 'univ_xseance_absences')]
#[ORM\Entity(repositoryClass: \App\Repository\UnivXSeanceAbsencesRepository::class)]
class UnivXSeanceAbsences
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: 'Auto', type: 'integer')]
    private $id;

    #[ORM\Column(name: 'ID_Admission', type: 'string', length: 30)]
    private $idAdmission;

    #[ORM\Column(name: 'ID_Séance', type: 'integer', length: 11)]
    private $idSeance;

    #[ORM\Column(name: 'ID_User', type: 'integer', length: 11)]
    private $idUser;

    #[ORM\Column(name: 'Nom', type: 'string', length: 45)]
    private $nom;

    #[ORM\Column(name: 'Prénom', type: 'string', length: 45)]
    private $prenom;

    #[ORM\Column(name: 'ID_Groupe_Stage', type: 'integer', length: 11)]
    private $idGroupeStage;

    #[ORM\Column(name: 'Date_Pointage', type: 'date')]
    private $datePointage;

    #[ORM\Column(name: 'Heure_Pointage', type: 'time')]
    private $heurePointage;

    #[ORM\Column(name: 'Retard', type: 'string', length: 15, nullable: true)]
    private $retard;

    #[ORM\Column(name: 'Categorie', type: 'string', length: 10, nullable: true)]
    private $categorie;

    #[ORM\Column(name: 'Categorie_Enseig', type: 'string', length: 10, nullable: true)]
    private $categorieEnseig;

    #[ORM\Column(name: 'Justifier', type: 'integer', nullable: true)]
    private $justifier;

    #[ORM\Column(name: 'ID_Justif', type: 'smallint', nullable: true, length: 2)]
    private $idJustif;

    #[ORM\Column(name: 'Motif', type: 'smallint', nullable: true, length: 2)]
    private $motif;

    #[ORM\Column(name: 'Comptabilisé', type: 'integer', nullable: true, length: 1)]
    private $comptabilise;

    #[ORM\Column(name: 'Date_Sys', type: 'date')]
    private $dateSys;

    #[ORM\Column(name: 'Obs', type: 'string', length: 100, nullable: true)]
    private $obs;

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

    public function getIdSeance(): ?int
    {
        return $this->idSeance;
    }

    public function setIdSeance(int $idSeance): self
    {
        $this->idSeance = $idSeance;

        return $this;
    }

    public function getIdUser(): ?int
    {
        return $this->idUser;
    }

    public function setIdUser(int $idUser): self
    {
        $this->idUser = $idUser;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getIdGroupeStage(): ?int
    {
        return $this->idGroupeStage;
    }

    public function setIdGroupeStage(int $idGroupeStage): self
    {
        $this->idGroupeStage = $idGroupeStage;

        return $this;
    }

    public function getDatePointage(): ?\DateTimeInterface
    {
        return $this->datePointage;
    }

    public function setDatePointage(\DateTimeInterface $datePointage): self
    {
        $this->datePointage = $datePointage;

        return $this;
    }

    public function getHeurePointage(): ?\DateTimeInterface
    {
        return $this->heurePointage;
    }

    public function setHeurePointage(\DateTimeInterface $heurePointage): self
    {
        $this->heurePointage = $heurePointage;

        return $this;
    }

    public function getRetard(): ?string
    {
        return $this->retard;
    }

    public function setRetard(?string $retard): self
    {
        $this->retard = $retard;

        return $this;
    }

    public function getCategorie(): ?string
    {
        return $this->categorie;
    }

    public function setCategorie(?string $categorie): self
    {
        $this->categorie = $categorie;

        return $this;
    }

    public function getCategorieEnseig(): ?string
    {
        return $this->categorieEnseig;
    }

    public function setCategorieEnseig(?string $categorieEnseig): self
    {
        $this->categorieEnseig = $categorieEnseig;

        return $this;
    }

    public function getJustifier(): ?int
    {
        return $this->justifier;
    }

    public function setJustifier(?int $justifier): self
    {
        $this->justifier = $justifier;

        return $this;
    }

    public function getIdJustif(): ?int
    {
        return $this->idJustif;
    }

    public function setIdJustif(?int $idJustif): self
    {
        $this->idJustif = $idJustif;

        return $this;
    }

    public function getMotif(): ?int
    {
        return $this->motif;
    }

    public function setMotif(?int $motif): self
    {
        $this->motif = $motif;

        return $this;
    }

    public function getComptabilise(): ?int
    {
        return $this->comptabilise;
    }

    public function setComptabilise(?int $comptabilise): self
    {
        $this->comptabilise = $comptabilise;

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

    public function getObs(): ?string
    {
        return $this->obs;
    }

    public function setObs(?string $obs): self
    {
        $this->obs = $obs;

        return $this;
    }
}
