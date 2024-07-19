<?php

namespace App\Entity;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: \App\Repository\UnivAcEtablissementRepository::class)]
#[ORM\HasLifecycleCallbacks]
class UnivAcEtablissement {

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    /**
     * @var string
     */
    #[ORM\Column(type: 'string', length: 50, unique: true, nullable: true)]
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
     *
     */
    #[Assert\NotBlank]
    #[ORM\Column(type: 'string', length: 100, nullable: true)]
    private $abreviation;

    /**
     * @var string
     */
    #[Assert\NotBlank]
    #[ORM\Column(type: 'string', length: 100, nullable: true)]
    private $statut;

    /**
     * @var string
     */
    #[ORM\Column(type: 'string', length: 100, nullable: true)]
    private $doyen;

    /**
     * @var string
     *
     */
    #[Assert\NotBlank]
    #[ORM\Column(type: 'string', length: 100, nullable: true)]
    private $nature;

    /**
     * @var \DateTime
     *
     */
    #[ORM\Column(type: 'date', nullable: true)]
    private $date;

    /**
     * @var integer
     */
    #[ORM\Column(type: 'boolean', nullable: true)]
    private $active = true ;

    /**
     * @var integer
     */
    #[ORM\Column(type: 'boolean', nullable: true)]
    private $rapport;

    /**
     * @var integer
     */
    #[ORM\Column(type: 'integer', nullable: true)]
    private $rapportOrdre;

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

    #[ORM\OneToMany(targetEntity: \UnivAcFormation::class, mappedBy: 'etablissement')]
    private $formations;

    public function __construct() {
        $this->formations = new ArrayCollection();
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

    public function getStatut(): ?string
    {
        return $this->statut;
    }

    public function setStatut(?string $statut): self
    {
        $this->statut = $statut;

        return $this;
    }

    public function getDoyen(): ?string
    {
        return $this->doyen;
    }

    public function setDoyen(?string $doyen): self
    {
        $this->doyen = $doyen;

        return $this;
    }

    public function getNature(): ?string
    {
        return $this->nature;
    }

    public function setNature(?string $nature): self
    {
        $this->nature = $nature;

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

    public function getActive(): ?bool
    {
        return $this->active;
    }

    public function setActive(?bool $active): self
    {
        $this->active = $active;

        return $this;
    }

    public function getRapport(): ?bool
    {
        return $this->rapport;
    }

    public function setRapport(?bool $rapport): self
    {
        $this->rapport = $rapport;

        return $this;
    }

    public function getRapportOrdre(): ?int
    {
        return $this->rapportOrdre;
    }

    public function setRapportOrdre(?int $rapportOrdre): self
    {
        $this->rapportOrdre = $rapportOrdre;

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

    /**
     * @return Collection|UnivAcFormation[]
     */
    public function getFormations(): Collection
    {
        return $this->formations;
    }

    public function addFormation(UnivAcFormation $formation): self
    {
        if (!$this->formations->contains($formation)) {
            $this->formations[] = $formation;
            $formation->setEtablissement($this);
        }

        return $this;
    }

    public function removeFormation(UnivAcFormation $formation): self
    {
        if ($this->formations->contains($formation)) {
            $this->formations->removeElement($formation);
            // set the owning side to null (unless already changed)
            if ($formation->getEtablissement() === $this) {
                $formation->setEtablissement(null);
            }
        }

        return $this;
    }

}
