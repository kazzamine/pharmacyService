<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Table(name: 'univ_t_etudiant_bloque')]
#[ORM\Entity]
#[ORM\HasLifecycleCallbacks]
class UnivTEtudiantBloque {

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
    #[ORM\ManyToOne(targetEntity: \UnivAcAnnee::class)]
    private $annee;
    
      #[ORM\JoinColumn(referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \UnivTEtudiant::class)]
    private $etudiant;
    
    

    /**
     * @var string
     */
    #[ORM\Column(type: 'string', nullable: true)]
    private $incident;
    
    
    
    /**
     * @var string
     */
    #[ORM\Column(type: 'date', nullable: true)]
    private $dateIncident;
    
    

    /**
     * @var string
     */
    #[ORM\Column(type: 'string', length: 150, nullable: true)]
    private $responsable;

  

    /**
     * @var string
     */
    #[ORM\Column(type: 'text', nullable: true)]
    private $conseilDiscipline; 
    
    
        /**
     * @var string
     */
    #[ORM\Column(type: 'text', nullable: true)]
    private $decisionDiscipline; 


   
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

    public function getIncident(): ?string
    {
        return $this->incident;
    }

    public function setIncident(?string $incident): self
    {
        $this->incident = $incident;

        return $this;
    }

    public function getDateIncident(): ?\DateTimeInterface
    {
        return $this->dateIncident;
    }

    public function setDateIncident(?\DateTimeInterface $dateIncident): self
    {
        $this->dateIncident = $dateIncident;

        return $this;
    }

    public function getResponsable(): ?string
    {
        return $this->responsable;
    }

    public function setResponsable(?string $responsable): self
    {
        $this->responsable = $responsable;

        return $this;
    }

    public function getConseilDiscipline(): ?string
    {
        return $this->conseilDiscipline;
    }

    public function setConseilDiscipline(?string $conseilDiscipline): self
    {
        $this->conseilDiscipline = $conseilDiscipline;

        return $this;
    }

    public function getDecisionDiscipline(): ?string
    {
        return $this->decisionDiscipline;
    }

    public function setDecisionDiscipline(?string $decisionDiscipline): self
    {
        $this->decisionDiscipline = $decisionDiscipline;

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

    public function getEtudiant(): ?UnivTEtudiant
    {
        return $this->etudiant;
    }

    public function setEtudiant(?UnivTEtudiant $etudiant): self
    {
        $this->etudiant = $etudiant;

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
