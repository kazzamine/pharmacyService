<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * XTypeBac
 */
#[ORM\Table(name: 'univ_t_inscription_imp_log')]
#[ORM\Entity]
#[ORM\HasLifecycleCallbacks]
class UnivTInscriptionImpLog {

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
    
    
   
    
    
      /**
     * @var string
     */
    #[ORM\Column(type: 'integer', nullable: true)]
    private $controle; 
    
    
     /**
     * @var string
     */
    #[ORM\Column(type: 'integer', nullable: true)]
    private $nombreEtiquettes; 
    
    
    /**
     * @var string
     */
    #[ORM\Column(type: 'integer', nullable: true)]
    private $codeAnonymat; 
    
        
    /**
     * @var string
     */
    #[ORM\Column(type: 'boolean', nullable: true)]
    private $isRatrappage; 
    
    
    
    
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

    public function getControle(): ?int
    {
        return $this->controle;
    }

    public function setControle(?int $controle): self
    {
        $this->controle = $controle;

        return $this;
    }

    public function getNombreEtiquettes(): ?int
    {
        return $this->nombreEtiquettes;
    }

    public function setNombreEtiquettes(?int $nombreEtiquettes): self
    {
        $this->nombreEtiquettes = $nombreEtiquettes;

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

    public function getIsRatrappage(): ?bool
    {
        return $this->isRatrappage;
    }

    public function setIsRatrappage(?bool $isRatrappage): self
    {
        $this->isRatrappage = $isRatrappage;

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
