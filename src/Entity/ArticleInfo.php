<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: \App\Repository\ArticleInfoRepository::class)]
class ArticleInfo
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $code;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $classTheraeutique;

    #[ORM\ManyToOne(targetEntity: \App\Entity\Uarticle::class, inversedBy: 'articleInfos')]
    private $article;

    #[ORM\ManyToOne(targetEntity: \App\Entity\Dosage::class, inversedBy: 'articleInfos')]
    private $dosage;

    #[ORM\ManyToOne(targetEntity: \App\Entity\Forme::class, inversedBy: 'articleInfos')]
    private $forme;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(?string $code): self
    {
        $this->code = $code;

        return $this;
    }

    public function getClassTheraeutique(): ?string
    {
        return $this->classTheraeutique;
    }

    public function setClassTheraeutique(?string $classTheraeutique): self
    {
        $this->classTheraeutique = $classTheraeutique;

        return $this;
    }

    public function getArticle(): ?UArticle
    {
        return $this->article;
    }

    public function setArticle(?UArticle $article): self
    {
        $this->article = $article;

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

    public function getForme(): ?Forme
    {
        return $this->forme;
    }

    public function setForme(?Forme $forme): self
    {
        $this->forme = $forme;

        return $this;
    }
}
