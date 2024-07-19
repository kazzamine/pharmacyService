<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * NatureDemande
 */
#[ORM\Table(name: 'univ_nature_demande')]
#[ORM\Entity]
class UnivNatureDemande {
    
    
#[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    /**
     * @var string
     */
    #[ORM\Column(type: 'string', length: 100, nullable: true)]
    private $code;

    /**
     * @var string
     *
     */
    #[Assert\NotBlank]
    #[ORM\Column(type: 'string', length: 200, nullable: true)]
    private $designation;

    /**
     * @var string
     *
     */
    #[Assert\NotBlank]
    #[ORM\Column(type: 'string', length: 200, nullable: true)]
    private $abreviation;

    /**
     * @var integer
     */
    #[ORM\Column(type: 'integer', nullable: true)]
    private $concours;
    
    
     /**
     * @var integer
     */
    #[ORM\Column(type: 'integer', nullable: true)]
    private $rapport;
    
    
     /**
     * @var integer
     */
    #[ORM\Column(type: 'integer', nullable: true)]
    private $rapportOrdre;
    
    
     /**
     * @var integer
     */
    #[ORM\Column(type: 'boolean', nullable: true)]
    private $active = true ;

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

    public function getConcours(): ?int
    {
        return $this->concours;
    }

    public function setConcours(?int $concours): self
    {
        $this->concours = $concours;

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

    public function getRapport(): ?int
    {
        return $this->rapport;
    }

    public function setRapport(?int $rapport): self
    {
        $this->rapport = $rapport;

        return $this;
    }

    public function getRapportOrdre(): ?int
    {
        return $this->rapportOrdre;
    }

    public function setRapportOrdre(?int $rapportOrdre): self
    {
        $this->rapportOrdre = $rapportOrdre;

        return $this;
    }

  
}
