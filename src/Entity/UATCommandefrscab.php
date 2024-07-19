<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Entity\UaTLivraisonfrscab;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping\HasLifecycleCallbacks;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * UATCommandefrscab
 */
#[ORM\Table(name: 'ua_t_commandefrscab')]
#[ORM\Entity(repositoryClass: \App\Repository\UATCommandefrscabRepository::class)]
#[ORM\HasLifecycleCallbacks]
class UATCommandefrscab
{

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'code', type: 'string', length: 100, nullable: true)]
    private $code;
     #[ORM\JoinColumn(name: 'u_p_projet_id', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \App\Entity\UPProjet::class)]
    private $projet;


    /**
     * @var \DateTime|null
     */
    #[ORM\Column(name: 'datecommande', type: 'date', nullable: true)]
    private $datecommande;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'refDocAsso', type: 'string', length: 100, nullable: true)]
    private $refdocasso;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'responsable', type: 'string', length: 100, nullable: true)]
    private $responsable;
    
      #[ORM\JoinColumn(name: 'p_piece_id', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \App\Entity\PPiece::class)]
    private $pPiece;

    
    #[Assert\Range(min: 0, max: 100)]
    #[Assert\Type(type: 'numeric')]
    #[ORM\Column(type: 'float', nullable: true)]
    private $remise;

    /**
     * @var \DateTime|null
     */
    #[ORM\Column(name: 'dateremise', type: 'date', nullable: true)]
    private $dateremise;

    /**
     * @var float|null
     */
    #[Assert\Positive]
    #[ORM\Column(name: 'mtremise', type: 'float', precision: 10, scale: 0, nullable: true)]
    private $mtremise;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'observation', type: 'text', length: 65535, nullable: true)]
    private $observation;

    /**
     * @var \DateTime
     */
    #[ORM\Column(name: 'dateoperation', type: 'datetime', nullable: true)]
    private $dateoperation;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'utilisateur', type: 'string', length: 100, nullable: true)]
    private $utilisateur;

    
    #[ORM\JoinColumn(name: 'p_statutgrv_id', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \App\Entity\PStatutgrv::class)]
    private $statut;

    /**
     * @var int
     */
    #[ORM\Column(name: 'ismultiple', type: 'smallint', nullable: true, options: ['unsigned' => true])]
    private $ismultiple = '0';

    /**
     * @var \DateTime|null
     */
    #[ORM\Column(name: 'dateDocAsso', type: 'date', nullable: true)]
    private $datedocasso;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'frs1', type: 'string', length: 100, nullable: true)]
    private $frs1;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'frs2', type: 'string', length: 100, nullable: true)]
    private $frs2;

    /**
     * @var float|null
     */
    #[Assert\Positive]
    #[ORM\Column(name: 'mtfrs1', type: 'float', nullable: true)]
    private $mtfrs1;

    /**
     * @var float|null
     */
    #[Assert\Positive]
    #[ORM\Column(name: 'mtfrs2', type: 'float', precision: 10, scale: 0, nullable: true)]
    private $mtfrs2;

    
    #[ORM\JoinColumn(name: 'pour_compte', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \App\Entity\PDossier::class)]
    private $pourCompte;

    /**
     * @var \DateTime|null
     */
    #[ORM\Column(name: 'dateLivprv', type: 'date', nullable: true)]
    private $datelivprv;

    /**
     * @var float|null
     */
    #[ORM\Column(name: 'donttva', type: 'float', precision: 10, scale: 0, nullable: true)]
    private $donttva;

    /**
     * @var int
     */
    #[ORM\Column(name: 'cdc', type: 'boolean', nullable: true)]
    private $cdc = '0';

    /**
     * @var int
     */
    #[ORM\Column(name: 'cdv', type: 'boolean', nullable: true)]
    private $cdv = '0';

    /**
     * @var int
     */
    #[ORM\Column(name: 'bec', type: 'boolean', nullable: true)]
    private $bec = '0';

    /**
     * @var int
     */
    #[ORM\Column(name: 'bev', type: 'boolean', nullable: true)]
    private $bev = '0';

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'st_liv', type: 'string', length: 10, nullable: true, options: ['default' => 'NL'])]
    private $stLiv = 'NL';

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'st_fac', type: 'string', length: 10, nullable: true, options: ['default' => 'NF'])]
    private $stFac = 'NF';

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'st_reg', type: 'string', length: 10, nullable: true, options: ['default' => 'NR'])]
    private $stReg = 'NR';

    #[ORM\Column(type: 'boolean', nullable: true)]
    private $active;

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

    #[ORM\JoinColumn(name: 'p_devise_id', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \App\Entity\UPDevise::class)]
    private $devise;

    #[ORM\JoinColumn(name: 'u_p_partenaire_id', referencedColumnName: 'id')]
    #[Assert\NotBlank]
    #[ORM\ManyToOne(targetEntity: \App\Entity\UPPartenaire::class)]
    private $fournisseur;

    #[ORM\JoinColumn(name: 'p_dossier_id', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \App\Entity\PDossier::class)]
    private $dossier;

    #[ORM\ManyToOne(targetEntity: \App\Entity\TAchatdemandeinternecab::class, inversedBy: 'commandes')]
    private $referenceBci;

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

    #[ORM\OneToMany(targetEntity: \App\Entity\UaTLivraisonfrscab::class, mappedBy: 'commande')]
    private $livraisons;

    #[ORM\OneToMany(targetEntity: \App\Entity\UATCommandefrsdet::class, mappedBy: 'cab')]
    private $details;


    #[ORM\OneToMany(targetEntity: \App\Entity\UATCommandefrscabAcompte::class, mappedBy: 'commande', cascade: ['persist', 'remove'])]
    private $acomptes;

    
    #[ORM\Column(name: 'autre_information', type: 'text', nullable: true)]
    private $autreInformation;


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


    #[ORM\OneToMany(targetEntity: \App\Entity\UATCommandefrscabFichier::class, mappedBy: 'comande', cascade: ['persist', 'remove'])]
    private $fichiers;


    #[ORM\Column(type: 'text', nullable: true)]
    private $notePublic;

    #[ORM\Column(type: 'text', nullable: true)]
    private $notePrive;


    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $oldSys;


       #[ORM\JoinColumn(name: 'type_id', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \App\Entity\PGlobalParamDet::class)]
    private $type;


     #[ORM\Column(type: 'boolean', nullable: true)]
    private $isdeleted;
     #[ORM\Column(type: 'integer', nullable: true)]
    private $flag = 0;
     #[ORM\Column(type: 'integer', nullable: true)]
    private $signature1 = 0;
    #[ORM\Column(type: 'integer', nullable: true)]
    private $signature2 = 0;
    #[ORM\Column(type: 'integer', nullable: true)]
    private $signature3 = 0;
    #[ORM\Column(type: 'integer', nullable: true)]
    private $signature4 = 0;

        
    #[ORM\JoinColumn(referencedColumnName: 'id', onDelete: 'SET NULL')]
    #[ORM\ManyToOne(targetEntity: \App\Entity\UATCommandefrscab::class, inversedBy: 'no', cascade: ['persist'])]
    private $parentId;

      #[ORM\OneToMany(targetEntity: \App\Entity\UATCommandefrscab::class, mappedBy: 'parentId')]
    private $no;
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
    public function getFlag(): ?int
    {
        return $this->flag;
    }

    public function setFlag(?int $flag): self
    {
        $this->flag = $flag;
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

    #[ORM\PrePersist]
    public function setCreatedValue()
    {

        $this->created = new \DateTime();
    }


    public function HasLivraison()
    {
        $existnext = array('livraison' => 0, 'facture' => 0, 'reglement' => 0);

        //   dump($value->getLivraisons()); die(); 
        if ($this->getLivraisons() !== null) {
            if (count($value->getLivraisons()) > 0) {
                $existnext['livraison'] = 1;
                foreach ($this->getLivraisons() as $key2 => $value2) {

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



        return $existnext;
    }

    #[ORM\PreUpdate]
    public function setUpdatedValue()
    {
        $this->updated = new \DateTime();
    }

    public function __construct()
    {
        $this->livraisons = new ArrayCollection();
        $this->details = new ArrayCollection();
        $this->fichiers = new ArrayCollection();
        $this->acomptes = new ArrayCollection();
        $this->datecommande = new \DateTime();
        $this->datelivprv = new \DateTime();
        //  datedocasso

    }

    public function checkedValue($val1, $val2)
    {
        $chek = " ";
        if ($val1 == $val2) {

            $chek = "checked";
        }
        return $chek;
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

    public function getDatecommande(): ?\DateTimeInterface
    {
        return $this->datecommande;
    }

    public function setDatecommande(?\DateTimeInterface $datecommande): self
    {
        $this->datecommande = $datecommande;
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

    public function getResponsable(): ?string
    {
        return $this->responsable;
    }

    public function setResponsable(?string $responsable): self
    {
        $this->responsable = $responsable;

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

    public function getDateremise(): ?\DateTimeInterface
    {
        return $this->dateremise;
    }

    public function setDateremise(?\DateTimeInterface $dateremise): self
    {
        $this->dateremise = $dateremise;

        return $this;
    }

    public function getMtremise(): ?float
    {
        return $this->mtremise;
    }

    public function setMtremise(?float $mtremise): self
    {
        $this->mtremise = $mtremise;

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

    public function getDateoperation(): ?\DateTimeInterface
    {
        return $this->dateoperation;
    }

    public function setDateoperation(?\DateTimeInterface $dateoperation): self
    {
        $this->dateoperation = $dateoperation;

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

    public function getIsmultiple(): ?int
    {
        return $this->ismultiple;
    }

    public function setIsmultiple(?int $ismultiple): self
    {
        $this->ismultiple = $ismultiple;

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

    public function getFrs1(): ?string
    {
        return $this->frs1;
    }

    public function setFrs1(?string $frs1): self
    {
        $this->frs1 = $frs1;

        return $this;
    }

    public function getFrs2(): ?string
    {
        return $this->frs2;
    }

    public function setFrs2(?string $frs2): self
    {
        $this->frs2 = $frs2;

        return $this;
    }

    public function getMtfrs1(): ?float
    {
        return $this->mtfrs1;
    }

    public function setMtfrs1(?float $mtfrs1): self
    {
        $this->mtfrs1 = $mtfrs1;

        return $this;
    }

    public function getMtfrs2(): ?float
    {
        return $this->mtfrs2;
    }

    public function setMtfrs2(?float $mtfrs2): self
    {
        $this->mtfrs2 = $mtfrs2;

        return $this;
    }

    public function getDatelivprv(): ?\DateTimeInterface
    {
        return $this->datelivprv;
    }

    public function setDatelivprv(?\DateTimeInterface $datelivprv): self
    {
        $this->datelivprv = $datelivprv;

        return $this;
    }

    public function getDonttva(): ?float
    {
        return $this->donttva;
    }

    public function setDonttva(?float $donttva): self
    {
        $this->donttva = $donttva;

        return $this;
    }

    public function getCdc(): ?bool
    {
        return $this->cdc;
    }

    public function setCdc(?bool $cdc): self
    {
        $this->cdc = $cdc;

        return $this;
    }

    public function getCdv(): ?bool
    {
        return $this->cdv;
    }

    public function setCdv(?bool $cdv): self
    {
        $this->cdv = $cdv;

        return $this;
    }

    public function getBec(): ?bool
    {
        return $this->bec;
    }

    public function setBec(?bool $bec): self
    {
        $this->bec = $bec;

        return $this;
    }

    public function getBev(): ?bool
    {
        return $this->bev;
    }

    public function setBev(?bool $bev): self
    {
        $this->bev = $bev;

        return $this;
    }

    public function getStLiv(): ?string
    {
        return $this->stLiv;
    }

    public function setStLiv(?string $stLiv): self
    {
        $this->stLiv = $stLiv;

        return $this;
    }

    public function getStFac(): ?string
    {
        return $this->stFac;
    }

    public function setStFac(?string $stFac): self
    {
        $this->stFac = $stFac;

        return $this;
    }

    public function getStReg(): ?string
    {
        return $this->stReg;
    }

    public function setStReg(?string $stReg): self
    {
        $this->stReg = $stReg;

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

    public function getDevise(): ?UPDevise
    {
        return $this->devise;
    }

    public function setDevise(?UPDevise $devise): self
    {
        $this->devise = $devise;

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

    public function getReferenceBci(): ?TAchatdemandeinternecab
    {
        return $this->referenceBci;
    }

    public function setReferenceBci(?TAchatdemandeinternecab $referenceBci): self
    {
        $this->referenceBci = $referenceBci;

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

    public function getPourCompte(): ?PDossier
    {
        return $this->pourCompte;
    }

    public function setPourCompte(?PDossier $pourCompte): self
    {
        $this->pourCompte = $pourCompte;

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

    /**
     * @return Collection|UaTLivraisonfrscab[]
     */
    public function getLivraisons(): Collection
    {
        return $this->livraisons;
    }

    public function addLivraison(UaTLivraisonfrscab $livraison): self
    {
        if (!$this->livraisons->contains($livraison)) {
            $this->livraisons[] = $livraison;
            $livraison->setCommande($this);
        }

        return $this;
    }

    public function removeLivraison(UaTLivraisonfrscab $livraison): self
    {
        if ($this->livraisons->contains($livraison)) {
            $this->livraisons->removeElement($livraison);
            // set the owning side to null (unless already changed)
            if ($livraison->getCommande() === $this) {
                $livraison->setCommande(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|UATCommandefrsdet[]
     */
    public function getDetails(): Collection
    {
        return $this->details;
    }

    public function addDetail(UATCommandefrsdet $detail): self
    {
        if (!$this->details->contains($detail)) {
            $this->details[] = $detail;
            $detail->setCab($this);
        }

        return $this;
    }

    public function removeDetail(UATCommandefrsdet $detail): self
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

    public function getAutreInformation(): ?string
    {
        return $this->autreInformation;
    }

    public function setAutreInformation(?string $autreInformation): self
    {
        $this->autreInformation = $autreInformation;

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
     * @return Collection|UATCommandefrscabFichier[]
     */
    public function getFichiers(): Collection
    {
        return $this->fichiers;
    }

    public function addFichier(UATCommandefrscabFichier $fichier): self
    {
        if (!$this->fichiers->contains($fichier)) {
            $this->fichiers[] = $fichier;
            $fichier->setComande($this);
        }

        return $this;
    }

    public function removeFichier(UATCommandefrscabFichier $fichier): self
    {
        if ($this->fichiers->contains($fichier)) {
            $this->fichiers->removeElement($fichier);
            // set the owning side to null (unless already changed)
            if ($fichier->getComande() === $this) {
                $fichier->setComande(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|UATCommandefrscabAcompte[]
     */
    public function getAcomptes(): Collection
    {
        return $this->acomptes;
    }

    public function addAcompte(UATCommandefrscabAcompte $acompte): self
    {
        if (!$this->acomptes->contains($acompte)) {
            $this->acomptes[] = $acompte;
            $acompte->setCommande($this);
        }

        return $this;
    }

    public function removeAcompte(UATCommandefrscabAcompte $acompte): self
    {
        if ($this->acomptes->contains($acompte)) {
            $this->acomptes->removeElement($acompte);
            // set the owning side to null (unless already changed)
            if ($acompte->getCommande() === $this) {
                $acompte->setCommande(null);
            }
        }

        return $this;
    }






    public function getArrayTotalArticleByCommande(): array
    {

        //$resultat = array();
        $prixHt = 0;
        $prixTtc = 0;
        $prixTva = 0;
        $prixRemise = 0;
        $prixTotal = 0;

        foreach ($this->getDetails() as $key => $value) {
            $prixHt = $prixHt + $value->getPrixHt();
            $prixTva = $prixTva +  $value->getPrixTva();
            $prixRemise = $prixRemise + $value->getPrixRemise();
            $prixTotal = $prixTotal + $value->getPrixTtc();
            $prixTtc = $prixTtc + $value->getPrixTtc();
        }

        $this->getDevise() ? $designation = $this->getDevise()->getDesignation() : $designation = null;

        return array("remise" => $this->getRemise(), "mremise" => $prixRemise != 0 ? $prixRemise : null, "prixTtc" => $prixTotal, "prixHt" => number_format((float)$prixHt, 2, ',', ' ') . ' ' . $designation, "prixTtc" => number_format((float)$prixTtc, 2, ',', ' ') . ' ' . $designation, "prixTvaSansDevisSansFloat" => $prixTva,"totalTtcSansDevisSansFloat" => $prixTotal,"prixTva" => number_format((float)$prixTva, 2, ',', ' ') . ' ' . $designation, "prixRemise" => $prixRemise != 0 ? number_format((float)$prixRemise, 2, ',', ' ') . ' ' . $designation : null, "totalTtc" => number_format((float)$prixTotal, 2, ',', ' ') . ' ' . $designation, "totalTtcSansDevis" => $prixTotal,"totalTtcSansDevisA" => number_format((float)$prixTotal, 2, '.', ','));
    }


    public function HasCommandeWithIcon()
    {
        $existnext = array('livraison' => ['id' => 0, 'icon' => '<i class="fa fa-square-o"></i>'], 'facture' => ['id' => 0, 'icon' => '<i class="fa fa-square-o"></i>'], 'reglement' => ['id' => 0, 'icon' => '<i class="fa fa-square-o"></i>']);
        /* if (count($this->commandes) > 0) {
            $existnext['commande']['id'] = 1;
            $existnext['commande']['icon'] = '<i class="fa fa-check-square-o"></i>';*/
        //foreach ($this->commandes as $key => $value) {
        //   dump($value->getLivraisons()); die(); 
        if ($this->livraisons !== null) {
            if (count($this->livraisons) > 0) {
                $existnext['livraison']['id'] = 1;
                $existnext['livraison']['icon'] = '<i class="fa fa-check-square-o"></i>';
                foreach ($this->livraisons as $key2 => $value2) {

                    //dump($value2->getFacture()); die(); 
                    if ($value2->getFacture() != null) {
                        $existnext['facture']['id'] = 1;
                        $existnext['facture']['icon'] = '<i class="fa fa-check-square-o"></i>';
                        /*foreach ($value2->getFacture()->getTReglementfrs() as $key3 => $value3) {
                            // dump($value3);die();

                            if ($value3 != null) {

                                $existnext['reglement']['id'] = 1;
                                $existnext['reglement']['icon'] = '<i class="fa fa-check-square-o"></i>';
                            }
                        }*/
                    }
                }
                //  }
                //}
            }
        }
        //dump($existnext);die();
        return $existnext;
    }

    public function checkAcompteAndLivraison()
    {
        $montantTotalLivraisons = 0;
        $montantAcompte = 0;
        $acompteRef = null;
        $idAcompte = null;
        $datefacture =null;
        $fournisseur =null;
        
        foreach ($this->getLivraisons() as $key => $livraison) {
            
                if ($livraison->getPPiece() == null && $livraison->getFacture()==null ) {
                    $montantTotalLivraisons +=  $livraison->getArrayTotalArticleByLivraison()['totalTtcSansDevis'];
                }
                if ($livraison->getPPiece() && $livraison->getPPiece()->getCode() == "ACR" ) {
                    $montantAcompte +=  $livraison->getFacture()->getMontant();
                    // dd($livraison->getFacture()->getMontant());
                    $acompteRef = $livraison->getFacture()->getCode();
                    $idAcompte = $livraison->getFacture()->getId();
                    $datefacture = $livraison->getFacture()->getDatefacture();
                    $fournisseur = $livraison->getFacture()->getfournisseur() ? $livraison->getFacture()->getfournisseur()->getNom():null;
                    
                }
            
        }
        $montantTotalCommande = $this->getArrayTotalArticleByCommande()['totalTtcSansDevis'];

        return array('fournisseur'=>$fournisseur,'datefacture'=>$datefacture,'acompteRef'=>$acompteRef,'idAcompte'=>$idAcompte,'montantTotalCommande' => $montantTotalCommande,"montantTotalLivraisons"=>$montantTotalLivraisons,"montantAcompte"=>$montantAcompte);

    }


    public function checkIfHasLivraisonsAndAcompte()
    {
        $acompt = false;
        $liv = false;
        foreach ($this->getLivraisons() as $key => $livraison) {
          //  echo $livraison->getPiece()->getCode();die();
                if ($livraison->getPiece() && $livraison->getPiece()->getCode() == "ACR" ) {
                    $acompt = true;
                }
                if ($livraison->getPiece() == null && $livraison->getFacture()==null ) {
                    $liv = true;
                }
        }

        return array('acompte'=>$acompt,'livraison'=>$liv);

        
    }



    public function getQuantiteLivre($detailsCommande){
        $quantiteLivre = 0;

        foreach ($this->livraisons  as $key2 => $livraison) {
            
            if($livraison->getActive()==true){
            foreach ($livraison->getDetails() as $key3 => $detailsLivraison) {
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



    
    public function getType(): ?PGlobalParamDet
    {
        return $this->type;
    }

    public function setType(?PGlobalParamDet $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function setStatutsig(?int $statutsig): void {
        $this->statutsig = $statutsig;
    }

    public function getStatutsig(): ?int {
        return $this->statutsig;
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
