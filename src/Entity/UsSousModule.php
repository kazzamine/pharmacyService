<?php

namespace App\Entity;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\HttpFoundation\File\File;
//
/**
 *
 * @Vich\Uploadable
 */
#[ORM\Table(name: 'us_sous_module')]
#[ORM\Entity(repositoryClass: \App\Repository\UsSousModuleRepository::class)]
#[ORM\HasLifecycleCallbacks]
#[UniqueEntity(fields: ['module', 'prefix'], errorPath: 'prefix', message: 'Informations déjà utilisés.')]
class UsSousModule {

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    #[Assert\NotBlank]
    private $titre;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    #[Assert\NotBlank]
    private $abreviation;

    #[ORM\Column(type: 'text', nullable: true)]
    #[Assert\NotBlank]
    private $description;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $classCs;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $idCs;

    


    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    #[Assert\NotBlank]
    private $icon;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $route;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $routeInfo;

    #[ORM\Column(type: 'boolean', nullable: true)]
    private $active;

    #[ORM\Column(type: 'string', length: 50, nullable: true)]
    private $activeLink;

    #[ORM\Column(type: 'boolean', nullable: true)]
    private $linkDirect;


    #[ORM\Column(type: 'integer', nullable: true)]
    private $ordr;

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

    #[ORM\JoinColumn(name: 'theme_id', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \PGlobalParam::class)]
    private $theme;


    #[ORM\JoinColumn(name: 'user_created', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \User::class)]
    private $userCreated;

    #[ORM\JoinColumn(name: 'user_updated', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \User::class)]
    private $userUpdated;

    #[ORM\Column(type: 'string', length: 50, nullable: true)]
    #[Assert\NotBlank]
    private $prefix;

    #[ORM\JoinColumn(name: 'us_module_id', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \UsModule::class, inversedBy: 'sousModules')]
    private $module;

    #[ORM\OneToMany(targetEntity: \App\Entity\UsOperation::class, mappedBy: 'sousModule')]
    #[ORM\OrderBy(['id' => 'ASC'])]
    private $operations;

 
     
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
     * @Vich\UploadableField(mapping="sousModuleConfigFichier", fileNameProperty="image", size="imageSize")
     * 
     * @var File
     */
    private $imageFile;

    /**
     * @var string
     */
    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $image;

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

    public function setImage(?string $image): void {
        $this->image = $image;
    }

    public function getImage(): ?string {
        return $this->image;
    }

    public function setImageSize(?int $imageSize): void {
        $this->imageSize = $imageSize;
    }

    public function getImageSize(): ?int {
        return $this->imageSize;
    }


    public function __construct() {
        $this->operations = new ArrayCollection();
    }

    public function getId(): ?int {
        return $this->id;
    }

    public function getTitre(): ?string {
        return $this->titre;
    }

    public function setTitre(?string $titre): self {
        $this->titre = $titre;

        return $this;
    }

    public function getAbreviation(): ?string {
        return $this->abreviation;
    }

    public function setAbreviation(?string $abreviation): self {
        $this->abreviation = $abreviation;

        return $this;
    }

    public function getDescription(): ?string {
        return $this->description;
    }

    public function setDescription(?string $description): self {
        $this->description = $description;

        return $this;
    }

    public function getClassCs(): ?string {
        return $this->classCs;
    }

    public function setClassCs(?string $classCs): self {
        $this->classCs = $classCs;

        return $this;
    }

    public function getIdCs(): ?string {
        return $this->idCs;
    }

    public function setIdCs(?string $idCs): self {
        $this->idCs = $idCs;

        return $this;
    }



    public function getIcon(): ?string {
        return $this->icon;
    }

    public function setIcon(?string $icon): self {
        $this->icon = $icon;

        return $this;
    }

    public function getRoute(): ?string {
        return $this->route;
    }

    public function setRoute(?string $route): self {
        $this->route = $route;

        return $this;
    }

    public function getRouteInfo(): ?string {
        return $this->routeInfo;
    }

    public function setRouteInfo(string $routeInfo): self {
        $this->routeInfo = $routeInfo;

        return $this;
    }

    public function getActive(): ?bool {
        return $this->active;
    }

    public function setActive(?bool $active): self {
        $this->active = $active;

        return $this;
    }

    public function getLinkDirect(): ?bool {
        return $this->linkDirect;
    }

    public function setLinkDirect(?bool $linkDirect): self {
        $this->linkDirect = $linkDirect;

        return $this;
    }

    public function getCreated(): ?\DateTimeInterface {
        return $this->created;
    }

    public function setCreated(?\DateTimeInterface $created): self {
        $this->created = $created;

        return $this;
    }

    public function getUpdated(): ?\DateTimeInterface {
        return $this->updated;
    }

    public function setUpdated(?\DateTimeInterface $updated): self {
        $this->updated = $updated;

        return $this;
    }

    public function getUserCreated(): ?User {
        return $this->userCreated;
    }

    public function setUserCreated(?User $userCreated): self {
        $this->userCreated = $userCreated;

        return $this;
    }

    public function getUserUpdated(): ?User {
        return $this->userUpdated;
    }

    public function setUserUpdated(?User $userUpdated): self {
        $this->userUpdated = $userUpdated;

        return $this;
    }

    public function getModule(): ?UsModule {
        return $this->module;
    }

    public function setModule(?UsModule $module): self {
        $this->module = $module;

        return $this;
    }

    /**
     * @return Collection|UsOperation[]
     */
    public function getOperations(): Collection {
        return $this->operations;
    }

    public function addOperation(UsOperation $operation): self {
        if (!$this->operations->contains($operation)) {
            $this->operations[] = $operation;
            $operation->setSousModule($this);
        }

        return $this;
    }

    public function removeOperation(UsOperation $operation): self {
        if ($this->operations->contains($operation)) {
            $this->operations->removeElement($operation);
            // set the owning side to null (unless already changed)
            if ($operation->getSousModule() === $this) {
                $operation->setSousModule(null);
            }
        }

        return $this;
    }

    public function getPrefix(): ?string {
        return $this->prefix;
    }

    public function setPrefix(?string $prefix): self {
        $this->prefix = $prefix;

        return $this;
    }

   

    public function getActiveLink(): ?string {
        return $this->activeLink;
    }

    public function setActiveLink(?string $activeLink): self {
    
        $this->activeLink = $activeLink;

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


    public function getOrdr(): ?int
    {
        return $this->ordr;
    }

    public function setOrdr(?int $ordr): self
    {
        $this->ordr = $ordr;

        return $this;
    }


    public function getTheme(): ?PGlobalParam {
        return $this->theme;
    }

    public function setTheme(?PGlobalParam $theme): self {
        $this->theme = $theme;

        return $this;
    }
}
