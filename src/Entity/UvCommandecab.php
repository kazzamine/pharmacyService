<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * UvCommandecab
 */
#[ORM\Table(name: 'uv_commandecab')]
#[ORM\Entity(repositoryClass: \App\Repository\UvCommandecabRepository::class)]
#[ORM\HasLifecycleCallbacks]
class UvCommandecab {
    

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'code', type: 'string', length: 100, nullable: true)]
    private $code;
    #[ORM\JoinColumn(name: 'p_piece_id', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \App\Entity\PPiece::class)]
    private $pPiece;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'description', type: 'string', length: 255, nullable: true)]
    private $description;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $nature;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $responsable;

    #[ORM\Column(name: 'datedevis', type: 'datetime', nullable: true)]
    private $dateDevis;

    #[ORM\Column(type: 'float', nullable: true)]
    private $remise;

    #[ORM\Column(name: 'dateremise', type: 'datetime', nullable: true)]
    private $dateRemise;

    #[Assert\Positive]
    #[Assert\Range(min: 0, max: 100)]
    #[ORM\Column(name: 'mtremise', type: 'float', nullable: true)]
    private $mtRemise;

    #[ORM\Column(type: 'float', nullable: true)]
    private $budget;

    
    #[ORM\JoinColumn(name: 'u_p_commande_type', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \App\Entity\UPCommandeTy::class)]
    private $type;

    #[ORM\Column(type: 'float', nullable: true)]
    private $depense;

    #[ORM\Column(type: 'text', nullable: true)]
    private $observation;

    #[ORM\JoinColumn(name: 'u_p_projet_id', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \App\Entity\UPProjet::class)]
    private $projet;

    #[ORM\JoinColumn(name: 'p_projet_sous_id', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \App\Entity\PProjetSous::class)]
    private $sousprojet;

    #[ORM\Column(name: 'refcommande', type: 'string', length: 255, nullable: true)]
    private $refCommande;

    #[ORM\Column(name: 'datecommande', type: 'datetime', nullable: true)]
    private $dateCommande;

    /**
     * @var \DateTime
     */
    #[ORM\Column(name: 'dateoperation', type: 'datetime', nullable: true, options: ['default' => 'CURRENT_TIMESTAMP'])]
    private $dateoperation;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $utilisateur;

    
    #[ORM\JoinColumn(name: 'p_statutgrv_id', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \App\Entity\PStatutgrv::class)]
    private $statut;

    #[ORM\JoinColumn(name: 'p_dossier_id', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \App\Entity\PDossier::class)]
    private $dossier;

    /**
     * @var string
     */
    #[ORM\Column(name: 'st_liv', type: 'string', length: 10, nullable: true, options: ['default' => 'NL'])]
    private $stLiv;

    /**
     * @var string
     */
    #[ORM\Column(name: 'st_fac', type: 'string', length: 10, nullable: true, options: ['default' => 'NF'])]
    private $stFac;

    /**
     * @var string
     */
    #[ORM\Column(name: 'st_reg', type: 'string', length: 10, nullable: true, options: ['default' => 'NR'])]
    private $stReg;

    #[ORM\JoinColumn(name: 'partenaire_client_id', referencedColumnName: 'id')]
    #[Assert\NotBlank]
    #[ORM\ManyToOne(targetEntity: \App\Entity\UPPartenaire::class)]
    private $client;

    #[ORM\JoinColumn(name: 'compte_masse_id', nullable: true, referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \App\Entity\PComptemasse::class)]
    private $compteMasse;

    #[ORM\JoinColumn(name: 'compte_rubrique_id', nullable: true, referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \App\Entity\PCompterubrique::class)]
    private $compteRubrique;

    
    #[ORM\JoinColumn(name: 'compte_poste_id', nullable: true, referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \App\Entity\PCompteposte::class)]
    private $comptePoste;

    #[ORM\JoinColumn(nullable: true)]
    #[ORM\ManyToOne(targetEntity: \App\Entity\PCompte::class, inversedBy: 'commande')]
    private $compte;

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

    #[ORM\Column(type: 'boolean', nullable: true)]
    private $active;

    #[ORM\OneToMany(targetEntity: \App\Entity\UvCommandedet::class, cascade: ['persist', 'remove'], mappedBy: 'cab')]
    private $details;

    #[ORM\JoinColumn(name: 'u_p_devise_id', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \App\Entity\UPDevise::class)]
    private $devise;

    #[ORM\OneToMany(targetEntity: \App\Entity\UvLivraisoncab::class, mappedBy: 'commande')]
    private $livraison;

    #[ORM\ManyToOne(targetEntity: \App\Entity\User::class)]
    private $userValider;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private $dateValider;

    #[ORM\ManyToOne(targetEntity: \App\Entity\User::class)]
    private $userCommander;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private $dateCommander;

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

    #[ORM\Column(type: 'string', length: 100, nullable: true)]
    public $positionActuel = 'creer';

    #[ORM\OneToMany(targetEntity: \App\Entity\UvCommandecabFichier::class, mappedBy: 'commande')]
    private $fichiers;

    #[ORM\Column(type: 'json', nullable: true)]
    private $historique;

  
    #[ORM\JoinColumn(name: 'uv_deviscab_id', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \App\Entity\UvDeviscab::class, inversedBy: 'commandes')]
    private $devis;


    

    #[ORM\JoinColumn(name: 'p_marche_id', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \App\Entity\PMarche::class)]
    private $marche;

    #[ORM\JoinColumn(name: 'p_marche_sous_id', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \App\Entity\PMarcheSous::class)]
    private $marchesous;

    #[Assert\Positive]
    #[ORM\Column(type: 'float', nullable: true)]
    private $budjet;

    #[Assert\Positive]
    #[ORM\Column(type: 'float', nullable: true)]
    private $depenser;

    
    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $oldSys;

    
    
    /**
     * @var string
     */
    #[ORM\Column(type: 'string', length: 100, nullable: true)]
    private $remisFA;
    
    
    
      /**
     * @var string
     */
    #[ORM\Column(type: 'string', length: 100, nullable: true)]
    private $dateRemisFA;
    
        /**
     * @var string
     */
    #[ORM\Column(type: 'string', length: 100, nullable: true)]
    private $codePieceTrsft;
    
    
    
    
     
    #[ORM\Column(type: 'boolean', nullable: true)]
    private $init;
    


    
   
    
    
      
    #[ORM\Column(type: 'boolean', nullable: true)]
    private $cd;
    
      
    #[ORM\Column(type: 'boolean', nullable: true)]
    private $bl;
    
      
    #[ORM\Column(type: 'boolean', nullable: true)]
    private $fa;
      
    #[ORM\Column(type: 'boolean', nullable: true)]
    private $rg;
    
    
    
    
    #[ORM\Column(type: 'boolean', nullable: true)]
    private $sl;
    
    
    #[ORM\Column(type: 'boolean', nullable: true)]
    private $an;
    
    
    #[ORM\Column(type: 'boolean', nullable: true)]
    private $selecti;
    
    
     
    #[ORM\Column(type: 'boolean', nullable: true)]
    private $transfert;
    
    
    
       #[ORM\Column(name: 'refDocAsso', type: 'string', length: 255, nullable: true)]
    private $refdocasso;
    
    
      #[ORM\Column(name: 'dateDocAsso', type: 'datetime', nullable: true)]
    private $datedocasso;

    #[ORM\Column(type: 'text', nullable: true)]
    private $notePublic;

    #[ORM\Column(type: 'text', nullable: true)]
    private $notePrive;
    
         #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $lettrageAdonix;



     #[ORM\Column(type: 'boolean', nullable: true)]
    private $isdeleted;
    
     #[ORM\Column(type: 'integer', nullable: true)]
    private $signature1 = 0;
    #[ORM\Column(type: 'integer', nullable: true)]
    private $signature2 = 0;
    #[ORM\Column(type: 'integer', nullable: true)]
    private $signature3 = 0;
    #[ORM\Column(type: 'integer', nullable: true)]
    private $signature4 = 0;


    #[ORM\JoinColumn(referencedColumnName: 'id', onDelete: 'SET NULL')]
    #[ORM\ManyToOne(targetEntity: \App\Entity\UvCommandecab::class, inversedBy: 'no', cascade: ['persist'])]
    private $parentId;

      #[ORM\OneToMany(targetEntity: \App\Entity\UvCommandecab::class, mappedBy: 'parentId')]
    private $no;

    #[ORM\JoinColumn(name: 'type_id', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \App\Entity\PGlobalParamDet::class)]
    private $typecmd;
    
    #[ORM\Column(type: 'integer', nullable: true)]
    private $statutsig = 0;


       
    public function getParentId(): ?self
    {
        return $this->parentId;
    }
  
    public function setParentId(?self $parentId): self
    {
        $this->parentId = $parentId;
  
        return $this;
    }
  
    /**
     * @return Collection|self[]
     */
    public function getNo(): Collection
    {
        return $this->no;
    }
  
    public function addNo(self $no): self
    {
        if (!$this->no->contains($no)) {
            $this->no[] = $no;
            $no->setParentId($this);
        }
  
        return $this;
    }
  
    public function removeNo(self $no): self
    {
        if ($this->no->contains($no)) {
            $this->no->removeElement($no);
            // set the owning side to null (unless already changed)
            if ($no->getParentId() === $this) {
                $no->setParentId(null);
            }
        }
  
        return $this;
    }



    public function getTypecmd(): ?PGlobalParamDet
    {
        return $this->typecmd;
    }

    public function setTypecmd(?PGlobalParamDet $typecmd): self
    {
        $this->typecmd = $typecmd;

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

    #[ORM\PrePersist]
    public function setCreatedValue() {

        $this->created = new \DateTime();
    }

    #[ORM\PreUpdate]
    public function setUpdatedValue() {
        $this->updated = new \DateTime();
    }

    public function __construct() {
        $this->details = new ArrayCollection();
        $this->livraison = new ArrayCollection();
        $this->fichiers = new ArrayCollection();
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

    public function getDescription(): ?string {
        return $this->description;
    }

    public function setDescription(?string $description): self {
        $this->description = $description;

        return $this;
    }

    public function getNature(): ?int {
        return $this->nature;
    }

    public function setNature(?int $nature): self {
        $this->nature = $nature;

        return $this;
    }

    public function getResponsable(): ?string {
        return $this->responsable;
    }

    public function setResponsable(?string $responsable): self {
        $this->responsable = $responsable;

        return $this;
    }

    public function getDateDevis(): ?\DateTimeInterface {
        return $this->dateDevis;
    }

    public function setDateDevis(?\DateTimeInterface $dateDevis): self {
        $this->dateDevis = $dateDevis;

        return $this;
    }

    public function getRemise(): ?float {
        return $this->remise;
    }

    public function setRemise(?float $remise): self {
        $this->remise = $remise;

        return $this;
    }

    public function getDateRemise(): ?\DateTimeInterface {
        return $this->dateRemise;
    }

    public function setDateRemise(?\DateTimeInterface $dateRemise): self {
        $this->dateRemise = $dateRemise;

        return $this;
    }

    public function getMtRemise(): ?float {
        return $this->mtRemise;
    }

    public function setMtRemise(?float $mtRemise): self {
        $this->mtRemise = $mtRemise;

        return $this;
    }

    public function getBudget(): ?float {
        return $this->budget;
    }

    public function setBudget(?float $budget): self {
        $this->budget = $budget;

        return $this;
    }

    public function getDepense(): ?float {
        return $this->depense;
    }

    public function setDepense(?float $depense): self {
        $this->depense = $depense;

        return $this;
    }

    public function getObservation(): ?string {
        return $this->observation;
    }

    public function setObservation(?string $observation): self {
        $this->observation = $observation;

        return $this;
    }

    public function getRefCommande(): ?string {
        return $this->refCommande;
    }

    public function setRefCommande(?string $refCommande): self {
        $this->refCommande = $refCommande;

        return $this;
    }

    public function getDateCommande(): ?\DateTimeInterface {
        return $this->dateCommande;
    }

    public function setDateCommande(?\DateTimeInterface $dateCommande): self {
        $this->dateCommande = $dateCommande;

        return $this;
    }

    public function getDateoperation(): ?\DateTimeInterface {
        return $this->dateoperation;
    }

    public function setDateoperation(?\DateTimeInterface $dateoperation): self {
        $this->dateoperation = $dateoperation;

        return $this;
    }

    public function getUtilisateur(): ?string {
        return $this->utilisateur;
    }

    public function setUtilisateur(?string $utilisateur): self {
        $this->utilisateur = $utilisateur;

        return $this;
    }

    public function getStLiv(): ?string {
        return $this->stLiv;
    }

    public function setStLiv(?string $stLiv): self {
        $this->stLiv = $stLiv;

        return $this;
    }

    public function getStFac(): ?string {
        return $this->stFac;
    }

    public function setStFac(?string $stFac): self {
        $this->stFac = $stFac;

        return $this;
    }

    public function getStReg(): ?string {
        return $this->stReg;
    }

    public function setStReg(?string $stReg): self {
        $this->stReg = $stReg;

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

    public function getActive(): ?bool {
        return $this->active;
    }

    public function setActive(?bool $active): self {
        $this->active = $active;

        return $this;
    }

    public function getStatut(): ?PStatutgrv {
        return $this->statut;
    }

    public function setStatut(?PStatutgrv $statut): self {
        $this->statut = $statut;

        return $this;
    }

    public function getDossier(): ?PDossier {
        return $this->dossier;
    }

    public function setDossier(?PDossier $dossier): self {
        $this->dossier = $dossier;

        return $this;
    }

    public function getClient(): ?UPPartenaire {
        return $this->client;
    }

    public function setClient(?UPPartenaire $client): self {
        $this->client = $client;

        return $this;
    }

    public function getCompteMasse(): ?PComptemasse {
        return $this->compteMasse;
    }

    public function setCompteMasse(?PComptemasse $compteMasse): self {
        $this->compteMasse = $compteMasse;

        return $this;
    }

    public function getCompteRubrique(): ?PCompterubrique {
        return $this->compteRubrique;
    }

    public function setCompteRubrique(?PCompterubrique $compteRubrique): self {
        $this->compteRubrique = $compteRubrique;

        return $this;
    }

    public function getComptePoste(): ?PCompteposte {
        return $this->comptePoste;
    }

    public function setComptePoste(?PCompteposte $comptePoste): self {
        $this->comptePoste = $comptePoste;

        return $this;
    }

    public function getCompte(): ?PCompte {
        return $this->compte;
    }

    public function setCompte(?PCompte $compte): self {
        $this->compte = $compte;

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
     * @return Collection|UvCommandedet[]
     */
    public function getDetails(): Collection {
        return $this->details;
    }

    public function getTotalPrixDetails(){
        $prix=0;
        foreach ($this->details as $key => $value) {
            $prix+= $value->getPrixttc();

        }
        return $prix;

    }

    public function addDetail(UvCommandedet $detail): self {
        if (!$this->details->contains($detail)) {
            $this->details[] = $detail;
            $detail->setCab($this);
        }

        return $this;
    }

    public function removeDetail(UvCommandedet $detail): self {
        if ($this->details->contains($detail)) {
            $this->details->removeElement($detail);
            // set the owning side to null (unless already changed)
            if ($detail->getCab() === $this) {
                $detail->setCab(null);
            }
        }

        return $this;
    }

    public function getDevise(): ?UPDevise {
        return $this->devise;
    }

    public function setDevise(?UPDevise $devise): self {
        $this->devise = $devise;

        return $this;
    }

    /**
     * @return Collection|UvLivraisoncab[]
     */
    public function getLivraison(): Collection {
        return $this->livraison;
    }

    public function addLivraison(UvLivraisoncab $livraison): self {
        if (!$this->livraison->contains($livraison)) {
            $this->livraison[] = $livraison;
            $livraison->setCommande($this);
        }

        return $this;
    }

    public function removeLivraison(UvLivraisoncab $livraison): self {
        if ($this->livraison->contains($livraison)) {
            $this->livraison->removeElement($livraison);
            // set the owning side to null (unless already changed)
            if ($livraison->getCommande() === $this) {
                $livraison->setCommande(null);
            }
        }

        return $this;
    }

    public function getMarche(): ?PMarche {
        return $this->marche;
    }

    public function setMarche(?PMarche $marche): self {
        $this->marche = $marche;

        return $this;
    }

    public function getUserValider(): ?User {
        return $this->userValider;
    }

    public function setUserValider(?User $userValider): self {
        $this->userValider = $userValider;

        return $this;
    }

    public function getUserCommander(): ?User {
        return $this->userCommander;
    }

    public function setUserCommander(?User $userCommander): self {
        $this->userCommander = $userCommander;

        return $this;
    }

    public function getUserAnnuler(): ?User {
        return $this->userAnnuler;
    }

    public function setUserAnnuler(?User $userAnnuler): self {
        $this->userAnnuler = $userAnnuler;

        return $this;
    }

    public function getUserEncours(): ?User {
        return $this->userEncours;
    }

    public function setUserEncours(?User $userEncours): self {
        $this->userEncours = $userEncours;

        return $this;
    }

    public function getUserArchiver(): ?User {
        return $this->userArchiver;
    }

    public function setUserArchiver(?User $userArchiver): self {
        $this->userArchiver = $userArchiver;

        return $this;
    }

    public function getDateValider(): ?\DateTimeInterface {
        return $this->dateValider;
    }

    public function setDateValider(?\DateTimeInterface $dateValider): self {
        $this->dateValider = $dateValider;

        return $this;
    }

    public function getDateCommander(): ?\DateTimeInterface {
        return $this->dateCommander;
    }

    public function setDateCommander(?\DateTimeInterface $dateCommander): self {
        $this->dateCommander = $dateCommander;

        return $this;
    }

    public function getDateAnnuler(): ?\DateTimeInterface {
        return $this->dateAnnuler;
    }

    public function setDateAnnuler(?\DateTimeInterface $dateAnnuler): self {
        $this->dateAnnuler = $dateAnnuler;

        return $this;
    }

    public function getDateEncours(): ?\DateTimeInterface {
        return $this->dateEncours;
    }

    public function setDateEncours(?\DateTimeInterface $dateEncours): self {
        $this->dateEncours = $dateEncours;

        return $this;
    }

    public function getDateArchiver(): ?\DateTimeInterface {
        return $this->dateArchiver;
    }

    public function setDateArchiver(?\DateTimeInterface $dateArchiver): self {
        $this->dateArchiver = $dateArchiver;

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



    public function getHistorique(): ?array
    {
        return $this->historique;
    }

    public function setHistorique(?array $historique): self
    {
        $this->historique = $historique;

        return $this;
    }
    /**
     * @return Collection|UvCommandecabFichier[]
     */
    public function getFichiers(): Collection {
        return $this->fichiers;
    }

    public function addFichier(UvCommandecabFichier $fichier): self {
        if (!$this->fichiers->contains($fichier)) {
            $this->fichiers[] = $fichier;
            $fichier->setCommande($this);
        }

        return $this;
    }

    public function removeFichier(UvCommandecabFichier $fichier): self {
        if ($this->fichiers->contains($fichier)) {
            $this->fichiers->removeElement($fichier);
            // set the owning side to null (unless already changed)
            if ($fichier->getCommande() === $this) {
                $fichier->setCommande(null);
            }
        }

        return $this;
    }

    public function getProjet(): ?UPProjet {
        return $this->projet;
    }

    public function setProjet(?UPProjet $projet): self {
        $this->projet = $projet;

        return $this;
    }

    public function getType(): ?UPCommandeTy {
        return $this->type;
    }

    public function setType(?UPCommandeTy $type): self {
        $this->type = $type;

        return $this;
    }




    public function getDevis(): ?UvDeviscab
    {
        return $this->devis;
    }

    public function setDevis(?UvDeviscab $devis): self
    {
        $this->devis = $devis;

        return $this;
    }

    public function getMarchesous(): ?PMarcheSous {
        return $this->marchesous;
    }

    public function setMarchesous(?PMarcheSous $marchesous): self {
        $this->marchesous = $marchesous;

        return $this;
    }

    public function getBudjet(): ?float {
        return $this->budjet;
    }

    public function setBudjet(?float $budjet): self {
        $this->budjet = $budjet;

        return $this;
    }

    public function getDepenser(): ?float {
        return $this->depenser;
    }

    public function setDepenser(?float $depenser): self {
        $this->depenser = $depenser;

        return $this;
    }

    public function getSousprojet(): ?PProjetSous {
        return $this->sousprojet;
    }

    public function setSousprojet(?PProjetSous $sousprojet): self {
        $this->sousprojet = $sousprojet;

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

    public function getRemisFA(): ?string
    {
        return $this->remisFA;
    }

    public function setRemisFA(?string $remisFA): self
    {
        $this->remisFA = $remisFA;

        return $this;
    }

    public function getDateRemisFA(): ?string
    {
        return $this->dateRemisFA;
    }

    public function setDateRemisFA(?string $dateRemisFA): self
    {
        $this->dateRemisFA = $dateRemisFA;

        return $this;
    }

    public function getCodePieceTrsft(): ?string
    {
        return $this->codePieceTrsft;
    }

    public function setCodePieceTrsft(?string $codePieceTrsft): self
    {
        $this->codePieceTrsft = $codePieceTrsft;

        return $this;
    }

    public function getInit(): ?bool
    {
        return $this->init;
    }

    public function setInit(?bool $init): self
    {
        $this->init = $init;

        return $this;
    }

    public function getCd(): ?bool
    {
        return $this->cd;
    }

    public function setCd(?bool $cd): self
    {
        $this->cd = $cd;

        return $this;
    }

    public function getBl(): ?bool
    {
        return $this->bl;
    }

    public function setBl(?bool $bl): self
    {
        $this->bl = $bl;

        return $this;
    }

    public function getFa(): ?bool
    {
        return $this->fa;
    }

    public function setFa(?bool $fa): self
    {
        $this->fa = $fa;

        return $this;
    }

    public function getRg(): ?bool
    {
        return $this->rg;
    }

    public function setRg(?bool $rg): self
    {
        $this->rg = $rg;

        return $this;
    }

    public function getSl(): ?bool
    {
        return $this->sl;
    }

    public function setSl(?bool $sl): self
    {
        $this->sl = $sl;

        return $this;
    }

    public function getAn(): ?bool
    {
        return $this->an;
    }

    public function setAn(?bool $an): self
    {
        $this->an = $an;

        return $this;
    }

    public function getSelecti(): ?bool
    {
        return $this->selecti;
    }

    public function setSelecti(?bool $selecti): self
    {
        $this->selecti = $selecti;

        return $this;
    }

    public function getTransfert(): ?bool
    {
        return $this->transfert;
    }

    public function setTransfert(?bool $transfert): self
    {
        $this->transfert = $transfert;

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



    public function getDatedocasso(): ?\DateTimeInterface
    {
        return $this->datedocasso;
    }

    public function setDatedocasso(?\DateTimeInterface $datedocasso): self
    {
        $this->datedocasso = $datedocasso;

        return $this;
    }


    public function HasCommandeWithIcon()
    {
        $existnext = array('livraison' => ['id' => 0, 'icon' => '<i class="fa fa-square-o"></i>'], 'facture' => ['id' => 0, 'icon' => '<i class="fa fa-square-o"></i>'], 'reglement' => ['id' => 0, 'icon' => '<i class="fa fa-square-o"></i>']);
        /* if (count($this->commandes) > 0) {
            $existnext['commande']['id'] = 1;
            $existnext['commande']['icon'] = '<i class="fa fa-check-square-o"></i>';*/
        //foreach ($this->commandes as $key => $value) {
        //   dump($value->getLivraisons()); die(); 
        if ($this->livraison !== null) {
            if (count($this->livraison) > 0) {
                $existnext['livraison']['id'] = 1;
                $existnext['livraison']['icon'] = '<i class="fa fa-check-square-o"></i>';
                foreach ($this->livraison as $key2 => $value2) {

                    //  dump($value2->getFacture()); die(); 
                    if ($value2->getFacture() !== null) {
                        $existnext['facture']['id'] = 1;
                        $existnext['facture']['icon'] = '<i class="fa fa-check-square-o"></i>';
                        foreach ($value2->getFacture()->getReglements() as $key3 => $value3) {
                            // dump($value3);die();

                            if ($value3 !== null) {

                                $existnext['reglement']['id'] = 1;
                                $existnext['reglement']['icon'] = '<i class="fa fa-check-square-o"></i>';
                            }
                        }
                    }
                }
                //  }
                //}
            }
        }

        return $existnext;
    }


    

    public function getQuantiteLivre($detailsCommande){
        $quantiteLivre = 0;

        foreach ($this->livraison  as $key2 => $livraisonn) {
            if ($livraisonn->getActive()== true) {
            foreach ($livraisonn->getDetails() as $key3 => $detailsLivraison) {
                if (($detailsLivraison->getArticle() && $detailsCommande->getArticle()) && $detailsLivraison->getArticle()->getId() == $detailsCommande->getArticle()->getId()) {
                    if ($detailsLivraison->getQuantite() > 0) {
                        $quantiteLivre += $detailsLivraison->getQuantite();
                    }
                }
            }
        }
        }

     

        return $quantiteLivre;
        
    }
    public function getNotePublic(): ?string {
        return $this->notePublic;
    }
    public function setNotePublic(?string $notePublic): self {
        $this->notePublic = $notePublic;

        return $this;
    }

    public function getNotePrive(): ?string {
        return $this->notePrive;
    }

    public function setNotePrive(?string $notePrive): self {
        $this->notePrive = $notePrive;

        return $this;
    }
    public function getPrixHt() {
        $prix =null;
        foreach ($this->getDetails() as $key => $value) {
            $prix += $value->getPrixHt();
        }
        return $prix;
    }

    public function getPrixRemise() {
        $prix = null;
        foreach ($this->getDetails() as $key => $value) {
            $prix += $value->getPrixRemise();
        }
        return $prix;
    }
    
    
     public function getPrixTva() {
        $prix = null;
        foreach ($this->getDetails() as $key => $value) {
            $prix += $value->getPrixTva();
        }
        return $prix;
    }
    
    

    public function getPrixTtc() {
        $prix = null;
        foreach ($this->getDetails() as $key => $value) {
            $prix += $value->getPrixTtc();
        }
        return $prix;
    }

    public function getPrixTtcSansRemise() {
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
    public function setStatutsig(?int $statutsig): void {
        $this->statutsig = $statutsig;
    }

    public function getStatutsig(): ?int {
        return $this->statutsig;
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
    public function getPPiece(): ?PPiece
    {
        return $this->pPiece;
    }

    public function setPPiece(?PPiece $pPiece): self
    {
        $this->pPiece = $pPiece;

        return $this;
    }

}
