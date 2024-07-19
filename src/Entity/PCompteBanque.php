<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Entity\PCompteBanqueGeneral;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Table(name: 'p_compte_banque')]
#[ORM\Entity(repositoryClass: \App\Repository\PCompteBanqueRepository::class)]
class PCompteBanque {

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 100, nullable: true)]
    private $code;


    #[Assert\NotBlank]
    #[ORM\Column(name: 'abreviation', type: 'string', length: 20, nullable: true)]
    private $abreviation;

    #[Assert\NotBlank]
    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $designation;


    #[ORM\Column(type: 'text', nullable: true)]
    private $description;


    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $numCompte;


    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $rib;
    
    

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $codeIban;
    
    
    

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $codeBicSwift;
    
    
    

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $codeComptable;
    
    

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $proprietaire ;
    
    
    

    #[ORM\Column(type: 'text', nullable: true)]
    private $adressAgence;


    #[ORM\Column(type: 'date', nullable: true)]
    private $dateCompte;
    
    
     #[ORM\JoinColumn(name: 'type_id', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \PCompteBanqueType::class)]
    private $type;
     #[ORM\JoinColumn(name: 'compte_banque_general_id', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \PCompteBanqueGeneral::class)]
    private $compteBanqueGeneral;


    #[ORM\Column(type: 'boolean', nullable: true)]
    private $active;

    #[ORM\Column(type: 'boolean', nullable: true)]
    private $flagDevise = 0;

    /**
     *
     * @var \DateTime
     *
     *
     */
    #[ORM\Column(name: 'created', type: 'datetime', nullable: true)]
    private $created;
    #[ORM\Column(name: 'date_solde_initial', type: 'date', nullable: true)]
    private $datesoldeinitial;

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

    

    #[Assert\Positive]
    #[ORM\Column(type: 'float', length: 255, nullable: true)]
    private $soldeInitial;
    #[Assert\Positive]
    #[ORM\Column(type: 'float', length: 255, nullable: true)]
    private $soldeInitDevise;
    #[Assert\Positive]
    #[ORM\Column(type: 'float', length: 255, nullable: true)]
    private $soldeFinalDevise;
    
    
       #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $oldSys;


    #[ORM\OneToMany(targetEntity: \App\Entity\TrCharge::class, mappedBy: 'compte')]
    private $trCharges;

    #[ORM\Column(type: 'float', nullable: true)]
    private $montantInitial;


    #[ORM\Column(type: 'float', nullable: true)]
    private $montantFinal;
    #[ORM\Column(type: 'float', nullable: true)]
    private $devise;


    #[ORM\Column(type: 'float', nullable: true)]
    private $montantControle;


     #[ORM\Column(type: 'datetime', nullable: true)]
    private $dateMti;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private $dateMf;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private $dateMctr;


    #[ORM\ManyToMany(targetEntity: PDossier::class, inversedBy: 'pCompteBanques')]
    private $DossierC;
    #[ORM\JoinColumn(name: 'dossier_id', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: PDossier::class, inversedBy: 'compteBanques')]
    private $dossier;

     #[ORM\ManyToOne(targetEntity: PCompteBanque::class, inversedBy: 'comptes')]
    private $parent;

   #[ORM\OneToMany(targetEntity: PCompteBanque::class, mappedBy: 'parent')]
    private $comptes;



    public function __construct() {
       
        $this->trCharges = new ArrayCollection();
        $this->uGeneralOperations = new ArrayCollection();
        $this->DossierC = new ArrayCollection();
    }
    /**
     * @return Collection<int, self>
     */
    public function getComptes(): Collection
    {
        return $this->comptes;
    }

    public function addCompte(self $compte): self
    {
        if (!$this->comptes->contains($compte)) {
            $this->comptes[] = $compte;
            $compte->setParent($this);
        }

        return $this;
    }

    public function removeCompte(self $compte): self
    {
        if ($this->comptes->removeElement($compte)) {
            // set the owning side to null (unless already changed)
            if ($compte->getParent() === $this) {
                $compte->setParent(null);
            }
        }

        return $this;
    }


    public function getAbrdossier(): ?string {
        if($this->dossier){
            return $this->dossier->getAbreviation().'-'.$this->abreviation;
        }else{
            $this->abreviation;
        }
        
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


    
    public function getMontantInitial(): ?float
    {
        return $this->montantInitial;
    }

    public function setMontantInitial(?float $montantInitial): self
    {
        $this->montantInitial = $montantInitial;

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
    
    
    public function getDevise(): ?float
    {
        return $this->devise;
    }

    public function setDevise(?float $devise): self
    {
        $this->devise = $devise;

        return $this;
    }



    public function getMontantControle(): ?float
    {
        return $this->montantControle;
    }

    public function setMontantControle(?float $montantControle): self
    {
        $this->montantControle = $montantControle;

        return $this;
    }



    public function getDateMti(): ?\DateTimeInterface
    {
        return $this->dateMti;
    }

    public function setDateMti(?\DateTimeInterface $dateMti): self
    {
        $this->dateMti = $dateMti;

        return $this;
    }

    public function getDateMf(): ?\DateTimeInterface
    {
        return $this->dateMf;
    }

    public function setDateMf(?\DateTimeInterface $dateMf): self
    {
        $this->dateMf = $dateMf;

        return $this;
    }

    public function getDateMctr(): ?\DateTimeInterface
    {
        return $this->dateMctr;
    }

    public function setDateMctr(?\DateTimeInterface $dateMctr): self
    {
        $this->dateMctr = $dateMctr;

        return $this;
    }

    

    public function getId(): ?int {
        return $this->id;
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

    public function getDescription(): ?string {
        return $this->description;
    }

    public function setDescription(?string $description): self {
        $this->description = $description;

        return $this;
    }

    public function getAbreviation(): ?string {
        return $this->abreviation;
    }

    public function setAbreviation(?string $abreviation): self {
        $this->abreviation = $abreviation;

        return $this;
    }

    public function getActive(): ?bool {
        return $this->active;
    }

    public function setActive(?bool $active): self {
        $this->active = $active;

        return $this;
    }
    public function getFlagDevise(): ?bool {
        return $this->flagDevise;
    }

    public function SetFlagDevise(?bool $flagDevise): self {
        $this->flagDevise = $flagDevise;

        return $this;
    }

    public function getCreated(): ?\DateTimeInterface {
        return $this->created;
    }

    public function setCreated(?\DateTimeInterface $created): self {
        $this->created = $created;

        return $this;
    }
    
    public function getDateSoldeInitial(): ?\DateTimeInterface {
        return $this->datesoldeinitial;
    }

    public function setDateSoldeInitial(?\DateTimeInterface $datesoldeinitial): self {
        $this->datesoldeinitial = $datesoldeinitial;

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
    public function getDossier(): ?PDossier {
        return $this->dossier;
    }

    public function setDossier(?PDossier $dossier): self {
        $this->dossier = $dossier;
        return $this;
    }

    public function getUserUpdated(): ?User {
        return $this->userUpdated;
    }

    public function setUserUpdated(?User $userUpdated): self {
        $this->userUpdated = $userUpdated;

        return $this;
    }



    public function getSoldeInitial(): ?float {
        return $this->soldeInitial;
    }

    public function setSoldeInitial(?float $soldeInitial): self {
        $this->soldeInitial = $soldeInitial;

        return $this;
    }
    public function getSoldeInitDevise(): ?float {
        return $this->soldeInitDevise;
    }

    public function setSoldeInitDevise(?float $soldeInitDevise): self {
        $this->soldeInitDevise = $soldeInitDevise;

        return $this;
    }
    public function getSoldeFinalDevise(): ?float {
        return $this->soldeFinalDevise;
    }

    public function setSoldeFinalDevise(?float $soldeFinalDevise): self {
        $this->soldeFinalDevise = $soldeFinalDevise;

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
            $trCharge->setCompte($this);
        }

        return $this;
    }

    public function removeTrCharge(TrCharge $trCharge): self {
        if ($this->trCharges->contains($trCharge)) {
            $this->trCharges->removeElement($trCharge);
            // set the owning side to null (unless already changed)
            if ($trCharge->getCompte() === $this) {
                $trCharge->setCompte(null);
            }
        }

        return $this;
    }

    public function getNumCompte(): ?string
    {
        return $this->numCompte;
    }

    public function setNumCompte(?string $numCompte): self
    {
        $this->numCompte = $numCompte;

        return $this;
    }

    public function getRib(): ?string
    {
        return $this->rib;
    }

    public function setRib(?string $rib): self
    {
        $this->rib = $rib;

        return $this;
    }

    public function getCodeIban(): ?string
    {
        return $this->codeIban;
    }

    public function setCodeIban(?string $codeIban): self
    {
        $this->codeIban = $codeIban;

        return $this;
    }

    public function getCodeBicSwift(): ?string
    {
        return $this->codeBicSwift;
    }

    public function setCodeBicSwift(?string $codeBicSwift): self
    {
        $this->codeBicSwift = $codeBicSwift;

        return $this;
    }

    public function getCodeComptable(): ?string
    {
        return $this->codeComptable;
    }

    public function setCodeComptable(?string $codeComptable): self
    {
        $this->codeComptable = $codeComptable;

        return $this;
    }

    public function getProprietaire(): ?string
    {
        return $this->proprietaire;
    }

    public function setProprietaire(?string $proprietaire): self
    {
        $this->proprietaire = $proprietaire;

        return $this;
    }

    public function getAdressAgence(): ?string
    {
        return $this->adressAgence;
    }

    public function setAdressAgence(?string $adressAgence): self
    {
        $this->adressAgence = $adressAgence;

        return $this;
    }

    public function getDateCompte(): ?\DateTimeInterface
    {
        return $this->dateCompte;
    }

    public function setDateCompte(?\DateTimeInterface $dateCompte): self
    {
        $this->dateCompte = $dateCompte;

        return $this;
    }

    // public function getDossier(): ?PDossier
    // {
    //     return $this->dossier;
    // }

    // public function setDossier(?PDossier $dossier): self
    // {
    //     $this->dossier = $dossier;

    //     return $this;
    // }

    public function getOldSys(): ?string
    {
        return $this->oldSys;
    }

    public function setOldSys(?string $oldSys): self
    {
        $this->oldSys = $oldSys;

        return $this;
    }

    public function getType(): ?PCompteBanqueType
    {
        return $this->type;
    }

    public function setType(?PCompteBanqueType $type): self
    {
        $this->type = $type;

        return $this;
    }
    public function getCompteBanqueGeneral(): ?PCompteBanqueGeneral
    {
        return $this->compteBanqueGeneral;
    }

    public function setCompteBanqueGeneral(?PCompteBanqueGeneral $compteBanqueGeneral): self
    {
        $this->compteBanqueGeneral = $compteBanqueGeneral;

        return $this;
    }



     /**
     * @return Collection|UGeneralOperation[]
     */
    public function getUGeneralOperations(): Collection
    {
        return $this->uGeneralOperations;
    }

    public function addUGeneralOperation(UGeneralOperation $uGeneralOperation): self
    {
        if (!$this->uGeneralOperations->contains($uGeneralOperation)) {
            $this->uGeneralOperations[] = $uGeneralOperation;
            $uGeneralOperation->setCompteDestinataire($this);
        }

        return $this;
    }

    public function removeUGeneralOperation(UGeneralOperation $uGeneralOperation): self
    {
        if ($this->uGeneralOperations->removeElement($uGeneralOperation)) {
            // set the owning side to null (unless already changed)
            if ($uGeneralOperation->getCompteDestinataire() === $this) {
                $uGeneralOperation->setCompteDestinataire(null);
            }
        }

        return $this;
    }



    // /**
    //  * @return Collection|PDossier[]
    //  */
    // public function getDossierC(): Collection
    // {
    //     return $this->DossierC;
    // }

    // public function addDossierC(PDossier $dossierC): self
    // {
    //     if (!$this->DossierC->contains($dossierC)) {
    //         $this->DossierC[] = $dossierC;
    //     }

    //     return $this;
    // }

    // public function removeDossierC(PDossier $dossierC): self
    // {
    //     $this->DossierC->removeElement($dossierC);

    //     return $this;
    // }

}
