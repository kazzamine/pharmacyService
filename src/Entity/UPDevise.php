<?php

namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * UPDevise
 */
#[ORM\Table(name: 'u_p_devise')]
#[UniqueEntity('code')]
#[ORM\Entity]
class UPDevise
{
  
       #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    /**
     * @var string
     */
    #[Assert\NotBlank]
    #[ORM\Column(name: 'code', type: 'string', length: 100, nullable: true)]
    private $code;

    /**
     * @var float
     */
    #[ORM\Column(name: 'taux', type: 'float', nullable: true)]
    private $taux ;

    /**
     * @var \DateTime
     */
    #[ORM\Column(name: 'date_creation', type: 'datetime', nullable: true)]
    private $dateCreation ;
    
 

    
    
     /**
     * @var string|null
     */
    #[ORM\Column(name: 'designation', type: 'string', length: 255, nullable: true)]
    private $designation;
    
    
    
    #[Assert\NotBlank]
    #[ORM\Column(name: 'abreviation', type: 'string', length: 20, nullable: true)]
    private $abreviation;
    
    
    
     /**
     * @var string|null
     */
    #[ORM\Column(type: 'boolean', nullable: true)]
    private $active;

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

    public function getTaux(): ?float
    {
        return $this->taux;
    }

    public function setTaux(float $taux): self
    {
        $this->taux = $taux;

        return $this;
    }

    public function getDateCreation(): ?\DateTimeInterface
    {
        return $this->dateCreation;
    }

    public function setDateCreation(\DateTimeInterface $dateCreation): self
    {
        $this->dateCreation = $dateCreation;

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
    
 
   


}
