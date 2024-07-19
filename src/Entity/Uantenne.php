<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
#[ORM\Entity(repositoryClass: \App\Repository\UantenneRepository::class)]
#[UniqueEntity('code')]
class Uantenne
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;
    
       #[ORM\JoinTable(name: 'entrepot_magasins')]
    #[ORM\JoinColumn(name: 'magasins_id', referencedColumnName: 'id')]
    #[ORM\InverseJoinColumn(name: 'entrepot_id', referencedColumnName: 'id')]
    #[ORM\ManyToMany(targetEntity: \App\Entity\Uantenne::class, inversedBy: 'magasins_entrepot')]
    private $magasins_entrepot;

    #[Assert\NotBlank]
    #[Assert\Length(min: 2, max: 50)]
    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $code;

     #[ORM\ManyToOne(targetEntity: \App\Entity\Udepot::class, inversedBy: 'antennes')]
    private $depot;
    #[ORM\JoinColumn(nullable: false)]
    #[ORM\ManyToOne(targetEntity: \App\Entity\TypeMagasin::class, inversedBy: 'uantennes')]
    private $typeMagasin;

    /**
     *
     * @var \DateTime
     *
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
    
     #[ORM\OneToMany(targetEntity: \UserAntenne::class, mappedBy: 'uantenne')]
    private $userAntennes;

    #[ORM\JoinColumn(name: 'user_created', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \User::class)]
    private $userCreated;
    
    #[ORM\OneToMany(targetEntity: UsPAdresseStockage::class, mappedBy: 'uantenne')]
    private $usPAdresseStockages;

    #[ORM\JoinColumn(name: 'user_updated', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \User::class)]
    private $userUpdated;

    
    #[ORM\Column(name: 'defaut', type: 'boolean')]
    private $defaut;
    
    #[ORM\Column(name: 'designation', type: 'string')]
    private $designation;
        
    #[ORM\OneToMany(targetEntity: \App\Entity\UmouvementAntenne::class, mappedBy: 'antenne')]
    private $mouvements;
    
          #[ORM\PrePersist]
    public function setCreatedValue() {

        $this->created = new \DateTime();
        $this->mouvements = new ArrayCollection();
        $this->userAntennes = new ArrayCollection();

    }

    #[ORM\PreUpdate]
    public function setUpdatedValue() {
        $this->updated = new \DateTime();
    }

    public function __construct()
    {
        $this->magasins_entrepot = new ArrayCollection();

        $this->usPAdresseStockages = new ArrayCollection();
    }
    public function getId(): ?int
    {
        return $this->id;
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

    public function getDepot(): ?Udepot
    {
        return $this->depot;
    }

    public function setDepot(?Udepot $depot): self
    {
        $this->depot = $depot;

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

    public function getDesignation(): ?string
    {
        return $this->designation;
    }

    public function setDesignation(?string $designation): self
    {
        $this->designation = $designation;

        return $this;
    }
    public function getDefaut(): ?bool {
        return $this->defaut;
    }

    public function setDefaut(?bool $defaut): self {
        $this->defaut = $defaut;

        return $this;
    }
    /**
     * @return Collection|UmouvementAntenne[]
     */
    public function getMouvements(): Collection
    {
        return $this->mouvements;
    }

    public function addMouvement(UmouvementAntenne $mouvement): self
    {
        if (!$this->mouvements->contains($mouvement)) {
            $this->mouvements[] = $mouvement;
            $mouvement->setAntenne($this);
        }

        return $this;
    }

    public function removeMouvement(UmouvementAntenne $mouvement): self
    {
        if ($this->mouvements->contains($mouvement)) {
            $this->mouvements->removeElement($mouvement);
            // set mouvements owning side to null (unless already changed)
            if ($mouvement->getAntenne() === $this) {
                $mouvement->setAntenne(null);
            }
        }

        return $this;
    }
    
      /**
     * @return Collection<int, UsPAdresseStockage>
     */
    public function getUsPAdresseStockages(): Collection
    {
        return $this->usPAdresseStockages;
    }

    public function addUsPAdresseStockage(UsPAdresseStockage $usPAdresseStockage): self
    {
        if (!$this->usPAdresseStockages->contains($usPAdresseStockage)) {
            $this->usPAdresseStockages[] = $usPAdresseStockage;
            $usPAdresseStockage->setUantenne($this);
        }

        return $this;
    }

    public function removeUsPAdresseStockage(UsPAdresseStockage $usPAdresseStockage): self
    {
        if ($this->usPAdresseStockages->removeElement($usPAdresseStockage)) {
            // set the owning side to null (unless already changed)
            if ($usPAdresseStockage->getUantenne() === $this) {
                $usPAdresseStockage->setUantenne(null);
            }
        }

        return $this;
    }
    public function getUserAntennes(): Collection
    {
        return $this->userAntennes;
    }

    public function addUserAntenne(UserAntenne $userAntenne): self
    {
        if (!$this->userAntennes->contains($userAntenne)) {
            $this->userAntennes[] = $userAntenne;
            $userAntenne->setUantenne($this);
        }

        return $this;
    }

    public function removeUserAntenne(UserAntenne $userAntenne): self
    {
        if ($this->userAntennes->removeElement($userAntenne)) {
            // set the owning side to null (unless already changed)
            if ($userAntenne->getUantenne() === $this) {
                $userAntenne->setUantenne(null);
            }
        }

        return $this;
    }
    public function getTypeMagasin(): ?TypeMagasin
    {
        return $this->typeMagasin;
    }

    public function setTypeMagasin(?TypeMagasin $typeMagasin): self
    {
        $this->typeMagasin = $typeMagasin;

        return $this;
    } 
    
        /**
     * @return Collection|Uantenne[]
     */
    public function getMagasinsEntrepot(): Collection
    {
        return $this->magasins_entrepot;
    }

    public function addMagasinsEntrepot(Uantenne $uantenne): self
    {
        if (!$this->magasins_entrepot->contains($uantenne)) {
            $this->magasins_entrepot[] = $uantenne;
        }

        return $this;
    }

    public function removeMagasinsEntrepot(Uantenne $uantenne): self
    {
        $this->magasins_entrepot->removeElement($uantenne);

        return $this;
    }
}
