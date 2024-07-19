<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: \App\Repository\GrsCongeRepository::class)]
class GrsConge
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
    #[ORM\Column(type: 'datetime', nullable: true)]
    private $dateDebut;

    #[ORM\JoinColumn(name: 'def_statut_id', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \App\Entity\DefStatut::class)]
    private $statut;

    #[ORM\Column(type: 'json', nullable: true)]
    public $positionActuel = [];

    

    #[ORM\ManyToOne(targetEntity: \App\Entity\User::class)]
    private $userAccepter;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private $dateAccepter;

    #[ORM\ManyToOne(targetEntity: \App\Entity\User::class)]
    private $userEnvoyer;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private $dateEnvoyer;

    #[ORM\ManyToOne(targetEntity: \App\Entity\User::class)]
    private $userRefuser;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private $dateRefuser;

    #[ORM\ManyToOne(targetEntity: \App\Entity\User::class)]
    private $userEncours;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private $dateEncours;

    #[Assert\NotBlank]
    #[ORM\Column(type: 'datetime', nullable: true)]
    private $dateFin;

     /**
     *
     * @var \DateTime
     *
     *
     */
    #[ORM\Column(name: 'created', type: 'datetime', nullable: true)]
    private $created;

    /**
     *
     * @var \DateTime
     *
     */
    #[ORM\Column(name: 'updated', type: 'datetime', nullable: true)]
    private $updated;

    #[ORM\JoinColumn(name: 'user_created', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \User::class)]
    private $userCreated;

    #[ORM\JoinColumn(name: 'user_updated', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \User::class)]
    private $userUpdated;




    #[ORM\JoinColumn(name: 'user_demande', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \User::class)]
    private $userDemande;

    
    #[ORM\JoinColumn(name: 'grsSolde', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \App\Entity\GrsSoldeConge::class)]
    private $grsSolde;


    #[ORM\JoinColumn(name: 'type', referencedColumnName: 'id')]
    #[Assert\NotBlank]
    #[ORM\ManyToOne(targetEntity: \PTypeConge::class)]
    private $type;

    #[ORM\Column(type: 'text', nullable: true)]
    private $description;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $duree;

    

    public function __construct()
    {
       
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getGrsSolde(): ?GrsSoldeConge
    {
        return $this->grsSolde;
    }

    public function setGrsSolde(?GrsSoldeConge $grsSolde): self
    {
        $this->grsSolde = $grsSolde;

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

    public function getPositionActuel(): ?array {
        return $this->positionActuel;
    }

    public function setPositionActuel(?array $positionActuel): self {
        $this->positionActuel = $positionActuel;

        $this->historique[] = [
            'current_place' => $positionActuel,
            'time' => (new \DateTime())->format('c'),/* 
            'user_nom' => $this->getUserCreated()->getNom(),
            'user_prenom' => $this->getUserCreated()->getPrenom(),
            'user_username' => $this->getUserCreated()->getUsername(),
            'user_id' => $this->getUserCreated()->getId() */
        ];

        return $this;
    }

    public function getStatut(): ?DefStatut
    {
        return $this->statut;
    }

    public function setStatut(?DefStatut $statut): self
    {
        $this->statut = $statut;

        return $this;
    }

    public function getUserAccepter(): ?User
    {
        return $this->userAccepter;
    }

    public function setUserAccepter(?User $userAccepter): self
    {
        $this->userAccepter = $userAccepter;

        return $this;
    }

    public function getUserRefuser(): ?User
    {
        return $this->userRefuser;
    }

    public function setUserRefuser(?User $userRefuser): self
    {
        $this->userRefuser = $userRefuser;

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


    public function getDateAccepter(): ?\DateTimeInterface
    {
        return $this->dateAccepter;
    }

    public function setDateAccepter(?\DateTimeInterface $dateAccepter): self
    {
        $this->dateAccepter = $dateAccepter;

        return $this;
    }

    public function getDateRefuser(): ?\DateTimeInterface
    {
        return $this->dateRefuser;
    }

    public function setDateRefuser(?\DateTimeInterface $dateRefuser): self
    {
        $this->dateRefuser = $dateRefuser;

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

    public function getUserDemande(): ?User
    {
        return $this->userDemande;
    }

    public function setUserDemande(?User $userDemande): self
    {
        $this->userDemande = $userDemande;

        return $this;
    }

    public function getType(): ?PTypeConge
    {
        return $this->type;
    }

    public function setType(?PTypeConge $type): self
    {
        $this->type = $type;

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

    public function getDateEnvoyer(): ?\DateTimeInterface
    {
        return $this->dateEnvoyer;
    }

    public function setDateEnvoyer(?\DateTimeInterface $dateEnvoyer): self
    {
        $this->dateEnvoyer = $dateEnvoyer;

        return $this;
    }

    public function getUserEnvoyer(): ?User
    {
        return $this->userEnvoyer;
    }

    public function setUserEnvoyer(?User $userEnvoyer): self
    {
        $this->userEnvoyer = $userEnvoyer;

        return $this;
    }

    public function getDuree(): ?int
    {
        return $this->duree;
    }

    public function setDuree(?int $duree): self
    {
        $this->duree = $duree;

        return $this;
    }



}
