<?php

namespace App\Entity;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: \App\Repository\UnivPrConcoursRepository::class)]
#[ORM\HasLifecycleCallbacks]
class UnivPrConcours {

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
    #[ORM\ManyToOne(targetEntity: \UnivTEtudiant::class)]
    private $etudiant;

    #[ORM\JoinColumn(referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \UnivPConcourscab::class)]
    private $concours;

    /**
     * @var string
     */
    #[ORM\Column(name: 'col_1', type: 'float', nullable: true)]
    private $col1;

    /**
     * @var string
     */
    #[ORM\Column(name: 'col_2', type: 'float', nullable: true)]
    private $col2;

    /**
     * @var string
     */
    #[ORM\Column(name: 'col_3', type: 'float', nullable: true)]
    private $col3;

    /**
     * @var string
     */
    #[ORM\Column(name: 'col_4', type: 'float', nullable: true)]
    private $col4;

    /**
     * @var string
     */
    #[ORM\Column(name: 'col_5', type: 'float', nullable: true)]
    private $col5;

    /**
     * @var string
     */
    #[ORM\Column(name: 'col_6', type: 'float', nullable: true)]
    private $col6;

    /**
     * @var string
     */
    #[ORM\Column(name: 'col_7', type: 'float', nullable: true)]
    private $col7;

    /**
     * @var string
     */
    #[ORM\Column(name: 'col_8', type: 'float', nullable: true)]
    private $col8;

    /**
     * @var string
     */
    #[ORM\Column(type: 'float', nullable: true)]
    private $moyenne;

    /**
     * @var string
     */
    #[ORM\Column(type: 'boolean', nullable: true)]
    private $absent;

    /**
     * @var string
     */
    #[ORM\Column(type: 'boolean', nullable: true)]
    private $valider;

    /**
     * @var string
     */
    #[ORM\Column(type: 'integer', nullable: true)]
    private $classementPrincipale;

    /**
     * @var string
     */
    #[ORM\Column(type: 'integer', nullable: true)]
    private $classementSecondaire;

    /**
     * @var string
     */
    #[ORM\Column(type: 'integer', nullable: true)]
    private $numConvocation;

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

    #[ORM\OneToMany(targetEntity: \UnivPrConcoursdet::class, mappedBy: 'prConcours')]
    private $details;

    public function __construct() {
        $this->details = new ArrayCollection();
    }

    #[ORM\PrePersist]
    public function setCreatedValue() {

        $this->created = new \DateTime();
    }

    #[ORM\PreUpdate]
    public function setUpdatedValue() {
        $this->updated = new \DateTime();
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

    public function getCol1(): ?float
    {
        return $this->col1;
    }

    public function setCol1(?float $col1): self
    {
        $this->col1 = $col1;

        return $this;
    }

    public function getCol2(): ?float
    {
        return $this->col2;
    }

    public function setCol2(?float $col2): self
    {
        $this->col2 = $col2;

        return $this;
    }

    public function getCol3(): ?float
    {
        return $this->col3;
    }

    public function setCol3(?float $col3): self
    {
        $this->col3 = $col3;

        return $this;
    }

    public function getCol4(): ?float
    {
        return $this->col4;
    }

    public function setCol4(?float $col4): self
    {
        $this->col4 = $col4;

        return $this;
    }

    public function getCol5(): ?float
    {
        return $this->col5;
    }

    public function setCol5(?float $col5): self
    {
        $this->col5 = $col5;

        return $this;
    }

    public function getCol6(): ?float
    {
        return $this->col6;
    }

    public function setCol6(?float $col6): self
    {
        $this->col6 = $col6;

        return $this;
    }

    public function getCol7(): ?float
    {
        return $this->col7;
    }

    public function setCol7(?float $col7): self
    {
        $this->col7 = $col7;

        return $this;
    }

    public function getCol8(): ?float
    {
        return $this->col8;
    }

    public function setCol8(?float $col8): self
    {
        $this->col8 = $col8;

        return $this;
    }

    public function getMoyenne(): ?float
    {
        return $this->moyenne;
    }

    public function setMoyenne(?float $moyenne): self
    {
        $this->moyenne = $moyenne;

        return $this;
    }

    public function getAbsent(): ?bool
    {
        return $this->absent;
    }

    public function setAbsent(?bool $absent): self
    {
        $this->absent = $absent;

        return $this;
    }

    public function getValider(): ?bool
    {
        return $this->valider;
    }

    public function setValider(?bool $valider): self
    {
        $this->valider = $valider;

        return $this;
    }

    public function getClassementPrincipale(): ?int
    {
        return $this->classementPrincipale;
    }

    public function setClassementPrincipale(?int $classementPrincipale): self
    {
        $this->classementPrincipale = $classementPrincipale;

        return $this;
    }

    public function getClassementSecondaire(): ?int
    {
        return $this->classementSecondaire;
    }

    public function setClassementSecondaire(?int $classementSecondaire): self
    {
        $this->classementSecondaire = $classementSecondaire;

        return $this;
    }

    public function getNumConvocation(): ?int
    {
        return $this->numConvocation;
    }

    public function setNumConvocation(?int $numConvocation): self
    {
        $this->numConvocation = $numConvocation;

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

    public function getEtudiant(): ?UnivTEtudiant
    {
        return $this->etudiant;
    }

    public function setEtudiant(?UnivTEtudiant $etudiant): self
    {
        $this->etudiant = $etudiant;

        return $this;
    }

    public function getConcours(): ?UnivPConcourscab
    {
        return $this->concours;
    }

    public function setConcours(?UnivPConcourscab $concours): self
    {
        $this->concours = $concours;

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
     * @return Collection|UnivPrConcoursdet[]
     */
    public function getDetails(): Collection
    {
        return $this->details;
    }

    public function addDetail(UnivPrConcoursdet $detail): self
    {
        if (!$this->details->contains($detail)) {
            $this->details[] = $detail;
            $detail->setPrConcours($this);
        }

        return $this;
    }

    public function removeDetail(UnivPrConcoursdet $detail): self
    {
        if ($this->details->contains($detail)) {
            $this->details->removeElement($detail);
            // set the owning side to null (unless already changed)
            if ($detail->getPrConcours() === $this) {
                $detail->setPrConcours(null);
            }
        }

        return $this;
    }

    

   

}
