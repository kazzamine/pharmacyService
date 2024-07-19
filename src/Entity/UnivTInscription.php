<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\Collection;

#[ORM\Table(name: 'univ_t_inscription')]
#[ORM\Entity(repositoryClass: \App\Repository\UnivTInscriptionRepository::class)]
#[ORM\HasLifecycleCallbacks]
class UnivTInscription {

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
     * @var integer
     */
    #[ORM\Column(type: 'integer', nullable: true)]
    private $codeAnonymat;

    /**
     * @var integer
     */
    #[ORM\Column(type: 'integer', nullable: true)]
    private $codeAnonymatRat;
    
    
    /**
     * @var integer
     */
    #[ORM\Column(type: 'boolean', nullable: true)]
    private $reserve;
    
    /**
     * @var string
     */
    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $motif;
    
    
     /**
     * @var integer
     */
    #[ORM\Column(type: 'integer', nullable: true)]
    private $emplacement;

    /**
     * @var string
     */
    #[ORM\Column(type: 'string', length: 50, nullable: true)]
    private $typeCand;
    
    

    #[ORM\JoinColumn(referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \UnivPStatut::class)]
    private $statut;
    
        #[ORM\JoinColumn(referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \UnivPSalle::class)]
    private $salle;

  

    #[ORM\JoinColumn(referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \UnivPOrganisme::class)]
    private $organisme;
    
    
      #[ORM\JoinColumn(referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \UnivTAdmission::class)]
    private $admission;
    
    
    
     #[ORM\JoinColumn(referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \UnivAcAnnee::class)]
    private $annee;

    #[ORM\JoinColumn(referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \UnivAcPromotion::class)]
    private $promotion;
    
    
    
 
    
    
    
    

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

         #[ORM\OneToMany(targetEntity: \App\Entity\UnivTOperationcab::class, mappedBy: 'inscription')]
    private $operationscab;


    public function __construct()
    {
       
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

    public function getCodeAnonymat(): ?int
    {
        return $this->codeAnonymat;
    }

    public function setCodeAnonymat(?int $codeAnonymat): self
    {
        $this->codeAnonymat = $codeAnonymat;

        return $this;
    }

    public function getCodeAnonymatRat(): ?int
    {
        return $this->codeAnonymatRat;
    }

    public function setCodeAnonymatRat(?int $codeAnonymatRat): self
    {
        $this->codeAnonymatRat = $codeAnonymatRat;

        return $this;
    }

    public function getReserve(): ?bool
    {
        return $this->reserve;
    }

    public function setReserve(?bool $reserve): self
    {
        $this->reserve = $reserve;

        return $this;
    }

    public function getMotif(): ?string
    {
        return $this->motif;
    }

    public function setMotif(?string $motif): self
    {
        $this->motif = $motif;

        return $this;
    }

    public function getEmplacement(): ?int
    {
        return $this->emplacement;
    }

    public function setEmplacement(?int $emplacement): self
    {
        $this->emplacement = $emplacement;

        return $this;
    }

    public function getTypeCand(): ?string
    {
        return $this->typeCand;
    }

    public function setTypeCand(?string $typeCand): self
    {
        $this->typeCand = $typeCand;

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

    public function getSalle(): ?UnivPSalle
    {
        return $this->salle;
    }

    public function setSalle(?UnivPSalle $salle): self
    {
        $this->salle = $salle;

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

    public function getAdmission(): ?UnivTAdmission
    {
        return $this->admission;
    }

    public function setAdmission(?UnivTAdmission $admission): self
    {
        $this->admission = $admission;

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

    public function getPromotion(): ?UnivAcPromotion
    {
        return $this->promotion;
    }

    public function setPromotion(?UnivAcPromotion $promotion): self
    {
        $this->promotion = $promotion;

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
            $operation->setInscription($this);
        }

        return $this;
    }

    public function removeOperationscab(UnivTOperationcab $operation): self
    {
        if ($this->operationscab->contains($operation)) {
            $this->operationscab->removeElement($operation);
            // set the owning side to null (unless already changed)
            if ($operation->getInscription() === $this) {
                $operation->getInscription(null);
            }
        }

        return $this;
    }

}
