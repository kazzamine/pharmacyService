<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Table(name: 'p_article_niveau_old')]
#[ORM\Entity(repositoryClass: \App\Repository\PArticleNiveauOldRepository::class)]
class PArticleNiveauOld
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $designation;

    #[ORM\JoinColumn(name: 'parent_id', nullable: true)]
    #[ORM\ManyToOne(targetEntity: \App\Entity\PArticleNiveau::class, inversedBy: 'pArticleNiveaux')]
    private $parentId;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $niveau;

    #[ORM\JoinColumn(nullable: true)]
    #[ORM\OneToMany(targetEntity: \App\Entity\PArticleNiveau::class, mappedBy: 'parentId')]
    private $pArticleNiveaux;

    #[ORM\JoinColumn(nullable: true)]
    #[ORM\OneToMany(targetEntity: \App\Entity\Uarticle::class, mappedBy: 'niveau1')]
    private $uarticles1;

    #[ORM\JoinColumn(nullable: true)]
    #[ORM\OneToMany(targetEntity: \App\Entity\Uarticle::class, mappedBy: 'niveau2')]
    private $uarticles2;

    #[ORM\JoinColumn(nullable: true)]
    #[ORM\OneToMany(targetEntity: \App\Entity\Uarticle::class, mappedBy: 'niveau3')]
    private $uarticles3;

    #[ORM\JoinColumn(nullable: true)]
    #[ORM\OneToMany(targetEntity: \App\Entity\Uarticle::class, mappedBy: 'niveau4')]
    private $uarticles4;

    public function __construct()
    {
        $this->pArticleNiveaux = new ArrayCollection();
        $this->uarticles1 = new ArrayCollection();
        $this->uarticles2 = new ArrayCollection();
        $this->uarticles3 = new ArrayCollection();
        $this->uarticles4 = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDesignation(): ?string
    {
        return $this->designation;
    }

    public function setDesignation(?string $designation): self
    {
        $this->designation = $designation;

        return $this;
    }

    public function getNiveau(): ?int
    {
        return $this->niveau;
    }

    public function setNiveau(?string $niveau): self
    {
        $this->niveau = $niveau;

        return $this;
    }

    public function getParentId(): ?self
    {
        return $this->parentId;
    }

    public function setParentId(?self $parentId): self
    {
        $this->parentId = $parentId;

        return $this;
    }

    /**
     * @return Collection|self[]
     */
    public function getPArticleNiveaux(): Collection
    {
        return $this->pArticleNiveaux;
    }

    public function addPArticleNiveau(self $pArticleNiveau): self
    {
        if (!$this->pArticleNiveaux->contains($pArticleNiveau)) {
            $this->pArticleNiveaux[] = $pArticleNiveau;
            $pArticleNiveau->setParentId($this);
        }

        return $this;
    }

    public function removePArticleNiveau(self $pArticleNiveau): self
    {
        if ($this->pArticleNiveaux->contains($pArticleNiveau)) {
            $this->pArticleNiveaux->removeElement($pArticleNiveau);
            // set the owning side to null (unless already changed)
            if ($pArticleNiveau->getParentId() === $this) {
                $pArticleNiveau->setParentId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Uarticle[]
     */
    public function getUarticles1(): Collection
    {
        return $this->uarticles1;
    }

    public function addUarticle1(Uarticle $uarticle1): self
    {
        if (!$this->uarticles1->contains($uarticle1)) {
            $this->uarticles1[] = $uarticle1;
            $uarticle1->setNiveau1($this);
        }

        return $this;
    }

    public function removeUarticle1(Uarticle $uarticle1): self
    {
        if ($this->uarticles1->contains($uarticle1)) {
            $this->uarticles1->removeElement($uarticle1);
            // set the owning side to null (unless already changed)
            if ($uarticle1->getNiveau1() === $this) {
                $uarticle1->setNiveau1(null);
            }
        }

        return $this;
    }




    /**
     * @return Collection|Uarticle[]
     */
    public function getUarticles2(): Collection
    {
        return $this->uarticles2;
    }

    public function addUarticle2(Uarticle $uarticle2): self
    {
        if (!$this->uarticles2->contains($uarticle2)) {
            $this->uarticles2[] = $uarticle2;
            $uarticle2->setNiveau1($this);
        }

        return $this;
    }

    public function removeUarticle2(Uarticle $uarticle2): self
    {
        if ($this->uarticles2->contains($uarticle2)) {
            $this->uarticles2->removeElement($uarticle2);
            // set the owning side to null (unless already changed)
            if ($uarticle2->getNiveau2() === $this) {
                $uarticle2->setNiveau2(null);
            }
        }

        return $this;
    }





    /**
     * @return Collection|Uarticle[]
     */
    public function getUarticles3(): Collection
    {
        return $this->uarticles3;
    }

    public function addUarticle3(Uarticle $uarticle3): self
    {
        if (!$this->uarticles3->contains($uarticle3)) {
            $this->uarticles3[] = $uarticle3;
            $uarticle3->setNiveau3($this);
        }

        return $this;
    }

    public function removeUarticle3(Uarticle $uarticle3): self
    {
        if ($this->uarticles3->contains($uarticle3)) {
            $this->uarticles3->removeElement($uarticle3);
            // set the owning side to null (unless already changed)
            if ($uarticle3->getNiveau3() === $this) {
                $uarticle3->setNiveau3(null);
            }
        }

        return $this;
    }





    /**
     * @return Collection|Uarticle[]
     */
    public function getUarticles4(): Collection
    {
        return $this->uarticles4;
    }

    public function addUarticle4(Uarticle $uarticle4): self
    {
        if (!$this->uarticles4->contains($uarticle4)) {
            $this->uarticles4[] = $uarticle4;
            $uarticle4->setNiveau4($this);
        }

        return $this;
    }

    public function removeUarticle4(Uarticle $uarticle4): self
    {
        if ($this->uarticles4->contains($uarticle4)) {
            $this->uarticles4->removeElement($uarticle4);
            // set the owning side to null (unless already changed)
            if ($uarticle4->getNiveau4() === $this) {
                $uarticle4->setNiveau4(null);
            }
        }

        return $this;
    }

    public function addUarticles1(Uarticle $uarticles1): self
    {
        if (!$this->uarticles1->contains($uarticles1)) {
            $this->uarticles1[] = $uarticles1;
            $uarticles1->setNiveau1($this);
        }

        return $this;
    }

    public function removeUarticles1(Uarticle $uarticles1): self
    {
        if ($this->uarticles1->contains($uarticles1)) {
            $this->uarticles1->removeElement($uarticles1);
            // set the owning side to null (unless already changed)
            if ($uarticles1->getNiveau1() === $this) {
                $uarticles1->setNiveau1(null);
            }
        }

        return $this;
    }

    public function addUarticles2(Uarticle $uarticles2): self
    {
        if (!$this->uarticles2->contains($uarticles2)) {
            $this->uarticles2[] = $uarticles2;
            $uarticles2->setNiveau2($this);
        }

        return $this;
    }

    public function removeUarticles2(Uarticle $uarticles2): self
    {
        if ($this->uarticles2->contains($uarticles2)) {
            $this->uarticles2->removeElement($uarticles2);
            // set the owning side to null (unless already changed)
            if ($uarticles2->getNiveau2() === $this) {
                $uarticles2->setNiveau2(null);
            }
        }

        return $this;
    }

    public function addUarticles3(Uarticle $uarticles3): self
    {
        if (!$this->uarticles3->contains($uarticles3)) {
            $this->uarticles3[] = $uarticles3;
            $uarticles3->setNiveau3($this);
        }

        return $this;
    }

    public function removeUarticles3(Uarticle $uarticles3): self
    {
        if ($this->uarticles3->contains($uarticles3)) {
            $this->uarticles3->removeElement($uarticles3);
            // set the owning side to null (unless already changed)
            if ($uarticles3->getNiveau3() === $this) {
                $uarticles3->setNiveau3(null);
            }
        }

        return $this;
    }

    public function addUarticles4(Uarticle $uarticles4): self
    {
        if (!$this->uarticles4->contains($uarticles4)) {
            $this->uarticles4[] = $uarticles4;
            $uarticles4->setNiveau4($this);
        }

        return $this;
    }

    public function removeUarticles4(Uarticle $uarticles4): self
    {
        if ($this->uarticles4->contains($uarticles4)) {
            $this->uarticles4->removeElement($uarticles4);
            // set the owning side to null (unless already changed)
            if ($uarticles4->getNiveau4() === $this) {
                $uarticles4->setNiveau4(null);
            }
        }

        return $this;
    }
}
