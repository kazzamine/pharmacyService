<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
#[ORM\Entity(repositoryClass: \App\Repository\GrsPaieRepository::class)]
#[UniqueEntity(fields: ['annee', 'mois', 'type', 'dossier'], errorPath: 'mois', message: 'ce mois est déjà utilisé cette année.')]
class GrsPaie
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



    
    #[ORM\JoinColumn(name: 'p_dossier_id', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \App\Entity\PDossier::class)]
    private $dossier;

  




    #[ORM\Column(type: 'date', nullable: true)]
    private $dateOperation;



    #[ORM\Column(type: 'float', nullable: true)]
    private $salairePaye;

    #[ORM\Column(type: 'boolean', nullable: true)]
    private $active;


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

    #[ORM\ManyToOne(targetEntity: \App\Entity\User::class)]
    private $userValider;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private $dateValider;

    #[ORM\ManyToOne(targetEntity: \App\Entity\User::class)]
    private $userGenerer;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private $dateGenerer;


    #[ORM\Column(type: 'json', nullable: true)]
    public $positionActuel = [];

    /*
     * @ORM\ManyToMany(targetEntity="App\Entity\UaTLivraisonfrscab",inversedBy="factures",  cascade={"persist"})
     * @ORM\JoinTable(name="ua_t_facturefrsdet")
     
    private $factureLivraisons;
    */
    #[ORM\Column(type: 'json', nullable: true)]
    private $historique;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $description;

    #[Assert\NotBlank]
    #[ORM\Column(type: 'integer', nullable: true)]
    private $mois;

    #[Assert\NotBlank]
    #[Assert\Length(min: 4)]
    #[Assert\Length(max: 4)]
    #[ORM\Column(type: 'integer', nullable: true)]
    private $annee;

    #[ORM\OneToMany(targetEntity: \App\Entity\GrsPaiedet::class, mappedBy: 'cab', cascade: ['persist', 'remove'])]
    private $details;

    #[ORM\ManyToOne(targetEntity: \App\Entity\UpPiece::class, inversedBy: 'grsPaies')]
    private $piece;

    #[ORM\ManyToOne(targetEntity: \App\Entity\PGlobalParamDet::class, inversedBy: 'grsPaies')]
    private $type;


     #[ORM\OneToOne(targetEntity: \App\Entity\UGeneralOperation::class, mappedBy: 'paie')]
    private $operations;




    public function __construct()
    {
        $this->details = new ArrayCollection();
       // $this->operations = new ArrayCollection();
    }




    public function getPositionActuel(): ?array
    {
        return $this->positionActuel;
    }

    public function setPositionActuel(?array $positionActuel): self
    {
        $this->positionActuel = $positionActuel;

        $this->historique[] = [
            'current_place' => $positionActuel,
            'time' => (new \DateTime())->format('c'),
            'user_nom' => $this->getUserCreated() ? $this->getUserCreated()->getNom() : null,
            'user_prenom' => $this->getUserCreated() ? $this->getUserCreated()->getPrenom() : null,
            'user_username' => $this->getUserCreated() ? $this->getUserCreated()->getUsername() : null,
            'user_id' => $this->getUserCreated() ? $this->getUserCreated()->getId() : null
        ];

        return $this;
    }

    public function getUserValider(): ?User
    {
        return $this->userValider;
    }

    public function setUserValider(?User $userValider): self
    {
        $this->userValider = $userValider;

        return $this;
    }

    public function getUserGenerer(): ?User
    {
        return $this->userGenerer;
    }

    public function setUserGenerer(?User $userGenerer): self
    {
        $this->userGenerer = $userGenerer;

        return $this;
    }

    public function getId(): ?int
    {
        return $this->id;
    }





    public function getDateOperation(): ?\DateTimeInterface
    {
        return $this->dateOperation;
    }

    public function setDateOperation(\DateTimeInterface $dateOperation): self
    {
        $this->dateOperation = $dateOperation;

        return $this;
    }

 

    public function getSalairePaye(): ?float
    {
        return $this->salairePaye;
    }

    public function setSalairePaye(float $salairePaye): self
    {
        $this->salairePaye = $salairePaye;

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

 



    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(?string $code): self
    {
        $this->code = $code;

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




    public function getDateValider(): ?\DateTimeInterface
    {
        return $this->dateValider;
    }

    public function setDateValider(?\DateTimeInterface $dateValider): self
    {
        $this->dateValider = $dateValider;

        return $this;
    }

    public function getDateGenerer(): ?\DateTimeInterface
    {
        return $this->dateGenerer;
    }

    public function setDateGenerer(?\DateTimeInterface $dateGenerer): self
    {
        $this->dateGenerer = $dateGenerer;

        return $this;
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


    public function getDossier(): ?PDossier
    {
        return $this->dossier;
    }

    public function setDossier(?PDossier $dossier): self
    {
        $this->dossier = $dossier;

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

    public function getMois(): ?int
    {
        return $this->mois;
    }

    public function setMois(?int $mois): self
    {
        $this->mois = $mois;

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

    public function getChoices():string
    {
        $choices = array(
            'Janvier'   => 1,
            'Février'  => 2,
            'Mars'     => 3,
            'Avril'     => 4,
            'May'       => 5,
            'Juin'      => 6,
            'Juillet'      => 7,
            'Août'    => 8,
            'Septembre' => 9,
            'Octobre'   => 10,
            'Novembre'  => 11,
            'Décembre'  => 12,
        );

        return array_search( $this->mois, $choices);
    }

    /**
     * @return Collection|GrsPaiedet[]
     */
    public function getDetails(): Collection
    {
        return $this->details;
    }

    public function addDetail(GrsPaiedet $detail): self
    {
        if (!$this->details->contains($detail)) {
            $this->details[] = $detail;
            $detail->setCab($this);
        }

        return $this;
    }

    public function removeDetail(GrsPaiedet $detail): self
    {
        if ($this->details->contains($detail)) {
            $this->details->removeElement($detail);
            // set the owning side to null (unless already changed)
            if ($detail->getCab() === $this) {
                $detail->setCab(null);
            }
        }

        return $this;
    }


  
    public function getOperations(): ?UGeneralOperation
    {
        return $this->operations;
    }


  

    public function setOperations(?UGeneralOperation $operation): self
    {
        $this->operations = $operation;

      

        return $this;
    }


    public function getdetailMontant(): ?float
    {
        $montant=0;
        foreach ($this->details as $key => $detail) {

            $montant=$montant + $detail->getMontant();
        }

        return $montant;
    }


    public function getoperationMontant(): ?float
    {
        $montant = 0 ; 
        if ($this->operations){
        $montant=$this->operations->getMontant();
        }
        /*foreach ($this->operations as $key => $operation) {

            $montant=$montant + $operation->getMontant();
        }*/

        return $montant;
    }


    public function getPiece(): ?UpPiece
    {
        return $this->piece;
    }

    public function setPiece(?UpPiece $piece): self
    {
        $this->piece = $piece;

        return $this;
    }

    public function getType(): ?PGlobalParamDet
    {
        return $this->type;
    }

    public function setType(?PGlobalParamDet $type): self
    {
        $this->type = $type;

        return $this;
    }

    
}
