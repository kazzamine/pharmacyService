<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Table(name: 'univ_xseance_autorisation_lg')]
#[ORM\Entity]
class UnivXSeanceAutorLg
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: 'Auto', type: 'integer')]
    private $id;

    #[ORM\Column(name: 'ID_Autoris', type: 'string', length: 45)]
    private $idAutoris;

    #[ORM\Column(name: 'Date_Echéance', type: 'date')]
    private $dateEcheance;

    #[ORM\Column(name: 'Heure_Début', type: 'datetime')]
    private $heureDebut;

    #[ORM\Column(name: 'Heure_Fin', type: 'datetime')]
    private $heureFin;

    #[ORM\Column(name: 'Statut', type: 'integer', length: 45)]
    private $statut;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdAutoris(): ?string
    {
        return $this->idAutoris;
    }

    public function setIdAutoris(string $idAutoris): self
    {
        $this->idAutoris = $idAutoris;

        return $this;
    }

    public function getDateEcheance(): ?\DateTimeInterface
    {
        return $this->dateEcheance;
    }

    public function setDateEcheance(\DateTimeInterface $dateEcheance): self
    {
        $this->dateEcheance = $dateEcheance;

        return $this;
    }

    public function getHeureDebut(): ?\DateTimeInterface
    {
        return $this->heureDebut;
    }

    public function setHeureDebut(\DateTimeInterface $heureDebut): self
    {
        $this->heureDebut = $heureDebut;

        return $this;
    }

    public function getHeureFin(): ?\DateTimeInterface
    {
        return $this->heureFin;
    }

    public function setHeureFin(\DateTimeInterface $heureFin): self
    {
        $this->heureFin = $heureFin;

        return $this;
    }

    public function getStatut(): ?int
    {
        return $this->statut;
    }

    public function setStatut(int $statut): self
    {
        $this->statut = $statut;

        return $this;
    }
}
