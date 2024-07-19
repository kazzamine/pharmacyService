<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Table(name: 'univ_num_run_deil')]
#[ORM\Entity(repositoryClass: \App\Repository\UnivNumRunDeilRepository::class)]
class UnivNumRunDeil
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(name: 'NUM_RUNID', type: 'smallint')]
    private $numRund;

    #[ORM\Column(type: 'datetime')]
    private $starttime;

    #[ORM\Column(type: 'datetime')]
    private $endtime;

    #[ORM\Column(type: 'smallint', nullable: true)]
    private $sdays;

    #[ORM\Column(type: 'smallint', nullable: true)]
    private $edays;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $schclassid;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $overtime;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumRund(): ?int
    {
        return $this->numRund;
    }

    public function setNumRund(int $numRund): self
    {
        $this->numRund = $numRund;

        return $this;
    }

    public function getStarttime(): ?\DateTimeInterface
    {
        return $this->starttime;
    }

    public function setStarttime(\DateTimeInterface $starttime): self
    {
        $this->starttime = $starttime;

        return $this;
    }

    public function getEndtime(): ?\DateTimeInterface
    {
        return $this->endtime;
    }

    public function setEndtime(\DateTimeInterface $endtime): self
    {
        $this->endtime = $endtime;

        return $this;
    }

    public function getSdays(): ?int
    {
        return $this->sdays;
    }

    public function setSdays(?int $sdays): self
    {
        $this->sdays = $sdays;

        return $this;
    }

    public function getEdays(): ?int
    {
        return $this->edays;
    }

    public function setEdays(?int $edays): self
    {
        $this->edays = $edays;

        return $this;
    }

    public function getSchclassid(): ?int
    {
        return $this->schclassid;
    }

    public function setSchclassid(?int $schclassid): self
    {
        $this->schclassid = $schclassid;

        return $this;
    }

    public function getOvertime(): ?int
    {
        return $this->overtime;
    }

    public function setOvertime(?int $overtime): self
    {
        $this->overtime = $overtime;

        return $this;
    }
}
