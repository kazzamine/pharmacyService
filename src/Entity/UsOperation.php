<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;


#[ORM\Table(name: 'us_operation')]
#[ORM\Entity(repositoryClass: \App\Repository\UsOperationRepository::class)]
#[ORM\HasLifecycleCallbacks]
#[UniqueEntity(fields: ['sousModule', 'prefix'], errorPath: 'prefix', message: 'Informations déjà utilisés.')]
class UsOperation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;
    
    
     
    
     #[ORM\Column(type: 'string', length: 255, nullable: true)]
    #[Assert\NotBlank]
    private $titre;

    
    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $abreviation;

    
    #[ORM\Column(type: 'text', nullable: true)]
    private $description;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $classCs;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $idCs;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $image;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    #[Assert\NotBlank]
    private $icon;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    #[Assert\NotBlank]
    private $route;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $routeInfo;

    #[ORM\Column(type: 'boolean', nullable: true)]
    private $active;
    
    
    
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
    
     
    
    #[ORM\JoinColumn(name: 'us_sous_module_id', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \UsSousModule::class, inversedBy: 'operations')]
    private $sousModule;
    
    #[ORM\Column(type: 'string', length: 50, nullable: true)]
    #[Assert\NotBlank]
    private $prefix;
    
    
        
    #[ORM\Column(type: 'boolean', nullable: true)]
    private $horizontale;
    
       #[ORM\Column(type: 'boolean', nullable: true)]
    private $isIndex;
    
    
    #[ORM\Column(type: 'boolean', nullable: true)]
    private $verticale;
    
      #[ORM\Column(type: 'boolean', nullable: true)]
    private $eachRow;
    
     #[ORM\Column(type: 'boolean', nullable: true)]
    private $multiple;

    
    #[ORM\Column(type: 'string', length: 50, nullable: true)]
    private $type;
    
    
    #[ORM\Column(type: 'boolean', nullable: true)]
    private $routeWithParam;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $ordr;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $parent;

    
    
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

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

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

    public function getSousModule(): ?UsSousModule
    {
        return $this->sousModule;
    }

    public function setSousModule(?UsSousModule $sousModule): self
    {
        $this->sousModule = $sousModule;

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

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(?string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getHorizontale(): ?bool
    {
        return $this->horizontale;
    }

    public function setHorizontale(?bool $horizontale): self
    {
        $this->horizontale = $horizontale;

        return $this;
    }

    public function getVerticale(): ?bool
    {
        return $this->verticale;
    }

    public function setVerticale(?bool $verticale): self
    {
        $this->verticale = $verticale;

        return $this;
    }

    public function getMultiple(): ?bool
    {
        return $this->multiple;
    }

    public function setMultiple(?bool $multiple): self
    {
        $this->multiple = $multiple;

        return $this;
    }

    public function getRouteWithParam(): ?bool
    {
        return $this->routeWithParam;
    }

    public function setRouteWithParam(?bool $routeWithParam): self
    {
        $this->routeWithParam = $routeWithParam;

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


    public function getParent(): ?string
    {
        return $this->parent;
    }

    public function setParent(?string $parent): self
    {
        $this->parent = $parent;

        return $this;
    }

    public function getIsIndex(): ?bool
    {
        return $this->isIndex;
    }

    public function setIsIndex(?bool $isIndex): self
    {
        $this->isIndex = $isIndex;

        return $this;
    }

    public function getEachRow(): ?bool
    {
        return $this->eachRow;
    }

    public function setEachRow(?bool $eachRow): self
    {
        $this->eachRow = $eachRow;

        return $this;
    }

}
