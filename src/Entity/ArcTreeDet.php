<?php

namespace App\Entity;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * SaveTree
 */
#[ORM\Table(name: 'arc_tree_det')]
#[ORM\Entity]
class ArcTreeDet {

    /**
     * @var int
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
    #[ORM\Column(name: 'id_tree', type: 'string', length: 255)]
    private $idTree;

    /**
     * @var string
     */
    #[ORM\Column(name: 'text', type: 'string', length: 255, nullable: true)]
    private $text;
    
    
    
     /**
     * @var string 
     */
    #[ORM\Column(name: 'url', type: 'text', nullable: true)]
    private $url;

    /**
     * @var string
     */
    #[ORM\Column(name: 'icon', type: 'string', length: 255, nullable: true)]
    private $icon;

    #[ORM\JoinColumn(name: 'default_tree_cab_id', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \ArcTreeCab::class, inversedBy: 'defaultTreesDet')]
    private $defaultTreeCab;
    
    
 
    
    
    #[ORM\Column(name: 'parent', type: 'string', length: 255, nullable: true)]
    private $parent;
    
    
    
    #[ORM\OneToMany(targetEntity: \ArcTreeDet::class, mappedBy: 'parentSelf')]
    private $children;

    /**
     * Many Categories have One Category.
     */
    #[ORM\JoinColumn(name: 'parent_self', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \ArcTreeDet::class, inversedBy: 'children')]
    private $parentSelf;

    

    public function __construct() {
        $this->children = new ArrayCollection();
        $this->parentSelf = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdTree(): ?string
    {
        return $this->idTree;
    }

    public function setIdTree(string $idTree): self
    {
        $this->idTree = $idTree;

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

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(?string $url): self
    {
        $this->url = $url;

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

    public function getParent(): ?string
    {
        return $this->parent;
    }

    public function setParent(?string $parent): self
    {
        $this->parent = $parent;

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

    /**
     * @return Collection|ArcTreeDet[]
     */
    public function getChildren(): Collection
    {
        return $this->children;
    }

    public function addChild(ArcTreeDet $child): self
    {
        if (!$this->children->contains($child)) {
            $this->children[] = $child;
            $child->setParentSelf($this);
        }

        return $this;
    }

    public function removeChild(ArcTreeDet $child): self
    {
        if ($this->children->contains($child)) {
            $this->children->removeElement($child);
            // set the owning side to null (unless already changed)
            if ($child->getParentSelf() === $this) {
                $child->setParentSelf(null);
            }
        }

        return $this;
    }

    public function getParentSelf(): ?self
    {
        return $this->parentSelf;
    }

    public function setParentSelf(?self $parentSelf): self
    {
        $this->parentSelf = $parentSelf;

        return $this;
    }

  


    
}
