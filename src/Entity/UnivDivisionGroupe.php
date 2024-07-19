<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
/**
 * DivisionGroup
 *
 *
 *
 *
 *
 */
#[ORM\Table(name: 'univ_division_groupe')]
#[ORM\UniqueConstraint(name: '_unique_division', columns: ['division'])]
#[ORM\Entity]
#[ORM\HasLifecycleCallbacks]
#[UniqueEntity('division')]
class UnivDivisionGroupe {

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
    #[Assert\NotBlank]
    #[ORM\Column(name: 'designation', type: 'string', length: 150, nullable: true)]
    private $designation;

    /**
     * @var string
     */
    #[Assert\NotBlank]
    #[ORM\Column(type: 'text', nullable: true)]
    private $description;

    /**
     * @var string
     */
    #[Assert\NotBlank]
    #[ORM\Column(name: 'abreviation', type: 'string', length: 20, nullable: true)]
    private $abreviation;

    /**
     * @var integer
     */
    #[ORM\Column(name: 'division', type: 'integer', nullable: false)]
    private $division;

    /**
     *
     * @var \DateTime
     *
     */
    #[ORM\Column(name: 'created', type: 'datetime', nullable: true)]
    private $created;

    /**
     *
     * @var \DateTime
     *
     */
    #[ORM\Column(name: 'updated', type: 'datetime', nullable: true)]
    private $updated;

    #[ORM\JoinColumn(name: 'user_created', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \User::class)]
    private $userCreated;

    #[ORM\JoinColumn(name: 'user_updated', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \User::class)]
    private $userUpdated;

    /**
     * @var integer
     */
    #[ORM\Column(type: 'boolean', nullable: true)]
    private $active=true;

    #[ORM\OneToMany(targetEntity: \UnivDivisionGroupeDetail::class, mappedBy: 'divisionGroupe')]
    private $divisionGroupeDetails;

    public function __construct() {
        $this->divisionGroupeDetails = new \Doctrine\Common\Collections\ArrayCollection();
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
     *
     * @return DivisionGroupe
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
     *
     * @return DivisionGroupe
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
     * Set division
     *
     * @param integer $division
     *
     * @return DivisionGroupe
     */
    public function setDivision($division) {
        $this->division = $division;

        return $this;
    }

    /**
     * Get division
     *
     * @return integer
     */
    public function getDivision() {
        return $this->division;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     *
     * @return DivisionGroupe
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
     *
     * @return DivisionGroupe
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
     * Add divisionGroupeDetail
     *
     * @param \App\Entity\DivisionGroupeDetail $divisionGroupeDetail
     *
     * @return DivisionGroupe
     */
    public function addDivisionGroupeDetail(?UnivDivisionGroupeDetail $divisionGroupeDetail) {
        $this->divisionGroupeDetails[] = $divisionGroupeDetail;

        return $this;
    }

    /**
     * Remove divisionGroupeDetail
     *
     * @param \App\Entity\DivisionGroupeDetail $divisionGroupeDetail
     */
    public function removeDivisionGroupeDetail(?UnivDivisionGroupeDetail $divisionGroupeDetail) {
        $this->divisionGroupeDetails->removeElement($divisionGroupeDetail);
    }

    /**
     * Get divisionGroupeDetails
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDivisionGroupeDetails() {
        return $this->divisionGroupeDetails;
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

    public function getCode(): ?string {
        return $this->code;
    }

    public function setCode(?string $code): self {
        $this->code = $code;

        return $this;
    }

    public function getActive(): ?bool {
        return $this->active;
    }

    public function setActive(?bool $active): self {
        $this->active = $active;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

}
