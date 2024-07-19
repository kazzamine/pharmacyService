<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

#[ORM\Table(name: 'u_sous_famille')]
#[ORM\Entity(repositoryClass: \App\Repository\USousFamilleRepository::class)]
class USousFamille
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255, unique: true)]
    #[Assert\NotBlank]
    private $code;

    #[ORM\Column(type: 'string', length: 255)]
    #[Assert\NotBlank]
    private $designation;

    #[ORM\JoinColumn(nullable: false)]
    #[ORM\ManyToOne(targetEntity: \App\Entity\Ufamille::class, inversedBy: 'usousfamilles')]
    private $famille;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(string $code): self
    {
        $this->code = $code;

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

    public function getFamille(): ?Ufamille
    {
        return $this->famille;
    }

    public function setFamille(?Ufamille $famille): self
    {
        $this->famille = $famille;

        return $this;
    }

}
