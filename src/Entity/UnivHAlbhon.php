<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Table(name: 'univ_h_albhon')]
#[ORM\Entity(repositoryClass: \App\Repository\UnivHAlbhonRepository::class)]
#[ORM\HasLifecycleCallbacks]
class UnivHAlbhon {

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
    #[ORM\ManyToOne(targetEntity: \UnivAcPromotion::class)]
    private $promotion;

    /**
     * @var string
     */
    #[ORM\Column(type: 'date', nullable: true)]
    private $dateEnvoie;

    /**
     * @var string
     */
    #[ORM\Column(type: 'float', nullable: true)]
    private $totHeure;

    /**
     * @var string
     */
    #[ORM\Column(type: 'float', nullable: true)]
    private $totMt;

    /**
     * @var string
     */
    #[ORM\Column(type: 'integer', nullable: true)]
    private $semaine;
    
    

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

    #[ORM\Column(type: 'text')]
    private $observation;

    #[ORM\Column(type: 'date', nullable: true)]
    private $date;

    #[ORM\OneToMany(targetEntity: \App\Entity\UnivHHonens::class, mappedBy: 'brd')]
    private $univHHonens;


    
         #[ORM\ManyToOne(targetEntity: \App\Entity\User::class)]
    private $userValider;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private $dateValider;

  



    #[ORM\ManyToOne(targetEntity: \App\Entity\User::class)]
    private $userEncours;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private $dateEncours;

 

      #[ORM\Column(type: 'json', nullable: true)]
    public $positionActuel = [];







    public function __construct()
    {
        $this->univHHonens = new ArrayCollection();
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

    public function getDateEnvoie(): ?\DateTimeInterface
    {
        return $this->dateEnvoie;
    }

    public function setDateEnvoie(?\DateTimeInterface $dateEnvoie): self
    {
        $this->dateEnvoie = $dateEnvoie;

        return $this;
    }

    public function getTotHeure(): ?float
    {
        return $this->totHeure;
    }

    public function setTotHeure(?float $totHeure): self
    {
        $this->totHeure = $totHeure;

        return $this;
    }

    public function getTotMt(): ?float
    {
        return $this->totMt;
    }

    public function setTotMt(?float $totMt): self
    {
        $this->totMt = $totMt;

        return $this;
    }

    public function getSemaine(): ?int
    {
        return $this->semaine;
    }

    public function setSemaine(?int $semaine): self
    {
        $this->semaine = $semaine;

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

    public function getObservation(): ?string
    {
        return $this->observation;
    }

    public function setObservation(string $observation): self
    {
        $this->observation = $observation;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(?\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    /**
     * @return Collection|UnivHHonens[]
     */
    public function getUnivHHonens(): Collection
    {
        return $this->univHHonens;
    }

    public function addUnivHHonen(UnivHHonens $univHHonen): self
    {
        if (!$this->univHHonens->contains($univHHonen)) {
            $this->univHHonens[] = $univHHonen;
            $univHHonen->setBrd($this);
        }

        return $this;
    }

    public function removeUnivHHonen(UnivHHonens $univHHonen): self
    {
        if ($this->univHHonens->contains($univHHonen)) {
            $this->univHHonens->removeElement($univHHonen);
            // set the owning side to null (unless already changed)
            if ($univHHonen->getBrd() === $this) {
                $univHHonen->setBrd(null);
            }
        }

        return $this;
    }



    public function getUserValider(): ?User
    {
        return $this->userValider;
    }

    public function setUserValider(?User $userValider): self
    {
        $this->userValider = $userValider;

        return $this;
    }



    public function getUserEncours(): ?User
    {
        return $this->userEncours;
    }

    public function setUserEncours(?User $userEncours): self
    {
        $this->userEncours = $userEncours;

        return $this;
    }


    public function getDateValider(): ?\DateTimeInterface
    {
        return $this->dateValider;
    }

    public function setDateValider(?\DateTimeInterface $dateValider): self
    {
        $this->dateValider = $dateValider;

        return $this;
    }
    public function getDateEncours(): ?\DateTimeInterface
    {
        return $this->dateEncours;
    }

    public function setDateEncours(?\DateTimeInterface $dateEncours): self
    {
        $this->dateEncours = $dateEncours;

        return $this;
    }


    public function getPositionActuel(): ?array {
        return $this->positionActuel;
    }

    public function setPositionActuel(?array $positionActuel): self {
        $this->positionActuel = $positionActuel;

        $this->historique[] = [
            'current_place' => $positionActuel,
            'time' => (new \DateTime())->format('c'),
            'user_nom' => $this->getUserCreated()->getNom(),
            'user_prenom' => $this->getUserCreated()->getPrenom(),
            'user_username' => $this->getUserCreated()->getUsername(),
            'user_id' => $this->getUserCreated()->getId()
        ];

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

}
