<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * XTypeBac
 */
#[ORM\Table(name: 'univ_t_grpins')]
#[ORM\Entity]
#[ORM\HasLifecycleCallbacks]
class UnivTGrpins {

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
    #[ORM\ManyToOne(targetEntity: \UnivAcSemestre::class)]
    private $semestre;
    
    
      /**
     * @var string
     */
    #[ORM\Column(name: 'niv_1', type: 'string', length: 10, nullable: true)]
    private $niv1; 
    
    
       /**
     * @var string
     */
    #[ORM\Column(name: 'niv_2', type: 'string', length: 10, nullable: true)]
    private $niv2; 
    
    
       /**
     * @var string
     */
    #[ORM\Column(name: 'niv_3', type: 'string', length: 10, nullable: true)]
    private $niv3; 
    
    
       /**
     * @var string
     */
    #[ORM\Column(type: 'integer', length: 3, nullable: true)]
    private $cmptp; 
    
    
    
    
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

    public function getNiv1(): ?string
    {
        return $this->niv1;
    }

    public function setNiv1(?string $niv1): self
    {
        $this->niv1 = $niv1;

        return $this;
    }

    public function getNiv2(): ?string
    {
        return $this->niv2;
    }

    public function setNiv2(?string $niv2): self
    {
        $this->niv2 = $niv2;

        return $this;
    }

    public function getNiv3(): ?string
    {
        return $this->niv3;
    }

    public function setNiv3(?string $niv3): self
    {
        $this->niv3 = $niv3;

        return $this;
    }

    public function getCmptp(): ?int
    {
        return $this->cmptp;
    }

    public function setCmptp(?int $cmptp): self
    {
        $this->cmptp = $cmptp;

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

    public function getSemestre(): ?UnivAcSemestre
    {
        return $this->semestre;
    }

    public function setSemestre(?UnivAcSemestre $semestre): self
    {
        $this->semestre = $semestre;

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
