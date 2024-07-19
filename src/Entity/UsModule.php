<?php

namespace App\Entity;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\HttpFoundation\File\File;
/**
 * 
 */
//
/**
 * @Vich\Uploadable
 */
#[ORM\Table(name: 'us_module')]
#[ORM\Entity(repositoryClass: \App\Repository\UsModuleRepository::class)]
#[ORM\HasLifecycleCallbacks]
#[UniqueEntity('prefix')]
class UsModule
{
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
    private $icon;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    #[Assert\NotBlank]
    private $route;
    
    #[ORM\Column(type: 'boolean', nullable: true)]
    private $routeWithParam;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $routeInfo;
    
    
    
    
    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $config;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    #[Assert\NotBlank]
    private $routeConfig;
    
    
    #[ORM\Column(type: 'text', nullable: true)]
    private $info;
    
    
    #[ORM\Column(type: 'string', length: 50, nullable: true)]
    #[Assert\NotBlank]
    private $prefix;

    #[ORM\Column(type: 'boolean', nullable: true)]
    private $active;
    
    
    
   #[ORM\Column(type: 'string', length: 50, nullable: true)]
    private $type;
    
    
     
    #[ORM\Column(type: 'string', length: 50, nullable: true)]
    private $typeId;
    
    
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
    
    
    #[ORM\JoinColumn(referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \UsSolution::class)]
    private $solution;
    
    
    
    #[ORM\OneToMany(targetEntity: \App\Entity\UsSousModule::class, mappedBy: 'module')]
    #[ORM\OrderBy(['id' => 'ASC'])]
    private $sousModules;

    #[ORM\Column(type: 'string', length: 100, nullable: true)]
    private $role;
    
      #[ORM\Column(type: 'string', length: 50, nullable: true)]
    private $activeLink;
    
    
//    /**
    //     * @ORM\ManyToMany(targetEntity="App\Entity\PDossier" ,cascade={"persist"})
    //     * @ORM\JoinTable(name="us_modules_dossiers")
    //     */
    //    private $ModulesDossiers;
    
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer', nullable: true)]
    private $ord;
    
    
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
     * @Vich\UploadableField(mapping="moduleConfigFichier", fileNameProperty="image", size="imageSize")
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

    #[ORM\ManyToMany(targetEntity: \App\Entity\UsParametrage::class, mappedBy: 'modules')]
    private $parametrages;

    #[ORM\Column(type: 'string', nullable: true, length: 255)]
    private $routeParam;

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
    
     public function __construct()
    {
        $this->sousModules = new ArrayCollection();
        //$this->ModulesDossiers = new ArrayCollection();
        $this->parametrages = new ArrayCollection();
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

    public function getClassCs(): ?string
    {
        return $this->classCs;
    }

    public function setClassCs(?string $classCs): self
    {
        $this->classCs = $classCs;

        return $this;
    }

    public function getIdCs(): ?string
    {
        return $this->idCs;
    }

    public function setIdCs(?string $idCs): self
    {
        $this->idCs = $idCs;

        return $this;
    }



    public function getIcon(): ?string
    {
        return $this->icon;
    }

    public function setIcon(?string $icon): self
    {
        $this->icon = $icon;

        return $this;
    }

    public function getRoute(): ?string
    {
        return $this->route;
    }

    public function setRoute(?string $route): self
    {
        $this->route = $route;

        return $this;
    }

    public function getRouteInfo(): ?string
    {
        return $this->routeInfo;
    }

    public function setRouteInfo(string $routeInfo): self
    {
        $this->routeInfo = $routeInfo;

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
     * @return Collection|UsSousModule[]
     */
    public function getSousModules(): Collection
    {
        return $this->sousModules;
    }

    public function addSousModule(UsSousModule $sousModule): self
    {
        if (!$this->sousModules->contains($sousModule)) {
            $this->sousModules[] = $sousModule;
            $sousModule->setModule($this);
        }

        return $this;
    }

    public function removeSousModule(UsSousModule $sousModule): self
    {
        if ($this->sousModules->contains($sousModule)) {
            $this->sousModules->removeElement($sousModule);
            // set the owning side to null (unless already changed)
            if ($sousModule->getModule() === $this) {
                $sousModule->setModule(null);
            }
        }

        return $this;
    }

    public function getRole(): ?string
    {
        return $this->role;
    }

    public function setRole(?string $role): self
    {
        $this->role = $role;

        return $this;
    }

    public function getPrefix(): ?string
    {
        return $this->prefix;
    }

    public function setPrefix(?string $prefix): self
    {
        $this->prefix = $prefix;

        return $this;
    }

    public function getConfig(): ?string
    {
        return $this->config;
    }

    public function setConfig(?string $config): self
    {
        $this->config = $config;

        return $this;
    }

    public function getRouteConfig(): ?string
    {
        return $this->routeConfig;
    }

    public function setRouteConfig(?string $routeConfig): self
    {
        $this->routeConfig = $routeConfig;

        return $this;
    }

    public function getInfo(): ?string
    {
        return $this->info;
    }

    public function setInfo(?string $info): self
    {
        $this->info = $info;

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

    public function getTypeId(): ?string
    {
        return $this->typeId;
    }

    public function setTypeId(?string $typeId): self
    {
        $this->typeId = $typeId;

        return $this;
    }

//    /**
//     * @return Collection|PDossier[]
//     */
//    public function getModulesDossiers(): Collection
//    {
//        return $this->ModulesDossiers;
//    }
//
//    public function addModulesDossier(PDossier $modulesDossier): self
//    {
//        if (!$this->ModulesDossiers->contains($modulesDossier)) {
//            $this->ModulesDossiers[] = $modulesDossier;
//        }
//
//        return $this;
//    }
//
//    public function removeModulesDossier(PDossier $modulesDossier): self
//    {
//        if ($this->ModulesDossiers->contains($modulesDossier)) {
//            $this->ModulesDossiers->removeElement($modulesDossier);
//        }
//
//        return $this;
//    }
//
//    public function __toString(){
//        return $this->ModulesDossiers;
//    }

    public function getRouteWithParam(): ?bool
    {
        return $this->routeWithParam;
    }

    public function setRouteWithParam(?bool $routeWithParam): self
    {
        $this->routeWithParam = $routeWithParam;

        return $this;
    }

    public function getOrd(): ?int
    {
        return $this->ord;
    }

    public function setOrd(?int $ord): self
    {
        $this->ord = $ord;

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

    /**
     * @return Collection|UsParametrage[]
     */
    public function getParametrages(): Collection
    {
        return $this->parametrages;
    }

    public function addParametrage(UsParametrage $parametrage): self
    {
        if (!$this->parametrages->contains($parametrage)) {
            $this->parametrages[] = $parametrage;
            $parametrage->addModule($this);
        }

        return $this;
    }

    public function removeParametrage(UsParametrage $parametrage): self
    {
        if ($this->parametrages->contains($parametrage)) {
            $this->parametrages->removeElement($parametrage);
            $parametrage->removeModule($this);
        }

        return $this;
    }

    public function getRouteParam(): ?string
    {
        return $this->routeParam;
    }

    public function setRouteParam(string $routeParam): self
    {
        $this->routeParam = $routeParam;

        return $this;
    }

    public function getSolution(): ?UsSolution
    {
        return $this->solution;
    }

    public function setSolution(?UsSolution $solution): self
    {
        $this->solution = $solution;

        return $this;
    }
    
     public function getActiveLink(): ?string {
        return $this->activeLink;
    }

    public function setActiveLink(?string $activeLink): self {
        $this->activeLink = $activeLink;

        return $this;
    }
}
