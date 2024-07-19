<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * PUnite
 */
#[ORM\Table(name: 'p_unite')]
#[ORM\UniqueConstraint(name: 'code', columns: ['code'])]
#[ORM\Entity(repositoryClass: \App\Repository\PUniteRepository::class)]
#[ORM\HasLifecycleCallbacks]
#[UniqueEntity('code')]
class PUnite
{
    
       #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    /**
     * @var string
     *
     */
    #[Assert\NotBlank]
    #[ORM\Column(name: 'code', type: 'string', length: 100, nullable: true)]
    private $code;

    /**
     * @var string
     */
    #[Assert\NotBlank]
    #[ORM\Column(name: 'designation', type: 'string', length: 150, nullable: true)]
    private $designation;
    
    /**
     * @var string
     */
    #[Assert\NotBlank]
    #[ORM\Column(name: 'abreviation', type: 'string', length: 100, nullable: true)]
    private $abreviation;
    
    /**
     * @var string
     */
    #[ORM\Column(name: 'type', type: 'string', length: 50, nullable: true)]
    private $type;
    
    
    /**
     * @var string
     */
    #[ORM\Column(name: 'typeDefault', type: 'string', length: 50, nullable: true)]
    private $typeDefault;
    
    /**
     * @var string
     */
    #[ORM\Column(name: 'active', type: 'boolean', nullable: true)]
    private $active;

     #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $oldSys;
    

    public function __construct()
    {
     
    }
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

    public function getDesignation(): ?string
    {
        return $this->designation;
    }
    public function __toString() {
        return $this->code;
    }
    public function setDesignation(?string $designation): self
    {
        $this->designation = $designation;

        return $this;
    }

    public function getAbreviation(): ?string
    {
        return $this->abreviation;
    }

    public function setAbreviation(?string $abreviation): self
    {
        $this->abreviation = $abreviation;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(?string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getTypeDefault(): ?string
    {
        return $this->typeDefault;
    }

    public function setTypeDefault(?string $typeDefault): self
    {
        $this->typeDefault = $typeDefault;

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
