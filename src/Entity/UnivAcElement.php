<?php

namespace App\Entity;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: \App\Repository\UnivAcElementRepository::class)]
#[ORM\HasLifecycleCallbacks]
class UnivAcElement {

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

    /**
     * @var string
     */
    #[ORM\Column(type: 'string', length: 255, nullable: true)]
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
    #[ORM\Column(type: 'json', nullable: true)]
    private $coefficientEpreuve;

    /**
     * @var string
     */
    #[ORM\Column(type: 'integer', nullable: true)]
    private $type;

    /**
     * @var string
     */
    #[ORM\Column(type: 'integer', nullable: true)]
    private $coursDocument;



    


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
    #[ORM\ManyToOne(targetEntity: \UnivAcModule::class, inversedBy: 'elements')]
    #[Assert\NotBlank]
    private $module;

    #[ORM\OneToMany(targetEntity: \UnivAcEpreuve::class, mappedBy: 'element')]
    private $epreuves;


      #[ORM\OneToMany(targetEntity: \UnivExControleElement::class, mappedBy: 'element')]
    private $controlElement;

    

    #[ORM\ManyToOne(targetEntity: \App\Entity\UnivPTypeElement::class, inversedBy: 'univAcElements')]
    private $nature;

    public function __construct() {
        $this->epreuves = new ArrayCollection();
        $this->controlElement = new ArrayCollection();
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

    public function getCouleur(): ?string
    {
        return $this->couleur;
    }

    public function setCouleur(?string $couleur): self
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

    public function getCoefficientEpreuve(): ?array
    {
        return $this->coefficientEpreuve;
    }

    public function setCoefficientEpreuve(?array $coefficientEpreuve): self
    {
        $this->coefficientEpreuve = $coefficientEpreuve;

        return $this;
    }

    public function getType(): ?int
    {
        return $this->type;
    }

    public function setType(?int $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getCoursDocument(): ?int
    {
        return $this->coursDocument;
    }

    public function setCoursDocument(?int $coursDocument): self
    {
        $this->coursDocument = $coursDocument;

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

    public function getModule(): ?UnivAcModule
    {
        return $this->module;
    }

    public function setModule(?UnivAcModule $module): self
    {
        $this->module = $module;

        return $this;
    }

    /**
     * @return Collection|UnivAcEpreuve[]
     */
    public function getEpreuves(): Collection
    {
        return $this->epreuves;
    }

    public function addEpreufe(UnivAcEpreuve $epreufe): self
    {
        if (!$this->epreuves->contains($epreufe)) {
            $this->epreuves[] = $epreufe;
            $epreufe->setElement($this);
        }

        return $this;
    }

    public function removeEpreufe(UnivAcEpreuve $epreufe): self
    {
        if ($this->epreuves->contains($epreufe)) {
            $this->epreuves->removeElement($epreufe);
            // set the owning side to null (unless already changed)
            if ($epreufe->getElement() === $this) {
                $epreufe->setElement(null);
            }
        }

        return $this;
    }
    


/**
     * @return Collection|UnivExControleElement[]
     */
    public function getControlElement(): Collection
    {
        return $this->controlElement;
    }

   

  



    public function getNature(): ?UnivPTypeElement
    {
        return $this->nature;
    }

    public function setNature(?UnivPTypeElement $nature): self
    {
        $this->nature = $nature;

        return $this;
    }

    public function addControlElement(UnivExControleElement $controlElement): self
    {
        if (!$this->controlElement->contains($controlElement)) {
            $this->controlElement[] = $controlElement;
            $controlElement->setElement($this);
        }

        return $this;
    }

    public function removeControlElement(UnivExControleElement $controlElement): self
    {
        if ($this->controlElement->contains($controlElement)) {
            $this->controlElement->removeElement($controlElement);
            // set the owning side to null (unless already changed)
            if ($controlElement->getElement() === $this) {
                $controlElement->setElement(null);
            }
        }

        return $this;
    }

}
