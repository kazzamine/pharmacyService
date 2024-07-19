<?php

namespace App\Entity;

use App\Entity\Uantenne;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use App\Entity\User; // Make sure you have a User entity
use Doctrine\Common\Collections\Collection;

#[ORM\Entity(repositoryClass: \App\Repository\TypeMagasinRepository::class)]
class TypeMagasin
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'boolean')]
    private $active;
    #[ORM\Column(type: 'string', length: 10)]
    private $comparisonOperator;

    #[ORM\Column(type: 'datetime')]
    private $created;
    
    #[ORM\Column(type: 'string', length: 255)]
    private $description;
     #[ORM\Column(type: 'integer')]
    private $type;

    #[ORM\JoinColumn(nullable: false)]
    #[ORM\ManyToOne(targetEntity: \App\Entity\User::class)]
    private $userCreated;
    
     #[ORM\OneToMany(targetEntity: \App\Entity\Uantenne::class, mappedBy: 'typeMagasin', cascade: ['persist', 'remove'])]
    private $uantennes;

    
    public function __construct()
    {
        $this->uantennes = new ArrayCollection();
    }
    // Getters and Setters
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getActive(): ?bool
    {
        return $this->active;
    }

    public function setActive(bool $active): self
    {
        $this->active = $active;

        return $this;
    }

    public function getCreated(): ?\DateTimeInterface
    {
        return $this->created;
    }

    public function setCreated(\DateTimeInterface $created): self
    {
        $this->created = $created;

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
    public function getComparisonOperator(): ?string
    {
        return $this->comparisonOperator;
    }

    public function setComparisonOperator(string $comparisonOperator): self
    {
        $this->comparisonOperator = $comparisonOperator;

        return $this;
    }
    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }
    public function getType(): ?int
    {
        return $this->type;
    }

    public function setType(int $type): self
    {
        $this->type = $type;

        return $this;
    }
     /**
     * @return Collection|Uantenne[]
     */
    public function getUantennes(): Collection
    {
        return $this->uantennes;
    }

    public function addUantenne(Uantenne $uantenne): self
    {
        if (!$this->uantennes->contains($uantenne)) {
            $this->uantennes[] = $uantenne;
            $uantenne->setTypeMagasin($this);
        }

        return $this;
    }

    public function removeUantenne(Uantenne $uantenne): self
    {
        if ($this->uantennes->removeElement($uantenne)) {
            // set the owning side to null (unless already changed)
            if ($uantenne->getTypeMagasin() === $this) {
                $uantenne->setTypeMagasin(null);
            }
        }

        return $this;
    }
}
