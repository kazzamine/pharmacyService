<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TConditionpaiement
 */
#[ORM\Table(name: 't_conditionpaiement')]
#[ORM\Entity]
class TConditionpaiement
{
    
       #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

     
     #[ORM\JoinColumn(name: 'uv_facturecab_id', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \App\Entity\UvFacturecab::class, inversedBy: 'details', cascade: ['persist'])]
    private $facture;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'conditionpaie', type: 'text', length: 65535, nullable: true)]
    private $conditionpaie;

    /**
     * @var \DateTime
     */
    #[ORM\Column(name: 'date_creation', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private $dateCreation;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFacture(): ?UvFacturecab
    {
        return $this->facture;
    }

    public function setFacture(?UvFacturecab $facture): self
    {
        $this->facture = $facture;

        return $this;
    }

    public function getConditionpaie(): ?string
    {
        return $this->conditionpaie;
    }

    public function setConditionpaie(?string $conditionpaie): self
    {
        $this->conditionpaie = $conditionpaie;

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


}
