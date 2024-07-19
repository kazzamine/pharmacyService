<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Table(name: 'u_p_commandety')]
#[ORM\UniqueConstraint(name: 'code', columns: ['code'])]
#[UniqueEntity('code')]
#[ORM\Entity(repositoryClass: \App\Repository\UPCommandeTyRepository::class)]
class UPCommandeTy
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;
    
    

    /**
     * @var string
     */
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
    #[ORM\Column(name: 'active', type: 'boolean', nullable: true)]
    private $active =true;
    
    
    
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer', nullable: true)]
    private $ord;


    public function getOrd(): ?int
    {
        return $this->ord;
    }

    public function setOrd(?int $ord): self
    {
        $this->ord = $ord;

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
