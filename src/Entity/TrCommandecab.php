<?php

namespace App\Entity;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping\HasLifecycleCallbacks;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * TrCommandecab
 */
#[ORM\Table(name: 'tr_commandecab')]
#[ORM\Entity(repositoryClass: \App\Repository\TrCommandecabRepository::class)]
#[ORM\HasLifecycleCallbacks]
class TrCommandecab {

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'code', type: 'string', length: 100, nullable: true)]
    private $code;

    /**
     * @var \DateTime|null
     */
    #[Assert\NotBlank]
    #[ORM\Column(name: 'datecommande', type: 'date', nullable: true)]
    private $datecommande;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'reference', type: 'string', length: 100, nullable: true)]
    private $reference;

    /**
     * @var string|null
     */
    #[Assert\NotBlank]
    #[ORM\Column(name: 'designation', type: 'string', length: 255, nullable: true)]
    private $designation;

    
   

    #[ORM\Column(type: 'boolean', nullable: true)]
    private $active;



    
    #[ORM\JoinColumn(name: 'u_p_partenaire_id', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \App\Entity\UPPartenaire::class)]
    private $fournisseur;

    #[ORM\JoinColumn(name: 'p_dossier_id', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \App\Entity\PDossier::class)]
    private $dossier;

   

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

  

    #[ORM\OneToMany(targetEntity: \App\Entity\TrCommandedet::class, mappedBy: 'cab')]
    private $details;


   #[ORM\JoinColumn(name: 'p_marche', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \App\Entity\PMarche::class)]
    private $marche;   

    #[ORM\JoinColumn(name: 'p_marche_sous_id', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \App\Entity\PMarcheSous::class)]
    private $marchesous;
   

    /**
     * @var int|null
     */
    #[ORM\Column(name: 'type', type: 'smallint', nullable: true, options: ['unsigned' => true])]
    private $type = false;

    #[ORM\Column(type: 'boolean', nullable: true)]
    private $affectation;



    #[ORM\PrePersist]
    public function setCreatedValue() {

        $this->created = new \DateTime();
    }

    #[ORM\PreUpdate]
    public function setUpdatedValue() {
        $this->updated = new \DateTime();
    }

    public function __construct() {
      
        $this->details = new ArrayCollection();
      
    }

    public function checkedValue($val1, $val2) {
        $chek = " ";
        if ($val1 == $val2) {

            $chek = "checked";
        }
        return $chek;
    }

    public function getId(): ?int {
        return $this->id;
    }

    public function getCode(): ?string {
        return $this->code;
    }

    public function setCode(?string $code): self {
        $this->code = $code;

        return $this;
    }

    public function getDatecommande(): ?\DateTimeInterface {
        return $this->datecommande;
    }

    public function setDatecommande(?\DateTimeInterface $datecommande): self {
        $this->datecommande = $datecommande;

        return $this;
    }

    public function getReference(): ?string {
        return $this->reference;
    }

    public function setReference(?string $reference): self {
        $this->reference = $reference;

        return $this;
    }

 





    public function getDesignation(): ?string {
        return $this->designation;
    }

    public function setDesignation(?string $designation): self {
        $this->designation = $designation;

        return $this;
    }



  


  
 



 

  


  


   

    public function getDossier(): ?PDossier {
        return $this->dossier;
    }

    public function setDossier(?PDossier $dossier): self {
        $this->dossier = $dossier;

        return $this;
    }



    public function getFournisseur(): ?UPPartenaire {
        return $this->fournisseur;
    }

    public function setFournisseur(?UPPartenaire $fournisseur): self {
        $this->fournisseur = $fournisseur;

        return $this;
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

 

    /**
     * @return Collection|TrCommandedet[]
     */
    public function getDetails(): Collection {
        return $this->details;
    }

    public function addDetail(TrCommandedet $detail): self {
        if (!$this->details->contains($detail)) {
            $this->details[] = $detail;
            $detail->setCab($this);
        }

        return $this;
    }

    public function removeDetail(TrCommandedet $detail): self {
        if ($this->details->contains($detail)) {
            $this->details->removeElement($detail);
            // set the owning side to null (unless already changed)
            if ($detail->getCab() === $this) {
                $detail->setCab(null);
            }
        }

        return $this;
    }




    public function getMarche(): ?PMarche
    {
        return $this->marche;
    }

    public function setMarche(?PMarche $marche): self
    {
        $this->marche = $marche;

        return $this;
    }



    public function getMarchesous(): ?PMarcheSous {
        return $this->marchesous;
    }

    public function setMarchesous(?PMarcheSous $marchesous): self {
        $this->marchesous = $marchesous;

        return $this;
    }
    
    public function getType(): ?int {
        return $this->type;
    }

    public function setType(?int $type): self {
        $this->type = $type;

        return $this;
    }

    public function getAffectation(): ?bool
    {
        return $this->affectation;
    }

    public function setAffectation(?bool $affectation): self
    {
        $this->affectation = $affectation;

        return $this;
    }
  


}
