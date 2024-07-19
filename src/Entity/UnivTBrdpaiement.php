<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Table(name: 'univ_t_brdpaiement')]
#[ORM\Entity(repositoryClass: \App\Repository\UnivTBrdpaiementRepository::class)]
class UnivTBrdpaiement {

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
     */
    #[ORM\Column(type: 'float', nullable: true)]
    private $montant;

    #[ORM\JoinColumn(referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \UnivAcEtablissement::class)]
    private $etablissement;

    #[ORM\JoinColumn(referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \UnivXModalite::class)]
    private $modalite;

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

    #[ORM\Column(type: 'date', nullable: true)]
    private $date;

    #[ORM\OneToMany(targetEntity: \App\Entity\UnivTReglement::class, mappedBy: 'brd')]
    private $univTReglements;

    #[ORM\Column(type: 'text')]
    private $description;





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





    #[ORM\PrePersist]
    public function setCreatedValue() {

        $this->created = new \DateTime();
    }

    #[ORM\PreUpdate]
    public function setUpdatedValue() {
        $this->updated = new \DateTime();
    }

    public function __construct() {
        $this->promotions = new ArrayCollection();
        $this->univTReglements = new ArrayCollection();
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

    public function getMontant(): ?float
    {
        return $this->montant;
    }

    public function setMontant(?float $montant): self
    {
        $this->montant = $montant;

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

    public function getEtablissement(): ?UnivAcEtablissement
    {
        return $this->etablissement;
    }

    public function setEtablissement(?UnivAcEtablissement $etablissement): self
    {
        $this->etablissement = $etablissement;

        return $this;
    }

    public function getModalite(): ?UnivXModalite
    {
        return $this->modalite;
    }

    public function setModalite(?UnivXModalite $modalite): self
    {
        $this->modalite = $modalite;

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
     * @return Collection|UnivTReglement[]
     */
    public function getUnivTReglements(): Collection
    {
        return $this->univTReglements;
    }

    public function addUnivTReglement(UnivTReglement $univTReglement): self
    {
        if (!$this->univTReglements->contains($univTReglement)) {
            $this->univTReglements[] = $univTReglement;
            $univTReglement->setBrd($this);
        }

        return $this;
    }

    public function removeUnivTReglement(UnivTReglement $univTReglement): self
    {
        if ($this->univTReglements->contains($univTReglement)) {
            $this->univTReglements->removeElement($univTReglement);
            // set the owning side to null (unless already changed)
            if ($univTReglement->getBrd() === $this) {
                $univTReglement->setBrd(null);
            }
        }

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

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
