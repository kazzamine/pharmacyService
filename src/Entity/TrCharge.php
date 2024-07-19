<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: \App\Repository\TrChargeRepository::class)]
#[ORM\HasLifecycleCallbacks]
class TrCharge {

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $code;

    #[ORM\Column(type: 'date', nullable: true)]
    private $date;

    #[Assert\NotBlank]
    #[ORM\ManyToOne(targetEntity: \App\Entity\UpPiece::class)]
    private $piece;

    #[ORM\ManyToOne(targetEntity: \App\Entity\PCompteBanque::class, inversedBy: 'trCharges')]
    #[Assert\NotBlank]
    private $compte;

    
    #[ORM\ManyToOne(targetEntity: \App\Entity\PModepaiement::class)]
    private $modepaiement;

    
    #[ORM\Column(type: 'date', nullable: true)]
    private $dateDocAsso;

    
    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $refDocAsso;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $numCheque;

    #[ORM\Column(type: 'date', nullable: true)]
    private $dateEcheance;

    
    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $designation;

    
    #[ORM\Column(type: 'float', nullable: true)]
    private $montant;

    #[ORM\Column(type: 'string', length: 300, nullable: true)]
    private $autreInformation;

    
    #[ORM\JoinColumn(name: 'fournisseur_id', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \UPPartenaire::class)]
    private $fournisseur;

    #[ORM\JoinColumn(name: 'p_dossier_id', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \PDossier::class)]
    private $dossier;

    #[ORM\JoinTable(name: 'tr_charges_reglements')]
    #[ORM\ManyToMany(targetEntity: \UaTReglementfrscab::class, inversedBy: 'marches')]
    private $reglements;

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

    #[ORM\ManyToOne(targetEntity: \App\Entity\TrTransaction::class, inversedBy: 'trCharges')]
    private $transaction;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $oldSys;

    #[ORM\OneToMany(targetEntity: \App\Entity\TrChargedet::class, cascade: ['persist', 'remove'], mappedBy: 'cab')]
    private $details;

    public function __construct() {
        $this->reglements = new ArrayCollection();
        $this->details = new ArrayCollection();
    }

    public function getIsActiveText($active) {
        if ($active == 1) {
            return 'Active';
        } else {
            return 'Désactivé';
        }
    }

    public function getOldSys(): ?string {
        return $this->oldSys;
    }

    public function setOldSys(?string $oldSys): self {
        $this->oldSys = $oldSys;

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

    public function getDesignation(): ?string {
        return $this->designation;
    }

    public function setDesignation(?string $designation): self {
        $this->designation = $designation;

        return $this;
    }

    public function getMontant(): ?float {
        return $this->montant;
    }

    public function setMontant(?float $montant): self {
        $this->montant = $montant;

        return $this;
    }

    public function getAutreInformation(): ?string {
        return $this->autreInformation;
    }

    public function setAutreInformation(?string $autreInformation): self {
        $this->autreInformation = $autreInformation;

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

    public function getPiece(): ?UpPiece {
        return $this->piece;
    }

    public function setPiece(?UpPiece $piece): self {
        $this->piece = $piece;

        return $this;
    }

    public function getCompte(): ?PCompteBanque {
        return $this->compte;
    }

    public function setCompte(?PCompteBanque $compte): self {
        $this->compte = $compte;

        return $this;
    }

    public function getModepaiement(): ?PModepaiement {
        return $this->modepaiement;
    }

    public function setModepaiement(?PModepaiement $modepaiement): self {
        $this->modepaiement = $modepaiement;

        return $this;
    }

    public function getFournisseur(): ?UPPartenaire {
        return $this->fournisseur;
    }

    public function setFournisseur(?UPPartenaire $fournisseur): self {
        $this->fournisseur = $fournisseur;

        return $this;
    }

    public function getDossier(): ?PDossier {
        return $this->dossier;
    }

    public function setDossier(?PDossier $dossier): self {
        $this->dossier = $dossier;

        return $this;
    }

    /**
     * @return Collection|UaTReglementfrscab[]
     */
    public function getReglements(): Collection {
        return $this->reglements;
    }

    public function addReglement(UaTReglementfrscab $reglement): self {
        if (!$this->reglements->contains($reglement)) {
            $this->reglements[] = $reglement;
        }

        return $this;
    }

    public function removeReglement(UaTReglementfrscab $reglement): self {
        if ($this->reglements->contains($reglement)) {
            $this->reglements->removeElement($reglement);
        }

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

    public function getTransaction(): ?TrTransaction {
        return $this->transaction;
    }

    public function setTransaction(?TrTransaction $transaction): self {
        $this->transaction = $transaction;

        return $this;
    }

    /**
     * @return Collection|TrChargedet[]
     */
    public function getDetails(): Collection {
        return $this->details;
    }

    public function addDetail(TrChargedet $detail): self {
        if (!$this->details->contains($detail)) {
            $this->details[] = $detail;
            $detail->setCab($this);
        }

        return $this;
    }

    public function removeDetail(TrChargedet $detail): self {
        if ($this->details->contains($detail)) {
            $this->details->removeElement($detail);
            // set the owning side to null (unless already changed)
            if ($detail->getCab() === $this) {
                $detail->setCab(null);
            }
        }

        return $this;
    }

}
