<?php

namespace App\Entity;

use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

#[ORM\Table(name: "u_p_partenaire")]
#[ORM\Entity(repositoryClass: "App\Repository\UPPartenaireRepository")]
class UPPartenaire
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    private $id;

    #[ORM\OneToMany(targetEntity: DemandStockCab::class, mappedBy: "uPPartenaire")]
    private $demandStockCabs;

    #[ORM\Column(name: "code", type: "string", length: 100, nullable: true)]
    private ?string $code = null;

    #[ORM\Column(name: "forme_juridique", type: "string", length: 100, nullable: true)]
    private ?string $formeJuridique = null;

    #[Assert\NotBlank]
    #[ORM\Column(name: "nom", type: "string", length: 150, nullable: true)]
    private ?string $nom = null;

    #[Assert\NotBlank]
    #[ORM\Column(name: "prenom", type: "string", length: 150, nullable: true)]
    private ?string $prenom = null;

    #[Assert\NotBlank]
    #[ORM\Column(name: "societe", type: "string", length: 150, nullable: true)]
    private ?string $societe = null;

    #[ORM\Column(name: "adresse", type: "text", length: 65535, nullable: true)]
    private ?string $adresse = null;

    #[ORM\Column(name: "pays", type: "string", length: 100, nullable: true)]
    private ?string $pays = null;

    #[ORM\Column(name: "ville", type: "string", length: 100, nullable: true)]
    private ?string $ville = null;

    #[ORM\Column(name: "tel1", type: "string", length: 100, nullable: true)]
    private ?string $tel1 = null;

    #[ORM\Column(name: "tel2", type: "string", length: 100, nullable: true)]
    private ?string $tel2 = null;

    #[ORM\Column(name: "tel3", type: "string", length: 100, nullable: true)]
    private ?string $tel3 = null;

    #[ORM\Column(name: "fax1", type: "string", length: 100, nullable: true)]
    private ?string $fax1 = null;

    #[ORM\Column(name: "fax2", type: "string", length: 100, nullable: true)]
    private ?string $fax2 = null;

    #[ORM\Column(name: "mail1", type: "string", length: 100, nullable: true)]
    private ?string $mail1 = null;

    #[ORM\Column(name: "mail2", type: "string", length: 100, nullable: true)]
    private ?string $mail2 = null;

    #[ORM\Column(name: "rib", type: "string", length: 100, nullable: true)]
    private ?string $rib = null;

    #[ORM\Column(name: "banque", type: "string", length: 100, nullable: true)]
    private ?string $banque = null;

    #[ORM\Column(name: "iban", type: "string", length: 100, nullable: true)]
    private ?string $iban = null;

    #[ORM\Column(name: "swift", type: "string", length: 100, nullable: true)]
    private ?string $swift = null;

    #[ORM\ManyToOne(targetEntity: "App\Entity\UPPartenaireTy")]
    #[ORM\JoinColumn(name: "u_p_partenaire_ty_id", referencedColumnName: "id")]
    private $type;

    #[ORM\ManyToOne(targetEntity: "App\Entity\CcCategorieTiers")]
    #[ORM\JoinColumn(name: "categorie_tiers_id", referencedColumnName: "id")]
    private $categorieTiers;

    #[ORM\OneToMany(targetEntity: "App\Entity\UaTFacturefrscab", mappedBy: "fournisseur")]
    private $factures;

    #[ORM\Column(type: "boolean", nullable: true)]
    private ?bool $active = null;

    #[ORM\Column(type: "boolean", nullable: true)]
    private ?bool $taxable = null;

    #[Assert\Range(min: 0, max: 100)]
    #[ORM\Column(type: "integer", nullable: true)]
    private ?int $tva = 20;

    #[ORM\ManyToOne(targetEntity: "App\Entity\PModepaiement")]
    #[ORM\JoinColumn(name: "modepaiement_id", referencedColumnName: "id")]
    private $modepaiement;

    #[ORM\Column(type: "string", length: 100, nullable: true)]
    private ?string $iff = null;

    #[ORM\Column(type: "string", length: 100, nullable: true)]
    private ?string $rc = null;

    #[ORM\Column(type: "string", length: 100, nullable: true)]
    private ?string $ice = null;

    #[ORM\Column(type: "string", length: 100, nullable: true)]
    private ?string $patente = null;

    #[ORM\Column(type: "string", length: 255, nullable: true)]
    private ?string $oldSys = null;

    #[ORM\Column(type: "string", length: 100, nullable: true)]
    private ?string $lettrageAdonix = null;

    #[ORM\Column(type: "boolean", nullable: true)]
    private ?bool $u3sClient = null;

    #[ORM\Column(name: "created", type: "datetime", nullable: true)]
    private ?\DateTime $created = null;

    #[ORM\ManyToOne(targetEntity: "App\Entity\PGlobalParamDet")]
    private $categorie;

    #[Assert\NotBlank]
    #[ORM\ManyToOne(targetEntity: "App\Entity\PGlobalParamDet")]
    private $typePartenaire;

    #[ORM\OneToOne(targetEntity: "App\Entity\PDossier")]
    private $dossier;

    #[ORM\ManyToOne(targetEntity: "User")]
    #[ORM\JoinColumn(name: "user_created", referencedColumnName: "id")]
    private $userCreated;

    #[ORM\Column(type: "string", length: 255, nullable: true)]
    private ?string $iceO = null;

    #[ORM\Column(name: "date_msj", type: "datetime", nullable: true)]
    private ?\DateTimeInterface $dateMsj = null;

    #[ORM\ManyToOne(targetEntity: "User")]
    #[ORM\JoinColumn(name: "user_msj", referencedColumnName: "id")]
    private $userMsj;

    #[ORM\Column(type: "string", length: 255, nullable: true)]
    private ?string $nomContact = null;

    #[ORM\Column(type: "string", length: 255, nullable: true)]
    private ?string $telContact = null;

    #[ORM\OneToMany(targetEntity: "App\Entity\PMarche", mappedBy: "tiers")]
    private $pMarches;

    #[ORM\OneToMany(targetEntity: "App\Entity\UsStockConditionnementDet", mappedBy: "tiers")]
    private $usStockConditionnementDets;

    #[ORM\Column(type: "float", nullable: true)]
    private ?float $capital = null;

    #[ORM\Column(type: "string", length: 255, nullable: true)]
    private ?string $registreCommerce = null;

    #[ORM\Column(type: "string", length: 255, nullable: true)]
    private ?string $cnss = null;

    #[ORM\Column(type: "string", length: 255, nullable: true)]
    private ?string $numCompte = null;

    #[ORM\Column(type: "string", length: 255, nullable: true)]
    private ?string $adresseBanque = null;

    #[ORM\Column(type: "string", length: 255, nullable: true)]
    private ?string $representant = null;

    #[ORM\Column(type: "string", length: 255, nullable: true)]
    private ?string $fonctionRepresentant = null;

    #[ORM\Column(type: "integer", nullable: true)]
    private ?int $parent = null;

    #[ORM\Column(type: "string", length: 255, nullable: true)]
    private ?string $identifiantFiscal = null;

    #[ORM\Column(type: "string", length: 255, nullable: true)]
    private ?string $representant2 = null;

    #[ORM\Column(type: "string", length: 255, nullable: true)]
    private ?string $fonctionRepresentant2 = null;

    public function getIceO(): ?string
    {
        return $this->iceO;
    }

    public function setIceO(?string $iceO): self
    {
        $this->iceO = $iceO;

        return $this;
    }

    public function getDateMsj(): ?\DateTimeInterface
    {
        return $this->dateMsj;
    }

    public function setDateMsj(?\DateTimeInterface $dateMsj): self
    {
        $this->dateMsj = $dateMsj;

        return $this;
    }

    public function getUserMsj(): ?User {
        return $this->userMsj;
    }

    public function setUserMsj(?User $userMsj): self {
        $this->userMsj = $userMsj;

        return $this;
    }
    
    public function getNomContact(): ?string
    {
        return $this->nomContact;
    }

    public function SetNomContact(?string $nomContact): self
    {
        $this->nomContact = $nomContact;

        return $this;
    }
    public function getTelContact(): ?string
    {
        return $this->telContact;
    }

    public function setTelContact(?string $telContact): self
    {
        $this->telContact = $telContact;

        return $this;
    }

    public function getUserCreated(): ?User {
        return $this->userCreated;
    }

    public function setUserCreated(?User $userCreated): self {
        $this->userCreated = $userCreated;
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


    public function __construct()
    {
        $this->factures  = new ArrayCollection();
        $this->trCharges = new ArrayCollection();
        $this->pMarches  = new ArrayCollection();
        $this->usStockConditionnementDets = new ArrayCollection();
        $this->demandStockCabs = new ArrayCollection();

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

    public function getId(): ?int
    {
        return $this->id;
    }
    public function setId(?int $id): self
    {
        $this->id = $id;

        return $this;
    }
    public function getFormeJuridique(): ?string
    {
        return $this->formeJuridique;
    }

    public function setFormeJuridique(?string $formeJuridique): self
    {
        $this->formeJuridique = $formeJuridique;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(?string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(?string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getSociete(): ?string
    {
        return $this->societe;
    }

    public function setSociete(?string $societe): self
    {
        $this->societe = $societe;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(?string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getPays(): ?string
    {
        return $this->pays;
    }

    public function setPays(?string $pays): self
    {
        $this->pays = $pays;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(?string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    public function getTel1(): ?string
    {
        return $this->tel1;
    }

    public function setTel1(?string $tel1): self
    {
        $this->tel1 = $tel1;

        return $this;
    }

    public function getTel2(): ?string
    {
        return $this->tel2;
    }

    public function setTel2(?string $tel2): self
    {
        $this->tel2 = $tel2;

        return $this;
    }

    public function getTel3(): ?string
    {
        return $this->tel3;
    }

    public function setTel3(?string $tel3): self
    {
        $this->tel3 = $tel3;

        return $this;
    }

    public function getFax1(): ?string
    {
        return $this->fax1;
    }

    public function setFax1(?string $fax1): self
    {
        $this->fax1 = $fax1;

        return $this;
    }

    public function getFax2(): ?string
    {
        return $this->fax2;
    }

    public function setFax2(?string $fax2): self
    {
        $this->fax2 = $fax2;

        return $this;
    }

    public function getMail1(): ?string
    {
        return $this->mail1;
    }

    public function setMail1(?string $mail1): self
    {
        $this->mail1 = $mail1;

        return $this;
    }

    public function getMail2(): ?string
    {
        return $this->mail2;
    }

    public function setMail2(?string $mail2): self
    {
        $this->mail2 = $mail2;

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

    public function getBanque(): ?string
    {
        return $this->banque;
    }

    public function setBanque(?string $banque): self
    {
        $this->banque = $banque;

        return $this;
    }
    public function getIban(): ?string
    {
        return $this->iban;
    }

    public function setIban(?string $iban): self
    {
        $this->iban = $iban;

        return $this;
    }
    public function getSwift(): ?string
    {
        return $this->swift;
    }

    public function setSwift(?string $swift): self
    {
        $this->swift = $swift;

        return $this;
    }

    public function __toString()
    {
        return $this->type;
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

    public function getActive(): ?bool
    {
        return $this->active;
    }

    public function setActive(?bool $active): self
    {
        $this->active = $active;

        return $this;
    }

    public function getType(): ?UPPartenaireTy
    {
        return $this->type;
    }

    public function setType(?UPPartenaireTy $type): self
    {
        $this->type = $type;

        return $this;
    }
    public function getCategorieTiers(): ?CcCategorieTiers
    {
        return $this->categorieTiers;
    }

    public function setCategorieTiers(?CcCategorieTiers $categorieTiers): self
    {
        $this->categorieTiers = $categorieTiers;

        return $this;
    }

    /**
     * @return Collection|UaTFacturefrscab[]
     */
    public function getFactures(): Collection
    {
        return $this->factures;
    }

    public function addFacture(UaTFacturefrscab $facture): self
    {
        if (!$this->factures->contains($facture)) {
            $this->factures[] = $facture;
            $facture->setPartenaire($this);
        }

        return $this;
    }

    public function removeFacture(UaTFacturefrscab $facture): self
    {
        if ($this->factures->contains($facture)) {
            $this->factures->removeElement($facture);
            // set the owning side to null (unless already changed)
            if ($facture->getPartenaire() === $this) {
                $facture->setPartenaire(null);
            }
        }

        return $this;
    }

    public function getIff(): ?string
    {
        return $this->iff;
    }

    public function setIff(?string $iff): self
    {
        $this->iff = $iff;

        return $this;
    }

    public function getRc(): ?string
    {
        return $this->rc;
    }

    public function setRc(?string $rc): self
    {
        $this->rc = $rc;

        return $this;
    }

    public function getIce(): ?string
    {
        return $this->ice;
    }

    public function setIce(?string $ice): self
    {
        $this->ice = $ice;

        return $this;
    }

    public function getPatente(): ?string
    {
        return $this->patente;
    }

    public function setPatente(?string $patente): self
    {
        $this->patente = $patente;

        return $this;
    }

    public function getTaxable(): ?bool
    {
        return $this->taxable;
    }

    public function setTaxable(?bool $taxable): self
    {
        $this->taxable = $taxable;

        return $this;
    }

    public function getTva(): ?int
    {
        return $this->tva;
    }

    public function setTva(?int $tva): self
    {
        $this->tva = $tva;

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

    public function getU3sClient(): ?bool
    {
        return $this->u3sClient;
    }

    public function setU3sClient(?bool $u3sClient): self
    {
        $this->u3sClient = $u3sClient;

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

    public function getLettrageAdonix(): ?string
    {
        return $this->lettrageAdonix;
    }

    public function setLettrageAdonix(?string $lettrageAdonix): self
    {
        $this->lettrageAdonix = $lettrageAdonix;

        return $this;
    }

    public function getCategorie(): ?PGlobalParamDet
    {
        return $this->categorie;
    }

    public function setCategorie(?PGlobalParamDet $categorie): self
    {
        $this->categorie = $categorie;

        return $this;
    }



    public function getTypePartenaire(): ?PGlobalParamDet
    {
        return $this->typePartenaire;
    }

    public function setTypePartenaire(?PGlobalParamDet $typePartenaire): self
    {
        $this->typePartenaire = $typePartenaire;

        return $this;
    }


    /**
     * @return Collection|PMarche[]
     */
    public function getPMarches(): Collection
    {
        return $this->pMarches;
    }

    public function addPMarch(PMarche $pMarch): self
    {
        if (!$this->pMarches->contains($pMarch)) {
            $this->pMarches[] = $pMarch;
            $pMarch->setTiers($this);
        }

        return $this;
    }

    public function removePMarch(PMarche $pMarch): self
    {
        if ($this->pMarches->contains($pMarch)) {
            $this->pMarches->removeElement($pMarch);
            // set the owning side to null (unless already changed)
            if ($pMarch->getTiers() === $this) {
                $pMarch->setTiers(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|UsStockConditionnementDet[]
     */
    public function getUsStockConditionnementDets(): Collection
    {
        return $this->usStockConditionnementDets;
    }

    public function addUsStockConditionnementDet(UsStockConditionnementDet $usStockConditionnementDet): self
    {
        if (!$this->usStockConditionnementDets->contains($usStockConditionnementDet)) {
            $this->usStockConditionnementDets[] = $usStockConditionnementDet;
            $usStockConditionnementDet->setTiers($this);
        }

        return $this;
    }

    public function removeUsStockConditionnementDet(UsStockConditionnementDet $usStockConditionnementDet): self
    {
        if ($this->usStockConditionnementDets->contains($usStockConditionnementDet)) {
            $this->usStockConditionnementDets->removeElement($usStockConditionnementDet);
            // set the owning side to null (unless already changed)
            if ($usStockConditionnementDet->getTiers() === $this) {
                $usStockConditionnementDet->setTiers(null);
            }
        }

        return $this;
    }




    //    /**
    //     * @return Collection|TrCharge[]
    //     */
    //    public function getTrCharges(): Collection
    //    {
    //        return $this->trCharges;
    //    }
    //
    //    public function addTrCharge(TrCharge $trCharge): self
    //    {
    //        if (!$this->trCharges->contains($trCharge)) {
    //            $this->trCharges[] = $trCharge;
    //            $trCharge->setFournisseur($this);
    //        }
    //
    //        return $this;
    //    }
    //
    //    public function removeTrCharge(TrCharge $trCharge): self
    //    {
    //        if ($this->trCharges->contains($trCharge)) {
    //            $this->trCharges->removeElement($trCharge);
    //            // set the owning side to null (unless already changed)
    //            if ($trCharge->getFournisseur() === $this) {
    //                $trCharge->setFournisseur(null);
    //            }
    //        }
    //
    //        return $this;
    //    }


     public function getCapital(): ?float
    {
        return $this->capital;
    }

    public function setCapital(?float $capital): self
    {
        $this->capital = $capital;

        return $this;
    }

    public function getRegistreCommerce(): ?string
    {
        return $this->registreCommerce;
    }

    public function setRegistreCommerce(?string $registreCommerce): self
    {
        $this->registreCommerce = $registreCommerce;

        return $this;
    }

    public function getCnss(): ?string
    {
        return $this->cnss;
    }

    public function setCnss(?string $cnss): self
    {
        $this->cnss = $cnss;

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

    public function getAdresseBanque(): ?string
    {
        return $this->adresseBanque;
    }

    public function setAdresseBanque(?string $adresseBanque): self
    {
        $this->adresseBanque = $adresseBanque;

        return $this;
    }

    public function getRepresentant(): ?string
    {
        return $this->representant;
    }

    public function setRepresentant(?string $representant): self
    {
        $this->representant = $representant;

        return $this;
    }

    public function getFonctionRepresentant(): ?string
    {
        return $this->fonctionRepresentant;
    }

    public function setFonctionRepresentant(?string $fonctionRepresentant): self
    {
        $this->fonctionRepresentant = $fonctionRepresentant;

        return $this;
    }

    public function getParent(): ?int
    {
        return $this->parent;
    }

    public function setParent(?int $parent): self
    {
        $this->parent = $parent;

        return $this;
    }

    public function getIdentifiantFiscal(): ?string
    {
        return $this->identifiantFiscal;
    }

    public function setIdentifiantFiscal(?string $identifiantFiscal): self
    {
        $this->identifiantFiscal = $identifiantFiscal;

        return $this;
    }

    public function getRepresentant2(): ?string
    {
        return $this->representant2;
    }

    public function setRepresentant2(?string $representant2): self
    {
        $this->representant2 = $representant2;

        return $this;
    }


    public function getFonctionRepresentant2(): ?string
    {
        return $this->fonctionRepresentant2;
    }

    public function setFonctionRepresentant2(?string $fonctionRepresentant2): self
    {
        $this->fonctionRepresentant2 = $fonctionRepresentant2;

        return $this;
    }
  /**
     * @return Collection|DemandStockCab[]
     */
    public function getDemandStockCabs(): Collection
    {
        return $this->demandStockCabs;
    }

    public function addDemandStockCab(DemandStockCab $demandStockCab): self
    {
        if (!$this->demandStockCabs->contains($demandStockCab)) {
            $this->demandStockCabs[] = $demandStockCab;
            $demandStockCab->setUPPartenaire($this);
        }

        return $this;
    }

    public function removeDemandStockCab(DemandStockCab $demandStockCab): self
    {
        if ($this->demandStockCabs->removeElement($demandStockCab)) {
            // set the owning side to null (unless already changed)
            if ($demandStockCab->getUPPartenaire() === $this) {
                $demandStockCab->setUPPartenaire(null);
            }
        }

        return $this;
    }

}
