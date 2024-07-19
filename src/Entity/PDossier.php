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

/**
 * PDossier
 * @Vich\Uploadable
 *
 */
#[ORM\Table(name: 'p_dossier')]
#[UniqueEntity('code')]
#[UniqueEntity('prefix')]
#[UniqueEntity('abreviation')]
#[UniqueEntity('abreviation2')]
#[ORM\Entity(repositoryClass: \App\Repository\PDossierRepository::class)]
#[ORM\HasLifecycleCallbacks]
class PDossier {

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'code', type: 'string', length: 20, nullable: true)]
    private $code;

    /**
     * @var string|null
     *
     */
    #[Assert\NotBlank]
    #[ORM\Column(name: 'abreviation', type: 'string', length: 12, nullable: true, unique: true)]
    private $abreviation;
    
    
     /**
     * @var string|null
     *
     */
    #[Assert\NotBlank]
    #[ORM\Column(name: 'abreviation2', type: 'string', length: 100, nullable: true, unique: true)]
    private $abreviation2;

    /**
     * @var string
     */
    #[Assert\NotBlank]
    #[ORM\Column(name: 'nom_dossier', type: 'string', length: 255, nullable: true)]
    private $nomDossier;

    /**
     * @var string
     *
     *
     */
    #[ORM\Column(name: 'description', type: 'text', nullable: true)]
    #[Assert\NotBlank]
    private $description;

    /**
     * @var string
     */
    #[ORM\Column(name: 'utilisateur', type: 'string', length: 255, nullable: true)]
    private $utilisateur;

    /**
     * @var \DateTime
     */
    #[ORM\Column(name: 'datecreation', type: 'datetime', nullable: true)]
    private $datecreation;

  
    /**
     * @var string|null
     */
    #[ORM\Column(name: 'adresse', type: 'text', nullable: true)]
    private $adresse;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'tel', type: 'string', length: 20, nullable: true)]
    private $tel;

    /**
     * @var int|null
     */
    #[ORM\Column(name: 'active', type: 'boolean', nullable: true)]
    private $active;
    /**
     * @var int|null
     */
    #[ORM\Column(name: 'externe', type: 'boolean', nullable: true)]
    private $externe;

 

    
    #[Assert\Length(min: 2, max: 20, minMessage: 'Vous devez ajouter plus que {{ limit }} caractères.', maxMessage: 'Vous ne devez pas dépasser {{ limit }} caractères.')]
    #[Assert\NotBlank]
    #[ORM\Column(type: 'string', length: 100, unique: true)]
    private $prefix;

    
    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    #[Assert\NotBlank]
    private $titre;

    #[ORM\OneToMany(targetEntity: \App\Entity\UaTFacturefrscab::class, mappedBy: 'dossier')]
    private $uaTFacturefrscabs;

    #[ORM\OneToMany(targetEntity: \App\Entity\UaTFacturefrscab::class, mappedBy: 'pourcompte')]
    private $yes;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $icon;

    #[ORM\Column(type: 'smallint', nullable: true)]
    private $ugouv;

    

    
    #[ORM\Column(type: 'string', length: 100, nullable: true)]
    private $iff;

    #[ORM\Column(type: 'string', length: 100, nullable: true)]
    private $rc;

    #[ORM\Column(type: 'string', length: 100, nullable: true)]
    private $ice;

    #[ORM\Column(type: 'string', length: 100, nullable: true)]
    private $patente;
    
    
    
    #[ORM\Column(type: 'string', length: 100, nullable: true)]
    private $cnss;
    
    

        
    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $originalName;
    
    
    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $mimeType;

    /**
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     * 
     * 

     *
     * 
     * @Vich\UploadableField(mapping="dossierConfigFichier", fileNameProperty="logo", size="imageSize")
     * 
     * @var File
     */
    private $imageFile;

    /**
     * @var string
     */
    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $logo;

    /**
     * @var integer
     */
    #[ORM\Column(type: 'integer', nullable: true)]
    private $imageSize;

    /**
     * @var \DateTime
     */
    #[ORM\Column(type: 'datetime', nullable: true)]
    private $updatedAt;

    #[ORM\ManyToMany(targetEntity: \App\Entity\UPProjet::class, mappedBy: 'dossiers')]
    private $projets;

    #[ORM\ManyToMany(targetEntity: \App\Entity\PMarche::class, mappedBy: 'dossiers')]
    private $marches;
    
    #[ORM\JoinTable(name: 'us_modules_dossiers')]
    #[ORM\ManyToMany(targetEntity: \App\Entity\UsModule::class, cascade: ['persist'])]
    private $ModulesDossiers;
    
     #[ORM\Column(type: 'integer', nullable: true)]
    private $ordr;


    /**
     * @var string
     */
    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $email;
    /**
     * @var string
     */
    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $tel2;
    /**
     * @var string
     */
    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $fax;

    /**
     * @var string
     */
    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $site;
    /**
     * @var string
     */
    #[ORM\Column(type: 'text', nullable: true)]
    private $siege;
    
    
    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $compteBancaire;  
    
    
     #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $libelleCompte;
    
    /**
     * @var string
     */
    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $rib;
    
    


    #[ORM\JoinColumn(referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \App\Entity\Font::class, fetch: 'EAGER')]
    private $font;
    
    
    
     #[ORM\JoinColumn(referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \App\Entity\PacParam::class)]
    private $pacParam;

    #[ORM\ManyToOne(targetEntity: \App\Entity\PDossierOrganisation::class, inversedBy: 'dossiers')]
    private $organisation;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $parentId;

    #[ORM\Column(name: 'image_id', type: 'integer', nullable: true)]
    private $image;
    #[ORM\Column(name: 'is_entreprise', type: 'integer', nullable: true)]
    private $isEntreprise;

    
    #[ORM\OneToMany(targetEntity: \App\Entity\Udepot::class, mappedBy: 'dossier')]
    private $udepots;

    
    #[ORM\OneToOne(targetEntity: \App\Entity\UPPartenaire::class, mappedBy: 'dossier')]
    private $partenaire;

    /**
     * @var string
     */
    #[ORM\Column(name: 'width_logo', type: 'string', length: 255, nullable: true)]
    private $width_logo;

    /**
     * @var string
     */
    #[ORM\Column(name: 'height_logo', type: 'string', length: 255, nullable: true)]
    private $height_logo;
    
    /**
     * @var string
     */
    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $role_STK;
    /**
     * @var string
     */
    #[ORM\Column(type: 'string', name: 'cce_0_libelle', length: 255, nullable: true)]
    private $cce0Libelle;
    /**
     * @var string
     */
    #[ORM\Column(type: 'string', name: 'cce_0', length: 255, nullable: true)]
    private $cce0;
    /**
     * @var string
     */
    #[ORM\Column(type: 'string', name: 'fcy_0_libelle', length: 255, nullable: true)]
    private $fcy0Libelle;
    
    /**
     * @var string
     */
    #[ORM\Column(type: 'string', name: 'fcy_0', length: 255, nullable: true)]
    private $fcy0;
    /**
     * @var string
     */
    #[ORM\Column(type: 'string', name: 'cpy_0', length: 255, nullable: true)]
    private $cpy0;
    /**
     * @var string
     */
    #[ORM\Column(type: 'string', name: 'cpy_0_libelle', length: 255, nullable: true)]
    private $cpy0Libelle;

    #[ORM\OneToMany(targetEntity: DemandStockCab::class, mappedBy: 'demandeur')]
    private $demandStockCabs;
    

    #[ORM\ManyToMany(targetEntity: PCompteBanque::class, mappedBy: 'DossierC')]
    private $pCompteBanques;
    #[ORM\OneToMany(targetEntity: PCompteBanque::class, mappedBy: 'dossier')]
    private $compteBanques;
    #[ORM\OneToMany(targetEntity: PCompteBanqueCaisse::class, mappedBy: 'dossier')]
    private $compteBanqueCaisses;



    #[ORM\OneToMany(targetEntity: UGeneralOperation::class, mappedBy: 'dossierTrt')]
    private $uGeneralOperations;

    /**
     * @var integer
     *
     *
     */
    #[ORM\Column(name: 'plan_comptable', type: 'string', length: 255)]
    private $planComptable;
    /**
     * @var integer
     *
     *
     */
    #[ORM\Column(name: 'can_create', type: 'integer')]
    private $canCreate;
    /**
     * @var string
     */
    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $type;
    
     #[ORM\OneToMany(targetEntity: \ConventionGlobal::class, mappedBy: 'pDossier')]
    private $conventionGlobals;


    public function setHeightLogo(?string $height_logo): void {
        $this->height_logo = $height_logo;
    }

    public function getHeightLogo(): ?string {
        return $this->height_logo;
    }

    public function setWidthLogo(?string $width_logo): void {
        $this->width_logo = $width_logo;
    }

    public function getWidthLogo(): ?string {
        return $this->width_logo;
    }



    public function getPartenaire(): ?UPPartenaire
    {
        return $this->partenaire;
    }

   



    public function setPartenaire(?UPPartenaire $partenaire): self
    {
        $this->partenaire = $partenaire;

        // set (or unset) the owning side of the relation if necessary
        $newPartenaire = null === $partenaire ? null : $this;
        if ($partenaire->getPartenaire() !== $newPartenaire) {
            $partenaire->SetPartenaire($newPartenaire);
        }

        return $this;
    }

 

    /**
     * If manually uploading a file (i.e. not using Symfony Form) ensure an instance
     * of 'UploadedFile' is injected into this setter to trigger the update. If this
     * bundle's configuration parameter 'inject_on_load' is set to 'true' this setter
     * must be able to accept an instance of 'File' as the bundle will inject one here
     * during Doctrine hydration.
     *
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile $imageFile
     */
    public function setImageFile(?File $imageFile = null): void {
        $this->imageFile = $imageFile;

        if (null !== $imageFile) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt = new \DateTimeImmutable();
        }
    }

    public function getImageFile(): ?File {
        return $this->imageFile;
    }

    public function setLogo(?string $logo): void {
        $this->logo = $logo;
    }

    public function getLogo(): ?string {
        return $this->logo;
    }

    public function setImageSize(?int $imageSize): void {
        $this->imageSize = $imageSize;
    }

    public function getImageSize(): ?int {
        return $this->imageSize;
    }
    

    public function __construct() {
        $this->uaTFacturefrscabs = new ArrayCollection();
        $this->yes = new ArrayCollection();
        $this->conventionGlobals = new ArrayCollection();

        $this->projets = new ArrayCollection();
        $this->marches = new ArrayCollection();
        $this->ModulesDossiers = new ArrayCollection();
        $this->depots = new ArrayCollection();
        $this->demandStockCabs = new ArrayCollection();
        $this->pCompteBanques = new ArrayCollection();
        $this->compteBanques = new ArrayCollection();
        $this->compteBanqueCaisses = new ArrayCollection();
        $this->uGeneralOperations = new ArrayCollection();
    }

    public function getId(): ?int {
        return $this->id;
    }

       /**
     * @return Collection|ConventionGlobal[]
     */
    public function getConventionGlobals(): Collection
    {
        return $this->conventionGlobals;
    }
    
    public function getCode(): ?string {
        return $this->code;
    }
    public function getCCe0(): ?string {
        return $this->cce0;
    }

    public function setCode(?string $code): self {
        $this->code = $code;

        return $this;
    }

    public function getAbreviation(): ?string {
        return $this->abreviation;
    }

    public function setAbreviation(?string $abreviation): self {
        $this->abreviation = $abreviation;

        return $this;
    }

    public function getNomDossier(): ?string {
        return $this->nomDossier;
    }

    public function setNomDossier(string $nomDossier): self {
        $this->nomDossier = $nomDossier;

        return $this;
    }

    public function getDescription(): ?string {
        return $this->description;
    }

    public function setDescription(string $description): self {
        $this->description = $description;

        return $this;
    }

    public function getUtilisateur(): ?string {
        return $this->utilisateur;
    }

    public function setUtilisateur(?string $utilisateur): self {
        $this->utilisateur = $utilisateur;

        return $this;
    }

    public function getDatecreation(): ?\DateTimeInterface {
        return $this->datecreation;
    }

    public function setDatecreation(?\DateTimeInterface $datecreation): self {
        $this->datecreation = $datecreation;

        return $this;
    }

  

    public function getAdresse(): ?string {
        return $this->adresse;
    }

    public function setAdresse(?string $adresse): self {
        $this->adresse = $adresse;

        return $this;
    }

    public function getTel(): ?string {
        return $this->tel;
    }

    public function setTel(?string $tel): self {
        $this->tel = $tel;

        return $this;
    }

    public function getActive(): ?bool {
        return $this->active;
    }

    public function setActive(?bool $active): self {
        $this->active = $active;

        return $this;
    }
    public function getExterne(): ?bool {
        return $this->externe;
    }

    public function setExterne(?bool $externe): self {
        $this->externe = $externe;

        return $this;
    }

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
