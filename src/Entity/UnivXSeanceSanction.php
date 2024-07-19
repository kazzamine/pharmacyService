<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Table(name: 'univ_xseance_sanction')]
#[ORM\Entity(repositoryClass: \App\Repository\UnivXSeanceSanctionRepository::class)]
class UnivXSeanceSanction
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: 'Auto', type: 'integer')]
    private $id;

    #[ORM\Column(name: 'Tranche_Sem', type: 'integer', length: 11)]
    private $trancheSem;

    #[ORM\Column(name: 'ID_Promotion', type: 'string', length: 45)]
    private $idPromotion;

    #[ORM\Column(name: 'ID_Semestre', type: 'string', length: 45)]
    private $idSemestre;

    #[ORM\Column(name: 'ID_Année', type: 'string', length: 45)]
    private $idAnnee;

    #[ORM\Column(name: 'Année_Lib', type: 'string', length: 45, nullable: true)]
    private $anneeLib;

    #[ORM\Column(name: 'ID_Admission', type: 'string', length: 45)]
    private $idAdmission;

    #[ORM\Column(name: 'Nom', type: 'string', length: 45)]
    private $nom;

    #[ORM\Column(name: 'Prénom', type: 'string', length: 45)]
    private $prenom;

    #[ORM\Column(name: 'Num_S1', type: 'integer', length: 45)]
    private $numS1;

    #[ORM\Column(name: 'DateD_S1', type: 'date')]
    private $datedS1;

    #[ORM\Column(name: 'DateF_S1', type: 'date')]
    private $datefS1;

    #[ORM\Column(name: 'VHA_S1', type: 'integer')]
    private $vhaS1;

    #[ORM\Column(name: 'VHR_S1', type: 'integer')]
    private $vhrS1;

    #[ORM\Column(name: 'Note_S1', type: 'decimal', precision: 10, scale: 2)]
    private $noteS1;

    #[ORM\Column(name: 'Tranche_S1', type: 'decimal', precision: 10, scale: 2)]
    private $trancheS1;

    #[ORM\Column(name: 'Décision_S1', type: 'string', length: 45, nullable: true)]
    private $decisionS1;

    #[ORM\Column(name: 'Num_S2', type: 'integer')]
    private $numS2;

    #[ORM\Column(name: 'DateD_S2', type: 'date')]
    private $datedS2;

    #[ORM\Column(name: 'DateF_S2', type: 'date')]
    private $datefS2;

    #[ORM\Column(name: 'VHA_S2', type: 'integer')]
    private $vhaS2;

    #[ORM\Column(name: 'VHR_S2', type: 'integer')]
    private $vhrS2;

    #[ORM\Column(name: 'Note_S2', type: 'decimal', precision: 10, scale: 2)]
    private $noteS2;

    #[ORM\Column(name: 'Tranche_S2', type: 'decimal', precision: 10, scale: 2)]
    private $trancheS2;

    #[ORM\Column(name: 'Décision_S2', type: 'string', length: 45, nullable: true)]
    private $decisionS2;

    #[ORM\Column(name: 'Num_S3', type: 'integer')]
    private $numS3;

    #[ORM\Column(name: 'DateD_S3', type: 'date')]
    private $datedS3;

    #[ORM\Column(name: 'DateF_S3', type: 'date')]
    private $datefS3;

    #[ORM\Column(name: 'VHA_S3', type: 'integer')]
    private $vhaS3;

    #[ORM\Column(name: 'VHR_S3', type: 'integer')]
    private $vhrS3;

    #[ORM\Column(name: 'Note_S3', type: 'decimal', precision: 10, scale: 2)]
    private $noteS3;

    #[ORM\Column(name: 'Tranche_S3', type: 'decimal', precision: 10, scale: 2)]
    private $trancheS3;

    #[ORM\Column(name: 'Décision_S3', type: 'string', length: 45)]
    private $decisionS3;

    #[ORM\Column(name: 'Num_S4', type: 'integer')]
    private $numS4;

    #[ORM\Column(name: 'DateD_S4', type: 'date')]
    private $datedS4;

    #[ORM\Column(name: 'DateF_S4', type: 'date')]
    private $datefS4;

    #[ORM\Column(name: 'VHA_S4', type: 'integer')]
    private $vhaS4;

    #[ORM\Column(name: 'VHR_S4', type: 'integer')]
    private $vhrS4;

    #[ORM\Column(name: 'Note_S4', type: 'decimal', precision: 10, scale: 2)]
    private $noteS4;

    #[ORM\Column(name: 'Tranche_S4', type: 'decimal', precision: 10, scale: 2)]
    private $trancheS4;

    #[ORM\Column(name: 'Décision_S4', type: 'string', length: 45, nullable: true)]
    private $decisionS4;

    #[ORM\Column(name: 'VHA_G1', type: 'integer', nullable: true)]
    private $vhaG1;

    #[ORM\Column(name: 'VHR_G1', type: 'integer', nullable: true)]
    private $vhrG1;

    #[ORM\Column(name: 'Note_G1', type: 'decimal', precision: 10, scale: 2, nullable: true)]
    private $noteG1;

    #[ORM\Column(name: 'Tranche_G1', type: 'decimal', precision: 10, scale: 2, nullable: true)]
    private $trancheG1;

    #[ORM\Column(name: 'Décision_G1', type: 'string', length: 45, nullable: true)]
    private $decisionG1;
	
	#[ORM\Column(name: 'Sanction_G1', type: 'string', length: 100, nullable: true)]
    private $sanctionG1;

    #[ORM\Column(name: 'VHA_Autorisé', type: 'integer', nullable: true)]
    private $vhaAutorise;

    #[ORM\Column(name: 'VHA_G2', type: 'integer', nullable: true)]
    private $vhaG2;

    #[ORM\Column(name: 'VHR_G2', type: 'integer', nullable: true)]
    private $vhrG2;

    #[ORM\Column(name: 'Note_G2', type: 'decimal', precision: 10, scale: 2, nullable: true)]
    private $noteG2;

    #[ORM\Column(name: 'Tranche_G2', type: 'decimal', precision: 10, scale: 2, nullable: true)]
    private $trancheG2;

    #[ORM\Column(name: 'Décision_G2', type: 'string', length: 45, nullable: true)]
    private $decisionG2;

    #[ORM\Column(name: 'Sanction_G2', type: 'string', length: 100)]
    private $sanctionG2;

    #[ORM\Column(name: 'Appliquer', type: 'integer', nullable: true)]
    private $appliquer;

    #[ORM\Column(name: 'Debut_App', type: 'date', nullable: true)]
    private $debutApp;

    #[ORM\Column(name: 'Fin_App', type: 'date', nullable: true)]
    private $finApp;

    #[ORM\Column(name: 'Motif', type: 'string', length: 100, nullable: true)]
    private $motif;

    #[ORM\Column(name: 'reclamation', type: 'text', nullable: true)]
    private $reclamation;

    #[ORM\Column(name: 'export_student_space', type: 'integer', nullable: true)]
    private $exportStudentSpace;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTrancheSem(): ?int
    {
        return $this->trancheSem;
    }

    public function setTrancheSem(int $trancheSem): self
    {
        $this->trancheSem = $trancheSem;

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

    public function getAnneeLib(): ?string
    {
        return $this->anneeLib;
    }

    public function setAnneeLib(?string $anneeLib): self
    {
        $this->anneeLib = $anneeLib;

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

    public function getNumS1(): ?int
    {
        return $this->numS1;
    }

    public function setNumS1(int $numS1): self
    {
        $this->numS1 = $numS1;

        return $this;
    }

    public function getDatedS1(): ?\DateTimeInterface
    {
        return $this->datedS1;
    }

    public function setDatedS1(\DateTimeInterface $datedS1): self
    {
        $this->datedS1 = $datedS1;

        return $this;
    }

    public function getDatefS1(): ?\DateTimeInterface
    {
        return $this->datefS1;
    }

    public function setDatefS1(\DateTimeInterface $datefS1): self
    {
        $this->datefS1 = $datefS1;

        return $this;
    }

    public function getVhaS1(): ?int
    {
        return $this->vhaS1;
    }

    public function setVhaS1(int $vhaS1): self
    {
        $this->vhaS1 = $vhaS1;

        return $this;
    }

    public function getVhrS1(): ?int
    {
        return $this->vhrS1;
    }

    public function setVhrS1(int $vhrS1): self
    {
        $this->vhrS1 = $vhrS1;

        return $this;
    }

    public function getNoteS1(): ?string
    {
        return $this->noteS1;
    }

    public function setNoteS1(string $noteS1): self
    {
        $this->noteS1 = $noteS1;

        return $this;
    }

    public function getTrancheS1(): ?string
    {
        return $this->trancheS1;
    }

    public function setTrancheS1(string $trancheS1): self
    {
        $this->trancheS1 = $trancheS1;

        return $this;
    }

    public function getDecisionS1(): ?string
    {
        return $this->decisionS1;
    }

    public function setDecisionS1(?string $decisionS1): self
    {
        $this->decisionS1 = $decisionS1;

        return $this;
    }

    public function getNumS2(): ?int
    {
        return $this->numS2;
    }

    public function setNumS2(int $numS2): self
    {
        $this->numS2 = $numS2;

        return $this;
    }

    public function getDatedS2(): ?\DateTimeInterface
    {
        return $this->datedS2;
    }

    public function setDatedS2(\DateTimeInterface $datedS2): self
    {
        $this->datedS2 = $datedS2;

        return $this;
    }

    public function getDatefS2(): ?\DateTimeInterface
    {
        return $this->datefS2;
    }

    public function setDatefS2(\DateTimeInterface $datefS2): self
    {
        $this->datefS2 = $datefS2;

        return $this;
    }

    public function getVhaS2(): ?int
    {
        return $this->vhaS2;
    }

    public function setVhaS2(int $vhaS2): self
    {
        $this->vhaS2 = $vhaS2;

        return $this;
    }

    public function getVhrS2(): ?int
    {
        return $this->vhrS2;
    }

    public function setVhrS2(int $vhrS2): self
    {
        $this->vhrS2 = $vhrS2;

        return $this;
    }

    public function getNoteS2(): ?string
    {
        return $this->noteS2;
    }

    public function setNoteS2(string $noteS2): self
    {
        $this->noteS2 = $noteS2;

        return $this;
    }

    public function getTrancheS2(): ?string
    {
        return $this->trancheS2;
    }

    public function setTrancheS2(string $trancheS2): self
    {
        $this->trancheS2 = $trancheS2;

        return $this;
    }

    public function getDecisionS2(): ?string
    {
        return $this->decisionS2;
    }

    public function setDecisionS2(?string $decisionS2): self
    {
        $this->decisionS2 = $decisionS2;

        return $this;
    }

    public function getNumS3(): ?int
    {
        return $this->numS3;
    }

    public function setNumS3(int $numS3): self
    {
        $this->numS3 = $numS3;

        return $this;
    }

    public function getDatedS3(): ?\DateTimeInterface
    {
        return $this->datedS3;
    }

    public function setDatedS3(\DateTimeInterface $datedS3): self
    {
        $this->datedS3 = $datedS3;

        return $this;
    }

    public function getDatefS3(): ?\DateTimeInterface
    {
        return $this->datefS3;
    }

    public function setDatefS3(\DateTimeInterface $datefS3): self
    {
        $this->datefS3 = $datefS3;

        return $this;
    }

    public function getVhaS3(): ?int
    {
        return $this->vhaS3;
    }

    public function setVhaS3(int $vhaS3): self
    {
        $this->vhaS3 = $vhaS3;

        return $this;
    }

    public function getVhrS3(): ?int
    {
        return $this->vhrS3;
    }

    public function setVhrS3(int $vhrS3): self
    {
        $this->vhrS3 = $vhrS3;

        return $this;
    }

    public function getNoteS3(): ?string
    {
        return $this->noteS3;
    }

    public function setNoteS3(string $noteS3): self
    {
        $this->noteS3 = $noteS3;

        return $this;
    }

    public function getTrancheS3(): ?string
    {
        return $this->trancheS3;
    }

    public function setTrancheS3(string $trancheS3): self
    {
        $this->trancheS3 = $trancheS3;

        return $this;
    }

    public function getDecisionS3(): ?string
    {
        return $this->decisionS3;
    }

    public function setDecisionS3(string $decisionS3): self
    {
        $this->decisionS3 = $decisionS3;

        return $this;
    }

    public function getNumS4(): ?int
    {
        return $this->numS4;
    }

    public function setNumS4(int $numS4): self
    {
        $this->numS4 = $numS4;

        return $this;
    }

    public function getDatedS4(): ?\DateTimeInterface
    {
        return $this->datedS4;
    }

    public function setDatedS4(\DateTimeInterface $datedS4): self
    {
        $this->datedS4 = $datedS4;

        return $this;
    }

    public function getDatefS4(): ?\DateTimeInterface
    {
        return $this->datefS4;
    }

    public function setDatefS4(\DateTimeInterface $datefS4): self
    {
        $this->datefS4 = $datefS4;

        return $this;
    }

    public function getVhaS4(): ?int
    {
        return $this->vhaS4;
    }

    public function setVhaS4(int $vhaS4): self
    {
        $this->vhaS4 = $vhaS4;

        return $this;
    }

    public function getVhrS4(): ?int
    {
        return $this->vhrS4;
    }

    public function setVhrS4(int $vhrS4): self
    {
        $this->vhrS4 = $vhrS4;

        return $this;
    }

    public function getNoteS4(): ?string
    {
        return $this->noteS4;
    }

    public function setNoteS4(string $noteS4): self
    {
        $this->noteS4 = $noteS4;

        return $this;
    }

    public function getTrancheS4(): ?string
    {
        return $this->trancheS4;
    }

    public function setTrancheS4(string $trancheS4): self
    {
        $this->trancheS4 = $trancheS4;

        return $this;
    }

    public function getDecisionS4(): ?string
    {
        return $this->decisionS4;
    }

    public function setDecisionS4(?string $decisionS4): self
    {
        $this->decisionS4 = $decisionS4;

        return $this;
    }

    public function getVhaG1(): ?int
    {
        return $this->vhaG1;
    }

    public function setVhaG1(?int $vhaG1): self
    {
        $this->vhaG1 = $vhaG1;

        return $this;
    }

    public function getVhrG1(): ?int
    {
        return $this->vhrG1;
    }

    public function setVhrG1(?int $vhrG1): self
    {
        $this->vhrG1 = $vhrG1;

        return $this;
    }

    public function getNoteG1(): ?string
    {
        return $this->noteG1;
    }

    public function setNoteG1(?string $noteG1): self
    {
        $this->noteG1 = $noteG1;

        return $this;
    }

    public function getTrancheG1(): ?string
    {
        return $this->trancheG1;
    }

    public function setTrancheG1(?string $trancheG1): self
    {
        $this->trancheG1 = $trancheG1;

        return $this;
    }

    public function getSanctionG1(): ?string
    {
        return $this->sanctionG1;
    }

    public function setSanctionG1(?string $sanctionG1): self
    {
        $this->sanctionG1 = $sanctionG1;

        return $this;
    }
	
	
    public function getDecisionG1(): ?string
    {
        return $this->decisionG1;
    }

    public function setDecisionG1(?string $decisionG1): self
    {
        $this->decisionG1 = $decisionG1;

        return $this;
    }

    public function getVhaAutorise(): ?int
    {
        return $this->vhaAutorise;
    }

    public function setVhaAutorise(?int $vhaAutorise): self
    {
        $this->vhaAutorise = $vhaAutorise;

        return $this;
    }

    public function getVhaG2(): ?int
    {
        return $this->vhaG2;
    }

    public function setVhaG2(?int $vhaG2): self
    {
        $this->vhaG2 = $vhaG2;

        return $this;
    }

    public function getVhrG2(): ?int
    {
        return $this->vhrG2;
    }

    public function setVhrG2(?int $vhrG2): self
    {
        $this->vhrG2 = $vhrG2;

        return $this;
    }

    public function getNoteG2(): ?string
    {
        return $this->noteG2;
    }

    public function setNoteG2(?string $noteG2): self
    {
        $this->noteG2 = $noteG2;

        return $this;
    }

    public function getTrancheG2(): ?string
    {
        return $this->trancheG2;
    }

    public function setTrancheG2(?string $trancheG2): self
    {
        $this->trancheG2 = $trancheG2;

        return $this;
    }

    public function getDecisionG2(): ?string
    {
        return $this->decisionG2;
    }

    public function setDecisionG2(?string $decisionG2): self
    {
        $this->decisionG2 = $decisionG2;

        return $this;
    }

    public function getSanctionG2(): ?string
    {
        return $this->sanctionG2;
    }

    public function setSanctionG2(string $sanctionG2): self
    {
        $this->sanctionG2 = $sanctionG2;

        return $this;
    }

    public function getAppliquer(): ?int
    {
        return $this->appliquer;
    }

    public function setAppliquer(?int $appliquer): self
    {
        $this->appliquer = $appliquer;

        return $this;
    }

    public function getDebutApp(): ?\DateTimeInterface
    {
        return $this->debutApp;
    }

    public function setDebutApp(?\DateTimeInterface $debutApp): self
    {
        $this->debutApp = $debutApp;

        return $this;
    }

    public function getFinApp(): ?\DateTimeInterface
    {
        return $this->finApp;
    }

    public function setFinApp(?\DateTimeInterface $finApp): self
    {
        $this->finApp = $finApp;

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

    public function getReclamation(): ?string
    {
        return $this->reclamation;
    }

    public function setReclamation(?string $reclamation): self
    {
        $this->reclamation = $reclamation;

        return $this;
    }

    public function getExportStudentSpace(): ?int
    {
        return $this->exportStudentSpace;
    }

    public function setExportStudentSpace(?int $exportStudentSpace): self
    {
        $this->exportStudentSpace = $exportStudentSpace;

        return $this;
    }
}
