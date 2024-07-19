<?php

namespace App\Entity;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: \App\Repository\TaProjetRepository::class)]
#[ORM\HasLifecycleCallbacks]
class TaProjet
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

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
    #[ORM\Column(name: 'designation_detail', type: 'text', nullable: true)]
    private $designationDetail;

    /**
     * @var string
     */
    #[Assert\NotBlank]
    #[ORM\Column(name: 'abreviation', type: 'string', length: 255, nullable: true)]
    private $abreviation;

    /**
     *
     * @var \Date
     *
     */
    #[ORM\Column(name: 'date', type: 'date', nullable: true)]
    private $date;

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

    
    #[ORM\JoinColumn(name: 'client_id', referencedColumnName: 'id')]
    #[Assert\NotBlank]
    #[ORM\ManyToOne(targetEntity: \TaClient::class)]
    private $client;

    #[ORM\OneToMany(targetEntity: \TaProjetModule::class, mappedBy: 'projet')]
    private $modules;

    #[ORM\OneToMany(targetEntity: \TaTache::class, mappedBy: 'projet')]
    private $taches;
    
    #[ORM\Column(type: 'boolean', nullable: true)]
    private $active;

  
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->modules = new \Doctrine\Common\Collections\ArrayCollection();
        $this->taches = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    
    public function getId(): ?int
    {
        return $this->id;
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

    public function getDesignation(): ?string
    {
        return $this->designation;
    }

    public function setDesignation(?string $designation): self
    {
        $this->designation = $designation;

        return $this;
    }

    public function getDesignationDetail(): ?string
    {
        return $this->designationDetail;
    }

    public function setDesignationDetail(?string $designationDetail): self
    {
        $this->designationDetail = $designationDetail;

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

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(?\DateTimeInterface $date): self
    {
        $this->date = $date;

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

    public function getClient(): ?TaClient
    {
        return $this->client;
    }

    public function setClient(?TaClient $client): self
    {
        $this->client = $client;

        return $this;
    }

    /**
     * @return Collection|TaProjetModule[]
     */
    public function getModules(): Collection
    {
        return $this->modules;
    }

    public function addModule(TaProjetModule $module): self
    {
        if (!$this->modules->contains($module)) {
            $this->modules[] = $module;
            $module->setProjet($this);
        }

        return $this;
    }

    public function removeModule(TaProjetModule $module): self
    {
        if ($this->modules->contains($module)) {
            $this->modules->removeElement($module);
            // set the owning side to null (unless already changed)
            if ($module->getProjet() === $this) {
                $module->setProjet(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|TaTache[]
     */
    public function getTaches(): Collection
    {
        return $this->taches;
    }

    public function addTach(TaTache $tach): self
    {
        if (!$this->taches->contains($tach)) {
            $this->taches[] = $tach;
            $tach->setProjet($this);
        }

        return $this;
    }

    public function removeTach(TaTache $tach): self
    {
        if ($this->taches->contains($tach)) {
            $this->taches->removeElement($tach);
            // set the owning side to null (unless already changed)
            if ($tach->getProjet() === $this) {
                $tach->setProjet(null);
            }
        }

        return $this;
    }
}
