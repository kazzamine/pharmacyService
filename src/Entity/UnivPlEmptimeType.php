<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: \App\Repository\UnivPlEmptimeTypeRepository::class)]
#[ORM\HasLifecycleCallbacks]
class UnivPlEmptimeType
{
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

    #[ORM\JoinColumn(referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \UnivPCouleur::class)]
    private $couleur;

    #[ORM\JoinColumn(referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \UnivPrProgrammation::class)]
    private $programmation;

  

    /**
     * @var string
     */
    #[ORM\Column(type: 'string', length: 100, nullable: true)]
    private $codeType;

    /**
     * @var string
     */
    #[ORM\Column(type: 'string', length: 100, nullable: true)]
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
    #[ORM\Column(type: 'integer', nullable: false)]
    private $valider;

    /**
     * @var integer
     */
    #[ORM\Column(type: 'integer', nullable: false)]
    private $generer;

 
    
    
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

    public function getValider(): ?int
    {
        return $this->valider;
    }

    public function setValider(int $valider): self
    {
        $this->valider = $valider;

        return $this;
    }

    public function getGenerer(): ?int
    {
        return $this->generer;
    }

    public function setGenerer(int $generer): self
    {
        $this->generer = $generer;

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

    public function getCouleur(): ?UnivPCouleur
    {
        return $this->couleur;
    }

    public function setCouleur(?UnivPCouleur $couleur): self
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
}
