<?php

namespace App\Entity;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: \App\Repository\UnivAcFormationRepository::class)]
#[ORM\HasLifecycleCallbacks]
class UnivAcFormation {

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
     * @var string
     */
    #[Assert\NotBlank]
    #[ORM\Column(type: 'string', length: 100, nullable: true)]
    private $abreviation;

    /**
     * @var integer
     *
     */
    #[Assert\NotBlank]
    #[ORM\Column(type: 'integer', nullable: true)]
    private $nbrAnnee;

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

    #[ORM\PrePersist]
    public function setCreatedValue() {

        $this->created = new \DateTime();
    }

    #[ORM\PreUpdate]
    public function setUpdatedValue() {
        $this->updated = new \DateTime();
    }

    #[ORM\JoinColumn(referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \UnivAcEtablissement::class, inversedBy: 'formations')]
    private $etablissement;

    #[ORM\OneToMany(targetEntity: \UnivAcPromotion::class, mappedBy: 'formation')]
    private $promotions;

    public function __construct() {
        $this->promotions = new ArrayCollection();
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

    public function getAbreviation(): ?string
    {
        return $this->abreviation;
    }

    public function setAbreviation(?string $abreviation): self
    {
        $this->abreviation = $abreviation;

        return $this;
    }

    public function getNbrAnnee(): ?int
    {
        return $this->nbrAnnee;
    }

    public function setNbrAnnee(?int $nbrAnnee): self
    {
        $this->nbrAnnee = $nbrAnnee;

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

    public function getEtablissement(): ?UnivAcEtablissement
    {
        return $this->etablissement;
    }

    public function setEtablissement(?UnivAcEtablissement $etablissement): self
    {
        $this->etablissement = $etablissement;

        return $this;
    }

    /**
     * @return Collection|UnivAcPromotion[]
     */
    public function getPromotions(): Collection
    {
        return $this->promotions;
    }

    public function addPromotion(UnivAcPromotion $promotion): self
    {
        if (!$this->promotions->contains($promotion)) {
            $this->promotions[] = $promotion;
            $promotion->setFormation($this);
        }

        return $this;
    }

    public function removePromotion(UnivAcPromotion $promotion): self
    {
        if ($this->promotions->contains($promotion)) {
            $this->promotions->removeElement($promotion);
            // set the owning side to null (unless already changed)
            if ($promotion->getFormation() === $this) {
                $promotion->setFormation(null);
            }
        }

        return $this;
    }

}
