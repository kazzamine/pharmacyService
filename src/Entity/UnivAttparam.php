<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Table(name: 'univ_attparam')]
#[ORM\Entity(repositoryClass: \App\Repository\UnivAttparamRepository::class)]
class UnivAttparam
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 20)]
    private $paraname;

    #[ORM\Column(type: 'string', length: 2)]
    private $paratype;

    #[ORM\Column(type: 'string', length: 100)]
    private $paravalue;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getParaname(): ?string
    {
        return $this->paraname;
    }

    public function setParaname(string $paraname): self
    {
        $this->paraname = $paraname;

        return $this;
    }

    public function getParatype(): ?string
    {
        return $this->paratype;
    }

    public function setParatype(string $paratype): self
    {
        $this->paratype = $paratype;

        return $this;
    }

    public function getParavalue(): ?string
    {
        return $this->paravalue;
    }

    public function setParavalue(string $paravalue): self
    {
        $this->paravalue = $paravalue;

        return $this;
    }
}
