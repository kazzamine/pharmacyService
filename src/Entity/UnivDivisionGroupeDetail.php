<?php

namespace App\Entity;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
/**
 * DivisionGroupDetail
 *
 *
 *
 *
 *
 */
#[ORM\Table(name: 'univ_division_groupe_detail')]
#[ORM\UniqueConstraint(name: '_unique_code_annee_promotion', columns: ['code', 'annee_id', 'promotion_id'])]
#[ORM\Entity(repositoryClass: \App\Repository\UnivDivisionGroupeDetailRepository::class)]
#[ORM\HasLifecycleCallbacks]
#[UniqueEntity(fields: ['code', 'annee', 'promotion'], errorPath: 'divisionGroupe', message: 'Informations déjà utilisés.')]
class UnivDivisionGroupeDetail {

    /**
     * @var int
     */
    #[ORM\Column(name: 'id', type: 'integer')]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    private $id;

    /**
     * @var string
     */
    #[ORM\Column(type: 'string', length: 100, nullable: true)]
    private $code;

    /**
     * @var string
     */
    #[ORM\Column(name: 'designation', type: 'string', length: 150, nullable: true)]
    private $designation;
    
    


    /**
     * @var string
     */
    #[ORM\Column(name: 'abreviation', type: 'string', length: 20, nullable: true)]
    private $abreviation;

    #[ORM\JoinColumn(name: 'division_groupe_id', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \UnivDivisionGroupe::class, inversedBy: 'divisionGroupeDetails')]
    private $divisionGroupe;

    #[ORM\OneToMany(targetEntity: \UnivEtudiantGroupe::class, mappedBy: 'divisionGroupeDetail')]
    private $etudiantsGroupe;

    /**
     *
     * @var \DateTime
     *
     */
    #[ORM\Column(name: 'created', type: 'datetime', nullable: true)]
    private $created;

    /**
     * @var integer
     */
    #[ORM\Column(type: 'boolean', nullable: true)]
    private $active=true;

    /**
     *
     * @var \DateTime
     *
     */
    #[ORM\Column(name: 'updated', type: 'datetime', nullable: true)]
    private $updated;

    #[ORM\JoinColumn(name: 'user_created')]
    #[ORM\ManyToOne(targetEntity: \User::class)]
    private $userCreated;

    #[ORM\JoinColumn(name: 'user_updated', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \User::class)]
    private $userUpdated;
    
    
  #[ORM\JoinColumn(referencedColumnName: 'id')]
    #[Assert\NotBlank]
    #[ORM\ManyToOne(targetEntity: \UnivAcAnnee::class)]
    private $annee;

    #[ORM\JoinColumn(referencedColumnName: 'id')]
    #[Assert\NotBlank]
    #[ORM\ManyToOne(targetEntity: \UnivAcPromotion::class)]
    private $promotion;

    public function __construct() {

        $this->etudiantsGroupe = new ArrayCollection();
    }
    
    
     #[ORM\PrePersist]
    public function setCreatedValue() {

        $this->created = new \DateTime();
    }

    #[ORM\PreUpdate]
    public function setUpdatedValue() {
        $this->updated = new \DateTime();
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set designation
     *
     * @param string $designation
     */
    public function setDesignation($designation) {
        $this->designation = $designation;

        return $this;
    }

    /**
     * Get designation
     *
     * @return string
     */
    public function getDesignation() {
        return $this->designation;
    }

    /**
     * Set abreviation
     *
     * @param string $abreviation
     */
    public function setAbreviation($abreviation) {
        $this->abreviation = $abreviation;

        return $this;
    }

    /**
     * Get abreviation
     *
     * @return string
     */
    public function getAbreviation() {
        return $this->abreviation;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     */
    public function setCreated($created) {
        $this->created = $created;

        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime
     */
    public function getCreated() {
        return $this->created;
    }

    /**
     * Set updated
     *
     * @param \DateTime $updated
     */
    public function setUpdated($updated) {
        $this->updated = $updated;

        return $this;
    }

    /**
     * Get updated
     *
     * @return \DateTime
     */
    public function getUpdated() {
        return $this->updated;
    }

    /**
     * Set divisionGroupe
     *
     * 
     *
     */
    public function setDivisionGroupe(?UnivDivisionGroupe $divisionGroupe = null) {
        $this->divisionGroupe = $divisionGroupe;

        return $this;
    }

    /**
     * Get divisionGroupe
     *
     * 
     */
    public function getDivisionGroupe() {
        return $this->divisionGroupe;
    }

    public function getUserCreated(): ?User {
        return $this->userCreated;
    }

    public function setUserCreated(?User $userCreated): self {
        $this->userCreated = $userCreated;

        return $this;
    }

    public function getUserUpdated(): ?User {
        return $this->userUpdated;
    }

    public function setUserUpdated(?User $userUpdated): self {
        $this->userUpdated = $userUpdated;

        return $this;
    }

    /**
     * Add etudiantsGroupe
     *
     * @param \App\Entity\EtudiantGroupe $etudiantsGroupe
     *
     */
    public function addEtudiantsGroupe(?UnivEtudiantGroupe $etudiantsGroupe) {
        $this->etudiantsGroupe[] = $etudiantsGroupe;

        return $this;
    }

    /**
     * Remove etudiantsGroupe
     *
     * @param \App\Entity\EtudiantGroupe $etudiantsGroupe
     */
    public function removeEtudiantsGroupe(?UnivEtudiantGroupe $etudiantsGroupe) {
        $this->etudiantsGroupe->removeElement($etudiantsGroupe);
    }

    /**
     * Get etudiantsGroupe
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEtudiantsGroupe() {
        return $this->etudiantsGroupe;
    }

    public function getCode(): ?string {
        return $this->code;
    }

    public function setCode(?string $code): self {
        $this->code = $code;

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

}
