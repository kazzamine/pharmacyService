<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Table(name: 'univ_pr_programmation')]
#[ORM\UniqueConstraint(name: '_unique_annee_element_natureepreuve', columns: ['nature_epreuve_id', 'annee_id', 'element_id'])]
#[ORM\Entity(repositoryClass: \App\Repository\UnivPrProgrammationRepository::class)]
#[ORM\HasLifecycleCallbacks]
#[UniqueEntity(fields: ['element', 'annee', 'natureEpreuve'], errorPath: 'natureEpreuve', message: 'Informations déjà utilisés.')]
class UnivPrProgrammation {

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
     * @var float
     */
    #[Assert\NotBlank]
    #[ORM\Column(type: 'float', nullable: true)]
    private $volumeHoraire;

    /**
     * @var string
     */
    #[ORM\Column(type: 'text', nullable: true)]
    private $observation;

    /**
     * @var integer
     */
    #[ORM\Column(type: 'integer', nullable: true)]
    private $regroupe;

    /**
     * @var string
     */
    #[ORM\Column(type: 'string', length: 2, nullable: true)]
    private $categorie;

    #[ORM\JoinColumn(referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \UnivAcAnnee::class)]
    private $annee;

    #[ORM\JoinColumn(referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \UnivAcElement::class)]
    private $element;

    #[ORM\JoinColumn(referencedColumnName: 'id')]
    #[Assert\NotBlank]
    #[ORM\ManyToOne(targetEntity: \UnivPrNatureEpreuve::class)]
    private $natureEpreuve;

    /**
     * @var integer
     */
    #[ORM\Column(type: 'boolean', nullable: true)]
    private $active=1;

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
    
    
        
    #[ORM\JoinTable(name: 'univ_pr_progens')]
    #[ORM\ManyToMany(targetEntity: \App\Entity\UnivPEnseignant::class, inversedBy: 'programmations')]
    private $enseignants;
    

    public function __construct()
    {
        $this->enseignants = new ArrayCollection();
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

    public function getVolumeHoraire(): ?float
    {
        return $this->volumeHoraire;
    }

    public function setVolumeHoraire(?float $volumeHoraire): self
    {
        $this->volumeHoraire = $volumeHoraire;

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

    public function getRegroupe(): ?int
    {
        return $this->regroupe;
    }

    public function setRegroupe(?int $regroupe): self
    {
        $this->regroupe = $regroupe;

        return $this;
    }

    public function getCategorie(): ?string
    {
        return $this->categorie;
    }

    public function setCategorie(?string $categorie): self
    {
        $this->categorie = $categorie;

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

    public function getAnnee(): ?UnivAcAnnee
    {
        return $this->annee;
    }

    public function setAnnee(?UnivAcAnnee $annee): self
    {
        $this->annee = $annee;

        return $this;
    }

    public function getElement(): ?UnivAcElement
    {
        return $this->element;
    }

    public function setElement(?UnivAcElement $element): self
    {
        $this->element = $element;

        return $this;
    }

    public function getNatureEpreuve(): ?UnivPrNatureEpreuve
    {
        return $this->natureEpreuve;
    }

    public function setNatureEpreuve(?UnivPrNatureEpreuve $natureEpreuve): self
    {
        $this->natureEpreuve = $natureEpreuve;

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
     * @return Collection|UnivPEnseignant[]
     */
    public function getEnseignants(): Collection
    {
        return $this->enseignants;
    }

    public function addEnseignant(UnivPEnseignant $enseignant): self
    {
        if (!$this->enseignants->contains($enseignant)) {
            $this->enseignants[] = $enseignant;
        }

        return $this;
    }

    public function removeEnseignant(UnivPEnseignant $enseignant): self
    {
        if ($this->enseignants->contains($enseignant)) {
            $this->enseignants->removeElement($enseignant);
        }

        return $this;
    }


}
