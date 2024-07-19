<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: \App\Repository\UnivPrNatureEpreuveRepository::class)]
class UnivPrNatureEpreuve {

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
    #[ORM\Column(type: 'string', length: 100, nullable: true)]
    private $abreviation;

    /**
     * @var string
     *
     */
    #[Assert\NotBlank]
    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $designation;
    
     /**
     * @var integer
     */
    #[ORM\Column(type: 'boolean', nullable: true)]
    private $active;
    
    
         
    #[ORM\Column(type: 'boolean', nullable: true)]
    private $isEvaluation;

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

   
    
    
    
     /**
     * @var string
     */
    #[ORM\Column(type: 'string', length: 100, nullable: true)]
    private $type;

    /**
     * @var string
     */
    #[ORM\Column(type: 'string', length: 100, nullable: true)]
    private $nature;

    /**
     * @var integer
     */
    #[ORM\Column(type: 'integer', nullable: true)]
    private $examen;

    /**
     * @var string
     */
    #[ORM\Column(type: 'string', length: 10, nullable: true)]
    private $mapped;
    
    
     /**
     * @var string
     */
    #[ORM\Column(type: 'string', length: 10, nullable: true)]
    private $absence;
    
    /**
     * @var string
     */
    #[ORM\Column(type: 'string', length: 100, nullable: true)]
    private $prNatureEpreuvecol;
    

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

    public function getAbreviation(): ?string
    {
        return $this->abreviation;
    }

    public function setAbreviation(?string $abreviation): self
    {
        $this->abreviation = $abreviation;

        return $this;
    }

    public function getDesignation(): ?string
    {
        return $this->designation;
    }

    public function setDesignation(?string $designation): self
    {
        $this->designation = $designation;

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

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(?string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getNature(): ?string
    {
        return $this->nature;
    }

    public function setNature(?string $nature): self
    {
        $this->nature = $nature;

        return $this;
    }

    public function getExamen(): ?int
    {
        return $this->examen;
    }

    public function setExamen(?int $examen): self
    {
        $this->examen = $examen;

        return $this;
    }

    public function getMapped(): ?string
    {
        return $this->mapped;
    }

    public function setMapped(?string $mapped): self
    {
        $this->mapped = $mapped;

        return $this;
    }

    public function getAbsence(): ?string
    {
        return $this->absence;
    }

    public function setAbsence(?string $absence): self
    {
        $this->absence = $absence;

        return $this;
    }

    public function getPrNatureEpreuvecol(): ?string
    {
        return $this->prNatureEpreuvecol;
    }

    public function setPrNatureEpreuvecol(?string $prNatureEpreuvecol): self
    {
        $this->prNatureEpreuvecol = $prNatureEpreuvecol;

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

    public function getIsEvaluation(): ?bool
    {
        return $this->isEvaluation;
    }

    public function setIsEvaluation(?bool $isEvaluation): self
    {
        $this->isEvaluation = $isEvaluation;

        return $this;
    }

}
