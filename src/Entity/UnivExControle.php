<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: \App\Repository\UnivExControleRepository::class)]
class UnivExControle {

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;
    
     #[ORM\Column(type: 'string', nullable: true)]
    private $reference;

    #[ORM\JoinColumn(referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \UnivAcEtablissement::class)]
    private $etablissement;

    #[ORM\JoinColumn(referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \UnivAcFormation::class)]
    private $formation;

    #[ORM\JoinColumn(referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \UnivAcPromotion::class)]
    private $promotion;

    #[ORM\JoinColumn(referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \UnivAcSemestre::class)]
    private $semestre;

    #[ORM\JoinColumn(referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \UnivAcModule::class)]
    private $module;

    #[ORM\JoinColumn(referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \UnivAcElement::class)]
    private $element;

    #[ORM\Column(type: 'boolean', nullable: true)]
    private $mCc;

    #[ORM\Column(type: 'boolean', nullable: true)]
    private $mTp;

    #[ORM\Column(type: 'boolean', nullable: true)]
    private $mEf;

    #[ORM\Column(type: 'boolean', nullable: true)]
    private $ccR;

    #[ORM\Column(type: 'boolean', nullable: true)]
    private $tpR;

    #[ORM\Column(type: 'boolean', nullable: true)]
    private $efR;
    
    
    #[ORM\Column(type: 'boolean', nullable: true)]
    private $mElement;
    
     #[ORM\Column(type: 'boolean', nullable: true)]
    private $mModule;
    
     #[ORM\Column(type: 'boolean', nullable: true)]
    private $mSemestre;
    
     #[ORM\Column(type: 'boolean', nullable: true)]
    private $mAnnee;
    
    
    
     #[ORM\Column(type: 'text', nullable: true)]
    private $observation;

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

    public function getMCc(): ?bool
    {
        return $this->mCc;
    }

    public function setMCc(?bool $mCc): self
    {
        $this->mCc = $mCc;

        return $this;
    }

    public function getMTp(): ?bool
    {
        return $this->mTp;
    }

    public function setMTp(?bool $mTp): self
    {
        $this->mTp = $mTp;

        return $this;
    }

    public function getMEf(): ?bool
    {
        return $this->mEf;
    }

    public function setMEf(?bool $mEf): self
    {
        $this->mEf = $mEf;

        return $this;
    }

    public function getCcR(): ?bool
    {
        return $this->ccR;
    }

    public function setCcR(?bool $ccR): self
    {
        $this->ccR = $ccR;

        return $this;
    }

    public function getTpR(): ?bool
    {
        return $this->tpR;
    }

    public function setTpR(?bool $tpR): self
    {
        $this->tpR = $tpR;

        return $this;
    }

    public function getEfR(): ?bool
    {
        return $this->efR;
    }

    public function setEfR(?bool $efR): self
    {
        $this->efR = $efR;

        return $this;
    }

    public function getMElement(): ?bool
    {
        return $this->mElement;
    }

    public function setMElement(?bool $mElement): self
    {
        $this->mElement = $mElement;

        return $this;
    }

    public function getMModule(): ?bool
    {
        return $this->mModule;
    }

    public function setMModule(?bool $mModule): self
    {
        $this->mModule = $mModule;

        return $this;
    }

    public function getMSemestre(): ?bool
    {
        return $this->mSemestre;
    }

    public function setMSemestre(?bool $mSemestre): self
    {
        $this->mSemestre = $mSemestre;

        return $this;
    }

    public function getMAnnee(): ?bool
    {
        return $this->mAnnee;
    }

    public function setMAnnee(?bool $mAnnee): self
    {
        $this->mAnnee = $mAnnee;

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

    public function getEtablissement(): ?UnivAcEtablissement
    {
        return $this->etablissement;
    }

    public function setEtablissement(?UnivAcEtablissement $etablissement): self
    {
        $this->etablissement = $etablissement;

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

    public function getPromotion(): ?UnivAcPromotion
    {
        return $this->promotion;
    }

    public function setPromotion(?UnivAcPromotion $promotion): self
    {
        $this->promotion = $promotion;

        return $this;
    }

    public function getSemestre(): ?UnivAcSemestre
    {
        return $this->semestre;
    }

    public function setSemestre(?UnivAcSemestre $semestre): self
    {
        $this->semestre = $semestre;

        return $this;
    }

    public function getModule(): ?UnivAcModule
    {
        return $this->module;
    }

    public function setModule(?UnivAcModule $module): self
    {
        $this->module = $module;

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
