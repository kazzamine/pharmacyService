<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinColumn;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\StockActualRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class StockActual
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @Assert\NotBlank
     * @ORM\ManyToOne(targetEntity="App\Entity\Uarticle")
     * @ORM\JoinColumn(name="u_article_id", referencedColumnName="id")
     */
    private $article;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Uantenne")
     * @JoinColumn(name="uantenne_id", referencedColumnName="id")
     */
    private $antenne;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $dateupdate;

    /**
     * @var float|null
     * @Assert\NotBlank
     * @Assert\Positive
     * @ORM\Column(name="quantite", type="float", precision=10, scale=0, nullable=true)
     */
    private $quantite;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * @ORM\Column(name="user_update")
     */
    private $userupdate;

    /**
     * @Assert\NotBlank
     * @ORM\ManyToOne(targetEntity="App\Entity\PUnite")
     * @ORM\JoinColumn(name="p_unite_id", referencedColumnName="id")
     */
    private $unite;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getArticle(): ?Uarticle {
        return $this->article;
    }

    public function setArticle(?Uarticle $article): self {
        $this->article = $article;

        return $this;
    }

    public function getQuantite(): ?float {
        return $this->quantite;
    }

    public function setQuantite(?float $quantite): self {
        $this->quantite = $quantite;

        return $this;
    }

    public function getAntenne(): ?Uantenne
    {
        return $this->antenne;
    }

    public function setAntenne(?Uantenne $antenne): self
    {
        $this->antenne = $antenne;

        return $this;
    }

    public function getDateUpdate(): ?\DateTimeInterface
    {
        return $this->dateupdate;
    }

    public function setDateUpdate(?\DateTimeInterface $dateupdate): self
    {
        $this->dateupdate = $dateupdate;

        return $this;
    }

    public function getUserUpdated(): ?int
    {
        return $this->userupdate;
    }

    public function setUserUpdated(?int $userupdate): self
    {
        $this->userupdate = $userupdate;

        return $this;
    }

    public function getUnite(): ?PUnite {
        return $this->unite;
    }

    public function setUnite(?PUnite $unite): self {
        $this->unite = $unite;

        return $this;
    }
}
