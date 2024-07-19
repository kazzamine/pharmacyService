<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: \App\Repository\DemandeTypeOpRepository::class)]
#[ORM\HasLifecycleCallbacks]
class DemandeTypeOp
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;
    
        #[ORM\Column(type: 'float', length: 11, nullable: true)]
    private $active;

  
    #[ORM\Column(type: 'text', nullable: true)]
    private $designation;
    #[ORM\Column(type: 'text', nullable: true)]
    private $code;

   
    public function getId(): ?int
    {
        return $this->id;
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
   
    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(?string $code): self
    {
        $this->code = $code;

        return $this;
    }
    public function getActive(): ?float
    {
        return $this->active;
    }

    public function setActive(?float $active): self
    {
        $this->active = $active;

        return $this;
    }

    
}
