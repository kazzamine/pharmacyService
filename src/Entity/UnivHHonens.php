<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Table(name: 'univ_h_honens')]
#[ORM\Entity(repositoryClass: \App\Repository\UnivHHonensRepository::class)]
#[ORM\HasLifecycleCallbacks]
class UnivHHonens {

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
    #[ORM\ManyToOne(targetEntity: \UnivPlEmptime::class)]
    private $seance;

    #[ORM\JoinColumn(referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \UnivPEnseignant::class)]
    private $enseignant;

    /**
     * @var string
     */
    #[ORM\Column(type: 'float', nullable: true)]
    private $nbrHeure;

    /**
     * @var string
     */
    #[ORM\Column(type: 'float', nullable: true)]
    private $montant;
    
    
     /**
     * @var string
     */
    #[ORM\Column(type: 'integer', nullable: true)]
    private $nbrScRegroupe;
    
      /**
     * @var string
     */
    #[ORM\Column(type: 'boolean', nullable: true)]
    private $except;

    /**
     * @var string
     *
     */
    #[ORM\Column(type: 'string', length: 10, nullable: true)]
    private $statut;



    /**
     * @var string
     */
    #[ORM\Column(type: 'date', nullable: true)]
    private $dateAnnulation;

    /**
     * @var string
     */
    #[ORM\Column(type: 'date', nullable: true)]
    private $dateReglement;

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

    #[ORM\ManyToOne(targetEntity: \App\Entity\UnivHAlbhon::class, inversedBy: 'univHHonens')]
    private $brd;

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

    public function getNbrHeure(): ?float
    {
        return $this->nbrHeure;
    }

    public function setNbrHeure(?float $nbrHeure): self
    {
        $this->nbrHeure = $nbrHeure;

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

    public function getNbrScRegroupe(): ?int
    {
        return $this->nbrScRegroupe;
    }

    public function setNbrScRegroupe(?int $nbrScRegroupe): self
    {
        $this->nbrScRegroupe = $nbrScRegroupe;

        return $this;
    }

    public function getExcept(): ?bool
    {
        return $this->except;
    }

    public function setExcept(?bool $except): self
    {
        $this->except = $except;

        return $this;
    }

    public function getStatut(): ?string
    {
        return $this->statut;
    }

    public function setStatut(?string $statut): self
    {
        $this->statut = $statut;

        return $this;
    }

 

    public function getDateAnnulation(): ?\DateTimeInterface
    {
        return $this->dateAnnulation;
    }

    public function setDateAnnulation(?\DateTimeInterface $dateAnnulation): self
    {
        $this->dateAnnulation = $dateAnnulation;

        return $this;
    }

    public function getDateReglement(): ?\DateTimeInterface
    {
        return $this->dateReglement;
    }

    public function setDateReglement(?\DateTimeInterface $dateReglement): self
    {
        $this->dateReglement = $dateReglement;

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

    public function getSeance(): ?UnivPlEmptime
    {
        return $this->seance;
    }

    public function setSeance(?UnivPlEmptime $seance): self
    {
        $this->seance = $seance;

        return $this;
    }

    public function getEnseignant(): ?UnivPEnseignant
    {
        return $this->enseignant;
    }

    public function setEnseignant(?UnivPEnseignant $enseignant): self
    {
        $this->enseignant = $enseignant;

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

    public function getBrd(): ?UnivHAlbhon
    {
        return $this->brd;
    }

    public function setBrd(?UnivHAlbhon $brd): self
    {
        $this->brd = $brd;

        return $this;
    }

}
