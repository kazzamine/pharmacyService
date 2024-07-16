<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

#[ORM\Entity(repositoryClass: "App\Repository\UvCommandedetRepository")]
#[UniqueEntity(
    fields: ["cab", "article"],
    errorPath: "article",
    message: "Article déjà utilisé."
)]
class UvCommandedet
{

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    private $id;

    #[ORM\ManyToOne(targetEntity: "App\Entity\UvCommandecab", inversedBy: "details")]
    #[ORM\JoinColumn(name: "uv_commandecab_id", referencedColumnName: "id")]
    private $cab;

    #[Assert\NotBlank]
    #[ORM\ManyToOne(targetEntity: "App\Entity\Uarticle")]
    #[ORM\JoinColumn(name: "u_article_id", referencedColumnName: "id")]
    private $article;

    #[Assert\NotBlank]
    #[ORM\ManyToOne(targetEntity: "App\Entity\PUnite")]
    #[ORM\JoinColumn(name: "p_unite_id", referencedColumnName: "id")]
    private $unite;

    #[Assert\NotBlank]
    #[Assert\Positive]
    #[ORM\Column(name: "quantite", type: "float", precision: 10, scale: 0, nullable: true)]
    private $quantite;

    #[Assert\NotBlank]
    #[ORM\Column(name: "prixunitaire", type: "float", precision: 10, scale: 0, nullable: true)]
    private $prixunitaire;

    #[Assert\Range(min: 0, max: 100)]
    #[ORM\Column(name: "tva", type: "float", precision: 10, scale: 0, nullable: true)]
    private $tva = 0;

    #[Assert\Range(min: 0, max: 100)]
    #[Assert\Type(type: "numeric")]
    #[ORM\Column(type: "float", nullable: true)]
    private $remise = 0;

    #[ORM\Column(name: "prixttc", type: "float", nullable: true)]
    private $prixttc;

    #[ORM\Column(name: "observation", type: "text", nullable: true)]
    private $observation;

    #[ORM\Column(type: "string", length: 255, nullable: true)]
    private $oldSys;
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

    public function getCab(): ?UvCommandecab
    {
        return $this->cab;
    }

    public function setCab(?UvCommandecab $cab): self
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


    public function getUnite(): ?PUnite
    {
        return $this->unite;
    }

    public function setUnite(?PUnite $unite): self
    {
        $this->unite = $unite;

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
        return ((($this->prixunitaire * $this->quantite)) * ($this->remise) / 100);
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


    public function getPrixTTcAvecRemise(): ?float
    {


        return $this->getPrixHt() + $this->getPrixTva() - $this->getPrixRemise();
    }



    public function getTotalPrixTtc(): ?float
    {


        return $this->getPrixHt() + $this->getPrixTva();
    }
}
