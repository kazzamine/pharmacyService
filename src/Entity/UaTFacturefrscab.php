<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Table(name: "ua_t_facturefrscab")]
#[ORM\Entity]
#[ORM\HasLifecycleCallbacks]
class UaTFacturefrscab
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    private $id;

    #[ORM\Column(name: "code", type: "string", length: 100, nullable: true)]
    private ?string $code = null;

    #[ORM\Column(name: "designationPiece", type: "string", length: 255, nullable: true)]
    private ?string $designationPiece = null;

    #[ORM\Column(name: "datefacture", type: "date", nullable: true)]
    private ?\DateTime $datefacture = null;

    #[ORM\Column(type: "integer", nullable: true)]
    private ?int $anneecomptable = null;

    #[ORM\Column(name: "remise", type: "float", precision: 10, scale: 0, nullable: true)]
    private ?float $remise = null;

    #[ORM\Column(name: "dateremise", type: "date", nullable: true)]
    private ?\DateTime $dateremise = null;

    #[ORM\Column(name: "mtremise", type: "float", precision: 10, scale: 0, nullable: true)]
    private ?float $mtremise = null;

    #[ORM\Column(name: "observation", type: "text", length: 65535, nullable: true)]
    private ?string $observation = null;

    #[ORM\Column(name: "responsable", type: "string", length: 100, nullable: true)]
    private ?string $responsable = null;

    #[ORM\Column(type: "integer", nullable: true)]
    private ?int $signature1 = 0;

    #[ORM\Column(type: "integer", nullable: true)]
    private ?int $signature2 = 0;

    #[ORM\Column(type: "integer", nullable: true)]
    private ?int $signature3 = 0;

    #[ORM\Column(type: "integer", nullable: true)]
    private ?int $signature4 = 0;

    #[ORM\Column(name: "dateoperation", type: "date", nullable: true)]
    private ?\DateTime $dateoperation = null;

    #[ORM\Column(name: "utilisateur", type: "string", length: 100, nullable: true)]
    private ?string $utilisateur = null;

    #[ORM\Column(name: "refDocAsso", type: "string", length: 100, nullable: true)]
    private ?string $refdocasso = null;

    #[ORM\Column(name: "Statut", type: "string", nullable: true)]
    private ?string $Statut = null;

    #[ORM\Column(name: "dateDocAsso", type: "date", nullable: true)]
    private ?\DateTime $datedocasso = null;

    #[ORM\Column(name: "frs1", type: "string", length: 100, nullable: true)]
    private ?string $frs1 = null;

    #[ORM\Column(name: "frs2", type: "string", length: 100, nullable: true)]
    private ?string $frs2 = null;

    #[ORM\Column(name: "mtfrs1", type: "float", precision: 10, scale: 0, nullable: true)]
    private ?float $mtfrs1 = null;


    #[ORM\Column(name: "mtfrs2", type: "float", precision: 10, scale: 0, nullable: true)]
    private ?float $mtfrs2 = null;

    #[ORM\Column(name: "reference_bci", type: "string", length: 100, nullable: true)]
    private ?string $referenceBci = null;

    #[ORM\ManyToOne(targetEntity: "App\Entity\UPPartenaire", inversedBy: "factures")]
    #[ORM\JoinColumn(name: "partenaire_id", referencedColumnName: "id")]
    private $fournisseur;

    #[ORM\ManyToOne(targetEntity: "App\Entity\UPPartenaire", inversedBy: "factures")]
    #[ORM\JoinColumn(name: "partenaire_subvention", referencedColumnName: "id")]
    private $partenaireSubvention;

    #[ORM\ManyToOne(targetEntity: "App\Entity\PDossier", inversedBy: "uaTFacturefrscabs")]
    private $dossier;

    #[ORM\OneToMany(targetEntity: "App\Entity\UaTReglementfrscab", mappedBy: "factureFournisseur")]
    private $tReglementfrs;

    #[ORM\ManyToOne(targetEntity: "App\Entity\PStatutgrv", inversedBy: "uaTFacturefrscabs")]
    private $pStatutgrv;

    #[ORM\ManyToOne(targetEntity: "App\Entity\PDossier", inversedBy: "yes")]
    private $pourcompte;

    #[ORM\Column(name: "created", type: "datetime", nullable: true)]
    private ?\DateTime $created = null;

    #[ORM\Column(name: "st_reg", type: "string", length: 10, nullable: true, options: ["default" => "NR"])]
    private ?string $stReg = 'NR';

    #[ORM\Column(name: "updated", type: "datetime", nullable: true)]
    private ?\DateTime $updated = null;

    #[ORM\ManyToOne(targetEntity: "User")]
    #[ORM\JoinColumn(name: "user_created", referencedColumnName: "id")]
    private $userCreated;

    #[ORM\ManyToOne(targetEntity: "User")]
    #[ORM\JoinColumn(name: "user_updated", referencedColumnName: "id")]
    private $userUpdated;

    #[ORM\Column(type: "boolean", nullable: true)]
    private ?bool $active = null;

    #[ORM\Column(type: "boolean", nullable: true)]
    private ?bool $achatParSubvention = null;

    #[ORM\Column(type: "boolean", nullable: true)]
    private ?bool $avoir = null;

    #[ORM\ManyToOne(targetEntity: "App\Entity\PComptemasse")]
    #[ORM\JoinColumn(name: "p_compte_masse_id", referencedColumnName: "id")]
    private $compteMasse;

    #[ORM\ManyToOne(targetEntity: "App\Entity\PCompterubrique")]
    #[ORM\JoinColumn(name: "p_compte_rubrique_id", referencedColumnName: "id")]
    private $compteRubrique;

    #[ORM\ManyToOne(targetEntity: "App\Entity\PCompteposte")]
    #[ORM\JoinColumn(name: "p_compte_poste_id", referencedColumnName: "id")]
    private $comptePoste;

    #[ORM\ManyToOne(targetEntity: "App\Entity\PCompte")]
    #[ORM\JoinColumn(name: "p_compte_id", referencedColumnName: "id")]
    private $compte;

    #[ORM\ManyToOne(targetEntity: "App\Entity\UPDevise")]
    #[ORM\JoinColumn(name: "p_devise_id", referencedColumnName: "id")]
    private $devise;

    #[ORM\ManyToOne(targetEntity: "App\Entity\User")]
    private $userValider;

    #[ORM\Column(type: "datetime", nullable: true)]
    private $dateValider;

    #[ORM\ManyToOne(targetEntity: "App\Entity\User")]
    private $userGenerer;

    #[ORM\Column(type: "datetime", nullable: true)]
    private $dateGenerer;

    #[ORM\ManyToOne(targetEntity: "App\Entity\User")]
    private $userAnnuler;

    #[ORM\Column(type: "datetime", nullable: true)]
    private $dateAnnuler;

    #[ORM\ManyToOne(targetEntity: "App\Entity\User")]
    private $userEncours;

    #[ORM\Column(type: "datetime", nullable: true)]
    private $dateEncours;

    #[ORM\ManyToOne(targetEntity: "App\Entity\User")]
    private $userArchiver;

    #[ORM\Column(type: "datetime", nullable: true)]
    private $dateArchiver;

    #[ORM\Column(type: "string", length: 100, nullable: true)]
    public $positionActuel = 'creer';

    /** @ORM\Column(type="json_array", nullable=true) */
    private $historique;

    #[ORM\Column(type: "float", nullable: true)]
    #[Assert\Positive]
    #[Assert\Type(type: "numeric")]
    private $montant;

    #[ORM\Column(type: "float", precision: 10, scale: 0, nullable: true)]
    private $montantAcompte;

    #[ORM\Column(type: "float", precision: 10, scale: 0, nullable: true)]
    private $montantReception;

    #[ORM\ManyToOne(targetEntity: "App\Entity\UFactureType", inversedBy: "uaTFacturefrscabs")]
    private $factureType;

    #[ORM\ManyToOne(targetEntity: "App\Entity\UaTFacturefrscab")]
    #[ORM\JoinColumn(referencedColumnName: "id")]
    private $parent;

    #[ORM\OneToMany(targetEntity: "App\Entity\UaTFacturefrsdet", mappedBy: "cab", cascade: ["persist", "remove"])]
    private $details;

    #[ORM\ManyToOne(targetEntity: "App\Entity\UpPiece")]
    #[ORM\JoinColumn(name: "piece_id", referencedColumnName: "id")]
    private $piece;

    #[ORM\ManyToOne(targetEntity: "App\Entity\PPiece")]
    #[ORM\JoinColumn(name: "p_piece_id", referencedColumnName: "id")]
    private $pPiece;

    #[ORM\OneToMany(targetEntity: "App\Entity\UaTLivraisonfrscab", mappedBy: "facture")]
    private $livraisons;

    #[ORM\ManyToOne(targetEntity: "App\Entity\PModepaiement")]
    #[ORM\JoinColumn(name: "modepaiement_id", referencedColumnName: "id")]
    private $modepaiement;

    #[ORM\Column(name: "numcheque", type: "string", length: 100, nullable: true)]
    private $numcheque;

    #[ORM\Column(name: "dateecheance", type: "date", nullable: true)]
    private $dateecheance;

    #[ORM\OneToOne(targetEntity: "App\Entity\UGeneralOperation", mappedBy: "factureFournisseur", cascade: ["persist", "remove"])]
    private $operation;

    #[ORM\ManyToOne(targetEntity: "App\Entity\PGlobalParamDet", inversedBy: "factures")]
    #[ORM\JoinColumn(name: "parvenue_id", referencedColumnName: "id")]
    private $parvenue;

    #[ORM\Column(type: "string", length: 255, nullable: true)]
    private $oldSys;

    #[ORM\Column(type: "string", length: 255, nullable: true)]
    private $source;

    #[ORM\Column(type: "integer", nullable: true)]
    private $flag;

    #[ORM\Column(type: "integer", nullable: true)]
    private $livraisonfrs;

    #[ORM\Column(type: "text", nullable: true)]
    private $autreInformation;

    #[ORM\Column(type: "string", length: 255, nullable: true)]
    private $lettrageAdonix;

    #[ORM\Column(type: "float", nullable: true)]
    private $mtMad = 0;

    #[ORM\Column(type: "boolean", nullable: true)]
    private $isdeleted;

    #[ORM\Column(type: "integer", nullable: true)]
    private $statutsig = 0;

    #[ORM\Column(type: "integer", nullable: true)]
    private $flagOutput = 0;

    #[ORM\Column(type: "integer", nullable: true)]
    private $flagAmortissement = 0;

    #[ORM\Column(type: "integer", nullable: true)]
    private $flagInjecter = 0;

    #[ORM\Column(type: "integer", nullable: true)]
    private $flagRejeter = 0;

    #[ORM\Column(type: "string", length: 255, nullable: true)]
    private $observationRejeter;

    #[ORM\ManyToOne(targetEntity: "App\Entity\UPProjet")]
    #[ORM\JoinColumn(name: "u_p_projet_id", referencedColumnName: "id")]
    private $projet;

    #[ORM\Column(type: "datetime", nullable: true)]
    private $dateFlagOutput;

    #[ORM\Column(type: "integer", nullable: true)]
    private $outputValider;

    #[ORM\Column(type: "integer", nullable: true)]
    private $flagRemise = 0;

    #[ORM\Column(type: "datetime", nullable: true)]
    private $dateFlagRemise;

    #[ORM\Column(type: "integer", nullable: true)]
    private $userInjecter = 0;

    #[ORM\Column(type: "integer", nullable: true)]
    private $userRejeter = 0;

    #[ORM\Column(type: "integer", nullable: true)]
    private $userPrecomptabiliser = 0;

    #[ORM\Column(type: "integer", nullable: true)]
    private $userValide = 0;

    #[ORM\Column(type: "integer", nullable: true)]
    private $userRemise = 0;

    #[ORM\Column(type: "string", length: 255, nullable: true)]
    private $codeBrd;

    #[ORM\Column(type: "integer", nullable: true)]
    private $comptaCharge = 0;

    #[ORM\Column(type: "datetime", nullable: true)]
    private $dateBrd;

    #[ORM\Column(type: "float", nullable: true)]
    private $montantReleve;

    #[ORM\Column(type: "float", nullable: true)]
    private $taux;

    #[ORM\Column(type: "string", length: 255, nullable: true)]
    private $codeFafGpc;

    #[ORM\Column(type: "float", nullable: true)]
    private $ecart;

    public function getEcart(): ?float
    {
        return $this->ecart;
    }

    public function setEcart(?float $ecart): self
    {
        $this->ecart = $ecart;

        return $this;
    }
    
    public function getTaux(): ?float
    {
        return $this->taux;
    }

    public function setTaux(?float $taux): self
    {
        $this->taux = $taux;

        return $this;
    }
    public function getCodeFafGpc(): ?string
    {
        return $this->codeFafGpc;
    }

    public function setCodeFafGpc(?string $codeFafGpc): self
    {
        $this->codeFafGpc = $codeFafGpc;
        return $this;
    }
    public function getMontantReleve(): ?float
    {
        return $this->montantReleve;
    }

    public function setMontantReleve(?float $montantReleve): self
    {
        $this->montantReleve = $montantReleve;

        return $this;
    }

    public function getCodeBrd(): ?string
    {
        return $this->codeBrd;
    }

    public function setCodeBrd(?string $codeBrd): self
    {
        $this->codeBrd = $codeBrd;

        return $this;
    }


    
  

    
    public function getDateBrd(): ?\DateTimeInterface
    {
        return $this->dateBrd;
    }

    public function setDateBrd(?\DateTimeInterface $dateBrd): self
    {
        $this->dateBrd = $dateBrd;

        return $this;
    }

    public function getComptaCharge(): ?int
    {
        return $this->comptaCharge;
    }

    public function setComptaCharge(?int $comptaCharge): self
    {
        $this->comptaCharge = $comptaCharge;
        return $this;
    }
    public function getUserInjecter(): ?int
    {
        return $this->userInjecter;
    }

    public function setUserInjecter(?int $userInjecter): self
    {
        $this->userInjecter = $userInjecter;
        return $this;
    }
    public function getUserRejeter(): ?int
    {
        return $this->userRejeter;
    }

    public function setUserRejeter(?int $userRejeter): self
    {
        $this->userRejeter = $userRejeter;
        return $this;
    }
    public function getUserPrecomptabiliser(): ?int
    {
        return $this->userPrecomptabiliser;
    }

    public function setUserPrecomptabiliser(?int $userPrecomptabiliser): self
    {
        $this->userPrecomptabiliser = $userPrecomptabiliser;
        return $this;
    }
    public function getUserValide(): ?int
    {
        return $this->userValide;
    }

    public function setUserValide(?int $userValide): self
    {
        $this->userValide = $userValide;
        return $this;
    }
    public function getUserRemise(): ?int
    {
        return $this->userRemise;
    }

    public function setUserRemise(?int $userRemise): self
    {
        $this->userRemise = $userRemise;
        return $this;
    }

    
    public function getFlagRemise(): ?int
    {
        return $this->flagRemise;
    }

    public function setFlagRemise(?int $flagRemise): self
    {
        $this->flagRemise = $flagRemise;
        return $this;
    }

    public function getDateFlagRemise(): ?\DateTimeInterface
    {
        return $this->dateFlagRemise;
    }

    public function setDateFlagRemise(?\DateTimeInterface $dateFlagRemise): self
    {
        $this->dateFlagRemise = $dateFlagRemise;

        return $this;
    }


    public function getFlagInjecter(): ?int
    {
        return $this->flagInjecter;
    }
    public function setFlagInjecter(?int $flagInjecter): self
    {
        $this->flagInjecter = $flagInjecter;
        return $this;
    }


    public function getFlagRejeter(): ?int
    {
        return $this->flagRejeter;
    }
    public function setFlagRejeter(?int $flagRejeter): self
    {
        $this->flagRejeter = $flagRejeter;
        return $this;
    }

    public function getObservationRejeter(): ?string
    {
        return $this->observationRejeter;
    }

    public function setObservationRejeter(?string $observationRejeter): self
    {
        $this->observationRejeter = $observationRejeter;

        return $this;
    }



    public function getIsdeleted(): ?bool
    {
        return $this->isdeleted;
    }

    public function setIsdeleted(?bool $isdeleted): self
    {
        $this->isdeleted = $isdeleted;
        $this->active = false;
        return $this;
    }


    public function getOldSys(): ?string
    {
        return $this->oldSys;
    }

    public function setOldSys(?string $oldSys): self
    {
        $this->oldSys = $oldSys;

        return $this;
    }


    public function getDateecheance(): ?\DateTimeInterface
    {
        return $this->dateecheance;
    }

    public function setDateecheance(?\DateTimeInterface $dateecheance): self
    {
        $this->dateecheance = $dateecheance;

        return $this;
    }


    public function getNumcheque(): ?string
    {
        return $this->numcheque;
    }

    public function setNumcheque(?string $numcheque): self
    {
        $this->numcheque = $numcheque;

        return $this;
    }

    public function getModepaiement(): ?PModepaiement
    {
        return $this->modepaiement;
    }

    public function setModepaiement(?PModepaiement $modepaiement): self
    {
        $this->modepaiement = $modepaiement;

        return $this;
    }

    public function getPiece(): ?UpPiece
    {
        return $this->piece;
    }

    public function setPiece(?UpPiece $piece): self
    {
        $this->piece = $piece;

        return $this;
    }
    public function getPPiece(): ?PPiece
    {
        return $this->pPiece;
    }

    public function setPPiece(?PPiece $pPiece): self
    {
        $this->pPiece = $pPiece;

        return $this;
    }

    /**
     * @ORM\PrePersist
     */
    public function setCreatedValue()
    {

        $this->created = new \DateTime();
    }

    /**
     * @ORM\PreUpdate
     */
    public function setUpdatedValue()
    {
        $this->updated = new \DateTime();
    }

    public function __construct()
    {
        $this->tReglementfrs = new ArrayCollection();
        //$this->factureLivraisons = new ArrayCollection();
        $this->livraisons = new ArrayCollection();
        $this->details = new ArrayCollection();
        $this->dateecheance = new \DateTime();
        $this->operations = new ArrayCollection();
    }

    public function getPositionActuel()
    {
        return $this->positionActuel;
    }



    public function setPositionActuel($positionActuel, $context = []): self
    {
        $this->positionActuel = $positionActuel;

        $this->historique[] = [
            'current_place' => $positionActuel,
            'time' => (new \DateTime())->format('c'),
            'user_nom' => $this->getUserCreated() ? $this->getUserCreated()->getNom() : null,
            'user_prenom' => $this->getUserCreated() ? $this->getUserCreated()->getPrenom() : null,
            'user_username' => $this->getUserCreated() ? $this->getUserCreated()->getUsername() : null,
            'user_id' => $this->getUserCreated() ? $this->getUserCreated()->getId() : null
        ];

        return $this;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(?string $code): self
    {
        $this->code = $code;

        return $this;
    }
    public function getDesignationPiece(): ?string
    {
        return $this->designationPiece;
    }

    public function setDesignationPiece(?string $designationPiece): self
    {
        $this->designationPiece = $designationPiece;

        return $this;
    }


    public function getRemise(): ?float
    {
        return $this->remise;
    }

    public function setRemise(?float $remise): self
    {
        $this->remise = $remise;

        return $this;
    }

    public function getDateremise(): ?\DateTimeInterface
    {
        return $this->dateremise;
    }

    public function setDateremise(?\DateTimeInterface $dateremise): self
    {
        $this->dateremise = $dateremise;

        return $this;
    }

    public function getMtremise(): ?float
    {
        return $this->mtremise;
    }

    public function setMtremise(?float $mtremise): self
    {
        $this->mtremise = $mtremise;

        return $this;
    }

    public function getObservation(): ?string
    {
        return $this->observation;
    }

    public function setObservation(?string $observation): self
    {
        $this->observation = $observation;

        return $this;
    }

    public function getResponsable(): ?string
    {
        return $this->responsable;
    }

    public function setResponsable(?string $responsable): self
    {
        $this->responsable = $responsable;

        return $this;
    }

    public function getDateoperation(): ?\DateTimeInterface
    {
        return $this->dateoperation;
    }

    public function setDateoperation(?\DateTimeInterface $dateoperation): self
    {
        $this->dateoperation = $dateoperation;

        return $this;
    }

    public function getUtilisateur(): ?string
    {
        return $this->utilisateur;
    }

    public function setUtilisateur(?string $utilisateur): self
    {
        $this->utilisateur = $utilisateur;

        return $this;
    }

    public function getRefdocasso(): ?string
    {
        return $this->refdocasso;
    }

    public function setRefdocasso(?string $refdocasso): self
    {
        $this->refdocasso = $refdocasso;

        return $this;
    }
    

    public function getStatut(): ?string
    {
        return $this->Statut;
    }

    public function setStatut(?string $Statut): self
    {
        $this->Statut = $Statut;

        return $this;
    }



    public function getFrs1(): ?string
    {
        return $this->frs1;
    }

    public function setFrs1(?string $frs1): self
    {
        $this->frs1 = $frs1;

        return $this;
    }

    public function getFrs2(): ?string
    {
        return $this->frs2;
    }

    public function setFrs2(?string $frs2): self
    {
        $this->frs2 = $frs2;

        return $this;
    }

    public function getMtfrs1(): ?float
    {
        return $this->mtfrs1;
    }

    public function setMtfrs1(?float $mtfrs1): self
    {
        $this->mtfrs1 = $mtfrs1;

        return $this;
    }

    public function getMtfrs2(): ?float
    {
        return $this->mtfrs2;
    }

    public function setMtfrs2(?float $mtfrs2): self
    {
        $this->mtfrs2 = $mtfrs2;

        return $this;
    }

    public function getReferenceBci(): ?string
    {
        return $this->referenceBci;
    }

    public function setReferenceBci(?string $referenceBci): self
    {
        $this->referenceBci = $referenceBci;

        return $this;
    }

    public function getCreated(): ?\DateTimeInterface
    {
        return $this->created;
    }

    public function setCreated(?\DateTimeInterface $created): self
    {
        $this->created = $created;

        return $this;
    }

    public function getStReg(): ?string
    {
        return $this->stReg;
    }

    public function setStReg(?string $stReg): self
    {
        $this->stReg = $stReg;

        return $this;
    }

    public function getUpdated(): ?\DateTimeInterface
    {
        return $this->updated;
    }

    public function setUpdated(?\DateTimeInterface $updated): self
    {
        $this->updated = $updated;

        return $this;
    }

    public function getActive(): ?bool
    {
        return $this->active;
    }

    public function setActive(?bool $active): self
    {
        $this->active = $active;

        return $this;
    }
    public function getAchatParSubvention(): ?bool
    {
        return $this->achatParSubvention;
    }

    public function setAchatParSubvention(?bool $achatParSubvention): self
    {
        $this->achatParSubvention = $achatParSubvention;

        return $this;
    }
    public function getAvoir(): ?bool
    {
        return $this->avoir;
    }

    public function setAvoir(?bool $avoir): self
    {
        $this->avoir = $avoir;

        return $this;
    }


    public function getDateValider(): ?\DateTimeInterface
    {
        return $this->dateValider;
    }

    public function setDateValider(?\DateTimeInterface $dateValider): self
    {
        $this->dateValider = $dateValider;

        return $this;
    }

    public function getDateFlagOutput(): ?\DateTimeInterface
    {
        return $this->dateFlagOutput;
    }

    public function setDateFlagOutput(?\DateTimeInterface $dateFlagOutput): self
    {
        $this->dateFlagOutput = $dateFlagOutput;

        return $this;
    }


    public function getOutputValider(): ?int {
        return $this->outputValider;
    }

    public function setOutputValider(?int $outputValider): self {
        $this->outputValider = $outputValider;
        return $this;
    }



    public function getDateGenerer(): ?\DateTimeInterface
    {
        return $this->dateGenerer;
    }

    public function setDateGenerer(?\DateTimeInterface $dateGenerer): self
    {
        $this->dateGenerer = $dateGenerer;

        return $this;
    }

    public function getDateAnnuler(): ?\DateTimeInterface
    {
        return $this->dateAnnuler;
    }

    public function setDateAnnuler(?\DateTimeInterface $dateAnnuler): self
    {
        $this->dateAnnuler = $dateAnnuler;

        return $this;
    }

    public function getDateEncours(): ?\DateTimeInterface
    {
        return $this->dateEncours;
    }

    public function setDateEncours(?\DateTimeInterface $dateEncours): self
    {
        $this->dateEncours = $dateEncours;

        return $this;
    }

    public function getDateArchiver(): ?\DateTimeInterface
    {
        return $this->dateArchiver;
    }

    public function setDateArchiver(?\DateTimeInterface $dateArchiver): self
    {
        $this->dateArchiver = $dateArchiver;

        return $this;
    }

    public function getHistorique(): ?array
    {
        return $this->historique;
    }

    public function setHistorique(?array $historique): self
    {
        $this->historique = $historique;

        return $this;
    }

    public function getFournisseur(): ?UPPartenaire
    {
        return $this->fournisseur;
    }

    public function setFournisseur(?UPPartenaire $fournisseur): self
    {
        $this->fournisseur = $fournisseur;

        return $this;
    }
    public function getpartenaireSubvention(): ?UPPartenaire
    {
        return $this->partenaireSubvention;
    }

    public function setpartenaireSubvention(?UPPartenaire $partenaireSubvention): self
    {
        $this->partenaireSubvention = $partenaireSubvention;

        return $this;
    }


    public function getParvenue(): ?PGlobalParamDet
    {
        return $this->parvenue;
    }

    public function setParvenue(?PGlobalParamDet $parvenue): self
    {
        $this->parvenue = $parvenue;

        return $this;
    }

    public function getDossier(): ?PDossier
    {
        return $this->dossier;
    }

    public function setDossier(?PDossier $dossier): self
    {
        $this->dossier = $dossier;

        return $this;
    }

    /**
     * @return Collection|UaTReglementfrscab[]
     */
    public function getTReglementfrs(): Collection
    {
        return $this->tReglementfrs;
    }

    public function addTReglementfr(UaTReglementfrscab $tReglementfr): self
    {
        if (!$this->tReglementfrs->contains($tReglementfr)) {
            $this->tReglementfrs[] = $tReglementfr;
            $tReglementfr->setFactureFournisseur($this);
        }

        return $this;
    }

    public function removeTReglementfr(UaTReglementfrscab $tReglementfr): self
    {
        if ($this->tReglementfrs->contains($tReglementfr)) {
            $this->tReglementfrs->removeElement($tReglementfr);
            // set the owning side to null (unless already changed)
            if ($tReglementfr->getFactureFournisseur() === $this) {
                $tReglementfr->setFactureFournisseur(null);
            }
        }

        return $this;
    }

    public function getPStatutgrv(): ?PStatutgrv
    {
        return $this->pStatutgrv;
    }

    public function setPStatutgrv(?PStatutgrv $pStatutgrv): self
    {
        $this->pStatutgrv = $pStatutgrv;

        return $this;
    }

    public function getPourcompte(): ?PDossier
    {
        return $this->pourcompte;
    }

    public function setPourcompte(?PDossier $pourcompte): self
    {
        $this->pourcompte = $pourcompte;

        return $this;
    }

    public function getUserCreated(): ?User
    {
        return $this->userCreated;
    }

    public function setUserCreated(?User $userCreated): self
    {
        $this->userCreated = $userCreated;

        return $this;
    }

    public function getUserUpdated(): ?User
    {
        return $this->userUpdated;
    }

    public function setUserUpdated(?User $userUpdated): self
    {
        $this->userUpdated = $userUpdated;

        return $this;
    }

    public function getCompteMasse(): ?PComptemasse
    {
        return $this->compteMasse;
    }

    public function setCompteMasse(?PComptemasse $compteMasse): self
    {
        $this->compteMasse = $compteMasse;

        return $this;
    }

    public function getCompteRubrique(): ?PCompterubrique
    {
        return $this->compteRubrique;
    }

    public function setCompteRubrique(?PCompterubrique $compteRubrique): self
    {
        $this->compteRubrique = $compteRubrique;

        return $this;
    }

    public function getComptePoste(): ?PCompteposte
    {
        return $this->comptePoste;
    }

    public function setComptePoste(?PCompteposte $comptePoste): self
    {
        $this->comptePoste = $comptePoste;

        return $this;
    }

    public function getCompte(): ?PCompte
    {
        return $this->compte;
    }

    public function setCompte(?PCompte $compte): self
    {
        $this->compte = $compte;

        return $this;
    }

    public function getDevise(): ?UPDevise
    {
        return $this->devise;
    }

    public function setDevise(?UPDevise $devise): self
    {
        $this->devise = $devise;

        return $this;
    }

    public function getUserValider(): ?User
    {
        return $this->userValider;
    }

    public function setUserValider(?User $userValider): self
    {
        $this->userValider = $userValider;

        return $this;
    }

    public function getUserGenerer(): ?User
    {
        return $this->userGenerer;
    }

    public function setUserGenerer(?User $userGenerer): self
    {
        $this->userGenerer = $userGenerer;

        return $this;
    }

    public function getUserAnnuler(): ?User
    {
        return $this->userAnnuler;
    }

    public function setUserAnnuler(?User $userAnnuler): self
    {
        $this->userAnnuler = $userAnnuler;

        return $this;
    }

    public function getUserEncours(): ?User
    {
        return $this->userEncours;
    }

    public function setUserEncours(?User $userEncours): self
    {
        $this->userEncours = $userEncours;

        return $this;
    }

    public function getUserArchiver(): ?User
    {
        return $this->userArchiver;
    }

    public function setUserArchiver(?User $userArchiver): self
    {
        $this->userArchiver = $userArchiver;

        return $this;
    }

    /**
     * @return Collection|UaTLivraisonfrscab[]
     */
    /*public function getFactureLivraisons(): Collection {
        return $this->factureLivraisons;
    }

    public function addFactureLivraison(UaTLivraisonfrscab $factureLivraison): self {
        if (!$this->factureLivraisons->contains($factureLivraison)) {
            $this->factureLivraisons[] = $factureLivraison;
        }

        return $this;
    }

    public function removeFactureLivraison(UaTLivraisonfrscab $factureLivraison): self {
        if ($this->factureLivraisons->contains($factureLivraison)) {
            $this->factureLivraisons->removeElement($factureLivraison);
        }

        return $this;
    }*/

    public function getMontant(): ?float
    {
        return $this->montant;
    }

    public function setMontant(?float $montant): self
    {
        $this->montant = $montant;

        return $this;
    }

    public function getMontantAcompte(): ?float
    {
        return $this->montantAcompte;
    }

    public function setMontantAcompte(?float $montantAcompte): self
    {
        $this->montantAcompte = $montantAcompte;

        return $this;
    }

    public function getMontantReception(): ?float
    {
        return $this->montantReception;
    }

    public function setMontantReception(?float $montantReception): self
    {
        $this->montantReception = $montantReception;

        return $this;
    }

    public function getFactureType(): ?UFactureType
    {
        return $this->factureType;
    }

    public function setFactureType(?UFactureType $factureType): self
    {
        $this->factureType = $factureType;

        return $this;
    }

    public function getParent(): ?UaTFacturefrscab
    {
        return $this->parent;
    }

    public function setParent(?UaTFacturefrscab $parent): self
    {
        $this->parent = $parent;

        return $this;
    }

    public function getDatedocasso(): ?\DateTimeInterface
    {
        return $this->datedocasso;
    }

    public function setDatedocasso(?\DateTimeInterface $datedocasso): self
    {
        $this->datedocasso = $datedocasso;

        return $this;
    }




    public function getArrayTotalArticleByFacture(?UaTFacturefrscab $facture): array
    {

        //$resultat = array();
        $prixHt = 0;
        $prixTtc = 0;
        $prixTva = 0;
        $prixRemise = 0;
        $prixTotal = 0;
        //dump($facture);die();

        foreach ($facture->getDetails() as $key => $value) {
            // dump($value->getPrixTtc());
            $prixHt += (float) number_format($value->getPrixHt(),2, '.', '');
            $prixTva +=(float) number_format($value->getPrixTva(),2, '.', '') ;
            $prixRemise += (float) number_format($value->getPrixRemise(),2, '.', '');
            $prixTotal +=(float) number_format($value->getPrixHt(),2, '.', '') ;
            $prixTtc += (float) number_format($value->getPrixTtc(),2, '.', '');
        }
        // dd($prixTotal, $prixTtc);
        $facture->getDevise() ? $designation = $facture->getDevise()->getDesignation() : $designation = null;

        return array("remise" => $facture->getRemise(), "mremise" => $prixRemise != 0 ? $prixRemise : null, "prixTtc" => $prixTotal, "prixHt" => number_format((float)$prixHt, 2, ',', ' ') . ' ' . $designation, "prixTtc" => number_format((float)$prixTtc, 2, ',', ' ') . ' ' . $designation, "prixTva" => number_format((float)$prixTva, 2, ',', ' ') . ' ' . $designation, "prixRemise" => $prixRemise != 0 ? number_format((float)$prixRemise, 2, ',', ' ') . ' ' . $designation : null, "totalTtc" => number_format((float)$prixTotal, 2, ',', ' ') . ' ' . $designation, "totalTtcSansDevis" => $prixTotal, "prixTvaSansDevise" => $prixTva);
    }



    /**
     * @return Collection|UaTFacturefrsdet[]
     */
    public function getDetails(): Collection
    {
        return $this->details;
    }

    public function addDetail(UaTFacturefrsdet $detail): self
    {
        if (!$this->details->contains($detail)) {
            $this->details[] = $detail;
            $detail->setCab($this);
        }

        return $this;
    }

    public function removeDetail(UaTFacturefrsdet $detail): self
    {
        if ($this->details->contains($detail)) {
            $this->details->removeElement($detail);
            // set the owning side to null (unless already changed)
            if ($detail->getCab() === $this) {
                $detail->setCab(null);
            }
        }

        return $this;
    }


    /**
     * @return Collection|UaTLivraisonfrscab[]
     */
    public function getLivraisons(): Collection
    {
        return $this->livraisons;
    }

    public function addLivraisons(UaTLivraisonfrscab $livraison): self
    {
        if (!$this->livraisons->contains($livraison)) {
            $this->livraisons[] = $livraison;
            $livraison->setFacture($this);
        }

        return $this;
    }

    public function removeLivraisons(UaTLivraisonfrscab $livraison): self
    {
        if ($this->livraisons->contains($livraison)) {
            $this->livraisons->removeElement($livraison);
            // set the owning side to null (unless already changed)
            if ($livraison->getFacture() === $this) {
                $livraison->setFacture(null);
            }
        }

        return $this;
    }

    public function addLivraison(UaTLivraisonfrscab $livraison): self
    {
        if (!$this->livraisons->contains($livraison)) {
            $this->livraisons[] = $livraison;
            $livraison->setFacture($this);
        }

        return $this;
    }

    public function removeLivraison(UaTLivraisonfrscab $livraison): self
    {
        if ($this->livraisons->contains($livraison)) {
            $this->livraisons->removeElement($livraison);
            // set the owning side to null (unless already changed)
            if ($livraison->getFacture() === $this) {
                $livraison->setFacture(null);
            }
        }

        return $this;
    }

    public function HasCommandeWithIcon()
    {
        $existnext = array('reglement' => ['id' => 0, 'icon' => '<i class="fa fa-square-o"></i>']);

        /*if ($this->livraisons !== null) {
            if (count($this->livraisons) > 0) {
                $existnext['livraison']['id'] = 1;
                $existnext['livraison']['icon'] = '<i class="fa fa-check-square-o"></i>';
                foreach ($this->livraisons as $key2 => $value2) {*/

        //  dump($value2->getFacture()); die(); 
        if ($this->tReglementfrs !== null) {
            /* $existnext['facture']['id'] = 1;
            $existnext['facture']['icon'] = '<i class="fa fa-check-square-o"></i>';*/
            foreach ($this->tReglementfrs as $key3 => $value3) {
                // dump($value3);die();

                if ($value3 !== null) {

                    $existnext['reglement']['id'] = 1;
                    $existnext['reglement']['icon'] = '<i class="fa fa-check-square-o"></i>';
                }
                /* }
                    }
                }*/
            }
        }

        return $existnext;
    }

    function float2alpha($number)
    {
        $obj = new nuts($number, $this->getDevise()->getAbreviation());
        $text = $obj->convert("fr-FR");
        $nb = $obj->getFormated(" ", ",");
        return $text;
    }



    public function getOperation(): ?UGeneralOperation
    {
        return $this->operation;
    }

    public function setOperation(?UGeneralOperation $operation): self
    {
        $this->operation = $operation;

        // set (or unset) the owning side of the relation if necessary
        $newFacture = null === $operation ? null : $this;
        if ($operation->getFactureFournisseur() !== $newFacture) {
            $operation->setFactureFournisseur($newFacture);
        }

        return $this;
    }

    public function getDatefacture(): ?\DateTimeInterface
    {
        return $this->datefacture;
    }

    public function setDatefacture(?\DateTimeInterface $datefacture): self
    {
        $this->datefacture = $datefacture;

        return $this;
    }
 
    public function getAnneecomptable(): ?int
    {
        return $this->anneecomptable;
    }

    public function setAnneecomptable(?int $anneecomptable): self
    {
        $this->anneecomptable = $anneecomptable;
        return $this;
    }

    public function getPrixHt()
    {
        $prix = null;
        foreach ($this->getDetails() as $key => $value) {
            $prix += (float) number_format($value->getPrixHt(),2, '.', '');
        }
        return $prix;
    }

    public function getPrixRemise()
    {
        $prix = null;
        foreach ($this->getDetails() as $key => $value) {
            $prix += $value->getPrixRemise();
        }
        return $prix;
    }


    public function getPrixTva()
    {
        $prix = null;
        foreach ($this->getDetails() as $key => $value) {
            $prix += $value->getPrixTva();
        }
        return $prix;
    }



    public function getPrixTtc()
    {
        $prix = null;
        foreach ($this->getDetails() as $key => $value) {
            $prix += (float) number_format($value->getPrixTtc(),2, '.', '');
        }
        return $prix;
    }

    public function getPrixTtcSansRemise()
    {
        $prix = null;
        foreach ($this->getDetails() as $key => $value) {
            $prix += $value->getPrixHt();
            
        }
        return $prix;
    }

    public function getLettrageAdonix(): ?string
    {
        return $this->lettrageAdonix;
    }

    public function setLettrageAdonix(?string $lettrageAdonix): self
    {
        $this->lettrageAdonix = $lettrageAdonix;

        return $this;
    }
    public function getmtMad(): ?float
    {
        return $this->mtMad;
    }

    public function setmtMad(?float $mtMad): self
    {
        $this->mtMad = $mtMad;

        return $this;
    }


    public function getSource(): ?string
    {
        return $this->source;
    }

    public function setSource(?string $source): self
    {
        $this->source = $source;

        return $this;
    }
    public function getFlag(): ?string
    {
        return $this->flag;
    }

    public function setFlag(?string $flag): self
    {
        $this->flag = $flag;

        return $this;
    }
    public function getLivraisonfrs(): ?int
    {
        return $this->livraisonfrs;
    }

    public function setLivraisonfrs(?int $livraisonfrs): self
    {
        $this->livraisonfrs = $livraisonfrs;

        return $this;
    }
    public function getAutreInformation(): ?string
    {
        return $this->autreInformation;
    }

    public function setAutreInformation(?string $autreInformation): self
    {
        $this->autreInformation = $autreInformation;

        return $this;
    }
    public function setStatutsig(?int $statutsig): void
    {
        $this->statutsig = $statutsig;
    }

    public function getStatutsig(): ?int
    {
        return $this->statutsig;
    }

    public function setFlagOutput(?int $flagOutput): self
    {

        $this->flagOutput = $flagOutput;
        return $this;
    }

    public function getFlagOutput(): ?int
    {

        return $this->flagOutput;
    }
    public function setFlagAmortissement(?int $flagAmortissement): self
    {

        $this->flagAmortissement = $flagAmortissement;
        return $this;
    }

    public function getFlagAmortissement(): ?int
    {
        return $this->flagAmortissement;
    }

    public function getProjet(): ?UPProjet
    {
        return $this->projet;
    }

    public function setProjet(?UPProjet $projet): self
    {
        $this->projet = $projet;

        return $this;
    }
    public function getSignature1(): ?int
    {
        return $this->signature1;
    }

    public function setSignature1(?int $signature1): self
    {
        $this->signature1 = $signature1;
        return $this;
    }
    public function getSignature2(): ?int
    {
        return $this->signature2;
    }

    public function setSignature2(?int $signature2): self
    {
        $this->signature2 = $signature2;
        return $this;
    }
    public function getSignature3(): ?int
    {
        return $this->signature3;
    }

    public function setSignature3(?int $signature3): self
    {
        $this->signature3 = $signature3;
        return $this;
    }
    public function getSignature4(): ?int
    {
        return $this->signature4;
    }

    public function setSignature4(?int $signature4): self
    {
        $this->signature4 = $signature4;
        return $this;
    }
}
