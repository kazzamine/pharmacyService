<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;


#[ORM\Table(name: 'u_x_banque')]
#[UniqueEntity('code')]
#[ORM\Entity(repositoryClass: \App\Repository\UXBanqueRepository::class)]
class UXBanque
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 100, nullable: true)]
    private $code;

    #[Assert\NotBlank]
    #[ORM\Column(type: 'string', length: 50, nullable: true)]
    private $abr;

    #[Assert\NotBlank]
    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $designation;

     /**
     * @var string|null
     */
    #[ORM\Column(type: 'boolean', nullable: true)]
    private $active;


        #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $oldSys;

    public function getOldSys(): ?string
    {
        return $this->oldSys;
    }

    public function setOldSys(?string $oldSys): self
    {
        $this->oldSys = $oldSys;

        return $this;
    }
    
    public function getId(): ?int
    {
        return $this->id;
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

    public function getActive(): ?bool
    {
        return $this->active;
    }

    public function setActive(?bool $active): self
    {
        $this->active = $active;

        return $this;
    }
    public function getAbr(): ?string
    {
        return $this->abr;
    }

    public function setAbr(?string $abr): self
    {
        $this->abr = $abr;

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
