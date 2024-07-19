<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Table(name: 'univ_schclass')]
#[ORM\Entity(repositoryClass: \App\Repository\UnivSchclassRepository::class)]
class UnivSchclass
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: 'schClassid', type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 20)]
    private $schname;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private $starttime;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private $endtime;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $lateminutes;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $earlyminutes;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $checkin;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $checkout;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $color;

    #[ORM\Column(type: 'smallint', nullable: true)]
    private $autobind;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private $checkintime1;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private $checkintime2;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private $checkouttime1;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private $checkouttime2;

    #[ORM\Column(type: 'float', nullable: true)]
    private $workday;

    #[ORM\Column(type: 'string', length: 5, nullable: true)]
    private $sensorid;

    #[ORM\Column(type: 'float', nullable: true)]
    private $workmins;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSchname(): ?string
    {
        return $this->schname;
    }

    public function setSchname(string $schname): self
    {
        $this->schname = $schname;

        return $this;
    }

    public function getStarttime(): ?\DateTimeInterface
    {
        return $this->starttime;
    }

    public function setStarttime(?\DateTimeInterface $starttime): self
    {
        $this->starttime = $starttime;

        return $this;
    }

    public function getEndtime(): ?\DateTimeInterface
    {
        return $this->endtime;
    }

    public function setEndtime(?\DateTimeInterface $endtime): self
    {
        $this->endtime = $endtime;

        return $this;
    }

    public function getLateminutes(): ?int
    {
        return $this->lateminutes;
    }

    public function setLateminutes(?int $lateminutes): self
    {
        $this->lateminutes = $lateminutes;

        return $this;
    }

    public function getEarlyminutes(): ?int
    {
        return $this->earlyminutes;
    }

    public function setEarlyminutes(?int $earlyminutes): self
    {
        $this->earlyminutes = $earlyminutes;

        return $this;
    }

    public function getCheckin(): ?int
    {
        return $this->checkin;
    }

    public function setCheckin(?int $checkin): self
    {
        $this->checkin = $checkin;

        return $this;
    }

    public function getCheckout(): ?int
    {
        return $this->checkout;
    }

    public function setCheckout(?int $checkout): self
    {
        $this->checkout = $checkout;

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

    public function getAutobind(): ?int
    {
        return $this->autobind;
    }

    public function setAutobind(?int $autobind): self
    {
        $this->autobind = $autobind;

        return $this;
    }

    public function getCheckintime1(): ?\DateTimeInterface
    {
        return $this->checkintime1;
    }

    public function setCheckintime1(?\DateTimeInterface $checkintime1): self
    {
        $this->checkintime1 = $checkintime1;

        return $this;
    }

    public function getCheckintime2(): ?\DateTimeInterface
    {
        return $this->checkintime2;
    }

    public function setCheckintime2(?\DateTimeInterface $checkintime2): self
    {
        $this->checkintime2 = $checkintime2;

        return $this;
    }

    public function getCheckouttime1(): ?\DateTimeInterface
    {
        return $this->checkouttime1;
    }

    public function setCheckouttime1(?\DateTimeInterface $checkouttime1): self
    {
        $this->checkouttime1 = $checkouttime1;

        return $this;
    }

    public function getCheckouttime2(): ?\DateTimeInterface
    {
        return $this->checkouttime2;
    }

    public function setCheckouttime2(?\DateTimeInterface $checkouttime2): self
    {
        $this->checkouttime2 = $checkouttime2;

        return $this;
    }

    public function getWorkday(): ?float
    {
        return $this->workday;
    }

    public function setWorkday(?float $workday): self
    {
        $this->workday = $workday;

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

    public function getWorkmins(): ?float
    {
        return $this->workmins;
    }

    public function setWorkmins(?float $workmins): self
    {
        $this->workmins = $workmins;

        return $this;
    }
}
