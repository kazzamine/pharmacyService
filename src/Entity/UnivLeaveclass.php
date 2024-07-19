<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Table(name: 'univ_leaveclass')]
#[ORM\Entity(repositoryClass: \App\Repository\UnivLeaveclassRepository::class)]
class UnivLeaveclass
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: 'leaveId', type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 20)]
    private $leavename;

    #[ORM\Column(type: 'float', nullable: true)]
    private $minunit;

    #[ORM\Column(type: 'smallint', nullable: true)]
    private $unit;

    #[ORM\Column(type: 'smallint', nullable: true)]
    private $remaindproc;

    #[ORM\Column(type: 'smallint', nullable: true)]
    private $remaindcount;

    #[ORM\Column(type: 'string', length: 4, nullable: true)]
    private $reportsymbol;

    #[ORM\Column(type: 'float', nullable: true)]
    private $deduct;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $color;

    #[ORM\Column(type: 'smallint', nullable: true)]
    private $classify;

    #[ORM\Column(type: 'string', length: 16, nullable: false)]
    private $code;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLeavename(): ?string
    {
        return $this->leavename;
    }

    public function setLeavename(string $leavename): self
    {
        $this->leavename = $leavename;

        return $this;
    }

    public function getMinunit(): ?float
    {
        return $this->minunit;
    }

    public function setMinunit(?float $minunit): self
    {
        $this->minunit = $minunit;

        return $this;
    }

    public function getUnit(): ?int
    {
        return $this->unit;
    }

    public function setUnit(?int $unit): self
    {
        $this->unit = $unit;

        return $this;
    }

    public function getRemaindproc(): ?int
    {
        return $this->remaindproc;
    }

    public function setRemaindproc(?int $remaindproc): self
    {
        $this->remaindproc = $remaindproc;

        return $this;
    }

    public function getRemaindcount(): ?int
    {
        return $this->remaindcount;
    }

    public function setRemaindcount(?int $remaindcount): self
    {
        $this->remaindcount = $remaindcount;

        return $this;
    }

    public function getReportsymbol(): ?string
    {
        return $this->reportsymbol;
    }

    public function setReportsymbol(?string $reportsymbol): self
    {
        $this->reportsymbol = $reportsymbol;

        return $this;
    }

    public function getDeduct(): ?float
    {
        return $this->deduct;
    }

    public function setDeduct(?float $deduct): self
    {
        $this->deduct = $deduct;

        return $this;
    }

    public function getColor(): ?int
    {
        return $this->color;
    }

    public function setColor(?int $color): self
    {
        $this->color = $color;

        return $this;
    }

    public function getClassify(): ?int
    {
        return $this->classify;
    }

    public function setClassify(?int $classify): self
    {
        $this->classify = $classify;

        return $this;
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
}
