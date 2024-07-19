<?php

namespace App\Entity;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
#[ORM\Table(name: 'univ_ac_epreuve')]
#[ORM\Entity(repositoryClass: \App\Repository\UnivAcEpreuveRepository::class)]
#[ORM\HasLifecycleCallbacks]
class UnivAcEpreuve {

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    /**
     * @var string
     */
    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $designation;

    /**
     * @var string
     */
    #[ORM\Column(type: 'string', length: 100, nullable: true)]
    private $code;

    /**
     * @var float
     */
    #[Assert\Positive]
    #[Assert\Type(type: 'numeric')]
    #[ORM\Column(type: 'float', nullable: true)]
    private $coefficient;

    /**
     * @var \DateTime
     */
    #[Assert\NotBlank]
    #[ORM\Column(type: 'date', nullable: true)]
    private $dateEpreuve;

    /**
     * @var \text
     */
    #[Assert\NotBlank]
    #[ORM\Column(type: 'text', nullable: true)]
    private $observation;

    /**
     * @var \integer
     */
    #[ORM\Column(type: 'integer', length: 1, nullable: true)]
    private $anonymat;

    /**
     * @var \integer
     */
    #[ORM\Column(type: 'integer', length: 2, nullable: true)]
    private $natureAnonymat;

    /**
     * @var \integer
     */
    #[ORM\Column(type: 'string', length: 50, nullable: true)]
    private $nature;

    /**
     * @var integer
     */
    #[ORM\Column(type: 'boolean', nullable: true)]
    private $active;

    /**
     * @var \integer
     */
    #[ORM\Column(type: 'string', length: 100, nullable: true)]
    private $reference;

    

    #[ORM\JoinColumn(referencedColumnName: 'id')]
    #[Assert\NotBlank]
    #[ORM\ManyToOne(targetEntity: \UnivPrNatureEpreuve::class)]
    private $natureEpreuve;

    #[ORM\JoinColumn(referencedColumnName: 'id')]
    #[Assert\NotBlank]
    #[ORM\ManyToOne(targetEntity: \UnivPEnseignant::class)]
    private $enseignant;

    #[ORM\JoinColumn(referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \UnivPStatutEpreuve::class)]
    private $statut;
    
    
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
    private $groupe;
    
    #[ORM\Column(type: 'json', nullable: true)]
    public $positionActuel = [];
    
    #[ORM\Column(type: 'json', nullable: true)]
    private $historique;


    #[ORM\JoinColumn(referencedColumnName: 'id')]
    #[Assert\NotBlank]
    #[ORM\ManyToOne(targetEntity: \App\Entity\UnivExControleEpreuve::class, inversedBy: 'acEpreuve')]
    private $controleEpreuve;
    
      public function getPositionActuel(): ?array {
        return $this->positionActuel;
    }

    public function setPositionActuel(?array $positionActuel): self {
        $this->positionActuel = $positionActuel;

        $this->historique[] = [
            'current_place' => $positionActuel,
            'time' => (new \DateTime())->format('c'),
            'user_nom' => $this->getUserCreated()? $this->getUserCreated()->getNom():null ,
            'user_prenom' => $this->getUserCreated()?  $this->getUserCreated()->getPrenom():null ,
            'user_username' => $this->getUserCreated()?  $this->getUserCreated()->getUsername():null ,
            'user_id' => $this->getUserCreated()?  $this->getUserCreated()->getId():null 
        ];

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
    
    

    

    #[ORM\OneToMany(targetEntity: \UnivExGnotes::class, mappedBy: 'epreuve')]
    private $gnotes;

    public function __construct()
    {
        $this->gnotes = new ArrayCollection();
        
    }

    public function getId(): ?int {
        return $this->id;
    }

    public function getDesignation(): ?string {
        return $this->designation;
    }

    public function setDesignation(?string $designation): self {
        $this->designation = $designation;

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

    public function getCode(): ?string {
        return $this->code;
    }

    public function setCode(?string $code): self {
        $this->code = $code;

        return $this;
    }

    public function getCoefficient(): ?float {
        return $this->coefficient;
    }

    public function setCoefficient(?float $coefficient): self {
        $this->coefficient = $coefficient;

        return $this;
    }

    public function getDateEpreuve(): ?\DateTimeInterface {
        return $this->dateEpreuve;
    }

    public function setDateEpreuve(?\DateTimeInterface $dateEpreuve): self {
        $this->dateEpreuve = $dateEpreuve;

        return $this;
    }

    public function getObservation(): ?string {
        return $this->observation;
    }

    public function setObservation(?string $observation): self {
        $this->observation = $observation;

        return $this;
    }

    public function getAnonymat(): ?int {
        return $this->anonymat;
    }

    public function setAnonymat(?int $anonymat): self {
        $this->anonymat = $anonymat;

        return $this;
    }

    public function getNatureAnonymat(): ?int {
        return $this->natureAnonymat;
    }

    public function setNatureAnonymat(?int $natureAnonymat): self {
        $this->natureAnonymat = $natureAnonymat;

        return $this;
    }

    public function getNature(): ?string {
        return $this->nature;
    }

    public function setNature(?string $nature): self {
        $this->nature = $nature;

        return $this;
    }

    public function getActive(): ?bool {
        return $this->active;
    }

    public function setActive(?bool $active): self {
        $this->active = $active;

        return $this;
    }

    public function getReference(): ?string {
        return $this->reference;
    }

    public function setReference(?string $reference): self {
        $this->reference = $reference;

        return $this;
    }

    public function getElement(): ?UnivAcElement {
        return $this->element;
    }

    public function setElement(?UnivAcElement $element): self {
        $this->element = $element;

        return $this;
    }

    public function getAnnee(): ?UnivAcAnnee {
        return $this->annee;
    }

    public function setAnnee(?UnivAcAnnee $annee): self {
        $this->annee = $annee;

        return $this;
    }

    public function getNatureEpreuve(): ?UnivPrNatureEpreuve {
        return $this->natureEpreuve;
    }

    public function setNatureEpreuve(?UnivPrNatureEpreuve $natureEpreuve): self {
        $this->natureEpreuve = $natureEpreuve;

        return $this;
    }

    public function getEnseignant(): ?UnivPEnseignant {
        return $this->enseignant;
    }

    public function setEnseignant(?UnivPEnseignant $enseignant): self {
        $this->enseignant = $enseignant;

        return $this;
    }

    public function getStatut(): ?UnivPStatutEpreuve {
        return $this->statut;
    }

    public function setStatut(?UnivPStatutEpreuve $statut): self {
        $this->statut = $statut;

        return $this;
    }

    public function getControleElement(): ?UnivExControleElement
    {
        return $this->controleElement;
    }

    public function setControleElement(?UnivExControleElement $controleElement): self
    {
        $this->controleElement = $controleElement;

        return $this;
    }


    public function getGroupe(): ?UnivDivisionGroupeDetail {
        return $this->groupe;
    }

    public function setGroupe(?UnivDivisionGroupeDetail $groupe): self {
        $this->groupe = $groupe;

        return $this;
    }


    public function getCreated(): ?\DateTimeInterface
    {
        return $this->created;
    }

    public function setCreated(?\DateTimeInterface $created): self
    {
        $this->created = $created;
    }
    /**
     * @return Collection|UnivExGnotes[]
     */
    public function getGnotes(): Collection
    {
        return $this->gnotes;
    }

    public function addGnote(UnivExGnotes $gnote): self
    {
        if (!$this->gnotes->contains($gnote)) {
            $this->gnotes[] = $gnote;
            $gnote->setEpreuve($this);
        }


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
    }
    public function removeGnote(UnivExGnotes $gnote): self
    {
        if ($this->gnotes->contains($gnote)) {
            $this->gnotes->removeElement($gnote);
            // set the owning side to null (unless already changed)
            if ($gnote->getEpreuve() === $this) {
                $gnote->setEpreuve(null);
            }
        }


        return $this;
    }

    public function getControleEpreuve(): ?UnivExControleEpreuve
    {
        return $this->controleEpreuve;
    }

    public function setControleEpreuve(?UnivExControleEpreuve $controleEpreuve): self
    {
        $this->controleEpreuve = $controleEpreuve;

        return $this;
    }

 

}
