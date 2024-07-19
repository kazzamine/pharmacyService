<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Table(name: 'univ_checkinout')]
#[ORM\Entity(repositoryClass: \App\Repository\UnivCheckinoutRepository::class)]
class UnivCheckinout
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'integer')]
    private $userid;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private $checktime;

    #[ORM\Column(type: 'string', length: 1, nullable: true)]
    private $checktype;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $verifycode;

    #[ORM\Column(type: 'string', length: 5, nullable: true)]
    private $sensorid;

    #[ORM\Column(type: 'string', length: 30, nullable: true)]
    private $memoinfo;

    #[ORM\Column(type: 'string', length: 24, nullable: true)]
    private $workcode;

    #[ORM\Column(type: 'string', length: 20, nullable: true)]
    private $sn;

    #[ORM\Column(type: 'smallint', nullable: true)]
    private $userextfmt;

    #[ORM\Column(type: 'string', length: 60)]
    private $dbl;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUserid(): ?int
    {
        return $this->userid;
    }

    public function setUserid(int $userid): self
    {
        $this->userid = $userid;

        return $this;
    }

    public function getChecktime(): ?\DateTimeInterface
    {
        return $this->checktime;
    }

    public function setChecktime(?\DateTimeInterface $checktime): self
    {
        $this->checktime = $checktime;

        return $this;
    }

    public function getChecktype(): ?string
    {
        return $this->checktype;
    }

    public function setChecktype(?string $checktype): self
    {
        $this->checktype = $checktype;

        return $this;
    }

    public function getVerifycode(): ?int
    {
        return $this->verifycode;
    }

    public function setVerifycode(?int $verifycode): self
    {
        $this->verifycode = $verifycode;

        return $this;
    }

    public function getSensorid(): ?string
    {
        return $this->sensorid;
    }

    public function setSensorid(?string $sensorid): self
    {
        $this->sensorid = $sensorid;

        return $this;
    }

    public function getMemoinfo(): ?string
    {
        return $this->memoinfo;
    }

    public function setMemoinfo(?string $memoinfo): self
    {
        $this->memoinfo = $memoinfo;

        return $this;
    }

    public function getWorkcode(): ?string
    {
        return $this->workcode;
    }

    public function setWorkcode(?string $workcode): self
    {
        $this->workcode = $workcode;

        return $this;
    }

    public function getSn(): ?string
    {
        return $this->sn;
    }

    public function setSn(?string $sn): self
    {
        $this->sn = $sn;

        return $this;
    }

    public function getUserextfmt(): ?int
    {
        return $this->userextfmt;
    }

    public function setUserextfmt(?int $userextfmt): self
    {
        $this->userextfmt = $userextfmt;

        return $this;
    }

    public function getDbl(): ?string
    {
        return $this->dbl;
    }

    public function setDbl(string $dbl): self
    {
        $this->dbl = $dbl;

        return $this;
    }
}
