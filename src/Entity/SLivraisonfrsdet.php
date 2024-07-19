<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * s_livraisonfrsdet
 */
#[ORM\Table(name: 's_livraisonfrsdet')]
#[ORM\Entity]
class SLivraisonfrsdet
{

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\JoinColumn(name: 'u_article_id', referencedColumnName: 'id')]
    #[Assert\NotBlank]
    #[ORM\ManyToOne(targetEntity: \App\Entity\Uarticle::class)]
    private $article;

    #[ORM\Column(name: 'brd', type: 'integer', length: 11)]
    private $brd = 0;

    /**
     *  /**
     * @var float|null
     *
     *
     */
    #[Assert\NotBlank]
    #[ORM\Column(name: 'quantite', type: 'float', precision: 10, scale: 0, nullable: true)]
    private $quantite;

    #[ORM\ManyToOne(targetEntity: DemandStockCab::class, inversedBy: 'demandeStockDets')]
    private $demandeCab;
    
    
    #[ORM\JoinColumn(name: 'user', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \User::class)]
    private $user;
    
    
    #[ORM\Column(type: 'datetime', nullable: true)]
    private $date;
    
    
    public function getId(): ?int
    {
        return $this->id;
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



    public function getArticle(): ?Uarticle
    {
        return $this->article;
    }

    public function setArticle(?Uarticle $article): self
    {
        $this->article = $article;

        return $this;
    }
    public function getDemandeCab(): ?DemandStockCab
    {
        return $this->demandeCab;
    }

    public function setDemandeCab(?DemandStockCab $demandeCab): self
    {
        $this->demandeCab = $demandeCab;

        return $this;
    }
    
    public function getUser(): ?User {
        return $this->user;
    }

    public function setUser(?User $user): self {
        $this->user = $user;

        return $this;
    }
    public function getBrd(): ?int
    {
        return $this->brd;
    }

    public function setBrd(?int $brd): self
    {
        $this->brd = $brd;

        return $this;
    }
    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(?\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }


}
