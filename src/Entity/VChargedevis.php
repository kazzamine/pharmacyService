<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * VChargedevis
 */
#[ORM\Table(name: 'v_chargedevis')]
#[ORM\Entity]
class VChargedevis
{
    
       #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'code', type: 'string', length: 100, nullable: true)]
    private $code;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'code_devis', type: 'string', length: 100, nullable: true)]
    private $codeDevis;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'designation', type: 'text', length: 65535, nullable: true)]
    private $designation;

    /**
     * @var float|null
     */
    #[ORM\Column(name: 'quantite', type: 'float', precision: 10, scale: 0, nullable: true)]
    private $quantite;

    /**
     * @var float|null
     */
    #[ORM\Column(name: 'prixunitaire', type: 'float', precision: 10, scale: 0, nullable: true)]
    private $prixunitaire;

    /**
     * @var float|null
     */
    #[Assert\Range(min: 0, max: 100)]
    #[ORM\Column(name: 'tva', type: 'float', precision: 10, scale: 0, nullable: true)]
    private $tva;

    /**
     * @var float|null
     */
    #[ORM\Column(name: 'prixttc', type: 'float', precision: 10, scale: 0, nullable: true)]
    private $prixttc;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'user', type: 'string', length: 100, nullable: true)]
    private $user;

    /**
     * @var \DateTime
     */
    #[ORM\Column(name: 'date_cration', type: 'datetime', nullable: false, options: ['default' => 'CURRENT_TIMESTAMP'])]
    private $dateCration = 'CURRENT_TIMESTAMP';

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

    public function getCodeDevis(): ?string
    {
        return $this->codeDevis;
    }

    public function setCodeDevis(?string $codeDevis): self
    {
        $this->codeDevis = $codeDevis;

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

    public function getQuantite(): ?float
    {
        return $this->quantite;
    }

    public function setQuantite(?float $quantite): self
    {
        $this->quantite = $quantite;

        return $this;
    }

    public function getPrixunitaire(): ?float
    {
        return $this->prixunitaire;
    }

    public function setPrixunitaire(?float $prixunitaire): self
    {
        $this->prixunitaire = $prixunitaire;

        return $this;
    }

    public function getTva(): ?float
    {
        return $this->tva;
    }

    public function setTva(?float $tva): self
    {
        $this->tva = $tva;

        return $this;
    }

    public function getPrixttc(): ?float
    {
        return $this->prixttc;
    }

    public function setPrixttc(?float $prixttc): self
    {
        $this->prixttc = $prixttc;

        return $this;
    }

    public function getUser(): ?string
    {
        return $this->user;
    }

    public function setUser(?string $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getDateCration(): ?\DateTimeInterface
    {
        return $this->dateCration;
    }

    public function setDateCration(\DateTimeInterface $dateCration): self
    {
        $this->dateCration = $dateCration;

        return $this;
    }


}
