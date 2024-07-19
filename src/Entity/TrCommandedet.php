<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
/**
 * TrCommandedet
 *
 *
 */
#[ORM\Table(name: 'tr_commandedet')]
#[ORM\Entity]
#[UniqueEntity(fields: ['cab', 'article'], errorPath: 'article', message: 'Article dèja utilisé.')]
class TrCommandedet
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\JoinColumn(name: 'u_article_id', referencedColumnName: 'id')]
    #[Assert\NotBlank]
    #[ORM\ManyToOne(targetEntity: \App\Entity\Uarticle::class)]
    private $article ;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'unite', type: 'string', length: 10, nullable: true)]
    private $unite;

    /**
     *  /**
     * @var float|null
     *
     */
    #[Assert\NotBlank]
    #[Assert\Positive]
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
    private $tva;

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

     
    #[ORM\JoinColumn(name: 'tr_commandecab_id', referencedColumnName: 'id', onDelete: 'CASCADE')]
    #[ORM\ManyToOne(targetEntity: \App\Entity\TrCommandecab::class, cascade: ['persist'], inversedBy: 'details')]
    private $cab;
    
    #[ORM\PrePersist]
    public function setCreatedValue() {

        $this->created = new \DateTime();
        
    }

    #[ORM\PreUpdate]
    public function setUpdatedValue() {
        $this->updated = new \DateTime();
    }
    

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUnite(): ?string
    {
        return $this->unite;
    }

    public function setUnite(?string $unite): self
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

    public function getArticle(): ?Uarticle
    {
        return $this->article;
    }

    public function setArticle(?Uarticle $article): self
    {
        $this->article = $article;

        return $this;
    }

    public function getCab(): ?TrCommandecab
    {
        return $this->cab;
    }

    public function setCab(?TrCommandecab $cab): self
    {
        $this->cab = $cab;

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

}