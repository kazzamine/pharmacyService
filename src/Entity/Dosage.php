<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: \App\Repository\DosageRepository::class)]
class Dosage
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $Dosage;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $code;

    #[ORM\OneToMany(targetEntity: \App\Entity\ArticleInfo::class, mappedBy: 'dosage')]
    private $articleInfos;

    #[ORM\OneToMany(targetEntity: \App\Entity\PMarcheDet::class, mappedBy: 'Dosage')]
    private $pMarcheDets;

     #[ORM\OneToMany(targetEntity: \App\Entity\Uarticle::class, mappedBy: 'Dosage')]
    private $uarticles;

    public function __construct()
    {
        $this->articleInfos = new ArrayCollection();
        $this->pMarcheDets  = new ArrayCollection();
        $this->uarticles = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDosage(): ?string
    {
        return $this->Dosage;
    }

    public function setDosage(?string $Dosage): self
    {
        $this->Dosage = $Dosage;

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
            $articleInfo->setDosage($this);
        }

        return $this;
    }

    public function removeArticleInfo(ArticleInfo $articleInfo): self
    {
        if ($this->articleInfos->contains($articleInfo)) {
            $this->articleInfos->removeElement($articleInfo);
            // set the owning side to null (unless already changed)
            if ($articleInfo->getDosage() === $this) {
                $articleInfo->setDosage(null);
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
            $pMarcheDet->setDosage($this);
        }

        return $this;
    }

    public function removePMarcheDet(PMarcheDet $pMarcheDet): self
    {
        if ($this->pMarcheDets->contains($pMarcheDet)) {
            $this->pMarcheDets->removeElement($pMarcheDet);
            // set the owning side to null (unless already changed)
            if ($pMarcheDet->getDosage() === $this) {
                $pMarcheDet->setDosage(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Uarticle[]
     */
    public function getUarticles(): Collection
    {
        return $this->uarticles;
    }

    public function addUarticle(Uarticle $uarticle): self
    {
        if (!$this->uarticles->contains($uarticle)) {
            $this->uarticles[] = $uarticle;
            $uarticle->setDosage($this);
        }

        return $this;
    }

    public function removeUarticle(Uarticle $uarticle): self
    {
        if ($this->uarticles->contains($uarticle)) {
            $this->uarticles->removeElement($uarticle);
            // set the owning side to null (unless already changed)
            if ($uarticle->getDosage() === $this) {
                $uarticle->setDosage(null);
            }
        }

        return $this;
    }
}
