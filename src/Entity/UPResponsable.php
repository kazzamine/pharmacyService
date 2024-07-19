<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: \App\Repository\UPResponsableRepository::class)]
class UPResponsable
{
    
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $code;

    #[Assert\NotBlank]
    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $nom;

    #[Assert\NotBlank]
    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $prenom;

    #[Assert\Email]
    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $email;

    #[ORM\ManyToOne(targetEntity: \App\Entity\User::class, inversedBy: 'uPResponsables')]
    private $user;

    #[ORM\OneToMany(targetEntity: \App\Entity\UPProjet::class, mappedBy: 'responsable')]
    private $uPProjets;

    #[ORM\Column(type: 'string', length: 100, nullable: true)]
    private $telePersonnel;

    #[ORM\Column(type: 'string', length: 100, nullable: true)]
    private $teleEntreprise;

    #[ORM\Column(type: 'date', nullable: true)]
    private $datenaissance;

    #[ORM\Column(type: 'string', nullable: true, length: 100)]
    private $lieuNaissance;

    #[ORM\Column(type: 'string', length: 400, nullable: true)]
    private $adresse;

    #[ORM\Column(type: 'string', length: 400, nullable: true)]
    private $autreInformation;


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
    #[ORM\ManyToOne(targetEntity: \User::class)]
    private $userCreated;

    #[ORM\JoinColumn(name: 'user_updated', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \User::class)]
    private $userUpdated;

        #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $pays;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $ville;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $sexe;

    #[ORM\Column(type: 'text', nullable: true)]
    private $signature;

     #[ORM\Column(type: 'boolean', nullable: true)]
    private $active;

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
        $this->uPProjets = new ArrayCollection();
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

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(?string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(?string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return Collection|UPProjet[]
     */
    public function getUPProjets(): Collection
    {
        return $this->uPProjets;
    }

    public function addUPProjet(UPProjet $uPProjet): self
    {
        if (!$this->uPProjets->contains($uPProjet)) {
            $this->uPProjets[] = $uPProjet;
            $uPProjet->setResponsable($this);
        }

        return $this;
    }

    public function removeUPProjet(UPProjet $uPProjet): self
    {
        if ($this->uPProjets->contains($uPProjet)) {
            $this->uPProjets->removeElement($uPProjet);
            // set the owning side to null (unless already changed)
            if ($uPProjet->getResponsable() === $this) {
                $uPProjet->setResponsable(null);
            }
        }

        return $this;
    }

    public function getTelePersonnel(): ?string
    {
        return $this->telePersonnel;
    }

    public function setTelePersonnel(?string $telePersonnel): self
    {
        $this->telePersonnel = $telePersonnel;

        return $this;
    }

    public function getTeleEntreprise(): ?string
    {
        return $this->teleEntreprise;
    }

    public function setTeleEntreprise(?string $teleEntreprise): self
    {
        $this->teleEntreprise = $teleEntreprise;

        return $this;
    }

    public function getPays(): ?string {
        return $this->pays;
    }

    public function setPays(?string $pays): self {
        $this->pays = $pays;

        return $this;
    }

    public function getVille(): ?string {
        return $this->ville;
    }

    public function setVille(?string $ville): self {
        $this->ville = $ville;

        return $this;
    }

    public function getSexe(): ?string {
        return $this->sexe;
    }

    public function setSexe(?string $sexe): self {
        $this->sexe = $sexe;

        return $this;
    }

    public function getSignature(): ?string {
        return $this->signature;
    }

    public function setSignature(?string $signature): self {
        $this->signature = $signature;

        return $this;
    }

    public function getDatenaissance(): ?\DateTimeInterface
    {
        return $this->datenaissance;
    }

    public function setDatenaissance(?\DateTimeInterface $datenaissance): self
    {
        $this->datenaissance = $datenaissance;

        return $this;
    }

    public function getLieuNaissance(): ?string
    {
        return $this->lieuNaissance;
    }

    public function setLieuNaissance(string $lieuNaissance): self
    {
        $this->lieuNaissance = $lieuNaissance;

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
}
