<?php

namespace App\Entity;

use App\Entity\Udepot;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\HttpFoundation\File\File;
use Doctrine\Common\Collections\ArrayCollection;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

#[ORM\Table(name: "p_dossier")]
#[ORM\Entity(repositoryClass: "App\Repository\PDossierRepository")]
#[ORM\HasLifecycleCallbacks]
#[Vich\Uploadable]
#[UniqueEntity(fields: ["code"])]
#[UniqueEntity(fields: ["prefix"])]
#[UniqueEntity(fields: ["abreviation"])]
#[UniqueEntity(fields: ["abreviation2"])]
class PDossier
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    private $id;

    #[ORM\Column(name: "code", type: "string", length: 20, nullable: true)]
    private ?string $code;

    #[ORM\Column(name: "abreviation", type: "string", length: 12, nullable: true, unique: true)]
    #[Assert\NotBlank]
    private ?string $abreviation;

    #[ORM\Column(name: "abreviation2", type: "string", length: 100, nullable: true, unique: true)]
    #[Assert\NotBlank]
    private ?string $abreviation2;

    #[ORM\Column(name: "nom_dossier", type: "string", length: 255, nullable: true)]
    #[Assert\NotBlank]
    private string $nomDossier;

    #[ORM\Column(name: "description", type: "text", nullable: true)]
    #[Assert\NotBlank]
    private string $description;

    #[ORM\Column(name: "utilisateur", type: "string", length: 255, nullable: true)]
    private ?string $utilisateur;

    #[ORM\Column(name: "datecreation", type: "datetime", nullable: true)]
    private ?\DateTimeInterface $datecreation;

    #[ORM\Column(name: "adresse", type: "text", nullable: true)]
    private ?string $adresse;

    #[ORM\Column(name: "tel", type: "string", length: 20, nullable: true)]
    private ?string $tel;

    #[ORM\Column(name: "active", type: "boolean", nullable: true)]
    private ?bool $active;

    #[ORM\Column(name: "externe", type: "boolean", nullable: true)]
    private ?bool $externe;

    #[Assert\Length(
        min: 2,
        max: 20,
        minMessage: "Vous devez ajouter plus que {{ limit }} caractères.",
        maxMessage: "Vous ne devez pas dépasser {{ limit }} caractères."
    )]
    #[Assert\NotBlank]
    #[ORM\Column(type: "string", length: 100, unique: true)]
    private string $prefix;

    #[ORM\Column(type: "string", length: 255, nullable: true)]
    #[Assert\NotBlank]
    private ?string $titre;

    #[ORM\OneToMany(targetEntity: "App\Entity\UaTFacturefrscab", mappedBy: "dossier")]
    private Collection $uaTFacturefrscabs;

    #[ORM\OneToMany(targetEntity: "App\Entity\UaTFacturefrscab", mappedBy: "pourcompte")]
    private Collection $yes;

  

    #[ORM\Column(type: "string", length: 255, nullable: true)]
    private $icon;

    #[ORM\Column(type: "smallint", nullable: true)]
    private $ugouv;

    #[ORM\Column(type: "string", length: 100, nullable: true)]
    private $iff;

    #[ORM\Column(type: "string", length: 100, nullable: true)]
    private $rc;

    #[ORM\Column(type: "string", length: 100, nullable: true)]
    private $ice;

    #[ORM\Column(type: "string", length: 100, nullable: true)]
    private $patente;

    #[ORM\Column(type: "string", length: 100, nullable: true)]
    private $cnss;

    #[ORM\Column(type: "string", length: 255, nullable: true)]
    private $originalName;

    #[ORM\Column(type: "string", length: 255, nullable: true)]
    private $mimeType;

    #[Vich\UploadableField(mapping: "dossierConfigFichier", fileNameProperty: "logo", size: "imageSize")]
    private $imageFile;

    #[ORM\Column(type: "string", length: 255, nullable: true)]
    private $logo;

    #[ORM\Column(type: "integer", nullable: true)]
    private $imageSize;

    #[ORM\Column(type: "datetime", nullable: true)]
    private $updatedAt;

    #[ORM\Column(type: "string", length: 255, nullable: true)]
    private $email;

    #[ORM\Column(type: "string", length: 255, nullable: true)]
    private $tel2;

    #[ORM\Column(type: "string", length: 255, nullable: true)]
    private $fax;

    #[ORM\Column(type: "string", length: 255, nullable: true)]
    private $site;

    #[ORM\Column(type: "text", nullable: true)]
    private $siege;

    #[ORM\Column(type: "string", length: 255, nullable: true)]
    private $compteBancaire;

    #[ORM\Column(type: "string", length: 255, nullable: true)]
    private $libelleCompte;

    #[ORM\Column(type: "string", length: 255, nullable: true)]
    private $rib;



    #[ORM\ManyToOne(targetEntity: "App\Entity\Font", fetch: "EAGER")]
    #[ORM\JoinColumn(referencedColumnName: "id")]
    private $font;

    #[ORM\ManyToOne(targetEntity: "App\Entity\PacParam")]
    #[ORM\JoinColumn(referencedColumnName: "id")]
    private $pacParam;

    #[ORM\ManyToOne(targetEntity: "App\Entity\PDossierOrganisation", inversedBy: "dossiers")]
    private $organisation;

    #[ORM\Column(type: "integer", nullable: true)]
    private $parentId;

    #[ORM\Column(name: "image_id", type: "integer", nullable: true)]
    private $image;

    #[ORM\Column(name: "is_entreprise", type: "integer", nullable: true)]
    private $isEntreprise;

    #[ORM\OneToMany(targetEntity: "App\Entity\Udepot", mappedBy: "dossier")]
    private $udepots;

    #[ORM\OneToOne(targetEntity: "App\Entity\UPPartenaire", mappedBy: "dossier")]
    private $partenaire;

    #[ORM\Column(name: "width_logo", type: "string", length: 255, nullable: true)]
    private $width_logo;

    #[ORM\Column(name: "height_logo", type: "string", length: 255, nullable: true)]
    private $height_logo;

    #[ORM\Column(type: "string", length: 255, nullable: true)]
    private $role_STK;

    #[ORM\Column(type: "string", name: "cce_0_libelle", length: 255, nullable: true)]
    private $cce0Libelle;

    #[ORM\Column(type: "string", name: "cce_0", length: 255, nullable: true)]
    private $cce0;

    #[ORM\Column(type: "string", name: "fcy_0_libelle", length: 255, nullable: true)]
    private $fcy0Libelle;

    #[ORM\Column(type: "string", name: "fcy_0", length: 255, nullable: true)]
    private $fcy0;

    #[ORM\Column(type: "string", name: "cpy_0", length: 255, nullable: true)]
    private $cpy0;

    #[ORM\Column(type: "string", name: "cpy_0_libelle", length: 255, nullable: true)]
    private $cpy0Libelle;

    #[ORM\OneToMany(targetEntity: "App\Entity\DemandStockCab", mappedBy: "demandeur")]
    private $demandStockCabs;

    #[ORM\ManyToMany(targetEntity: "App\Entity\PCompteBanque", mappedBy: "DossierC")]
    private $pCompteBanques;

    #[ORM\OneToMany(targetEntity: "App\Entity\PCompteBanque", mappedBy: "dossier")]
    private $compteBanques;

    #[ORM\OneToMany(targetEntity: "App\Entity\PCompteBanqueCaisse", mappedBy: "dossier")]
    private $compteBanqueCaisses;

    #[ORM\OneToMany(targetEntity: "App\Entity\UGeneralOperation", mappedBy: "dossierTrt")]
    private $uGeneralOperations;

    #[ORM\Column(name: "plan_comptable", type: "string", length: 255)]
    private $planComptable;

    #[ORM\Column(name: "can_create", type: "integer")]
    private $canCreate;

    #[ORM\Column(type: "string", length: 255, nullable: true)]
    private $type;

    #[ORM\OneToMany(targetEntity: "ConventionGlobal", mappedBy: "pDossier")]
    private $conventionGlobals;


    public function getPrefix(): ?string {
        return $this->prefix;
    }

    public function setPrefix(string $prefix): self {
        $this->prefix = $prefix;

        return $this;
    }

    public function getTitre(): ?string {
        return $this->titre;
    }

    public function setTitre(?string $titre): self {
        $this->titre = $titre;

        return $this;
    }



    /**
     * @return Collection|UaTFacturefrscab[]
     */
    public function getUaTFacturefrscabs(): Collection {
        return $this->uaTFacturefrscabs;
    }

    public function addUaTFacturefrscab(UaTFacturefrscab $uaTFacturefrscab): self {
        if (!$this->uaTFacturefrscabs->contains($uaTFacturefrscab)) {
            $this->uaTFacturefrscabs[] = $uaTFacturefrscab;
            $uaTFacturefrscab->setDossier($this);
        }

        return $this;
    }

    public function removeUaTFacturefrscab(UaTFacturefrscab $uaTFacturefrscab): self {
        if ($this->uaTFacturefrscabs->contains($uaTFacturefrscab)) {
            $this->uaTFacturefrscabs->removeElement($uaTFacturefrscab);
            // set the owning side to null (unless already changed)
            if ($uaTFacturefrscab->getDossier() === $this) {
                $uaTFacturefrscab->setDossier(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|UaTFacturefrscab[]
     */
    public function getYes(): Collection {
        return $this->yes;
    }

    public function addYe(UaTFacturefrscab $ye): self {
        if (!$this->yes->contains($ye)) {
            $this->yes[] = $ye;
            $ye->setPourcompte($this);
        }

        return $this;
    }

    public function removeYe(UaTFacturefrscab $ye): self {
        if ($this->yes->contains($ye)) {
            $this->yes->removeElement($ye);
            // set the owning side to null (unless already changed)
            if ($ye->getPourcompte() === $this) {
                $ye->setPourcompte(null);
            }
        }

        return $this;
    }

    public function __toString() {
        return $this->nomDossier;
    }

    public function getIcon(): ?string {
        return $this->icon;
    }

    public function setIcon(?string $icon): self {
        $this->icon = $icon;

        return $this;
    }

    public function getRole_STK(): ?string {
        return $this->role_STK;
    }

    public function setRole_STK(?string $role_STK): self {
        $this->role_STK = $role_STK;

        return $this;
    }
    public function getType(): ?string {
        return $this->type;
    }

    public function setType(?string $type): self {
        $this->type = $type;

        return $this;
    }


    public function getUgouv(): ?int {
        return $this->ugouv;
    }

    public function setUgouv(?int $ugouv): self {
        $this->ugouv = $ugouv;

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

    public function getCnss(): ?string
    {
        return $this->cnss;
    }

    public function setCnss(?string $cnss): self
    {
        $this->cnss = $cnss;

        return $this;
    }





    public function getOriginalName(): ?string
    {
        return $this->originalName;
    }

    public function setOriginalName(?string $originalName): self
    {
        $this->originalName = $originalName;

        return $this;
    }

    public function getMimeType(): ?string
    {
        return $this->mimeType;
    }

    public function setMimeType(?string $mimeType): self
    {
        $this->mimeType = $mimeType;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * @return Collection|UPProjet[]
     */
    public function getProjets(): Collection
    {
        return $this->projets;
    }

    public function addProjet(UPProjet $projet): self
    {
        if (!$this->projets->contains($projet)) {
            $this->projets[] = $projet;
            $projet->addDossier($this);
        }

        return $this;
    }

    public function removeProjet(UPProjet $projet): self
    {
        if ($this->projets->contains($projet)) {
            $this->projets->removeElement($projet);
            $projet->removeDossier($this);
        }

        return $this;
    }

    /**
     * @return Collection|PMarche[]
     */
    public function getMarches(): Collection
    {
        return $this->marches;
    }

    public function addMarch(PMarche $march): self
    {
        if (!$this->marches->contains($march)) {
            $this->marches[] = $march;
            $march->addDossier($this);
        }

        return $this;
    }

    public function removeMarch(PMarche $march): self
    {
        if ($this->marches->contains($march)) {
            $this->marches->removeElement($march);
            $march->removeDossier($this);
        }

        return $this;
    }

    public function getAbreviation2(): ?string
    {
        return $this->abreviation2;
    }

    public function setAbreviation2(?string $abreviation2): self
    {
        $this->abreviation2 = $abreviation2;

        return $this;
    }

    /**
     * @return Collection|UsModule[]
     */
    public function getModulesDossiers(): Collection
    {
        return $this->ModulesDossiers;
    }

    public function addModulesDossier(UsModule $modulesDossier): self
    {
        if (!$this->ModulesDossiers->contains($modulesDossier)) {
            $this->ModulesDossiers[] = $modulesDossier;
        }

        return $this;
    }

    public function removeModulesDossier(UsModule $modulesDossier): self
    {
        if ($this->ModulesDossiers->contains($modulesDossier)) {
            $this->ModulesDossiers->removeElement($modulesDossier);
        }

        return $this;
    }

    public function getOrdr(): ?int
    {
        return $this->ordr;
    }

    public function setOrdr(?int $ordr): self
    {
        $this->ordr = $ordr;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

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

    public function getFax(): ?string
    {
        return $this->fax;
    }

    public function setFax(?string $fax): self
    {
        $this->fax = $fax;

        return $this;
    }

    public function getSite(): ?string
    {
        return $this->site;
    }

    public function setSite(?string $site): self
    {
        $this->site = $site;

        return $this;
    }

    public function getSiege(): ?string
    {
        return $this->siege;
    }

    public function setSiege(?string $siege): self
    {
        $this->siege = $siege;

        return $this;
    }

    public function getFont(): ?Font
    {
        return $this->font;
    }

    public function setFont(?Font $font): self
    {
        $this->font = $font;

        return $this;
    }

    public function getCompteBancaire(): ?string
    {
        return $this->compteBancaire;
    }

    public function setCompteBancaire(?string $compteBancaire): self
    {
        $this->compteBancaire = $compteBancaire;

        return $this;
    }

    public function getLibelleCompte(): ?string
    {
        return $this->libelleCompte;
    }

    public function setLibelleCompte(?string $libelleCompte): self
    {
        $this->libelleCompte = $libelleCompte;

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

    public function getPacParam(): ?PacParam
    {
        return $this->pacParam;
    }

    public function setPacParam(?PacParam $pacParam): self
    {
        $this->pacParam = $pacParam;

        return $this;
    }

    public function getOrganisation(): ?pDossierOrganisation
    {
        return $this->organisation;
    }

    public function setOrganisation(?pDossierOrganisation $organisation): self
    {
        $this->organisation = $organisation;

        return $this;
    }

    public function getParentId(): ?int
    {
        return $this->parentId;
    }

    public function setParentId(?int $parentId): self
    {
        $this->parentId = $parentId;

        return $this;
    }
    public function getIsEntreprise(): ?int
    {
        return $this->isEntreprise;
    }

    public function setIsEntreprise(?int $isEntreprise): self
    {
        $this->isEntreprise = $isEntreprise;

        return $this;
    }
    public function getImage(): ?int
    {
        return $this->image;
    }

    public function setImage(?int $image): self
    {
        $this->image = $image;

        return $this;
    }





    /**
     * @return Collection|Udepot[]|null
     */
    public function getUdepots(): ?Collection
    {
        return $this->udepots;
    }

    public function addUdepot(Udepot $udepot): self
    {
        if (!$this->udepots->contains($udepot)) {
            $this->udepots[] = $udepot;
            $udepot->setDossier($this);
        }

        return $this;
    }

    public function removeUdepot(Udepot $udepot): self
    {
        if ($this->udepots->contains($udepot)) {
            $this->udepots->removeElement($udepot);
            // set the owning side to null (unless already changed)
            if ($udepots->getDossier() === $this) {
                $udepots->setDossier(null);
            }
        }

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
            $demandStockCab->setDemandeur($this);
        }

        return $this;
    }

    public function removeDemandStockCab(DemandStockCab $demandStockCab): self
    {
        if ($this->demandStockCabs->removeElement($demandStockCab)) {
            // set the owning side to null (unless already changed)
            if ($demandStockCab->getDemandeur() === $this) {
                $demandStockCab->setDemandeur(null);
            }
        }

        return $this;
    }



     /**
     * @return Collection|PCompteBanque[]
     */
    public function getPCompteBanques(): Collection
    {
        return $this->pCompteBanques;
    }

    public function addPCompteBanque(PCompteBanque $pCompteBanque): self
    {
        if (!$this->pCompteBanques->contains($pCompteBanque)) {
            $this->pCompteBanques[] = $pCompteBanque;
            $pCompteBanque->addDossierC($this);
        }

        return $this;
    }

    public function removePCompteBanque(PCompteBanque $pCompteBanque): self
    {
        if ($this->pCompteBanques->removeElement($pCompteBanque)) {
            $pCompteBanque->removeDossierC($this);
        }

        return $this;
    }
     /**
     * @return Collection|PCompteBanque[]
     */
    public function getCompteBanques(): Collection
    {
        return $this->compteBanques;
    }

    public function addCompteBanques(PCompteBanque $compteBanque): self
    {
        if (!$this->compteBanques->contains($compteBanque)) {
            $this->compteBanques[] = $compteBanque;
            $compteBanque->setDossier($this);
        }

        return $this;
    }

    public function removeCompteBanques(PCompteBanque $compteBanque): self
    {
        if ($this->compteBanques->removeElement($compteBanque)) {
            if ($compteBanque->getDossier() === $this) {
                $compteBanque->setDossier(null);
            }
        }

        return $this;
    }
    
    
    /**
     * @return Collection|PCompteBanqueCaisse[]
    */
    public function getCompteBanqueCaisses(): Collection
    {
        return $this->compteBanqueCaisses;
    }

    public function addCompteBanqueCaisses(PCompteBanqueCaisse $compteBanqueCaisses): self
    {
        if (!$this->compteBanqueCaisses->contains($compteBanqueCaisses)) {
            $this->compteBanqueCaisses[] = $compteBanqueCaisses;
            $compteBanqueCaisses->setDossierTrt($this);

        }

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
            $uGeneralOperation->setDossierTrt($this);
        }

        return $this;
    }

    public function removeUGeneralOperation(UGeneralOperation $uGeneralOperation): self
    {
        if ($this->uGeneralOperations->removeElement($uGeneralOperation)) {
            // set the owning side to null (unless already changed)
            if ($uGeneralOperation->getDossierTrt() === $this) {
                $uGeneralOperation->setDossierTrt(null);
            }
        }

        return $this;
    }
    
    
    public function getPlanComptable(): ?string
    {
        return $this->planComptable;
    }
    public function setPlanComptable(?string $planComptable)
    {
        $this->planComptable = $planComptable;
        return $this;
    }
    public function getCanCreate(): ?int
    {
        return $this->canCreate;
    }
    public function setCanCreate(?int $canCreate)
    {
        $this->canCreate = $canCreate;
        return $this;
    }



}
