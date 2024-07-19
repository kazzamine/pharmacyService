<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @Vich\Uploadable
 */
#[ORM\Entity(repositoryClass: \App\Repository\UvCommandecabFichierRepository::class)]
#[ORM\HasLifecycleCallbacks]
class UvCommandecabFichier {

    
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\ManyToOne(targetEntity: \App\Entity\UvCommandecab::class, inversedBy: 'fichiers')]
    private $commande;

    /**
     *
     * @var \DateTime
     *
     *
     */
    #[ORM\Column(name: 'created', type: 'datetime', nullable: true)]
    private $created;

    

    #[ORM\JoinColumn(name: 'user_created', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \User::class)]
    private $userCreated;

    

    #[ORM\PrePersist]
    public function setCreatedValue() {

        $this->created = new \DateTime();
    }

    #[ORM\PreUpdate]
    public function setUpdatedValue() {
        $this->updated = new \DateTime();
    }

    
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
     * @Vich\UploadableField(mapping="ugouvVenteCommandeFichier", fileNameProperty="imageName", size="imageSize")
     * 
     * @var File
     */
    private $imageFile;

    /**
     * @var string
     */
    #[ORM\Column(type: 'string', length: 255)]
    private $imageName;

    /**
     * @var integer
     */
    #[ORM\Column(type: 'integer')]
    private $imageSize;

    /**
     * @var \DateTime
     */
    #[ORM\Column(type: 'datetime')]
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
        
    }

    public function getId(): ?int {
        return $this->id;
    }

 
    public function getCreated(): ?\DateTimeInterface {
        return $this->created;
    }

    public function setCreated(?\DateTimeInterface $created): self {
        $this->created = $created;

        return $this;
    }

 

    public function getUpdatedAt(): ?\DateTimeInterface {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeInterface $updatedAt): self {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getUserCreated(): ?User {
        return $this->userCreated;
    }

    public function setUserCreated(?User $userCreated): self {
        $this->userCreated = $userCreated;

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

    public function getCommande(): ?UvCommandecab
    {
        return $this->commande;
    }

    public function setCommande(?UvCommandecab $commande): self
    {
        $this->commande = $commande;

        return $this;
    }

  
  

}
