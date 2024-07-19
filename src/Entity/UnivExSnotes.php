<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: \App\Repository\UnivExSnotesRepository::class)]
#[ORM\HasLifecycleCallbacks]
class UnivExSnotes
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', nullable: true)]
    private $reference;

    #[ORM\JoinColumn(referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \UnivTInscription::class)]
    private $inscription;

  

   
    
       #[ORM\JoinColumn(referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \UnivExControleSemestre::class, inversedBy: 'snotes')]
    private $controleSemestre;

    #[ORM\Column(type: 'float', nullable: true)]
    private $note;

    #[ORM\Column(type: 'float', nullable: true)]
    private $noteSec;
    
    
    
    #[Assert\Range(min: 0, max: 20)]
    #[Assert\Type(type: 'numeric')]
    #[ORM\Column(type: 'float', nullable: true)]
    private $noteRachat;

   

    #[ORM\Column(type: 'text', nullable: true)]
    private $observation;
    
    
        #[ORM\Column(type: 'string', length: 3, nullable: true)]
    private $categorie;

   
    #[ORM\JoinColumn(referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \UnivPEstatut::class)]
    private $statutS2;

    #[ORM\JoinColumn(referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \UnivPEstatut::class)]
    private $statutDef;

    #[ORM\JoinColumn(referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \UnivPEstatut::class)]
    private $statutAff;

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

    public function getReference(): ?string
    {
        return $this->reference;
    }

    public function setReference(?string $reference): self
    {
        $this->reference = $reference;

        return $this;
    }

  

    public function getNoteRachat(): ?float
    {
        return $this->noteRachat;
    }

    public function setNoteRachat(?float $noteRachat): self
    {
        $this->noteRachat = $noteRachat;

        return $this;
    }

    public function getObservation(): ?string
    {
        return $this->observation;
    }

    public function setObservation(?string $observation): self
    {
        $this->observation = $observation;

        return $this;
    }

    public function getCategorie(): ?string
    {
        return $this->categorie;
    }

    public function setCategorie(?string $categorie): self
    {
        $this->categorie = $categorie;

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

    public function getInscription(): ?UnivTInscription
    {
        return $this->inscription;
    }

    public function setInscription(?UnivTInscription $inscription): self
    {
        $this->inscription = $inscription;

        return $this;
    }

    

    

    public function getStatutS2(): ?UnivPEstatut
    {
        return $this->statutS2;
    }

    public function setStatutS2(?UnivPEstatut $statutS2): self
    {
        $this->statutS2 = $statutS2;

        return $this;
    }

    public function getStatutDef(): ?UnivPEstatut
    {
        return $this->statutDef;
    }

    public function setStatutDef(?UnivPEstatut $statutDef): self
    {
        $this->statutDef = $statutDef;

        return $this;
    }

    public function getStatutAff(): ?UnivPEstatut
    {
        return $this->statutAff;
    }

    public function setStatutAff(?UnivPEstatut $statutAff): self
    {
        $this->statutAff = $statutAff;

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

    public function getNote(): ?float
    {
        return $this->note;
    }

    public function setNote(?float $note): self
    {
        $this->note = $note;

        return $this;
    }

    public function getNoteSec(): ?float
    {
        return $this->noteSec;
    }

    public function setNoteSec(?float $noteSec): self
    {
        $this->noteSec = $noteSec;

        return $this;
    }

    public function getControleSemestre(): ?UnivExControleSemestre
    {
        return $this->controleSemestre;
    }

    public function setControleSemestre(?UnivExControleSemestre $controleSemestre): self
    {
        $this->controleSemestre = $controleSemestre;

        return $this;
    }
}
