<?php

namespace App\Entity;

use App\Repository\PArticleNiveauRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PArticleNiveauRepository::class)]
#[ORM\Table(name: "p_article_niveau")]
class PArticleNiveau
{
    #[ORM\Id]
    #[ORM\Column(type: "integer")]
    private ?int $id;

    #[ORM\Column(type: "string", length: 100, nullable: true)]
    private ?string $designation;

    #[ORM\Column(type: "integer", nullable: true)]
    private ?int $niveau;

    #[ORM\ManyToOne(targetEntity: PArticleNiveau::class, inversedBy: "niveaux")]
    #[ORM\JoinColumn(name: "parent_id", nullable: true)]
    private ?self $parent;

    #[ORM\OneToMany(targetEntity: PArticleNiveau::class, mappedBy: "parent")]
    private Collection $niveaux;

    #[ORM\OneToMany(targetEntity: UArticle::class, mappedBy: "niveau")]
    private Collection $articles;

    #[ORM\Column(type: "string", length: 255, nullable: true)]
    private ?string $CCA1;

    #[ORM\Column(type: "string", length: 255, nullable: true)]
    private ?string $CCA2;

    #[ORM\Column(type: "string", length: 255, nullable: true)]
    private ?string $CCA3;

    #[ORM\Column(type: "string", length: 255, nullable: true)]
    private ?string $CCA4;

    public function __construct()
    {
        $this->niveaux = new ArrayCollection();
        $this->articles = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function getDesignation(): ?string
    {
        return $this->designation;
    }

    public function setDesignation(?string $designation): self
    {
        $this->designation = $designation;
        return $this;
    }

    public function getNiveau(): ?int
    {
        return $this->niveau;
    }

    public function setNiveau(?int $niveau): self
    {
        $this->niveau = $niveau;
        return $this;
    }

    public function getParent(): ?self
    {
        return $this->parent;
    }

    public function setParent(?self $parent): self
    {
        $this->parent = $parent;
        return $this;
    }

    public function getNiveaux(): Collection
    {
        return $this->niveaux;
    }

    public function addNiveau(self $niveau): self
    {
        if (!$this->niveaux->contains($niveau)) {
            $this->niveaux[] = $niveau;
            $niveau->setParent($this);
        }
        return $this;
    }

    public function removeNiveau(self $niveau): self
    {
        if ($this->niveaux->removeElement($niveau)) {
            if ($niveau->getParent() === $this) {
                $niveau->setParent(null);
            }
        }
        return $this;
    }

    public function getArticles(): Collection
    {
        return $this->articles;
    }

    public function addArticle(UArticle $article): self
    {
        if (!$this->articles->contains($article)) {
            $this->articles[] = $article;
            $article->setNiveau($this);
        }
        return $this;
    }

    public function removeArticle(UArticle $article): self
    {
        if ($this->articles->removeElement($article)) {
            if ($article->getNiveau() === $this) {
                $article->setNiveau(null);
            }
        }
        return $this;
    }

    public function getCCA1(): ?string
    {
        return $this->CCA1;
    }

    public function setCCA1(?string $CCA1): self
    {
        $this->CCA1 = $CCA1;
        return $this;
    }

    public function getCCA2(): ?string
    {
        return $this->CCA2;
    }

    public function setCCA2(?string $CCA2): self
    {
        $this->CCA2 = $CCA2;
        return $this;
    }

    public function getCCA3(): ?string
    {
        return $this->CCA3;
    }

    public function setCCA3(?string $CCA3): self
    {
        $this->CCA3 = $CCA3;
        return $this;
    }

    public function getCCA4(): ?string
    {
        return $this->CCA4;
    }

    public function setCCA4(?string $CCA4): self
    {
        $this->CCA4 = $CCA4;
        return $this;
    }
}
