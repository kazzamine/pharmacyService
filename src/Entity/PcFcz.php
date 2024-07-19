<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

use Doctrine\ORM\Mapping as ORM;

/**
 * Client
 */
#[ORM\Table(name: 'pc_fcz')]
#[ORM\Entity]
class PcFcz
{
    /**
     * @var int
     */
    #[ORM\Column(name: 'id', type: 'integer')]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    private $id;

    /**
     * @var string
     */
    #[ORM\Column(name: 'acc_0', type: 'string', length: 20, nullable: true)]
    private $acc0;

    /**
     * @var string
     */
    #[ORM\Column(name: 'libelle', type: 'string', length: 255, nullable: true)]
    private $libelle;



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAcc0(): ?string
    {
        return $this->acc0;
    }

    public function setAcc0(?string $acc0): self
    {
        $this->acc0 = $acc0;

        return $this;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(?string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    } 

}
