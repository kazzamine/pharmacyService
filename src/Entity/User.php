<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @Vich\Uploadable
 *
 */
#[ORM\Table(name: 'puser')]
#[ORM\Entity]
#[UniqueEntity('email')]
#[ORM\HasLifecycleCallbacks]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;
    
        #[ORM\OneToMany(targetEntity: \UserAntenne::class, mappedBy: 'user')]
    private $userAntennes;


    /**
     * @var bool
     */
    #[ORM\Column(name: 'type', type: 'boolean', nullable: true)]
    private $type = '0';
    /**
     * @var bool
     */
    #[ORM\Column(name: 'cmd_pharmacie ', type: 'boolean', nullable: true)]
    private $cmdPharmacie  = 0;

    /**
     * @var bool
     */
    #[ORM\Column(type: 'boolean', nullable: true)]
    private $menuPosition = '0';

    /**
     * @var string|null
     *
     *
     *
     */
    #[ORM\Column(name: 'username', type: 'string', length: 150, unique: true)]
    #[Assert\NotBlank]
    private $username;

    /**
     * @var string|null
     *
     */
    #[Assert\Length(min: '6', minMessage: 'Minimum 6 caractères')]
    #[ORM\Column(name: 'password', type: 'string', length: 255, nullable: true)]
    private $password;

    
    #[Assert\Length(max: 250)]
    #[Assert\Length(min: '6', minMessage: 'Minimum 6 caractères')]
    private $plainPassword;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'nom', type: 'string', length: 150, nullable: true)]
    #[Assert\NotBlank]
    private $nom;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'prenom', type: 'string', length: 150, nullable: true)]
    #[Assert\NotBlank]
    private $prenom;

    #[ORM\JoinColumn(name: 'us_groupe_id', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \UsGroupe::class, inversedBy: 'users')]
    private $groupe;

    /**
     *
     * @var \DateTime
     *
     */
    #[ORM\Column(name: 'join_at', type: 'datetime', nullable: true)]
    private $joinAt;

    #[ORM\Column(name: 'roles', type: 'array', nullable: true)]
    private $roles = array();

    #[ORM\Column(name: 'email', type: 'string', length: 255, unique: true, nullable: true)]
    #[Assert\Email(message: 'email.error')]
    #[Assert\NotBlank]
    private $email;

    #[ORM\Column(name: 'is_active', type: 'boolean', nullable: true)]
    private $isActive;

    //    /**
    //     * @ORM\OneToMany(targetEntity="App\Entity\UsGroupe", mappedBy="user")
    //     */
    //    private $UserGroupes;
    /**
     * @var string|null
     */
    #[ORM\Column(name: 'theme', type: 'string', length: 150, nullable: true)]
    private $theme;

    /**
     *
     * @var \DateTime
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

    #[ORM\JoinColumn(name: 'solde', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \GrsSoldeConge::class)]
    private $solde;


    #[ORM\JoinColumn(name: 'user_created', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \User::class)]
    private $userCreated;

    #[ORM\JoinColumn(name: 'user_updated', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \User::class)]
    private $userUpdated;


    
    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $originalName;

    
    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $mimeType;

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
    private $imageFile;

    /**
     * @var string
     */
    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $imageName;

    /**
     * @var integer
     */
    #[ORM\Column(type: 'integer', nullable: true)]
    private $imageSize;

    /**
     * @var \DateTime
     */
    #[ORM\Column(type: 'datetime', nullable: true)]
    private $updatedAt;

    #[ORM\Column(type: 'string', length: 100, nullable: true)]
    private $tele;

    #[ORM\Column(type: 'text', nullable: true)]
    private $adresse;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $telePersonnel;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $teleEntreprise;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $pays;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $ville;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $sexe;

    #[ORM\Column(type: 'text', nullable: true)]
    private $signature;

    
    #[ORM\JoinColumn(name: 'p_poste_id', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \App\Entity\PPoste::class, inversedBy: 'users')]
    private $poste;

    #[ORM\OneToMany(targetEntity: \App\Entity\UPResponsable::class, mappedBy: 'user')]
    private $uPResponsables;

    #[ORM\OneToMany(targetEntity: \App\Entity\PMarcheDet::class, mappedBy: 'userCreated')]
    private $pMarcheDets;


    #[ORM\PrePersist]
    public function setCreatedValue()
    {

        $this->created = new \DateTime();
    }

    #[ORM\PreUpdate]
    public function setUpdatedValue()
    {
        $this->updated = new \DateTime();
    }

    //        public function getProfilPorcentage(){
    //        if (!$this->getImageName()){
    //            return 50;
    //            
    //        }
    //        
    //        if (!$this->getTheme()){
    //            return 40;
    //            
    //        }
    //    }







    public function getUpdated(): ?\DateTimeInterface
    {
        return $this->updated;
    }

    public function setUpdated(?\DateTimeInterface $updated): self
    {
        $this->updated = $updated;

        return $this;
    }

    public function getType(): ?bool
    {
        return $this->type;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function getUserCreated(): ?User
    {
        return $this->userCreated;
    }

    public function setCreated(?\DateTimeInterface $created): self
    {
        $this->created = $created;

        return $this;
    }

    public function getCreated(): ?\DateTimeInterface
    {
        return $this->created;
    }

    public function setUserCreated(?User $userCreated): self
    {
        $this->userCreated = $userCreated;

        return $this;
    }

    public function setUserUpdated(?User $userUpdated): self
    {
        $this->userUpdated = $userUpdated;

        return $this;
    }

    public function getuserUpdated(): ?User
    {
        return $this->userUpdated;
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

    public function getTheme(): ?string
    {
        return $this->theme;
    }

    public function setPrenom(?string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function setTheme(string $theme): self
    {
        $this->theme = $theme;

        return $this;
    }

    public function setType(bool $type): self
    {
        $this->type = $type;

        return $this;
    }
    public function getCmdPharmacie(): ?bool
    {
        return $this->cmdPharmacie;
    }
    public function setCmdPharmacie(bool $cmdPharmacie): self
    {
        $this->cmdPharmacie = $cmdPharmacie;

        return $this;
    }

    public function getMenuPosition(): ?bool
    {
        return $this->menuPosition;
    }

    public function setMenuPosition(bool $menuPosition): self
    {
        $this->menuPosition = $menuPosition;

        return $this;
    }

    public function getSalt()
    {
        // you *may* need a real salt depending on your encoder
        // see section on salt below
        return null;
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
    public function getUserIdentifier(): string
    {
        return (string) $this->username;
    }
    public function getPassword(): ?string
    {
        
        return $this->password;
    }

    function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @see UserInterface
     */
    public function getRoles():array
    {
        if (empty($this->roles)) {
            return ['ROLE_USER'];
        }
        return $this->roles;
    }

    function addRole($role)
    {
        $this->roles[] = $role;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials():void
    {
    }

    function getId()
    {
        return $this->id;
    }

    function getPlainPassword()
    {
        return $this->plainPassword;
    }

    function setPlainPassword($plainPassword)
    {
        $this->plainPassword = $plainPassword;
    }
    function getIsActive()
    {
        return $this->isActive;
    }

    function setId($id)
    {
        $this->id = $id;
    }


    function setIsActive($isActive)
    {
        $this->isActive = $isActive;
    }

    public function __toString()
    {
        return $this->username;
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername()
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getNomComplet(): ?string
    {
        return $this->nom . " " . $this->getPrenom();
    }
    public function __construct()
    {
        $this->isActive = true;

        $this->maCommandefrscabs = new ArrayCollection();
        $this->uPResponsables = new ArrayCollection();
        $this->pMarcheDets = new ArrayCollection();
        $this->userAntennes = new ArrayCollection();



        // $this->UserGroupes = new ArrayCollection();
        // may not be needed, see section on salt below
        // $this->salt = md5(uniqid('', true));
    }



    /**
     * If manually uploading a file (i.e. not using Symfony Form) ensure an instance
     * of 'UploadedFile' is injected into this setter to trigger the update. If this
     * bundle's configuration parameter 'inject_on_load' is set to 'true' this setter
     * must be able to accept an instance of 'File' as the bundle will inject one here
     * during Doctrine hydration.
     *
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile $imageFile
     */
    public function setImageFile(?File $imageFile = null): void
    {
        $this->imageFile = $imageFile;

        if (null !== $imageFile) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt = new \DateTimeImmutable();
        }
    }

    public function getImageFile(): ?File
    {
        return $this->imageFile;
    }

    public function getJoinAt(): ?\DateTimeInterface
    {
        return $this->joinAt;
    }

    public function setJoinAt(?\DateTimeInterface $joinAt): self
    {
        $this->joinAt = $joinAt;

        return $this;
    }

    public function getOriginalName(): ?string
    {
        return $this->originalName;
    }

    public function setOriginalName(?string $originalName): self
    {
        $this->originalName = $originalName;

        return $this;
    }

    public function getMimeType(): ?string
    {
        return $this->mimeType;
    }

    public function setMimeType(?string $mimeType): self
    {
        $this->mimeType = $mimeType;

        return $this;
    }

    public function getImageName(): ?string
    {
        return $this->imageName;
    }

    public function setImageName(?string $imageName): self
    {

        $this->imageName = $imageName;




        return $this;
    }

    public function getImageSize(): ?int
    {
        return $this->imageSize;
    }

    public function setImageSize(?int $imageSize): self
    {
        $this->imageSize = $imageSize;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getGroupe(): ?UsGroupe
    {
        return $this->groupe;
    }

    public function setGroupe(?UsGroupe $groupe): self
    {
        $this->groupe = $groupe;

        return $this;
    }

    public function getSolde(): ?GrsSoldeConge
    {
        return $this->solde;
    }

    public function setSolde(?GrsSoldeConge $solde): self
    {
        $this->solde = $solde;

        return $this;
    }

    /** @see \Serializable::serialize() */
    public function serialize()
    {
        return serialize([
            $this->id,
            $this->username,
            $this->password,
            // see section on salt below
            // $this->salt,
        ]);
    }

    /** @see \Serializable::unserialize() */
    public function unserialize($serialized)
    {
        list(
            $this->id,
            $this->username,
            $this->password,
            // see section on salt below
            // $this->salt
        ) = unserialize($serialized, ['allowed_classes' => false]);
    }

    public function getTele(): ?string
    {
        return $this->tele;
    }

    public function setTele(?string $tele): self
    {
        $this->tele = $tele;

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

    public function getTelePersonnel(): ?string
    {
        return $this->telePersonnel;
    }

    public function setTelePersonnel(?string $telePersonnel): self
    {
        $this->telePersonnel = $telePersonnel;

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

    public function getPays(): ?string
    {
        return $this->pays;
    }

    public function setPays(?string $pays): self
    {
        $this->pays = $pays;

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

    public function getSexe(): ?string
    {
        return $this->sexe;
    }

    public function setSexe(?string $sexe): self
    {
        $this->sexe = $sexe;

        return $this;
    }

    public function getSignature(): ?string
    {
        return $this->signature;
    }

    public function setSignature(?string $signature): self
    {
        $this->signature = $signature;

        return $this;
    }

    public function getProfilPorcentage()
    {

        $p = 30;
        if ($this->getnom()) {
            $p += 5;
        }
        if ($this->getEmail()) {
            $p += 5;
        }
        if ($this->getPrenom()) {
            $p += 5;
        }

        if ($this->getImageName()) {
            $p += 10;
        }

        if ($this->getSexe()) {
            $p += 5;
        }


        if ($this->getTelePersonnel()) {
            $p += 5;
        }
        if ($this->getTeleEntreprise()) {
            $p += 5;
        }


        if ($this->getPays()) {
            $p += 5;
        }

        if ($this->getVille()) {
            $p += 5;
        }

        if ($this->getAdresse()) {
            $p += 5;
        }

        if ($this->getTheme()) {
            $p += 20;
        }

        $background = "";
        $text = "";
        switch ($p) {
            case $p <= 30:
                $background = 'danger';
                $p1 = 100 - $p;
                $text = "veuillez compléter les informations de votre profil , il vous reste (<strong>" . $p1 . "%</strong>) pour finaliser votre profil.";
                break;
            case $p > 30 && $p <= 55:
                $background = 'warning';
                $p1 = 100 - $p;
                $text = "veuillez compléter les informations de votre profil , il vous reste (<strong>" . $p1 . "%</strong>) pour finaliser votre profil.";
                break;
            case $p > 55 && $p <= 79:
                $background = 'info';
                $text = "Votre profil il manque juste quelque informations. ";
                break;
            case $p > 79 && $p < 100:
                $background = 'success';
                $text = "Vous avez presque completez votre profil. ";
                break;

            case $p == 100:
                $background = 'success';
                $text = "Votre profil est complet , congratulations. ";
                break;
        }


        if ($p >= 100) {
            array('pourcentage' => 100, 'background' => $background, 'text' => $text);
        }


        return array('pourcentage' => $p, 'background' => $background, 'text' => $text);
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

    /**
     * @return Collection|UPResponsable[]
     */
    public function getUPResponsables(): Collection
    {
        return $this->uPResponsables;
    }

    public function addUPResponsable(UPResponsable $uPResponsable): self
    {
        if (!$this->uPResponsables->contains($uPResponsable)) {
            $this->uPResponsables[] = $uPResponsable;
            $uPResponsable->setUser($this);
        }

        return $this;
    }

    public function removeUPResponsable(UPResponsable $uPResponsable): self
    {
        if ($this->uPResponsables->contains($uPResponsable)) {
            $this->uPResponsables->removeElement($uPResponsable);
            // set the owning side to null (unless already changed)
            if ($uPResponsable->getUser() === $this) {
                $uPResponsable->setUser(null);
            }
        }

        return $this;
    }



    /**
     * @return Collection|PMarcheDet[]
     */
    public function getPMarcheDets(): Collection
    {
        return $this->pMarcheDets;
    }

    public function addPMarcheDet(PMarcheDet $pMarcheDet): self
    {
        if (!$this->pMarcheDets->contains($pMarcheDet)) {
            $this->pMarcheDets[] = $pMarcheDet;
            $pMarcheDet->setUserCreated($this);
        }

        return $this;
    }

    public function removePMarcheDet(PMarcheDet $pMarcheDet): self
    {
        if ($this->pMarcheDets->contains($pMarcheDet)) {
            $this->pMarcheDets->removeElement($pMarcheDet);
            // set the owning side to null (unless already changed)
            if ($pMarcheDet->getUserCreated() === $this) {
                $pMarcheDet->setUserCreated(null);
            }
        }

        return $this;
    }

    
    public function getUserAntennes(): Collection
    {
        return $this->userAntennes;
    }

    public function addUserAntenne(UserAntenne $userAntenne): self
    {
        if (!$this->userAntennes->contains($userAntenne)) {
            $this->userAntennes[] = $userAntenne;
            $userAntenne->setUser($this);
        }

        return $this;
    }

    public function removeUserAntenne(UserAntenne $userAntenne): self
    {
        if ($this->userAntennes->removeElement($userAntenne)) {
            // set the owning side to null (unless already changed)
            if ($userAntenne->getUser() === $this) {
                $userAntenne->setUser(null);
            }
        }

        return $this;
    }

}
