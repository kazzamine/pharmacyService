<?php

namespace App\Entity;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;


#[ORM\Table(name: 'univ_p_concoursdet')]
#[ORM\Entity]
#[ORM\HasLifecycleCallbacks]
class UnivPConcoursdet {

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\JoinColumn(referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \UnivPConcourscab::class, inversedBy: 'details')]
    private $concourscab;

    #[ORM\JoinColumn(referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \UnivAcAnnee::class)]
    private $annee;

    
    #[ORM\JoinColumn(referencedColumnName: 'id')]
    #[Assert\NotBlank]
    #[ORM\ManyToOne(targetEntity: \UnivAcFormation::class)]
    private $formation;

    /**
     * @var integer
     */
    #[ORM\Column(type: 'boolean', nullable: true)]
    private $active = true;

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
    
    
    
       #[ORM\OneToMany(targetEntity: \UnivPConcoursdetClassement::class, mappedBy: 'concoursdet')]
    private $classements;

    public function __construct()
    {
        $this->classements = new ArrayCollection();
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

    public function getConcourscab(): ?UnivPConcourscab
    {
        return $this->concourscab;
    }

    public function setConcourscab(?UnivPConcourscab $concourscab): self
    {
        $this->concourscab = $concourscab;

        return $this;
    }

    public function getAnnee(): ?UnivAcAnnee
    {
        return $this->annee;
    }

    public function setAnnee(?UnivAcAnnee $annee): self
    {
        $this->annee = $annee;

        return $this;
    }

    public function getFormation(): ?UnivAcFormation
    {
        return $this->formation;
    }

    public function setFormation(?UnivAcFormation $formation): self
    {
        $this->formation = $formation;

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
     * @return Collection|UnivPConcoursdetClassement[]
     */
    public function getClassements(): Collection
    {
        return $this->classements;
    }

    public function addClassement(UnivPConcoursdetClassement $classement): self
    {
        if (!$this->classements->contains($classement)) {
            $this->classements[] = $classement;
            $classement->setConcoursdet($this);
        }

        return $this;
    }

    public function removeClassement(UnivPConcoursdetClassement $classement): self
    {
        if ($this->classements->contains($classement)) {
            $this->classements->removeElement($classement);
            // set the owning side to null (unless already changed)
            if ($classement->getConcoursdet() === $this) {
                $classement->setConcoursdet(null);
            }
        }

        return $this;
    }

    

}
