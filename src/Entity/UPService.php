<?php

namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;

/**
 * UPService
 */
#[ORM\Table(name: 'p_service')]
#[ORM\Entity]
class UPService {

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'code_service', type: 'string', length: 100, nullable: true)]
    private $codeService;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'service', type: 'string', length: 100, nullable: true)]
    private $service;
    
    
    #[Assert\NotBlank]
    #[ORM\Column(name: 'abreviation', type: 'string', length: 100, nullable: true)]
    private $abreviation;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'utilisateur', type: 'string', length: 100, nullable: true)]
    private $utilisateur;
    
     /**
     * @var int
     */
    #[ORM\Column(name: 'active', type: 'boolean', nullable: true)]
    private $active = 'true';
    
    

    /**
     * @var \DateTime
     */
    #[ORM\Column(name: 'datecreation', type: 'datetime', nullable: true)]
    private $datecreation;

    #[ORM\JoinColumn(name: 'p_dossier_id', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \App\Entity\PDossier::class)]
    private $dossier;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCodeService(): ?string
    {
        return $this->codeService;
    }

    public function setCodeService(?string $codeService): self
    {
        $this->codeService = $codeService;

        return $this;
    }

    public function getService(): ?string
    {
        return $this->service;
    }

    public function setService(?string $service): self
    {
        $this->service = $service;

        return $this;
    }

    public function getAbreviation(): ?string
    {
        return $this->abreviation;
    }

    public function setAbreviation(?string $abreviation): self
    {
        $this->abreviation = $abreviation;

        return $this;
    }

    public function getUtilisateur(): ?string
    {
        return $this->utilisateur;
    }

    public function setUtilisateur(?string $utilisateur): self
    {
        $this->utilisateur = $utilisateur;

        return $this;
    }

    public function getDatecreation(): ?\DateTimeInterface
    {
        return $this->datecreation;
    }

    public function setDatecreation(\DateTimeInterface $datecreation): self
    {
        $this->datecreation = $datecreation;

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


    public function __toString(){
        return $this->service;
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


}
