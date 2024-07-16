<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

#[ORM\Entity(repositoryClass: "App\Repository\UvLivraisondetRepository")]
class UvLivraisondet
{

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    private ?int $id;

    #[ORM\ManyToOne(targetEntity: UvLivraisoncab::class, inversedBy: "details", cascade: ["persist"])]
    #[ORM\JoinColumn(name: "uv_livraisoncab_id", referencedColumnName: "id")]
    private ?UvLivraisoncab $cab;

    #[Assert\NotBlank]
    #[ORM\ManyToOne(targetEntity: Uarticle::class)]
    #[ORM\JoinColumn(name: "u_article_id", referencedColumnName: "id")]
    private ?Uarticle $article;

    #[Assert\NotBlank]
    #[ORM\ManyToOne(targetEntity: PUnite::class)]
    #[ORM\JoinColumn(name: "p_unite_id", referencedColumnName: "id")]
    private ?PUnite $unite;

    #[ORM\Column(name: "quantite", type: "float", precision: 10, scale: 0, nullable: true)]
    #[Assert\NotBlank]
    #[Assert\Positive]
    private ?float $quantite;

    #[ORM\Column(name: "prixunitaire", type: "float", precision: 10, scale: 0, nullable: true)]
    #[Assert\NotBlank]
    private ?float $prixunitaire;

    #[ORM\Column(name: "tva", type: "float", precision: 10, scale: 0, nullable: true)]
    #[Assert\Range(min: 0, max: 100)]
    private float $tva = 0;

    #[ORM\Column(name: "observation", type: "text", nullable: true)]
    private ?string $observation;

    #[ORM\Column(type: "float", nullable: true)]
    #[Assert\Range(min: 0, max: 100)]
    #[Assert\Type(type: "numeric")]
    private float $remise = 0;

    #[ORM\Column(type: "string", length: 255, nullable: true)]
    private ?string $oldSys;

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
        $this->tva = $tva ?? 0;
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

    public function getCab(): ?UvLivraisoncab
    {
        return $this->cab;
    }

    public function setCab(?UvLivraisoncab $cab): self
    {
        $this->cab = $cab;
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

    public function getRemise(): ?float
    {
        return $this->remise;
    }

    public function setRemise(?float $remise): self
    {
        $this->remise = $remise ?? 0;
        return $this;
    }

    public function getOldSys(): ?string
    {
        return $this->oldSys;
    }

    public function setOldSys(?string $oldSys): self
    {
        $this->oldSys = $oldSys;
        return $this;
    }
}
