<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: \App\Repository\FormeRepository::class)]
class Forme
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $FormeGalenique;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $code;

    #[ORM\OneToMany(targetEntity: \App\Entity\ArticleInfo::class, mappedBy: 'forme')]
    private $articleInfos;

    #[ORM\OneToMany(targetEntity: \App\Entity\PMarcheDet::class, mappedBy: 'forme')]
    private $pMarcheDets;

     #[ORM\OneToMany(targetEntity: \App\Entity\Uarticle::class, mappedBy: 'formeDa')]
    private $uarticle;



    public function __construct()
    {
        $this->articleInfos = new ArrayCollection();
        $this->pMarcheDets = new ArrayCollection();
        $this->uarticle = new ArrayCollection();

    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFormeGalenique(): ?string
    {
        return $this->FormeGalenique;
    }

    public function setFormeGalenique(?string $FormeGalenique): self
    {
        $this->FormeGalenique = $FormeGalenique;

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

    /**
     * @return Collection|ArticleInfo[]
     */
    public function getArticleInfos(): Collection
    {
        return $this->articleInfos;
    }

    public function addArticleInfo(ArticleInfo $articleInfo): self
    {
        if (!$this->articleInfos->contains($articleInfo)) {
            $this->articleInfos[] = $articleInfo;
            $articleInfo->setForme($this);
        }

        return $this;
    }

    public function removeArticleInfo(ArticleInfo $articleInfo): self
    {
        if ($this->articleInfos->contains($articleInfo)) {
            $this->articleInfos->removeElement($articleInfo);
            // set the owning side to null (unless already changed)
            if ($articleInfo->getForme() === $this) {
                $articleInfo->setForme(null);
            }
        }

        return $this;
    }


    /**
     * @return Collection|PMarcheDet[]
     */
    public function getPMarcheDets(): Collection
    {
        return $this->pMarcheDets;
    }

    public function addPMarcheDet(PMarcheDet $pMarcheDet): self
    {
        if (!$this->pMarcheDets->contains($pMarcheDet)) {
            $this->pMarcheDets[] = $pMarcheDet;
            $pMarcheDet->setForme($this);
        }

        return $this;
    }

    public function removePMarcheDet(PMarcheDet $pMarcheDet): self
    {
        if ($this->pMarcheDets->contains($pMarcheDet)) {
            $this->pMarcheDets->removeElement($pMarcheDet);
            // set the owning side to null (unless already changed)
            if ($pMarcheDet->getForme() === $this) {
                $pMarcheDet->setForme(null);
            }
        }

        return $this;
    }

    
    /**
     * @return Collection|Uarticle[]
     */
    public function getUarticle(): Collection
    {
        return $this->uarticle;
    }

    public function addUarticle(Uarticle $uarticle): self
    {
        if (!$this->uarticle->contains($uarticle)) {
            $this->uarticle[] = $uarticle;
            $uarticle->setFormeDa($this);
        }

        return $this;
    }

    public function removeUarticle(Uarticle $uarticle): self
    {
        if ($this->uarticle->contains($uarticle)) {
            $this->uarticle->removeElement($uarticle);
            // set the owning side to null (unless already changed)
            if ($uarticle->getFormeDa() === $this) {
                $uarticle->setFormeDa(null);
            }
        }

        return $this;
    }
}
