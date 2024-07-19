<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: \App\Repository\EcritureComptableRepository::class)]
class EcritureComptable
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $libelleEc;
    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $libelleEcCp;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $code;
    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $operation;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $compteConsolide;

    public function getId(): ?int
    {
        return $this->id;
    }


    public function getLibelleEc(): ?string
    {
        return $this->libelleEc;
    }

    public function setLibelleEc(?string $libelleEc): self
    {
        $this->libelleEc = $libelleEc;

        return $this;
    }
    public function getLibelleEcCp(): ?string
    {
        return $this->libelleEcCp;
    }

    public function setLibelleEcCp(?string $libelleEcCp): self
    {
        $this->libelleEcCp = $libelleEcCp;

        return $this;
    }
    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(?string $code): self
    {
        $this->code = $code;

        return $this;
    }
    public function getCompteConsolide(): ?string
    {
        return $this->compteConsolide;
    }

    public function setCompteConsolide(?string $compteConsolide): self
    {
        $this->compteConsolide = $compteConsolide;

        return $this;
    }
    public function getOperation(): ?string
    {
        return $this->operation;
    }

    public function setOperation(?string $operation): self
    {
        $this->operation = $operation;

        return $this;
    }

}
