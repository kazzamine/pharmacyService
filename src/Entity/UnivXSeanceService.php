<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Table(name: 'univ_xseance_service')]
#[ORM\Entity(repositoryClass: \App\Repository\UnivXSeanceServiceRepository::class)]
class UnivXSeanceService
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: 'ID_Service', type: 'integer')]
    private $id;

    #[ORM\Column(name: 'Service', type: 'string', length: 45)]
    private $service;

    #[ORM\Column(name: 'Type_Service', type: 'string', length: 45)]
    private $typeService;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getService(): ?string
    {
        return $this->service;
    }

    public function setService(string $service): self
    {
        $this->service = $service;

        return $this;
    }

    public function getTypeService(): ?string
    {
        return $this->typeService;
    }

    public function setTypeService(string $typeService): self
    {
        $this->typeService = $typeService;

        return $this;
    }
}
