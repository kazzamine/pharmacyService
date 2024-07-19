<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Table(name: 'avance')]
#[ORM\Entity(repositoryClass: \App\Repository\AvanceRepository::class)]
class Avance
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'integer')]
    private $commande;

    #[ORM\Column(type: 'float', nullable: false)]
    private $montant;

    #[ORM\Column(type: 'string')]
    private $type;
    #[ORM\OneToMany(targetEntity: UGeneralOperation::class, mappedBy: 'avance')]
    private $operations;


    public function __construct()
    {
        $this->operations = new ArrayCollection();
    }
    /**
     * @return Collection<int, self>
     */
    public function getOperations(): Collection
    {
        return $this->operations;
    }
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCommande(): ?int
    {
        return $this->commande;
    }

    public function setCommande(int $commande): self
    {
        $this->commande = $commande;

        return $this;
    }

    public function getMontant(): ?float
    {
        return $this->montant;
    }

    public function setMontant(float $montant): self
    {
        $this->montant = $montant;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }
}
