<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * PNaturePrix
 */
#[ORM\Table(name: 'p_nature_prix')]
#[ORM\Entity(repositoryClass: \App\Repository\PNaturePrixRepository::class)]
#[ORM\HasLifecycleCallbacks]
#[UniqueEntity('code')]
class PNaturePrix
{

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    /**
     * @var string
     *
     */
    #[Assert\NotBlank]
    #[ORM\Column(name: 'code', type: 'string', length: 100, nullable: true)]
    private $code;

    /**
     * @var string
     */
    #[Assert\NotBlank]
    #[ORM\Column(name: 'designation', type: 'string', length: 150, nullable: true)]
    private $designation;





    /**
     * @var string
     */
    #[ORM\Column(name: 'active', type: 'boolean', nullable: true)]
    private $active;



    public function __construct()
    {
    }


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
    public function __toString()
    {
        return $this->code;
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
}
