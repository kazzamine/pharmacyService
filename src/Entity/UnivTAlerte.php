<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Table(name: 'univ_t_alerte')]
#[ORM\Entity(repositoryClass: \App\Repository\UnivTAlerteRepository::class)]
class UnivTAlerte
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
    
    
        #[ORM\JoinColumn(referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \UnivTInscription::class)]
    private $inscription;
    
           #[ORM\JoinColumn(referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \UnivPMesureAlerte::class)]
    private $mesureAlerte;
    
    
           #[ORM\JoinColumn(referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \UnivPNatureAlerte::class)]
    private $natureAlerte;
    
    
    
    /**
     * @var string
     */
    #[ORM\Column(type: 'date', nullable: true)]
    private $date;
    
       /**
     * @var string
     */
    #[ORM\Column(type: 'string', length: 20, nullable: true)]
    private $type;
    
    

    /**
     * @var string
     */
    #[ORM\Column(type: 'text', nullable: true)]
    private $objectif;
    
    
    
       /**
     * @var string
     */
    #[ORM\Column(type: 'text', nullable: true)]
    private $description;


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

    public function __construct() {
        
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

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(?\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(?string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getObjectif(): ?string
    {
        return $this->objectif;
    }

    public function setObjectif(?string $objectif): self
    {
        $this->objectif = $objectif;

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

    public function getInscription(): ?UnivTInscription
    {
        return $this->inscription;
    }

    public function setInscription(?UnivTInscription $inscription): self
    {
        $this->inscription = $inscription;

        return $this;
    }

    public function getMesureAlerte(): ?UnivPMesureAlerte
    {
        return $this->mesureAlerte;
    }

    public function setMesureAlerte(?UnivPMesureAlerte $mesureAlerte): self
    {
        $this->mesureAlerte = $mesureAlerte;

        return $this;
    }

    public function getNatureAlerte(): ?UnivPNatureAlerte
    {
        return $this->natureAlerte;
    }

    public function setNatureAlerte(?UnivPNatureAlerte $natureAlerte): self
    {
        $this->natureAlerte = $natureAlerte;

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
