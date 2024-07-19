<?php

namespace App\Entity;

use App\Repository\DevisTechniqueCabRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DevisTechniqueCabRepository::class)]
class DevisTechniqueCab
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $reference;

    #[ORM\ManyToOne(targetEntity: UvDevisdet::class, inversedBy: 'devisTechniqueCabs')]
    private $Devisdet;

    #[ORM\OneToMany(targetEntity: DevisTechniqueDet::class, mappedBy: 'DevisTechniqueCab')]
    private $devisTechniqueDets;

    public function __construct()
    {
        $this->devisTechniqueDets = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getReference(): ?string
    {
        return $this->reference;
    }

    public function setReference(?string $reference): self
    {
        $this->reference = $reference;

        return $this;
    }

    public function getDevisdet(): ?UvDevisdet
    {
        return $this->Devisdet;
    }

    public function setDevisdet(?UvDevisdet $Devisdet): self
    {
        $this->Devisdet = $Devisdet;

        return $this;
    }

    /**
     * @return Collection|DevisTechniqueDet[]
     */
    public function getDevisTechniqueDets(): Collection
    {
        return $this->devisTechniqueDets;
    }

    public function addDevisTechniqueDet(DevisTechniqueDet $devisTechniqueDet): self
    {
        if (!$this->devisTechniqueDets->contains($devisTechniqueDet)) {
            $this->devisTechniqueDets[] = $devisTechniqueDet;
            $devisTechniqueDet->setDevisTechniqueCab($this);
        }

        return $this;
    }

    public function removeDevisTechniqueDet(DevisTechniqueDet $devisTechniqueDet): self
    {
        if ($this->devisTechniqueDets->removeElement($devisTechniqueDet)) {
            // set the owning side to null (unless already changed)
            if ($devisTechniqueDet->getDevisTechniqueCab() === $this) {
                $devisTechniqueDet->setDevisTechniqueCab(null);
            }
        }

        return $this;
    }
}
