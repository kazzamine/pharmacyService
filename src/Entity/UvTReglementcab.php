<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping\HasLifecycleCallbacks;

/**
 * UvTReglementcab
 */
#[ORM\Table(name: 'uv_t_reglementcab')]
#[ORM\Entity]
#[ORM\HasLifecycleCallbacks]
class UvTReglementcab {

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    /**
     * @var string
     */
    #[ORM\Column(name: 'code', type: 'string', length: 100, nullable: true)]
    private $code;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'observation', type: 'text', length: 65535, nullable: true)]
    private $observation;

    /**
     * @var string
     */
    #[ORM\Column(name: 'type', type: 'string', length: 4, nullable: true)]
    private $type;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'client_id', type: 'string', length: 100, nullable: true)]
    private $idClient;

    /**
     * @var \DateTime|null
     */
    #[Assert\NotBlank]
    #[ORM\Column(name: 'datereglement', type: 'date', nullable: true)]
    private $datereglement;

    /**
     * @var int|null
     */
    #[ORM\Column(name: 'id_devis', type: 'integer', nullable: true)]
    private $idDevis;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'code_devis', type: 'string', length: 100, nullable: true)]
    private $codeDevis;

    /**
     * @var int|null
     */
    #[ORM\Column(name: 'id_facture', type: 'integer', nullable: true)]
    private $idFacture;

    /**
     * @var string
     */
    #[ORM\Column(name: 'code_facture', type: 'string', length: 100, nullable: true)]
    private $codeFacture;

    /**
     * @var float
     */
    #[Assert\NotBlank]
    #[ORM\Column(name: 'mtreglement', type: 'float', precision: 10, scale: 0, nullable: true)]
    private $mtreglement;

    /**
     * @var int
     */
    #[ORM\Column(name: 'sens', type: 'smallint', nullable: true)]
    private $sens ;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'id_source', type: 'string', length: 100, nullable: true)]
    private $idSource;

      #[ORM\JoinColumn(name: 'x_banque_id', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \App\Entity\UXBanque::class)]
    private $banque;

    
       #[ORM\JoinColumn(name: 'modepaiement_id', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \App\Entity\PModepaiement::class)]
    private $modepaiement;

    /**
     * @var \DateTime|null
     */
    #[ORM\Column(name: 'dateecheance', type: 'date', nullable: true)]
    private $dateecheance;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'numcheque', type: 'string', length: 100, nullable: true)]
    private $numcheque;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'utilisateur', type: 'string', length: 100, nullable: true)]
    private $utilisateur;

    /**
     * @var \DateTime
     */
    #[ORM\Column(name: 'dateoperation', type: 'datetime', nullable: true, options: ['default' => 'CURRENT_TIMESTAMP'])]
    private $dateoperation;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'conditionreg', type: 'text', length: 65535, nullable: true)]
    private $conditionreg;

    #[ORM\JoinColumn(name: 'p_dossier_id', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \App\Entity\PDossier::class)]
    private $dossier;
    
    
    #[ORM\JoinColumn(name: 'uv_facturecab_id', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \App\Entity\UvFacturecab::class)]
    private $factureClient;

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

    #[ORM\JoinColumn(name: 'user_updated', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \User::class)]
    private $userUpdated;
    
    
     #[ORM\ManyToOne(targetEntity: \TrCharge::class)]
    private $charge;

    #[ORM\Column(type: 'boolean', nullable: true)]
    private $chargeValider;


    #[ORM\ManyToOne(targetEntity: \App\Entity\PCompteBanque::class)]
    #[Assert\NotBlank]
    private $compte;


     #[ORM\ManyToOne(targetEntity: \App\Entity\TrTransaction::class, inversedBy: 'reglements')]
    private $transaction;


      #[ORM\JoinColumn(name: 'p_devise_id', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \App\Entity\UPDevise::class)]
    private $devise;




        #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $oldSys;

  

    public function __construct() {

      
        $this->datereglement = new \DateTime();
        $this->dateecheance = new \DateTime();

        
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


    
    public function getCompte(): ?PCompteBanque
    {
        return $this->compte;
    }

    public function setCompte(?PCompteBanque $compte): self
    {
        $this->compte = $compte;

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

    public function getId(): ?int {
        return $this->id;
    }

    public function getCode(): ?string {
        return $this->code;
    }

    public function setCode(string $code): self {
        $this->code = $code;

        return $this;
    }

    public function getType(): ?string {
        return $this->type;
    }

    public function setType(string $type): self {
        $this->type = $type;

        return $this;
    }

    public function getIdClient(): ?string {
        return $this->idClient;
    }

    public function setIdClient(?string $idClient): self {
        $this->idClient = $idClient;

        return $this;
    }

    public function getDatereglement(): ?\DateTimeInterface {
        return $this->datereglement;
    }

    public function setDatereglement(?\DateTimeInterface $datereglement): self {
        $this->datereglement = $datereglement;

        return $this;
    }

    public function getIdDevis(): ?int {
        return $this->idDevis;
    }

    public function setIdDevis(?int $idDevis): self {
        $this->idDevis = $idDevis;

        return $this;
    }

    public function getCodeDevis(): ?string {
        return $this->codeDevis;
    }

    public function setCodeDevis(?string $codeDevis): self {
        $this->codeDevis = $codeDevis;

        return $this;
    }

    public function getIdFacture(): ?int {
        return $this->idFacture;
    }

    public function setIdFacture(?int $idFacture): self {
        $this->idFacture = $idFacture;

        return $this;
    }

    public function getCodeFacture(): ?string {
        return $this->codeFacture;
    }

    public function setCodeFacture(string $codeFacture): self {
        $this->codeFacture = $codeFacture;

        return $this;
    }

    public function getMtreglement(): ?float {
        return $this->mtreglement;
    }

    public function setMtreglement(float $mtreglement): self {
        $this->mtreglement = $mtreglement;

        return $this;
    }

    public function getSens(): ?int {
        return $this->sens;
    }

    public function setSens(int $sens): self {
        $this->sens = $sens;

        return $this;
    }

    public function getIdSource(): ?string {
        return $this->idSource;
    }

    public function setIdSource(?string $idSource): self {
        $this->idSource = $idSource;

        return $this;
    }

  
    public function getBanque(): ?UXBanque {
        return $this->banque;
    }

    public function setBanque(?UXBanque $banque): self {
        $this->banque = $banque;

        return $this;
    }
    

    public function getModepaiement(): ?PModepaiement {
        return $this->modepaiement;
    }

    public function setModepaiement(?PModepaiement $modepaiement): self {
        $this->modepaiement = $modepaiement;

        return $this;
    }

    public function getDateecheance(): ?\DateTimeInterface {
        return $this->dateecheance;
    }

    public function setDateecheance(?\DateTimeInterface $dateecheance): self {
        $this->dateecheance = $dateecheance;

        return $this;
    }

    public function getNumcheque(): ?string {
        return $this->numcheque;
    }

    public function setNumcheque(?string $numcheque): self {
        $this->numcheque = $numcheque;

        return $this;
    }

    public function getUtilisateur(): ?string {
        return $this->utilisateur;
    }

    public function setUtilisateur(?string $utilisateur): self {
        $this->utilisateur = $utilisateur;

        return $this;
    }

    public function getDateoperation(): ?\DateTimeInterface {
        return $this->dateoperation;
    }

    public function setDateoperation(\DateTimeInterface $dateoperation): self {
        $this->dateoperation = $dateoperation;

        return $this;
    }

    public function getConditionreg(): ?string {
        return $this->conditionreg;
    }

    public function setConditionreg(?string $conditionreg): self {
        $this->conditionreg = $conditionreg;

        return $this;
    }

    public function getDossier(): ?PDossier {
        return $this->dossier;
    }

    public function setDossier(?PDossier $dossier): self {
        $this->dossier = $dossier;

        return $this;
    }


    public function getActive(): ?bool {
        return $this->active;
    }

    public function setActive(?bool $active): self {
        $this->active = $active;

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

    public function getCharge(): ?TrCharge
    {
        return $this->charge;
    }

    public function setCharge(?TrCharge $charge): self
    {
        $this->charge = $charge;

        return $this;
    }

    public function getChargeValider(): ?bool
    {
        return $this->chargeValider;
    }

    public function setChargeValider(?bool $chargeValider): self
    {
        $this->chargeValider = $chargeValider;

        return $this;
    }



    public function getTransaction(): ?TrTransaction
    {
        return $this->transaction;
    }

    public function setTransaction(?TrTransaction $transaction): self
    {
        $this->transaction = $transaction;

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

    public function getDevise(): ?UPDevise
    {
        return $this->devise;
    }

    public function setDevise(?UPDevise $devise): self
    {
        $this->devise = $devise;

        return $this;
    }

}
