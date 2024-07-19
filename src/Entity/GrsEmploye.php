<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @Vich\Uploadable
 */
#[ORM\Entity(repositoryClass: \App\Repository\GrsEmployeRepository::class)]
#[UniqueEntity('email')]
class GrsEmploye
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
    #[ORM\ManyToOne(targetEntity: \PDossier::class)]
    private $dossier;
    #[ORM\JoinColumn(name: 'compte', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \User::class)]
    private $compte;



    /**
     * @var string|null
     *
     */
    #[Assert\NotBlank]
    #[ORM\Column(name: 'nom', type: 'string', length: 150, nullable: true)]
    private $nom;

    /**
     * @var string|null
     *
     */
    #[Assert\NotBlank]
    #[ORM\Column(name: 'prenom', type: 'string', length: 150, nullable: true)]
    private $prenom;
    
    #[ORM\Column(name: 'email', type: 'string', length: 255, unique: true, nullable: true)]
    #[Assert\Email(message: 'email.error')]
    private $email;


        /**
     * @var string
     */
    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $imageName;


    /**
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     * 
     * 

     *
     * 
     * @Vich\UploadableField(mapping="userProfil", fileNameProperty="imageName", size="imageSize")
     * 
     * @var File
     */
    private $photo;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $telePersonnel1;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $telePersonnel2;
    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $teleUrgence;
    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $teleEntreprise;
    #[ORM\Column(type: 'text', nullable: true)]
    private $adresse;
    #[ORM\Column(type: 'text', nullable: true)]
    private $adresseBanque;
    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $pays;
    /**
     * @var string
     */
    #[Assert\NotBlank]
    #[ORM\Column(type: 'string', length: 100, nullable: true)]
    private $cin;
    /**
     *
     * @var string
     */
    #[ORM\Column(type: 'string', length: 100, nullable: true)]
    private $cnss;
    /**
     * @var string
     */
    #[ORM\JoinColumn(referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \App\Entity\PGlobalParamDet::class)]
    private $familiale;

    
    #[ORM\JoinColumn(referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \PDepartement::class, inversedBy: 'departement')]
    private $departement;

    
    /**
     * @var string
     */
    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $fonction;


    
    #[ORM\JoinColumn(referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \App\Entity\PGlobalParamDet::class)]
    private $typeContrat;

    /**
     * @var \DateTime
     */
    #[ORM\Column(type: 'date', nullable: true)]
    private $dateNaissance;

    /**
     * @var \DateTime
     */
    #[ORM\Column(type: 'date', nullable: true)]
    private $dateEntre;

    /**
     * @var \DateTime
     */
    #[ORM\Column(type: 'date', nullable: true)]
    private $dateSortie;
    /**
     * @var string
     */
    #[Assert\GreaterThanOrEqual(value: 0)]
    #[ORM\Column(type: 'string', length: 11, nullable: true)]
    private $enfants;

 
      
    #[ORM\JoinColumn(referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \App\Entity\PVille::class)]
    private $ville;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $sexe = 'homme';

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $statut;

    /**
    * @var int
    */
   #[ORM\Column(name: 'compte_user', type: 'boolean', nullable: true)]
   private $compteUser;

   /**
   * @var int
   */
  #[ORM\Column(name: 'public', type: 'boolean', nullable: true)]
  private $public;

  
  #[ORM\Column(type: 'float', nullable: true)]
  private $salaireBase;

  
  #[ORM\Column(type: 'float', nullable: true)]
  private $coutHeure;
 #[ORM\JoinColumn(name: 'responsable_id', referencedColumnName: 'id')]
  #[ORM\ManyToOne(targetEntity: \App\Entity\GrsEmploye::class)]
  private $responsable;
  
  #[ORM\JoinColumn(referencedColumnName: 'id')]
  #[ORM\ManyToOne(targetEntity: \App\Entity\UXBanque::class)]
  private $banque;

  #[ORM\Column(type: 'string', length: 255, nullable: true)]
  private $rib;

  #[ORM\Column(type: 'string', length: 255, nullable: true)]
  private $numCompte;


  #[ORM\Column(type: 'string', length: 255, nullable: true)]
  private $nomUrgence;

  #[ORM\Column(type: 'date', nullable: true)]
  private $dateDebutPai;

  #[ORM\Column(type: 'date', nullable: true)]
  private $dateFinPai;

  #[ORM\Column(type: 'date', nullable: true)]
  private $DateEmbauche;

  #[ORM\Column(type: 'string', length: 255, nullable: true)]
  private $salaireBasePai;

  #[ORM\Column(type: 'string', length: 255, nullable: true)]
  private $stFamilialePai;

  #[ORM\Column(type: 'integer', nullable: true)]
  private $enfantCharge;

  #[ORM\Column(type: 'integer', nullable: true)]
  private $tauxCimr;

  #[ORM\Column(type: 'integer', nullable: true)]
  private $TauxAssuranceMaladie;

  #[ORM\Column(type: 'string', length: 255, nullable: true)]
  private $assuranceRetraiteComp;

  #[ORM\Column(type: 'string', length: 255, nullable: true)]
  private $InteretCreditLogement;

  #[ORM\Column(type: 'string', length: 255, nullable: true)]
  private $retenuePret;

  #[ORM\Column(type: 'integer', nullable: true)]
  private $Prime;
  #[ORM\Column(type: 'boolean', nullable: true)]
  private $active;
  #[ORM\Column(type: 'boolean', nullable: true)]
  private $user;

  #[ORM\Column(type: 'float', nullable: true)]
  private $deductionRetenue;

  #[ORM\OneToMany(targetEntity: \App\Entity\GrsPaie::class, mappedBy: 'employe')]
  private $grsPaies;

    #[ORM\ManyToMany(targetEntity: \App\Entity\GrsNoteInterne::class, mappedBy: 'employes')]
    private $notes;
    

  public function __construct()
  {
      $this->grsPaies = new ArrayCollection();
      $this->notes = new ArrayCollection();
  }

    /**
     * If manually uploading a file (i.e. not using Symfony Form) ensure an instance
     * of 'UploadedFile' is injected into this setter to trigger the update. If this
     * bundle's configuration parameter 'inject_on_load' is set to 'true' this setter
     * must be able to accept an instance of 'File' as the bundle will inject one here
     * during Doctrine hydration.
     *
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile $photo
     */
    public function setPhoto(?File $photo = null): void {
        $this->photo = $photo;

        if (null !== $photo) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt = new \DateTimeImmutable();
        }
    }



    public function getPhoto(): ?File {
        return $this->photo;
    }
    public function getId(): ?int
    {
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

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(?string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(?string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(?string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getTelePersonnel1(): ?string
    {
        return $this->telePersonnel1;
    }

    public function setTelePersonnel1(?string $telePersonnel1): self
    {
        $this->telePersonnel1 = $telePersonnel1;

        return $this;
    }

    public function getTelePersonnel2(): ?string
    {
        return $this->telePersonnel2;
    }

    public function setTelePersonnel2(?string $telePersonnel2): self
    {
        $this->telePersonnel2 = $telePersonnel2;

        return $this;
    }

    public function getTeleEntreprise(): ?string
    {
        return $this->teleEntreprise;
    }

    public function setTeleEntreprise(?string $teleEntreprise): self
    {
        $this->teleEntreprise = $teleEntreprise;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(?string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getPays(): ?string
    {
        return $this->pays;
    }

    public function setPays(?string $pays): self
    {
        $this->pays = $pays;

        return $this;
    }

    public function getDateNaissance(): ?\DateTimeInterface
    {
        return $this->dateNaissance;
    }

    public function setDateNaissance(?\DateTimeInterface $dateNaissance): self
    {
        $this->dateNaissance = $dateNaissance;

        return $this;
    }

    public function getEnfants(): ?string
    {
        return $this->enfants;
    }

    public function setEnfants(?string $enfants): self
    {
        $this->enfants = $enfants;

        return $this;
    }




    


    public function getVille(): ?PVille
    {
        return $this->ville;
    }

    public function setVille(?PVille $ville): self
    {
        $this->ville = $ville;

        return $this;
    }






    public function getSexe(): ?string
    {
        return $this->sexe;
    }

    public function setSexe(?string $sexe): self
    {
        $this->sexe = $sexe;

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

    public function getCin(): ?string
    {
        return $this->cin;
    }

    public function setCin(?string $cin): self
    {
        $this->cin = $cin;

        return $this;
    }

    public function getCnss(): ?string
    {
        return $this->cnss;
    }

    public function setCnss(?string $cnss): self
    {
        $this->cnss = $cnss;

        return $this;
    }


    public function getCompteUser(): ?bool
    {
        return $this->compteUser;
    }

    public function setCompteUser(?bool $compteUser): self
    {
        $this->compteUser = $compteUser;

        return $this;
    }

    public function getSalaireBase(): ?float
    {
        return $this->salaireBase;
    }

    public function setSalaireBase(?float $salaireBase): self
    {
        $this->salaireBase = $salaireBase;

        return $this;
    }

    public function getCoutHeure(): ?float
    {
        return $this->coutHeure;
    }

    public function setCoutHeure(?float $coutHeure): self
    {
        $this->coutHeure = $coutHeure;

        return $this;
    }

    public function getResponsable(): ?GrsEmploye
    {
        return $this->responsable;
    }

    public function setResponsable(?GrsEmploye $responsable): self
    {
        $this->responsable = $responsable;

        return $this;
    }


    public function getRib(): ?string
    {
        return $this->rib;
    }

    public function setRib(?string $rib): self
    {
        $this->rib = $rib;

        return $this;
    }

    public function getNumCompte(): ?string
    {
        return $this->numCompte;
    }

    public function setNumCompte(?string $numCompte): self
    {
        $this->numCompte = $numCompte;

        return $this;
    }


    public function getNomUrgence(): ?string
    {
        return $this->nomUrgence;
    }

    public function setNomUrgence(?string $nomUrgence): self
    {
        $this->nomUrgence = $nomUrgence;

        return $this;
    }

    public function getDateDebutPai(): ?\DateTimeInterface
    {
        return $this->dateDebutPai;
    }

    public function setDateDebutPai(?\DateTimeInterface $dateDebutPai): self
    {
        $this->dateDebutPai = $dateDebutPai;

        return $this;
    }

    public function getDateFinPai(): ?\DateTimeInterface
    {
        return $this->dateFinPai;
    }

    public function setDateFinPai(?\DateTimeInterface $dateFinPai): self
    {
        $this->dateFinPai = $dateFinPai;

        return $this;
    }

    public function getDateEmbauche(): ?\DateTimeInterface
    {
        return $this->DateEmbauche;
    }

    public function setDateEmbauche(?\DateTimeInterface $DateEmbauche): self
    {
        $this->DateEmbauche = $DateEmbauche;

        return $this;
    }

    public function getSalaireBasePai(): ?string
    {
        return $this->salaireBasePai;
    }

    public function setSalaireBasePai(?string $salaireBasePai): self
    {
        $this->salaireBasePai = $salaireBasePai;

        return $this;
    }


    public function getFonction(): ?string
    {
        return $this->fonction;
    }

    public function setFonction(?string $fonction): self
    {
        $this->fonction = $fonction;

        return $this;
    }

    public function getDateEntre(): ?\DateTimeInterface
    {
        return $this->dateEntre;
    }

    public function setDateEntre(?\DateTimeInterface $dateEntre): self
    {
        $this->dateEntre = $dateEntre;

        return $this;
    }

    public function getDateSortie(): ?\DateTimeInterface
    {
        return $this->dateSortie;
    }

    public function setDateSortie(?\DateTimeInterface $dateSortie): self
    {
        $this->dateSortie = $dateSortie;

        return $this;
    }

    public function getPublic(): ?bool
    {
        return $this->public;
    }

    public function setPublic(?bool $public): self
    {
        $this->public = $public;

        return $this;
    }

    public function getStFamilialePai(): ?string
    {
        return $this->stFamilialePai;
    }

    public function setStFamilialePai(?string $stFamilialePai): self
    {
        $this->stFamilialePai = $stFamilialePai;

        return $this;
    }

    public function getEnfantCharge(): ?int
    {
        return $this->enfantCharge;
    }

    public function setEnfantCharge(?int $enfantCharge): self
    {
        $this->enfantCharge = $enfantCharge;

        return $this;
    }

    public function getTauxCimr(): ?int
    {
        return $this->tauxCimr;
    }

    public function setTauxCimr(?int $tauxCimr): self
    {
        $this->tauxCimr = $tauxCimr;

        return $this;
    }

    public function getTauxAssuranceMaladie(): ?int
    {
        return $this->TauxAssuranceMaladie;
    }

    public function setTauxAssuranceMaladie(?int $TauxAssuranceMaladie): self
    {
        $this->TauxAssuranceMaladie = $TauxAssuranceMaladie;

        return $this;
    }

    public function getAssuranceRetraiteComp(): ?string
    {
        return $this->assuranceRetraiteComp;
    }

    public function setAssuranceRetraiteComp(?string $assuranceRetraiteComp): self
    {
        $this->assuranceRetraiteComp = $assuranceRetraiteComp;

        return $this;
    }

    public function getInteretCreditLogement(): ?string
    {
        return $this->InteretCreditLogement;
    }

    public function setInteretCreditLogement(?string $InteretCreditLogement): self
    {
        $this->InteretCreditLogement = $InteretCreditLogement;

        return $this;
    }

    public function getRetenuePret(): ?string
    {
        return $this->retenuePret;
    }

    public function setRetenuePret(?string $retenuePret): self
    {
        $this->retenuePret = $retenuePret;

        return $this;
    }

    public function getPrime(): ?int
    {
        return $this->Prime;
    }

    public function setPrime(?int $Prime): self
    {
        $this->Prime = $Prime;

        return $this;
    }

    public function getDeductionRetenue(): ?float
    {
        return $this->deductionRetenue;
    }

    public function setDeductionRetenue(?float $deductionRetenue): self
    {
        $this->deductionRetenue = $deductionRetenue;

        return $this;
    }

    public function getFamiliale(): ?PGlobalParamDet
    {
        return $this->familiale;
    }

    public function setFamiliale(?PGlobalParamDet $familiale): self
    {
        $this->familiale = $familiale;

        return $this;
    }

    public function getDepartement(): ?PDepartement
    {
        return $this->departement;
    }

    public function setDepartement(?PDepartement $departement): self
    {
        $this->departement = $departement;

        return $this;
    }

    public function getTypeContrat(): ?PGlobalParamDet
    {
        return $this->typeContrat;
    }

    public function setTypeContrat(?PGlobalParamDet $typeContrat): self
    {
        $this->typeContrat = $typeContrat;

        return $this;
    }

    public function getBanque(): ?UXBanque
    {
        return $this->banque;
    }

    public function setBanque(?UXBanque $banque): self
    {
        $this->banque = $banque;

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
    public function getUser(): ?bool
    {
        return $this->user;
    }

    public function setUser(?bool $user): self
    {
        $this->user = $user;

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

    public function getAdresseBanque(): ?string
    {
        return $this->adresseBanque;
    }

    public function setAdresseBanque(?string $adresseBanque): self
    {
        $this->adresseBanque = $adresseBanque;

        return $this;
    }

    public function getTeleUrgence(): ?string
    {
        return $this->teleUrgence;
    }

    public function setTeleUrgence(?string $teleUrgence): self
    {
        $this->teleUrgence = $teleUrgence;

        return $this;
    }

    public function getCompte(): ?User
    {
        return $this->compte;
    }

    public function setCompte(?User $compte): self
    {
        $this->compte = $compte;

        return $this;
    }

    /**
     * @return Collection|GrsPaie[]
     */
    public function getGrsPaies(): Collection
    {
        return $this->grsPaies;
    }

    public function addGrsPaie(GrsPaie $grsPaie): self
    {
        if (!$this->grsPaies->contains($grsPaie)) {
            $this->grsPaies[] = $grsPaie;
            $grsPaie->setEmploye($this);
        }

        return $this;
    }

    public function removeGrsPaie(GrsPaie $grsPaie): self
    {
        if ($this->grsPaies->contains($grsPaie)) {
            $this->grsPaies->removeElement($grsPaie);
            // set the owning side to null (unless already changed)
            if ($grsPaie->getEmploye() === $this) {
                $grsPaie->setEmploye(null);
            }
        }

        return $this;
    }




       /**
     * @return Collection|GrsNoteInterne[]
     */
    public function getNotes(): Collection
    {
        return $this->notes;
    }

    public function addNote(GrsNoteInterne $note): self
    {
        if (!$this->notes->contains($note)) {
            $this->notes[] = $note;
            $note->addEmploye($this);
        }

        return $this;
    }

    public function removeNote(GrsNoteInterne $note): self
    {
        if ($this->notes->contains($note)) {
            $this->notes->removeElement($note);
            $note->removeEmploye($this);
        }

        return $this;
    }

    public function setImageName(?string $imageName): void {
        $this->imageName = $imageName;
    }

    public function getImageName(): ?string {
        return $this->imageName;
    }
}
