<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;


#[ORM\Table(name: 'univ_p_concoursdet_classement')]
#[ORM\Entity(repositoryClass: \App\Repository\UnivPConcoursdetClassementRepository::class)]
#[ORM\HasLifecycleCallbacks]
class UnivPConcoursdetClassement {

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\JoinColumn(referencedColumnName: 'id')]
    #[Assert\NotBlank]
    #[ORM\ManyToOne(targetEntity: \UnivPConcoursdet::class, inversedBy: 'classements')]
    private $concoursdet;

    #[ORM\JoinColumn(referencedColumnName: 'id')]
    #[Assert\NotBlank]
    #[ORM\ManyToOne(targetEntity: \UnivNatureDemande::class)]
    private $natureDemande;

    /**
     *
     * @var \integer
     *
     *
     *
     */
    #[Assert\Positive]
    #[Assert\NotBlank]
    #[ORM\Column(type: 'integer', nullable: true)]
    private $lp;

    /**
     *
     * @var \integer
     *
     *
     */
    #[Assert\Positive]
    #[Assert\NotBlank]
    #[ORM\Column(type: 'integer', nullable: true)]
    private $ld;

    

    /**
     * @var integer
     */
    #[ORM\Column(type: 'boolean', nullable: true)]
    private $active = true;

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

 

    public function getActive(): ?bool {
        return $this->active;
    }

    public function setActive(?bool $active): self {
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

    public function getConcoursdet(): ?UnivPConcoursdet {
        return $this->concoursdet;
    }

    public function setConcoursdet(?UnivPConcoursdet $concoursdet): self {
        $this->concoursdet = $concoursdet;

        return $this;
    }

    public function getNatureDemande(): ?UnivNatureDemande {
        return $this->natureDemande;
    }

    public function setNatureDemande(?UnivNatureDemande $natureDemande): self {
        $this->natureDemande = $natureDemande;

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

    public function getListe(): ?string {
        return $this->liste;
    }

    public function setListe(?string $liste): self {
        $this->liste = $liste;

        return $this;
    }

    public function getLp(): ?int
    {
        return $this->lp;
    }

    public function setLp(?int $lp): self
    {
        $this->lp = $lp;

        return $this;
    }

    public function getLd(): ?int
    {
        return $this->ld;
    }

    public function setLd(?int $ld): self
    {
        $this->ld = $ld;

        return $this;
    }

}
