<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

#[ORM\Table(name: 'pac')]
#[ORM\UniqueConstraint(name: '_idx', columns: ['pac_param_id', 'article_id', 'plan_comptable_id'])]
#[ORM\Entity(repositoryClass: \App\Repository\PacRepository::class)]
class Pac {

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\JoinColumn(referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \App\Entity\PacParam::class)]
    private $pacParam;

    #[ORM\JoinColumn(referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \App\Entity\Uarticle::class)]
    private $article;

    #[ORM\JoinColumn(referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \App\Entity\PlanComptable::class)]
    private $planComptable;

    public function getId(): ?int {
        return $this->id;
    }

    public function getPacParam(): ?PacParam
    {
        return $this->pacParam;
    }

    public function setPacParam(?PacParam $pacParam): self
    {
        $this->pacParam = $pacParam;

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

    public function getPlanComptable(): ?PlanComptable
    {
        return $this->planComptable;
    }

    public function setPlanComptable(?PlanComptable $planComptable): self
    {
        $this->planComptable = $planComptable;

        return $this;
    }

}
