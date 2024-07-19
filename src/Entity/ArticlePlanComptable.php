<?php

namespace App\Entity;

use App\Entity\Uarticle;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use App\Repository\ArticlePlanComptableRepository;

/**
 * SaveTree
 */
#[ORM\Table(name: 'article_plan_comptable')]
#[ORM\Entity(repositoryClass: ArticlePlanComptableRepository::class)]
class ArticlePlanComptable {

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
    #[ORM\Column(name: 'cc_achat', type: 'string', length: 255)]
    private $achat;
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
    #[ORM\Column(name: 'plan_comptable', type: 'string', length: 255)]
    private $planComptable;

    #[ORM\JoinColumn(name: 'categorie_id', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \App\Entity\PArticleNiveau::class)]
    private $categorie;

    /**
     * @var string
     *
     *
     */
    #[ORM\Column(name: 'compte_1', type: 'string', length: 255)]
    private $compte1;
    /**
     * @var string
     *
     *
     */
    #[ORM\Column(name: 'compte_2', type: 'string', length: 255)]
    private $compte2;

    public function getCompte1(): ?string
    {
        return $this->compte1;
    }
    public function setCompte1(?string $compte1)
    {
        $this->compte1 = $compte1;
        return $this;
    }

    public function getCompte2(): ?string
    {
        return $this->compte2;
    }
    public function setCompte2(?string $compte2)
    {
        $this->compte2 = $compte2;
        return $this;
    }

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
    public function setVente(?string $vente)
    {
        $this->vente = $vente;
        return $this;
    }

    public function getPlanComptable(): ?string
    {
        return $this->planComptable;
    }
    public function setPlanComptable(?string $planComptable)
    {
        $this->planComptable = $planComptable;
        return $this;
    }

    public function getCategorie(): ?PArticleNiveau {
        return $this->categorie;
    }

    public function setCategorie(?PArticleNiveau $categorie): self {
        $this->categorie = $categorie;

        return $this;
    }
    
}
