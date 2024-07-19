<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PResponsable
 */
#[ORM\Table(name: 'p_responsable')]
#[ORM\UniqueConstraint(name: 'code_responsable', columns: ['code_responsable'])]
#[ORM\Entity]
class PResponsable
{
    
       #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    /**
     * @var string
     */
    #[ORM\Column(name: 'code_responsable', type: 'string', length: 100, nullable: false)]
    private $codeResponsable;

    /**
     * @var string
     */
    #[ORM\Column(name: 'nom', type: 'string', length: 100, nullable: false)]
    private $nom;

    /**
     * @var string
     */
    #[ORM\Column(name: 'prenom', type: 'string', length: 100, nullable: false)]
    private $prenom;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCodeResponsable(): ?string
    {
        return $this->codeResponsable;
    }

    public function setCodeResponsable(string $codeResponsable): self
    {
        $this->codeResponsable = $codeResponsable;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }


}
