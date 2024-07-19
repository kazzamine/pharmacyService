<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Vich\UploaderBundle\Naming\UniqidNamer;

/**
 * @Vich\Uploadable
 */
#[ORM\Entity(repositoryClass: \App\Repository\TaTacheRepository::class)]
#[ORM\HasLifecycleCallbacks]
class TaTache
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;
    
    
     /**
     * @var string
     *
     *
     */
    #[ORM\Column(name: 'titre', type: 'string', length: 255, nullable: true)]
    #[Assert\NotBlank]
    private $titre;

    /**
     * @var string
     *
     */
    #[Assert\NotBlank]
    #[Assert\Length(min: 10, minMessage: 'Votre Text est  trop court ')]
    #[ORM\Column(name: 'text', type: 'text', nullable: true)]
    private $text;

    /**
     * @var string
     */
    #[ORM\Column(name: 'description_admin', type: 'text', nullable: true)]
    private $descriptionAdmin;

    /**
     * @var string
     */
    #[ORM\Column(name: 'date_debut', type: 'date', nullable: true)]
    private $dateDebut;

    /**
     * @var string
     */
    #[ORM\Column(name: 'date_fin', type: 'date', nullable: true)]
    private $dateFin;

    /**
     * @var string
     */
    #[ORM\Column(name: 'notification', type: 'boolean', nullable: true)]
    private $notification;

    /**
     * @var string
     */
    #[ORM\Column(name: 'ferme', type: 'boolean', nullable: true)]
    private $ferme;

    
    #[ORM\JoinColumn(name: 'priorite_id', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \TaPriorite::class)]
    private $priorite;

    
    #[ORM\JoinColumn(name: 'projet_module_id', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \TaProjetModule::class)]
    private $module;

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

    #[ORM\JoinColumn(name: 'user_created', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \User::class)]
    private $userCreated;

    #[ORM\JoinColumn(name: 'user_updated', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \User::class)]
    private $userUpdated;

    #[ORM\JoinTable(name: 'taches_users')]
    #[ORM\ManyToMany(targetEntity: \User::class, inversedBy: 'taches')]
    private $users;

    
    #[ORM\JoinColumn(name: 'projet_id', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \TaProjet::class, inversedBy: 'taches', cascade: ['persist', 'remove'])]
    private $projet;

    #[ORM\OneToMany(targetEntity: \TaTacheFile::class, mappedBy: 'tache')]
    private $tachFiles;
    
    #[ORM\OneToMany(targetEntity: \TaCommentaire::class, mappedBy: 'tache')]
    private $commentaires;
    
    
    
     #[ORM\OneToMany(targetEntity: \TaNotification::class, mappedBy: 'tache')]
    private $notifications;
    
    
    
    /**
     * @var string
     *
     *
     *
     *
     */
    #[ORM\Column(name: 'original_name', type: 'string', length: 255, nullable: true)]
    private $originalName;
    
    
    
      /**
     *
     *
     * @Vich\UploadableField(mapping="major_image", fileNameProperty="imageName")
     * @var File
     */
    #[Assert\File(maxSize: '5000K', mimeTypes: ['image/jpeg', 'image/gif', 'image/png', 'application/zip', 'application/x-rar', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'application/vnd.ms-excel', 'application/pdf', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'application/vnd.ms-powerpoint', 'application/vnd.openxmlformats-officedocument.presentationml.presentation'], mimeTypesMessage: "Impossible de lire le fichier. Le format n'est pas pris en charge ")] // NOTE: This is not a mapped field of entity metadata, just a simple property.
    private $imageFile;

    /**
     * @var string
     */
    #[ORM\Column(name: 'image_name', type: 'string', nullable: true)]
    private $imageName;

    /**
     * @var \DateTime
     */
    #[ORM\Column(type: 'datetime', nullable: true)]
    private $updatedAt;

    public function setImageFile($image = null) {
        $this->imageFile = $image;

        if (null !== $image) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt = new \DateTimeImmutable();
        }
    }
     public function getImageFile() {
        return $this->imageFile;
    }
    
    
    

    public function __construct() {
        $this->users = new \Doctrine\Common\Collections\ArrayCollection();
        $this->tachFiles = new \Doctrine\Common\Collections\ArrayCollection();
        $this->commentaires = new \Doctrine\Common\Collections\ArrayCollection();
              $this->notifications = new \Doctrine\Common\Collections\ArrayCollection();
    }

    #[ORM\PrePersist]
    public function setCreatedValue() {

        $this->created = new \DateTime();
    }

    #[ORM\PreUpdate]
    public function setUpdatedValue() {
        $this->updated = new \DateTime();
    }


    public function getId(): ?int
    {
        return $this->id;
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

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(?string $text): self
    {
        $this->text = $text;

        return $this;
    }

    public function getDescriptionAdmin(): ?string
    {
        return $this->descriptionAdmin;
    }

    public function setDescriptionAdmin(?string $descriptionAdmin): self
    {
        $this->descriptionAdmin = $descriptionAdmin;

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

    public function getNotification(): ?bool
    {
        return $this->notification;
    }

    public function setNotification(?bool $notification): self
    {
        $this->notification = $notification;

        return $this;
    }

    public function getFerme(): ?bool
    {
        return $this->ferme;
    }

    public function setFerme(?bool $ferme): self
    {
        $this->ferme = $ferme;

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

    public function getOriginalName(): ?string
    {
        return $this->originalName;
    }

    public function setOriginalName(?string $originalName): self
    {
        $this->originalName = $originalName;

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

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getPriorite(): ?TaPriorite
    {
        return $this->priorite;
    }

    public function setPriorite(?TaPriorite $priorite): self
    {
        $this->priorite = $priorite;

        return $this;
    }

    public function getModule(): ?TaProjetModule
    {
        return $this->module;
    }

    public function setModule(?TaProjetModule $module): self
    {
        $this->module = $module;

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
     * @return Collection|User[]
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(User $user): self
    {
        if (!$this->users->contains($user)) {
            $this->users[] = $user;
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->users->contains($user)) {
            $this->users->removeElement($user);
        }

        return $this;
    }

    public function getProjet(): ?TaProjet
    {
        return $this->projet;
    }

    public function setProjet(?TaProjet $projet): self
    {
        $this->projet = $projet;

        return $this;
    }

    /**
     * @return Collection|TaTacheFile[]
     */
    public function getTachFiles(): Collection
    {
        return $this->tachFiles;
    }

    public function addTachFile(TaTacheFile $tachFile): self
    {
        if (!$this->tachFiles->contains($tachFile)) {
            $this->tachFiles[] = $tachFile;
            $tachFile->setTache($this);
        }

        return $this;
    }

    public function removeTachFile(TaTacheFile $tachFile): self
    {
        if ($this->tachFiles->contains($tachFile)) {
            $this->tachFiles->removeElement($tachFile);
            // set the owning side to null (unless already changed)
            if ($tachFile->getTache() === $this) {
                $tachFile->setTache(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|TaCommentaire[]
     */
    public function getCommentaires(): Collection
    {
        return $this->commentaires;
    }

    public function addCommentaire(TaCommentaire $commentaire): self
    {
        if (!$this->commentaires->contains($commentaire)) {
            $this->commentaires[] = $commentaire;
            $commentaire->setTache($this);
        }

        return $this;
    }

    public function removeCommentaire(TaCommentaire $commentaire): self
    {
        if ($this->commentaires->contains($commentaire)) {
            $this->commentaires->removeElement($commentaire);
            // set the owning side to null (unless already changed)
            if ($commentaire->getTache() === $this) {
                $commentaire->setTache(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|TaNotification[]
     */
    public function getNotifications(): Collection
    {
        return $this->notifications;
    }

    public function addNotification(TaNotification $notification): self
    {
        if (!$this->notifications->contains($notification)) {
            $this->notifications[] = $notification;
            $notification->setTache($this);
        }

        return $this;
    }

    public function removeNotification(TaNotification $notification): self
    {
        if ($this->notifications->contains($notification)) {
            $this->notifications->removeElement($notification);
            // set the owning side to null (unless already changed)
            if ($notification->getTache() === $this) {
                $notification->setTache(null);
            }
        }

        return $this;
    }
}
