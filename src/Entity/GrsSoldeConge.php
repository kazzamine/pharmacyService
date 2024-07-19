<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: \App\Repository\GrsSoldeCongeRepository::class)]
class GrsSoldeConge
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;
    
    #[ORM\JoinColumn(name: 'user', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \User::class)]
    private $user;


    #[ORM\Column(type: 'integer', nullable: true)]
    private $duree;
    
    #[ORM\Column(type: 'datetime', nullable: true)]
    private $dateFin;
    

    #[ORM\JoinColumn(name: 'def_type_conge_id', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \PTypeConge::class, inversedBy: 'types')]
    private $type;

    #[ORM\JoinColumn(name: 'grs_grille_conge_id', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \GrsGrilleConge::class)]
    private $grille;


    #[ORM\Column(type: 'datetime', nullable: true)]
    private $dateDebut;
    
    
    #[ORM\JoinColumn(name: 'p_poste_id', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \App\Entity\PPoste::class, inversedBy: 'users')]
    private $poste;

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

    

    #[ORM\Column(type: 'integer', nullable: true)]
    private $annee;
    

    #[ORM\Column(type: 'boolean', nullable: true)]
    private $active;

    public function getId(): ?int
    {
        return $this->id;
    }
    
    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

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

    public function getDateFin(): ?\DateTimeInterface
    {
        return $this->dateFin;
    }

    public function setDateFin(?\DateTimeInterface $dateFin): self
    {
        $this->dateFin = $dateFin;

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

    public function getPoste(): ?PPoste
    {
        return $this->poste;
    }

    public function setPoste(?PPoste $poste): self
    {
        $this->poste = $poste;

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

    public function getType(): ?PTypeConge
    {
        return $this->type;
    }

    public function setType(?PTypeConge $type): self
    {
        $this->type = $type;

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

    public function getActive(): ?bool
    {
        return $this->active;
    }

    public function setActive(?bool $active): self
    {
        $this->active = $active;

        return $this;
    }

    public function getGrille(): ?GrsGrilleConge
    {
        return $this->grille;
    }

    public function setGrille(?GrsGrilleConge $grille): self
    {
        $this->grille = $grille;

        return $this;
    }

    public function getAnnee(): ?int
    {
        return $this->annee;
    }

    public function setAnnee(?int $annee): self
    {
        $this->annee = $annee;

        return $this;
    }

}
