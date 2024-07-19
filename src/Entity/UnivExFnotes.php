<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: \App\Repository\UnivExFnotesRepository::class)]
#[ORM\HasLifecycleCallbacks]
class UnivExFnotes {

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', nullable: true)]
    private $reference;
    
    
    
    
        #[ORM\JoinColumn(referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \UnivAcAnnee::class)]
    private $annee;

    #[ORM\JoinColumn(referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \UnivTAdmission::class)]
    private $admission;



    #[ORM\JoinColumn(referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \UnivAcFormation::class)]
    private $formation;

    #[ORM\Column(type: 'float', nullable: true)]
    private $moyValidation;

    #[ORM\Column(type: 'float', nullable: true)]
    private $moyClassement;

    #[ORM\Column(type: 'text', nullable: true)]
    private $observation;

    

    #[ORM\JoinColumn(referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \UnivPEstatut::class)]
    private $statutS2;

    #[ORM\JoinColumn(referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \UnivPEstatut::class)]
    private $statutDef;

    #[ORM\JoinColumn(referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \UnivPEstatut::class)]
    private $statutAff;

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

    public function getReference(): ?string
    {
        return $this->reference;
    }

    public function setReference(?string $reference): self
    {
        $this->reference = $reference;

        return $this;
    }

    public function getMoyValidation(): ?float
    {
        return $this->moyValidation;
    }

    public function setMoyValidation(?float $moyValidation): self
    {
        $this->moyValidation = $moyValidation;

        return $this;
    }

    public function getMoyClassement(): ?float
    {
        return $this->moyClassement;
    }

    public function setMoyClassement(?float $moyClassement): self
    {
        $this->moyClassement = $moyClassement;

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

    public function getAdmission(): ?UnivTAdmission
    {
        return $this->admission;
    }

    public function setAdmission(?UnivTAdmission $admission): self
    {
        $this->admission = $admission;

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

    public function getStatutS2(): ?UnivPEstatut
    {
        return $this->statutS2;
    }

    public function setStatutS2(?UnivPEstatut $statutS2): self
    {
        $this->statutS2 = $statutS2;

        return $this;
    }

    public function getStatutDef(): ?UnivPEstatut
    {
        return $this->statutDef;
    }

    public function setStatutDef(?UnivPEstatut $statutDef): self
    {
        $this->statutDef = $statutDef;

        return $this;
    }

    public function getStatutAff(): ?UnivPEstatut
    {
        return $this->statutAff;
    }

    public function setStatutAff(?UnivPEstatut $statutAff): self
    {
        $this->statutAff = $statutAff;

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
