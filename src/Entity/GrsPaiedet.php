<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
#[ORM\Entity(repositoryClass: \App\Repository\GrsPaiedetRepository::class)]
class GrsPaiedet
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\ManyToOne(targetEntity: \App\Entity\GrsPaie::class, inversedBy: 'details')]
    private $cab;

    #[Assert\NotBlank]
    #[ORM\ManyToOne(targetEntity: \App\Entity\GrsEmploye::class)]
    private $employe;

    #[Assert\NotBlank]
    #[Assert\Positive]
    #[ORM\Column(type: 'float', nullable: true)]
    private $montant;

    #[ORM\Column(type: 'date', nullable: true)]
    private $dateDebut;

    #[ORM\Column(type: 'date', nullable: true)]
    private $dateFin;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $description;




    
    /**
     *
     * @var \DateTime
     */
    #[ORM\Column(name: 'created', type: 'datetime', nullable: true)]
    private $created;

    /**
     * @var \DateTime
     */
    #[ORM\Column(name: 'updated', type: 'datetime', nullable: true)]
    private $updated;



    #[ORM\JoinColumn(name: 'user_created', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \User::class)]
    private $userCreated;

    #[ORM\JoinColumn(name: 'user_updated', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \User::class)]
    private $userUpdated;



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCab(): ?GrsPaie
    {
        return $this->cab;
    }

    public function setCab(?GrsPaie $cab): self
    {
        $this->cab = $cab;

        return $this;
    }

    public function getEmploye(): ?GrsEmploye
    {
        return $this->employe;
    }

    public function setEmploye(?GrsEmploye $employe): self
    {
        $this->employe = $employe;

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


}
