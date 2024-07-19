<?php

namespace App\Entity;

use App\Entity\PDossier;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
#[ORM\Entity(repositoryClass: \App\Repository\UdepotRepository::class)]
#[UniqueEntity('code')]
class Udepot
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[Assert\NotBlank]
    #[Assert\Length(min: 2, max: 50)]
    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $code;

    #[Assert\NotBlank]
    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $titre;
    
    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $description;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $adresse;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $codePostal;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $ville;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $pays;

 
    
    
    
    /**
     * @var string
     */
    #[ORM\Column(name: 'active', type: 'boolean', nullable: true)]
    private $active;
    
    
     /**
     * @var string
     */
    #[ORM\Column(name: 'etat', type: 'boolean', nullable: true)]
    private $etat;
    
    
    
        
    #[ORM\Column(name: 'autre_information', type: 'text', nullable: true)]
    private $autreInformation;

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

    #[ORM\JoinColumn(name: 'user_created', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \User::class)]
    private $userCreated;

    #[ORM\JoinColumn(name: 'user_updated', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \User::class)]
    private $userUpdated;
    
    
    
    #[ORM\OneToMany(targetEntity: \App\Entity\Uarticle::class, mappedBy: 'depot')]
    private $uarticles;

    #[ORM\OneToMany(targetEntity: \App\Entity\UmouvementStock::class, mappedBy: 'depot')]
    private $umouvementStocks;
    
    #[ORM\OneToMany(targetEntity: \App\Entity\Uantenne::class, mappedBy: 'depot')]
    private $antennes;
    #[ORM\ManyToOne(targetEntity: \App\Entity\PDossier::class, inversedBy: 'udepots')]
    private $dossier;
    
    
          #[ORM\PrePersist]
    public function setCreatedValue() {

        $this->created = new \DateTime();
    }

    #[ORM\PreUpdate]
    public function setUpdatedValue() {
        $this->updated = new \DateTime();
    }


    public function __construct()
    {
        $this->uarticles = new ArrayCollection();
        $this->umouvementStocks = new ArrayCollection();
        $this->antennes = new ArrayCollection();
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

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(?string $titre): self
    {
        $this->titre = $titre;

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

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(?string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getCodePostal(): ?string
    {
        return $this->codePostal;
    }

    public function setCodePostal(?string $codePostal): self
    {
        $this->codePostal = $codePostal;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(?string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    public function getPays(): ?string
    {
        return $this->pays;
    }

    public function setPays(?string $pays): self
    {
        $this->pays = $pays;

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

    public function getEtat(): ?bool
    {
        return $this->etat;
    }

    public function setEtat(?bool $etat): self
    {
        $this->etat = $etat;

        return $this;
    }

    public function getAutreInformation(): ?string
    {
        return $this->autreInformation;
    }

    public function setAutreInformation(?string $autreInformation): self
    {
        $this->autreInformation = $autreInformation;

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
     * @return Collection|Uarticle[]
     */
    public function getUarticles(): Collection
    {
        return $this->uarticles;
    }

    public function addUarticle(Uarticle $uarticle): self
    {
        if (!$this->uarticles->contains($uarticle)) {
            $this->uarticles[] = $uarticle;
            $uarticle->setDepot($this);
        }

        return $this;
    }

    public function removeUarticle(Uarticle $uarticle): self
    {
        if ($this->uarticles->contains($uarticle)) {
            $this->uarticles->removeElement($uarticle);
            // set the owning side to null (unless already changed)
            if ($uarticle->getDepot() === $this) {
                $uarticle->setDepot(null);
            }
        }

        return $this;
    }
    public function __toString() {
        return $this->code;
    }
    /**
     * @return Collection|UmouvementStock[]
     */
    public function getUmouvementStocks(): Collection
    {
        return $this->umouvementStocks;
    }

    public function addUmouvementStock(UmouvementStock $umouvementStock): self
    {
        if (!$this->umouvementStocks->contains($umouvementStock)) {
            $this->umouvementStocks[] = $umouvementStock;
            $umouvementStock->setDepot($this);
        }

        return $this;
    }

    public function removeUmouvementStock(UmouvementStock $umouvementStock): self
    {
        if ($this->umouvementStocks->contains($umouvementStock)) {
            $this->umouvementStocks->removeElement($umouvementStock);
            // set the owning side to null (unless already changed)
            if ($umouvementStock->getDepot() === $this) {
                $umouvementStock->setDepot(null);
            }
        }

        return $this;
    }
    /**
     * @return Collection|Uantenne[]
     */
    public function getAntennes(): Collection
    {
        return $this->antennes;
    }

    public function addAntenne(Uantenne $antenne): self
    {
        if (!$this->antennes->contains($antenne)) {
            $this->antennes[] = $antenne;
            $antenne->setDepot($this);
        }

        return $this;
    }

    public function removeAntenne(Uantenne $antenne): self
    {
        if ($this->antennes->contains($antenne)) {
            $this->antennes->removeElement($antenne);
            // set the owning side to null (unless already changed)
            if ($antenne->getDepot() === $this) {
                $antenne->setDepot(null);
            }
        }

        return $this;
    }

    public function getDossier(): ?PDossier
    {
        return $this->dossier;
    }

    public function setDossier(?PDossier $dossier): self
    {
        $this->dossier = $dossier;

        return $this;
    }
    
  
}
