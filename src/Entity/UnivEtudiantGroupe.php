<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EtudiantGroup
 */
#[ORM\Table(name: 'univ_etudiant_groupe')]
#[ORM\Entity]
#[ORM\HasLifecycleCallbacks]
class UnivEtudiantGroupe {

    /**
     * @var int
     */
    #[ORM\Column(name: 'id', type: 'integer')]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    private $id;

    #[ORM\JoinColumn(name: 't_inscription_id', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \UnivTInscription::class)]
    private $inscription;

    #[ORM\JoinColumn(name: 'division_group_detail_id', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \UnivDivisionGroupeDetail::class, inversedBy: 'etudiantsGroupe')]
    private $divisionGroupeDetail;
    
    
     #[ORM\JoinColumn(name: 'ac_annee_id', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \UnivAcAnnee::class)]
    private $annee;


    #[ORM\JoinColumn(name: 'ac_promotion_id', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \UnivAcPromotion::class)]
    private $promotion;

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
     * Get id
     *
     * @return integer
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     *
     * @return EtudiantGroupe
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
     * @return EtudiantGroupe
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
     * Set inscription
     *
     * 
     *
     * @return EtudiantGroupe
     */
    public function setInscription(UnivTInscription $inscription = null) {
        $this->inscription = $inscription;

        return $this;
    }

    /**
     * Get inscription
     *
     * 
     */
    public function getInscription() {
        return $this->inscription;
    }

    /**
     * Set divisionGroupeDetail
     *
     * 
     *
     * @return EtudiantGroupe
     */
    public function setDivisionGroupeDetail(UnivDivisionGroupeDetail $divisionGroupeDetail = null) {
        $this->divisionGroupeDetail = $divisionGroupeDetail;

        return $this;
    }

    /**
     * Get divisionGroupeDetail
     *
     * 
     */
    public function getDivisionGroupeDetail() {
        return $this->divisionGroupeDetail;
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
     * Set acPromotion
     *
     * 
     *
     * @return EtudiantGroupe
     */
    public function setAcPromotion(UnivAcPromotion $acPromotion = null)
    {
        $this->acPromotion = $acPromotion;
    
        return $this;
    }

    /**
     * Get acPromotion
     *
     * 
     */
    public function getAcPromotion()
    {
        return $this->acPromotion;
    }

    /**
     * Set annee
     *
     * 
     *
     * 
     */
    public function setAnnee(UnivAcAnnee $annee = null)
    {
        $this->annee = $annee;
    
        return $this;
    }

    /**
     * Get annee
     *
     * 
     */
    public function getAnnee()
    {
        return $this->annee;
    }

    /**
     * Set promotion
     *
     * 
     *
     * @return EtudiantGroupe
     */
    public function setPromotion(UnivAcPromotion $promotion = null)
    {
        $this->promotion = $promotion;
    
        return $this;
    }

    /**
     * Get promotion
     *
     * 
     */
    public function getPromotion()
    {
        return $this->promotion;
    }
    
    
    
     #[ORM\PrePersist]
    public function setCreatedValue() {

        $this->created = new \DateTime();
    }

    #[ORM\PreUpdate]
    public function setUpdatedValue() {
        $this->updated = new \DateTime();
    }
    
    
    
}
