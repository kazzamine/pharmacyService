<?php

namespace App\Entity;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * SaveTree
 ** @ORM\HasLifecycleCallbacks()
 */
#[ORM\Table(name: 'arc_tree_cab')]
#[ORM\Entity]
class ArcTreeCab {
    
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
    #[ORM\Column(name: 'designation', type: 'string', length: 255, nullable: false)]
    private $designation;

    /**
     * @var string
     */
    #[Assert\NotBlank]
    #[ORM\Column(name: 'abreviation', type: 'string', length: 255, nullable: false)]
    private $abreviation;
    
    
      #[ORM\Column(name: 'active', type: 'integer', nullable: false, options: ['default' => 1])]
    private $active=1;

   
    
    
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
    #[ORM\ManyToOne(targetEntity: \User::class, inversedBy: 'defaultTreesCabCreated')]
    private $userCreated;

    #[ORM\JoinColumn(name: 'user_updated', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \User::class, inversedBy: 'defaultTreesCabUpdated')]
    private $userUpdated;
    
    
    
    
    
    
    
   

   
   
    
    
    
    
    
    #[ORM\PrePersist]
    public function setCreatedValue() {

        $this->created = new \DateTime();
        
       

    }

    #[ORM\PreUpdate]
    public function setUpdatedValue() {
        $this->updated = new \DateTime();
    }
    
   
    
    
    
     #[ORM\OneToMany(targetEntity: \ArcTreeDet::class, mappedBy: 'defaultTreeCab')]
    private $defaultTreesDet;
    
    
 
    public function __construct()
    {
        
      
         $this->defaultTreesDet = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDesignation(): ?string
    {
        return $this->designation;
    }

    public function setDesignation(string $designation): self
    {
        $this->designation = $designation;

        return $this;
    }

    public function getAbreviation(): ?string
    {
        return $this->abreviation;
    }

    public function setAbreviation(string $abreviation): self
    {
        $this->abreviation = $abreviation;

        return $this;
    }

    public function getActive(): ?int
    {
        return $this->active;
    }

    public function setActive(int $active): self
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
     * @return Collection|ArcTreeDet[]
     */
    public function getDefaultTreesDet(): Collection
    {
        return $this->defaultTreesDet;
    }

    public function addDefaultTreesDet(ArcTreeDet $defaultTreesDet): self
    {
        if (!$this->defaultTreesDet->contains($defaultTreesDet)) {
            $this->defaultTreesDet[] = $defaultTreesDet;
            $defaultTreesDet->setDefaultTreeCab($this);
        }

        return $this;
    }

    public function removeDefaultTreesDet(ArcTreeDet $defaultTreesDet): self
    {
        if ($this->defaultTreesDet->contains($defaultTreesDet)) {
            $this->defaultTreesDet->removeElement($defaultTreesDet);
            // set the owning side to null (unless already changed)
            if ($defaultTreesDet->getDefaultTreeCab() === $this) {
                $defaultTreesDet->setDefaultTreeCab(null);
            }
        }

        return $this;
    }
   

    
}
