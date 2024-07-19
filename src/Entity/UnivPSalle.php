<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * PSalles
 */
#[ORM\Table(name: 'univ_p_salle')]
#[ORM\Entity]
class UnivPSalle
{
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
    #[ORM\Column(type: 'string', length: 150, nullable: true)]
    private $designation;

    /**
     * @var string
     *
     */
    #[Assert\NotBlank]
    #[ORM\Column(type: 'string', length: 100, nullable: true)]
    private $abreviation;

   

    /**
     * @var string
     */
    #[ORM\Column(name: 'xIP', type: 'string', length: 45, nullable: true)]
    private $xip;

    /**
     * @var integer
     */
    #[ORM\Column(name: 'EtatPC', type: 'smallint', nullable: true)]
    private $etatpc ;

    /**
     * @var integer
     */
    #[ORM\Column(name: 'Attente', type: 'integer', nullable: true)]
    private $attente ;
    
    
       /**
     * @var integer
     */
    #[ORM\Column(name: 'Groupe', type: 'string', nullable: true)]
    private $groupe ;
    
    
    /**
     * @var integer
     */
    #[ORM\Column(type: 'boolean', nullable: true)]
    private $active;
    
    
     #[ORM\JoinColumn(referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \UnivPEtage::class)]
    private $etage;

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

    public function getXip(): ?string
    {
        return $this->xip;
    }

    public function setXip(?string $xip): self
    {
        $this->xip = $xip;

        return $this;
    }

    public function getEtatpc(): ?int
    {
        return $this->etatpc;
    }

    public function setEtatpc(?int $etatpc): self
    {
        $this->etatpc = $etatpc;

        return $this;
    }

    public function getAttente(): ?int
    {
        return $this->attente;
    }

    public function setAttente(?int $attente): self
    {
        $this->attente = $attente;

        return $this;
    }

    public function getGroupe(): ?string
    {
        return $this->groupe;
    }

    public function setGroupe(?string $groupe): self
    {
        $this->groupe = $groupe;

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

    public function getEtage(): ?UnivPEtage
    {
        return $this->etage;
    }

    public function setEtage(?UnivPEtage $etage): self
    {
        $this->etage = $etage;

        return $this;
    }
}
