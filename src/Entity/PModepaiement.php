<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * PModepaiement
 */
#[ORM\Table(name: 'p_modepaiement')]
#[ORM\UniqueConstraint(name: 'code_mode', columns: ['code_mode'])]
#[UniqueEntity('codeMode')]
#[ORM\Entity]
class PModepaiement {

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    /**
     * @var string
     */
    #[ORM\Column(name: 'code_mode', type: 'string', length: 100, nullable: true)]
    private $codeMode;

    /**
     * @var string
     */
    #[Assert\NotBlank]
    #[ORM\Column(name: 'designation', type: 'string', length: 150, nullable: false)]
    private $designation;

    /**
     * @var int|null
     */
    #[ORM\Column(name: 'active', type: 'boolean', nullable: true)]
    private $active;


        #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $oldSys;

    

    public function getOldSys(): ?string
    {
        return $this->oldSys;
    }

    public function setOldSys(?string $oldSys): self
    {
        $this->oldSys = $oldSys;

        return $this;
    }

    public function getId(): ?int {
        return $this->id;
    }

    public function getCodeMode(): ?string {
        return $this->codeMode;
    }

    public function setCodeMode(string $codeMode): self {
        $this->codeMode = $codeMode;

        return $this;
    }

    public function getDesignation(): ?string {
        return $this->designation;
    }

    public function setDesignation(string $designation): self {
        $this->designation = $designation;

        return $this;
    }

    public function getActive(): ?bool {
        return $this->active;
    }

    public function setActive(?bool $active): self {
        $this->active = $active;

        return $this;
    }

}
