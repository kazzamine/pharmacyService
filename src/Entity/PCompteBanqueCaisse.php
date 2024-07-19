<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Entity\PCompteBanqueGeneral;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Table(name: 'p_compte_banque_caisse')]
#[ORM\Entity(repositoryClass: \App\Repository\PCompteBanqueCaisseRepository::class)]
class PCompteBanqueCaisse {

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 100, nullable: true)]
    private $code;

    #[Assert\NotBlank]
    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $designation;

    
    #[ORM\Column(type: 'text', nullable: true)]
    private $description;

    
    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $numCompte;
    
    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $codeComptable;

    
    #[ORM\Column(type: 'boolean', nullable: true)]
    private $active;

    /**
     *
     * @var \DateTime
     *
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

    #[ORM\Column(type: 'float', nullable: true)]
    private $montantFinal;

    #[ORM\JoinColumn(name: 'dossier_id', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: PDossier::class, inversedBy: 'compteBanqueCaisses')]
    private $dossier;
    

    

    



    public function getMontantFinal(): ?float
    {
        return $this->montantFinal;
    }

    public function setMontantFinal(?float $montantFinal): self
    {
        $this->montantFinal = $montantFinal;

        return $this;
    }
    

    public function getId(): ?int {
        return $this->id;
    }

    public function getCode(): ?string {
        return $this->code;
    }

    public function setCode(?string $code): self {
        $this->code = $code;

        return $this;
    }



    public function getDesignation(): ?string {
        return $this->designation;
    }

    public function setDesignation(?string $designation): self {
        $this->designation = $designation;

        return $this;
    }
    public function getCodeComptable(): ?string {
        return $this->codeComptable;
    }

    public function setCodeComptable(?string $codeComptable): self {
        $this->codeComptable = $codeComptable;

        return $this;
    }

    public function getDescription(): ?string {
        return $this->description;
    }

    public function setDescription(?string $description): self {
        $this->description = $description;

        return $this;
    }

    public function getAbreviation(): ?string {
        return $this->abreviation;
    }


    public function getActive(): ?bool {
        return $this->active;
    }

    public function setActive(?bool $active): self {
        $this->active = $active;

        return $this;
    }

    public function getCreated(): ?\DateTimeInterface {
        return $this->created;
    }

    public function setCreated(?\DateTimeInterface $created): self {
        $this->created = $created;

        return $this;
    }

    public function getUpdated(): ?\DateTimeInterface {
        return $this->updated;
    }

    public function setUpdated(?\DateTimeInterface $updated): self {
        $this->updated = $updated;

        return $this;
    }

   
    public function getDossier(): ?PDossier {
        return $this->dossier;
    }

    public function setDossier(?PDossier $dossier): self {
        $this->dossier = $dossier;
        return $this;
    }  

    public function getNumCompte(): ?string
    {
        return $this->numCompte;
    }

    public function setNumCompte(?string $numCompte): self
    {
        $this->numCompte = $numCompte;

        return $this;
    }

    

    

}
