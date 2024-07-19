<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;


#[ORM\Table(name: 'univ_t_etudiant')]
#[ORM\Entity(repositoryClass: \App\Repository\UnivTEtudiantRepository::class)]
#[ORM\HasLifecycleCallbacks]
class UnivTEtudiant {  

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
    #[Assert\NotBlank]
    #[ORM\Column(type: 'string', length: 150, nullable: true)]
    private $nom;

    /**
     * @var string
     */
    #[Assert\NotBlank]
    #[ORM\Column(type: 'string', length: 150, nullable: true)]
    private $prenom;

    /**
     * @var string
     *
     *
     *
     *
     */
    #[ORM\Column(type: 'string', length: 555, nullable: true)]
    #[Assert\File(mimeTypes: ['image/jpeg', 'image/gif', 'image/png'])]
    private $urlImage;

    /**
     * @var string
     */
    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $titre;

    /**
     * @var \DateTime
     */
    #[Assert\NotBlank]
    #[ORM\Column(type: 'date', nullable: true)]
    private $dateNaissance;

    /**
     * @var string
     */
    #[ORM\Column(type: 'string', length: 100, nullable: true)]
    private $lieuNaissance;

    /**
     * @var string
     */
    #[ORM\Column(type: 'string', length: 10, nullable: true)]
    private $sexe = 'homme';

    #[ORM\JoinColumn(referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \App\Entity\UnivPSituation::class)]
    private $stFamille;

    #[ORM\JoinColumn(referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \App\Entity\UnivPSituation::class)]
    private $stFamilleParent;

    /**
     * @var string
     */
    #[ORM\Column(type: 'string', length: 100, nullable: true)]
    private $nationalite;

    /**
     * @var string
     */
    #[Assert\NotBlank]
    #[ORM\Column(type: 'string', length: 100, nullable: true)]
    private $cin;

    /**
     * @var string
     */
    #[ORM\Column(type: 'string', length: 100, nullable: true)]
    private $passeport;

    /**
     * @var string
     */
    #[ORM\Column(type: 'text', length: 16777215, nullable: true)]
    private $adresse;

    /**
     * @var string
     */
    #[ORM\Column(type: 'string', length: 100, nullable: true)]
    private $ville;

    /**
     * @var string
     */
    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $tel1;

    /**
     * @var string
     */
    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $tel2;

    /**
     * @var string
     */
    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $tel3;

    /**
     * @var string
     */
    #[Assert\Email]
    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $mail1;

    /**
     * @var string
     *
     */
    #[Assert\Email]
    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $mail2;

    /**
     * @var string
     */
    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $nomP;

    /**
     * @var string
     */
    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $prenomP;

    /**
     * @var string
     */
    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $nationaliteP;

    /**
     * @var string
     */
    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $professionP;

    /**
     * @var string
     */
    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $employeP;

    /**
     * @var string
     */
    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $categorieP;

    /**
     * @var string
     */
    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $telP;

    /**
     * @var string
     */
    #[Assert\Email]
    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $mailP;

    /**
     * @var string
     */
    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $salaireP;

    /**
     * @var string
     */
    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $nomM;

    /**
     * @var string
     */
    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $prenomM;

    /**
     * @var string
     */
    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $nationaliteM;

    /**
     * @var string
     */
    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $professionM;

    /**
     * @var string
     */
    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $employeM;

    /**
     * @var string
     */
    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $categorieM;

    /**
     * @var string
     */
    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $telM;

    /**
     * @var string
     *
     */
    #[Assert\Email]
    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $mailM;

    /**
     * @var string
     */
    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $salaireM;

    /**
     * @var string
     */
    #[Assert\NotBlank]
    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $cne;

    /**
     * @var string
     */
    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    #[Assert\GreaterThan(0)]
    private $anneeBac;

    /**
     * @var string
     */
    #[Assert\NotBlank]
    #[Assert\GreaterThanOrEqual(value: 0)]
    #[Assert\LessThanOrEqual(value: 20)]
    #[ORM\Column(type: 'string', length: 100, nullable: true)]
    private $moyenneBac;

    /**
     * @var string
     */
    #[ORM\Column(type: 'string', length: 100, nullable: true)]
    private $concoursMedbup;

    /**
     * @var string
     */
    #[ORM\Column(type: 'text', length: 16777215, nullable: true)]
    private $obs;

    /**
     * @var string
     */
    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $categoriePreinscription;

    /**
     * @var string
     */
    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $fraisPreinscription;

    /**
     * @var string
     */
    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $bourse = 1;

    /**
     * @var string
     */
    #[ORM\Column(type: 'string', length: 50, nullable: true)]
    private $logement = 0 ; 

    /**
     * @var string
     */
    #[ORM\Column(type: 'string', length: 50, nullable: true)]
    private $parking = 0 ;



    /**
     * @var string
     */
    #[ORM\Column(type: 'string', length: 20, nullable: true)]
    private $actif;

    /**
     * @var string
     */
    #[ORM\Column(type: 'string', length: 10, nullable: true)]
    private $codeOrganisme;

    /**
     * @var string
     */
    #[Assert\GreaterThanOrEqual(value: 0)]
    #[ORM\Column(type: 'string', length: 11, nullable: true)]
    private $nombreEnfants;

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

    /**
     * @var string
     */
    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $statutDeliberation;
    
     #[ORM\JoinColumn(referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \UnivPStatut::class)]
    private $statut;

    #[ORM\JoinColumn(referencedColumnName: 'id')]
    #[Assert\NotBlank]
    #[ORM\ManyToOne(targetEntity: \UnivNatureDemande::class)]
    private $natureDemande;

    #[ORM\JoinColumn(referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \UnivXTypeBac::class)]
    private $typeBac;

    #[ORM\JoinColumn(referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \UnivXAcademie::class)]
    private $academie;

    #[ORM\JoinColumn(referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \UnivXLangue::class)]
    private $langueConcours;

    #[ORM\JoinColumn(referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \UnivXFiliere::class)]
    private $filiere;

    /**
     * @var integer
     */
    #[ORM\Column(type: 'boolean', nullable: true)]
    private $active;

    /**
     * @var integer
     */
    #[ORM\Column(type: 'boolean', nullable: true)]
    private $cpgem;

    /**
     * @var integer
     */
    #[ORM\Column(type: 'boolean', nullable: true)]
    private $cpge1;
    
    
    /**
     * @var integer
     */
    #[ORM\Column(type: 'boolean', nullable: true)]
    private $cpge2;
      /**
     * @var integer
     */
    #[ORM\Column(type: 'boolean', nullable: true)]
    private $vet;
      /**
     * @var integer
     */
    #[ORM\Column(type: 'boolean', nullable: true)]
    private $cam;
      /**
     * @var integer
     */
    #[ORM\Column(type: 'boolean', nullable: true)]
    private $ist;
      /**
     * @var integer
     */
    #[ORM\Column(type: 'boolean', nullable: true)]
    private $ip;
      /**
     * @var integer
     */
    #[ORM\Column(type: 'boolean', nullable: true)]
    private $fpa;
      /**
     * @var integer
     */
    #[ORM\Column(type: 'boolean', nullable: true)]
    private $fda;
      /**
     * @var integer
     */
    #[ORM\Column(type: 'boolean', nullable: true)]
    private $fma;
    
    
      /**
     * @var integer
     */
    #[ORM\Column(type: 'boolean', nullable: true)]
    private $sourceSite;
    

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

    
    #[ORM\OneToMany(targetEntity: \App\Entity\UnivTPreinscriptionSuivi::class, mappedBy: 'etudiant')]
    private $suivis;

  #[ORM\OneToMany(targetEntity: \App\Entity\UnivTEtudiantAppel::class, mappedBy: 'etudiant')]
    private $appels;
      #[ORM\OneToMany(targetEntity: \App\Entity\UnivTPreinscriptionReleveNote::class, mappedBy: 'etudiant')]
    private $releves;
    
    
    #[ORM\OneToMany(targetEntity: \UnivTPreinscription::class, mappedBy: 'etudiant')]
    private $preinscriptions;


        
    #[ORM\JoinColumn(name: 'p_dossier_id', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \App\Entity\PDossier::class)]
    private $dossier;
    
    public function __construct()
    {
        $this->suivis = new ArrayCollection();
        $this->appels = new ArrayCollection();
        $this->releves = new ArrayCollection();
        $this->preinscriptions = new ArrayCollection();
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

    public function getUrlImage(): ?string
    {
        return $this->urlImage;
    }

    public function setUrlImage(?string $urlImage): self
    {
        $this->urlImage = $urlImage;

        return $this;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(?string $titre): self
    {
        $this->titre = $titre;

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

    public function getLieuNaissance(): ?string
    {
        return $this->lieuNaissance;
    }

    public function setLieuNaissance(?string $lieuNaissance): self
    {
        $this->lieuNaissance = $lieuNaissance;

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




    public function getNationalite(): ?string
    {
        return $this->nationalite;
    }

    public function setNationalite(?string $nationalite): self
    {
        $this->nationalite = $nationalite;

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

    public function getPasseport(): ?string
    {
        return $this->passeport;
    }

    public function setPasseport(?string $passeport): self
    {
        $this->passeport = $passeport;

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

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(?string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    public function getTel1(): ?string
    {
        return $this->tel1;
    }

    public function setTel1(?string $tel1): self
    {
        $this->tel1 = $tel1;

        return $this;
    }

    public function getTel2(): ?string
    {
        return $this->tel2;
    }

    public function setTel2(?string $tel2): self
    {
        $this->tel2 = $tel2;

        return $this;
    }

    public function getTel3(): ?string
    {
        return $this->tel3;
    }

    public function setTel3(?string $tel3): self
    {
        $this->tel3 = $tel3;

        return $this;
    }

    public function getMail1(): ?string
    {
        return $this->mail1;
    }

    public function setMail1(?string $mail1): self
    {
        $this->mail1 = $mail1;

        return $this;
    }

    public function getMail2(): ?string
    {
        return $this->mail2;
    }

    public function setMail2(?string $mail2): self
    {
        $this->mail2 = $mail2;

        return $this;
    }

    public function getNomP(): ?string
    {
        return $this->nomP;
    }

    public function setNomP(?string $nomP): self
    {
        $this->nomP = $nomP;

        return $this;
    }

    public function getPrenomP(): ?string
    {
        return $this->prenomP;
    }

    public function setPrenomP(?string $prenomP): self
    {
        $this->prenomP = $prenomP;

        return $this;
    }

    public function getNationaliteP(): ?string
    {
        return $this->nationaliteP;
    }

    public function setNationaliteP(?string $nationaliteP): self
    {
        $this->nationaliteP = $nationaliteP;

        return $this;
    }

    public function getProfessionP(): ?string
    {
        return $this->professionP;
    }

    public function setProfessionP(?string $professionP): self
    {
        $this->professionP = $professionP;

        return $this;
    }

    public function getEmployeP(): ?string
    {
        return $this->employeP;
    }

    public function setEmployeP(?string $employeP): self
    {
        $this->employeP = $employeP;

        return $this;
    }

    public function getCategorieP(): ?string
    {
        return $this->categorieP;
    }

    public function setCategorieP(?string $categorieP): self
    {
        $this->categorieP = $categorieP;

        return $this;
    }

    public function getTelP(): ?string
    {
        return $this->telP;
    }

    public function setTelP(?string $telP): self
    {
        $this->telP = $telP;

        return $this;
    }

    public function getMailP(): ?string
    {
        return $this->mailP;
    }

    public function setMailP(?string $mailP): self
    {
        $this->mailP = $mailP;

        return $this;
    }

    public function getSalaireP(): ?string
    {
        return $this->salaireP;
    }

    public function setSalaireP(?string $salaireP): self
    {
        $this->salaireP = $salaireP;

        return $this;
    }

    public function getNomM(): ?string
    {
        return $this->nomM;
    }

    public function setNomM(?string $nomM): self
    {
        $this->nomM = $nomM;

        return $this;
    }

    public function getPrenomM(): ?string
    {
        return $this->prenomM;
    }

    public function setPrenomM(?string $prenomM): self
    {
        $this->prenomM = $prenomM;

        return $this;
    }

    public function getNationaliteM(): ?string
    {
        return $this->nationaliteM;
    }

    public function setNationaliteM(?string $nationaliteM): self
    {
        $this->nationaliteM = $nationaliteM;

        return $this;
    }

    public function getProfessionM(): ?string
    {
        return $this->professionM;
    }

    public function setProfessionM(?string $professionM): self
    {
        $this->professionM = $professionM;

        return $this;
    }

    public function getEmployeM(): ?string
    {
        return $this->employeM;
    }

    public function setEmployeM(?string $employeM): self
    {
        $this->employeM = $employeM;

        return $this;
    }

    public function getCategorieM(): ?string
    {
        return $this->categorieM;
    }

    public function setCategorieM(?string $categorieM): self
    {
        $this->categorieM = $categorieM;

        return $this;
    }

    public function getTelM(): ?string
    {
        return $this->telM;
    }

    public function setTelM(?string $telM): self
    {
        $this->telM = $telM;

        return $this;
    }

    public function getMailM(): ?string
    {
        return $this->mailM;
    }

    public function setMailM(?string $mailM): self
    {
        $this->mailM = $mailM;

        return $this;
    }

    public function getSalaireM(): ?string
    {
        return $this->salaireM;
    }

    public function setSalaireM(?string $salaireM): self
    {
        $this->salaireM = $salaireM;

        return $this;
    }

    public function getCne(): ?string
    {
        return $this->cne;
    }

    public function setCne(?string $cne): self
    {
        $this->cne = $cne;

        return $this;
    }

    public function getAnneeBac(): ?string
    {
        return $this->anneeBac;
    }

    public function setAnneeBac(?string $anneeBac): self
    {
        $this->anneeBac = $anneeBac;

        return $this;
    }

    public function getMoyenneBac(): ?string
    {
        return $this->moyenneBac;
    }

    public function setMoyenneBac(?string $moyenneBac): self
    {
        $this->moyenneBac = $moyenneBac;

        return $this;
    }

    public function getConcoursMedbup(): ?string
    {
        return $this->concoursMedbup;
    }

    public function setConcoursMedbup(?string $concoursMedbup): self
    {
        $this->concoursMedbup = $concoursMedbup;

        return $this;
    }

    public function getObs(): ?string
    {
        return $this->obs;
    }

    public function setObs(?string $obs): self
    {
        $this->obs = $obs;

        return $this;
    }

    public function getCategoriePreinscription(): ?string
    {
        return $this->categoriePreinscription;
    }

    public function setCategoriePreinscription(?string $categoriePreinscription): self
    {
        $this->categoriePreinscription = $categoriePreinscription;

        return $this;
    }

    public function getFraisPreinscription(): ?string
    {
        return $this->fraisPreinscription;
    }

    public function setFraisPreinscription(?string $fraisPreinscription): self
    {
        $this->fraisPreinscription = $fraisPreinscription;

        return $this;
    }

    public function getBourse(): ?string
    {
        return $this->bourse;
    }

    public function setBourse(?string $bourse): self
    {
        $this->bourse = $bourse;

        return $this;
    }

    public function getLogement(): ?string
    {
        return $this->logement;
    }

    public function setLogement(?string $logement): self
    {
        $this->logement = $logement;

        return $this;
    }

    public function getParking(): ?string
    {
        return $this->parking;
    }

    public function setParking(?string $parking): self
    {
        $this->parking = $parking;

        return $this;
    }

    public function getActif(): ?string
    {
        return $this->actif;
    }

    public function setActif(?string $actif): self
    {
        $this->actif = $actif;

        return $this;
    }

    public function getCodeOrganisme(): ?string
    {
        return $this->codeOrganisme;
    }

    public function setCodeOrganisme(?string $codeOrganisme): self
    {
        $this->codeOrganisme = $codeOrganisme;

        return $this;
    }

    public function getNombreEnfants(): ?string
    {
        return $this->nombreEnfants;
    }

    public function setNombreEnfants(?string $nombreEnfants): self
    {
        $this->nombreEnfants = $nombreEnfants;

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

    public function getStatutDeliberation(): ?string
    {
        return $this->statutDeliberation;
    }

    public function setStatutDeliberation(?string $statutDeliberation): self
    {
        $this->statutDeliberation = $statutDeliberation;

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

    public function getCpgem(): ?bool
    {
        return $this->cpgem;
    }

    public function setCpgem(?bool $cpgem): self
    {
        $this->cpgem = $cpgem;

        return $this;
    }

    public function getCpge1(): ?bool
    {
        return $this->cpge1;
    }

    public function setCpge1(?bool $cpge1): self
    {
        $this->cpge1 = $cpge1;

        return $this;
    }

    public function getCpge2(): ?bool
    {
        return $this->cpge2;
    }

    public function setCpge2(?bool $cpge2): self
    {
        $this->cpge2 = $cpge2;

        return $this;
    }

    public function getVet(): ?bool
    {
        return $this->vet;
    }

    public function setVet(?bool $vet): self
    {
        $this->vet = $vet;

        return $this;
    }

    public function getCam(): ?bool
    {
        return $this->cam;
    }

    public function setCam(?bool $cam): self
    {
        $this->cam = $cam;

        return $this;
    }

    public function getIst(): ?bool
    {
        return $this->ist;
    }

    public function setIst(?bool $ist): self
    {
        $this->ist = $ist;

        return $this;
    }

    public function getIp(): ?bool
    {
        return $this->ip;
    }

    public function setIp(?bool $ip): self
    {
        $this->ip = $ip;

        return $this;
    }

    public function getFpa(): ?bool
    {
        return $this->fpa;
    }

    public function setFpa(?bool $fpa): self
    {
        $this->fpa = $fpa;

        return $this;
    }

    public function getFda(): ?bool
    {
        return $this->fda;
    }

    public function setFda(?bool $fda): self
    {
        $this->fda = $fda;

        return $this;
    }

    public function getFma(): ?bool
    {
        return $this->fma;
    }

    public function setFma(?bool $fma): self
    {
        $this->fma = $fma;

        return $this;
    }

    public function getSourceSite(): ?bool
    {
        return $this->sourceSite;
    }

    public function setSourceSite(?bool $sourceSite): self
    {
        $this->sourceSite = $sourceSite;

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

    public function getNatureDemande(): ?UnivNatureDemande
    {
        return $this->natureDemande;
    }

    public function setNatureDemande(?UnivNatureDemande $natureDemande): self
    {
        $this->natureDemande = $natureDemande;

        return $this;
    }

    public function getTypeBac(): ?UnivXTypeBac
    {
        return $this->typeBac;
    }

    public function setTypeBac(?UnivXTypeBac $typeBac): self
    {
        $this->typeBac = $typeBac;

        return $this;
    }

    public function getAcademie(): ?UnivXAcademie
    {
        return $this->academie;
    }

    public function setAcademie(?UnivXAcademie $academie): self
    {
        $this->academie = $academie;

        return $this;
    }

    public function getLangueConcours(): ?UnivXLangue
    {
        return $this->langueConcours;
    }

    public function setLangueConcours(?UnivXLangue $langueConcours): self
    {
        $this->langueConcours = $langueConcours;

        return $this;
    }

    public function getFiliere(): ?UnivXFiliere
    {
        return $this->filiere;
    }

    public function setFiliere(?UnivXFiliere $filiere): self
    {
        $this->filiere = $filiere;

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
     * @return Collection|UnivTPreinscriptionSuivi[]
     */
    public function getSuivis(): Collection
    {
        return $this->suivis;
    }

    public function addSuivi(UnivTPreinscriptionSuivi $suivi): self
    {
        if (!$this->suivis->contains($suivi)) {
            $this->suivis[] = $suivi;
            $suivi->setEtudiant($this);
        }

        return $this;
    }

    public function removeSuivi(UnivTPreinscriptionSuivi $suivi): self
    {
        if ($this->suivis->contains($suivi)) {
            $this->suivis->removeElement($suivi);
            // set the owning side to null (unless already changed)
            if ($suivi->getEtudiant() === $this) {
                $suivi->setEtudiant(null);
            }
        }

        return $this;
    }


          /**
     * @return Collection|UnivTEtudiantAppel[]
     */
    public function getAppels(): Collection
    {
        return $this->appels;
    }

    public function addAppel(UnivTEtudiantAppel $appel): self
    {
        if (!$this->appels->contains($appel)) {
            $this->appels[] = $appel;
            $appel->setEtudiant($this);
        }

        return $this;
    }

    public function removeAppel(UnivTEtudiantAppel $appel): self
    {
        if ($this->appels->contains($appel)) {
            $this->appels->removeElement($appel);
            // set the owning side to null (unless already changed)
            if ($appel->getEtudiant() === $this) {
                $appel->setEtudiant(null);
            }
        }

        return $this;
    }



           /**
     * @return Collection|UnivTPreinscriptionReleveNote[]
     */
    public function getreleves(): Collection
    {
        return $this->releves;
    }

    public function addreleve(UnivTPreinscriptionReleveNote $releve): self
    {
        if (!$this->releves->contains($releve)) {
            $this->releves[] = $releve;
            $releve->setEtudiant($this);
        }

        return $this;
    }

    public function removereleve(UnivTPreinscriptionReleveNote $releve): self
    {
        if ($this->releves->contains($releve)) {
            $this->releves->removeElement($releve);
            // set the owning side to null (unless already changed)
            if ($releve->getEtudiant() === $this) {
                $releve->setEtudiant(null);
            }
        }

        return $this;
    }

    public function addRelefe(UnivTPreinscriptionReleveNote $relefe): self
    {
        if (!$this->releves->contains($relefe)) {
            $this->releves[] = $relefe;
            $relefe->setEtudiant($this);
        }

        return $this;
    }

    public function removeRelefe(UnivTPreinscriptionReleveNote $relefe): self
    {
        if ($this->releves->contains($relefe)) {
            $this->releves->removeElement($relefe);
            // set the owning side to null (unless already changed)
            if ($relefe->getEtudiant() === $this) {
                $relefe->setEtudiant(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|UnivTPreinscription[]
     */
    public function getPreinscriptions(): Collection
    {
        return $this->preinscriptions;
    }

    public function addPreinscription(UnivTPreinscription $preinscription): self
    {
        if (!$this->preinscriptions->contains($preinscription)) {
            $this->preinscriptions[] = $preinscription;
            $preinscription->setEtudiant($this);
        }

        return $this;
    }

    public function removePreinscription(UnivTPreinscription $preinscription): self
    {
        if ($this->preinscriptions->contains($preinscription)) {
            $this->preinscriptions->removeElement($preinscription);
            // set the owning side to null (unless already changed)
            if ($preinscription->getEtudiant() === $this) {
                $preinscription->setEtudiant(null);
            }
        }

        return $this;
    }

    
    public function getStFamille(): ?UnivPSituation
    {
        return $this->stFamille;
    }

    public function setStFamille(?UnivPSituation $stFamille): self
    {
        $this->stFamille = $stFamille;

        return $this;
    }
   
//getStFamilleParent

public function getStFamilleParent(): ?UnivPSituation
{
    return $this->stFamilleParent;
}

public function setStFamilleParent(?UnivPSituation $stFamilleParent): self
{
    $this->stFamilleParent = $stFamilleParent;

    return $this;
}
}
