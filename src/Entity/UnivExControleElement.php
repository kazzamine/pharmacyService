<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

#[ORM\Table(name: 'univ_ex_controle_element')]
#[ORM\UniqueConstraint(name: '_unique_conrolemodule_element', columns: ['controle_module_id', 'element_id'])]
#[ORM\Entity(repositoryClass: \App\Repository\UnivExControleElementRepository::class)]
class UnivExControleElement {

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[Assert\NotBlank]
    #[ORM\Column(type: 'text', nullable: true)]
    private $description;

    #[ORM\Column(type: 'boolean', nullable: true)]
    private $active = true;

    #[ORM\JoinColumn(referencedColumnName: 'id')]
    #[Assert\NotBlank]
    #[ORM\ManyToOne(targetEntity: \UnivExControleModule::class, inversedBy: 'controleElements')]
    private $controleModule;

    #[ORM\OneToMany(targetEntity: \UnivAcEpreuve::class, mappedBy: 'controleElement')]
    private $controleEpreuves;

    #[ORM\JoinColumn(referencedColumnName: 'id')]
    #[Assert\NotBlank]
    #[ORM\ManyToOne(targetEntity: \UnivAcElement::class)]
    private $element;


    #[ORM\ManyToOne(targetEntity: \App\Entity\UnivPTypeElement::class, inversedBy: 'controleElements')]
    #[Assert\NotBlank]
    private $typeElement;

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

    #[ORM\OneToMany(targetEntity: \App\Entity\UnivExControleEpreuve::class, mappedBy: 'controleElement')]
    private $univExControleEpreuves;
    
    
     #[ORM\OneToMany(targetEntity: \App\Entity\UnivExEnotes::class, mappedBy: 'controleElement')]
    private $enotes;


    #[ORM\Column(type: 'json', nullable: true)]
    public $positionActuel = [];



    #[ORM\Column(type: 'json', nullable: true)]
    private $historique;
    
      public function getPositionActuel(): ?array {
        return $this->positionActuel;
    }

    public function setPositionActuel(?array $positionActuel): self {
        $this->positionActuel = $positionActuel;

        $this->historique[] = [
            'current_place' => $positionActuel,
            'time' => (new \DateTime())->format('c'),
            'user_nom' => $this->getUserCreated()? $this->getUserCreated()->getNom():null ,
            'user_prenom' => $this->getUserCreated()?  $this->getUserCreated()->getPrenom():null ,
            'user_username' => $this->getUserCreated()?  $this->getUserCreated()->getUsername():null ,
            'user_id' => $this->getUserCreated()?  $this->getUserCreated()->getId():null 
        ];

        return $this;
    }

    public function __construct()
    {
        $this->controleEpreuves = new ArrayCollection();
        $this->univExControleEpreuves = new ArrayCollection();
        $this->enotes = new ArrayCollection();
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

    public function getHistorique(): ?array
    {
        return $this->historique;
    }

    public function setHistorique(?array $historique): self
    {
        $this->historique = $historique;

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

    public function getControleModule(): ?UnivExControleModule
    {
        return $this->controleModule;
    }

    public function setControleModule(?UnivExControleModule $controleModule): self
    {
        $this->controleModule = $controleModule;

        return $this;
    }

    /**
     * @return Collection|UnivAcEpreuve[]
     */
    public function getControleEpreuves(): Collection
    {
        return $this->controleEpreuves;
    }

    public function addControleEpreufe(UnivAcEpreuve $controleEpreufe): self
    {
        if (!$this->controleEpreuves->contains($controleEpreufe)) {
            $this->controleEpreuves[] = $controleEpreufe;
            $controleEpreufe->setControleElement($this);
        }

        return $this;
    }

    public function removeControleEpreufe(UnivAcEpreuve $controleEpreufe): self
    {
        if ($this->controleEpreuves->contains($controleEpreufe)) {
            $this->controleEpreuves->removeElement($controleEpreufe);
            // set the owning side to null (unless already changed)
            if ($controleEpreufe->getControleElement() === $this) {
                $controleEpreufe->setControleElement(null);
            }
        }

        return $this;
    }

    public function getElement(): ?UnivAcElement
    {
        return $this->element;
    }

    public function setElement(?UnivAcElement $element): self
    {
        $this->element = $element;

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

    /**
     * @return Collection|UnivExControleEpreuve[]
     */
    public function getUnivExControleEpreuves(): Collection
    {
        return $this->univExControleEpreuves;
    }

    public function addUnivExControleEpreufe(UnivExControleEpreuve $univExControleEpreufe): self
    {
        if (!$this->univExControleEpreuves->contains($univExControleEpreufe)) {
            $this->univExControleEpreuves[] = $univExControleEpreufe;
            $univExControleEpreufe->setControleElement($this);
        }

        return $this;
    }

    public function removeUnivExControleEpreufe(UnivExControleEpreuve $univExControleEpreufe): self
    {
        if ($this->univExControleEpreuves->contains($univExControleEpreufe)) {
            $this->univExControleEpreuves->removeElement($univExControleEpreufe);
            // set the owning side to null (unless already changed)
            if ($univExControleEpreufe->getControleElement() === $this) {
                $univExControleEpreufe->setControleElement(null);
            }
        }

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

    /**
     * @return Collection|UnivExEnotes[]
     */
    public function getEnotes(): Collection
    {
        return $this->enotes;
    }

    public function addEnote(UnivExEnotes $enote): self
    {
        if (!$this->enotes->contains($enote)) {
            $this->enotes[] = $enote;
            $enote->setControleElement($this);
        }

        return $this;
    }

    public function removeEnote(UnivExEnotes $enote): self
    {
        if ($this->enotes->contains($enote)) {
            $this->enotes->removeElement($enote);
            // set the owning side to null (unless already changed)
            if ($enote->getControleElement() === $this) {
                $enote->setControleElement(null);
            }
        }

        return $this;
    }

    

  
}
