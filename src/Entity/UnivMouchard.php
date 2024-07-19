<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: \App\Repository\UnivMouchardRepository::class)]
#[ORM\HasLifecycleCallbacks]
class UnivMouchard {

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    /**
     * @var integer
     */
    #[ORM\Column(type: 'integer', nullable: true)]
    private $actionId;

    /**
     * @var integer
     */
    #[ORM\Column(type: 'integer', nullable: true)]
    private $dossierId;

    
    #[ORM\Column(type: 'string', nullable: true)]
    private $champ;

    /**
     * @var integer
     */
    #[ORM\Column(type: 'string', nullable: true)]
    private $ancienneValeur;

      /**
     * @var integer
     */
    #[ORM\Column(type: 'string', nullable: true)]
    private $nouvelleValeur;

   

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

    public function getActionId(): ?int
    {
        return $this->actionId;
    }

    public function setActionId(?int $actionId): self
    {
        $this->actionId = $actionId;

        return $this;
    }

    public function getDossierId(): ?int
    {
        return $this->dossierId;
    }

    public function setDossierId(?int $dossierId): self
    {
        $this->dossierId = $dossierId;

        return $this;
    }

    public function getChamp(): ?string
    {
        return $this->champ;
    }

    public function setChamp(?string $champ): self
    {
        $this->champ = $champ;

        return $this;
    }

    public function getAncienneValeur(): ?string
    {
        return $this->ancienneValeur;
    }

    public function setAncienneValeur(?string $ancienneValeur): self
    {
        $this->ancienneValeur = $ancienneValeur;

        return $this;
    }

    public function getNouvelleValeur(): ?string
    {
        return $this->nouvelleValeur;
    }

    public function setNouvelleValeur(?string $nouvelleValeur): self
    {
        $this->nouvelleValeur = $nouvelleValeur;

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

}
