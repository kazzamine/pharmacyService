<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

#[ORM\Table(name: 'univ_ex_controle_epreuve')]
#[ORM\UniqueConstraint(name: '_unique_conroleelement_epreuve', columns: ['controle_element_id', 'nature_epreuve_id'])]
#[ORM\Entity(repositoryClass: \App\Repository\UnivExControleEpreuveRepository::class)]
#[ORM\HasLifecycleCallbacks]
class UnivExControleEpreuve
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\ManyToOne(targetEntity: \App\Entity\UnivExControleElement::class, inversedBy: 'univExControleEpreuves')]
    private $controleElement;


    
    #[ORM\OneToMany(targetEntity: \UnivAcEpreuve::class, mappedBy: 'controleEpreuve')]
    private $epreuves;


     
    #[ORM\JoinColumn(referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \UnivPrNatureEpreuve::class)]
    private $natureEpreuve;


    #[ORM\Column(type: 'text', nullable: true)]
    private $description;

    #[ORM\Column(type: 'boolean', nullable: true)]
    private $active;

    #[ORM\Column(type: 'string', nullable: true)]
    private $type;

    #[ORM\Column(type: 'string', nullable: true)]
    private $nature;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $examen;

    /**
     * @var string
     */
    #[ORM\Column(type: 'string', length: 10, nullable: true)]
    private $mapped;
    
    
     /**
     * @var string
     */
    #[ORM\Column(type: 'string', length: 10, nullable: true)]
    private $absence;

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
        $this->acEpreuve = new ArrayCollection();
        $this->epreuves = new ArrayCollection();
    }

    #[ORM\PrePersist]
    public function setCreatedValue() {

        $this->created = new \DateTime();
    }

    #[ORM\PreUpdate]
    public function setUpdatedValue() {
        $this->updated = new \DateTime();
    }

    public function getId(): ?int
    {
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
    public function getControleElement(): ?UnivExControleElement
    {
        return $this->controleElement;
    }

    public function setControleElement(?UnivExControleElement $controleElement): self
    {
        $this->controleElement = $controleElement;

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

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(?string $type): self
    {
        $this->type = $type;

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

    public function getExamen(): ?int
    {
        return $this->examen;
    }

    public function setExamen(?int $examen): self
    {
        $this->examen = $examen;

        return $this;
    }

    public function getNatureEpreuve(): ?UnivPrNatureEpreuve
    {
        return $this->natureEpreuve;
    }

    public function setNatureEpreuve(?UnivPrNatureEpreuve $natureEpreuve): self
    {
        $this->natureEpreuve = $natureEpreuve;

        return $this;
    }

    public function getMapped(): ?string
    {
        return $this->mapped;
    }

    public function setMapped(?string $mapped): self
    {
        $this->mapped = $mapped;

        return $this;
    }

    public function getAbsence(): ?string
    {
        return $this->absence;
    }

    public function setAbsence(?string $absence): self
    {
        $this->absence = $absence;

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
            $epreufe->setControleEpreuve($this);
        }

        return $this;
    }

    public function removeEpreufe(UnivAcEpreuve $epreufe): self
    {
        if ($this->epreuves->contains($epreufe)) {
            $this->epreuves->removeElement($epreufe);
            // set the owning side to null (unless already changed)
            if ($epreufe->getControleEpreuve() === $this) {
                $epreufe->setControleEpreuve(null);
            }
        }

        return $this;
    }

    


}
