<?php


namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: \App\Repository\PMarcheSousRepository::class)]
#[UniqueEntity('reference')]
class PMarcheSous
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'code', type: 'string', length: 100, nullable: true)]
    private $code;

    #[Assert\NotBlank]
    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $designation;

    #[ORM\Column(type: 'text', nullable: true)]
    private $description;

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


    #[ORM\Column(type: 'text', nullable: true)]
    private $descriptionDetail;

    #[ORM\Column(type: 'date', nullable: true)]
    private $dateDebut;

    #[ORM\Column(type: 'date', nullable: true)]
    private $dateFin;

    #[ORM\Column(type: 'float', nullable: true)]
    private $montant;

    
    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $reference;

    /**
     * @var int|null
     */
    #[ORM\Column(name: 'active', type: 'boolean', nullable: true)]
    private $active;


    #[Assert\NotBlank]
    #[ORM\ManyToOne(targetEntity: \App\Entity\PMarche::class, inversedBy: 'sous')]
    private $marche;

    public function __construct()
    {
        
       
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDesignation(): ?string
    {
        return $this->designation;
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
    public function setDesignation(?string $designation): self
    {
        $this->designation = $designation;

        return $this;
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

    public function getName(): ?string
    {
     

        return $this->getReference().'-'.$this->getDescription();
    }

    

    public function getDescriptionDetail(): ?string
    {
        return $this->descriptionDetail;
    }

    public function setDescriptionDetail(?string $descriptionDetail): self
    {
        $this->descriptionDetail = $descriptionDetail;

        return $this;
    }

    public function getDateDebut(): ?\DateTimeInterface
    {
        return $this->dateDebut;
    }

    public function setDateDebut(?\DateTimeInterface $dateDebut): self
    {
        $this->dateDebut = $dateDebut;

        return $this;
    }

    public function getDateFin(): ?\DateTimeInterface
    {
        return $this->dateFin;
    }

    public function setDateFin(?\DateTimeInterface $dateFin): self
    {
        $this->dateFin = $dateFin;

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

    public function getReference(): ?string
    {
        return $this->reference;
    }

    public function setReference(?string $reference): self
    {
        $this->reference = $reference;

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






    public function getMarche(): ?PMarche {
        return $this->marche;
    }

    public function setMarche(?PMarche $marche): self {
        $this->marche = $marche;

        return $this;
    }
}
