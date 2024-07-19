<?php

namespace App\Entity;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: \App\Repository\UnivAcModuleRepository::class)]
#[ORM\HasLifecycleCallbacks]
class UnivAcModule {

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
    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $designation;

    /**
     * @var integer
     */
    #[ORM\Column(type: 'boolean', nullable: true)]
    private $active;

    #[ORM\JoinColumn(referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \UnivPCouleur::class)]
    private $couleur;

    /**
     * @var float
     */
    #[Assert\NotBlank]
    #[ORM\Column(type: 'float', nullable: true)]
    private $coefficient;
    
       /**
     * @var float
     */
    #[Assert\NotBlank]
    #[ORM\Column(type: 'string', length: 1, nullable: true)]
    private $type;

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

    #[ORM\JoinColumn(referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \UnivAcSemestre::class, inversedBy: 'modules')]
    #[Assert\NotBlank]
    private $semestre;
    
    
    
    
     #[ORM\OneToMany(targetEntity: \UnivAcElement::class, mappedBy: 'module', fetch: 'EAGER')]
    private $elements;
    
    


    public function __construct() {
        $this->elements = new ArrayCollection();
        
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

    public function getCouleur(): ?UnivPCouleur
    {
        return $this->couleur;
    }

    public function setCouleur(?UnivPCouleur $couleur): self
    {
        $this->couleur = $couleur;

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

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(?string $type): self
    {
        $this->type = $type;

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

    public function getSemestre(): ?UnivAcSemestre
    {
        return $this->semestre;
    }

    public function setSemestre(?UnivAcSemestre $semestre): self
    {
        $this->semestre = $semestre;

        return $this;
    }

    /**
     * @return Collection|UnivAcElement[]
     */
    public function getElements(): Collection
    {
        return $this->elements;
    }

    public function addElement(UnivAcElement $element): self
    {
        if (!$this->elements->contains($element)) {
            $this->elements[] = $element;
            $element->setModule($this);
        }

        return $this;
    }

    public function removeElement(UnivAcElement $element): self
    {
        if ($this->elements->contains($element)) {
            $this->elements->removeElement($element);
            // set the owning side to null (unless already changed)
            if ($element->getModule() === $this) {
                $element->setModule(null);
            }
        }

        return $this;
    }

}
