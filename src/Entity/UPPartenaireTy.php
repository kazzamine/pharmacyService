<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UPPartenaire
 */
#[ORM\Table(name: 'u_p_partenaire_ty')]
#[ORM\Entity]
class UPPartenaireTy {

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    /**
     * @var string|null
     */
    #[ORM\Column(type: 'string', length: 100, nullable: true)]
    private $abreviation;

    /**
     * @var string|null
     */
    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $designation;

    /**
     * @var string|null
     */
    #[ORM\Column(type: 'boolean', nullable: true)]
    private $active;

    public function getId(): ?int
    {
        return $this->id;
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
    public function __toString()
    {
        return $this->id;
    }
}
