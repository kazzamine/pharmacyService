<?php

namespace App\Entity;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

#[ORM\Table(name: 'univ_ex_controle_semestre')]
#[ORM\UniqueConstraint(name: '_unique_conrolepromotion_semestre', columns: ['controle_promotion_id', 'semestre_id'])]
#[ORM\Entity(repositoryClass: \App\Repository\UnivExControleSemestreRepository::class)]
class UnivExControleSemestre {

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
    #[ORM\ManyToOne(targetEntity: \UnivExControlePromotion::class, inversedBy: 'controleSemestres')]
    private $controlePromotion;

    #[ORM\JoinColumn(referencedColumnName: 'id')]
    #[Assert\NotBlank]
    #[ORM\ManyToOne(targetEntity: \UnivAcSemestre::class)]
    private $semestre;

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

    #[ORM\OneToMany(targetEntity: \UnivExControleModule::class, mappedBy: 'controleSemestre')]
    private $controleModules;

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
    
        #[ORM\OneToMany(targetEntity: \App\Entity\UnivExSnotes::class, mappedBy: 'controleSemestre')]
    private $snotes;

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
        $this->controleModules = new ArrayCollection();
        $this->snotes = new ArrayCollection();
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

    public function getDescription(): ?string {
        return $this->description;
    }

    public function setDescription(string $description): self {
        $this->description = $description;

        return $this;
    }

    public function getActive(): ?bool {
        return $this->active;
    }

    public function setActive(bool $active): self {
        $this->active = $active;

        return $this;
    }

    public function getCreated(): ?\DateTimeInterface {
        return $this->created;
    }

    public function setCreated(?\DateTimeInterface $created): self {
        $this->created = $created;

        return $this;
    }

    public function getUpdated(): ?\DateTimeInterface {
        return $this->updated;
    }

    public function setUpdated(?\DateTimeInterface $updated): self {
        $this->updated = $updated;

        return $this;
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
    public function getControlePromotion(): ?UnivExControlePromotion {
        return $this->controlePromotion;
    }

    public function setControlePromotion(?UnivExControlePromotion $controlePromotion): self {
        $this->controlePromotion = $controlePromotion;

        return $this;
    }

    public function getSemestre(): ?UnivAcSemestre {
        return $this->semestre;
    }

    public function setSemestre(?UnivAcSemestre $semestre): self {
        $this->semestre = $semestre;

        return $this;
    }

    public function getUserCreated(): ?User {
        return $this->userCreated;
    }

    public function setUserCreated(?User $userCreated): self {
        $this->userCreated = $userCreated;

        return $this;
    }

    public function getUserUpdated(): ?User {
        return $this->userUpdated;
    }

    public function setUserUpdated(?User $userUpdated): self {
        $this->userUpdated = $userUpdated;

        return $this;
    }

    /**
     * @return Collection|UnivExControleModule[]
     */
    public function getControleModules(): Collection
    {
        return $this->controleModules;
    }

    public function addControleModule(UnivExControleModule $controleModule): self
    {
        if (!$this->controleModules->contains($controleModule)) {
            $this->controleModules[] = $controleModule;
            $controleModule->setControleSemestre($this);
        }

        return $this;
    }

    public function removeControleModule(UnivExControleModule $controleModule): self
    {
        if ($this->controleModules->contains($controleModule)) {
            $this->controleModules->removeElement($controleModule);
            // set the owning side to null (unless already changed)
            if ($controleModule->getControleSemestre() === $this) {
                $controleModule->setControleSemestre(null);
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

    public function getCoefficientAss(): ?float
    {
        return $this->coefficientAss;
    }

    public function setCoefficientAss(?float $coefficientAss): self
    {
        $this->coefficientAss = $coefficientAss;

        return $this;
    }

    /**
     * @return Collection|UnivExSnotes[]
     */
    public function getSnotes(): Collection
    {
        return $this->snotes;
    }

    public function addSnote(UnivExSnotes $snote): self
    {
        if (!$this->snotes->contains($snote)) {
            $this->snotes[] = $snote;
            $snote->setControleSemestre($this);
        }

        return $this;
    }

    public function removeSnote(UnivExSnotes $snote): self
    {
        if ($this->snotes->contains($snote)) {
            $this->snotes->removeElement($snote);
            // set the owning side to null (unless already changed)
            if ($snote->getControleSemestre() === $this) {
                $snote->setControleSemestre(null);
            }
        }

        return $this;
    }

}
