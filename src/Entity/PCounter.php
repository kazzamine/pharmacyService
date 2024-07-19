<?php

namespace App\Entity;

use App\Repository\PCounterRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PCounterRepository::class)]
class PCounter
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    
    #[ORM\JoinColumn(name: 'p_dossier_id', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \App\Entity\PDossier::class)]
    private $pDossier;

    #[ORM\JoinColumn(name: 'p_piece_id', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \App\Entity\PPiece::class)]
    private $pPiece;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $pPieceAbrev;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $pDossierAbrev;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $annee;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $pPieceDesig;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $compt;

    #[ORM\JoinColumn(name: 'user_updated', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \User::class)]
    private $userUpdated;

    #[ORM\Column(type: 'date', nullable: true)]
    private $updatedAt;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getPPiece(): ?UpPiece
    {
        return $this->pPiece;
    }

    public function setPPiece(?UpPiece $pPiece): self
    {
        $this->pPiece = $pPiece;

        return $this;
    }

    public function getPPieceAbrev(): ?string
    {
        return $this->pPieceAbrev;
    }

    public function setPPieceAbrev(?string $pPieceAbrev): self
    {
        $this->pPieceAbrev = $pPieceAbrev;

        return $this;
    }

    public function getPDossierAbrev(): ?string
    {
        return $this->pDossierAbrev;
    }

    public function setPDossierAbrev(?string $pDossierAbrev): self
    {
        $this->pDossierAbrev = $pDossierAbrev;

        return $this;
    }

    public function getAnnee(): ?int
    {
        return $this->annee;
    }

    public function setAnnee(?int $annee): self
    {
        $this->annee = $annee;

        return $this;
    }

    public function getPPieceDesig(): ?string
    {
        return $this->pPieceDesig;
    }

    public function setPPieceDesig(?string $pPieceDesig): self
    {
        $this->pPieceDesig = $pPieceDesig;

        return $this;
    }

    public function getCompt(): ?int
    {
        return $this->compt;
    }

    public function setCompt(?int $compt): self
    {
        $this->compt = $compt;

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

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }
}
