<?php

namespace App\Entity;

use App\Entity\Uarticle;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Persistence\Proxy;
use Doctrine\ORM\PersistentCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\HttpFoundation\File\File;
use Doctrine\Common\Collections\ArrayCollection;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @Vich\Uploadable
 */
#[ORM\Entity(repositoryClass: \App\Repository\ConventionGlobalRepository::class)]
#[ORM\HasLifecycleCallbacks]
#[UniqueEntity('code')]
class ConventionGlobal
{
    #[ORM\Id]
    #[ORM\Column(type: 'integer')]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    private $id;

    #[ORM\JoinColumn(name: 'uarticle_id', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \Uarticle::class, inversedBy: 'conventionGlobals')]
    private $uarticle;
    
    #[ORM\Column(type: 'integer')]
    private $count;


    
     
    #[ORM\JoinColumn(name: 'p_dossier_id', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: PDossier::class, inversedBy: 'conventionGlobals')]
    private $pDossier;
    
   #[ORM\Column(name: 'quantite', type: 'float', precision: 10, scale: 0, nullable: true)]
   private $quantite;
   
    /**
     *
     * @var \DateTime
     */
    #[ORM\Column(name: 'created', type: 'datetime', nullable: true)]
    private $created;
    
        /**
     *
     * @var \DateTime
     *
     */
    #[ORM\Column(name: 'updated', type: 'datetime', nullable: true)]
    private $updated;
    
    #[ORM\JoinColumn(name: 'user_created', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \User::class)]
    private $userCreated;

    #[ORM\JoinColumn(name: 'user_updated', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \User::class)]
    private $userUpdated;



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUarticle(): ?Uarticle
    {
        return $this->uarticle;
    }

    public function setUarticle(?Uarticle $uarticle): self
    {
        $this->uarticle = $uarticle;

        return $this;
    }

    public function getPDossier(): ?PDossier
    {
        return $this->pDossier;
    }

    public function setPDossier(?PDossier $pDossier): self
    {
        $this->pDossier = $pDossier;

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
    public function getCount(): ?int
    {
        return $this->count;
    }

    public function setCount(?int $count): self
    {
        $this->count = $count;

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
    public function getUpdated(): ?\DateTimeInterface
    {
        return $this->updated;
    }

    public function setUpdated(?\DateTimeInterface $updated): self
    {
        $this->updated = $updated;

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

    public function getUserUpdated(): ?User
    {
        return $this->userUpdated;
    }

    public function setUserUpdated(?User $userUpdated): self
    {
        $this->userUpdated = $userUpdated;

        return $this;
    }

}
