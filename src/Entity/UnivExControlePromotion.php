<?php

namespace App\Entity;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

#[ORM\Table(name: 'univ_ex_controle_promotion')]
#[ORM\UniqueConstraint(name: '_unique_annee_promotion', columns: ['annee_id', 'promotion_id'])]
#[ORM\Entity(repositoryClass: \App\Repository\UnivExControlePromotionRepository::class)]
#[ORM\HasLifecycleCallbacks]
#[UniqueEntity(fields: ['annee', 'promotion'], errorPath: 'promotion', message: 'Informations déjà utilisés.')]
class UnivExControlePromotion {

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[Assert\NotBlank]
    #[ORM\Column(type: 'text', nullable: true)]
    private $description;

    #[ORM\Column(type: 'boolean', nullable: true)]
    private $active=true;

    #[ORM\JoinColumn(referencedColumnName: 'id')]
    #[Assert\NotBlank]
    #[ORM\ManyToOne(targetEntity: \UnivAcAnnee::class)]
    private $annee;

    #[ORM\JoinColumn(referencedColumnName: 'id')]
    #[Assert\NotBlank]
    #[ORM\ManyToOne(targetEntity: \UnivAcPromotion::class)]
    private $promotion;
    
    
        #[ORM\OneToMany(targetEntity: \UnivExControleSemestre::class, mappedBy: 'controlePromotion')]
    private $controleSemestres;





        #[ORM\OneToMany(targetEntity: \App\Entity\UnivExAnotes::class, mappedBy: 'controlePromotion')]
    private $anotes;

    
    
    
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

    
        #[ORM\Column(type: 'json', nullable: true)]
    public $positionActuel = [];

    
    
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
        $this->controleSemestres = new ArrayCollection();
        $this->anotes = new ArrayCollection();
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

    public function getAnnee(): ?UnivAcAnnee
    {
        return $this->annee;
    }

    public function setAnnee(?UnivAcAnnee $annee): self
    {
        $this->annee = $annee;

        return $this;
    }

    public function getPromotion(): ?UnivAcPromotion
    {
        return $this->promotion;
    }

    public function setPromotion(?UnivAcPromotion $promotion): self
    {
        $this->promotion = $promotion;

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
     * @return Collection|UnivExControleSemestre[]
     */
    public function getControleSemestres(): Collection
    {
        return $this->controleSemestres;
    }

    public function addControleSemestre(UnivExControleSemestre $controleSemestre): self
    {
        if (!$this->controleSemestres->contains($controleSemestre)) {
            $this->controleSemestres[] = $controleSemestre;
            $controleSemestre->setControlePromotion($this);
        }

        return $this;
    }

    public function removeControleSemestre(UnivExControleSemestre $controleSemestre): self
    {
        if ($this->controleSemestres->contains($controleSemestre)) {
            $this->controleSemestres->removeElement($controleSemestre);
            // set the owning side to null (unless already changed)
            if ($controleSemestre->getControlePromotion() === $this) {
                $controleSemestre->setControlePromotion(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|UnivExAnotes[]
     */
    public function getAnotes(): Collection
    {
        return $this->anotes;
    }

    public function addAnote(UnivExAnotes $anote): self
    {
        if (!$this->anotes->contains($anote)) {
            $this->anotes[] = $anote;
            $anote->setControlePromotion($this);
        }

        return $this;
    }

    public function removeAnote(UnivExAnotes $anote): self
    {
        if ($this->anotes->contains($anote)) {
            $this->anotes->removeElement($anote);
            // set the owning side to null (unless already changed)
            if ($anote->getControlePromotion() === $this) {
                $anote->setControlePromotion(null);
            }
        }

        return $this;
    }

}
