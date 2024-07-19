<?php

namespace App\Entity;

use App\Repository\PdocumentRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PdocumentRepository::class)]
class Pdocument
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'integer')]
    private $sousModelId;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $Abreviation;

    #[ORM\Column(type: 'boolean', nullable: true)]
    private $signature;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $designation;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSousModelId(): ?int
    {
        return $this->sousModelId;
    }

    public function setSousModelId(int $sousModelId): self
    {
        $this->sousModelId = $sousModelId;

        return $this;
    }

    public function getAbreviation(): ?string
    {
        return $this->Abreviation;
    }

    public function setAbreviation(?string $Abreviation): self
    {
        $this->Abreviation = $Abreviation;

        return $this;
    }

    public function getSignature(): ?bool
    {
        return $this->signature;
    }

    public function setSignature(?bool $signature): self
    {
        $this->signature = $signature;

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
}
