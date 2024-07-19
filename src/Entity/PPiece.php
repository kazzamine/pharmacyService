<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Table(name: 'p_piece')]
#[ORM\Entity(repositoryClass: \App\Repository\PPieceRepository::class)]
class PPiece
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[Assert\NotBlank]
    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $code;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $designation;

     /**
     * @var string|null
     */
    #[ORM\Column(type: 'boolean', nullable: true)]
    private $active;
    
        #[ORM\OneToMany(targetEntity: \App\Entity\TrTransaction::class, mappedBy: 'ppicedpm')]
    private $transactions;

    #[ORM\Column(type: 'boolean', nullable: true)]
    private $isCharge;
    #[ORM\Column(type: 'boolean', nullable: true)]
    private $isInterne;
    
    #[ORM\Column(type: 'boolean', nullable: true)]
    private $isEnc;
    
    #[ORM\Column(type: 'integer', length: 1, nullable: true)]
    private $sens;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $journal;
    
    public function getJournal(): ?string
    {
        return $this->journal;
    }

    public function setJournal(?string $journal): self
    {
        $this->journal = $journal;

        return $this;
    }


    public function __construct() {
        $this->transactions = new ArrayCollection();
        // $this->operations = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }
    /**
     * @return Collection|TrTransaction[]
     */
    public function getTransactions(): Collection {
        return $this->transactions;
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




    public function getActive(): ?bool
    {
        return $this->active;
    }

    public function setActive(?bool $active): self
    {
        $this->active = $active;

        return $this;
    }

    public function getIsCharge(): ?bool
    {
        return $this->isCharge;
    }

    public function setIsCharge(?bool $isCharge): self
    {
        $this->isCharge = $isCharge;

        return $this;
    }
    public function getIsInterne(): ?bool
    {
        return $this->isInterne;
    }

    public function setIsInterne(?bool $isInterne): self
    {
        $this->isInterne = $isInterne;

        return $this;
    }
    public function getIsEnc(): ?bool
    {
        return $this->isEnc;
    }

    public function setIsEnc(?bool $isEnc): self
    {
        $this->isEnc = $isEnc;

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

    public function getSens(): ?int
    {
        return $this->sens;
    }

    public function setSens(?int $sens): self
    {
        $this->sens = $sens;

        return $this;
    }

   

    
}
