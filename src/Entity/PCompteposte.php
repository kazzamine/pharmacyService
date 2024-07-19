<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * PCompteposte
 */
#[ORM\Table(name: 'p_compteposte')]
#[UniqueEntity('code')]
#[ORM\Entity]
class PCompteposte
{
    
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
     * @var string|null
     */
    #[Assert\NotBlank]
    #[ORM\Column(name: 'sens', type: 'string', length: 100, nullable: true)]
    private $sens;

    /**
     * @var string|null
     */
    #[Assert\NotBlank]
    #[ORM\Column(name: 'type', type: 'string', length: 100, nullable: true)]
    private $type;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'code_compte_rubrique', type: 'string', length: 255, nullable: true)]
    private $codeCompteRubrique;
    
    
      #[ORM\JoinColumn(name: 'p_compte_rubrique_id', referencedColumnName: 'id')]
    #[Assert\NotBlank]
    #[ORM\ManyToOne(targetEntity: \App\Entity\PCompterubrique::class)]
    private $compteRubrique;
    /**
     * @var int|null
     */
    #[ORM\JoinColumn(name: 'p_dossier_id', referencedColumnName: 'id')]
    #[Assert\NotBlank]
    #[ORM\ManyToOne(targetEntity: \App\Entity\PDossier::class)]
    private $dossier;
    
    #[ORM\JoinColumn(name: 'p_compte_masse_id', referencedColumnName: 'id')]
    #[Assert\NotBlank]
    #[ORM\ManyToOne(targetEntity: \App\Entity\PComptemasse::class)]
    private $compteMasse;
    
      /**
     * @var int
     */
    #[ORM\Column(name: 'active', type: 'boolean', nullable: true)]
    private $active;
    

    #[Assert\NotBlank]
    #[ORM\OneToMany(targetEntity: \App\Entity\UvDeviscab::class, mappedBy: 'comptePoste')]
    private $uvDeviscabs;

    public function __construct()
    {
        $this->uvDeviscabs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }
    public function __toString()
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

    public function getCodeCompteRubrique(): ?string
    {
        return $this->codeCompteRubrique;
    }

    public function setCodeCompteRubrique(?string $codeCompteRubrique): self
    {
        $this->codeCompteRubrique = $codeCompteRubrique;

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

    public function getCompteRubrique(): ?PCompterubrique
    {
        return $this->compteRubrique;
    }

    public function setCompteRubrique(?PCompterubrique $compteRubrique): self
    {
        $this->compteRubrique = $compteRubrique;

        return $this;
    }
    public function getCompteMasse(): ?PComptemasse
    {
        return $this->compteMasse;
    }

    public function setCompteMasse(?PComptemasse $compteMasse): self
    {
        $this->compteMasse = $compteMasse;

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
            $uvDeviscab->setComptePoste($this);
        }

        return $this;
    }

    public function removeUvDeviscab(UvDeviscab $uvDeviscab): self
    {
        if ($this->uvDeviscabs->contains($uvDeviscab)) {
            $this->uvDeviscabs->removeElement($uvDeviscab);
            // set the owning side to null (unless already changed)
            if ($uvDeviscab->getComptePoste() === $this) {
                $uvDeviscab->setComptePoste(null);
            }
        }

        return $this;
    }

   

}
