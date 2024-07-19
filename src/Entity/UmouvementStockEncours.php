<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: \App\Repository\UmouvementStockEncoursRepository::class)]
#[ORM\HasLifecycleCallbacks]
class UmouvementStockEncours
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\ManyToOne(targetEntity: \App\Entity\Uarticle::class)]
    private $article;

    #[ORM\Column(type: 'float', nullable: true)]
    private $prix;

    #[ORM\ManyToOne(targetEntity: \App\Entity\Udepot::class)]
    private $depot;

    #[ORM\Column(type: 'float', nullable: true)]
    private $quantite;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private $created;

    #[ORM\Column(type: 'text', nullable: true)]
    private $description;

    #[ORM\ManyToOne(targetEntity: \App\Entity\User::class)]
    private $UserCreated;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $codeInventaire;
    
    
    #[ORM\Column(type: 'string', length: 100, nullable: true)]
    private $source;
    
    
    #[ORM\Column(type: 'integer', length: 100, nullable: true)]
    private $sourceId;
    
     #[ORM\Column(type: 'string', length: 100, nullable: true)]
    private $sourceCode;
    
    
    #[ORM\Column(type: 'string', length: 50, nullable: true)]
    private $sourceAbreviation;
    

    #[ORM\Column(type: 'smallint', nullable: true)]
    private $ajoSup;

    #[ORM\ManyToOne(targetEntity: \App\Entity\PDossier::class)]
    private $dossier;

    #[ORM\Column(type: 'boolean', nullable: true)]
    private $valider;
    
      #[ORM\PrePersist]
    public function setCreatedValue() {

        $this->created = new \DateTime();
    }
    
    

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

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(?float $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getDepot(): ?Udepot
    {
        return $this->depot;
    }

    public function setDepot(?Udepot $depot): self
    {
        $this->depot = $depot;

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

    public function getCreated(): ?\DateTimeInterface
    {
        return $this->created;
    }

    public function setCreated(?\DateTimeInterface $created): self
    {
        $this->created = $created;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getUserCreated(): ?User
    {
        return $this->UserCreated;
    }

    public function setUserCreated(?User $UserCreated): self
    {
        $this->UserCreated = $UserCreated;

        return $this;
    }

    public function getCodeInventaire(): ?string
    {
        return $this->codeInventaire;
    }

    public function setCodeInventaire(?string $codeInventaire): self
    {
        $this->codeInventaire = $codeInventaire;

        return $this;
    }

    public function getAjoSup(): ?int
    {
        return $this->ajoSup;
    }

    public function setAjoSup(?int $ajoSup): self
    {
        $this->ajoSup = $ajoSup;

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

    public function getSourceAbreviation(): ?string
    {
        return $this->sourceAbreviation;
    }

    public function setSourceAbreviation(?string $sourceAbreviation): self
    {
        $this->sourceAbreviation = $sourceAbreviation;

        return $this;
    }

    public function getSourceId(): ?int
    {
        return $this->sourceId;
    }

    public function setSourceId(?int $sourceId): self
    {
        $this->sourceId = $sourceId;

        return $this;
    }

    public function getSourceCode(): ?string
    {
        return $this->sourceCode;
    }

    public function setSourceCode(?string $sourceCode): self
    {
        $this->sourceCode = $sourceCode;

        return $this;
    }

    public function getDossier(): ?PDossier
    {
        return $this->dossier;
    }

    public function setDossier(?PDossier $dossier): self
    {
        $this->dossier = $dossier;

        return $this;
    }

    public function getValider(): ?bool
    {
        return $this->valider;
    }

    public function setValider(?bool $valider): self
    {
        $this->valider = $valider;

        return $this;
    }
}
