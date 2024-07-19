<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Table(name: 'univ_d_dotation')]
#[ORM\Entity(repositoryClass: \App\Repository\UnivDDotationRepository::class)]
class UnivDDotation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 100)]
    private $code;

    #[ORM\Column(name: 'code_admission', type: 'string', length: 100)]
    private $codeAdmission;

    #[ORM\Column(type: 'float', nullable: true)]
    private $montant;

    #[ORM\Column(name: 'type_paiement', type: 'string', length: 100, nullable: true)]
    private $typePaiement;

    #[ORM\Column(type: 'string', length: 50, nullable: true)]
    private $reference;

    #[ORM\Column(name: 'date_echeance', type: 'date', nullable: true)]
    private $dateEcheance;

    #[ORM\Column(type: 'string', length: 100, nullable: true)]
    private $banqueindex;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private $date;

    #[ORM\Column(type: 'string', length: 100, nullable: true)]
    private $userindex;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(string $code): self
    {
        $this->code = $code;

        return $this;
    }

    public function getCodeAdmission(): ?string
    {
        return $this->codeAdmission;
    }

    public function setCodeAdmission(string $codeAdmission): self
    {
        $this->codeAdmission = $codeAdmission;

        return $this;
    }

    public function getMontant(): ?float
    {
        return $this->montant;
    }

    public function setMontant(?float $montant): self
    {
        $this->montant = $montant;

        return $this;
    }

    public function getTypePaiement(): ?string
    {
        return $this->typePaiement;
    }

    public function setTypePaiement(?string $typePaiement): self
    {
        $this->typePaiement = $typePaiement;

        return $this;
    }

    public function getReference(): ?string
    {
        return $this->reference;
    }

    public function setReference(?string $reference): self
    {
        $this->reference = $reference;

        return $this;
    }

    public function getDateEcheance(): ?\DateTimeInterface
    {
        return $this->dateEcheance;
    }

    public function setDateEcheance(?\DateTimeInterface $dateEcheance): self
    {
        $this->dateEcheance = $dateEcheance;

        return $this;
    }

    public function getBanqueindex(): ?string
    {
        return $this->banqueindex;
    }

    public function setBanqueindex(?string $banqueindex): self
    {
        $this->banqueindex = $banqueindex;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(?\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getUserindex(): ?string
    {
        return $this->userindex;
    }

    public function setUserindex(?string $userindex): self
    {
        $this->userindex = $userindex;

        return $this;
    }
}
