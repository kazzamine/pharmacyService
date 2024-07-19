<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: \App\Repository\UsParametrageRepository::class)]
class UsParametrage
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $code;

     #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $titre;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $prefix;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $route;


       #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $icon;

    #[ORM\Column(type: 'boolean', nullable: true)]
    private $active;

    #[ORM\JoinTable(name: 'us_module_parametrage')]
    #[ORM\ManyToMany(targetEntity: \App\Entity\UsModule::class, inversedBy: 'parametrages')]
    private $modules;


       #[ORM\Column(type: 'integer', nullable: true)]
    private $ordr;


    public function __construct()
    {
        $this->modules = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(?string $code): self
    {
        $this->code = $code;

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

    public function getPrefix(): ?string
    {
        return $this->prefix;
    }

    public function setPrefix(?string $prefix): self
    {
        $this->prefix = $prefix;

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

    public function getActive(): ?bool
    {
        return $this->active;
    }

    public function setActive(?bool $active): self
    {
        $this->active = $active;

        return $this;
    }

    /**
     * @return Collection|UsModule[]
     */
    public function getModules(): Collection
    {
        return $this->modules;
    }

    public function addModule(UsModule $module): self
    {
        if (!$this->modules->contains($module)) {
            $this->modules[] = $module;
        }

        return $this;
    }

    public function removeModule(UsModule $module): self
    {
        if ($this->modules->contains($module)) {
            $this->modules->removeElement($module);
        }

        return $this;
    }
}
