<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: \App\Repository\UarticlePrixRepository::class)]
#[ORM\HasLifecycleCallbacks]
class UarticlePrix {

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\ManyToOne(targetEntity: \App\Entity\Uarticle::class, inversedBy: 'uarticlePrixes')]
    private $article;

    
    #[ORM\Column(type: 'float', nullable: true)]
    private $prixVente;

    
    #[ORM\Column(type: 'float', nullable: true)]
    private $prixVenteMin;

    
    #[ORM\Column(type: 'float', nullable: true)]
    private $prixAchat;

    
    #[ORM\Column(type: 'float', nullable: true)]
    private $prixAchatMin;

    
    #[ORM\Column(name: 'autre_information', type: 'text', nullable: true)]
    private $autreInformation;
    
    
    #[ORM\Column(type: 'string', length: 50, nullable: true)]
    private $source;

    /**
     *
     * @var \DateTime
     *
     *
     */
    #[ORM\Column(name: 'created', type: 'datetime', nullable: true)]
    private $created;

    #[ORM\JoinColumn(name: 'user_created', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \User::class)]
    private $userCreated;

    #[ORM\PrePersist]
    public function setCreatedValue() {

        $this->created = new \DateTime();
    }

    public function getId(): ?int {
        return $this->id;
    }

    public function getArticle(): ?Uarticle {
        return $this->article;
    }

    public function setArticle(?Uarticle $article): self {
        $this->article = $article;

        return $this;
    }

    public function getPrixVente(): ?float
    {
        return $this->prixVente;
    }

    public function setPrixVente(?float $prixVente): self
    {
        $this->prixVente = $prixVente;

        return $this;
    }

    public function getPrixVenteMin(): ?float
    {
        return $this->prixVenteMin;
    }

    public function setPrixVenteMin(?float $prixVenteMin): self
    {
        $this->prixVenteMin = $prixVenteMin;

        return $this;
    }

    public function getPrixAchat(): ?float
    {
        return $this->prixAchat;
    }

    public function setPrixAchat(?float $prixAchat): self
    {
        $this->prixAchat = $prixAchat;

        return $this;
    }

    public function getPrixAchatMin(): ?float
    {
        return $this->prixAchatMin;
    }

    public function setPrixAchatMin(?float $prixAchatMin): self
    {
        $this->prixAchatMin = $prixAchatMin;

        return $this;
    }

    public function getAutreInformation(): ?string
    {
        return $this->autreInformation;
    }

    public function setAutreInformation(?string $autreInformation): self
    {
        $this->autreInformation = $autreInformation;

        return $this;
    }

    public function getSource(): ?string
    {
        return $this->source;
    }

    public function setSource(?string $source): self
    {
        $this->source = $source;

        return $this;
    }

    public function getCreated(): ?\DateTimeInterface
    {
        return $this->created;
    }

    public function setCreated(?\DateTimeInterface $created): self
    {
        $this->created = $created;

        return $this;
    }

    public function getUserCreated(): ?User
    {
        return $this->userCreated;
    }

    public function setUserCreated(?User $userCreated): self
    {
        $this->userCreated = $userCreated;

        return $this;
    }

}
