<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: \App\Repository\UnivPlEmptimeRepository::class)]
#[ORM\HasLifecycleCallbacks]
class UnivPlEmptime {

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    /**
     * @var string
     */
    #[ORM\Column(type: 'string', length: 100, nullable: true)]
    private $code;

    #[ORM\JoinColumn(referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \UnivPSalle::class)]
    private $salle;

    #[ORM\Column(name: 'couleur', type: 'string', length: 255, nullable: true)]
    private $couleur;

    #[ORM\JoinColumn(referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \UnivPrProgrammation::class)]
    private $programmation;

    /**
     * @var string
     */
    #[ORM\Column(name: 'niv_1', type: 'string', length: 10, nullable: true)]
    private $niv1;

    /**
     * @var string
     */
    #[ORM\Column(name: 'niv_2', type: 'string', length: 10, nullable: true)]
    private $niv2;

    /**
     * @var string
     */
    #[ORM\Column(name: 'niv_3', type: 'string', length: 10, nullable: true)]
    private $niv3;

    /**
     * @var string
     */
    #[ORM\Column(type: 'string', length: 100, nullable: true)]
    private $codeType;

    /**
     * @var string
     */
    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $description;

    /**
     * @var string
     */
    #[ORM\Column(type: 'string', length: 100, nullable: true)]
    private $semaine;

    /**
     * @var \DateTime
     */
    #[ORM\Column(type: 'datetime', nullable: true)]
    private $datemp;

    /**
     * @var \DateTime
     */
    #[ORM\Column(type: 'datetime', nullable: true)]
    private $start;

    /**
     * @var \DateTime
     */
    #[ORM\Column(type: 'datetime', nullable: true)]
    private $end;

    /**
     * @var \DateTime
     */
    #[ORM\Column(type: 'time', nullable: true)]
    private $heurDb;

    /**
     * @var \DateTime
     */
    #[ORM\Column(type: 'time', nullable: true)]
    private $heurFin;

    /**
     * @var integer
     */
    #[ORM\Column(type: 'string', nullable: true)]
    private $valider;

    /**
     * @var integer
     */
    #[ORM\Column(type: 'string', nullable: true)]
    private $generer;

    /**
     * @var integer
     */
    #[ORM\Column(type: 'integer', nullable: true)]
    private $annuler;

    /**
     * @var string
     */
    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $motifAnuler;
    
    
    
      /**
     * @var integer
     */
    #[ORM\Column(type: 'boolean', nullable: true)]
    private $active;
    

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


    #[ORM\JoinColumn(referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \UnivDivisionGroupeDetail::class)]
    private $divisionGroupeDetail;


    #[ORM\JoinColumn(referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \UnivDivisionGroupe::class)]
    private $divisionGroupe;
    

     #[ORM\OneToMany(targetEntity: \UnivPlEmptimens::class, mappedBy: 'seance')]
    private $enseignants;

    public function __construct()
    {
        $this->enseignants = new ArrayCollection();
    }
    
  



    
    #[ORM\Column(type: 'json', nullable: true)]
    public $positionActuel = [];


      #[ORM\PrePersist]
    public function setCreatedValue() {

        $this->created = new \DateTime();
    }



    #[ORM\PreUpdate]
    public function setUpdatedValue() {
        $this->updated = new \DateTime();
    }

    public function getId(): ?int {
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

    public function getNiv1(): ?string
    {
        return $this->niv1;
    }

    public function setNiv1(?string $niv1): self
    {
        $this->niv1 = $niv1;

        return $this;
    }

    public function getNiv2(): ?string
    {
        return $this->niv2;
    }

    public function setNiv2(?string $niv2): self
    {
        $this->niv2 = $niv2;

        return $this;
    }

    public function getNiv3(): ?string
    {
        return $this->niv3;
    }

    public function setNiv3(?string $niv3): self
    {
        $this->niv3 = $niv3;

        return $this;
    }

    public function getCodeType(): ?string
    {
        return $this->codeType;
    }

    public function setCodeType(?string $codeType): self
    {
        $this->codeType = $codeType;

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

    public function getSemaine(): ?string
    {
        return $this->semaine;
    }

    public function setSemaine(?string $semaine): self
    {
        $this->semaine = $semaine;

        return $this;
    }

    public function getDatemp(): ?\DateTimeInterface
    {
        return $this->datemp;
    }

    public function setDatemp(?\DateTimeInterface $datemp): self
    {
        $this->datemp = $datemp;

        return $this;
    }

    public function getStart(): ?\DateTimeInterface
    {
        return $this->start;
    }

    public function setStart(?\DateTimeInterface $start): self
    {
        $this->start = $start;

        return $this;
    }

    public function getEnd(): ?\DateTimeInterface
    {
        return $this->end;
    }

    public function setEnd(?\DateTimeInterface $end): self
    {
        $this->end = $end;

        return $this;
    }

    public function getHeurDb(): ?\DateTimeInterface
    {
        return $this->heurDb;
    }

    public function setHeurDb(?\DateTimeInterface $heurDb): self
    {
        $this->heurDb = $heurDb;

        return $this;
    }

    public function getHeurFin(): ?\DateTimeInterface
    {
        return $this->heurFin;
    }

    public function setHeurFin(?\DateTimeInterface $heurFin): self
    {
        $this->heurFin = $heurFin;

        return $this;
    }

    public function getValider(): ?string
    {
        return $this->valider;
    }

    public function setValider(string $valider): self
    {
        $this->valider = $valider;

        return $this;
    }

    public function getGenerer(): ?string
    {
        return $this->generer;
    }

    public function setGenerer(string $generer): self
    {
        $this->generer = $generer;

        return $this;
    }

    public function getAnnuler(): ?int
    {
        return $this->annuler;
    }

    public function setAnnuler(?int $annuler): self
    {
        $this->annuler = $annuler;

        return $this;
    }

    public function getMotifAnuler(): ?string
    {
        return $this->motifAnuler;
    }

    public function setMotifAnuler(?string $motifAnuler): self
    {
        $this->motifAnuler = $motifAnuler;

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

    public function getSalle(): ?UnivPSalle
    {
        return $this->salle;
    }

    public function setSalle(?UnivPSalle $salle): self
    {
        $this->salle = $salle;

        return $this;
    }

    public function getCouleur(): ?string
    {
        return $this->couleur;
    }

    public function setCouleur(?string $couleur): self
    {
        $this->couleur = $couleur;

        return $this;
    }

    public function getProgrammation(): ?UnivPrProgrammation
    {
        return $this->programmation;
    }

    public function setProgrammation(?UnivPrProgrammation $programmation): self
    {
        $this->programmation = $programmation;

        return $this;
    }



    public function getDivisionGroupeDetail(): ?UnivDivisionGroupeDetail
    {
        return $this->divisionGroupeDetail;
    }

    public function setDivisionGroupeDetail(?UnivDivisionGroupeDetail $divisionGroupeDetail): self
    {
        $this->divisionGroupeDetail = $divisionGroupeDetail;

        return $this;
    }

    public function getDivisionGroupe(): ?UnivDivisionGroupe
    {
        return $this->divisionGroupe;
    }

    public function setDivisionGroupe(?UnivDivisionGroupe $divisionGroupe): self
    {
        $this->divisionGroupe = $divisionGroupe;

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
     * @return Collection|UnivPlEmptimens[]
     */
    public function getEnseignants(): Collection
    {
        return $this->enseignants;
    }

    public function addEnseignant(UnivPlEmptimens $enseignant): self
    {
        if (!$this->enseignants->contains($enseignant)) {
            $this->enseignants[] = $enseignant;
            $enseignant->setSeance($this);
        }

    }


    public function getPositionActuel(): ?array {
        return $this->positionActuel;
    }

    public function setPositionActuel(?array $positionActuel): self {
        $this->positionActuel = $positionActuel;

        $this->historique[] = [
            'current_place' => $positionActuel,
            'time' => (new \DateTime())->format('c'),
            'user_nom' => $this->getUserCreated()->getNom(),
            'user_prenom' => $this->getUserCreated()->getPrenom(),
            'user_username' => $this->getUserCreated()->getUsername(),
            'user_id' => $this->getUserCreated()->getId()
        ];

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


    public function removeEnseignant(UnivPlEmptimens $enseignant): self
    {
        if ($this->enseignants->contains($enseignant)) {
            $this->enseignants->removeElement($enseignant);
            // set the owning side to null (unless already changed)
            if ($enseignant->getSeance() === $this) {
                $enseignant->setSeance(null);
            }
        }

    }

   

}
