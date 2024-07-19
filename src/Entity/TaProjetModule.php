<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


#[ORM\Entity(repositoryClass: \App\Repository\TaProjetModuleRepository::class)]
#[ORM\HasLifecycleCallbacks]
class TaProjetModule
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;
    
    
    /**
     * @var string
     */
    #[Assert\NotBlank]
    #[ORM\Column(name: 'designation', type: 'string', length: 255, nullable: true)]
    private $designation;

    
    
    /**
     * @var string
     */
    #[ORM\Column(name: 'active', type: 'boolean', nullable: true)]
    private $active;
    


    
     
    #[ORM\JoinColumn(name: 'projet_id', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \TaProjet::class, inversedBy: 'modules')]
    private $projet;
    
    

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

    public function getActive(): ?bool
    {
        return $this->active;
    }

    public function setActive(?bool $active): self
    {
        $this->active = $active;

        return $this;
    }

    public function getProjet(): ?TaProjet
    {
        return $this->projet;
    }

    public function setProjet(?TaProjet $projet): self
    {
        $this->projet = $projet;

        return $this;
    }
}
