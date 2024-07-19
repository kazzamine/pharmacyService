<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: \App\Repository\PMarcheRepository::class)]
#[UniqueEntity('reference')]
class PMarche
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
    #[Assert\NotBlank]
    #[ORM\Column(type: 'text', nullable: true)]
    private $designation;

    #[ORM\Column(type: 'text', nullable: true)]
    private $description;

    /**
     *
     * @var \DateTime
     *
     *
     */
    #[ORM\Column(type: 'datetime', nullable: true)]
    private $created;

    /**
     *
     * @var \DateTime
     *
     */
    #[ORM\Column(type: 'datetime', nullable: true)]
    private $updated;

    #[ORM\JoinColumn(referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \User::class)]
    private $userCreated;

    #[ORM\JoinColumn(referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \User::class)]
    private $userUpdated;
    #[ORM\OneToMany(targetEntity: \App\Entity\TAchatdemandeinternecab::class, mappedBy: 'marche')]
    private $tAchatdemandeinternecabs;

    #[ORM\Column(type: 'text', nullable: true)]
    private $descriptionDetail;

    #[ORM\Column(type: 'date', nullable: true)]
    private $dateDebut;

    #[ORM\Column(type: 'date', nullable: true)]
    private $dateFin;

    #[ORM\Column(type: 'float', nullable: true)]
    private $montant;

    
    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $reference;
    
    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $lotMarche;

    /**
     * @var int|null
     */
    #[ORM\Column(name: 'active', type: 'boolean', nullable: true)]
    private $active ;

   
    /**
     * @var int
     */
    #[ORM\Column(type: 'boolean', nullable: true)]
    private $cloturer;
    
    
    
     /**
     * @var int
     */
    #[ORM\Column(type: 'boolean', nullable: true)]
    private $facturer ;


    #[ORM\OneToMany(targetEntity: \App\Entity\PMarcheSous::class, mappedBy: 'marche')]
    private $sous;

    #[ORM\JoinTable(name: 'p_marches_dossiers')]
    #[Assert\Count(min: '1', minMessage: 'Cette valeur ne doit pas être vide.')]
    #[ORM\ManyToMany(targetEntity: \App\Entity\PDossier::class, inversedBy: 'marches')]
    private $dossiers;
     #[ORM\ManyToOne(targetEntity: \App\Entity\UPResponsable::class, inversedBy: 'uPProjets')]
    private $responsable;

     #[ORM\OneToMany(targetEntity: \App\Entity\PMarcheDet::class, mappedBy: 'PMarche')]
    private $pMarcheDets;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $numeroAppelOffre;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $annee;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $valider;

     #[ORM\ManyToOne(targetEntity: \App\Entity\TypeMarche::class, inversedBy: 'pMarches')]
    private $typeMarche;

    #[ORM\ManyToOne(targetEntity: \App\Entity\TypeNatureMarche::class, inversedBy: 'pMarches')]
    private $typeNatureMarche;

    #[ORM\ManyToOne(targetEntity: \App\Entity\UPPartenaire::class, inversedBy: 'pMarches')]
    private $tiers;

    #[ORM\JoinColumn(name: 'nature_achat_id', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \App\Entity\NatureAchat::class)]
    private $natureAchat;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private $DateEngagement;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private $dateOuverture;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private $dateVisa;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private $dateApprobation;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private $dateAccuse;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private $dateLancement;

    #[ORM\ManyToOne(targetEntity: \App\Entity\TypeDepense::class, inversedBy: 'pMarches')]
    private $depense;

    #[ORM\ManyToOne(targetEntity: \App\Entity\ImputationBudgetaire::class, inversedBy: 'pMarches')]
    private $imputation;

    #[ORM\ManyToOne(targetEntity: \App\Entity\NaturePrestation::class, inversedBy: 'pMarches')]
    private $naturePrestation;

    #[ORM\ManyToOne(targetEntity: \App\Entity\Destination::class, inversedBy: 'pMarches')]
    private $destination;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private $datePublication;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private $dateAttribution;

    #[ORM\ManyToOne(targetEntity: \App\Entity\NatureDepense::class, inversedBy: 'pMarches')]
    private $natureDepense;

    #[ORM\ManyToMany(targetEntity: \App\Entity\TypeNatureDepense::class, mappedBy: 'marche')]
    private $typeNatureDepenses;

       #[ORM\ManyToMany(targetEntity: \App\Entity\NatureAchat::class, mappedBy: 'marche')]
    private $natureAchats;

      #[ORM\Column(type: 'integer', nullable: true)]
    private $jPenalite;


    #[ORM\ManyToOne(targetEntity: \App\Entity\Chapitre::class, inversedBy: 'pMarches')]
    private $chapitre;

    #[ORM\ManyToOne(targetEntity: \App\Entity\Programme::class, inversedBy: 'pMarches')]
    private $programme;

    #[ORM\ManyToOne(targetEntity: \App\Entity\Region::class, inversedBy: 'pMarches')]
    private $region;

    #[ORM\ManyToOne(targetEntity: \App\Entity\Projet::class, inversedBy: 'pMarches')]
    private $projet;

    #[ORM\ManyToOne(targetEntity: \App\Entity\LigneBudgetaire::class, inversedBy: 'pMarches')]
    private $ligneB;

        #[ORM\OneToMany(targetEntity: \App\Entity\ImputationBudgetaire::class, mappedBy: 'marche')]
    private $imputationBudgetaires;


    #[ORM\Column(type: 'float', nullable: true)]
    private $MontantTotalHt;

    #[ORM\Column(type: 'float', nullable: true)]
    private $MontantTotalTtc;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $MontantTotalTtcLettre;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $signature;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $positionActuel;




    



    public function __construct()
    {
        $this->tAchatdemandeinternecabs = new ArrayCollection();
        $this->sous = new ArrayCollection();
        $this->dossiers = new ArrayCollection();
        $this->pMarcheDets = new ArrayCollection();
        $this->typeNatureDepenses = new ArrayCollection();      
        $this->natureAchats = new ArrayCollection();
        $this->imputationBudgetaires = new ArrayCollection();




    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDesignation(): ?string
    {
        return $this->designation;
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
    public function setDesignation(?string $designation): self
    {
        $this->designation = $designation;

        return $this;
    }

    /**
     * @return Collection|TAchatdemandeinternecab[]
     */
    public function getTAchatdemandeinternecabs(): Collection
    {
        return $this->tAchatdemandeinternecabs;
    }

    public function addTAchatdemandeinternecab(TAchatdemandeinternecab $tAchatdemandeinternecab): self
    {
        if (!$this->tAchatdemandeinternecabs->contains($tAchatdemandeinternecab)) {
            $this->tAchatdemandeinternecabs[] = $tAchatdemandeinternecab;
            $tAchatdemandeinternecab->setMarche($this);
        }

        return $this;
    }

    public function removeTAchatdemandeinternecab(TAchatdemandeinternecab $tAchatdemandeinternecab): self
    {
        if ($this->tAchatdemandeinternecabs->contains($tAchatdemandeinternecab)) {
            $this->tAchatdemandeinternecabs->removeElement($tAchatdemandeinternecab);
            // set the owning side to null (unless already changed)
            if ($tAchatdemandeinternecab->getMarche() === $this) {
                $tAchatdemandeinternecab->setMarche(null);
            }
        }

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

    public function getName(): ?string
    {
     

        return $this->getReference().'-'.$this->getDescription();
    }

    public function getDateDebut(): ?\DateTimeInterface
    {
        return $this->dateDebut;
    }

    public function setDateDebut(?\DateTimeInterface $dateDebut): self
    {
        $this->dateDebut = $dateDebut;

        return $this;
    }

    public function getDateFin(): ?\DateTimeInterface
    {
        return $this->dateFin;
    }

    public function setDateFin(?\DateTimeInterface $dateFin): self
    {
        $this->dateFin = $dateFin;

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

    public function getReference(): ?string
    {
        return $this->reference;
    }

    public function setReference(?string $reference): self
    {
        $this->reference = $reference;

        return $this;
    }
    public function getLotMarche(): ?string
    {
        return $this->lotMarche;
    }

    public function setLotMarche(?string $lotMarche): self
    {
        $this->lotMarche = $lotMarche;

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


    public function getTiers(): ?UPPartenaire
    {
        return $this->tiers;
    }

    public function setTiers(?UPPartenaire $tiers): self
    {
        $this->tiers = $tiers;

        return $this;
    }


    /**
     * @return Collection|Uarticle[]
     */
    public function getSous(): Collection
    {
        return $this->sous;
    }

    public function addSous(PMarchesous $sous): self
    {
        if (!$this->sous->contains($sous)) {
            $this->sous[] = $sous;
            $sous->setMarche($this);
        }

        return $this;
    }

    public function removeSous(PMarchesous $sous): self
    {
        if ($this->sous->contains($sous)) {
            $this->sous->removeElement($sous);
            // set the owning side to null (unless already changed)
            if ($sous->getMarche() === $this) {
                $sous->setMarche(null);
            }
        }

        return $this;
    }

    public function getCloturer(): ?bool
    {
        return $this->cloturer;
    }

    public function setCloturer(?bool $cloturer): self
    {
        $this->cloturer = $cloturer;

        return $this;
    }

    public function getFacturer(): ?bool
    {
        return $this->facturer;
    }

    public function setFacturer(?bool $facturer): self
    {
        $this->facturer = $facturer;

        return $this;
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


    public function getNumeroAppelOffre(): ?string
    {
        return $this->numeroAppelOffre;
    }

    public function setNumeroAppelOffre(?string $numeroAppelOffre): self
    {
        $this->numeroAppelOffre = $numeroAppelOffre;

        return $this;
    }

    public function getAnnee(): ?string
    {
        return $this->annee;
    }

    public function setAnnee(?string $annee): self
    {
        $this->annee = $annee;

        return $this;
    }

    public function getValider(): ?int
    {
        return $this->valider;
    }

    public function setValider(?int $valider): self
    {
        $this->valider = $valider;

        return $this;
    }

    public function getTypeMarche(): ?TypeMarche
    {
        return $this->typeMarche;
    }

    public function setTypeMarche(?TypeMarche $typeMarche): self
    {
        $this->typeMarche = $typeMarche;

        return $this;
    }


    public function getTypeNatureMarche(): ?TypeNatureMarche
    {
        return $this->typeNatureMarche;
    }

    public function setTypeNatureMarche(?TypeNatureMarche $typeNatureMarche): self
    {
        $this->typeNatureMarche = $typeNatureMarche;

        return $this;
    }

    #[ORM\Column(type: 'integer', nullable: true)]
    private $ordreService;



    /**
     * @return Collection|PDossier[]|null
     */
    public function getDossiers(): ?Collection
    {
        return $this->dossiers;
    }

    public function addDossier(PDossier $dossier): self
    {   
      
        if (!$this->dossiers->contains($dossier)) {
            $this->dossiers[] = $dossier;
        }

        return $this;
    }

  

    public function removeDossier(PDossier $dossier): self
    {
        if ($this->dossiers->contains($dossier)) {
            $this->dossier->removeElement($dossier);
        }

        return $this;
    }
    public function getResponsable(): ?UPResponsable
    {
        return $this->responsable;
    }

    public function setResponsable(?UPResponsable $responsable): self
    {
        $this->responsable = $responsable;

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
            $pMarcheDet->setPMarche($this);
        }

        return $this;
    }

    public function removePMarcheDet(PMarcheDet $pMarcheDet): self
    {
        if ($this->pMarcheDets->contains($pMarcheDet)) {
            $this->pMarcheDets->removeElement($pMarcheDet);
            // set the owning side to null (unless already changed)
            if ($pMarcheDet->getPMarche() === $this) {
                $pMarcheDet->setPMarche(null);
            }
        }

        return $this;
    }
    
    public function getNatureAchat(): ?NatureAchat
    {
        return $this->natureAchat;
    }

    public function setNatureAchat(?NatureAchat $natureAchat): self
    {
        $this->natureAchat = $natureAchat;

        return $this;
    }

    public function getDateEngagement(): ?\DateTimeInterface
    {
        return $this->DateEngagement;
    }

    public function setDateEngagement(?\DateTimeInterface $DateEngagement): self
    {
        $this->DateEngagement = $DateEngagement;

        return $this;
    }

    public function getDateOuverture(): ?\DateTimeInterface
    {
        return $this->dateOuverture;
    }

    public function setDateOuverture(?\DateTimeInterface $dateOuverture): self
    {
        $this->dateOuverture = $dateOuverture;

        return $this;
    }

    public function getDateVisa(): ?\DateTimeInterface
    {
        return $this->dateVisa;
    }

    public function setDateVisa(?\DateTimeInterface $dateVisa): self
    {
        $this->dateVisa = $dateVisa;

        return $this;
    }

    public function getDateApprobation(): ?\DateTimeInterface
    {
        return $this->dateApprobation;
    }

    public function setDateApprobation(?\DateTimeInterface $dateApprobation): self
    {
        $this->dateApprobation = $dateApprobation;

        return $this;
    }

    public function getDateAccuse(): ?\DateTimeInterface
    {
        return $this->dateAccuse;
    }

    public function setDateAccuse(?\DateTimeInterface $dateAccuse): self
    {
        $this->dateAccuse = $dateAccuse;

        return $this;
    }

    public function getDateLancement(): ?\DateTimeInterface
    {
        return $this->dateLancement;
    }

    public function setDateLancement(?\DateTimeInterface $dateLancement): self
    {
        $this->dateLancement = $dateLancement;

        return $this;
    }

    public function getDepense(): ?TypeDepense
    {
        return $this->depense;
    }

    public function setDepense(?TypeDepense $depense): self
    {
        $this->depense = $depense;

        return $this;
    }

    public function getImputation(): ?ImputationBudgetaire
    {
        return $this->imputation;
    }

    public function setImputation(?ImputationBudgetaire $imputation): self
    {
        $this->imputation = $imputation;

        return $this;
    }

    public function getNaturePrestation(): ?NaturePrestation
    {
        return $this->naturePrestation;
    }

    public function setNaturePrestation(?NaturePrestation $naturePrestation): self
    {
        $this->naturePrestation = $naturePrestation;

        return $this;
    }

    public function getDestination(): ?Destination
    {
        return $this->destination;
    }

    public function setDestination(?Destination $destination): self
    {
        $this->destination = $destination;

        return $this;
    }

    public function getDatePublication(): ?\DateTimeInterface
    {
        return $this->datePublication;
    }

    public function setDatePublication(?\DateTimeInterface $datePublication): self
    {
        $this->datePublication = $datePublication;

        return $this;
    }

    public function getDateAttribution(): ?\DateTimeInterface
    {
        return $this->dateAttribution;
    }

    public function setDateAttribution(?\DateTimeInterface $dateAttribution): self
    {
        $this->dateAttribution = $dateAttribution;

        return $this;
    }

    public function getNatureDepense(): ?NatureDepense
    {
        return $this->natureDepense;
    }

    public function setNatureDepense(?NatureDepense $natureDepense): self
    {
        $this->natureDepense = $natureDepense;

        return $this;
    }

      public function getOrdreService(): ?int
    {
        return $this->ordreService;
    }

    public function setOrdreService(?int $ordreService): self
    {
        $this->ordreService = $ordreService;

        return $this;
    }

    /**
     * @return Collection|TypeNatureDepense[]
     */
    public function getTypeNatureDepenses(): Collection
    {
        return $this->typeNatureDepenses;
    }

    public function addTypeNatureDepense(TypeNatureDepense $typeNatureDepense): self
    {
        if (!$this->typeNatureDepenses->contains($typeNatureDepense)) {
            $this->typeNatureDepenses[] = $typeNatureDepense;
            $typeNatureDepense->addMarche($this);
        }

        return $this;
    }

    public function removeTypeNatureDepense(TypeNatureDepense $typeNatureDepense): self
    {
        if ($this->typeNatureDepenses->contains($typeNatureDepense)) {
            $this->typeNatureDepenses->removeElement($typeNatureDepense);
            $typeNatureDepense->removeMarche($this);
        }

        return $this;
    }
    
    /**
     * @return Collection|NatureAchat[]
     */
    public function getNatureAchats(): Collection
    {
        return $this->natureAchats;
    }

    public function addNatureAchat(NatureAchat $natureAchat): self
    {
        if (!$this->natureAchats->contains($natureAchat)) {
            $this->natureAchats[] = $natureAchat;
            $natureAchat->addMarche($this);
        }

        return $this;
    }

    public function removeNatureAchat(NatureAchat $natureAchat): self
    {
        if ($this->natureAchats->contains($natureAchat)) {
            $this->natureAchats->removeElement($natureAchat);
            $natureAchat->removeMarche($this);
        }

        return $this;
    }

    
    public function getJPenalite(): ?int
    {
        return $this->jPenalite;
    }

    public function setJPenalite(?int $jPenalite): self
    {
        $this->jPenalite = $jPenalite;

        return $this;
    }

    public function getChapitre(): ?Chapitre
    {
        return $this->chapitre;
    }

    public function setChapitre(?Chapitre $chapitre): self
    {
        $this->chapitre = $chapitre;

        return $this;
    }

    public function getProgramme(): ?Programme
    {
        return $this->programme;
    }

    public function setProgramme(?Programme $programme): self
    {
        $this->programme = $programme;

        return $this;
    }

    public function getRegion(): ?Region
    {
        return $this->region;
    }

    public function setRegion(?Region $region): self
    {
        $this->region = $region;

        return $this;
    }

    public function getProjet(): ?Projet
    {
        return $this->projet;
    }

    public function setProjet(?Projet $projet): self
    {
        $this->projet = $projet;

        return $this;
    }

    public function getLigneB(): ?LigneBudgetaire
    {
        return $this->ligneB;
    }

    public function setLigneB(?LigneBudgetaire $ligneB): self
    {
        $this->ligneB = $ligneB;

        return $this;
    }

   /* *
     * @return Collection|ImputationBudgetaire[]
     */
    public function getImputationBudgetaires(): Collection
    {
        return $this->imputationBudgetaires;
    }

    public function addImputationBudgetaire(ImputationBudgetaire $imputationBudgetaire): self
    {
        if (!$this->imputationBudgetaires->contains($imputationBudgetaire)) {
            $this->imputationBudgetaires[] = $imputationBudgetaire;
            $imputationBudgetaire->setMarche($this);
        }

        return $this;
    }

    public function removeImputationBudgetaire(ImputationBudgetaire $imputationBudgetaire): self
    {
        if ($this->imputationBudgetaires->contains($imputationBudgetaire)) {
            $this->imputationBudgetaires->removeElement($imputationBudgetaire);
            // set the owning side to null (unless already changed)
            if ($imputationBudgetaire->getMarche() === $this) {
                $imputationBudgetaire->setMarche(null);
            }
        }

        return $this;
    }


     public function getMontantTotalHt(): ?float
    {
        return $this->MontantTotalHt;
    }

    public function setMontantTotalHt(?float $MontantTotalHt): self
    {
        $this->MontantTotalHt = $MontantTotalHt;

        return $this;
    }

    public function getMontantTotalTtc(): ?float
    {
        return $this->MontantTotalTtc;
    }

    public function setMontantTotalTtc(?float $MontantTotalTtc): self
    {
        $this->MontantTotalTtc = $MontantTotalTtc;

        return $this;
    }

    public function getMontantTotalTtcLettre(): ?string
    {
        return $this->MontantTotalTtcLettre;
    }

    public function setMontantTotalTtcLettre(?string $MontantTotalTtcLettre): self
    {
        $this->MontantTotalTtcLettre = $MontantTotalTtcLettre;

        return $this;
    }

    public function getSignature(): ?string
    {
        return $this->signature;
    }

    public function setSignature(?string $signature): self
    {
        $this->signature = $signature;

        return $this;
    }

    public function getPositionActuel(): ?string
    {
        return $this->positionActuel;
    }

    public function setPositionActuel(?string $positionActuel): self
    {
        $this->positionActuel = $positionActuel;

        return $this;
    }

    

    


}
