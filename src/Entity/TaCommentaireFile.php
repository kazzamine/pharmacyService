<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: \App\Repository\TaCommentaireFileRepository::class)]
#[ORM\HasLifecycleCallbacks]
class TaCommentaireFile
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;
    
    
    /**
     * @var string
     */
    #[ORM\Column(name: 'designation', type: 'string', length: 255, nullable: true)]
    private $designation;
    
    /**
     * @var string
     */
    #[ORM\Column(name: 'url', type: 'string', length: 255, nullable: true)]
    private $url;
    
   
    
    
    #[ORM\ManyToOne(targetEntity: \TaCommentaire::class, inversedBy: 'commentaireFiles')] // @ORM\JoinColumn(name="commentaire_id", referencedColumnName="id")
    private $commentaire;
    
    
   
    
    
    
    
    
     /**
     *
     * @var \DateTime
     *
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


    

    


    
     #[ORM\PrePersist]
    public function setCreatedValue() {

        $this->created = new \DateTime();
    }

    #[ORM\PreUpdate]
    public function setUpdatedValue() {
        $this->updated = new \DateTime();
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

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(?string $url): self
    {
        $this->url = $url;

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

    public function getCommentaire(): ?TaCommentaire
    {
        return $this->commentaire;
    }

    public function setCommentaire(?TaCommentaire $commentaire): self
    {
        $this->commentaire = $commentaire;

        return $this;
    }
}
