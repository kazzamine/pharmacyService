<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: \App\Repository\UnivConvocationRepository::class)]
class UnivConvocation
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
   
    
    
    /**
     * @var integer
     */
    #[ORM\Column(type: 'string', nullable: true)]
    private $col4;
        /**
     * @var integer
     */
    #[ORM\Column(type: 'string', nullable: true)]
    private $col5;
        /**
     * @var integer
     */
    #[ORM\Column(type: 'string', nullable: true)]
    private $col6;
        /**
     * @var integer
     */
    #[ORM\Column(type: 'string', nullable: true)]
    private $col7;
        /**
     * @var integer
     */
    #[ORM\Column(type: 'string', nullable: true)]
    private $col8;
        /**
     * @var integer
     */
    #[ORM\Column(type: 'string', nullable: true)]
    private $col9;
        /**
     * @var integer
     */
    #[ORM\Column(type: 'string', nullable: true)]
    private $col10;
        /**
     * @var integer
     */
    #[ORM\Column(type: 'string', nullable: true)]
    private $col11;
    
    
        /**
     * @var integer
     */
    #[ORM\Column(type: 'string', nullable: true)]
    private $anonymat;

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

    public function getCol4(): ?string
    {
        return $this->col4;
    }

    public function setCol4(?string $col4): self
    {
        $this->col4 = $col4;

        return $this;
    }

    public function getCol5(): ?string
    {
        return $this->col5;
    }

    public function setCol5(?string $col5): self
    {
        $this->col5 = $col5;

        return $this;
    }

    public function getCol6(): ?string
    {
        return $this->col6;
    }

    public function setCol6(?string $col6): self
    {
        $this->col6 = $col6;

        return $this;
    }

    public function getCol7(): ?string
    {
        return $this->col7;
    }

    public function setCol7(?string $col7): self
    {
        $this->col7 = $col7;

        return $this;
    }

    public function getCol8(): ?string
    {
        return $this->col8;
    }

    public function setCol8(?string $col8): self
    {
        $this->col8 = $col8;

        return $this;
    }

    public function getCol9(): ?string
    {
        return $this->col9;
    }

    public function setCol9(?string $col9): self
    {
        $this->col9 = $col9;

        return $this;
    }

    public function getCol10(): ?string
    {
        return $this->col10;
    }

    public function setCol10(?string $col10): self
    {
        $this->col10 = $col10;

        return $this;
    }

    public function getCol11(): ?string
    {
        return $this->col11;
    }

    public function setCol11(?string $col11): self
    {
        $this->col11 = $col11;

        return $this;
    }

    public function getAnonymat(): ?string
    {
        return $this->anonymat;
    }

    public function setAnonymat(?string $anonymat): self
    {
        $this->anonymat = $anonymat;

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
