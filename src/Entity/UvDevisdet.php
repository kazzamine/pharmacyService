<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Doctrine\Common\Collections\Collection;

#[ORM\Entity(repositoryClass: \App\Repository\UvDevisdetRepository::class)]
#[UniqueEntity(fields: ['cab', 'article'], errorPath: 'article', message: 'Article dèja utilisé.')]
class UvDevisdet
{
    use  DetailChampCalcule;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\JoinColumn(name: 'uv_deviscab_id', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \App\Entity\UvDeviscab::class, inversedBy: 'details')]
    private $cab;

    #[ORM\JoinColumn(name: 'u_article_id', referencedColumnName: 'id')]
    #[Assert\NotBlank]
    #[ORM\ManyToOne(targetEntity: \App\Entity\Uarticle::class)]
    private $article;

    #[ORM\JoinColumn(name: 'p_unite_id', referencedColumnName: 'id')]
    #[Assert\NotBlank]
    #[ORM\ManyToOne(targetEntity: \App\Entity\PUnite::class)]
    private $unite;

    /**
     * @var float|null
     */
    #[Assert\NotBlank]
    #[Assert\Positive]
    #[ORM\Column(name: 'quantite', type: 'float', precision: 10, scale: 0, nullable: true)]
    private $quantite;

    /**
     * @var float|null
     */
    #[Assert\NotBlank]
    #[ORM\Column(name: 'prixunitaire', type: 'float', precision: 10, scale: 0, nullable: true)]
    private $prixunitaire;

    /**
     * @var float|null
     */
    #[Assert\Range(min: 0, max: 100)]
    #[ORM\Column(name: 'tva', type: 'float', precision: 10, scale: 0, nullable: true)]
    private $tva = 0;

    
    #[Assert\Range(min: 0, max: 100)]
    #[Assert\Type(type: 'numeric')]
    #[ORM\Column(type: 'float', nullable: true)]
    private $remise = 0;



    /**
     * @var string|null
     */
    #[ORM\Column(name: 'observation', type: 'text', nullable: true)]
    private $observation;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $oldSys;

    #[ORM\OneToMany(targetEntity: DevisTechniqueCab::class, mappedBy: 'Devisdet')]
    private $devisTechniqueCabs;

    /**
     * @var string
     *
     *
     */
    #[ORM\Column(name: 'plan_comptable_vente', type: 'string')]
    private $planComptableVente;



    public function __construct()
    {
        $this->devisTechniqueCabs = new ArrayCollection();
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



    public function getObservation(): ?string
    {
        return $this->observation;
    }

    public function setObservation(?string $observation): self
    {
        $this->observation = $observation;

        return $this;
    }

    public function getCab(): ?UvDeviscab
    {
        return $this->cab;
    }

    public function setCab(?UvDeviscab $cab): self
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

    /**
     * @return Collection|DevisTechniqueCab[]
     */
    public function getDevisTechniqueCabs(): Collection
    {
        return $this->devisTechniqueCabs;
    }

    public function addDevisTechniqueCab(DevisTechniqueCab $devisTechniqueCab): self
    {
        if (!$this->devisTechniqueCabs->contains($devisTechniqueCab)) {
            $this->devisTechniqueCabs[] = $devisTechniqueCab;
            $devisTechniqueCab->setDevisdet($this);
        }

        return $this;
    }

    public function removeDevisTechniqueCab(DevisTechniqueCab $devisTechniqueCab): self
    {
        if ($this->devisTechniqueCabs->removeElement($devisTechniqueCab)) {
            // set the owning side to null (unless already changed)
            if ($devisTechniqueCab->getDevisdet() === $this) {
                $devisTechniqueCab->setDevisdet(null);
            }
        }

        return $this;
    }
    public function getPlanComptableVente(): ?string
    {
        return $this->planComptableVente;
    }
    public function setPlanComptableVente(?string $planComptableVente)
    {
        $this->planComptableVente = $planComptableVente;
        return $this;
    }
}
