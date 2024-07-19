<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: \App\Repository\SiteLivraisonRepository::class)]
class SiteLivraison
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $nom;

    #[ORM\OneToMany(targetEntity: \App\Entity\TAchatdemandeinternecab::class, mappedBy: 'SiteLivraison')]
    private $tAchatdemandeinternecabs;

    public function __construct()
    {
        $this->tAchatdemandeinternecabs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    /**
     * @return Collection|TAchatdemandeinternecab[]
     */
    public function getTAchatdemandeinternecabs(): Collection
    {
        return $this->tAchatdemandeinternecabs;
    }

    public function addTAchatdemandeinternecab(TAchatdemandeinternecab $tAchatdemandeinternecab): self
    {
        if (!$this->tAchatdemandeinternecabs->contains($tAchatdemandeinternecab)) {
            $this->tAchatdemandeinternecabs[] = $tAchatdemandeinternecab;
            $tAchatdemandeinternecab->setSiteLivraison($this);
        }

        return $this;
    }

    public function removeTAchatdemandeinternecab(TAchatdemandeinternecab $tAchatdemandeinternecab): self
    {
        if ($this->tAchatdemandeinternecabs->contains($tAchatdemandeinternecab)) {
            $this->tAchatdemandeinternecabs->removeElement($tAchatdemandeinternecab);
            // set the owning side to null (unless already changed)
            if ($tAchatdemandeinternecab->getSiteLivraison() === $this) {
                $tAchatdemandeinternecab->setSiteLivraison(null);
            }
        }

        return $this;
    }
}
