<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

#[ORM\Entity(repositoryClass: \App\Repository\GrsNoteInterneRepository::class)]
class GrsNoteInterne
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;
    /**
     * @var string|null
     */
    #[ORM\Column(name: 'code', type: 'string', length: 100, nullable: true)]
    private $code;

    #[Assert\NotBlank]
    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $titre;

    #[ORM\Column(type: 'text', nullable: true)]
    private $texte;

 


    #[ORM\JoinTable(name: 'emloyes_noteinterne')]
    #[ORM\ManyToMany(targetEntity: \App\Entity\GrsEmploye::class, inversedBy: 'notes')]
    private $employes;
    
  
    #[ORM\JoinColumn(name: 'p_dossier_id', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \PDossier::class)]
    private $dossier;
    #[ORM\Column(type: 'boolean', nullable: true)]
    private $active;



    public function __construct() {
       
        $this->employes = new ArrayCollection();
      
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(?string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getTexte(): ?string
    {
        return $this->texte;
    }

    public function setTexte(?string $texte): self
    {
        $this->texte = $texte;

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
     * @return Collection|GrsEmploye[]
     */
    public function getEmployes(): Collection
    {
        return $this->employes;
    }

    public function addEmploye(GrsEmploye $employe): self
    {
        if (!$this->employes->contains($employe)) {
            $this->employes[] = $employe;
            $employe->addNote($this);
        }

        return $this;
    }

    public function removeEmploye(GrsEmploye $employe): self
    {
        if ($this->employes->contains($employe)) {
            $this->employes->removeElement($employe);
            $employe->removeNote($this);
        }

        return $this;
    }






    public function getActive(): ?bool
    {
        return $this->active;
    }

    public function setActive(?bool $active): self
    {
        $this->active = $active;

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


}
