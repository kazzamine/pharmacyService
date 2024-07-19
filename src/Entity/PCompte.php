<?php

namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

#[ORM\Table(name: 'p_compte')]
#[ORM\Entity(repositoryClass: \App\Repository\PCompteRepository::class)]
#[UniqueEntity('code')]
#[ORM\HasLifecycleCallbacks]
class PCompte {

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    /**
     * @var string|null
     */
    #[Assert\NotBlank]
    #[ORM\Column(name: 'code', type: 'string', length: 100, nullable: true)]
    private $code;

    /**
     * @var string|null
     */
    #[Assert\NotBlank]
    #[ORM\Column(name: 'designation', type: 'string', length: 100, nullable: true)]
    private $designation;
    /**
     * @var int|null
     */
    #[ORM\JoinColumn(name: 'p_dossier_id', referencedColumnName: 'id')]
    #[Assert\NotBlank]
    #[ORM\ManyToOne(targetEntity: \App\Entity\PDossier::class)]
    private $dossier;

    /**
     * @var string
     */
    #[Assert\NotBlank]
    #[ORM\Column(name: 'sens', type: 'string', length: 100, nullable: true)]
    private $sens;

    /**
     * @var string
     */
    #[Assert\NotBlank]
    #[ORM\Column(name: 'type', type: 'string', length: 100, nullable: true)]
    private $type;

    /**
     * @var string
     */
    #[ORM\Column(name: 'code_compte_poste', type: 'string', length: 255, nullable: true)]
    private $codeComptePoste;
    #[ORM\JoinColumn(name: 'p_compte_masse_id', referencedColumnName: 'id')]
    #[Assert\NotBlank]
    #[ORM\ManyToOne(targetEntity: \App\Entity\PComptemasse::class)]
    private $compteMasse;

    
    #[ORM\JoinColumn(name: 'p_compte_rubrique_id', referencedColumnName: 'id')]
    #[Assert\NotBlank]
    #[ORM\ManyToOne(targetEntity: \App\Entity\PCompterubrique::class)]
    private $compteRubrique;
    #[ORM\JoinColumn(name: 'p_compte_poste_id', referencedColumnName: 'id')]
    #[Assert\NotBlank]
    #[ORM\ManyToOne(targetEntity: \App\Entity\PCompteposte::class)]
    private $comptePoste;

    /**
     * @var int
     */
    #[ORM\Column(name: 'active', type: 'boolean', nullable: true)]
    private $active;

    #[ORM\OneToMany(targetEntity: \App\Entity\UvDeviscab::class, mappedBy: 'compte')]
    private $uvDeviscabs;


      #[ORM\OneToMany(targetEntity: \App\Entity\UvCommandecab::class, mappedBy: 'compte')]
    private $commande;

    public function __construct() {
        $this->uvDeviscabs = new ArrayCollection();
        $this->commande = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }
    public function getCompteMasse(): ?PComptemasse {
        return $this->compteMasse;
    }

    public function setCompteMasse(?PComptemasse $compteMasse): self {
        $this->compteMasse = $compteMasse;

        return $this;
    }

    public function getCompteRubrique(): ?PCompterubrique {
        return $this->compteRubrique;
    }

    public function setCompteRubrique(?PCompterubrique $compteRubrique): self {
        $this->compteRubrique = $compteRubrique;

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

    public function getDesignation(): ?string
    {
        return $this->designation;
    }

    public function setDesignation(?string $designation): self
    {
        $this->designation = $designation;

        return $this;
    }

    public function getSens(): ?string
    {
        return $this->sens;
    }

    public function setSens(?string $sens): self
    {
        $this->sens = $sens;

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
    public function getDossier(): ?PDossier
    {
        return $this->dossier;
    }

    public function setDossier(?PDossier $dossier): self
    {
        $this->dossier = $dossier;

        return $this;
    }
    public function getCodeComptePoste(): ?string
    {
        return $this->codeComptePoste;
    }

    public function setCodeComptePoste(?string $codeComptePoste): self
    {
        $this->codeComptePoste = $codeComptePoste;

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

    public function getComptePoste(): ?PCompteposte
    {
        return $this->comptePoste;
    }

    public function setComptePoste(?PCompteposte $comptePoste): self
    {
        $this->comptePoste = $comptePoste;

        return $this;
    }
    public function __toString() {
        return "";
    }
    /**
     * @return Collection|UvDeviscab[]
     */
    public function getUvDeviscabs(): Collection
    {
        return $this->uvDeviscabs;
    }

    public function addUvDeviscab(UvDeviscab $uvDeviscab): self
    {
        if (!$this->uvDeviscabs->contains($uvDeviscab)) {
            $this->uvDeviscabs[] = $uvDeviscab;
            $uvDeviscab->setCompte($this);
        }

        return $this;
    }

    public function removeUvDeviscab(UvDeviscab $uvDeviscab): self
    {
        if ($this->uvDeviscabs->contains($uvDeviscab)) {
            $this->uvDeviscabs->removeElement($uvDeviscab);
            // set the owning side to null (unless already changed)
            if ($uvDeviscab->getCompte() === $this) {
                $uvDeviscab->setCompte(null);
            }
        }

        return $this;
    }

    




        /**
     * @return Collection|UvCommandecab[]
     */
    public function getCommande(): Collection
    {
        return $this->commande;
    }

    public function addCommande(UvCommandecab $commande): self
    {
        if (!$this->commande->contains($commande)) {
            $this->commande[] = $commande;
            $commande->setCompte($this);
        }

        return $this;
    }

    public function removeCommande(UvCommandecab $commande): self
    {
        if ($this->commande->contains($commande)) {
            $this->commande->removeElement($commande);
            // set the owning side to null (unless already changed)
            if ($commande->getCompte() === $this) {
                $commande->setCompte(null);
            }
        }

        return $this;
    }

}
