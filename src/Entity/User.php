<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity]
#[ORM\Table(name: "puser")]
#[UniqueEntity(fields: ["email"])]
#[Vich\Uploadable]
#[ORM\HasLifecycleCallbacks]
class User implements UserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    private $id;



    #[ORM\Column(type: "boolean", nullable: true)]
    private $type = false;

    #[ORM\Column(name: "cmd_pharmacie", type: "boolean", nullable: true)]
    private $cmdPharmacie = false;

    #[ORM\Column(name: "menu_position", type: "boolean", nullable: true)]
    private $menuPosition = false;

    #[ORM\Column(name: "username", type: "string", length: 150, unique: true)]
    #[Assert\NotBlank]
    private $username;

    #[ORM\Column(name: "password", type: "string", length: 255, nullable: true)]
    #[Assert\Length(min: 6, minMessage: "Minimum 6 caractères")]
    private $password;

    #[Assert\Length(min: 6, minMessage: "Minimum 6 caractères")]
    private $plainPassword;

    #[ORM\Column(name: "nom", type: "string", length: 150, nullable: true)]
    #[Assert\NotBlank]
    private $nom;

    #[ORM\Column(name: "prenom", type: "string", length: 150, nullable: true)]
    #[Assert\NotBlank]
    private $prenom;



    #[ORM\Column(name: "join_at", type: "datetime", nullable: true)]
    private $joinAt;

    #[ORM\Column(type: "array", nullable: true)]
    private $roles = [];

    #[ORM\Column(name: "email", type: "string", length: 255, unique: true, nullable: true)]
    #[Assert\Email(message: "email.error")]
    #[Assert\NotBlank]
    private $email;

    #[ORM\Column(name: "is_active", type: "boolean", nullable: true)]
    private $isActive;

    #[ORM\Column(name: "theme", type: "string", length: 150, nullable: true)]
    private $theme;

    #[ORM\Column(name: "created", type: "datetime", nullable: true)]
    private $created;

    #[ORM\Column(name: "updated", type: "datetime", nullable: true)]
    private $updated;


    #[ORM\ManyToOne(targetEntity: User::class)]
    #[ORM\JoinColumn(name: "user_created", referencedColumnName: "id")]
    private $userCreated;

    #[ORM\ManyToOne(targetEntity: User::class)]
    #[ORM\JoinColumn(name: "user_updated", referencedColumnName: "id")]
    private $userUpdated;

    #[ORM\Column(type: "string", length: 255, nullable: true)]
    private $originalName;

    #[ORM\Column(type: "string", length: 255, nullable: true)]
    private $mimeType;

    #[Vich\UploadableField(mapping: "userProfil", fileNameProperty: "imageName", size: "imageSize")]
    private $imageFile;

    #[ORM\Column(type: "string", length: 255, nullable: true)]
    private $imageName;

    #[ORM\Column(type: "integer", nullable: true)]
    private $imageSize;

    #[ORM\Column(type: "datetime", nullable: true)]
    private $updatedAt;

    #[ORM\Column(type: "string", length: 100, nullable: true)]
    private $tele;

    #[ORM\Column(type: "text", nullable: true)]
    private $adresse;

    #[ORM\Column(type: "string", length: 255, nullable: true)]
    private $telePersonnel;

    #[ORM\Column(type: "string", length: 255, nullable: true)]
    private $teleEntreprise;

    #[ORM\Column(type: "string", length: 255, nullable: true)]
    private $pays;

    #[ORM\Column(type: "string", length: 255, nullable: true)]
    private $ville;

    #[ORM\Column(type: "string", length: 255, nullable: true)]
    private $sexe;

    #[ORM\Column(type: "text", nullable: true)]
    private $signature;


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
    public function getUserIdentifier(): string
    {
        return (string) $this->username;
    }
    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;
        return $this;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getPlainPassword()
    {
        return $this->plainPassword;
    }

    public function setPlainPassword($plainPassword)
    {
        $this->plainPassword = $plainPassword;
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

    public function getGroupe(): ?UsGroupe
    {
        return $this->groupe;
    }

    public function setGroupe(?UsGroupe $groupe): self
    {
        $this->groupe = $groupe;
        return $this;
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

    public function getRoles(): array
    {
        $roles = $this->roles;
        $roles[] = 'ROLE_USER'; // Ensure every user has ROLE_USER role
        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;
        return $this;
    }

    public function getSalt()
    {
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

    public function getIsActive(): ?bool
    {
        return $this->isActive;
    }

    public function setIsActive(?bool $isActive): self
    {
        $this->isActive = $isActive;
        return $this;
    }

    public function getTheme(): ?string
    {
        return $this->theme;
    }

    public function setTheme(?string $theme): self
    {
        $this->theme = $theme;
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

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;
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

    public function getUserCreated(): ?self
    {
        return $this->userCreated;
    }

    public function setUserCreated(?self $userCreated): self
    {
        $this->userCreated = $userCreated;
        return $this;
    }

    public function getUserUpdated(): ?self
    {
        return $this->userUpdated;
    }

    public function setUserUpdated(?self $userUpdated): self
    {
        $this->userUpdated = $userUpdated;
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

    public function getImageFile(): ?File
    {
        return $this->imageFile;
    }

    public function setImageFile(?File $imageFile = null): self
    {
        $this->imageFile = $imageFile;
        if ($imageFile) {
            // It's required that at least one field changes if you are using Doctrine,
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt = new \DateTimeImmutable();
        }
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

    public function getPoste(): ?PPoste
    {
        return $this->poste;
    }

    public function setPoste(?PPoste $poste): self
    {
        $this->poste = $poste;
        return $this;
    }

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
        if ($this->uPResponsables->removeElement($uPResponsable)) {
            // set the owning side to null (unless already changed)
            if ($uPResponsable->getUser() === $this) {
                $uPResponsable->setUser(null);
            }
        }

        return $this;
    }

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
        if ($this->pMarcheDets->removeElement($pMarcheDet)) {
            // set the owning side to null (unless already changed)
            if ($pMarcheDet->getUserCreated() === $this) {
                $pMarcheDet->setUserCreated(null);
            }
        }

        return $this;
    }

    public function __construct()
    {
        $this->userAntennes = new ArrayCollection();
        $this->uPResponsables = new ArrayCollection();
        $this->pMarcheDets = new ArrayCollection();
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


    public function eraseCredentials():void
    {
        // Implement it if needed
    }
}
