<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Table(name: 'univ_facetemp')]
#[ORM\Entity(repositoryClass: \App\Repository\UnivFacetempRepository::class)]
class UnivFacetemp
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: 'TEMPLATEID', type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 24, nullable: true)]
    private $userno;

    #[ORM\Column(type: 'integer')]
    private $size;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $pin;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $faceid;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $valid;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $reserve;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $activetime;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $vfcount;

    #[ORM\Column(type: 'blob', nullable: true)]
    private $template;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $userid;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUserno(): ?string
    {
        return $this->userno;
    }

    public function setUserno(?string $userno): self
    {
        $this->userno = $userno;

        return $this;
    }

    public function getSize(): ?int
    {
        return $this->size;
    }

    public function setSize(int $size): self
    {
        $this->size = $size;

        return $this;
    }

    public function getPin(): ?int
    {
        return $this->pin;
    }

    public function setPin(?int $pin): self
    {
        $this->pin = $pin;

        return $this;
    }

    public function getFaceid(): ?int
    {
        return $this->faceid;
    }

    public function setFaceid(?int $faceid): self
    {
        $this->faceid = $faceid;

        return $this;
    }

    public function getValid(): ?int
    {
        return $this->valid;
    }

    public function setValid(?int $valid): self
    {
        $this->valid = $valid;

        return $this;
    }

    public function getReserve(): ?int
    {
        return $this->reserve;
    }

    public function setReserve(?int $reserve): self
    {
        $this->reserve = $reserve;

        return $this;
    }

    public function getActivetime(): ?int
    {
        return $this->activetime;
    }

    public function setActivetime(?int $activetime): self
    {
        $this->activetime = $activetime;

        return $this;
    }

    public function getVfcount(): ?int
    {
        return $this->vfcount;
    }

    public function setVfcount(?int $vfcount): self
    {
        $this->vfcount = $vfcount;

        return $this;
    }

    public function getTemplate()
    {
        return $this->template;
    }

    public function setTemplate($template): self
    {
        $this->template = $template;

        return $this;
    }

    public function getUserid(): ?int
    {
        return $this->userid;
    }

    public function setUserid(?int $userid): self
    {
        $this->userid = $userid;

        return $this;
    }
}
