<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: \App\Repository\UmouvementTypeRepository::class)]
#[ORM\HasLifecycleCallbacks]
class UmouvementType
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

  
    #[ORM\Column(type: 'text', nullable: true)]
    private $designation;

   
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

    
}
