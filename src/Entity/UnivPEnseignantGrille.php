<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Table(name: 'univ_p_enseignant_grille')]
#[ORM\Entity]
#[ORM\HasLifecycleCallbacks]
class UnivPEnseignantGrille
{
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
     *
     */
    #[Assert\NotBlank]
    #[ORM\Column(type: 'float', nullable: true)]
    private $montant;
  
    
     #[ORM\JoinColumn(referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \UnivAcFormation::class)]
    private $formation;
    
    
    
      
    #[ORM\JoinColumn(referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \UnivPTypeElement::class)]
    private $typeElement;
    
     #[ORM\JoinColumn(referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \UnivPrNatureEpreuve::class)]
    private $natureEpreuve;
    
    
       
     #[ORM\JoinColumn(referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \UnivPGrade::class)]
    private $grade;
    
    
    
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
    
  
    
    
    
      #[ORM\PrePersist]
    public function setCreatedValue() {

        $this->created = new \DateTime();
    }

    #[ORM\PreUpdate]
    public function setUpdatedValue() {
        $this->updated = new \DateTime();
    }

    

    public function getId(): ?int
    {
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

    public function getMontant(): ?float
    {
        return $this->montant;
    }

    public function setMontant(?float $montant): self
    {
        $this->montant = $montant;

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

    public function getFormation(): ?UnivAcFormation
    {
        return $this->formation;
    }

    public function setFormation(?UnivAcFormation $formation): self
    {
        $this->formation = $formation;

        return $this;
    }

    public function getTypeElement(): ?UnivPTypeElement
    {
        return $this->typeElement;
    }

    public function setTypeElement(?UnivPTypeElement $typeElement): self
    {
        $this->typeElement = $typeElement;

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

    public function getGrade(): ?UnivPGrade
    {
        return $this->grade;
    }

    public function setGrade(?UnivPGrade $grade): self
    {
        $this->grade = $grade;

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
