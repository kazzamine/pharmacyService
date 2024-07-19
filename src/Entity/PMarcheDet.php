<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: \App\Repository\PMarcheDetRepository::class)]
class PMarcheDet
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'text', length: 255, nullable: true)]
    private $Designation;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $tva;

    #[ORM\Column(type: 'float', nullable: true)]
    private $prixUnitaire;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $observation;
    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $numeroLot;
    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $numeroArticle;

    #[ORM\Column(type: 'float', nullable: true)]
    private $qt;

    #[ORM\Column(type: 'float', nullable: true)]
    private $qtReste;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private $DateMaj;

    #[ORM\ManyToOne(targetEntity: \App\Entity\PMarche::class, inversedBy: 'pMarcheDets')]
    private $PMarche;

    #[ORM\ManyToOne(targetEntity: \App\Entity\Uarticle::class, inversedBy: 'pMarcheDets')]
    private $article;

    #[ORM\ManyToOne(targetEntity: \App\Entity\User::class, inversedBy: 'pMarcheDets')]
    private $userCreated;

    #[ORM\ManyToOne(targetEntity: \App\Entity\User::class, inversedBy: 'pMarcheDets')]
    private $UserUpdated;

    #[ORM\ManyToOne(targetEntity: \App\Entity\PUnite::class, inversedBy: 'pMarcheDets')]
    private $unite;

        #[ORM\ManyToOne(targetEntity: \App\Entity\Forme::class, inversedBy: 'pMarcheDets')]
    private $forme;

    #[ORM\ManyToOne(targetEntity: \App\Entity\Dosage::class, inversedBy: 'pMarcheDets')]
    private $Dosage;


    #[ORM\OneToMany(targetEntity: \App\Entity\Delai::class, mappedBy: 'PMarcheDet')]
    private $delais;

    #[ORM\Column(type: 'float', nullable: true)]
    private $qtMin;

    #[ORM\Column(type: 'float', nullable: true)]
    private $qtMax;

    #[ORM\OneToMany(targetEntity: \App\Entity\PMarcheDetPhase::class, mappedBy: 'marcheDet')]
    private $pMarcheDetPhases;


    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $uniteDa;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $typeArticle;

    #[ORM\Column(type: 'float', nullable: true)]
    private $prixHt;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $lotDesignation;



    public function __construct()
    {
        $this->delais = new ArrayCollection();
        $this->pMarcheDetPhases = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDesignation(): ?string
    {
        return $this->Designation;
    }

    public function setDesignation(?string $Designation): self
    {
        $this->Designation = $Designation;

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

    public function getPrixUnitaire(): ?float
    {
        return $this->prixUnitaire;
    }

    public function setPrixUnitaire(?float $prixUnitaire): self
    {
        $this->prixUnitaire = $prixUnitaire;

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
    public function getNumeroLot(): ?string
    {
        return $this->numeroLot;
    }

    public function setNumeroLot(?string $numeroLot): self
    {
        $this->numeroLot = $numeroLot;

        return $this;
    }
    public function getNumeroArticle(): ?string
    {
        return $this->numeroArticle;
    }

    public function setNumeroArticle(?string $numeroArticle): self
    {
        $this->numeroArticle = $numeroArticle;

        return $this;
    }

    public function getQt(): ?float
    {
        return $this->qt;
    }

    public function setQt(?float $qt): self
    {
        $this->qt = $qt;

        return $this;
    }

    public function getQtReste(): ?float
    {
        return $this->qtReste;
    }

    public function setQtReste(?float $qtReste): self
    {
        $this->qtReste = $qtReste;

        return $this;
    }

    public function getDateMaj(): ?\DateTimeInterface
    {
        return $this->DateMaj;
    }

    public function setDateMaj(?\DateTimeInterface $DateMaj): self
    {
        $this->DateMaj = $DateMaj;

        return $this;
    }

    public function getPMarche(): ?PMarche
    {
        return $this->PMarche;
    }

    public function setPMarche(?PMarche $PMarche): self
    {
        $this->PMarche = $PMarche;

        return $this;
    }

    public function getArticle(): ?Uarticle
    {
        return $this->article;
    }

    public function setArticle(?Uarticle $article): self
    {
        $this->article = $article;

        return $this;
    }

    public function getUserCreated(): ?user
    {
        return $this->userCreated;
    }

    public function setUserCreated(?user $userCreated): self
    {
        $this->userCreated = $userCreated;

        return $this;
    }

    public function getUserUpdated(): ?user
    {
        return $this->UserUpdated;
    }

    public function setUserUpdated(?user $UserUpdated): self
    {
        $this->UserUpdated = $UserUpdated;

        return $this;
    }

    public function getUnite(): ?PUnite
    {
        return $this->unite;
    }

    public function setUnite(?PUnite $unite): self
    {
        $this->unite = $unite;

        return $this;
    }

     public function getForme(): ?Forme
    {
        return $this->forme;
    }

    public function setForme(?Forme $forme): self
    {
        $this->forme = $forme;

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


     /**
     * @return Collection|Delai[]
     */
    public function getDelais(): Collection
    {
        return $this->delais;
    }

    public function addDelai(Delai $delai): self
    {
        if (!$this->delais->contains($delai)) {
            $this->delais[] = $delai;
            $delai->setPMarcheDet($this);
        }

        return $this;
    }

    public function removeDelai(Delai $delai): self
    {
        if ($this->delais->contains($delai)) {
            $this->delais->removeElement($delai);
            // set the owning side to null (unless already changed)
            if ($delai->getPMarcheDet() === $this) {
                $delai->setPMarcheDet(null);
            }
        }

        return $this;
    }

    
    public function getQtMin(): ?float
    {
        return $this->qtMin;
    }

    public function setQtMin(?float $qtMin): self
    {
        $this->qtMin = $qtMin;

        return $this;
    }

    public function getQtMax(): ?float
    {
        return $this->qtMax;
    }

    public function setQtMax(?float $qtMax): self
    {
        $this->qtMax = $qtMax;

        return $this;
    }


    /**
     * @return Collection|PMarcheDetPhase[]
     */
    public function getPMarcheDetPhases(): Collection
    {
        return $this->pMarcheDetPhases;
    }

    public function addPMarcheDetPhase(PMarcheDetPhase $pMarcheDetPhase): self
    {
        if (!$this->pMarcheDetPhasses->contains($pMarcheDetPhase)) {
            $this->pMarcheDetPhases[] = $pMarcheDetPhase;
            $pMarcheDetPhase->setMarcheDet($this);
        }

        return $this;
    }

    public function removePMarcheDetPhase(PMarcheDetPhase $pMarcheDetPhase): self
    {
        if ($this->pMarcheDetPhases->contains($pMarcheDetPhase)) {
            $this->pMarcheDetPhases->removeElement($pMarcheDetPhase);
            // set the owning side to null (unless already changed)
            if ($pMarcheDetPhase->getMarcheDet() === $this) {
                $pMarcheDetPhase->setMarcheDet(null);
            }
        }

        return $this;
    }

    public function getUniteDa(): ?string
    {
        return $this->uniteDa;
    }

    public function setUniteDa(?string $uniteDa): self
    {
        $this->uniteDa = $uniteDa;

        return $this;
    }

    public function getTypeArticle(): ?string
    {
        return $this->typeArticle;
    }

    public function setTypeArticle(?string $typeArticle): self
    {
        $this->typeArticle = $typeArticle;

        return $this;
    }

    public function getPrixHt(): ?float
    {
        return $this->prixHt;
    }

    public function setPrixHt(?float $prixHt): self
    {
        $this->prixHt = $prixHt;

        return $this;
    }

    public function getLotDesignation(): ?string
    {
        return $this->lotDesignation;
    }

    public function setLotDesignation(?string $lotDesignation): self
    {
        $this->lotDesignation = $lotDesignation;

        return $this;
    }

    
}
