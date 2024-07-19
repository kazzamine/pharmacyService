<?php

namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * PStatutgrv
 */
#[ORM\Table(name: 'p_statutgrv')]
#[ORM\Entity(repositoryClass: \App\Repository\PStatutgrvRepository::class)]
#[UniqueEntity('abreviation')]
class PStatutgrv {

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    /**
     * @var string|null
     */
    #[Assert\NotBlank]
    #[ORM\Column(name: 'module', type: 'string', length: 10, nullable: true)]
    private $module;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'fonction', type: 'string', length: 100, nullable: true)]
    private $fonction;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'statut', type: 'string', length: 20, nullable: true)]
    private $statut;

    /**
     * @var string|null
     */
    #[Assert\NotBlank]
    #[ORM\Column(name: 'abreviation', type: 'string', length: 50, nullable: true, unique: true)]
    private $abreviation;

    /**
     * @var int|null
     */
    #[ORM\Column(name: 'affectable', type: 'smallint', nullable: true, options: ['unsigned' => true])]
    private $affectable;

    /**
     * @var int|null
     */
    #[ORM\Column(name: 'next', type: 'smallint', nullable: true, options: ['unsigned' => true])]
    private $next;

    /**
     * @var int|null
     */
    #[ORM\Column(name: 'defaulte', type: 'smallint', nullable: true)]
    private $defaulte = '0';

    /**
     * @var int|null
     */
    #[ORM\Column(name: 'total', type: 'smallint', nullable: true, options: ['unsigned' => true])]
    private $total;

    /**
     * @var int|null
     */
    #[ORM\Column(name: 'partiel', type: 'smallint', nullable: true, options: ['unsigned' => true])]
    private $partiel;

    /**
     * @var int|null
     */
    #[ORM\Column(name: 'couleur', type: 'string', length: 20, nullable: true)]
    private $couleur;

    /**
     * @var int|null
     */
    #[ORM\Column(name: 'active', type: 'boolean', nullable: true)]
    private $active;

    #[ORM\OneToMany(targetEntity: \App\Entity\UaTFacturefrscab::class, mappedBy: 'pStatutgrv')]
    private $uaTFacturefrscabs;

    public function __construct() {
        $this->uaTFacturefrscabs = new ArrayCollection();
    }

    public function getId(): ?int {
        return $this->id;
    }

    public function getModule(): ?string {
        return $this->module;
    }

    public function setModule(?string $module): self {
        $this->module = $module;

        return $this;
    }

    public function getFonction(): ?string {
        return $this->fonction;
    }

    public function setFonction(?string $fonction): self {
        $this->fonction = $fonction;

        return $this;
    }

    public function getStatut(): ?string {
        return $this->statut;
    }

    public function setStatut(?string $statut): self {
        $this->statut = $statut;

        return $this;
    }

    public function getAffectable(): ?int {
        return $this->affectable;
    }

    public function setAffectable(?int $affectable): self {
        $this->affectable = $affectable;

        return $this;
    }

    public function getNext(): ?int {
        return $this->next;
    }

    public function setNext(?int $next): self {
        $this->next = $next;

        return $this;
    }

    public function getDefaulte(): ?int {
        return $this->defaulte;
    }

    public function setDefaulte(?int $defaulte): self {
        $this->defaulte = $defaulte;

        return $this;
    }

    public function getTotal(): ?int {
        return $this->total;
    }

    public function setTotal(?int $total): self {
        $this->total = $total;

        return $this;
    }

    public function getPartiel(): ?int {
        return $this->partiel;
    }

    public function setPartiel(?int $partiel): self {
        $this->partiel = $partiel;

        return $this;
    }

    public function getCouleur(): ?string {
        return $this->couleur;
    }

    public function setCouleur(?string $couleur): self {
        $this->couleur = $couleur;

        return $this;
    }

    public function __toString() {
        return $this->statut;
    }

    public function getAbreviation(): ?string {
        return $this->abreviation;
    }

    public function setAbreviation(?string $abreviation): self {
        $this->abreviation = $abreviation;

        return $this;
    }

    /**
     * @return Collection|UaTFacturefrscab[]
     */
    public function getUaTFacturefrscabs(): Collection {
        return $this->uaTFacturefrscabs;
    }

    public function addUaTFacturefrscab(UaTFacturefrscab $uaTFacturefrscab): self {
        if (!$this->uaTFacturefrscabs->contains($uaTFacturefrscab)) {
            $this->uaTFacturefrscabs[] = $uaTFacturefrscab;
            $uaTFacturefrscab->setPStatutgrv($this);
        }

        return $this;
    }

    public function removeUaTFacturefrscab(UaTFacturefrscab $uaTFacturefrscab): self {
        if ($this->uaTFacturefrscabs->contains($uaTFacturefrscab)) {
            $this->uaTFacturefrscabs->removeElement($uaTFacturefrscab);
            // set the owning side to null (unless already changed)
            if ($uaTFacturefrscab->getPStatutgrv() === $this) {
                $uaTFacturefrscab->setPStatutgrv(null);
            }
        }

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

}
