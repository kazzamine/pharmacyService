<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use App\Repository\DemandStockCabRepository;
use Doctrine\Common\Collections\ArrayCollection;

#[ORM\Entity(repositoryClass: DemandStockCabRepository::class)]
class DemandStockCab
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\JoinColumn(name: 'client', nullable: true)]
    #[ORM\ManyToOne(targetEntity: UPPartenaire::class, inversedBy: 'demandStockCabs')]
    private $uPPartenaire;

    #[ORM\OneToMany(targetEntity: LivraisonStockCab::class, mappedBy: 'demandStockCab')]
    private $livraisonStockCabs;

    #[ORM\OneToMany(targetEntity: \App\Entity\UmouvementAntenne::class, mappedBy: 'demandeCab')]
    private $umouvementAntennes;

    #[ORM\JoinColumn(nullable: false)]
    #[ORM\ManyToOne(targetEntity: CommandeType::class, inversedBy: 'demandStockCabs')]
    private $commandeType;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $code;
    #[ORM\Column(type: 'integer', length: 255, nullable: true)]
    private $besoin;

    #[ORM\ManyToOne(targetEntity: PDossier::class, inversedBy: 'demandStockCabs')]
    private $demandeur;

    #[ORM\ManyToOne(targetEntity: PDossier::class, inversedBy: 'demandStockCabs')]
    private $recepteur;

    #[ORM\ManyToOne(targetEntity: DemandStatus::class, inversedBy: 'demandStockCabs')]
    private $status;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private $date;

    #[ORM\OneToMany(targetEntity: DemandeStockDet::class, mappedBy: 'demandeCab')]
    private $demandeStockDets;


    #[ORM\ManyToOne(targetEntity: Uantenne::class, inversedBy: 'demandStockCabs')]
    private $uantenne;
    #[ORM\JoinColumn(name: 'antenne_demandeur_id', referencedColumnName: 'id', nullable: true)]
    #[ORM\ManyToOne(targetEntity: Uantenne::class, inversedBy: 'demandStockCabs')]
    private $antenne_demandeur;


    #[ORM\ManyToOne(targetEntity: DemandeTypeOp::class, inversedBy: 'demandStockCabs')]
    private $typeop;
    #[ORM\JoinColumn(name: 'demande_achat_id', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: TAchatdemandeinternecab::class, inversedBy: 'demandeStockCabs')]
    private $demandeAchat;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $observation;
    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $di;
    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $ipp;
    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $dossierPatient;
    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $patient;
    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $tipo_facturac;
    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $fileName;

    #[ORM\Column(type: 'float', length: 11, nullable: true)]
    private $active;
    #[ORM\Column(type: 'float', length: 11, nullable: true)]
    private $urgent;
    #[ORM\JoinColumn(name: 'user_created', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \User::class)]
    private $userCreated;
    #[ORM\JoinColumn(name: 'user_annule', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \User::class)]
    private $userAnnule;
    #[ORM\Column(type: 'datetime', nullable: true)]
    private $dateAnnule;
    #[ORM\JoinColumn(name: 'user_chiffre', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \User::class)]
    private $userChiffre;
    #[ORM\Column(type: 'datetime', nullable: true)]
    private $dateChiffre;
    #[ORM\JoinColumn(name: 'user_valide', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \User::class)]
    private $userValide;
    #[ORM\Column(type: 'datetime', nullable: true)]
    private $dateValide;
    #[ORM\JoinColumn(name: 'user_prete', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \User::class)]
    private $userPrete;
    #[ORM\Column(type: 'datetime', nullable: true)]
    private $datePrete;
    #[ORM\JoinColumn(name: 'user_partielle', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \User::class)]
    private $userPartielle;
    #[ORM\Column(type: 'datetime', nullable: true)]
    private $datePartielle;
    #[ORM\JoinColumn(name: 'user_cloture', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \User::class)]
    private $userCloture;
    #[ORM\Column(type: 'datetime', nullable: true)]
    private $dateCloture;
    #[ORM\JoinColumn(name: 'user_facture', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \User::class)]
    private $userFacture;
    #[ORM\Column(type: 'datetime', nullable: true)]
    private $dateFacture;

    #[ORM\OneToMany(targetEntity: \App\Entity\StockSs::class, mappedBy: 'demandeCab')]
    private $stockSses;


    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $refDocAsso;
    #[ORM\OneToMany(targetEntity: DemandStockCab::class, mappedBy: 'parent')]
    private $children;

    #[ORM\ManyToOne(targetEntity: DemandStockCab::class, inversedBy: 'children')]
    private $parent;

    public function __construct()
    {
        $this->demandeStockDets = new ArrayCollection();
        $this->umouvementAntennes = new ArrayCollection();
        $this->stockSses = new ArrayCollection();
        $this->livraisonStockCabs = new ArrayCollection();
        $this->children = new ArrayCollection();
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
    public function getBesoin(): ?int
    {
        return $this->besoin;
    }

    public function setBesoin(?int $besoin): self
    {
        $this->besoin = $besoin;

        return $this;
    }

    public function getActive(): ?float
    {
        return $this->active;
    }

    public function setActive(?float $active): self
    {
        $this->active = $active;

        return $this;
    }
    public function getUrgent(): ?float
    {
        return $this->urgent;
    }

    public function setUrgent(?float $urgent): self
    {
        $this->urgent = $urgent;

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
    public function getDi(): ?string
    {
        return $this->di;
    }

    public function setDi(?string $di): self
    {
        $this->di = $di;

        return $this;
    }
    public function getIpp(): ?string
    {
        return $this->ipp;
    }

    public function setIpp(?string $ipp): self
    {
        $this->ipp = $ipp;

        return $this;
    }
    public function getDossierPatient(): ?string
    {
        return $this->dossierPatient;
    }

    public function setDossierPatient(?string $dossierPatient): self
    {
        $this->dossierPatient = $dossierPatient;

        return $this;
    }
    public function getPatient(): ?string
    {
        return $this->patient;
    }

    public function setPatient(?string $patient): self
    {
        $this->patient = $patient;

        return $this;
    }
    public function getTipoFacturac(): ?string
    {
        return $this->tipo_facturac;
    }

    public function setTipoFacturac(?string $tipo_facturac): self
    {
        $this->tipo_facturac = $tipo_facturac;

        return $this;
    }
    public function getFileName(): ?string
    {
        return $this->fileName;
    }

    public function setFileName(?string $fileName): self
    {
        $this->fileName = $fileName;

        return $this;
    }

    public function getRefDocAsso(): ?string
    {
        return $this->refDocAsso;
    }

    public function setRefDocAsso(?string $refDocAsso): self
    {
        $this->refDocAsso = $refDocAsso;

        return $this;
    }

    public function getDemandeur(): ?PDossier
    {
        return $this->demandeur;
    }

    public function setDemandeur(?PDossier $demandeur): self
    {
        $this->demandeur = $demandeur;

        return $this;
    }

    public function getRecepteur(): ?PDossier
    {
        return $this->recepteur;
    }

    public function setRecepteur(?PDossier $recepteur): self
    {
        $this->recepteur = $recepteur;

        return $this;
    }

    public function getStatus(): ?DemandStatus
    {
        return $this->status;
    }

    public function setStatus(?DemandStatus $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getTypeop(): ?DemandeTypeOp
    {
        return $this->typeop;
    }

    public function setTypeop(?DemandeTypeOp $typeop): self
    {
        $this->typeop = $typeop;

        return $this;
    }
    public function getDemandeAchat(): ?TAchatdemandeinternecab
    {
        return $this->demandeAchat;
    }

    public function setDemandeAchat(?TAchatdemandeinternecab $demandeAchat): self
    {
        $this->demandeAchat = $demandeAchat;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(?\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }
    public function getDateAnnule(): ?\DateTimeInterface
    {
        return $this->dateAnnule;
    }

    public function setDateAnnule(?\DateTimeInterface $dateAnnule): self
    {
        $this->dateAnnule = $dateAnnule;

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
            $demandeStockDet->setDemandeCab($this);
        }

        return $this;
    }

    public function removeDemandeStockDet(DemandeStockDet $demandeStockDet): self
    {
        if ($this->demandeStockDets->removeElement($demandeStockDet)) {
            // set the owning side to null (unless already changed)
            if ($demandeStockDet->getDemandeCab() === $this) {
                $demandeStockDet->setDemandeCab(null);
            }
        }

        return $this;
    }

    public function getUantenne(): ?Uantenne
    {
        return $this->uantenne;
    }

    public function setUantenne(?Uantenne $uantenne): self
    {
        $this->uantenne = $uantenne;

        return $this;
    }
    public function getAntenneDemandeur(): ?Uantenne
    {
        return $this->antenne_demandeur;
    }

    public function setAntenneDemandeur(?Uantenne $antenne_demandeur): self
    {
        $this->antenne_demandeur = $antenne_demandeur;

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



    public function getUserAnnule(): ?User
    {
        return $this->userAnnule;
    }

    public function setUserAnnule(?User $userAnnule): self
    {
        $this->userAnnule = $userAnnule;

        return $this;
    }
    public function getUserChiffre(): ?User
    {
        return $this->userChiffre;
    }

    public function setUserChiffre(?User $userChiffre): self
    {
        $this->userChiffre = $userChiffre;

        return $this;
    }
    public function getDateChiffre(): ?\DateTimeInterface
    {
        return $this->dateChiffre;
    }

    public function setDateChiffre(?\DateTimeInterface $dateChiffre): self
    {
        $this->dateChiffre = $dateChiffre;

        return $this;
    }



    public function getUserValide(): ?User
    {
        return $this->userValide;
    }

    public function setUserValide(?User $userValide): self
    {
        $this->userValide = $userValide;

        return $this;
    }
    public function getDateValide(): ?\DateTimeInterface
    {
        return $this->dateValide;
    }

    public function setDateValide(?\DateTimeInterface $dateValide): self
    {
        $this->dateValide = $dateValide;

        return $this;
    }



    public function getUserPrete(): ?User
    {
        return $this->userPrete;
    }

    public function setUserPrete(?User $userPrete): self
    {
        $this->userPrete = $userPrete;

        return $this;
    }
    public function getDatePrete(): ?\DateTimeInterface
    {
        return $this->datePrete;
    }

    public function setDatePrete(?\DateTimeInterface $datePrete): self
    {
        $this->datePrete = $datePrete;

        return $this;
    }


    public function getUserPartielle(): ?User
    {
        return $this->userPartielle;
    }

    public function setUserPartielle(?User $userPartielle): self
    {
        $this->userPartielle = $userPartielle;

        return $this;
    }
    public function getDatePartielle(): ?\DateTimeInterface
    {
        return $this->datePartielle;
    }

    public function setDatePartielle(?\DateTimeInterface $datePartielle): self
    {
        $this->datePartielle = $datePartielle;

        return $this;
    }


    public function getUserCloture(): ?User
    {
        return $this->userCloture;
    }

    public function setUserCloture(?User $userCloture): self
    {
        $this->userCloture = $userCloture;

        return $this;
    }
    public function getDateCloture(): ?\DateTimeInterface
    {
        return $this->dateCloture;
    }

    public function setDateCloture(?\DateTimeInterface $dateCloture): self
    {
        $this->dateCloture = $dateCloture;

        return $this;
    }



    public function getUserFacture(): ?User
    {
        return $this->userFacture;
    }

    public function setUserFacture(?User $userFacture): self
    {
        $this->userFacture = $userFacture;

        return $this;
    }
    public function getDateFacture(): ?\DateTimeInterface
    {
        return $this->dateFacture;
    }

    public function setDateFacture(?\DateTimeInterface $dateFacture): self
    {
        $this->dateFacture = $dateFacture;

        return $this;
    }
    /**
     * @return Collection|UmouvementAntenne[]
     */
    public function getUmouvementAntennes(): Collection
    {
        return $this->umouvementAntennes;
    }

    public function addUmouvementAntenne(UmouvementAntenne $umouvementAntenne): self
    {
        if (!$this->umouvementAntennes->contains($umouvementAntenne)) {
            $this->umouvementAntennes[] = $umouvementAntenne;
            $umouvementAntenne->setDemandeCab($this);
        }

        return $this;
    }

    public function removeUmouvementAntenne(UmouvementAntenne $umouvementAntenne): self
    {
        if ($this->umouvementAntennes->contains($umouvementAntenne)) {
            $this->umouvementAntennes->removeElement($umouvementAntenne);
            if ($umouvementAntenne->getDemandeCab() === $this) {
                $umouvementAntenne->setDemandeCab(null);
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
            $stockSs->setDemandeCab($this);
        }

        return $this;
    }

    public function removeStockSs(StockSs $stockSs): self
    {
        if ($this->stockSses->contains($stockSs)) {
            $this->stockSses->removeElement($stockSs);
            // set the owning side to null (unless already changed)
            if ($stockSs->getDemandeCab() === $this) {
                $stockSs->setDemandeCab(null);
            }
        }

        return $this;
    }

    public function addChild(DemandStockCab $child): self
    {
        if (!$this->children->contains($child)) {
            $this->children[] = $child;
            $child->setParent($this);
        }

        return $this;
    }

    public function removeChild(DemandStockCab $child): self
    {
        if ($this->children->removeElement($child)) {
            $child->setParent(null);
        }

        return $this;
    }

    public function getChildren(): Collection
    {
        return $this->children;
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


    public function getCommandeType(): ?CommandeType
    {
        return $this->commandeType;
    }

    public function setCommandeType(?CommandeType $commandeType): self
    {
        $this->commandeType = $commandeType;

        return $this;
    }

    /**
     * @return Collection|LivraisonStockCab[]
     */
    public function getLivraisonStockCabs(): Collection
    {
        return $this->livraisonStockCabs;
    }

    public function addLivraisonStockCab(LivraisonStockCab $livraisonStockCab): self
    {
        if (!$this->livraisonStockCabs->contains($livraisonStockCab)) {
            $this->livraisonStockCabs[] = $livraisonStockCab;
            $livraisonStockCab->setDemandStockCab($this);
        }

        return $this;
    }

    public function removeLivraisonStockCab(LivraisonStockCab $livraisonStockCab): self
    {
        if ($this->livraisonStockCabs->removeElement($livraisonStockCab)) {
            // set the owning side to null (unless already changed)
            if ($livraisonStockCab->getDemandStockCab() === $this) {
                $livraisonStockCab->setDemandStockCab(null);
            }
        }

        return $this;
    }
    public function getUPPartenaire(): ?UPPartenaire
    {
        return $this->uPPartenaire;
    }

    public function setUPPartenaire(?UPPartenaire $uPPartenaire): self
    {
        $this->uPPartenaire = $uPPartenaire;

        return $this;
    }
}
