<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: \App\Repository\ArticleFormeDosageRepository::class)]
class ArticleFormeDosage
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\ManyToOne(targetEntity: \App\Entity\Uarticle::class, inversedBy: 'articleFormeDosages')]
    private $article;

    #[ORM\ManyToOne(targetEntity: \App\Entity\Forme::class, inversedBy: 'articleFormeDosages')]
    private $forme;

    #[ORM\ManyToOne(targetEntity: \App\Entity\Dosage::class, inversedBy: 'ArticleFormeDosage')]
    private $dosage;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getForme(): ?Forme
    {
        return $this->forme;
    }

    public function setForme(?Forme $forme): self
    {
        $this->forme = $forme;

        return $this;
    }

    public function getDosage(): ?Dosage
    {
        return $this->dosage;
    }

    public function setDosage(?Dosage $dosage): self
    {
        $this->dosage = $dosage;

        return $this;
    }
}
