<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PDirection
 */
#[ORM\Table(name: 'p_direction')]
#[ORM\Index(name: 'code_direction', columns: ['code_direction'])]
#[ORM\UniqueConstraint(name: 'code_direction_2', columns: ['code_direction'])]
#[ORM\Entity]
class PDirection
{
    
       #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'code_direction', type: 'string', length: 100, nullable: true)]
    private $codeDirection;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'direction', type: 'string', length: 100, nullable: true)]
    private $direction;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'utlisateur', type: 'string', length: 100, nullable: true)]
    private $utlisateur;

    /**
     * @var \DateTime
     */
    #[ORM\Column(name: 'datecreation', type: 'datetime', nullable: false, options: ['default' => 'CURRENT_TIMESTAMP'])]
    private $datecreation = 'CURRENT_TIMESTAMP';

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCodeDirection(): ?string
    {
        return $this->codeDirection;
    }

    public function setCodeDirection(?string $codeDirection): self
    {
        $this->codeDirection = $codeDirection;

        return $this;
    }

    public function getDirection(): ?string
    {
        return $this->direction;
    }

    public function setDirection(?string $direction): self
    {
        $this->direction = $direction;

        return $this;
    }

    public function getUtlisateur(): ?string
    {
        return $this->utlisateur;
    }

    public function setUtlisateur(?string $utlisateur): self
    {
        $this->utlisateur = $utlisateur;

        return $this;
    }

    public function getDatecreation(): ?\DateTimeInterface
    {
        return $this->datecreation;
    }

    public function setDatecreation(\DateTimeInterface $datecreation): self
    {
        $this->datecreation = $datecreation;

        return $this;
    }


}
