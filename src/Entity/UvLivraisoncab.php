<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: "App\Repository\UvLivraisoncabRepository")]
#[ORM\HasLifecycleCallbacks]
class UvLivraisoncab
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    private ?int $id;

    #[ORM\Column(name: "code", type: "string", length: 100, nullable: true)]
    private ?string $code;

    #[ORM\Column(type: "string", length: 255, nullable: true)]
    private ?string $responsable;

    #[ORM\ManyToOne(targetEntity: PPiece::class)]
    #[ORM\JoinColumn(name: "p_piece_id", referencedColumnName: "id")]
    private $pPiece;

    #[ORM\Column(name: "datelivraison", type: "datetime", nullable: true)]
    private $datelivraison;

    #[ORM\Column(type: "string", length: 255, nullable: true)]
    private ?string $remise;

    #[ORM\Column(name: "dateremise", type: "datetime", nullable: true)]
    private $dateremise;

    #[ORM\Column(name: "mtremise", type: "float", nullable: true)]
    private $mtremise;

    #[ORM\Column(type: "text", nullable: true)]
    private ?string $observation;

    #[ORM\Column(name: "dateoperation", type: "datetime", nullable: true)]
    private $dateoperation;

    #[ORM\Column(type: "string", length: 255, nullable: true)]
    private ?string $utilisateur;

    #[ORM\Column(name: "statut", type: "string", length: 255, nullable: true)]
    private ?string $st;

    #[ORM\Column(name: "dateDocAsso", type: "datetime", nullable: true)]
    private $datedocasso;

    #[ORM\Column(type: "integer", nullable: true)]
    private ?int $signature1 = 0;

    #[ORM\Column(type: "integer", nullable: true)]
    private ?int $signature2 = 0;

    #[ORM\Column(type: "integer", nullable: true)]
    private ?int $signature3 = 0;

    #[ORM\Column(type: "integer", nullable: true)]
    private ?int $signature4 = 0;

    #[ORM\Column(type: "float", nullable: true)]
    private ?float $depense;

    #[ORM\Column(name: "refDocAsso", type: "string", length: 255, nullable: true)]
    private ?string $refdocasso;

    #[ORM\ManyToOne(targetEntity: UvCommandecab::class, inversedBy: "livraison")]
    #[ORM\JoinColumn(name: "uv_commandecab_id", referencedColumnName: "id")]
    private $commande;

    #[ORM\ManyToOne(targetEntity: PStatutgrv::class)]
    #[ORM\JoinColumn(name: "p_statutgrv_id", referencedColumnName: "id")]
    private $statut;

    #[ORM\ManyToOne(targetEntity: PDossier::class)]
    #[ORM\JoinColumn(name: "p_dossier_id", referencedColumnName: "id")]
    private $dossier;

    #[ORM\ManyToOne(targetEntity: UPPartenaire::class)]
    #[ORM\JoinColumn(name: "partenaire_client_id", referencedColumnName: "id")]
    private $client;

    #[ORM\ManyToOne(targetEntity: PComptemasse::class)]
    private $compteMasse;

    #[ORM\ManyToOne(targetEntity: PCompterubrique::class)]
    private $compteRubrique;

    #[ORM\ManyToOne(targetEntity: PCompteposte::class)]
    #[ORM\JoinColumn(nullable: true)]
    private $comptePoste;

    #[ORM\ManyToOne(targetEntity: PCompte::class)]
    #[ORM\JoinColumn(nullable: true)]
    private $compte;

    #[ORM\Column(name: "created", type: "datetime", nullable: true)]
    private $created;

    #[ORM\Column(name: "updated", type: "datetime", nullable: true)]
    private $updated;

    #[ORM\ManyToOne(targetEntity: User::class)]
    #[ORM\JoinColumn(name: "user_created", referencedColumnName: "id")]
    private $userCreated;

    #[ORM\ManyToOne(targetEntity: User::class)]
    #[ORM\JoinColumn(name: "user_updated", referencedColumnName: "id")]
    private $userUpdated;

    #[ORM\Column(type: "boolean", nullable: true)]
    private ?bool $active;

    #[ORM\OneToMany(targetEntity: UvLivraisondet::class, mappedBy: "cab", cascade: ["persist", "remove"])]
    private $details;

    #[ORM\ManyToOne(targetEntity: User::class)]
    private $userValider;

    #[ORM\Column(type: "datetime", nullable: true)]
    private $dateValider;

    #[ORM\ManyToOne(targetEntity: User::class)]
    private $userGenerer;

    #[ORM\Column(type: "datetime", nullable: true)]
    private $dateGenerer;

    #[ORM\ManyToOne(targetEntity: User::class)]
    private $userAnnuler;

    #[ORM\Column(type: "datetime", nullable: true)]
    private $dateAnnuler;

    #[ORM\ManyToOne(targetEntity: User::class)]
    private $userEncours;

    #[ORM\Column(type: "datetime", nullable: true)]
    private $dateEncours;

    #[ORM\ManyToOne(targetEntity: User::class)]
    private $userArchiver;

    #[ORM\Column(type: "datetime", nullable: true)]
    private $dateArchiver;

    #[ORM\Column(name: "positionActuel", type: "string", length: 100, nullable: true)]
    public ?string $positionActuel = 'creer';

    #[ORM\ManyToOne(targetEntity: UvFacturecab::class, inversedBy: "livraisons")]
    #[ORM\JoinColumn(name: "uv_facturecab_id", referencedColumnName: "id")]
    private $facture;

    #[ORM\ManyToOne(targetEntity: UPDevise::class)]
    #[ORM\JoinColumn(name: "u_p_devise_id", referencedColumnName: "id")]
    private $devise;

    #[ORM\Column(type: "text", nullable: true)]
    private ?string $description;

    #[ORM\Column(type: "string", length: 255, nullable: true)]
    private ?string $oldSys;

    #[ORM\Column(type: "string", length: 255, nullable: true)]
    private ?string $lettrageAdonix;

    #[ORM\Column(type: "integer", nullable: true)]
    private ?int $commandecliInit;

    #[ORM\Column(type: "boolean", nullable: true)]
    private ?bool $isdeleted;

    #[ORM\Column(type: "integer", nullable: true)]
    private ?int $statutsig = 0;

    #[ORM\Column(type: "boolean", nullable: true)]
    private ?bool $isAvoir;

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

    public function getOldSys(): ?string
    {
        return $this->oldSys;
    }

    public function setOldSys(?string $oldSys): self
    {
        $this->oldSys = $oldSys;

        return $this;
    }



    /**
     * @ORM\PrePersist
     */
    public function setCreatedValue()
    {

        $this->created = new \DateTime();
    }

    /**
     * @ORM\PreUpdate
     */
    public function setUpdatedValue()
    {
        $this->updated = new \DateTime();
    }

    public function __construct()
    {

        $this->details = new ArrayCollection();
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

    public function getResponsable(): ?string
    {
        return $this->responsable;
    }

    public function setResponsable(?string $responsable): self
    {
        $this->responsable = $responsable;

        return $this;
    }

    public function getDatelivraison(): ?\DateTimeInterface
    {
        return $this->datelivraison;
    }

    public function setDatelivraison(?\DateTimeInterface $datelivraison): self
    {
        $this->datelivraison = $datelivraison;

        return $this;
    }

    public function getRemise(): ?string
    {
        return $this->remise;
    }

    public function setRemise(?string $remise): self
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

    public function getSt(): ?string
    {
        return $this->st;
    }

    public function setSt(?string $st): self
    {
        $this->st = $st;

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

    public function getDepense(): ?float
    {
        return $this->depense;
    }

    public function setDepense(?float $depense): self
    {
        $this->depense = $depense;

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

    public function getCommande(): ?UvCommandecab
    {
        return $this->commande;
    }

    public function setCommande(?UvCommandecab $commande): self
    {
        $this->commande = $commande;

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

    public function getDossier(): ?PDossier
    {
        return $this->dossier;
    }

    public function setDossier(?PDossier $dossier): self
    {
        $this->dossier = $dossier;

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
     * @return Collection|UvLivraisondet[]
     */
    public function getDetails(): Collection
    {
        return $this->details;
    }

    public function getTotalPrixDetails(){
        $prix=0;
        foreach ($this->details as $key => $value) {
            $prix+= $value->getPrixttc();

        }
        return $prix;

    }

    public function addDetail(UvLivraisondet $detail): self
    {
        if (!$this->details->contains($detail)) {
            $this->details[] = $detail;
            $detail->setCab($this);
        }

        return $this;
    }

    public function removeDetail(UvLivraisondet $detail): self
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



    public function getFacture(): ?UvFacturecab
    {
        return $this->facture;
    }

    public function setFacture(?UvFacturecab $facture): self
    {
        $this->facture = $facture;

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


    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function HasCommandeWithIcon()
    {
        $existnext = array('facture' => ['id' => 0, 'icon' => '<i class="fa fa-square-o"></i>'], 'reglement' => ['id' => 0, 'icon' => '<i class="fa fa-square-o"></i>']);

        /*if ($this->livraisons !== null) {
            if (count($this->livraisons) > 0) {
                $existnext['livraison']['id'] = 1;
                $existnext['livraison']['icon'] = '<i class="fa fa-check-square-o"></i>';
                foreach ($this->livraisons as $key2 => $value2) {*/

        //  dump($value2->getFacture()); die(); 
        if ($this->facture !== null) {
            $existnext['facture']['id'] = 1;
            $existnext['facture']['icon'] = '<i class="fa fa-check-square-o"></i>';
            foreach ($this->facture->getReglements() as $key3 => $value3) {
                // dump($value3);die();

                if ($value3 !== null) {

                    $existnext['reglement']['id'] = 1;
                    $existnext['reglement']['icon'] = '<i class="fa fa-check-square-o"></i>';
                }
                /* }
                    }
                }*/
            }
        }

        return $existnext;
    }



    public function getArrayTotalArticleByLivraison(?UvLivraisoncab $livraison): array
    {

        //$resultat = array();
        $prixHt = 0;
        $prixTtc = 0;
        $prixTva = 0;
        $prixRemise = 0;
        $prixTotal = 0;
        //dump($facture);die();

        foreach ($livraison->getDetails() as $key => $value) {
           // dump($value->getPrixTva());

            $prixHt = $prixHt + $value->getPrixHt();
            $prixTva = $prixTva + $value->getPrixTva();
            $prixRemise = $prixRemise + $value->getPrixRemise();
            $prixTotal = $prixTotal + $value->getPrixTTcAvecRemise();
            $prixTtc = $prixTtc + $value->getTotalPrixTtc();
        }

        $livraison->getDevise() ? $designation = $livraison->getDevise()->getDesignation() : $designation = null;
        $pTva = 0;
        $pTva = $prixTva - $prixRemise;
        $ptotal = ($prixHt + $pTva ) - $prixRemise;
        //dump($prixTva);die();
        return array("remise" => $livraison->getRemise(), "mremise" => $prixRemise != 0 ? $prixRemise : null, "prixT"=>$ptotal ,"prixTtc2" => $prixTotal, "prixHt" => number_format((float)$prixHt, 2, ',', ' ') . ' ' . $designation, "prixTtc" => number_format((float)$prixTtc, 2, ',', ' ') . ' ' . $designation, "prixTva" => number_format((float)$prixTva, 2, ',', ' ') . ' ' . $designation, "prixRemise" => $prixRemise != 0 ? number_format((float)$prixRemise, 2, ',', ' ') . ' ' . $designation : null, "totalTtc" => number_format((float)$prixTotal, 2, ',', ' ') . ' ' . $designation, "totalTtcSansDevis" => $prixTotal , "prixTvaSansDevise" => $prixTva ,"prixHtSansDevise" =>$prixHt);
    }

     
    function float2alpha($number)
    {
        $obj = new nuts($number, $this->getDevise()->getAbreviation());
        $text = $obj->convert("fr-FR");
        $nb = $obj->getFormated(" ", ",");
        return $text;
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
    public function getCommandecliInit(): ?int
    {
        return $this->commandecliInit;
    }

    public function setCommandecliInit(?int $commandecliInit): self
    {
        $this->commandecliInit = $commandecliInit;

        return $this;
    }
    public function setStatutsig(?int $statutsig): void {
        $this->statutsig = $statutsig;
    }

    public function getStatutsig(): ?int {
        return $this->statutsig;
    }
    public function getIsAvoir(): ?bool
    {
        return $this->isAvoir;
    }

    public function setIsAvoir(bool $isAvoir): self
    {
        $this->isAvoir = $isAvoir;

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
