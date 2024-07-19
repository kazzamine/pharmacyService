<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Table(name: 'univ_i_seance')]
#[ORM\Entity(repositoryClass: \App\Repository\UnivISeanceRepository::class)]
class UnivISeance {

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    /**
     * @var string
     */
    #[ORM\Column(type: 'string', length: 100, nullable: true)]
    private $code;

    /**
     * @var string
     */
    #[ORM\Column(type: 'string', length: 100, nullable: true)]
    private $typeSeance;

    /**
     * @var string
     */
    #[ORM\Column(type: 'string', length: 100, nullable: true)]
    private $groupe;

    /**
     * @var string
     */
    #[ORM\Column(type: 'string', length: 100, nullable: true)]
    private $codeSalle;

    /**
     * @var string
     */
    #[ORM\Column(type: 'string', length: 100, nullable: true)]
    private $codeEtablissement;

    /**
     * @var string
     */
    #[ORM\Column(type: 'string', length: 100, nullable: true)]
    private $codeFormation;

    /**
     * @var string
     */
    #[ORM\Column(type: 'string', length: 100, nullable: true)]
    private $codePromotion;

    /**
     * @var string
     */
    #[ORM\Column(type: 'string', length: 100, nullable: true)]
    private $codeSemestre;

    /**
     * @var string
     */
    #[ORM\Column(type: 'string', length: 100, nullable: true)]
    private $codeModule;

    /**
     * @var string
     */
    #[ORM\Column(type: 'string', length: 100, nullable: true)]
    private $codeElement;

    /**
     * @var string
     */
    #[ORM\Column(type: 'string', length: 100, nullable: true)]
    private $codeEnseignant;

    /**
     * @var string
     */
    #[ORM\Column(type: 'date', nullable: true)]
    private $dateSeance;

    /**
     * @var string
     */
    #[ORM\Column(type: 'time', nullable: true)]
    private $heureDebut;
    
    
    /**
     * @var string
     */
    #[ORM\Column(type: 'time', nullable: true)]
    private $heureFin;
    
    
    /**
     * @var string
     */
    #[ORM\Column(type: 'integer', nullable: true)]
    private $idStatut;
    
    
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

    public function getTypeSeance(): ?string
    {
        return $this->typeSeance;
    }

    public function setTypeSeance(?string $typeSeance): self
    {
        $this->typeSeance = $typeSeance;

        return $this;
    }

    public function getGroupe(): ?string
    {
        return $this->groupe;
    }

    public function setGroupe(?string $groupe): self
    {
        $this->groupe = $groupe;

        return $this;
    }

    public function getCodeSalle(): ?string
    {
        return $this->codeSalle;
    }

    public function setCodeSalle(?string $codeSalle): self
    {
        $this->codeSalle = $codeSalle;

        return $this;
    }

    public function getCodeEtablissement(): ?string
    {
        return $this->codeEtablissement;
    }

    public function setCodeEtablissement(?string $codeEtablissement): self
    {
        $this->codeEtablissement = $codeEtablissement;

        return $this;
    }

    public function getCodeFormation(): ?string
    {
        return $this->codeFormation;
    }

    public function setCodeFormation(?string $codeFormation): self
    {
        $this->codeFormation = $codeFormation;

        return $this;
    }

    public function getCodePromotion(): ?string
    {
        return $this->codePromotion;
    }

    public function setCodePromotion(?string $codePromotion): self
    {
        $this->codePromotion = $codePromotion;

        return $this;
    }

    public function getCodeSemestre(): ?string
    {
        return $this->codeSemestre;
    }

    public function setCodeSemestre(?string $codeSemestre): self
    {
        $this->codeSemestre = $codeSemestre;

        return $this;
    }

    public function getCodeModule(): ?string
    {
        return $this->codeModule;
    }

    public function setCodeModule(?string $codeModule): self
    {
        $this->codeModule = $codeModule;

        return $this;
    }

    public function getCodeElement(): ?string
    {
        return $this->codeElement;
    }

    public function setCodeElement(?string $codeElement): self
    {
        $this->codeElement = $codeElement;

        return $this;
    }

    public function getCodeEnseignant(): ?string
    {
        return $this->codeEnseignant;
    }

    public function setCodeEnseignant(?string $codeEnseignant): self
    {
        $this->codeEnseignant = $codeEnseignant;

        return $this;
    }

    public function getDateSeance(): ?\DateTimeInterface
    {
        return $this->dateSeance;
    }

    public function setDateSeance(?\DateTimeInterface $dateSeance): self
    {
        $this->dateSeance = $dateSeance;

        return $this;
    }

    public function getHeureDebut(): ?\DateTimeInterface
    {
        return $this->heureDebut;
    }

    public function setHeureDebut(?\DateTimeInterface $heureDebut): self
    {
        $this->heureDebut = $heureDebut;

        return $this;
    }

    public function getHeureFin(): ?\DateTimeInterface
    {
        return $this->heureFin;
    }

    public function setHeureFin(?\DateTimeInterface $heureFin): self
    {
        $this->heureFin = $heureFin;

        return $this;
    }

    public function getIdStatut(): ?int
    {
        return $this->idStatut;
    }

    public function setIdStatut(?int $idStatut): self
    {
        $this->idStatut = $idStatut;

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

}
