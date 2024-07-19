<?php

namespace App\Entity;

use App\Entity\UmouvementType;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinColumn;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: \App\Repository\UtransferdetRepository::class)]
#[ORM\HasLifecycleCallbacks]
class Utransferdet
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;
 
    #[JoinColumn(name: 'Utransfercab_id', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \App\Entity\Utransfercab::class)]
    private $Utransfercab;
    #[JoinColumn(name: 'article_id', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \App\Entity\Uarticle::class)]
    private $article;
    #[ORM\Column(type: 'float', nullable: true)]
    private $quantitie;


    public function getId(): ?int
    {
        return $this->id;
    }

  

    public function getUtransfercab(): ?Utransfercab
    {
        return $this->Utransfercab;
    }

    public function setUtransfercab(?Utransfercab $Utransfercab): self
    {
        $this->Utransfercab = $Utransfercab;

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
    public function getQuantitie(): ?float
    {
        return $this->quantitie;
    }

    public function setQuantitie(?float $quantitie): self
    {
        $this->quantitie = $quantitie;

        return $this;
    }

    
}
