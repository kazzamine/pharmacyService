<?php

namespace App\Entity;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
#[ORM\Table(name: 'univ_t_preinscription')]
#[ORM\Entity(repositoryClass: \App\Repository\UnivTPreinscriptionRepository::class)]
#[ORM\HasLifecycleCallbacks]
#[UniqueEntity(fields: ['etudiant', 'formation', 'annee'], errorPath: 'Preinscription', message: 'Cette formation déjà existe dans la table des preinscription.')]
class UnivTPreinscription {

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    /**
     * @var string
     */
    #[ORM\Column(type: 'string', length: 100, nullable: true)]
    private $code;

    /**
     * @var string
     */
    #[ORM\Column(type: 'boolean', nullable: true)]
    private $inscriptionValide;
    
    
      /**
     * @var string
     */
    #[ORM\Column(type: 'string', length: 100, nullable: true)]
    private $codeCab;


    #[ORM\JoinColumn(referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \UnivPStatut::class)]
    private $statut;

    #[ORM\JoinColumn(referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \UnivTEtudiant::class, inversedBy: 'preinscriptions')]
    private $etudiant;

    #[ORM\JoinColumn(referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \UnivAcAnnee::class)]
    private $annee;

    #[ORM\JoinColumn(referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \UnivAcFormation::class)]
    private $formation;
   

    /**
     * @var integer
     */
    #[ORM\Column(name: 'rang_p', type: 'integer', nullable: true)]
    private $rangP;

    /**
     * @var integer
     */
    #[ORM\Column(type: 'integer', nullable: true)]
    private $rangS;

    /**
     * @var string
     */
    #[ORM\Column(type: 'string', length: 100, nullable: true)]
    private $categorieListe;

    /**
     * @var string
     */
    #[ORM\Column(type: 'string', length: 100, nullable: true)]
    private $admissionListe;

    /**
     * @var string
     */
    #[ORM\Column(type: 'string', length: 100, nullable: true)]
    private $teleListe;

       #[ORM\JoinColumn(referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \UnivPStatut::class)]
    private $statutDeliberation;

    /**
     * @var integer
     */
    #[ORM\Column(type: 'boolean', nullable: true)]
    private $active;
    
      /**
     * @var integer
     */
    #[ORM\Column(type: 'boolean', nullable: true)]
    private $mentionnerAdmissible;

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
    
    
     #[ORM\JoinTable(name: 'univ_t_preinscription_documents')]
    #[ORM\ManyToMany(targetEntity: \UnivPDocument::class, cascade: ['persist'])]
    private $preinscritionDocuments;
    
    #[ORM\JoinTable(name: 'univ_t_preinscription_documents_bource')]
    #[ORM\ManyToMany(targetEntity: \UnivPDocument::class, cascade: ['persist'])]
    private $preinscritionDocumentsBource;


      #[ORM\OneToMany(targetEntity: \App\Entity\UnivTOperationcab::class, mappedBy: 'preinscription')]
    private $operationscab;
    
       #[ORM\OneToMany(targetEntity: \UnivTAdmission::class, mappedBy: 'preinscription')]
    private $admissions;


    #[ORM\OneToMany(targetEntity: \App\Entity\UnivTPreinscriptionFichier::class, mappedBy: 'preinscription')]
      private $fichiers;

      #[ORM\Column(type: 'string', length: 5, nullable: true)]
      private $lpLd; 

      

        
    #[ORM\JoinColumn(name: 'p_dossier_id', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \App\Entity\PDossier::class)]
    private $dossier;

    public function __construct()
    {
        $this->preinscritionDocuments = new ArrayCollection();
        $this->preinscritionDocumentsBource = new ArrayCollection();
        $this->operationscab = new ArrayCollection();
        $this->fichiers = new ArrayCollection();
        $this->admissions = new ArrayCollection();
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

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(?string $code): self
    {
        $this->code = $code;

        return $this;
    }

    public function getInscriptionValide(): ?bool
    {
        return $this->inscriptionValide;
    }

    public function setInscriptionValide(?bool $inscriptionValide): self
    {
        $this->inscriptionValide = $inscriptionValide;

        return $this;
    }

    public function getCodeCab(): ?string
    {
        return $this->codeCab;
    }

    public function setCodeCab(?string $codeCab): self
    {
        $this->codeCab = $codeCab;

        return $this;
    }

    public function getRangP(): ?int
    {
        return $this->rangP;
    }

    public function setRangP(int $rangP): self
    {
        $this->rangP = $rangP;

        return $this;
    }

    public function getRangS(): ?int
    {
        return $this->rangS;
    }

    public function setRangS(int $rangS): self
    {
        $this->rangS = $rangS;

        return $this;
    }

    public function getCategorieListe(): ?string
    {
        return $this->categorieListe;
    }

    public function setCategorieListe(?string $categorieListe): self
    {
        $this->categorieListe = $categorieListe;

        return $this;
    }

    public function getAdmissionListe(): ?string
    {
        return $this->admissionListe;
    }

    public function setAdmissionListe(?string $admissionListe): self
    {
        $this->admissionListe = $admissionListe;

        return $this;
    }

    public function getTeleListe(): ?string
    {
        return $this->teleListe;
    }

    public function setTeleListe(?string $teleListe): self
    {
        $this->teleListe = $teleListe;

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

    public function getStatut(): ?UnivPStatut
    {
        return $this->statut;
    }

    public function setStatut(?UnivPStatut $statut): self
    {
        $this->statut = $statut;

        return $this;
    }



    public function getStatutDeliberation(): ?UnivPStatut
    {
        return $this->statutDeliberation;
    }

    public function setStatutDeliberation(?UnivPStatut $statutDeliberation): self
    {
        $this->statutDeliberation = $statutDeliberation;

        return $this;
    }



    public function getEtudiant(): ?UnivTEtudiant
    {
        return $this->etudiant;
    }

    public function setEtudiant(?UnivTEtudiant $etudiant): self
    {
        $this->etudiant = $etudiant;

        return $this;
    }

    public function getAnnee(): ?UnivAcAnnee
    {
        return $this->annee;
    }

    public function setAnnee(?UnivAcAnnee $annee): self
    {
        $this->annee = $annee;

        return $this;
    }

    public function getFormation(): ?UnivAcFormation
    {
        return $this->formation;
    }

    public function setFormation(?UnivAcFormation $formation): self
    {
        $this->formation = $formation;

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
     * @return Collection|UnivPDocument[]
     */
    public function getPreinscritionDocuments(): Collection
    {
        return $this->preinscritionDocuments;
    }

    public function addPreinscritionDocument(UnivPDocument $preinscritionDocument): self
    {
        if (!$this->preinscritionDocuments->contains($preinscritionDocument)) {
            $this->preinscritionDocuments[] = $preinscritionDocument;
        }

        return $this;
    }

    public function removePreinscritionDocument(UnivPDocument $preinscritionDocument): self
    {
        if ($this->preinscritionDocuments->contains($preinscritionDocument)) {
            $this->preinscritionDocuments->removeElement($preinscritionDocument);
        }

        return $this;
    }

    /**
     * @return Collection|UnivPDocument[]
     */
    public function getPreinscritionDocumentsBource(): Collection
    {
        return $this->preinscritionDocumentsBource;
    }

    public function addPreinscritionDocumentsBource(UnivPDocument $preinscritionDocumentsBource): self
    {
        if (!$this->preinscritionDocumentsBource->contains($preinscritionDocumentsBource)) {
            $this->preinscritionDocumentsBource[] = $preinscritionDocumentsBource;
        }

        return $this;
    }

    public function removePreinscritionDocumentsBource(UnivPDocument $preinscritionDocumentsBource): self
    {
        if ($this->preinscritionDocumentsBource->contains($preinscritionDocumentsBource)) {
            $this->preinscritionDocumentsBource->removeElement($preinscritionDocumentsBource);
        }

        return $this;
    }



           /**
     * @return Collection|UnivTOperationcab[]
     */
    public function getOperationscab(): Collection
    {
        return $this->operationscab;
    }

    public function addOperationscab(UnivTOperationcab $operation): self
    {
        if (!$this->operationscab->contains($operation)) {
            $this->operationscab[] = $operation;
            $operation->setPreinscription($this);
        }

        return $this;
    }

    public function removeOperationscab(UnivTOperationcab $operation): self
    {
        if ($this->operationscab->contains($operation)) {
            $this->operationscab->removeElement($operation);
            // set the owning side to null (unless already changed)
            if ($operation->getPreinscription() === $this) {
                $operation->getPreinscription(null);
            }
        }

        return $this;
    }





          /**
     * @return Collection|UnivTPreinscriptionFichier[]
     */
    public function getFichiers(): Collection
    {
        return $this->fichiers;
    }

    public function addFichier(UnivTPreinscriptionFichier $fichier): self
    {
        if (!$this->fichiers->contains($fichier)) {
            $this->fichiers[] = $fichier;
            $fichier->setPreinscription($this);
        }

        return $this;
    }

    public function removeFichier(UnivTPreinscriptionFichier $fichier): self
    {
        if ($this->fichiers->contains($fichier)) {
            $this->fichiers->removeElement($fichier);
            // set the owning side to null (unless already changed)
            if ($fichier->getPreinscription() === $this) {
                $fichier->setPreinscription(null);
            }
        }

        return $this;
    }

    public function getMentionnerAdmissible(): ?bool
    {
        return $this->mentionnerAdmissible;
    }

    public function setMentionnerAdmissible(?bool $mentionnerAdmissible): self
    {
        $this->mentionnerAdmissible = $mentionnerAdmissible;

        return $this;
    }

    /**
     * @return Collection|UnivTAdmission[]
     */
    public function getAdmissions(): Collection
    {
        return $this->admissions;
    }

    public function addAdmission(UnivTAdmission $admission): self
    {
        if (!$this->admissions->contains($admission)) {
            $this->admissions[] = $admission;
            $admission->setPreinscription($this);
        }

        return $this;
    }

    public function removeAdmission(UnivTAdmission $admission): self
    {
        if ($this->admissions->contains($admission)) {
            $this->admissions->removeElement($admission);
            // set the owning side to null (unless already changed)
            if ($admission->getPreinscription() === $this) {
                $admission->setPreinscription(null);
            }
        }

        return $this;
    }

    public function getLpLd(): ?string
    {
        return $this->lpLd;
    }

    public function setLpLd(?string $lpLd): self
    {
        $this->lpLd = $lpLd;

        return $this;
    }

}
