<?php

namespace App\Entity;


use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use App\Repository\CcCategorieTiersRepository;
use Doctrine\Common\Collections\ArrayCollection;

#[ORM\Table(name: 'cc_categorie_tiers')]
#[ORM\Entity(repositoryClass: CcCategorieTiersRepository::class)]
class CcCategorieTiers {

    /**
     * @var int
     */
    #[ORM\Column(name: 'id', type: 'integer')]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    private $id;

    /**
     * @var string
     *
     *
     */
    #[ORM\Column(name: 'categorie_tiers', type: 'string', length: 255)]
    private $categorieTiers;
    /**
     * @var string
     *
     *
     */
    #[ORM\Column(name: 'cc_vente', type: 'string', length: 255)]
    private $vente;



     /**
     * @var string
     *
     *
     */
    #[ORM\Column(name: 'cc_achat', type: 'string', length: 255)]
    private $achat;

    


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAchat(): ?string
    {
        return $this->achat;
    }
    public function setAchat($achat)
    {
        $this->achat = $achat;
        return $this;
    }
    public function getVente(): ?string
    {
        return $this->vente;
    }
    public function setVente($vente)
    {
        $this->vente = $vente;
        return $this;
    }

    public function getCategorieTiers(): ?string
    {
        return $this->categorieTiers;
    }
    public function setCategorieTiers(?string $categorieTiers)
    {
        $this->categorieTiers = $categorieTiers;
        return $this;
    }

    
    
}
