<?php

namespace App\Entity;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: \App\Repository\UnivAcSemestreRepository::class)]
#[ORM\HasLifecycleCallbacks]
class UnivAcSemestre
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;
    
     /**
     * @var string
     */
    #[ORM\Column(name: 'code', type: 'string', length: 100, nullable: true)]
    private $code;
    
    
            /**
     * @var string
     *
     */
    #[Assert\NotBlank]
    #[ORM\Column(name: 'designation', type: 'string', length: 255, nullable: true)]
    private $designation;
    
    
      /**
     * @var integer
     */
    #[ORM\Column(type: 'boolean', nullable: true)]
    private $active = true ;
    
    
    
    
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
     * @var float
     */
    #[ORM\Column(type: 'float', nullable: true)]
    private $coefficient;
    
       /**
     * @var float
     */
    #[ORM\Column(type: 'float', nullable: true)]
    private $coefficientAss;
    
    
    
     #[ORM\JoinColumn(referencedColumnName: 'id')]
    #[Assert\NotBlank]
    #[ORM\ManyToOne(targetEntity: \UnivAcPromotion::class, inversedBy: 'semestres')]
    private $promotion;
    

    #[ORM\PrePersist]
    public function setCreatedValue() {

        $this->created = new \DateTime();
    }

    #[ORM\PreUpdate]
    public function setUpdatedValue() {
        $this->updated = new \DateTime();
    }
    
    
    
     #[ORM\OneToMany(targetEntity: \UnivAcModule::class, mappedBy: 'semestre')]
    private $modules;
    
    
    public function __construct() {
        $this->modules = new ArrayCollection();
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

    public function getCoefficient(): ?float
    {
        return $this->coefficient;
    }

    public function setCoefficient(?float $coefficient): self
    {
        $this->coefficient = $coefficient;

        return $this;
    }

    public function getCoefficientAss(): ?float
    {
        return $this->coefficientAss;
    }

    public function setCoefficientAss(?float $coefficientAss): self
    {
        $this->coefficientAss = $coefficientAss;

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

    public function getPromotion(): ?UnivAcPromotion
    {
        return $this->promotion;
    }
    public function __toString() {
        return $this->designation;
    }

    public function setPromotion(?UnivAcPromotion $promotion): self
    {
        $this->promotion = $promotion;

        return $this;
    }

    /**
     * @return Collection|UnivAcModule[]
     */
    public function getModules(): Collection
    {
        return $this->modules;
    }

    public function addModule(UnivAcModule $module): self
    {
        if (!$this->modules->contains($module)) {
            $this->modules[] = $module;
            $module->setSemestre($this);
        }

        return $this;
    }

    public function removeModule(UnivAcModule $module): self
    {
        if ($this->modules->contains($module)) {
            $this->modules->removeElement($module);
            // set the owning side to null (unless already changed)
            if ($module->getSemestre() === $this) {
                $module->setSemestre(null);
            }
        }

        return $this;
    }
}
