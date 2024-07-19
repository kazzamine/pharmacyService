<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * TAchatdemandeinternecab
 *
 *
 *
 */
#[ORM\Table(name: 't_achatdemandeinternecab')]
#[ORM\Entity(repositoryClass: \App\Repository\TAchatdemandeinternecabRepository::class)]
#[ORM\HasLifecycleCallbacks]
class TAchatdemandeinternecab
{

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    
    #[ORM\Column(type: 'integer', nullable: true)]
    private $statutsig = 0;
    #[ORM\Column(type: 'integer', nullable: true)]
    private $signature1 = 0;
    #[ORM\Column(type: 'integer', nullable: true)]
    private $signature2 = 0;
    #[ORM\Column(type: 'integer', nullable: true)]
    private $signature3 = 0;
    #[ORM\Column(type: 'integer', nullable: true)]
    private $signature4 = 0;
    
      #[ORM\JoinColumn(name: 'p_piece_id', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \App\Entity\PPiece::class)]
    private $pPiece;

    
    #[ORM\Column(name: 'code', type: 'string', length: 255, nullable: true)]
    private $code;

    /**
     *
     * @var string|null
     */
    #[ORM\Column(name: 'description', type: 'string', length: 255, nullable: true)]
    private $description;
    #[ORM\Column(name: 'description_rendez_vous', type: 'string', length: 255, nullable: true)]
    private $descriptionRendezVous;

    /**
     * @var \DateTime|null
     *
     */
    #[ORM\Column(name: 'date_vendez_vous', type: 'datetime', nullable: true)]
    private $dateRendezVous;
    /**
     * @var \DateTime|null
     *
     */
    #[ORM\Column(name: 'date_demande', type: 'date', nullable: true)]
    private $dateDemande;

    
    #[ORM\JoinColumn(name: 'u_p_commande_type', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \App\Entity\UPCommandeTy::class)]
    private $type;

    
    #[Assert\Range(min: 0, max: 100)]
    #[Assert\Type(type: 'numeric')]
    #[ORM\Column(type: 'float', nullable: true)]
    private $remise;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'ref_marche', type: 'string', length: 100, nullable: true)]
    private $refMarche;

    
    #[Assert\Positive]
    #[ORM\Column(name: 'mt_marche', type: 'float', nullable: true)]
    private $mtMarche;

    /**
     * @var float|null
     */
    #[Assert\Positive]
    #[ORM\Column(name: 'montant', type: 'float', nullable: true)]
    private $montant;

    /**
     * @var \DateTime
     */
    #[ORM\Column(name: 'date_operation', type: 'datetime', nullable: true)]
    private $dateOperation;

    #[ORM\Column(name: 'autre_information', type: 'text', nullable: true)]
    private $autreInformation;


    #[ORM\Column(name: 'description_detail', type: 'text', nullable: true)]
    private $descriptionDetail;

    /**
     * @var string
     */
    #[ORM\Column(name: 'utilisateur', type: 'string', length: 255, nullable: true)]
    private $utilisateur;

    
    #[ORM\JoinColumn(name: 'p_service_id', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \App\Entity\UPService::class)]
    private $service;

    
    #[ORM\JoinColumn(name: 'p_dossier_id', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \App\Entity\PDossier::class)]
    private $dossier;

    #[ORM\JoinColumn(name: 'u_p_projet_id', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \App\Entity\UPProjet::class)]
    private $projet;

    #[ORM\JoinColumn(name: 'p_projet_sous_id', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \App\Entity\PProjetSous::class)]
    private $sousprojet;

    
    #[ORM\JoinColumn(name: 'u_p_devise_id', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \App\Entity\UPDevise::class)]
    private $devise;

    
    #[ORM\JoinColumn(name: 'p_statutgrv_id', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \App\Entity\PStatutgrv::class)]
    private $statut;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'code_affaire', type: 'string', length: 100, nullable: true)]
    private $codeAffaire;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'ref_devis', type: 'string', length: 50, nullable: true)]
    private $refDevis;

    #[ORM\JoinColumn(name: 't_affaire_id', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \App\Entity\UPAffaire::class)]
    private $affaire;

    #[ORM\JoinColumn(name: 'p_compte_masse_id', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \App\Entity\PComptemasse::class)]
    private $compteMasse;

    /**
     *
     *
     */
    #[ORM\JoinColumn(name: 'p_compte_rubrique_id', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \App\Entity\PCompterubrique::class)]
    private $compteRubrique;

    #[ORM\JoinColumn(name: 'p_compte_poste_id', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \App\Entity\PCompteposte::class)]
    private $comptePoste;

    
    #[ORM\JoinColumn(name: 'p_compte_id', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \App\Entity\PCompte::class)]
    private $compte;

    
    #[ORM\JoinColumn(name: 'pour_compte', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \App\Entity\PDossier::class)]
    private $pourCompte;

    
    #[ORM\JoinColumn(name: 'partenaire_client_id', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \App\Entity\UPPartenaire::class)]
    private $client;

    
    #[ORM\JoinColumn(name: 'partenaire_fournisseur_id', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \App\Entity\UPPartenaire::class)]
    private $fournisseur;

    #[ORM\OneToMany(targetEntity: \App\Entity\TAchatdemandeinternedet::class, cascade: ['persist', 'remove'], mappedBy: 'cab')]
    private $details;
    #[ORM\OneToMany(targetEntity: \App\Entity\DemandStockCab::class, cascade: ['persist', 'remove'], mappedBy: 'demandeAchat')]
    private $demandeStockCabs;

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

    #[ORM\JoinColumn(referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \App\Entity\UvDeviscab::class, fetch: 'EAGER')]
    private $devisClient;

    #[ORM\Column(type: 'boolean', nullable: true)]
    private $active;

    #[ORM\OneToMany(targetEntity: \App\Entity\UATCommandefrscab::class, mappedBy: 'referenceBci')]
    private $commandes;

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

    #[ORM\Column(type: 'string', length: 100, nullable: true)]
    public $positionActuel = 'creer';

    #[ORM\Column(type: 'json', nullable: true)]
    private $historique;

    #[ORM\OneToMany(targetEntity: \App\Entity\TAchatdemandeinternecabFichier::class, mappedBy: 'demande')]
    private $fichiers;

    #[ORM\ManyToOne(targetEntity: \App\Entity\PMarche::class, inversedBy: 'tAchatdemandeinternecabs')]
    private $marche;


    #[ORM\Column(type: 'text', nullable: true)]
    private $investissementDescription;

    #[ORM\JoinColumn(name: 'p_marche_sous_id', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \App\Entity\PMarcheSous::class)]
    private $marchesous;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'refDocAsso', type: 'string', length: 100, nullable: true)]
    private $refdocasso;

    #[ORM\Column(type: 'text', nullable: true)]
    private $notePublic;

    #[ORM\Column(type: 'text', nullable: true)]
    private $notePrive;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $oldSys;

    #[ORM\OneToOne(targetEntity: \App\Entity\UvDeviscab::class, mappedBy: 'demande')]
    private $devis;

    #[ORM\Column(type: 'boolean', nullable: true)]
    private $isdeleted;
    #[ORM\Column(type: 'string', nullable: true)]
    private $source;
    #[ORM\ManyToOne(targetEntity: TAchatdemandeinternecab::class, inversedBy: 'cabs')]
    private $parent;

   #[ORM\OneToMany(targetEntity: TAchatdemandeinternecab::class, mappedBy: 'parent')]
    private $cabs;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $refBlFournisseur;

    #[ORM\ManyToOne(targetEntity: \App\Entity\SiteLivraison::class, inversedBy: 'tAchatdemandeinternecabs')]
    private $siteLivraison;



    public function getIsdeleted(): ?bool
    {
        return $this->isdeleted;
    }

    public function setIsdeleted(?bool $isdeleted): self
    {
        $this->isdeleted = $isdeleted;
        $this->active = false;
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

    public function HasCommandeOld()
    {
        $existnext = array('commande' => 0, 'livraison' => 0, 'facture' => 0, 'reglement' => 0);
        if (count($this->commandes) > 0) {
            $existnext['commande'] = 1;
            foreach ($this->commandes as $key => $value) {
                //   dump($value->getLivraisons()); die(); 
                if ($value->getLivraisons() !== null) {
                    if (count($value->getLivraisons()) > 0) {
                        $existnext['livraison'] = 1;
                        foreach ($value->getLivraisons() as $key2 => $value2) {

                            //  dump($value2->getFacture()); die(); 
                            if ($value2->getFacture() !== null) {
                                $existnext['facture'] = 1;
                                foreach ($value2->getFacture()->getTReglementfrs() as $key3 => $value3) {
                                    // dump($value3);die();

                                    if ($value3 !== null) {

                                        $existnext['reglement'] = 1;
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }

        return $existnext;
    }

    public function HasCommande()
    {

        $existnext = array();
        $existnext['demande d\'achat '] = ['id' => $this->getId(), 'code' => $this->getCode()];
        if (count($this->commandes) > 0) {
            // $existnext['commande'] = 1;
            foreach ($this->commandes as $key => $value) {
                $existnext['bon de commande'][$key] = ['id' => $value->getId(), 'code' => $value->getCode()];
                if ($value->getLivraisons() !== null) {
                    if (count($value->getLivraisons()) > 0) {

                        foreach ($value->getLivraisons() as $key2 => $value2) {
                            $existnext['bon de livraison'][$key2] = ['id' => $value2->getId(), 'code' => $value2->getCode()];
                            if ($value2->getFacture() !== null) {
                                $existnext['facture'][$value2->getFacture()->getId()] = ['id' => $value2->getFacture()->getId(), 'code' => $value2->getFacture()->getCode()];
                            }
                        }
                    }
                }
            }
        }

        return $existnext;
    }

    public function HasCommandeWithIcon()
    {
        $existnext = array('commande' => ['id' => 0, 'icon' => '<i class="fa fa-square-o"></i>'], 'livraison' => ['id' => 0, 'icon' => '<i class="fa fa-square-o"></i>'], 'facture' => ['id' => 0, 'icon' => '<i class="fa fa-square-o"></i>'], 'reglement' => ['id' => 0, 'icon' => '<i class="fa fa-square-o"></i>']);
        if (count($this->commandes) > 0) {
            $existnext['commande']['id'] = 1;
            $existnext['commande']['icon'] = '<i class="fa fa-check-square-o"></i>';
            foreach ($this->commandes as $key => $value) {
                //   dump($value->getLivraisons()); die(); 
                if ($value->getLivraisons() !== null) {
                    if (count($value->getLivraisons()) > 0) {
                        $existnext['livraison']['id'] = 1;
                        $existnext['livraison']['icon'] = '<i class="fa fa-check-square-o"></i>';
                        foreach ($value->getLivraisons() as $key2 => $value2) {

                            //  dump($value2->getFacture()); die(); 
                            if ($value2->getFacture() !== null) {
                                $existnext['facture']['id'] = 1;
                                $existnext['facture']['icon'] = '<i class="fa fa-check-square-o"></i>';
                                foreach ($value2->getFacture()->getTReglementfrs() as $key3 => $value3) {
                                    // dump($value3);die();

                                    if ($value3 !== null) {

                                        $existnext['reglement']['id'] = 1;
                                        $existnext['reglement']['icon'] = '<i class="fa fa-check-square-o"></i>';
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }

        return $existnext;
    }

    public function __toString()
    {
        return (string) $this->id;
    }

    #[ORM\PrePersist]
    public function setCreatedValue()
    {

        $this->created = new \DateTime();
    }

    #[ORM\PreUpdate]
    public function setUpdatedValue()
    {
        $this->updated = new \DateTime();
    }

    public function __construct()
    {
        $this->details = new ArrayCollection();
        $this->commandes = new ArrayCollection();
        $this->fichiers = new ArrayCollection();
        $this->demandeStockCabs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }
    public function getDescriptionRendezVous(): ?string
    {
        return $this->descriptionRendezVous;
    }

    public function setDescriptionRendezVous(?string $descriptionRendezVous): self
    {
        $this->descriptionRendezVous = $descriptionRendezVous;

        return $this;
    }

    public function getDateDemande(): ?\DateTimeInterface
    {
        return $this->dateDemande;
    }

    public function setDateDemande(?\DateTimeInterface $dateDemande): self
    {
        $this->dateDemande = $dateDemande;

        return $this;
    }
    public function getDateRendezVous(): ?\DateTimeInterface
    {
        return $this->dateRendezVous;
    }

    public function setDateRendezVous(?\DateTimeInterface $dateRendezVous): self
    {
        $this->dateRendezVous = $dateRendezVous;

        return $this;
    }

    public function getRefMarche(): ?string
    {
        return $this->refMarche;
    }

    public function setRefMarche(?string $refMarche): self
    {
        $this->refMarche = $refMarche;

        return $this;
    }

    public function getMtMarche(): ?float
    {
        return $this->mtMarche;
    }

    public function setMtMarche(?float $mtMarche): self
    {
        $this->mtMarche = $mtMarche;

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

    public function getDateOperation(): ?\DateTimeInterface
    {
        return $this->dateOperation;
    }

    public function setDateOperation(?\DateTimeInterface $dateOperation): self
    {
        $this->dateOperation = $dateOperation;

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

    public function getUtilisateur(): ?string
    {
        return $this->utilisateur;
    }

    public function setUtilisateur(?string $utilisateur): self
    {
        $this->utilisateur = $utilisateur;

        return $this;
    }

    public function getCodeAffaire(): ?string
    {
        return $this->codeAffaire;
    }

    public function setCodeAffaire(?string $codeAffaire): self
    {
        $this->codeAffaire = $codeAffaire;

        return $this;
    }

    public function getRefDevis(): ?string
    {
        return $this->refDevis;
    }

    public function setRefDevis(?string $refDevis): self
    {
        $this->refDevis = $refDevis;

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

    public function getActive(): ?bool
    {
        return $this->active;
    }

    public function setActive(?bool $active): self
    {
        $this->active = $active;

        return $this;
    }

    public function getService(): ?UPService
    {
        return $this->service;
    }

    public function setService(?UPService $service): self
    {
        $this->service = $service;

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

    public function getDevise(): ?UPDevise
    {
        return $this->devise;
    }

    public function setDevise(?UPDevise $devise): self
    {
        $this->devise = $devise;

        return $this;
    }

    public function getStatut(): ?PStatutgrv
    {
        return $this->statut;
    }

    public function setStatut(?PStatutgrv $statut): self
    {
        $this->statut = $statut;

        return $this;
    }

    public function getAffaire(): ?UPAffaire
    {
        return $this->affaire;
    }

    public function setAffaire(?UPAffaire $affaire): self
    {
        $this->affaire = $affaire;

        return $this;
    }

    public function getCompteMasse(): ?PComptemasse
    {
        return $this->compteMasse;
    }

    public function setCompteMasse(?PComptemasse $compteMasse): self
    {
        $this->compteMasse = $compteMasse;

        return $this;
    }

    public function getCompteRubrique(): ?PCompterubrique
    {
        return $this->compteRubrique;
    }

    public function setCompteRubrique(?PCompterubrique $compteRubrique): self
    {
        $this->compteRubrique = $compteRubrique;

        return $this;
    }

    public function getComptePoste(): ?PCompteposte
    {
        return $this->comptePoste;
    }

    public function setComptePoste(?PCompteposte $comptePoste): self
    {
        $this->comptePoste = $comptePoste;

        return $this;
    }

    public function getCompte(): ?PCompte
    {
        return $this->compte;
    }

    public function setCompte(?PCompte $compte): self
    {
        $this->compte = $compte;

        return $this;
    }

    public function getPourCompte(): ?PDossier
    {
        return $this->pourCompte;
    }

    public function setPourCompte(?PDossier $pourCompte): self
    {
        $this->pourCompte = $pourCompte;

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
     * @return Collection|TAchatdemandeinternedet[]
     */
    public function getDetails(): Collection
    {
        return $this->details;
    }
    /**
     * @return Collection|DemandStockCab[]
     */
    public function getDmandeStockCabs(): Collection
    {
        return $this->demandeStockCabs;
    }

    public function addDetail(TAchatdemandeinternedet $detail): self
    {
        if (!$this->details->contains($detail)) {
            $this->details[] = $detail;
            $detail->setCab($this);
        }

        return $this;
    }

    public function removeDetail(TAchatdemandeinternedet $detail): self
    {
        if ($this->details->contains($detail)) {
            $this->details->removeElement($detail);
            // set the owning side to null (unless already changed)
            if ($detail->getCab() === $this) {
                $detail->setCab(null);
            }
        }

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

    public function getUserUpdated(): ?User
    {
        return $this->userUpdated;
    }

    public function setUserUpdated(?User $userUpdated): self
    {
        $this->userUpdated = $userUpdated;

        return $this;
    }

    public function getDevisClient(): ?UvDeviscab
    {
        return $this->devisClient;
    }

    public function setDevisClient(?UvDeviscab $devisClient): self
    {
        $this->devisClient = $devisClient;

        return $this;
    }

    /**
     * @return Collection|UATCommandefrscab[]
     */
    public function getCommandes(): Collection
    {
        return $this->commandes;
    }

    public function addCommande(UATCommandefrscab $commande): self
    {
        if (!$this->commandes->contains($commande)) {
            $this->commandes[] = $commande;
            $commande->setReferenceBci($this);
        }

        return $this;
    }

    public function removeCommande(UATCommandefrscab $commande): self
    {
        if ($this->commandes->contains($commande)) {
            $this->commandes->removeElement($commande);
            // set the owning side to null (unless already changed)
            if ($commande->getReferenceBci() === $this) {
                $commande->setReferenceBci(null);
            }
        }

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



    public function getPositionActuel()
    {
        return $this->positionActuel;
    }

    public function setPositionActuel($positionActuel, $context = []): self
    {
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
     * @return Collection|TAchatdemandeinternecabFichier[]
     */
    public function getFichiers(): Collection
    {
        return $this->fichiers;
    }

    public function addFichier(TAchatdemandeinternecabFichier $fichier): self
    {
        if (!$this->fichiers->contains($fichier)) {
            $this->fichiers[] = $fichier;
            $fichier->setDemande($this);
        }

        return $this;
    }

    public function removeFichier(TAchatdemandeinternecabFichier $fichier): self
    {
        if ($this->fichiers->contains($fichier)) {
            $this->fichiers->removeElement($fichier);
            // set the owning side to null (unless already changed)
            if ($fichier->getDemande() === $this) {
                $fichier->setDemande(null);
            }
        }

        return $this;
    }

    public function getMarche(): ?PMarche
    {
        return $this->marche;
    }

    public function setMarche(?PMarche $marche): self
    {
        $this->marche = $marche;

        return $this;
    }

    public function getMarchesous(): ?PMarcheSous
    {
        return $this->marchesous;
    }

    public function setMarchesous(?PMarcheSous $marchesous): self
    {
        $this->marchesous = $marchesous;

        return $this;
    }

    public function getType(): ?UPCommandeTy
    {
        return $this->type;
    }

    public function setType(?UPCommandeTy $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getProjet(): ?UPProjet
    {
        return $this->projet;
    }

    public function setProjet(?UPProjet $projet): self
    {
        $this->projet = $projet;

        return $this;
    }

    public function getSousProjet(): ?PProjetSous
    {
        return $this->sousprojet;
    }

    public function setSousProjet(?PProjetSous $sousprojet): self
    {
        $this->sousprojet = $sousprojet;

        return $this;
    }

    public function getDescriptionDetail(): ?string
    {
        return $this->descriptionDetail;
    }

    public function setDescriptionDetail(?string $descriptionDetail): self
    {
        $this->descriptionDetail = $descriptionDetail;

        return $this;
    }

    public function getInvestissementDescription(): ?string
    {
        return $this->investissementDescription;
    }

    public function setInvestissementDescription(?string $investissementDescription): self
    {
        $this->investissementDescription = $investissementDescription;

        return $this;
    }

    public function getRemise(): ?float
    {
        return $this->remise;
    }

    public function setRemise(?float $remise): self
    {
        $this->remise = $remise;

        return $this;
    }

    public function getArrayTotalArticleByAchat(?TAchatdemandeinternecab $achat): array
    {

        //$resultat = array();
        $prixHt = 0;
        $prixTtc = 0;
        $prixTva = 0;
        $prixRemise = 0;
        $prixTotal = 0;

        foreach ($achat->getDetails() as $key => $value) {
            $prixHt = $prixHt + $value->getPrixHt();
            $prixTva = $prixTva + $value->getPrixTva();
            $prixRemise = $prixRemise + $value->getPrixRemise();
            $prixTotal = $prixTotal + $value->getPrixTtc();
            $prixTtc = $prixTtc + $value->getPrixTtc();
        }



        $achat->getDevise() ? $designation = $achat->getDevise()->getDesignation() : $designation = null;


        return array("remise" => $achat->getRemise(), "mremise" => $prixRemise != 0 ? $prixRemise : null, "prixHt" => number_format((float) $prixHt, 2, ',', ' ') . ' ' . $designation, "prixTtc" => number_format((float) $prixTtc, 2, ',', ' ') . ' ' . $designation, "prixTva" => number_format((float) $prixTva, 2, ',', ' ') . ' ' . $designation, "prixRemise" => $prixRemise != 0 ? number_format((float) $prixRemise, 2, ',', ' ') . ' ' . $designation : null, "totalTtc" => number_format((float) $prixTotal, 2, ',', ' ') . ' ' . $designation, "totalTtcSansDevis" => $prixTotal);
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

    public function getNotePublic(): ?string
    {
        return $this->notePublic;
    }

    public function setNotePublic(?string $notePublic): self
    {
        $this->notePublic = $notePublic;

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

    public function getNotePrive(): ?string
    {
        return $this->notePrive;
    }

    public function setNotePrive(?string $notePrive): self
    {
        $this->notePrive = $notePrive;

        return $this;
    }

    public function getPrixHt()
    {
        $prix = null;
        foreach ($this->getDetails() as $key => $value) {
            $prix += $value->getPrixHt();
        }
        return $prix;
    }

    public function getPrixRemise()
    {
        $prix = null;
        foreach ($this->getDetails() as $key => $value) {
            $prix += $value->getPrixRemise();
        }
        return $prix;
    }


    public function getPrixTva()
    {
        $prix = null;
        foreach ($this->getDetails() as $key => $value) {
            $prix += $value->getPrixTva();
        }
        return $prix;
    }



    public function getPrixTtc()
    {
        $prix = null;
        foreach ($this->getDetails() as $key => $value) {
            $prix += $value->getPrixTtc();
        }
        return $prix;
    }

    public function getPrixTtcSansRemise()
    {
        $prix = null;
        foreach ($this->getDetails() as $key => $value) {
            $prix += $value->getPrixHt();
        }
        return $prix;
    }

    public function getDevis(): ?UvDeviscab
    {
        return $this->devis;
    }

    public function setDevis(?UvDeviscab $devis): self
    {
        $this->devis = $devis;

        // set (or unset) the owning side of the relation if necessary
        $newDemande = null === $devis ? null : $this;
        if ($devis->getDemande() !== $newDemande) {
            $devis->setDemande($newDemande);
        }

        return $this;
    }


    public function getQuantiteCommander($detailsDemande)
    {
        $quantiteCommande = 0;

        foreach ($this->commandes  as $key2 => $commande) {
            foreach ($commande->getDetails() as $key3 => $detailsCommande) {
                if (($detailsCommande->getArticle() && $detailsDemande->getArticle()) && $detailsCommande->getArticle()->getId() == $detailsDemande->getArticle()->getId()) {
                    if ($detailsCommande->getQuantite() > 0) {
                        $quantiteCommande += $detailsCommande->getQuantite();
                    }
                }
            }
        }


        return $quantiteCommande;
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
    public function getCabs(): Collection
    {
        return $this->cabs;
    }

    public function addCab(self $cab): self
    {
        if (!$this->cabs->contains($cab)) {
            $this->cabs[] = $cab;
            $cab->setParent($this);
        }

        return $this;
    }

    public function removeCab(self $cab): self
    {
        if ($this->cabs->removeElement($cab)) {
            // set the owning side to null (unless already changed)
            if ($cab->getParent() === $this) {
                $cab->setParent(null);
            }
        }

        return $this;
    }


    public function getStatutsig(): ?int {
        return $this->statutsig;
    }

    public function setStatutsig(?int $statutsig): self {
        $this->statutsig = $statutsig;
        return $this;
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


    public function getRefBlFournisseur(): ?string
    {
        return $this->refBlFournisseur;
    }

    public function setRefBlFournisseur(?string $refBlFournisseur): self
    {
        $this->refBlFournisseur = $refBlFournisseur;

        return $this;
    }

    public function getSiteLivraison(): ?siteLivraison
    {
        return $this->siteLivraison;
    }

    public function setSiteLivraison(?siteLivraison $siteLivraison): self
    {
        $this->siteLivraison = $siteLivraison;

        return $this;
    }
    

}
