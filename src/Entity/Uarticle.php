<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @Vich\Uploadable
 *
 */
#[ORM\Entity(repositoryClass: \App\Repository\UarticleRepository::class)]
#[ORM\HasLifecycleCallbacks]
#[UniqueEntity('code')]
class Uarticle {

    #[ORM\Id]
    #[ORM\Column(type: 'integer')]
    private $id;
     
    #[ORM\ManyToOne(targetEntity: \App\Entity\PNomenclatureStandard::class)]
    private $nomenclatureStandard;
    
    #[ORM\JoinColumn(name: 'famille', nullable: false)]
    #[ORM\ManyToOne(targetEntity: \App\Entity\Ufamille::class, inversedBy: 'uarticles')]
    private $ufamille;
    
     #[ORM\JoinColumn(name: 'niveau_id', nullable: true)]
    #[ORM\ManyToOne(targetEntity: \App\Entity\PArticleNiveau::class, inversedBy: 'articles')]
    private $niveau;

    #[Assert\NotBlank]
    #[Assert\Length(min: 2, max: 50)]
    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $code;
    
    #[ORM\Column(type: 'string', length: 50, nullable: true)]
    private $rayounnage;
    #[ORM\Column(type: 'integer', length: 255, nullable: true)]
    private $partenaire;
    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $image;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $codeArticleFournisseur;

    #[Assert\NotBlank]
    #[ORM\Column(type: 'text', nullable: true)]
    private $titre;

    #[ORM\Column(type: 'boolean', nullable: true)]
    private $etatVente;

    #[ORM\Column(type: 'boolean', nullable: true)]
    private $etatAchat;

    #[ORM\Column(type: 'text', nullable: true)]
    private $description;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $url;

    #[Assert\NotBlank]
    #[ORM\ManyToOne(targetEntity: \App\Entity\Udepot::class, inversedBy: 'uarticles')]
    private $depot;

    #[Assert\Positive]
    #[ORM\Column(type: 'float', length: 255, nullable: true)]
    private $stockBase;

    #[Assert\Positive]
    #[ORM\Column(type: 'float', length: 255, nullable: true)]
    private $poid;

    #[ORM\JoinColumn(name: 'p_unite_poid_id', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \App\Entity\PUnite::class)]
    private $poidUnite;

    #[Assert\Positive]
    #[ORM\Column(type: 'float', length: 255, nullable: true)]
    private $longeur;

    #[Assert\Positive]
    #[ORM\Column(type: 'float', length: 255, nullable: true)]
    private $largeur;

    #[Assert\Positive]
    #[ORM\Column(type: 'float', length: 255, nullable: true)]
    private $hauteur;

    #[Assert\Positive]
    #[ORM\Column(type: 'float', length: 255, nullable: true)]
    private $surface;

    #[Assert\Positive]
    #[ORM\Column(type: 'float', length: 255, nullable: true)]
    private $volume;

    #[ORM\Column(type: 'float', nullable: true)]
    private $prixVente = 0;

    #[ORM\Column(type: 'float', nullable: true)]
    private $prixVenteMin = 0;
    
    #[ORM\Column(type: 'float', nullable: true)]
    private $prixVenteMax = 0;
    
    #[ORM\Column(type: 'float', nullable: true)]
    private $prixVenteMoyenne = 0;
    
    #[ORM\Column(type: 'float', nullable: true)]
    private $prixAchat = 0;
    
    #[ORM\Column(type: 'float', nullable: true)]
    private $prixAchatMin = 0;
    
    #[ORM\Column(type: 'float', nullable: true)]
    private $prixAchatMax = 0;
    
    #[ORM\Column(type: 'float', nullable: true)]
    private $prixAchatMoyenne = 0;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $codeComptableVente;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $codeComptableVenteExport;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $codeComptableAchat;

    #[ORM\Column(type: 'boolean', nullable: true)]
    private $active;

    /**
     *  * @Assert\NotBlank
     */
    #[ORM\JoinColumn(name: 'p_unite_default_id', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \App\Entity\PUnite::class)]
    private $defaultUnite;

    #[ORM\JoinColumn(name: 'p_unite_lang_larg_haut_id', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \App\Entity\PUnite::class)]
    private $longLargHautUnite;

    #[ORM\JoinColumn(name: 'p_unite_surface_id', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \App\Entity\PUnite::class)]
    private $surfaceUnite;

    #[ORM\JoinColumn(name: 'p_unite_volume_id', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \App\Entity\PUnite::class)]
    private $volumeUnite;

    #[ORM\ManyToOne(targetEntity: \App\Entity\ParticleNature::class)]
    private $nature;

    #[ORM\Column(name: 'autre_information', type: 'text', nullable: true)]
    private $autreInformation;

    #[ORM\Column(name: 'description_detail', type: 'text', nullable: true)]
    private $descriptionDetail;

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

    #[ORM\OneToMany(targetEntity: \App\Entity\UarticlePrix::class, mappedBy: 'article')]
    private $uarticlePrixes;

    #[ORM\OneToMany(targetEntity: \App\Entity\UmouvementStock::class, mappedBy: 'article')]
    private $umouvementStocks;

    #[ORM\Column(type: 'boolean', nullable: true)]
    private $gererEnStock;

    #[ORM\Column(type: 'boolean', nullable: true)]
    private $verificationStock;

    #[ORM\Column(type: 'string', length: 200, nullable: true)]
    private $codeBarre;

    #[Assert\Range(min: 0, max: 100)]
    #[ORM\Column(type: 'integer', nullable: true)]
    private $tva = 20;

    #[ORM\JoinTable(name: 'u_articles_categories')]
    #[Assert\Count(min: '1', minMessage: 'Cette valeur ne doit pas être vide.')]
    #[ORM\ManyToMany(targetEntity: \App\Entity\Ucategory::class, inversedBy: 'articles')]
    private $categories;

    #[ORM\JoinColumn(nullable: true)]
    #[ORM\ManyToOne(targetEntity: \App\Entity\PArticleNiveau::class, inversedBy: 'uarticles1')]
    private $niveau1;

    #[ORM\JoinColumn(nullable: true)]
    #[ORM\ManyToOne(targetEntity: \App\Entity\PArticleNiveau::class, inversedBy: 'uarticles2')]
    private $niveau2;

    #[ORM\JoinColumn(nullable: true)]
    #[ORM\ManyToOne(targetEntity: \App\Entity\PArticleNiveau::class, inversedBy: 'uarticles3')]
    private $niveau3;

    #[ORM\JoinColumn(nullable: true)]
    #[ORM\ManyToOne(targetEntity: \App\Entity\PArticleNiveau::class, inversedBy: 'uarticles4')]
    private $niveau4;   
    
    #[ORM\ManyToOne(targetEntity: \App\Entity\PForme::class)]
    private $forme;
    
     #[ORM\ManyToOne(targetEntity: \App\Entity\PPresentation::class)]
    private $presentation;
    
    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $codeEan13;
    
      #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $categorie;
    
    
    
    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $dci;
    
    
    
    
    
    
    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $niveau5;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $taille;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $conditionnement;



     #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $marque;



      #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $matiere;

     #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $niveau6;
     #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $niveau7;
     #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $niveau8;

    #[ORM\Column(type: 'string', length: 255, name: 'M_A', nullable: true)]
    private $MA;

      #[ORM\Column(type: 'string', length: 255, name: 'A_V', nullable: true)]
    private $AV;

     #[ORM\Column(type: 'string', length: 255, name: 'A_I', nullable: true)]
    private $AI;

    #[ORM\Column(type: 'string', length: 255, name: 'S_NS', nullable: true)]
    private $SNS;

    
    #[ORM\Column(type: 'float', name: 'REF_INTERNE', nullable: true)]
    private $refintern;


        #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $oldSys;

  
    #[Assert\Range(min: 0, max: 100)]
    #[ORM\Column(type: 'integer', nullable: true)]
    private $remise= 0;

    #[ORM\ManyToOne(targetEntity: \App\Entity\PGroupeArticle::class, inversedBy: 'articles')]
    private $groupeArticle;

    #[ORM\Column(type: 'float', nullable: true)]
    private $prixReference=0;


     #[ORM\OneToMany(targetEntity: \App\Entity\UarticleFichier::class, cascade: ['persist', 'remove'], mappedBy: 'article')]
    private $fichiers;


    #[ORM\OneToMany(targetEntity: DemandeStockDet::class, mappedBy: 'uarticle')]
    private $demandeStockDets;

     #[ORM\OneToMany(targetEntity: \App\Entity\PMarcheDet::class, mappedBy: 'article')]
    private $pMarcheDets;


    #[ORM\OneToMany(targetEntity: \App\Entity\ArticleInfo::class, mappedBy: 'article')]
    private $articleInfos;


    #[ORM\OneToMany(targetEntity: \App\Entity\UaTLotDet::class, mappedBy: 'article')]
    private $uaTLotDets;

    #[ORM\OneToMany(targetEntity: \App\Entity\UsStockConditionnementDet::class, mappedBy: 'article')]
    private $usStockConditionnementDets;

    #[ORM\OneToMany(targetEntity: \App\Entity\UsStockConditionnementCab::class, mappedBy: 'article')]
    private $usStockConditionnementCabs;

    #[ORM\OneToMany(targetEntity: \App\Entity\StockSs::class, mappedBy: 'article')]
    private $stockSses;


       #[ORM\OneToMany(targetEntity: \ConventionGlobal::class, mappedBy: 'Uarticle')]
    private $conventionGlobals;

    #[ORM\Column(type: 'string', length: 200, nullable: true)]
    private $codeInterne;

    #[ORM\ManyToOne(targetEntity: \App\Entity\Forme::class, inversedBy: 'uarticle')]
    private $formeDa;
    #[ORM\ManyToOne(targetEntity: \App\Entity\Dosage::class, inversedBy: 'uarticles')]
    private $Dosage;

     #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $forme_art;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $dosage_art;






  

    public function getOldSys(): ?string
    {
        return $this->oldSys;
    }

    public function setOldSys(?string $oldSys): self
    {
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

    public function __construct() {

        $this->uarticlePrixes = new ArrayCollection();
        $this->umouvementStocks = new ArrayCollection();
        $this->uaTLotDets = new ArrayCollection();
        $this->fichiers = new ArrayCollection();
        $this->categories = new ArrayCollection();
        $this->demandeStockDets = new ArrayCollection();
        $this->pMarcheDets = new ArrayCollection();
        $this->articleInfos = new ArrayCollection();
        $this->usStockConditionnementDets = new ArrayCollection();
        $this->usStockConditionnementCabs = new ArrayCollection();

        $this->stockSses = new ArrayCollection();

        $this->conventionGlobals = new ArrayCollection();



    }

    

    public function getId(): ?int {
        return $this->id;
    }

    public function setId(?int $id): self {
        $this->id = $id;

        return $this;
    }
    
    
     /**
     * @return Collection|ConventionGlobal[]
     */
    public function getConventionGlobals(): Collection
    {
        return $this->conventionGlobals;
    }
    
    
    public function getTitre(): ?string {
        return $this->titre;
    }

    public function setTitre(?string $titre): self {
        $this->titre = $titre;

        return $this;
    }


    public function getTaille(): ?string {
        return $this->taille;
    }

    public function setTaille(?string $taille): self {
        $this->taille = $taille;

        return $this;
    }


    public function getMA(): ?string {
        return $this->MA;
    }

    public function setMA(?string $MA): self {
        $this->MA = $MA;

        return $this;
    }

    public function getAI(): ?string {
        return $this->AI;
    }

    public function setAI(?string $AI): self {
        $this->AI = $AI;

        return $this;
    }

    public function getAV(): ?string {
        return $this->AV;
    }

    public function setAV(?string $AV): self {
        $this->AV = $AV;

        return $this;
    }


    public function getRefInterne(): ?float {
        return $this->refintern;
    }

    public function setRefInterne(?float $refintern): self {
        $this->refintern = $refintern;

        return $this;
    }

    public function getSNS(): ?string {
        return $this->SNS;
    }

    public function setSNS(?string $SNS): self {
        $this->SNS = $SNS;

        return $this;
    }
    

    
    public function getMarque(): ?string {
        return $this->marque;
    }

    public function setMarque(?string $marque): self {
        $this->marque = $marque;

        return $this;
    }

    public function getConditionnement(): ?string {
        return $this->conditionnement;
    }

    public function setConditionnement(?string $conditionnement): self {
        $this->conditionnement = $conditionnement;

        return $this;
    }
    


    public function Matiere(): ?string {
        return $this->matiere;
    }

    public function setMatiere(?string $matiere): self {
        $this->matiere = $matiere;

        return $this;
    }



    public function getEtatVente(): ?string {
        return $this->etatVente;
    }

    public function setEtatVente(?string $etatVente): self {
        $this->etatVente = $etatVente;

        return $this;
    }

    public function getEtatAchat(): ?string {
        return $this->etatAchat;
    }

    public function setEtatAchat(?string $etatAchat): self {
        $this->etatAchat = $etatAchat;

        return $this;
    }

    public function getDescription(): ?string {
        return $this->description;
    }

    public function setDescription(?string $description): self {
        $this->description = $description;

        return $this;
    }

    public function getUrl(): ?string {
        return $this->url;
    }

    public function setUrl(?string $url): self {
        $this->url = $url;

        return $this;
    }

    public function getStockBase(): ?float {
        return $this->stockBase;
    }

    public function setStockBase(?float $stockBase): self {
        $this->stockBase = $stockBase;

        return $this;
    }

    public function getPoid(): ?float {
        return $this->poid;
    }

    public function setPoid(?float $poid): self {
        $this->poid = $poid;

        return $this;
    }

    public function getLongeur(): ?float {
        return $this->longeur;
    }

    public function setLongeur(?float $longeur): self {
        $this->longeur = $longeur;

        return $this;
    }

    public function getLargeur(): ?float {
        return $this->largeur;
    }

    public function setLargeur(?float $largeur): self {
        $this->largeur = $largeur;

        return $this;
    }

    public function getHauteur(): ?float {
        return $this->hauteur;
    }

    public function setHauteur(?float $hauteur): self {
        $this->hauteur = $hauteur;

        return $this;
    }

    public function getSurface(): ?float {
        return $this->surface;
    }

    public function setSurface(?float $surface): self {
        $this->surface = $surface;

        return $this;
    }

    public function getVolume(): ?float {
        return $this->volume;
    }

    public function setVolume(?float $volume): self {
        $this->volume = $volume;

        return $this;
    }

    public function getPrixVente(): ?float {
        return $this->prixVente;
    }

    public function setPrixVente(?float $prixVente): self {
        $this->prixVente = $prixVente;

        return $this;
    }

    public function getPrixVenteMin(): ?float {
        return $this->prixVenteMin;
    }

    public function setPrixVenteMin(?float $prixVenteMin): self {
        $this->prixVenteMin = $prixVenteMin;

        return $this;
    }
    public function getPrixVenteMax(): ?float {
        return $this->prixVenteMax;
    }

    public function setPrixVenteMax(?float $prixVenteMax): self {
        $this->prixVenteMax = $prixVenteMax;

        return $this;
    }
    public function getPrixVenteMoyenne(): ?float {
        return $this->prixAchatMoyenne;
    }

    public function setPrixVenteMoyenne(?float $prixAchatMoyenne): self {
        $this->prixAchatMoyenne = $prixAchatMoyenne;

        return $this;
    }

    public function getCodeComptableVente(): ?string {
        return $this->codeComptableVente;
    }

    public function setCodeComptableVente(?string $codeComptableVente): self {
        $this->codeComptableVente = $codeComptableVente;

        return $this;
    }

    public function getCodeComptableVenteExport(): ?string {
        return $this->codeComptableVenteExport;
    }

    public function setCodeComptableVenteExport(?string $codeComptableVenteExport): self {
        $this->codeComptableVenteExport = $codeComptableVenteExport;

        return $this;
    }

    public function getCodeComptableAchat(): ?string {
        return $this->codeComptableAchat;
    }

    public function setCodeComptableAchat(?string $codeComptableAchat): self {
        $this->codeComptableAchat = $codeComptableAchat;

        return $this;
    }

    public function getActive(): ?bool {
        return $this->active;
    }

    public function setActive(?bool $active): self {
        $this->active = $active;

        return $this;
    }

    public function getDepot(): ?Udepot {
        return $this->depot;
    }

    public function setDepot(?Udepot $depot): self {
        $this->depot = $depot;

        return $this;
    }

    public function getPoidUnite(): ?PUnite {
        return $this->poidUnite;
    }

    public function setPoidUnite(?PUnite $poidUnite): self {
        $this->poidUnite = $poidUnite;

        return $this;
    }

    public function getDefaultUnite(): ?PUnite {
        return $this->defaultUnite;
    }

    public function setDefaultUnite(?PUnite $defaultUnite): self {
        $this->defaultUnite = $defaultUnite;

        return $this;
    }

    public function getLongLargHautUnite(): ?PUnite {
        return $this->longLargHautUnite;
    }

    public function setLongLargHautUnite(?PUnite $longLargHautUnite): self {
        $this->longLargHautUnite = $longLargHautUnite;

        return $this;
    }

    public function getSurfaceUnite(): ?PUnite {
        return $this->surfaceUnite;
    }

    public function setSurfaceUnite(?PUnite $surfaceUnite): self {
        $this->surfaceUnite = $surfaceUnite;

        return $this;
    }

    public function getVolumeUnite(): ?PUnite {
        return $this->volumeUnite;
    }

    public function setVolumeUnite(?PUnite $volumeUnite): self {
        $this->volumeUnite = $volumeUnite;

        return $this;
    }

    public function getNature(): ?ParticleNature {
        return $this->nature;
    }

    public function setNature(?ParticleNature $nature): self {
        $this->nature = $nature;

        return $this;
    }

    public function getPrixAchat(): ?float {
        return $this->prixAchat;
    }

    public function setPrixAchat(?float $prixAchat): self {
        $this->prixAchat = $prixAchat;

        return $this;
    }

    public function getPrixAchatMin(): ?float {
        return $this->prixAchatMin;
    }

    public function setPrixAchatMin(?float $prixAchatMin): self {
        $this->prixAchatMin = $prixAchatMin;

        return $this;
    }
    public function getPrixAchatMax(): ?float {
        return $this->prixAchatMax;
    }

    public function setPrixAchatMax(?float $prixAchatMax): self {
        $this->prixAchatMax = $prixAchatMax;

        return $this;
    }
    public function getPrixAchatMoyenne(): ?float {
        return $this->prixAchatMoyenne;
    }

    public function setPrixAchatMoyenne(?float $prixAchatMoyenne): self {
        $this->prixAchatMoyenne = $prixAchatMoyenne;

        return $this;
    }

    public function getAutreInformation(): ?string {
        return $this->autreInformation;
    }

    public function setAutreInformation(?string $autreInformation): self {
        $this->autreInformation = $autreInformation;

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

    public function getCode(): ?string {
        return $this->code;
    }

    public function setCode(?string $code): self {
        $this->code = $code;

        return $this;
    }

    public function getRayounnage(): ?string {
        return $this->rayounnage;
    }

    public function setRayounnage(?string $rayounnage): self {
        $this->rayounnage = $rayounnage;

        return $this;
    }
    /**
     * @return Collection|UarticlePrix[]
     */
    public function getUarticlePrixes(): Collection {
        return $this->uarticlePrixes;
    }

    public function addUarticlePrix(UarticlePrix $uarticlePrix): self {
        if (!$this->uarticlePrixes->contains($uarticlePrix)) {
            $this->uarticlePrixes[] = $uarticlePrix;
            $uarticlePrix->setArticle($this);
        }

        return $this;
    }

    public function removeUarticlePrix(UarticlePrix $uarticlePrix): self {
        if ($this->uarticlePrixes->contains($uarticlePrix)) {
            $this->uarticlePrixes->removeElement($uarticlePrix);
            // set the owning side to null (unless already changed)
            if ($uarticlePrix->getArticle() === $this) {
                $uarticlePrix->setArticle(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|UmouvementStock[]
     */
    public function getUmouvementStocks(): Collection {
        return $this->umouvementStocks;
    }

    public function addUmouvementStock(UmouvementStock $umouvementStock): self {
        if (!$this->umouvementStocks->contains($umouvementStock)) {
            $this->umouvementStocks[] = $umouvementStock;
            $umouvementStock->setArticle($this);
        }

        return $this;
    }

    public function removeUmouvementStock(UmouvementStock $umouvementStock): self {
        if ($this->umouvementStocks->contains($umouvementStock)) {
            $this->umouvementStocks->removeElement($umouvementStock);
            // set the owning side to null (unless already changed)
            if ($umouvementStock->getArticle() === $this) {
                $umouvementStock->setArticle(null);
            }
        }

        return $this;
    }




    /**
     * @return Collection|UarticleFichier[]
     */
    public function getFichiers(): Collection
    {
        return $this->fichiers;
    }

    public function addFichier(UarticleFichier $fichier): self
    {
        if (!$this->fichiers->contains($fichier)) {
            $this->fichiers[] = $fichier;
            $uarticleFichier->setArticle($this);
        }

        return $this;
    }

    public function removeFichier(UarticleFichier $fichier): self
    {
        if ($this->fichiers->contains($fichier)) {
            $this->fichiers->removeElement($fichier);
            // set the owning side to null (unless already changed)
            if ($fichier->getArticle() === $this) {
                $fichier->setArticle(null);
            }
        }

        return $this;
    }

    public function getGererEnStock(): ?bool {
        return $this->gererEnStock;
    }

    public function setGererEnStock(?bool $gererEnStock): self {
        $this->gererEnStock = $gererEnStock;

        return $this;
    }

    public function getVerificationStock(): ?bool {
        return $this->verificationStock;
    }

    public function setVerificationStock(?bool $verificationStock): self {
        $this->verificationStock = $verificationStock;

        return $this;
    }

    public function getCodeBarre(): ?string {
        return $this->codeBarre;
    }

    public function setCodeBarre(?string $codeBarre): self {
        $this->codeBarre = $codeBarre;

        return $this;
    }

    public function getCodeInterne(): ?string {
        return $this->CodeInterne;
    }

    public function setCodeInterne(?string $CodeInterne): self {
        $this->CodeInterne = $CodeInterne;

        return $this;
    }

    public function getTva(): ?int {
        return $this->tva;
    }

    public function setTva(int $tva): self {
        $this->tva = $tva;

        return $this;
    }

    public function getCodeArticleFournisseur(): ?string {
        return $this->codeArticleFournisseur;
    }

    public function setCodeArticleFournisseur(?string $codeArticleFournisseur): self {
        $this->codeArticleFournisseur = $codeArticleFournisseur;

        return $this;
    }

    /**
     * @return Collection|Ucategory[]
     */
    public function getCategories(): Collection {
        return $this->categories;
    }

    public function addCategory(Ucategory $category): self {
        if (!$this->categories->contains($category)) {
            $this->categories[] = $category;
        }

        return $this;
    }

    public function removeCategory(Ucategory $category): self {
        if ($this->categories->contains($category)) {
            $this->categories->removeElement($category);
        }

        return $this;
    }

    public function getDescriptionDetail(): ?string {
        return $this->descriptionDetail;
    }

    public function setDescriptionDetail(?string $descriptionDetail): self {
        $this->descriptionDetail = $descriptionDetail;

        return $this;
    }

    public function getNiveau1(): ?PArticleNiveau
    {
        return $this->niveau1;
    }

    public function setNiveau1(?PArticleNiveau $niveau1): self
    {
        $this->niveau1 = $niveau1;

        return $this;
    }

    public function getNiveau2(): ?PArticleNiveau
    {
        return $this->niveau2;
    }

    public function setNiveau2(?PArticleNiveau $niveau2): self
    {
        $this->niveau2 = $niveau2;

        return $this;
    }

    public function getNiveau3(): ?PArticleNiveau
    {
        return $this->niveau3;
    }

    public function setNiveau3(?PArticleNiveau $niveau3): self
    {
        $this->niveau3 = $niveau3;

        return $this;
    }

    public function getNiveau4(): ?PArticleNiveau
    {
        return $this->niveau4;
    }

    public function setNiveau4(?PArticleNiveau $niveau4): self
    {
        $this->niveau4 = $niveau4;

        return $this;
    }

    public function getCodeEan13(): ?string
    {
        return $this->codeEan13;
    }

    public function setCodeEan13(?string $codeEan13): self
    {
        $this->codeEan13 = $codeEan13;

        return $this;
    }
    public function getCategorie(): ?string
    {
        return $this->categorie;
    }

    public function setCategorie(?string $categorie): self
    {
        $this->categorie = $categorie;

        return $this;
    }


    public function getDci(): ?string
    {
        return $this->dci;
    }

    public function setDci(?string $dci): self
    {
        $this->dci = $dci;

        return $this;
    }

    public function getNiveau5(): ?string
    {
        return $this->niveau5;
    }

    public function setNiveau5(?string $niveau5): self
    {
        $this->niveau5 = $niveau5;

        return $this;
    }

    public function getNiveau6(): ?string
    {
        return $this->niveau6;
    }

    public function setNiveau6(?string $niveau6): self
    {
        $this->niveau6 = $niveau6;

        return $this;
    }

    public function getNiveau7(): ?string
    {
        return $this->niveau7;
    }

    public function setNiveau7(?string $niveau7): self
    {
        $this->niveau7 = $niveau7;

        return $this;
    }

    public function getNiveau8(): ?string
    {
        return $this->niveau8;
    }

    public function setNiveau8(?string $niveau8): self
    {
        $this->niveau8 = $niveau8;

        return $this;
    }

    public function getNomenclatureStandard(): ?PNomenclatureStandard
    {
        return $this->nomenclatureStandard;
    }

    public function setNomenclatureStandard(?PNomenclatureStandard $nomenclatureStandard): self
    {
        $this->nomenclatureStandard = $nomenclatureStandard;

        return $this;
    }

    public function getForme(): ?PForme
    {
        return $this->forme;
    }

    public function setForme(?PForme $forme): self
    {
        $this->forme = $forme;

        return $this;
    }

    public function getPresentation(): ?PPresentation
    {
        return $this->presentation;
    }

    public function setPresentation(?PPresentation $presentation): self
    {
        $this->presentation = $presentation;

        return $this;
    }

    /*public function ifInitialze(){
        return $this->isInitialized() ;
    }*/
   /* public function __toString(): string
    {
        return 'bla bla';
    }*/
    public function isLoaded()
{


    // NOTE: Doctrine Associations will not be ArrayCollections. And they don't implement isInitalized so we really
    // can tell with certainty whether it's initialized or loaded. But if you join entities manually and want to check


    // NOTE: there are never any Collections that aren't ArrayCollection or PersistentCollection (and it does no good to check because they won't have isInitialized() on them anyway

    // If it's an object after the checks above, we know it's not NULL and thus it is "probably" loaded because we know it's not a Proxy, PersistentCollection or ArrayCollection
    if (is_object($this)) {
        return true;
    }
    // If it's not null, return true, otherwise false. A null regular property could return false, but it's not an Entity or Collection so indeed it is not loaded.
    return !is_null($this);
}

    public function getRemise(): ?int
    {
        return $this->remise;
    }

    public function setRemise(?int $remise): self
    {
        $this->remise = $remise;

        return $this;
    }
    public function Getpartenaire(): ?int
    {
        return $this->partenaire;
    }

    public function Setpartenaire(?int $partenaire): self
    {
        $this->partenaire = $partenaire;

        return $this;
    }

    public function getGroupeArticle(): ?PGroupeArticle
    {
        return $this->groupeArticle;
    }

    public function setGroupeArticle(?PGroupeArticle $groupeArticle): self
    {
        $this->groupeArticle = $groupeArticle;

        return $this;
    }

    public function getPrixReference(): ?float
    {
        return $this->prixReference;
    }

    public function setPrixReference(?float $prixReference): self
    {
        $this->prixReference = $prixReference;

        return $this;
    }



    /**
     * @return Collection|DemandeStockDet[]
     */
    public function getDemandeStockDets(): Collection
    {
        return $this->demandeStockDets;
    }

    public function addDemandeStockDet(DemandeStockDet $demandeStockDet): self
    {
        if (!$this->demandeStockDets->contains($demandeStockDet)) {
            $this->demandeStockDets[] = $demandeStockDet;
            $demandeStockDet->setUarticle($this);
        }

        return $this;
    }

    public function removeDemandeStockDet(DemandeStockDet $demandeStockDet): self
    {
        if ($this->demandeStockDets->removeElement($demandeStockDet)) {
            // set the owning side to null (unless already changed)
            if ($demandeStockDet->getUarticle() === $this) {
                $demandeStockDet->setUarticle(null);
            }
        }

        return $this;
    }
    public function getNiveau(): ?PArticleNiveau
    {
        return $this->niveau;
    }

    public function setNiveau(?PArticleNiveau $niveau): self
    {
        $this->niveau = $niveau;

        return $this;
    }
    
    public function getImage(): ?string {
        return $this->image;
    }

    public function setImage(?string $image): self {
        $this->image = $image;

        return $this;
    }


    /**
     * @return Collection|PMarcheDet[]
     */
    public function getPMarcheDets(): Collection
    {
        return $this->pMarcheDets;
    }

    public function addPMarcheDet(PMarcheDet $pMarcheDet): self
    {
        if (!$this->pMarcheDets->contains($pMarcheDet)) {
            $this->pMarcheDets[] = $pMarcheDet;
            $pMarcheDet->setArticle($this);
        }

        return $this;
    }

    public function removePMarcheDet(PMarcheDet $pMarcheDet): self
    {
        if ($this->pMarcheDets->contains($pMarcheDet)) {
            $this->pMarcheDets->removeElement($pMarcheDet);
            // set the owning side to null (unless already changed)
            if ($pMarcheDet->getArticle() === $this) {
                $pMarcheDet->setArticle(null);
            }
        }

        return $this;
    }



     /**
     * @return Collection|ArticleInfo[]
     */
    public function getArticleInfos(): Collection
    {
        return $this->articleInfos;
    }

    public function addArticleInfo(ArticleInfo $articleInfo): self
    {
        if (!$this->articleInfos->contains($articleInfo)) {
            $this->articleInfos[] = $articleInfo;
            $articleInfo->setArticle($this);
        }

        return $this;
    }

    public function removeArticleInfo(ArticleInfo $articleInfo): self
    {
        if ($this->articleInfos->contains($articleInfo)) {
            $this->articleInfos->removeElement($articleInfo);
            // set the owning side to null (unless already changed)
            if ($articleInfo->getArticle() === $this) {
                $articleInfo->setArticle(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|UaTLotDet[]
     */
    public function getUaTLotDets(): Collection
    {
        return $this->uaTLotDets;
    }

    public function addUaTLotDet(UaTLotDet $uaTLotDet): self
    {
        if (!$this->uaTLotDets->contains($uaTLotDet)) {
            $this->uaTLotDets[] = $uaTLotDet;
            $uaTLotDet->setArticle($this);
        }

        return $this;
    }

    public function removeUaTLotDet(UaTLotDet $uaTLotDet): self
    {
        if ($this->uaTLotDets->contains($uaTLotDet)) {
            $this->uaTLotDets->removeElement($uaTLotDet);
            // set the owning side to null (unless already changed)
            if ($uaTLotDet->getArticle() === $this) {
                $uaTLotDet->setArticle(null);
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
            $usStockConditionnementDet->setArticle($this);
        }

        return $this;
    }

    public function removeUsStockConditionnementDet(UsStockConditionnementDet $usStockConditionnementDet): self
    {
        if ($this->usStockConditionnementDets->contains($usStockConditionnementDet)) {
            $this->usStockConditionnementDets->removeElement($usStockConditionnementDet);
            // set the owning side to null (unless already changed)
            if ($usStockConditionnementDet->getArticle() === $this) {
                $usStockConditionnementDet->setArticle(null);
            }
        }

        return $this;
    }



    /**
     * @return Collection|UsStockConditionnementCab[]
     */
    public function getUsStockConditionnementCabs(): Collection
    {
        return $this->usStockConditionnementCabs;
    }

    public function addUsStockConditionnementCab(UsStockConditionnementCab $usStockConditionnementCab): self
    {
        if (!$this->usStockConditionnementCabs->contains($usStockConditionnementCab)) {
            $this->usStockConditionnementCabs[] = $usStockConditionnementCab;
            $usStockConditionnementCab->setArticle($this);
        }

        return $this;
    }

    public function removeUsStockConditionnementCab(UsStockConditionnementCab $usStockConditionnementCab): self
    {
        if ($this->usStockConditionnementCabs->contains($usStockConditionnementCab)) {
            $this->usStockConditionnementCabs->removeElement($usStockConditionnementCab);
            // set the owning side to null (unless already changed)
            if ($usStockConditionnementCab->getArticle() === $this) {
                $usStockConditionnementCab->setArticle(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|StockSs[]
     */
    public function getStockSses(): Collection
    {
        return $this->stockSses;
    }

    public function addStockSs(StockSs $stockSs): self
    {
        if (!$this->stockSses->contains($stockSs)) {
            $this->stockSses[] = $stockSs;
            $stockSs->setArticle($this);
        }

        return $this;
    }

    public function removeStockSs(StockSs $stockSs): self
    {
        if ($this->stockSses->contains($stockSs)) {
            $this->stockSses->removeElement($stockSs);
            // set the owning side to null (unless already changed)
            if ($stockSs->getArticle() === $this) {
                $stockSs->setArticle(null);
            }
        }

        return $this;
    }
    
    public function getFormeDa(): ?Forme
    {
        return $this->formeDa;
    }

    public function setFormeDa(?Forme $formeDa): self
    {
        $this->formeDa = $formeDa;

        return $this;
    }



    public function getDosage(): ?Dosage
    {
        return $this->Dosage;
    }

    public function setDosage(?Dosage $Dosage): self
    {
        $this->Dosage = $Dosage;

        return $this;
    }

    public function getFormeArt(): ?string
    {
        return $this->forme_art;
    }

    public function setFormeArt(?string $forme_art): self
    {
        $this->forme_art = $forme_art;

        return $this;
    }

    public function getDosageArt(): ?string
    {
        return $this->dosage_art;
    }

    public function setDosageArt(?string $dosage_art): self
    {
        $this->dosage_art = $dosage_art;

        return $this;
    }

    public function getUfamille(): ?Ufamille
    {
        return $this->ufamille;
    }

    public function setUfamille(?Ufamille $ufamille): self
    {
        $this->ufamille = $ufamille;

        return $this;
    }
}
