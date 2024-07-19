<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PSource
 */
#[ORM\Table(name: 'p_source')]
#[ORM\UniqueConstraint(name: 'code_source', columns: ['code_source'])]
#[ORM\Entity]
class PSource
{
    
       #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    /**
     * @var string
     */
    #[ORM\Column(name: 'code_source', type: 'string', length: 100, nullable: false)]
    private $codeSource;

    /**
     * @var string
     */
    #[ORM\Column(name: 'designation', type: 'string', length: 150, nullable: false)]
    private $designation;

    /**
     * @var float
     */
    #[ORM\Column(name: 'solde_initiale', type: 'float', precision: 10, scale: 0, nullable: false)]
    private $soldeInitiale;

    /**
     * @var bool
     */
    #[ORM\Column(name: 'caisse', type: 'boolean', nullable: false)]
    private $caisse = '0';

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCodeSource(): ?string
    {
        return $this->codeSource;
    }

    public function setCodeSource(string $codeSource): self
    {
        $this->codeSource = $codeSource;

        return $this;
    }

    public function getDesignation(): ?string
    {
        return $this->designation;
    }

    public function setDesignation(string $designation): self
    {
        $this->designation = $designation;

        return $this;
    }

    public function getSoldeInitiale(): ?float
    {
        return $this->soldeInitiale;
    }

    public function setSoldeInitiale(float $soldeInitiale): self
    {
        $this->soldeInitiale = $soldeInitiale;

        return $this;
    }

    public function getCaisse(): ?bool
    {
        return $this->caisse;
    }

    public function setCaisse(bool $caisse): self
    {
        $this->caisse = $caisse;

        return $this;
    }


}
