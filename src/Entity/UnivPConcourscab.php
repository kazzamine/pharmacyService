<?php

namespace App\Entity;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Table(name: 'univ_p_concourscab')]
#[ORM\Entity(repositoryClass: \App\Repository\UnivPConcourscabRepository::class)]
#[ORM\HasLifecycleCallbacks]
class UnivPConcourscab {

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
    #[Assert\NotBlank]
    #[ORM\Column(type: 'string', nullable: true)]
    private $designation;

    /**
     * @var string
     */
    #[ORM\Column(type: 'string', length: 100, nullable: true)]
    private $abreviation;
    
    
    

    #[Assert\NotBlank]
    #[ORM\Column(type: 'integer', nullable: true)]
    private $annee;    
    
     
    #[Assert\NotBlank]
    #[ORM\Column(type: 'date', nullable: true)]
    private $date;
    
    
    #[ORM\Column(type: 'time', nullable: true)]
    private $heure;
    
    
      
    #[ORM\Column(type: 'time', nullable: true)]
    private $heureFin;
    
    
    /**
     * @var integer
     */
    #[ORM\Column(type: 'boolean', nullable: true)]
    private $avecConcours = true;

    /**
     * @var integer
     */
    #[ORM\Column(type: 'boolean', nullable: true)]
    private $active = true;
    
    
     #[ORM\JoinTable(name: 'univ_p_concours_matieres')]
    #[ORM\ManyToMany(targetEntity: \UnivPMatiere::class, cascade: ['persist'])]
    private $matieres;
    
        #[ORM\OneToMany(targetEntity: \UnivPConcoursGrille::class, mappedBy: 'concourscab')]
    private $grilles;

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
    
       #[ORM\OneToMany(targetEntity: \UnivPConcoursdet::class, mappedBy: 'concourscab')]
    private $details;

    public function __construct()
    {
        $this->matieres = new ArrayCollection();
        $this->details = new ArrayCollection();
        $this->grilles = new ArrayCollection();
    }

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

    public function getDesignation(): ?string
    {
        return $this->designation;
    }

    public function setDesignation(?string $designation): self
    {
        $this->designation = $designation;

        return $this;
    }

    public function getAbreviation(): ?string
    {
        return $this->abreviation;
    }

    public function setAbreviation(?string $abreviation): self
    {
        $this->abreviation = $abreviation;

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

    public function getHeure(): ?\DateTimeInterface
    {
        return $this->heure;
    }

    public function setHeure(?\DateTimeInterface $heure): self
    {
        $this->heure = $heure;

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


    public function getAvecConcours(): ?bool
    {
        return $this->avecConcours;
    }

    public function setAvecConcours(?bool $avecConcours): self
    {
        $this->avecConcours = $avecConcours;

        return $this;
    }

    public function getAnnee(): ?int
    {
        return $this->annee;
    }

    public function setAnnee(?int $annee): self
    {
        $this->annee = $annee;

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

    /**
     * @return Collection|UnivPMatiere[]
     */
    public function getMatieres(): Collection
    {
        return $this->matieres;
    }

    public function addMatiere(UnivPMatiere $matiere): self
    {
        if (!$this->matieres->contains($matiere)) {
            $this->matieres[] = $matiere;
        }

        return $this;
    }

    public function removeMatiere(UnivPMatiere $matiere): self
    {
        if ($this->matieres->contains($matiere)) {
            $this->matieres->removeElement($matiere);
        }

        return $this;
    }

    /**
     * @return Collection|UnivPConcoursdet[]
     */
    public function getDetails(): Collection
    {
        return $this->details;
    }

    public function addDetail(UnivPConcoursdet $detail): self
    {
        if (!$this->details->contains($detail)) {
            $this->details[] = $detail;
            $detail->setConcourscab($this);
        }

        return $this;
    }

    public function removeDetail(UnivPConcoursdet $detail): self
    {
        if ($this->details->contains($detail)) {
            $this->details->removeElement($detail);
            // set the owning side to null (unless already changed)
            if ($detail->getConcourscab() === $this) {
                $detail->setConcourscab(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|UnivPConcoursGrille[]
     */
    public function getGrilles(): Collection
    {
        return $this->grilles;
    }

    public function addGrille(UnivPConcoursGrille $grille): self
    {
        if (!$this->grilles->contains($grille)) {
            $this->grilles[] = $grille;
            $grille->setConcourscab($this);
        }

        return $this;
    }

    public function removeGrille(UnivPConcoursGrille $grille): self
    {
        if ($this->grilles->contains($grille)) {
            $this->grilles->removeElement($grille);
            // set the owning side to null (unless already changed)
            if ($grille->getConcourscab() === $this) {
                $grille->setConcourscab(null);
            }
        }

        return $this;
    }

    

}
