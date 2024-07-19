<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Table(name: 'univ_xseance_stage')]
#[ORM\Entity(repositoryClass: \App\Repository\UnivXSeanceStageRepository::class)]
class UnivXSeanceStage
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: 'ID', type: 'integer')]
    private $id;

    #[ORM\Column(name: 'ID_Séance', type: 'integer')]
    private $idSeance;

    #[ORM\Column(name: 'ID_Groupe_Stage', type: 'integer')]
    private $idGroupeStage;

    #[ORM\Column(name: 'ID_Service', type: 'integer')]
    private $idService;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdSeance(): ?int
    {
        return $this->idSeance;
    }

    public function setIdSeance(int $idSeance): self
    {
        $this->idSeance = $idSeance;

        return $this;
    }

    public function getIdGroupeStage(): ?int
    {
        return $this->idGroupeStage;
    }

    public function setIdGroupeStage(int $idGroupeStage): self
    {
        $this->idGroupeStage = $idGroupeStage;

        return $this;
    }

    public function getIdService(): ?int
    {
        return $this->idService;
    }

    public function setIdService(int $idService): self
    {
        $this->idService = $idService;

        return $this;
    }
}
