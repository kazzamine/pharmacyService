<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: \App\Repository\ConfPdfTypeRepository::class)]
class ConfPdfType
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255, unique: true)]
    private $abriviation;

    #[ORM\Column(type: 'string', length: 255)]
    private $description;

    #[ORM\OneToMany(targetEntity: \App\Entity\ConfPdfParameter::class, mappedBy: 'ConfPdfType')]
    private $confPdfParameters;

    public function __construct()
    {
        $this->confPdfParameters = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAbriviation(): ?string
    {
        return $this->abriviation;
    }

    public function setAbriviation(string $abriviation): self
    {
        $this->abriviation = $abriviation;

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

    /**
     * @return Collection|ConfPdfParameter[]
     */
    public function getConfPdfParameters(): Collection
    {
        return $this->confPdfParameters;
    }

    public function addConfPdfParameter(ConfPdfParameter $confPdfParameter): self
    {
        if (!$this->confPdfParameters->contains($confPdfParameter)) {
            $this->confPdfParameters[] = $confPdfParameter;
            $confPdfParameter->setConfPdfType($this);
        }

        return $this;
    }

    public function removeConfPdfParameter(ConfPdfParameter $confPdfParameter): self
    {
        if ($this->confPdfParameters->contains($confPdfParameter)) {
            $this->confPdfParameters->removeElement($confPdfParameter);
            // set the owning side to null (unless already changed)
            if ($confPdfParameter->getConfPdfType() === $this) {
                $confPdfParameter->setConfPdfType(null);
            }
        }

        return $this;
    }
}
