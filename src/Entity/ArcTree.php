<?php

namespace App\Entity;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * SaveTree
 */
#[ORM\Table(name: 'arc_tree')]
#[ORM\Entity(repositoryClass: \App\Repository\TreeRepository::class)]
class ArcTree {

    /**
     * @var string
     */
    #[ORM\Column(name: 'id', type: 'integer')]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    private $id;

    /**
     * @var string
     *
     *
     */
    #[ORM\Column(name: 'tree_id', type: 'string', length: 255, nullable: false, unique: false)]
    private $TreeId;

    /**
     * @var string
     */
    #[ORM\Column(name: 'text', type: 'string', length: 255, nullable: false)]
    private $text;

    /**
     * @var string
     */
    #[ORM\Column(name: 'parent', type: 'string', length: 255, nullable: false)]
    private $parent;

    /**
     * @var string
     */
    #[ORM\Column(name: 'icon', type: 'string', length: 255, nullable: false)]
    private $icon;

    /**
     * @var string
     */
    #[ORM\Column(name: 'user', type: 'string', length: 255, nullable: true)]
    private $user ;

    /**
     * @var \DateTime
     */
    #[ORM\Column(name: 'date_creation', type: 'datetime', nullable: true)]
    private $dateCreation ;

    /**
     * @var string
     */
    #[ORM\Column(name: 'type', type: 'string', length: 255, nullable: true)]
    private $type;

    /**
     * @var string
     */
    #[ORM\Column(name: 'status', type: 'string', length: 255, nullable: true)]
    private $status;

    /**
     * @var string
     */
    #[ORM\Column(name: 'role_user_dossier_visible', type: 'boolean', nullable: true)]
    private $roleUserDossierVisible;

    /**
     * @var string
     */
    #[ORM\Column(name: 'role_user_dossier_actions', type: 'simple_array', nullable: true)]
    private $roleUserDossierActions;
    
    
    
    /**
     * @var string
     */
    #[ORM\Column(name: 'role_responsable_dossier_visible', type: 'boolean', nullable: true)]
    private $roleResponsableDossierVisible;

    /**
     * @var string
     */
    #[ORM\Column(name: 'role_responsable_dossier_actions', type: 'simple_array', nullable: true)]
    private $roleResponsableDossierActions;
    
    
    
    

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
    #[ORM\ManyToOne(targetEntity: \User::class, inversedBy: 'saveTreesUpdated')]
    private $userUpdated;

    #[ORM\JoinColumn(name: 'projet_id', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \ArcProjet::class, inversedBy: 'saveTrees')]
    private $projet;

    #[ORM\OneToMany(targetEntity: \ArcNotification::class, mappedBy: 'saveTree')]
    private $notifications;
    
    
    
    
    
    
    

    public function __construct() {
        $this->notifications = new ArrayCollection();
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

    public function getTreeId(): ?string
    {
        return $this->TreeId;
    }

    public function setTreeId(string $TreeId): self
    {
        $this->TreeId = $TreeId;

        return $this;
    }

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(string $text): self
    {
        $this->text = $text;

        return $this;
    }

    public function getParent(): ?string
    {
        return $this->parent;
    }

    public function setParent(string $parent): self
    {
        $this->parent = $parent;

        return $this;
    }

    public function getIcon(): ?string
    {
        return $this->icon;
    }

    public function setIcon(string $icon): self
    {
        $this->icon = $icon;

        return $this;
    }

    public function getUser(): ?string
    {
        return $this->user;
    }

    public function setUser(?string $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getDateCreation(): ?\DateTimeInterface
    {
        return $this->dateCreation;
    }

    public function setDateCreation(?\DateTimeInterface $dateCreation): self
    {
        $this->dateCreation = $dateCreation;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(?string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(?string $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getRoleUserDossierVisible(): ?bool
    {
        return $this->roleUserDossierVisible;
    }

    public function setRoleUserDossierVisible(?bool $roleUserDossierVisible): self
    {
        $this->roleUserDossierVisible = $roleUserDossierVisible;

        return $this;
    }

    public function getRoleUserDossierActions(): ?array
    {
        return $this->roleUserDossierActions;
    }

    public function setRoleUserDossierActions(?array $roleUserDossierActions): self
    {
        $this->roleUserDossierActions = $roleUserDossierActions;

        return $this;
    }

    public function getRoleResponsableDossierVisible(): ?bool
    {
        return $this->roleResponsableDossierVisible;
    }

    public function setRoleResponsableDossierVisible(?bool $roleResponsableDossierVisible): self
    {
        $this->roleResponsableDossierVisible = $roleResponsableDossierVisible;

        return $this;
    }

    public function getRoleResponsableDossierActions(): ?array
    {
        return $this->roleResponsableDossierActions;
    }

    public function setRoleResponsableDossierActions(?array $roleResponsableDossierActions): self
    {
        $this->roleResponsableDossierActions = $roleResponsableDossierActions;

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

    public function getProjet(): ?ArcProjet
    {
        return $this->projet;
    }

    public function setProjet(?ArcProjet $projet): self
    {
        $this->projet = $projet;

        return $this;
    }

    /**
     * @return Collection|ArcNotification[]
     */
    public function getNotifications(): Collection
    {
        return $this->notifications;
    }

    public function addNotification(ArcNotification $notification): self
    {
        if (!$this->notifications->contains($notification)) {
            $this->notifications[] = $notification;
            $notification->setSaveTree($this);
        }

        return $this;
    }

    public function removeNotification(ArcNotification $notification): self
    {
        if ($this->notifications->contains($notification)) {
            $this->notifications->removeElement($notification);
            // set the owning side to null (unless already changed)
            if ($notification->getSaveTree() === $this) {
                $notification->setSaveTree(null);
            }
        }

        return $this;
    }

  
  
}
