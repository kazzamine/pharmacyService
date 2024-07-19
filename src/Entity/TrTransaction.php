<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: \App\Repository\TrTransactionRepository::class)]
#[ORM\HasLifecycleCallbacks]
class TrTransaction {

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;
    

    
    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $code;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $designation;

    
    #[ORM\Column(type: 'text', nullable: true)]
    private $autreInformation;

    #[Assert\NotBlank]
    #[ORM\Column(type: 'float', nullable: true)]
    private $montant;

    #[ORM\JoinColumn(name: 'p_modepaiement_id', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \App\Entity\PModepaiement::class)]
    private $modepaiement;

    #[ORM\JoinColumn(name: 'p_piece_dpm', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \App\Entity\PPiece::class)]
    private $ppicedpm;

    #[ORM\ManyToOne(targetEntity: \App\Entity\PCompteBanque::class, inversedBy: 'trCharges')]
    private $compte;

    #[ORM\JoinColumn(name: 'p_dossier_id', referencedColumnName: 'id')]
    #[Assert\NotBlank]
    #[ORM\ManyToOne(targetEntity: \PDossier::class)]
    private $dossier;


    /*
      @ORM\Column(type="integer", nullable=true)
     */
    private $operationId;

    #[ORM\ManyToOne(targetEntity: \App\Entity\PTransactionType::class)]
    private $type;

    
    #[Assert\NotBlank(groups: ['transactionEdit', 'alimantation'])]
    #[ORM\Column(type: 'date', nullable: true)]
    private $date;
    #[ORM\Column(type: 'float', nullable: true)]
    private $montantFinal = 0;

    #[ORM\Column(type: 'boolean', nullable: true)]
    private $active = 1;

    /**
     *
     * @var \DateTime
     *
     *
     */
    #[ORM\Column(name: 'created', type: 'datetime', nullable: true)]
    private $created;

    #[ORM\JoinColumn(name: 'user_created', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \User::class)]
    private $userCreated;

    /**
     *
     * @var \DateTime
     *
     */
    #[ORM\Column(name: 'updated', type: 'datetime', nullable: true)]
    private $updated;

    #[ORM\JoinColumn(name: 'user_updated', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \User::class)]
    private $userUpdated;

    #[ORM\JoinColumn(name: 'piece_id', referencedColumnName: 'id')]
    #[Assert\NotBlank(groups: ['transactionEdit'])]
    #[ORM\ManyToOne(targetEntity: \App\Entity\UpPiece::class)]
    private $piece;
    #[ORM\JoinColumn(name: 'p_piece_id', referencedColumnName: 'id')]
    #[Assert\NotBlank(groups: ['transactionEdit'])]
    #[ORM\ManyToOne(targetEntity: \App\Entity\PPiece::class)]
    private $pPiece;

    #[ORM\OneToMany(targetEntity: \App\Entity\TrCharge::class, mappedBy: 'transaction')]
    private $trCharges;

    #[ORM\OneToMany(targetEntity: \App\Entity\UvTReglementcab::class, mappedBy: 'transaction')]
    private $reglements;

    #[ORM\OneToMany(targetEntity: \App\Entity\UaTReglementfrscab::class, mappedBy: 'transaction')]
    private $uareglements;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $refDocAsso;

    /**
     * @var \DateTime|null
     */
    #[ORM\Column(type: 'date', nullable: true)]
    private $dateDocAsso;

    #[ORM\Column(type: 'boolean', nullable: true)]
    private $IsValider = 0;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $oldSys;

    #[ORM\ManyToOne(targetEntity: \App\Entity\UGeneralOperation::class, inversedBy: 'transactions')]
    private $operation;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $numCheque;

    #[ORM\Column(type: 'date', nullable: true)]
    private $dateEcheance;

    // /**
    //  * @Assert\Count(
    //  *      min = "1",
    //  *      minMessage = "Cette valeur ne doit pas être vide.",
    //  * )
    //  * @ORM\ManyToMany(targetEntity="App\Entity\UGeneralOperation", inversedBy="transactions")
    //  * @ORM\JoinTable(name="tr_operations_transactions")
    //  */
    // private $operations;
    
    #[ORM\JoinColumn(name: 'fournisseur_id', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \App\Entity\UPPartenaire::class)]
    private $fournisseur;

    
    #[ORM\JoinColumn(name: 'client_id', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \App\Entity\UPPartenaire::class)]
    private $client;

    
    #[ORM\JoinColumn(name: 'employe_id', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \App\Entity\GrsEmploye::class)]
    private $employe;

    
    #[ORM\JoinColumn(name: 'paie_id', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \App\Entity\GrsPaie::class)]
    private $paie;

    #[ORM\JoinColumn(name: 'parvenue_id', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \App\Entity\PGlobalParamDet::class, inversedBy: 'factures')]
    private $parvenue;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $lettrageAdonix;
    
    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $factureOldCode;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $refBanque;


        #[ORM\Column(type: 'boolean', nullable: true)]
    private $isdeleted;
        #[ORM\Column(type: 'boolean', nullable: true)]
    private $regul;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $code_bq;
    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $code_bq_ini;
    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $remise_bank;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $observation_bq;
    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $source;

    /**
     * * @var \DateTime
     */
    #[ORM\Column(name: 'date_bq', type: 'datetime', nullable: true)]
    private $date_bq;


    #[ORM\Column(type: 'float', nullable: true)]
    private $montantMad;

    #[ORM\Column(type: 'boolean', nullable: true)]
    private $executer;
    
      #[ORM\Column(type: 'integer', nullable: true)]
    private $signature1 = 0;
    #[ORM\Column(type: 'integer', nullable: true)]
    private $signature2 = 0;
    #[ORM\Column(type: 'integer', nullable: true)]
    private $signature3 = 0;
    #[ORM\Column(type: 'integer', nullable: true)]
    private $signature4 = 0;
    
    #[ORM\Column(type: 'integer', nullable: true)]
    private $signaturevirm1 = 0;
    #[ORM\Column(type: 'integer', nullable: true)]
    private $signaturevirm2 = 0;
    #[ORM\Column(type: 'integer', nullable: true)]
    private $signaturevirm3 = 0;
       #[ORM\Column(type: 'integer', nullable: true)]
    private $signaturevirm4 = 0;
    
    #[ORM\Column(type: 'integer', nullable: true)]
    private $flag;
    #[ORM\Column(type: 'integer', nullable: true)]
    private $flagAdonix;
    #[ORM\Column(type: 'boolean', nullable: true)]
    private $multiple = 0;
    #[ORM\Column(type: 'boolean', nullable: true)]
    private $chequeImpaye = 0;
    #[ORM\Column(type: 'string', nullable: true)]
    private $motifAnnuler;
    #[ORM\Column(type: 'integer', nullable: true)]
    private $annulationId;
    #[ORM\Column(type: 'integer', nullable: true)]
    private $statutsig = 0;
    #[ORM\Column(type: 'integer', nullable: true)]
    private $document ;
      #[ORM\Column(type: 'integer', nullable: true)]
    private $regate ;
    #[ORM\Column(type: 'integer', nullable: true)]
    private $flagOutput = 0;
    #[ORM\Column(type: 'integer', nullable: true)]
    private $flagInjecter = 0;
    #[ORM\Column(type: 'integer', nullable: true)]
    private $flagRejeter = 0;
    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $observationRejeter;
     #[ORM\Column(type: 'integer', nullable: true)]
    private $sens;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private $dateFlagOutput;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $outputValider;


      #[ORM\Column(type: 'integer', length: 255, nullable: true)]
    private $flagRemise = 0;
    #[ORM\Column(type: 'datetime', nullable: true)]
    private $dateFlagRemise;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $userInjecter = 0;
    #[ORM\Column(type: 'integer', nullable: true)]
    private $userRejeter = 0;
    #[ORM\Column(type: 'integer', nullable: true)]
    private $userPrecomptabiliser = 0;
    #[ORM\Column(type: 'integer', nullable: true)]
    private $userValide = 0;
    #[ORM\Column(type: 'integer', nullable: true)]
    private $userRemise = 0;
    #[ORM\Column(type: 'integer', nullable: true)]
    private $acquise = 0;
    #[ORM\Column(type: 'datetime', nullable: true)]
    private $dateAcquise;

     #[ORM\Column(type: 'float', nullable: true)]
    private $montantReleve;

     #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $codeImpaye;
    #[ORM\Column(type: 'datetime', nullable: true)]
    private $dateImpaye;

    #[ORM\Column(type: 'float', nullable: true)]
    private $taux;
     
    #[ORM\JoinColumn(name: 'u_p_partenaire_id', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \App\Entity\UPPartenaire::class)]
    private $uppartenaire;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $codeFafGpc;

     #[ORM\Column(type: 'float', nullable: true)]
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

    public function getDateImpaye(): ?\DateTimeInterface
    {
        return $this->dateImpaye;
    }

    public function setDateImpaye(?\DateTimeInterface $dateImpaye): self
    {
        $this->dateImpaye = $dateImpaye;

        return $this;
    }

    public function getCodeImpaye(): ?string
    {
        return $this->codeImpaye;
    }

    public function setCodeImpaye(?string $codeImpaye): self
    {
        $this->codeImpaye = $codeImpaye;
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


    public function getAcquise(): ?int
    {
        return $this->acquise;
    }
    public function getDateAcquise(): ?\DateTimeInterface
    {
        return $this->dateAcquise;
    }

    public function setDateAcquise(?\DateTimeInterface $dateAcquise): self
    {
        $this->dateAcquise = $dateAcquise;

        return $this;
    }

    public function setAcquise(?int $acquise): self
    {
        $this->acquise = $acquise;
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


    public function setSens(?int $sens): void {
        $this->sens = $sens;
    }

    public function getSens(): ?int {
        return $this->sens;
    }


    public function getFlagInjecter(): ?int {
        return $this->flagInjecter;
    }
    public function setFlagInjecter(?int $flagInjecter): self {
        $this->flagInjecter = $flagInjecter;
        return $this;
    }

    public function getFlagRejeter(): ?int {
        return $this->flagRejeter;
    }
    public function setFlagRejeter(?int $flagRejeter): self {
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

    public function getMontantFinal(): ?float
    {
        return $this->montantFinal;
    }

    public function setMontantFinal(?float $montantFinal): self
    {
        $this->montantFinal = $montantFinal;

        return $this;
    }
    public function getMontantMad(): ?float
    {
        return $this->montantMad;
    }

    public function setMontantMad(?float $montantMad): self
    {
        $this->montantMad = $montantMad;

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
    
    
    public function getCodebq(): ?string
    {
        return $this->code_bq;
    }

    public function setCodeBq(?string $code_bq): self
    {
        $this->code_bq = $code_bq;
        return $this;
    }
    public function getCodebqIni(): ?string
    {
        return $this->code_bq_ini;
    }

    public function setCodeBqIni(?string $code_bq_ini): self
    {
        $this->code_bq_ini = $code_bq_ini;
        return $this;
    }
    public function getRemiseBank(): ?string
    {
        return $this->remise_bank;
    }

    public function setRemiseBank(?string $remise_bank): self
    {
        $this->remise_bank = $remise_bank;
        return $this;
    }

    public function getObservationBq(): ?string
    {
        return $this->observation_bq;
    }

    public function setObservationBq(?string $observation_bq): self
    {
        $this->observation_bq = $observation_bq;
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

    public function getDateBq(): ?\DateTimeInterface {
        return $this->date_bq;
    }

    public function setDateBq(?\DateTimeInterface $date_bq): self {
        $this->date_bq = $date_bq;

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

    public function __construct() {
        $this->trCharges = new ArrayCollection();
        $this->reglements = new ArrayCollection();
        $this->uareglements = new ArrayCollection();
        // $this->operations = new ArrayCollection();
    }

    public function getOldSys(): ?string {
        return $this->oldSys;
    }

    public function setOldSys(?string $oldSys): self {
        $this->oldSys = $oldSys;

        return $this;
    }

    #[ORM\PrePersist]
    public function setCreatedValue() {

        $this->created = new \DateTime();
    }

    #[ORM\PreUpdate]
    public function setUpdatedValue() {
        $this->updated = new \DateTime();
    }

    public function getId(): ?int {
        return $this->id;
    }
    public function getAnnulationId(): ?int {
        return $this->annulationId;
    }
    public function setAnnulationId(?int $annulationId): self {
        $this->annulationId = $annulationId;
        return $this;
    }

    public function getCode(): ?string {
        return $this->code;
    }

    public function setCode(?string $code): self {
        $this->code = $code;

        return $this;
    }

    public function getDesignation(): ?string {
        return $this->designation;
    }

    public function setDesignation(?string $designation): self {
        $this->designation = $designation;

        return $this;
    }

    public function getAutreInformation(): ?string {
        return $this->autreInformation;
    }

    public function setAutreInformation(?string $autreInformation): self {
        $this->autreInformation = $autreInformation;

        return $this;
    }

    public function getMontant(): ?float {
        return $this->montant;
    }

    public function setMontant(?float $montant): self {
        $this->montant = $montant;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface {
        return $this->date;
    }

    public function setDate(?\DateTimeInterface $date): self {
        $this->date = $date;

        return $this;
    }

    public function getActive(): ?bool {
        return $this->active;
    }

    public function setActive(?bool $active): self {
        $this->active = $active;

        return $this;
    }

    public function getCreated(): ?\DateTimeInterface {
        return $this->created;
    }

    public function setCreated(?\DateTimeInterface $created): self {
        $this->created = $created;

        return $this;
    }
 
    public function getUpdated(): ?\DateTimeInterface {
        return $this->updated;
    }

    public function setUpdated(?\DateTimeInterface $updated): self {
        $this->updated = $updated;

        return $this;
    }

    public function getModepaiement(): ?PModepaiement {
        return $this->modepaiement;
    }

    public function setModepaiement(?PModepaiement $modepaiement): self {
        $this->modepaiement = $modepaiement;

        return $this;
    }
    public function getPPieceDpm(): ?PPiece {
        return $this->ppicedpm;
    }

    public function setPPieceDpm(?PPiece $ppicedpm): self {
        $this->ppicedpm = $ppicedpm;

        return $this;
    }

    public function getCompte(): ?PCompteBanque {
        return $this->compte;
    }

    public function setCompte(?PCompteBanque $compte): self {
        $this->compte = $compte;

        return $this;
    }

    public function getDossier(): ?PDossier {
        return $this->dossier;
    }

    public function setDossier(?PDossier $dossier): self {
        $this->dossier = $dossier;

        return $this;
    }

    public function getType(): ?PTransactionType {
        return $this->type;
    }

    public function setType(?PTransactionType $type): self {
        $this->type = $type;

        return $this;
    }

    public function getUserCreated(): ?User {
        return $this->userCreated;
    }

    public function setUserCreated(?User $userCreated): self {
        $this->userCreated = $userCreated;

        return $this;
    }

    public function getUserUpdated(): ?User {
        return $this->userUpdated;
    }

    public function setUserUpdated(?User $userUpdated): self {
        $this->userUpdated = $userUpdated;

        return $this;
    }

    /**
     * @return Collection|TrCharge[]
     */
    public function getTrCharges(): Collection {
        return $this->trCharges;
    }

    public function addTrCharge(TrCharge $trCharge): self {
        if (!$this->trCharges->contains($trCharge)) {
            $this->trCharges[] = $trCharge;
            $trCharge->setTransaction($this);
        }

        return $this;
    }

    public function removeTrCharge(TrCharge $trCharge): self {
        if ($this->trCharges->contains($trCharge)) {
            $this->trCharges->removeElement($trCharge);
            // set the owning side to null (unless already changed)
            if ($trCharge->getTransaction() === $this) {
                $trCharge->setTransaction(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|UvTReglementcab[]
     */
    public function getReglements(): Collection {
        return $this->reglements;
    }

    public function addReglement(UvTReglementcab $reglement): self {
        if (!$this->reglements->contains($reglement)) {
            $this->reglements[] = $reglement;
            $reglement->setTransaction($this);
        }

        return $this;
    }

    public function removeReglement(UvTReglementcab $reglement): self {
        if ($this->reglements->contains($reglement)) {
            $this->reglements->removeElement($reglement);
            // set the owning side to null (unless already changed)
            if ($reglement->getTransaction() === $this) {
                $reglement->setTransaction(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|UaTReglementfrscab[]
     */
    public function getUareglements(): Collection {
        return $this->reglements;
    }

    public function addUareglement(UaTReglementfrscab $reglement): self {
        if (!$this->uareglements->contains($reglement)) {
            $this->uareglements[] = $reglement;
            $reglement->setTransaction($this);
        }

        return $this;
    }

    public function removeUareglement(UaTReglementfrscab $reglement): self {
        if ($this->uareglements->contains($reglement)) {
            $this->uareglements->removeElement($reglement);
            // set the owning side to null (unless already changed)
            if ($reglement->getTransaction() === $this) {
                $reglement->setTransaction(null);
            }
        }

        return $this;
    }

    public function getPiece(): ?UpPiece {
        return $this->piece;
    }

    public function setPiece(?UpPiece $piece): self {
        $this->piece = $piece;

        return $this;
    }
    public function getPPiece(): ?PPiece {
        return $this->pPiece;
    }

    public function setPPiece(?PPiece $pPiece): self {
        $this->pPiece = $pPiece;

        return $this;
    }

    public function getRefDocAsso(): ?string {
        return $this->refDocAsso;
    }

    public function setRefDocAsso(?string $refDocAsso): self {
        $this->refDocAsso = $refDocAsso;

        return $this;
    }
    public function getMotifAnnuler(): ?string {
        return $this->motifAnnuler;
    }

    public function setMotifAnnuler(?string $motifAnnuler): self {
        $this->motifAnnuler = $motifAnnuler;

        return $this;
    }

    public function getIsValider(): ?bool {
        return $this->IsValider;
    }

    public function setIsValider(?bool $IsValider): self {
        $this->IsValider = $IsValider;

        return $this;
    }
    public function getFlag(): ?int {
        return $this->flag;
    }

    public function setFlag(?int $flag): self {
        $this->flag = $flag;

        return $this;
    }
    public function getFlagAdonix(): ?int {
        return $this->flagAdonix;
    }

    public function setFlagAdonix(?int $flagAdonix): self {
        $this->flagAdonix = $flagAdonix;

        return $this;
    }
    public function getMultiple(): ?bool {
        return $this->multiple;
    }

    public function setMultiple(?bool $multiple): self {
        $this->multiple = $multiple;

        return $this;
    }
    public function getChequeImpaye(): ?bool {
        return $this->chequeImpaye;
    }

    public function setChequeImpaye(?bool $chequeImpaye): self {
        $this->chequeImpaye = $chequeImpaye;

        return $this;
    }

    public function getDateDocAsso(): ?\DateTimeInterface {
        return $this->dateDocAsso;
    }

    public function setDateDocAsso(?\DateTimeInterface $dateDocAsso): self {
        $this->dateDocAsso = $dateDocAsso;

        return $this;
    }

    public function getOperation(): ?UGeneralOperation {
        return $this->operation;
    }

    public function setOperation(?UGeneralOperation $operation): self {
        $this->operation = $operation;

        return $this;
    }

    // /**
    //  * @return Collection|UGeneralOperation[]
    //  */
    // public function getOperations(): Collection {
    //     return $this->operations;
    // }

    // public function addOperation(UGeneralOperation $operation): self {
    //     if (!$this->operations->contains($operation)) {
    //         $this->operations[] = $operation;
    //     }

    //     return $this;
    // }

    // public function removeOperation(UGeneralOperation $operation): self {
    //     if ($this->operations->contains($operation)) {
    //         $this->operations->removeElement($operation);
    //     }

    //     return $this;
    // }

    public function setMontantTransaction(?float $montant): self {
        $this->montant = $montant;
        // $this->montant = $montant * $this->getPiece()->getSens();

        return $this;
    }

    public function getIsValideText(): string {
        if ($this->getIsValider() == 1) {
            return "OUI";
        } else {
            return "NON";
        }
    }

    public function getClient(): ?UPPartenaire {
        return $this->client;
    }

    public function setClient(?UPPartenaire $client): self {
        $this->client = $client;

        return $this;
    }

    public function getEmploye(): ?GrsEmploye {
        return $this->employe;
    }

    public function setEmploye(?GrsEmploye $employe): self {
        $this->employe = $employe;

        return $this;
    }

    public function getPaie(): ?GrsPaie {
        return $this->paie;
    }

    public function setPaie(?GrsPaie $paie): self {
        $this->paie = $paie;

        return $this;
    }

    public function getFournisseur(): ?UPPartenaire {
        return $this->fournisseur;
    }

    public function setFournisseur(?UPPartenaire $fournisseur): self {
        $this->fournisseur = $fournisseur;

        return $this;
    }

    public function getParvenue(): ?PGlobalParamDet {
        return $this->parvenue;
    }

    public function setParvenue(?PGlobalParamDet $parvenue): self {
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


    public function getRefBanque(): ?string {
        return $this->refBanque;
    }

    public function setRefBanque(?string $refBanque): self {
        $this->refBanque = $refBanque;

        return $this;
    }
    
    public function setStatutsig(?int $statutsig): void {
        $this->statutsig = $statutsig;
    }

    public function getStatutsig(): ?int {
        return $this->statutsig;
    }
    public function setDocument(?int $document): void {
        $this->document = $document;
    }

    public function getDocument(): ?int {
        return $this->document;
    }

    public function setRegate(?int $regate): void {
        $this->regate = $regate;
    }

    public function getRegate(): ?int {
        return $this->regate;
    }
    public function setFlagOutput(?int $flagOutput): void {
        $this->flagOutput = $flagOutput;
    }

    public function getFlagOutput(): ?int {
        return $this->flagOutput;
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
     public function getSignaturevirm1(): ?int {
        return $this->signaturevirm1;
    }

    public function setSignaturevirm1(?int $signaturevirm1): self {
        $this->signaturevirm1 = $signaturevirm1;
        return $this;
    }
    public function getSignaturevirm2(): ?int {
        return $this->signaturevirm2;
    }

    public function setSignaturevirm2(?int $signaturevirm2): self {
        $this->signaturevirm2 = $signaturevirm2;
        return $this;
    }
    public function getSignaturevirm3(): ?int {
        return $this->signaturevirm3;
    }

    public function setSignaturevirm3(?int $signaturevirm3): self {
        $this->signaturevirm3 = $signaturevirm3;
        return $this;
    }
    public function getSignaturevirm4(): ?int {
        return $this->signaturevirm4;
    }

    public function setSignaturevirm4(?int $signaturevirm4): self {
        $this->signaturevirm4 = $signaturevirm4;
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
}
