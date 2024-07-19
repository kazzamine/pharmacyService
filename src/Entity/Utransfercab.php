<?php

namespace App\Entity;

use App\Entity\Utransferdet;
use App\Entity\UmouvementType;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: \App\Repository\UtransfercabRepository::class)]
#[ORM\HasLifecycleCallbacks]
class Utransfercab
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;
    #[ORM\Column(type: 'text', nullable: true)]
    private $code;
     #[ORM\ManyToOne(targetEntity: \App\Entity\User::class)]
    private $UserCreated;    

    #[JoinColumn(name: 'umouvementtype_id', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \App\Entity\UmouvementType::class)]
    private $umouvementtype;
    #[JoinColumn(name: 'source_antenne', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \App\Entity\Uantenne::class)]
    private $sourceAntenne;
    
    /**
     * @var \DateTime
     */
    #[ORM\Column(type: 'datetime', nullable: true)]
    private $created;
    #[ORM\Column(type: 'integer', nullable: true)]
    private $statut;
  
    #[ORM\JoinColumn(name: 'p_dossier_id', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \App\Entity\PDossier::class)]
    private $dossier;
    #[JoinColumn(name: 'article_id', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \App\Entity\Uarticle::class)]
    private $article;
    
    #[ORM\OneToMany(targetEntity: \App\Entity\Utransferdet::class, mappedBy: 'utransfercab')]
    private $Utransferdets;
    
     #[ORM\Column(type: 'float', nullable: true)]
    private $quantitie;

    public function __construct() {
        $this->Utransferdets = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }
    public function getCreated(): ?\DateTimeInterface {
        return $this->created;
    }

    public function setCreated(?\DateTimeInterface $created): self {
        $this->created = $created;

        return $this;
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
    public function getStatut(): ?int
    {
        return $this->statut;
    }

    public function setStatut(?int $statut): self
    {
        $this->statut = $statut;

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
    
    public function getDossier(): ?PDossier {
        return $this->dossier;
    }

    public function setDossier(?PDossier $dossier): self {
        $this->dossier = $dossier;

        return $this;
    }
  

    public function getUmouvementtype(): ?UmouvementType
    {
        return $this->umouvementtype;
    }

    public function setUmouvementtype(?UmouvementType $umouvementtype): self
    {
        $this->umouvementtype = $umouvementtype;

        return $this;
    }
    public function getSourceAntenne(): ?Uantenne
    {
        return $this->sourceAntenne;
    }
    public function setSourceAntenne(?Uantenne $sourceAntenne): self
    {
        $this->sourceAntenne = $sourceAntenne;

        return $this;
    }


    /**
     * @return Collection|Utransferdet[]
     */
    public function getUtransferdets(): Collection {
        return $this->Utransferdets;
    }

    public function addUtransferdet(Utransferdet $Utransferdet): self {
        if (!$this->Utransferdets->contains($Utransferdet)) {
            $this->Utransferdets[] = $Utransferdet;
        }

        return $this;
    }

    public function removeUtransferdet(Utransferdet $Utransferdet): self {
        if ($this->Utransferdets->contains($Utransferdet)) {
            $this->Utransferdets->removeElement($Utransferdet);
        }

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
