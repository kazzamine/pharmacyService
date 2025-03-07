<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * UvFacturedet
 */
#[ORM\Table(name: 'uv_facturedet')]
#[ORM\Entity(repositoryClass: \App\Repository\UvFacturedetRepository::class)]
class UvFacturedet
{

    use  DetailChampCalcule;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\JoinColumn(name: 'u_article_id', referencedColumnName: 'id')]
    #[Assert\NotBlank]
    #[ORM\ManyToOne(targetEntity: \App\Entity\Uarticle::class, fetch: 'EAGER')]
    private $article;

    #[ORM\JoinColumn(name: 'p_unite_id', referencedColumnName: 'id')]
    #[Assert\NotBlank]
    #[ORM\ManyToOne(targetEntity: \App\Entity\PUnite::class)]
    private $unite;

    /**
     *  /**
     * @var float|null
     *
     *
     */
    #[Assert\NotBlank]
    #[ORM\Column(name: 'quantite', type: 'float', precision: 10, scale: 0, nullable: true)]
    private $quantite;

    /**
     * @var float|null
     */
    #[Assert\NotBlank]
    #[ORM\Column(name: 'prixunitaire', type: 'float', precision: 10, scale: 0, nullable: true)]
    private $prixunitaire;

    /**
     * @var float|null
     */
    #[Assert\Range(min: 0, max: 100)]
    #[ORM\Column(name: 'tva', type: 'float', precision: 10, scale: 0, nullable: true)]
    private $tva = 0;

    /**
     * @var float|null
     */
    #[ORM\Column(name: 'prixttc', type: 'float', precision: 10, scale: 0, nullable: true)]
    private $prixttc;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'observation', type: 'text', nullable: true)]
    private $observation;

    #[ORM\JoinColumn(name: 'uv_facturecab_id', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \App\Entity\UvFacturecab::class, inversedBy: 'details')]
    private $cab;



    
    #[Assert\Range(min: 0, max: 100)]
    #[Assert\Type(type: 'numeric')]
    #[ORM\Column(type: 'float', nullable: true)]
    private $remise = 0;


    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $oldSys;
    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $planComptableVente;
    #[ORM\Column(type: 'string', length: 10, nullable: true)]
    private $sens;




    public function getOldSys(): ?string
    {
        return $this->oldSys;
    }

    public function setOldSys(?string $oldSys): self
    {
        $this->oldSys = $oldSys;

        return $this;
    }



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUnite(): ?PUnite
    {
        return $this->unite;
    }

    public function setUnite(?PUnite $unite): self
    {
        $this->unite = $unite;

        return $this;
    }

    public function getQuantite(): ?float
    {
        return $this->quantite;
    }

    public function setQuantite(?float $quantite): self
    {
        $this->quantite = $quantite;

        return $this;
    }

    public function getPrixunitaire(): ?float
    {
        return $this->prixunitaire;
    }

    public function setPrixunitaire(?float $prixunitaire): self
    {
        $this->prixunitaire = $prixunitaire;

        return $this;
    }

    public function getTva(): ?float
    {
        return $this->tva;
    }

    public function setTva(?float $tva): self
    {
        $this->tva = $tva;

        return $this;
    }

    public function getPrixttc(): ?float
    {
        return $this->prixttc;
    }

    public function setPrixttc(?float $prixttc): self
    {
        $this->prixttc = $prixttc;

        return $this;
    }

    public function getObservation(): ?string
    {
        return $this->observation;
    }

    public function setObservation(?string $observation): self
    {
        $this->observation = $observation;

        return $this;
    }
    public function getPlanComptableVente(): ?string
    {
        return $this->planComptableVente;
    }

    public function setPlanComptableVente(?string $planComptableVente): self
    {
        $this->planComptableVente = $planComptableVente;

        return $this;
    }
    public function getSens(): ?string
    {
        return $this->sens;
    }

    public function setSens(?string $sens): self
    {
        $this->sens = $sens;

        return $this;
    }

    public function getArticle(): ?Uarticle
    {
        return $this->article;
    }

    public function setArticle(?Uarticle $article): self
    {
        $this->article = $article;

        return $this;
    }

    public function getCab(): ?UvFacturecab
    {
        return $this->cab;
    }

    public function setCab(?UvFacturecab $cab): self
    {
        $this->cab = $cab;

        return $this;
    }





    public function getRemise(): ?float
    {
        return $this->remise;
    }

    public function setRemise(?float $remise): self
    {
        $this->remise = $remise;

        return $this;
    }

    public function getPrixRemise(): ?float
    {
        return (($this->prixunitaire * $this->quantite) * ($this->remise) / 100);
    }

    public function getPrixHt(): ?float
    {
        return ($this->prixunitaire * $this->quantite);
    }

    public function getPrixTva(): ?float
    {
        $prixTva = ($this->getPrixHt() * $this->getTva()) / 100;

        $prixTva = $prixTva - (($prixTva * $this->getRemise()) / 100);

        return $prixTva;
    }
    public function getPrixTvaN(): ?float
    {
        $prixTva = ($this->getPrixHt() * $this->getTva()) / 100;
        $prixTva = $prixTva - (($prixTva * $this->getCab()->getRemise()) / 100);

        return $prixTva;
    }


    public function getPrixTTcAvecRemise(): ?float
    {


        return $this->getPrixHt() + $this->getPrixTva() - $this->getPrixRemise();
    }



    public function getTotalPrixTtc(): ?float
    {


        return $this->getPrixHt() + $this->getPrixTva();
    }
}
