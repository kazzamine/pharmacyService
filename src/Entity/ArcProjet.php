<?php

namespace App\Entity;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * projet
 * @Vich\Uploadable
 *
 *
 *
 *
 */
#[ORM\Table(name: 'arc_projet')]
#[ORM\HasLifecycleCallbacks]
#[ORM\Entity]
#[UniqueEntity(fields: ['intitule', 'designation'])]
class ArcProjet {

    /**
     * @var int
     */
    #[ORM\Column(name: 'id', type: 'integer')]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    private $id;

    /**
     * @var string
     */
    #[Assert\NotBlank]
    #[ORM\Column(name: 'intitule', type: 'string', length: 255, unique: true, nullable: false)]
    private $intitule;

    /**
     * @var string
     */
    #[Assert\NotBlank]
    #[ORM\Column(name: 'designation', type: 'string', length: 255, nullable: true)]
    private $designation;

    /**
     * @var string
     */
    #[Assert\NotBlank]
    #[ORM\Column(name: 'abreviation', type: 'string', length: 100, nullable: true)]
    private $abreviation;

    /**
     * @var string
     */
    #[ORM\Column(name: 'description', type: 'text', nullable: true)]
    private $description;

    /**
     * @var string
     */
    #[ORM\Column(name: 'logo', type: 'string', length: 255, nullable: true)]
    private $logo;

    /**
     * @var string
     */
    #[ORM\Column(name: 'description_detail', type: 'text', nullable: true)]
    private $descriptionDetail;

    /**
     *
     * @var \DateTime
     *
     *
     *
     */
    #[Assert\Date]
    #[ORM\Column(name: 'date_debut', type: 'datetime', nullable: true)]
    private $dateDebut;

    /**
     *
     * @var \DateTime
     */
    #[Assert\Date]
    #[ORM\Column(name: 'date_fin', type: 'datetime', nullable: true)]
    private $dateFin;

    /**
     * @var float|null
     */
    #[Assert\Positive]
    #[ORM\Column(name: 'montant', type: 'float', nullable: true)]
    private $estimationFinanciere;

   
    
    

    
    

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

    #[ORM\JoinColumn(name: 'statut_id', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \DefStatut::class)]
    private $statut;

    #[ORM\JoinColumn(name: 'client_id', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \ArcClient::class, inversedBy: 'projets')]
    private $client;

    #[ORM\JoinColumn(name: 'default_tree_cab_id', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \ArcTreeCab::class)]
    private $defaultTreeCab;

    #[ORM\JoinColumn(name: 'user_created', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \User::class, inversedBy: 'projetsCreated')]
    private $userCreated;

    #[ORM\JoinColumn(name: 'user_updated', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \User::class, inversedBy: 'projetsUpdated')]
    private $userUpdated;

    #[ORM\OneToMany(targetEntity: \ArcTree::class, mappedBy: 'projet')]
    private $saveTrees;
    
    
    
     /**
     * @var array
     */
    #[ORM\Column(name: 'notification_users_list', type: 'json', nullable: true)]
    private $notificationUsersList;


    
    
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
     * @Vich\UploadableField(mapping="moduleArchiveFichier", fileNameProperty="imageName", size="imageSize")
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

    /**
     * If manually uploading a file (i.e. not using Symfony Form) ensure an instance
     * of 'UploadedFile' is injected into this setter to trigger the update. If this
     * bundle's configuration parameter 'inject_on_load' is set to 'true' this setter
     * must be able to accept an instance of 'File' as the bundle will inject one here
     * during Doctrine hydration.
     *
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile $imageFile
     */
    public function setImageFile(?File $imageFile = null): void {
        $this->imageFile = $imageFile;

        if (null !== $imageFile) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt = new \DateTimeImmutable();
        }
    }

    public function getImageFile(): ?File {
        return $this->imageFile;
    }

    public function setImageName(?string $imageName): void {
        $this->imageName = $imageName;
    }

    public function getImageName(): ?string {
        return $this->imageName;
    }

    public function setImageSize(?int $imageSize): void {
        $this->imageSize = $imageSize;
    }

    public function getImageSize(): ?int {
        return $this->imageSize;
    }

    public function __construct() {
        $this->saveTrees = new ArrayCollection();
      
         
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIntitule(): ?string
    {
        return $this->intitule;
    }

    public function setIntitule(string $intitule): self
    {
        $this->intitule = $intitule;

        return $this;
    }

    public function getDesignation(): ?string
    {
        return $this->designation;
    }

    public function setDesignation(?string $designation): self
    {
        $this->designation = $designation;

        return $this;
    }

    public function getAbreviation(): ?string
    {
        return $this->abreviation;
    }

    public function setAbreviation(?string $abreviation): self
    {
        $this->abreviation = $abreviation;

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

    public function getLogo(): ?string
    {
        return $this->logo;
    }

    public function setLogo(?string $logo): self
    {
        $this->logo = $logo;

        return $this;
    }

    public function getDescriptionDetail(): ?string
    {
        return $this->descriptionDetail;
    }

    public function setDescriptionDetail(?string $descriptionDetail): self
    {
        $this->descriptionDetail = $descriptionDetail;

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

    public function getEstimationFinanciere(): ?float
    {
        return $this->estimationFinanciere;
    }

    public function setEstimationFinanciere(float $estimationFinanciere): self
    {
        $this->estimationFinanciere = $estimationFinanciere;

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

    public function getNotificationUsersList(): ?array
    {
        return $this->notificationUsersList;
    }

    public function setNotificationUsersList(?array $notificationUsersList): self
    {
        $this->notificationUsersList = $notificationUsersList;

        return $this;
    }

    public function getStatut(): ?DefStatut
    {
        return $this->statut;
    }

    public function setStatut(?DefStatut $statut): self
    {
        $this->statut = $statut;

        return $this;
    }

    public function getClient(): ?ArcClient
    {
        return $this->client;
    }

    public function setClient(?ArcClient $client): self
    {
        $this->client = $client;

        return $this;
    }

    public function getDefaultTreeCab(): ?ArcTreeCab
    {
        return $this->defaultTreeCab;
    }

    public function setDefaultTreeCab(?ArcTreeCab $defaultTreeCab): self
    {
        $this->defaultTreeCab = $defaultTreeCab;

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
     * @return Collection|ArcTree[]
     */
    public function getSaveTrees(): Collection
    {
        return $this->saveTrees;
    }

    public function addSaveTree(ArcTree $saveTree): self
    {
        if (!$this->saveTrees->contains($saveTree)) {
            $this->saveTrees[] = $saveTree;
            $saveTree->setProjet($this);
        }

        return $this;
    }

    public function removeSaveTree(ArcTree $saveTree): self
    {
        if ($this->saveTrees->contains($saveTree)) {
            $this->saveTrees->removeElement($saveTree);
            // set the owning side to null (unless already changed)
            if ($saveTree->getProjet() === $this) {
                $saveTree->setProjet(null);
            }
        }

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

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

   
  
    
 
}
