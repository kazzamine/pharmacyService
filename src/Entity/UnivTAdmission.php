<?php

namespace App\Entity;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Table(name: 'univ_t_admission')]
#[ORM\Entity(repositoryClass: \App\Repository\UnivTAdmissionRepository::class)]
#[ORM\HasLifecycleCallbacks]
class UnivTAdmission {

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
    #[ORM\ManyToOne(targetEntity: \UnivPStatut::class)]
    private $statut;

    #[ORM\JoinColumn(referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \UnivTPreinscription::class, inversedBy: 'admissions')]
    private $preinscription;

      /**
     * @var integer
     */
    #[ORM\Column(type: 'boolean', nullable: true)]
    private $fermer;
    
    
    #[ORM\JoinTable(name: 'univ_t_admission_documents')]
    #[ORM\ManyToMany(targetEntity: \UnivPDocument::class, cascade: ['persist'])]
    private $admissionDocuments;
  
   


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

          #[ORM\OneToMany(targetEntity: \App\Entity\UnivTOperationcab::class, mappedBy: 'admission')]
    private $operationscab;

    public function __construct()
    {
        $this->admissionDocuments = new ArrayCollection();
        $this->operationscab = new ArrayCollection();
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

    public function getFermer(): ?bool
    {
        return $this->fermer;
    }

    public function setFermer(?bool $fermer): self
    {
        $this->fermer = $fermer;

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

    public function getStatut(): ?UnivPStatut
    {
        return $this->statut;
    }

    public function setStatut(?UnivPStatut $statut): self
    {
        $this->statut = $statut;

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

    /**
     * @return Collection|UnivPDocument[]
     */
    public function getAdmissionDocuments(): Collection
    {
        return $this->admissionDocuments;
    }

    public function addAdmissionDocument(UnivPDocument $admissionDocument): self
    {
        if (!$this->admissionDocuments->contains($admissionDocument)) {
            $this->admissionDocuments[] = $admissionDocument;
        }

        return $this;
    }

    public function removeAdmissionDocument(UnivPDocument $admissionDocument): self
    {
        if ($this->admissionDocuments->contains($admissionDocument)) {
            $this->admissionDocuments->removeElement($admissionDocument);
        }

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
     * @return Collection|UnivTOperationcab[]
     */
    public function getOperationscab(): Collection
    {
        return $this->operationscab;
    }

    public function addOperationscab(UnivTOperationcab $operation): self
    {
        if (!$this->operationscab->contains($operation)) {
            $this->operationscab[] = $operation;
            $operation->setAdmission($this);
        }

        return $this;
    }

    public function removeOperationscab(UnivTOperationcab $operation): self
    {
        if ($this->operationscab->contains($operation)) {
            $this->operationscab->removeElement($operation);
            // set the owning side to null (unless already changed)
            if ($operation->getAdmission() === $this) {
                $operation->getAdmission(null);
            }
        }

        return $this;
    }

}
