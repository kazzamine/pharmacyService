<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Table(name: 'univ_xseance')]
#[ORM\Entity(repositoryClass: \App\Repository\UnivXSeanceRepository::class)]
class UnivXSeance
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: 'Auto', type: 'integer')]
    private $id;

    #[ORM\Column(name: 'ID_FeuilleA', type: 'string', length: 20)]
    private $idFeuilleA;

    #[ORM\Column(name: 'ID_Séance', type: 'integer', length: 11)]
    private $idSeance;

    #[ORM\Column(name: 'TypeSéance', type: 'string', length: 45)]
    private $typeSeance;

    #[ORM\Column(name: 'ID_Etablissement', type: 'string', length: 45)]
    private $idEtablissement;

    #[ORM\Column(name: 'ID_Formation', type: 'string', length: 45)]
    private $idFormation;

    #[ORM\Column(name: 'ID_Promotion', type: 'string', length: 45)]
    private $idPromotion;

    #[ORM\Column(name: 'ID_Annee', type: 'string', length: 45)]
    private $idAnnee;

    #[ORM\Column(name: 'Année_Lib', type: 'string', length: 45, nullable: true)]
    private $anneeLib;

    #[ORM\Column(name: 'ID_Semestre', type: 'string', length: 45)]
    private $idSemestre;

    #[ORM\Column(name: 'Groupe', type: 'string', length: 10)]
    private $groupe;

    #[ORM\Column(name: 'ID_Module', type: 'string', length: 45)]
    private $idModule;

    #[ORM\Column(name: 'ID_Element', type: 'string', length: 45)]
    private $idElement;

    #[ORM\Column(name: 'ID_Enseignant', type: 'string', length: 45, nullable: true)]
    private $idEnseignant;

    #[ORM\Column(name: 'ID_Salle', type: 'string', length: 45)]
    private $idSalle;

    #[ORM\Column(name: 'Date_Séance', type: 'date')]
    private $dateSeance;

    #[ORM\Column(name: 'semaine', type: 'integer', nullable: true, length: 11)]
    private $semaine;

    #[ORM\Column(name: 'Heure_Debut', type: 'time')]
    private $heureDebut;

    #[ORM\Column(name: 'Heure_Fin', type: 'time')]
    private $heureFin;

    #[ORM\Column(name: 'Traitement', type: 'integer', nullable: true, length: 1)]
    private $traitement;

    #[ORM\Column(name: 'Cloturer', type: 'integer', nullable: true, length: 1)]
    private $cloturer;

    #[ORM\Column(name: 'Date_Sys', type: 'date')]
    private $dateSys;

    #[ORM\Column(name: 'Statut', type: 'integer', length: 11)]
    private $status;

    #[ORM\Column(name: 'Existe', type: 'integer', nullable: true, length: 1)]
    private $existe;

    #[ORM\Column(name: 'Signé', type: 'integer', nullable: true, length: 1)]
    private $signe;

    #[ORM\Column(name: 'Annulée', type: 'integer', nullable: true, length: 1)]
    private $annulee;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdFeuilleA(): ?string
    {
        return $this->IdFeuilleA;
    }

    public function setIdFeuilleA(string $IdFeuilleA): self
    {
        $this->IdFeuilleA = $IdFeuilleA;

        return $this;
    }

    public function getIdSeance(): ?int
    {
        return $this->IdSeance;
    }

    public function setIdSeance(int $IdSeance): self
    {
        $this->IdSeance = $IdSeance;

        return $this;
    }

    public function getTypeSeance(): ?string
    {
        return $this->TypeSeance;
    }

    public function setTypeSeance(string $TypeSeance): self
    {
        $this->TypeSeance = $TypeSeance;

        return $this;
    }

    public function getIdEtablissement(): ?string
    {
        return $this->IdEtablissement;
    }

    public function setIdEtablissement(string $IdEtablissement): self
    {
        $this->IdEtablissement = $IdEtablissement;

        return $this;
    }

    public function getIdFormation(): ?string
    {
        return $this->IdFormation;
    }

    public function setIdFormation(string $IdFormation): self
    {
        $this->IdFormation = $IdFormation;

        return $this;
    }

    public function getIdPromotion(): ?string
    {
        return $this->IdPromotion;
    }

    public function setIdPromotion(string $IdPromotion): self
    {
        $this->IdPromotion = $IdPromotion;

        return $this;
    }

    public function getIdAnnee(): ?string
    {
        return $this->IdAnnee;
    }

    public function setIdAnnee(string $IdAnnee): self
    {
        $this->IdAnnee = $IdAnnee;

        return $this;
    }

    public function getAnneeLib(): ?string
    {
        return $this->AnneeLib;
    }

    public function setAnneeLib(?string $AnneeLib): self
    {
        $this->AnneeLib = $AnneeLib;

        return $this;
    }

    public function getIdSemestre(): ?string
    {
        return $this->IdSemestre;
    }

    public function setIdSemestre(string $IdSemestre): self
    {
        $this->IdSemestre = $IdSemestre;

        return $this;
    }

    public function getGroupe(): ?string
    {
        return $this->Groupe;
    }

    public function setGroupe(string $Groupe): self
    {
        $this->Groupe = $Groupe;

        return $this;
    }

    public function getIdModule(): ?string
    {
        return $this->IdModule;
    }

    public function setIdModule(string $IdModule): self
    {
        $this->IdModule = $IdModule;

        return $this;
    }

    public function getIdElement(): ?string
    {
        return $this->IdElement;
    }

    public function setIdElement(string $IdElement): self
    {
        $this->IdElement = $IdElement;

        return $this;
    }

    public function getIdEnseignant(): ?string
    {
        return $this->IdEnseignant;
    }

    public function setIdEnseignant(?string $IdEnseignant): self
    {
        $this->IdEnseignant = $IdEnseignant;

        return $this;
    }

    public function getIdSalle(): ?string
    {
        return $this->IdSalle;
    }

    public function setIdSalle(string $IdSalle): self
    {
        $this->IdSalle = $IdSalle;

        return $this;
    }

    public function getDateSeance(): ?\DateTimeInterface
    {
        return $this->DateSeance;
    }

    public function setDateSeance(\DateTimeInterface $DateSeance): self
    {
        $this->DateSeance = $DateSeance;

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

    public function getHeureDebut(): ?\DateTimeInterface
    {
        return $this->HeureDebut;
    }

    public function setHeureDebut(\DateTimeInterface $HeureDebut): self
    {
        $this->HeureDebut = $HeureDebut;

        return $this;
    }

    public function getHeureFin(): ?\DateTimeInterface
    {
        return $this->HeureFin;
    }

    public function setHeureFin(\DateTimeInterface $HeureFin): self
    {
        $this->HeureFin = $HeureFin;

        return $this;
    }

    public function getTraitement(): ?int
    {
        return $this->Traitement;
    }

    public function setTraitement(?int $Traitement): self
    {
        $this->Traitement = $Traitement;

        return $this;
    }

    public function getCloturer(): ?int
    {
        return $this->Cloturer;
    }

    public function setCloturer(?int $Cloturer): self
    {
        $this->Cloturer = $Cloturer;

        return $this;
    }

    public function getDateSys(): ?\DateTimeInterface
    {
        return $this->DateSys;
    }

    public function setDateSys(\DateTimeInterface $DateSys): self
    {
        $this->DateSys = $DateSys;

        return $this;
    }

    public function getStatus(): ?int
    {
        return $this->Status;
    }

    public function setStatus(int $Status): self
    {
        $this->Status = $Status;

        return $this;
    }

    public function getExiste(): ?int
    {
        return $this->Existe;
    }

    public function setExiste(?int $Existe): self
    {
        $this->Existe = $Existe;

        return $this;
    }

    public function getSigne(): ?int
    {
        return $this->signe;
    }

    public function setSigne(?int $signe): self
    {
        $this->signe = $signe;

        return $this;
    }

    public function getAnnulee(): ?int
    {
        return $this->Annulee;
    }

    public function setAnnulee(?int $Annulee): self
    {
        $this->Annulee = $Annulee;

        return $this;
    }
}
