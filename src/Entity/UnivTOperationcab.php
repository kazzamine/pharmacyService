<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Table(name: 'univ_t_operationcab')]
#[ORM\Entity(repositoryClass: \App\Repository\UnivTOperationcabRepository::class)]
#[ORM\HasLifecycleCallbacks]
class UnivTOperationcab {

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
    #[ORM\Column(type: 'text', nullable: true)]
    private $observation;

    /**
     * @var string
     */
    #[ORM\Column(type: 'string', nullable: true)]
    private $idEtudiantAnc;

    #[ORM\JoinColumn(referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \UnivTPreinscription::class, inversedBy: 'operationscab')]
    private $preinscription;

    #[ORM\JoinColumn(referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \UnivTAdmission::class)]
    private $admission;

    #[ORM\JoinColumn(referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \UnivTInscription::class)]
    private $inscription;

    #[ORM\JoinColumn(referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \UnivTOperationcabCategorie::class)]
    private $categorie;

    #[ORM\JoinColumn(referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \UnivPOrganisme::class)]
    private $organisme;

    #[ORM\JoinColumn(referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \UnivAcAnnee::class)]
    private $annee;

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



      #[ORM\OneToMany(targetEntity: \App\Entity\UnivTOperationdet::class, mappedBy: 'cab')]
    private $operationsdet;

  #[ORM\OneToMany(targetEntity: \App\Entity\UnivTReglement::class, mappedBy: 'cab')]
    private $reglement;
    
    public function __construct()
    {
        $this->operationsdet = new ArrayCollection();
        $this->reglement = new ArrayCollection();
        
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

    public function getObservation(): ?string
    {
        return $this->observation;
    }

    public function setObservation(?string $observation): self
    {
        $this->observation = $observation;

        return $this;
    }

    public function getIdEtudiantAnc(): ?string
    {
        return $this->idEtudiantAnc;
    }

    public function setIdEtudiantAnc(?string $idEtudiantAnc): self
    {
        $this->idEtudiantAnc = $idEtudiantAnc;

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

    public function getPreinscription(): ?UnivTPreinscription
    {
        return $this->preinscription;
    }

    public function setPreinscription(?UnivTPreinscription $preinscription): self
    {
        $this->preinscription = $preinscription;

        return $this;
    }

    public function getAdmission(): ?UnivTAdmission
    {
        return $this->admission;
    }

    public function setAdmission(?UnivTAdmission $admission): self
    {
        $this->admission = $admission;

        return $this;
    }

    public function getInscription(): ?UnivTInscription
    {
        return $this->inscription;
    }

    public function setInscription(?UnivTInscription $inscription): self
    {
        $this->inscription = $inscription;

        return $this;
    }

    public function getCategorie(): ?UnivTOperationcabCategorie
    {
        return $this->categorie;
    }

    public function setCategorie(?UnivTOperationcabCategorie $categorie): self
    {
        $this->categorie = $categorie;

        return $this;
    }

    public function getOrganisme(): ?UnivPOrganisme
    {
        return $this->organisme;
    }

    public function setOrganisme(?UnivPOrganisme $organisme): self
    {
        $this->organisme = $organisme;

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
     * @return Collection|UnivTOperationdet[]
     */
    public function getOperationsdet(): Collection
    {
        return $this->operationsdet;
    }

    public function addOperationsdet(UnivTOperationdet $operation): self
    {
        if (!$this->operationsdet->contains($operation)) {
            $this->operationsdet[] = $operation;
            $operation->setCab($this);
        }

        return $this;
    }

    public function removeOperationsdet(UnivTOperationdet $operation): self
    {
        if ($this->operationscab->contains($operation)) {
            $this->operationscab->removeElement($operation);
            // set the owning side to null (unless already changed)
            if ($operation->getCab() === $this) {
                $operation->getCab(null);
            }
        }

        return $this;
    }





     /**
     * @return Collection|UnivTReglement[]
     */
    public function getReglement(): Collection
    {
        return $this->reglement;
    }

    public function addReglement(UnivTReglement $reglement): self
    {
        if (!$this->reglement->contains($reglement)) {
            $this->reglement[] = $reglement;
            $reglement->setCab($this);
        }

        return $this;
    }

    public function removeReglement(UnivTReglement $reglement): self
    {
        if ($this->reglement->contains($reglement)) {
            $this->reglement->removeElement($reglement);
            // set the owning side to null (unless already changed)
            if ($reglement->getCab() === $this) {
                $reglement->getCab(null);
            }
        }

        return $this;
    }

}
