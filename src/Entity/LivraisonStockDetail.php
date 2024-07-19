<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\LivraisonStockDetailRepository;

#[ORM\Entity(repositoryClass: LivraisonStockDetailRepository::class)]
class LivraisonStockDetail
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $lot;

    #[ORM\Column(type: 'datetime')]
    private $date_expir;

    #[ORM\Column(type: 'integer')]
    private $quantite;
    #[ORM\Column(type: 'integer')]
    private $idmovarticulo;

 #[ORM\JoinColumn(nullable: false)]
    #[ORM\ManyToOne(targetEntity: PNaturePrix::class)]
    private $nature_prix;

    #[ORM\Column(type: 'float')]
    private $prix_vente_ttc;

    #[ORM\Column(type: 'float')]
    private $tva;

    #[ORM\Column(type: 'float')]
    private $prix_achat_ht;



    #[ORM\Column(type: 'datetime')]
    private $date_sys;

#[ORM\JoinColumn(nullable: false)]
#[ORM\ManyToOne(targetEntity: LivraisonStockDet::class, inversedBy: 'livraisonStockDetails', cascade: ['persist'])]
private $livraisonStockDet;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLot(): ?string
    {
        return $this->lot;
    }

    public function setLot(string $lot): self
    {
        $this->lot = $lot;

        return $this;
    }

    public function getDateExpir(): ?\DateTimeInterface
    {
        return $this->date_expir;
    }

    public function setDateExpir(\DateTimeInterface $date_expir): self
    {
        $this->date_expir = $date_expir;

        return $this;
    }



    public function getQuantite(): ?int
    {
        return $this->quantite;
    }

    public function setQuantite(int $quantite): self
    {
        $this->quantite = $quantite;

        return $this;
    }
    public function getIdmovarticulo(): ?int
    {
        return $this->idmovarticulo;
    }

    public function setIdmovarticulo(int $idmovarticulo): self
    {
        $this->idmovarticulo = $idmovarticulo;

        return $this;
    }

    public function getNaturePrix(): ?PNaturePrix
    {
        return $this->nature_prix;
    }

    public function setNaturePrix(?PNaturePrix $nature_prix): self
    {
        $this->nature_prix = $nature_prix;

        return $this;
    }

    public function getPrixVenteTtc(): ?float
    {
        return $this->prix_vente_ttc;
    }

    public function setPrixVenteTtc(float $prix_vente_ttc): self
    {
        $this->prix_vente_ttc = $prix_vente_ttc;

        return $this;
    }







    public function getTva(): ?float
    {
        return $this->tva;
    }

    public function setTva(float $tva): self
    {
        $this->tva = $tva;

        return $this;
    }

    public function getPrixAchatHt(): ?float
    {
        return $this->prix_achat_ht;
    }

    public function setPrixAchatHt(float $prix_achat_ht): self
    {
        $this->prix_achat_ht = $prix_achat_ht;

        return $this;
    }





    public function getDateSys(): ?\DateTimeInterface
    {
        return $this->date_sys;
    }

    public function setDateSys(\DateTimeInterface $date_sys): self
    {
        $this->date_sys = $date_sys;

        return $this;
    }

    public function getLivraisonStockDet(): ?LivraisonStockDet
    {
        return $this->livraisonStockDet;
    }
    
    public function setLivraisonStockDet(?LivraisonStockDet $livraisonStockDet): self
    {
        $this->livraisonStockDet = $livraisonStockDet;
    
        return $this;
    }
}
