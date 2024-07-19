<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

use Doctrine\ORM\Mapping as ORM;

/**
 * Client
 */
#[ORM\Table(name: 'arc_client')]
#[ORM\Entity]
class ArcClient
{
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
    #[ORM\Column(name: 'designation', type: 'string', length: 255, nullable: true)]
    private $designation;

    /**
     * @var string
     */
    #[ORM\Column(name: 'abreviation', type: 'string', length: 100, nullable: true)]
    private $abreviation;

    /**
     * @var string
     */
    #[ORM\Column(name: 'societe', type: 'string', length: 255, nullable: false)]
    private $societe;

    /**
     * @var string
     */
    #[ORM\Column(name: 'tele1', type: 'string', length: 50, nullable: false)]
    private $tele1;

    /**
     * @var string
     */
    #[ORM\Column(name: 'tele2', type: 'string', length: 50, nullable: true)]
    private $tele2;

    /**
     * @var string
     */
    #[ORM\Column(name: 'tele3', type: 'string', length: 50, nullable: true)]
    private $tele3;

    /**
     * @var string
     */
    #[ORM\Column(name: 'fax1', type: 'string', length: 50, nullable: false)]
    private $fax1;

    /**
     * @var string
     */
    #[ORM\Column(name: 'fax2', type: 'string', length: 50, nullable: true)]
    private $fax2;

    /**
     * @var string
     */
    #[ORM\Column(name: 'mail1', type: 'string', length: 100, nullable: false)]
    private $mail1;

    /**
     * @var string
     */
    #[ORM\Column(name: 'mail2', type: 'string', length: 100, nullable: true)]
    private $mail2;

    /**
     * @var string
     */
    #[ORM\Column(name: 'pays', type: 'string', length: 100, nullable: false)]
    private $pays;

    /**
     * @var string
     */
    #[ORM\Column(name: 'ville', type: 'string', length: 100, nullable: false)]
    private $ville;

    /**
     * @var string
     */
    #[ORM\Column(name: 'adresse', type: 'text', nullable: false)]
    private $adresse;
    
    
    
    
    
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
    
    
      #[ORM\Column(name: 'active', type: 'integer', nullable: true, options: ['default' => 1])]
    private $active = 1;
    
    
    
    

    #[ORM\JoinColumn(name: 'user_created', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \User::class, inversedBy: 'clientsCreated')]
    private $userCreated;

    #[ORM\JoinColumn(name: 'user_updated', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \User::class, inversedBy: 'clientsUpdated')]
    private $userUpdated;
    
    
       #[ORM\OneToMany(targetEntity: \ArcProjet::class, mappedBy: 'client')]
    private $projets;
    
    
    
    public function __construct()
    {
         $this->projets = new ArrayCollection(); 
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getAbreviation(): ?string
    {
        return $this->abreviation;
    }

    public function setAbreviation(?string $abreviation): self
    {
        $this->abreviation = $abreviation;

        return $this;
    }

    public function getSociete(): ?string
    {
        return $this->societe;
    }

    public function setSociete(string $societe): self
    {
        $this->societe = $societe;

        return $this;
    }

    public function getTele1(): ?string
    {
        return $this->tele1;
    }

    public function setTele1(string $tele1): self
    {
        $this->tele1 = $tele1;

        return $this;
    }

    public function getTele2(): ?string
    {
        return $this->tele2;
    }

    public function setTele2(?string $tele2): self
    {
        $this->tele2 = $tele2;

        return $this;
    }

    public function getTele3(): ?string
    {
        return $this->tele3;
    }

    public function setTele3(?string $tele3): self
    {
        $this->tele3 = $tele3;

        return $this;
    }

    public function getFax1(): ?string
    {
        return $this->fax1;
    }

    public function setFax1(string $fax1): self
    {
        $this->fax1 = $fax1;

        return $this;
    }

    public function getFax2(): ?string
    {
        return $this->fax2;
    }

    public function setFax2(?string $fax2): self
    {
        $this->fax2 = $fax2;

        return $this;
    }

    public function getMail1(): ?string
    {
        return $this->mail1;
    }

    public function setMail1(string $mail1): self
    {
        $this->mail1 = $mail1;

        return $this;
    }

    public function getMail2(): ?string
    {
        return $this->mail2;
    }

    public function setMail2(?string $mail2): self
    {
        $this->mail2 = $mail2;

        return $this;
    }

    public function getPays(): ?string
    {
        return $this->pays;
    }

    public function setPays(string $pays): self
    {
        $this->pays = $pays;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

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

    public function getActive(): ?int
    {
        return $this->active;
    }

    public function setActive(?int $active): self
    {
        $this->active = $active;

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
     * @return Collection|ArcProjet[]
     */
    public function getProjets(): Collection
    {
        return $this->projets;
    }

    public function addProjet(ArcProjet $projet): self
    {
        if (!$this->projets->contains($projet)) {
            $this->projets[] = $projet;
            $projet->setClient($this);
        }

        return $this;
    }

    public function removeProjet(ArcProjet $projet): self
    {
        if ($this->projets->contains($projet)) {
            $this->projets->removeElement($projet);
            // set the owning side to null (unless already changed)
            if ($projet->getClient() === $this) {
                $projet->setClient(null);
            }
        }

        return $this;
    }

    
    
    
    
    
    


}
