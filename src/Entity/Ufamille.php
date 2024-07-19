<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

#[ORM\Entity(repositoryClass: \App\Repository\UfamilleRepository::class)]
#[UniqueEntity('code')]
class Ufamille
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255, unique: true)]
    #[Assert\NotBlank]
    private $code;
    #[ORM\OneToMany(targetEntity: \App\Entity\USousFamille::class, mappedBy: 'famille')]
    private $usousfamilles;

    #[ORM\Column(type: 'string', length: 255)]
    #[Assert\NotBlank]
    private $designation;

    #[ORM\OneToMany(targetEntity: \App\Entity\Uarticle::class, mappedBy: 'ufamille')]
    private $uarticles;

    public function __construct()
    {
        $this->uarticles = new ArrayCollection();
    }

    // Getters and Setters

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(string $code): self
    {
        $this->code = $code;

        return $this;
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

    /**
     * @return Collection|Uarticle[]
     */
    public function getUarticles(): Collection
    {
        return $this->uarticles;
        $this->usousfamilles = new ArrayCollection();

    }

    public function addUarticle(Uarticle $uarticle): self
    {
        if (!$this->uarticles->contains($uarticle)) {
            $this->uarticles[] = $uarticle;
            $uarticle->setUfamille($this);
        }

        return $this;
    }

    public function removeUarticle(Uarticle $uarticle): self
    {
        if ($this->uarticles->removeElement($uarticle)) {
            // set the owning side to null (unless already changed)
            if ($uarticle->getUfamille() === $this) {
                $uarticle->setUfamille(null);
            }
        }

        return $this;
    }
    
        /**
     * @return Collection|USousFamille[]
     */
    public function getUsousfamilles(): Collection
    {
        return $this->usousfamilles;
    }

    public function addUsousfamille(USousFamille $usousfamille): self
    {
        if (!$this->usousfamilles->contains($usousfamille)) {
            $this->usousfamilles[] = $usousfamille;
            $usousfamille->setFamille($this);
        }

        return $this;
    }

    public function removeUsousfamille(USousFamille $usousfamille): self
    {
        if ($this->usousfamilles->removeElement($usousfamille)) {
            // set the owning side to null (unless already changed)
            if ($usousfamille->getFamille() === $this) {
                $usousfamille->setFamille(null);
            }
        }

        return $this;
    }
}
