<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * PComptemasse
 */
#[ORM\Table(name: 'p_comptemasse')]
#[UniqueEntity('code')]
#[ORM\Entity]
class PComptemasse
{
    
       #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    /**
     * @var string|null
     */
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
    #[ORM\Column(name: 'sens', type: 'float', length: 1, nullable: true)]
    private $sens;

    /**
     * @var string|null
     */
    #[Assert\NotBlank]
    #[ORM\Column(name: 'type', type: 'string', length: 100, nullable: true)]
    private $type;

    /**
     * @var int|null
     */
    #[ORM\JoinColumn(name: 'p_dossier_id', referencedColumnName: 'id')]
    #[Assert\NotBlank]
    #[ORM\ManyToOne(targetEntity: \App\Entity\PDossier::class)]
    private $dossier;

    /**
     * @var int
     */
    #[ORM\Column(name: 'active', type: 'boolean', nullable: true)]
    private $active ;

    
    #[ORM\OneToMany(targetEntity: \App\Entity\UvDeviscab::class, mappedBy: 'compteMasse')]
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

    public function getSens(): ?float
    {
        return $this->sens;
    }

    public function setSens(?float $sens): self
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

    public function getActive(): ?bool
    {
        return $this->active;
    }

    public function setActive(?bool $active): self
    {
        $this->active = $active;

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
            $uvDeviscab->setCompteMasse($this);
        }

        return $this;
    }

    public function removeUvDeviscab(UvDeviscab $uvDeviscab): self
    {
        if ($this->uvDeviscabs->contains($uvDeviscab)) {
            $this->uvDeviscabs->removeElement($uvDeviscab);
            // set the owning side to null (unless already changed)
            if ($uvDeviscab->getCompteMasse() === $this) {
                $uvDeviscab->setCompteMasse(null);
            }
        }

        return $this;
    }

    public function __toString()
{
    return (string) $this->getDesignation();
}
}
