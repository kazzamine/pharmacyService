<?php

namespace App\Entity;

use App\Entity\Avance;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\PCompteBanqueCaisse;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
#[ORM\Table(name: 'u_general_operation')]
#[ORM\Entity(repositoryClass: \App\Repository\UGeneralOperationRepository::class)]
#[ORM\HasLifecycleCallbacks]
class UGeneralOperation {

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;
    
    /**
     * @var string|null
     */
    #[ORM\Column(name: 'code', type: 'string', length: 100, nullable: true)]
    private $code;


    /**
     * @var float|null
     */
    #[Assert\NotBlank]
    #[Assert\Positive]
    #[Assert\Type(type: 'numeric')]
    #[ORM\Column(name: 'montant', type: 'float', nullable: true)]
    private $montant;

    #[Assert\NotBlank]
    #[ORM\ManyToOne(targetEntity: \App\Entity\UpPiece::class)]
    private $piece;
    #[ORM\JoinColumn(name: 'p_piece_id', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \App\Entity\PPiece::class)]
    private $pPiece;
    #[Assert\NotBlank]
    #[ORM\ManyToOne(targetEntity: \App\Entity\Avance::class)]
    private $avance;
    
      #[ORM\Column(type: 'integer', nullable: true)]
    private $signature1 = 0;
    #[ORM\Column(type: 'integer', nullable: true)]
    private $signature2 = 0;
    #[ORM\Column(type: 'integer', nullable: true)]
    private $signature3 = 0;
    #[ORM\Column(type: 'integer', nullable: true)]
    private $signature4 = 0;
    
    #[Assert\NotBlank]
    #[ORM\ManyToOne(targetEntity: UGeneralOperation::class, inversedBy: 'operations')]
    private $parent;

   #[ORM\OneToMany(targetEntity: UGeneralOperation::class, mappedBy: 'parent')]
    private $operations;

    #[ORM\JoinColumn(name: 'p_dossier_id', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \App\Entity\PDossier::class)]
    private $dossier;

    #[ORM\JoinColumn(name: 'p_compte_id', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \App\Entity\PCompte::class)]
    private $charge;

    
    #[ORM\Column(name: 'autre_information', type: 'text', nullable: true)]
    private $autreInformation;

    #[ORM\Column(type: 'boolean', nullable: true)]
    private $active;
    
    
    
  
    

    /**
     *
     * @var \DateTime
     *
     *
     */
    #[ORM\Column(name: 'created', type: 'datetime', nullable: true)]
    private $created;

    /**
     *
     * @var \DateTime
     *
     */
    #[ORM\Column(name: 'updated', type: 'datetime', nullable: true)]
    private $updated;

    #[ORM\JoinColumn(name: 'user_created', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \User::class)]
    private $userCreated;
    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $userReinitialiser;

    #[ORM\JoinColumn(name: 'user_updated', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \User::class)]
    private $userUpdated;

    #[ORM\ManyToOne(targetEntity: \App\Entity\User::class)]
    private $userValider;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private $dateValider;

    #[ORM\ManyToOne(targetEntity: \App\Entity\User::class)]
    private $userGenerer;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private $dateGenerer;

    #[ORM\ManyToOne(targetEntity: \App\Entity\User::class)]
    private $userAnnuler;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private $dateAnnuler;

    #[ORM\ManyToOne(targetEntity: \App\Entity\User::class)]
    private $userEncours;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private $dateEncours;

    #[ORM\ManyToOne(targetEntity: \App\Entity\User::class)]
    private $userArchiver;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private $dateArchiver;
    #[ORM\Column(type: 'datetime', nullable: true)]
    private $dateEncaissement;

    #[ORM\Column(type: 'string', length: 100, nullable: true)]
    public $positionActuel = 'creer';

    
    #[ORM\Column(type: 'datetime', nullable: true)]
    #[Assert\NotBlank]
    private $date;


        
    #[ORM\Column(type: 'datetime', nullable: true)]
    private $dateDocAsso;

    
    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $refDocAsso;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $numCheque;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private $dateEcheance;

     
    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $designation;

    
    #[ORM\ManyToOne(targetEntity: \App\Entity\PCompteBanque::class, inversedBy: 'trCharges')]
    private $compte;
    
    #[ORM\ManyToOne(targetEntity: \App\Entity\PCompteBanqueCaisse::class, inversedBy: 'trCharges')]
    private $compteCaisse;
     
    #[ORM\ManyToOne(targetEntity: \App\Entity\PModepaiement::class)]
    private $modepaiement;

    
    #[ORM\Column(type: 'json', nullable: true)]
    private $historique;

  
    
    
      
    #[ORM\JoinColumn(name: 'fournisseur_id', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \App\Entity\UPPartenaire::class)]
    private $fournisseur;
    

    
    #[ORM\JoinColumn(name: 'client_id', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \App\Entity\UPPartenaire::class)]
    private $client;
    
    #[ORM\JoinColumn(name: 'u_p_partenaire_id', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \App\Entity\UPPartenaire::class)]
    private $uppartenaire;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $oldSys;


    
    #[ORM\JoinColumn(name: 'employe_id', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \App\Entity\GrsEmploye::class)]
    private $employe;


    
    #[ORM\JoinColumn(name: 'paie_id', referencedColumnName: 'id')]
    #[ORM\OneToOne(targetEntity: \App\Entity\GrsPaie::class, inversedBy: 'operations')]
    private $paie;
    
    
    #[ORM\OneToMany(targetEntity: \App\Entity\TrTransaction::class, mappedBy: 'operation')]
    private $transactions;

    #[ORM\OneToOne(targetEntity: \App\Entity\UaTFacturefrscab::class, inversedBy: 'operation')]
    private $factureFournisseur;


    #[ORM\OneToOne(targetEntity: \App\Entity\UvFacturecab::class, inversedBy: 'operation')]
    private $factureClient;


    #[ORM\JoinColumn(name: 'parvenue_id', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \App\Entity\PGlobalParamDet::class, inversedBy: 'factures')]
    private $parvenue;

  #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $lettrageAdonix;



     #[ORM\Column(type: 'boolean', nullable: true)]
    private $isdeleted;
    #[ORM\Column(type: 'boolean', nullable: true)]
    private $regul;


     #[ORM\ManyToOne(targetEntity: PCompteBanque::class, inversedBy: 'uGeneralOperations')]
    private $compteDestinataire;
     #[ORM\JoinColumn(name: 'p_compte_banque_id', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: PCompteBanque::class)]
    private $pCompte;
     #[ORM\JoinColumn(name: 'p_compte_banque_caisse_id', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: PCompteBanqueCaisse::class)]
    private $pCompteCaisse;
     #[ORM\ManyToOne(targetEntity: PCompteBanqueCaisse::class, inversedBy: 'uGeneralOperations')]
    private $compteDestinataireCaisse;

    
    /**
     * @var string|null
     */
    #[ORM\Column(name: 'code_demande_paiement', type: 'string', length: 100, nullable: true)]
    private $code_demande_paiement;


    #[ORM\Column(type: 'float', nullable: true)]
    private $soldAvant;
    
    #[ORM\Column(name: 'pers_ph_etrg', type: 'float', nullable: true)]
    private $pers_ph_etrg;
    
    #[ORM\Column(type: 'float', nullable: true)]
    private $soldAvantDestinataire;

    #[ORM\Column(type: 'float', nullable: true)]
    private $soldApres;
    #[ORM\Column(type: 'float', nullable: true)]
    private $soldApresDestinataire;


    #[ORM\ManyToOne(targetEntity: PDossier::class, inversedBy: 'uGeneralOperations')]
    private $dossierTrt;


    #[ORM\Column(type: 'boolean', nullable: true)]
    private $executer;
    

    #[ORM\Column(type: 'float', nullable: true)]
    private $montantMad;
    #[ORM\Column(type: 'float', nullable: true)]
    private $montantFinal = 0;
    #[ORM\Column(type: 'float', nullable: true)]
    private $quantite;
    #[ORM\Column(type: 'float', nullable: true)]
    private $valeurAchatUnitaire;
    #[ORM\Column(type: 'float', nullable: true)]
    private $valeurVenteUnitaire;
    #[ORM\Column(type: 'float', nullable: true)]
    private $valeurAchatTotal;
    #[ORM\Column(type: 'float', nullable: true)]
    private $valeurVenteTotal;
    #[ORM\Column(type: 'float', nullable: true)]
    private $margeOperationUnitaire;
    #[ORM\Column(type: 'float', nullable: true)]
    private $margeOperationTotal;

     #[ORM\OneToMany(targetEntity: UaTechniqueCab::class, mappedBy: 'uGeneralOperation')]
    private $uaTechniqueCabs;
    
    #[ORM\Column(type: 'integer', nullable: true)]
    private $statutsig = 0;

     #[ORM\Column(type: 'integer', length: 1, nullable: true)]
    private $sens;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $remboursement ;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $payementIndirect = 0;



    public function getMontantMad(): ?float
    {
        return $this->montantMad;
    }

    public function setMontantMad(?float $montantMad): self
    {
        $this->montantMad = $montantMad;

        return $this;
    }
    public function getMontantFinal(): ?float
    {
        return $this->montantFinal;
    }

    public function setMontantFinal(?float $montantFinal): self
    {
        $this->montantFinal = $montantFinal;

        return $this;
    }
    public function getQuantite(): ?float
    {
        return $this->quantite;
    }

    public function setQuantite(?float $quantite): self
    {
        $this->quantite = $quantite;

        return $this;
    }
    public function getValeurAchatUnitaire(): ?float
    {
        return $this->valeurAchatUnitaire;
    }

    public function setValeurAchatUnitaire(?float $valeurAchatUnitaire): self
    {
        $this->valeurAchatUnitaire = $valeurAchatUnitaire;

        return $this;
    }
    public function getValeurAchatTotal(): ?float
    {
        return $this->valeurAchatTotal;
    }

    public function setValeurAchatTotal(?float $valeurAchatTotal): self
    {
        $this->valeurAchatTotal = $valeurAchatTotal;

        return $this;
    }
    public function getValeurVenteTotal(): ?float
    {
        return $this->valeurVenteTotal;
    }

    public function setValeurVenteTotal(?float $valeurVenteTotal): self
    {
        $this->valeurVenteTotal = $valeurVenteTotal;

        return $this;
    }
    public function getValeurVenteUnitaire(): ?float
    {
        return $this->valeurVenteUnitaire;
    }

    public function setValeurVenteUnitaire(?float $valeurVenteUnitaire): self
    {
        $this->valeurVenteUnitaire = $valeurVenteUnitaire;

        return $this;
    }
    public function getMargeOperationUnitaire(): ?float
    {
        return $this->margeOperationUnitaire;
    }

    public function setMargeOperationUnitaire(?float $margeOperationUnitaire): self
    {
        $this->margeOperationUnitaire = $margeOperationUnitaire;

        return $this;
    }
    public function getMargeOperationTotal(): ?float
    {
        return $this->margeOperationTotal;
    }

    public function setMargeOperationTotal(?float $margeOperationTotal): self
    {
        $this->margeOperationTotal = $margeOperationTotal;

        return $this;
    }


     public function getExecuter(): ?bool
    {
        return $this->executer;
    }

    public function setExecuter(?bool $executer): self
    {
        $this->executer = $executer;

        return $this;
    }



    public function getDossierTrt(): ?PDossier
    {
        return $this->dossierTrt;
    }

    public function setDossierTrt(?PDossier $dossierTrt): self
    {
        $this->dossierTrt = $dossierTrt;

        return $this;
    }



    public function getSoldAvant(): ?float
    {
        return $this->soldAvant;
    }

    public function setSoldAvant(?float $soldAvant): self
    {
        $this->soldAvant = $soldAvant;

        return $this;
    }
    public function getSoldAvantDestinataire(): ?float
    {
        return $this->soldAvantDestinataire;
    }

    public function setSoldAvantDestinataire(?float $soldAvantDestinataire): self
    {
        $this->soldAvantDestinataire = $soldAvantDestinataire;

        return $this;
    }

    public function getSoldApres(): ?float
    {
        return $this->soldApres;
    }

    public function setSoldApres(?float $soldApres): self
    {
        $this->soldApres = $soldApres;

        return $this;
    }
    public function getSoldApresDestinataire(): ?float
    {
        return $this->soldApresDestinataire;
    }

    public function setSoldApresDestinataire(?float $soldApresDestinataire): self
    {
        $this->soldApresDestinataire = $soldApresDestinataire;

        return $this;
    }


    public function getCompteDestinataire(): ?PCompteBanque
    {
        return $this->compteDestinataire;
    }

    public function setCompteDestinataire(?PCompteBanque $compteDestinataire): self
    {
        $this->compteDestinataire = $compteDestinataire;

        return $this;
    }
    public function getPCompte(): ?PCompteBanque
    {
        return $this->pCompte;
    }

    public function setPCompte(?PCompteBanque $pCompte): self
    {
        $this->pCompte = $pCompte;

        return $this;
    }
    public function getCompteDestinataireCaisse(): ?PCompteBanqueCaisse
    {
        return $this->compteDestinataireCaisse;
    }

    public function setCompteDestinataireCaisse(?PCompteBanqueCaisse $compteDestinataireCaisse): self
    {
        $this->compteDestinataireCaisse = $compteDestinataireCaisse;

        return $this;
    }
    
    public function getPCompteCaisse(): ?PCompteBanqueCaisse
    {
        return $this->pCompteCaisse;
    }

    public function setPCompteCaisse(?PCompteBanqueCaisse $pCompteCaisse): self
    {
        $this->pCompteCaisse = $pCompteCaisse;

        return $this;
    }
    

    public function getIsdeleted(): ?bool
    {
        return $this->isdeleted;
    }

    public function setIsdeleted(?bool $isdeleted): self
    {
        $this->isdeleted = $isdeleted;
        $this->active =false;
        return $this;
    }

    public function getRegul(): ?bool
    {
        return $this->regul;
    }

    public function setRegul(?bool $regul): self
    {
        $this->regul = $regul;
        return $this;
    }




    public function getEmploye(): ?GrsEmploye
    {
        return $this->employe;
    }

    public function setEmploye(?GrsEmploye $employe): self
    {
        $this->employe = $employe;

        return $this;
    }





    public function getPaie(): ?GrsPaie
    {
        return $this->paie;
    }

    public function setPaie(?GrsPaie $paie): self
    {
        $this->paie = $paie;

        return $this;
    }

    public function __construct()
    {
        $this->transactions = new ArrayCollection();
        $this->uaTechniqueCabs = new ArrayCollection();
    }


   

    #[ORM\PrePersist]
    public function setCreatedValue() {

        $this->created = new \DateTime();
    }

     

    #[ORM\PreUpdate]
    public function setUpdatedValue() {
        $this->updated = new \DateTime();
    }
    
    
     public function getMontantChorPrd() {
         
         if ($this->getPiece()){
               return ($this->getMontant() * $this->getPiece()->getSens());
         }
         
         return $this->getMontant() ;
       
    }

    public function getId(): ?int {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface {
        return $this->date;
    }

    public function setDate(?\DateTimeInterface $date): self {
        $this->date = $date;

        return $this;
    }
    public function getDateDocAsso(): ?\DateTimeInterface {
        return $this->dateDocAsso;
    }

    public function setDateDocAsso(?\DateTimeInterface $dateDocAsso): self {
        $this->dateDocAsso = $dateDocAsso;

        return $this;
    }

    public function getRefDocAsso(): ?string {
        return $this->refDocAsso;
    }

    public function setRefDocAsso(?string $refDocAsso): self {
        $this->refDocAsso = $refDocAsso;

        return $this;
    }

    
    public function getNumCheque(): ?string {
        return $this->numCheque;
    }

    public function setNumCheque(?string $numCheque): self {
        $this->numCheque = $numCheque;

        return $this;
    }

    public function getDateEcheance(): ?\DateTimeInterface {
        return $this->dateEcheance;
    }

    public function setDateEcheance(?\DateTimeInterface $dateEcheance): self {
        $this->dateEcheance = $dateEcheance;

        return $this;
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

    public function getMontant(): ?float
    {
        return $this->montant;
    }

    public function setMontant(?float $montant): self
    {
        $this->montant = $montant;

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

    public function getActive(): ?bool
    {
        return $this->active;
    }

    public function setActive(?bool $active): self
    {
        $this->active = $active;

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

    public function getUpdated(): ?\DateTimeInterface
    {
        return $this->updated;
    }

    public function setUpdated(?\DateTimeInterface $updated): self
    {
        $this->updated = $updated;

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
    public function getDateEncaissement(): ?\DateTimeInterface
    {
        return $this->dateEncaissement;
    }

    public function setDateEncaissement(?\DateTimeInterface $dateEncaissement): self
    {
        $this->dateEncaissement = $dateEncaissement;

        return $this;
    }

    public function getPositionActuel() {
        return $this->positionActuel;
    }

    public function setPositionActuel($positionActuel, $context = []): self {
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
    public function getAvance(): ?Avance
    {
        return $this->avance;
    }

    public function setAvance(?Avance $avance): self
    {
        $this->avance = $avance;

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

    public function getCharge(): ?PCompte
    {
        return $this->charge;
    }

    public function setCharge(?PCompte $charge): self
    {
        $this->charge = $charge;

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
    // public function getUserReinitialiser(): ?User
    // {
    //     return $this->userReinitialiser;
    // }

    // public function setUserReinitialiser(?User $userReinitialiser): self
    // {
    //     $this->userReinitialiser = $userReinitialiser;

    //     return $this;
    // }
    
    public function getUserReinitialiser(): ?string
    {
        return $this->userReinitialiser;
    }

    public function setUserReinitialiser(?string $userReinitialiser): self
    {
        $this->userReinitialiser = $userReinitialiser;

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

    public function getIsActiveText($active) {
        if ($active == 1) {
            return 'Active';
        } else {
            return 'Désactivé';
        }
    }
    public function getDesignation(): ?string {
        return $this->designation;
    }

    public function setDesignation(?string $designation): self {
        $this->designation = $designation;

        return $this;
    }
    public function getCompte(): ?PCompteBanque {
        return $this->compte;
    }

    public function setCompte(?PCompteBanque $compte): self {
        $this->compte = $compte;

        return $this;
    }
    public function getCompteCaisse(): ?PCompteBanqueCaisse {
        return $this->compteCaisse;
    }

    public function setCompteCaisse(?PCompteBanqueCaisse $compteCaisse): self {
        $this->compteCaisse = $compteCaisse;

        return $this;
    }
    public function getModepaiement(): ?PModepaiement {
        return $this->modepaiement;
    }

    public function setModepaiement(?PModepaiement $modepaiement): self {
        $this->modepaiement = $modepaiement;

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


    public function getOldSys(): ?string
    {
        return $this->oldSys;
    }

    public function setOldSys(?string $oldSys): self
    {
        $this->oldSys = $oldSys;

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

    /**
     * @return Collection|TrTransaction[]
     */
    public function getTransactions(): Collection
    {
        return $this->transactions;
    }
    

    public function addTransaction(TrTransaction $transaction): self
    {
        if (!$this->transactions->contains($transaction)) {
            $this->transactions[] = $transaction;
            $transaction->setOperation($this);
        }

        return $this;
    }
    
    public function removeTransaction(TrTransaction $transaction): self
    {
        if ($this->transactions->contains($transaction)) {
            if ($transaction->getOperation() === $this) {
                $transaction->setOperation(null);
            }
        }
        
        return $this;
    }
    /**
     * @return Collection|UaTechniqueCab[]
     */
    public function getUaTechniqueCabs(): Collection
    {
        return $this->uaTechniqueCabs;
    }
    public function addUaTechniqueCab(UaTechniqueCab $uaTechniqueCab): self
    {
        if (!$this->uaTechniqueCabs->contains($uaTechniqueCab)) {
            $this->uaTechniqueCabs[] = $uaTechniqueCab;
            $uaTechniqueCab->setUGeneralOperation($this);
        }

        return $this;
    }
    public function removeUaTechniqueCab(UaTechniqueCab $uaTechniqueCab): self
    {
        if ($this->uaTechniqueCabs->removeElement($uaTechniqueCab)) {
            // set the owning side to null (unless already changed)
            if ($uaTechniqueCab->getUGeneralOperation() === $this) {
                $uaTechniqueCab->setUGeneralOperation(null);
            }
        }

        return $this;
    }
    
    public function getClient(): ?UPPartenaire
    {
        return $this->client;
    }

    public function setClient(?UPPartenaire $client): self
    {
        $this->client = $client;

        return $this;
    }
    public function getUppartenaire(): ?UPPartenaire
    {
        return $this->uppartenaire;
    }

    public function setUppartenaire(?UPPartenaire $uppartenaire): self
    {
        $this->uppartenaire = $uppartenaire;

        return $this;
    }

    public function getFactureFournisseur(): ?UaTFacturefrscab
    {
        return $this->factureFournisseur;
    }

    public function setFactureFournisseur(?UaTFacturefrscab $factureFournisseur): self
    {
        $this->factureFournisseur = $factureFournisseur;

        return $this;
    }
    public function getUaTechniqueCab(): ?UaTechniqueCab
    {
        return $this->uaTechniqueCab;
    }

    public function setUaTechniqueCab(?UaTechniqueCab $uaTechniqueCab): self
    {
        $this->uaTechniqueCab = $uaTechniqueCab;

        return $this;
    }



    public function getFactureClient(): ?UvFacturecab
    {
        return $this->factureClient;
    }

    public function setFactureClient(?UvFacturecab $factureClient): self
    {
        $this->factureClient = $factureClient;

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


    public function getLettrageAdonix(): ?string {
        return $this->lettrageAdonix;
    }

    public function setLettrageAdonix(?string $lettrageAdonix): self {
        $this->lettrageAdonix = $lettrageAdonix;

        return $this;
    }

    public function getCode_demande_paiement(): ?string
    {
        return $this->code_demande_paiement;
    }

    public function setCode_demande_paiement(?string $code_demande_paiement): self
    {
        $this->code_demande_paiement = $code_demande_paiement;

        return $this;
    }
    public function getParent(): ?self
    {
        return $this->parent;
    }

    public function setParent(?self $parent): self
    {
        $this->parent = $parent;

        return $this;
    }

    /**
     * @return Collection<int, self>
     */
    public function getOperations(): Collection
    {
        return $this->operations;
    }

    public function addOperation(self $operation): self
    {
        if (!$this->operations->contains($operation)) {
            $this->operations[] = $operation;
            $operation->setParent($this);
        }

        return $this;
    }

    public function removeOperation(self $operation): self
    {
        if ($this->operations->removeElement($operation)) {
            // set the owning side to null (unless already changed)
            if ($operation->getParent() === $this) {
                $operation->setParent(null);
            }
        }

        return $this;
    }
    
    public function setStatutsig(?int $statutsig): void {
        $this->statutsig = $statutsig;
    }

    public function getStatutsig(): ?int {
        return $this->statutsig;
    }


    public function setRemboursement(?int $remboursement): void {
        $this->remboursement = $remboursement;
    }

    public function getRemboursement(): ?int {
        return $this->remboursement;
    }
    public function setPayementIndirect(?int $payementIndirect): void {
        $this->payementIndirect = $payementIndirect;
    }

    public function getPayementIndirect(): ?int {
        return $this->payementIndirect;
    }


    public function setSens(?int $sens): void {
        $this->sens = $sens;
    }

    public function getSens(): ?int {
        return $this->sens;
    }

    public function getSignature1(): ?int {
        return $this->signature1;
    }

    public function setSignature1(?int $signature1): self {
        $this->signature1 = $signature1;
        return $this;
    }
    public function getSignature2(): ?int {
        return $this->signature2;
    }

    public function setSignature2(?int $signature2): self {
        $this->signature2 = $signature2;
        return $this;
    }
    public function getSignature3(): ?int {
        return $this->signature3;
    }

    public function setSignature3(?int $signature3): self {
        $this->signature3 = $signature3;
        return $this;
    }
    public function getSignature4(): ?int {
        return $this->signature4;
    }

    public function setSignature4(?int $signature4): self {
        $this->signature4 = $signature4;
        return $this;
    }
    
    public function getPers_ph_etrg(): ?string
    {
        return $this->pers_ph_etrg;
    }

    public function setPers_ph_etrg(?string $pers_ph_etrg): self
    {
        $this->pers_ph_etrg = $pers_ph_etrg;

        return $this;
    }
   
}


