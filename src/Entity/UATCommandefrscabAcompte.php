<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Table(name: 'ua_t_commandefrscab_acompte')]
#[ORM\Entity(repositoryClass: \App\Repository\UATCommandefrscabAcompteRepository::class)]
#[ORM\HasLifecycleCallbacks]
class UATCommandefrscabAcompte {

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    /**
     * @var string
     */
    #[ORM\Column(type: 'string', length: 100, nullable: true)]
    private $code;

    /**
     * @var \DateTime|null
     */
    #[Assert\NotBlank]
    #[ORM\Column(type: 'date', nullable: false)]
    private $date;

    /**
     * @var float
     */
    #[Assert\NotBlank]
    #[ORM\Column(type: 'float', precision: 10, scale: 0, nullable: false)]
    private $montant;

    /**
     * @var float
     */
    #[Assert\NotBlank]
    #[ORM\Column(type: 'float', precision: 10, scale: 0, nullable: false)]
    private $pourcentage;

    #[ORM\JoinColumn(name: 'x_banque_id', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \App\Entity\UXBanque::class)]
    private $banque;

    #[ORM\JoinColumn(name: 'modepaiement_id', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \App\Entity\PModepaiement::class)]
    private $modepaiement;

    /**
     * @var \DateTime|null
     */
    #[ORM\Column(type: 'date', nullable: true)]
    private $dateecheance;

    /**
     * @var string|null
     */
    #[ORM\Column(type: 'string', length: 100, nullable: true)]
    private $numcheque;

    #[ORM\JoinColumn(name: 'u_p_devise_id', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \App\Entity\UPDevise::class)]
    private $devise;

    #[ORM\JoinColumn(name: 'p_dossier_id', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \App\Entity\PDossier::class)]
    private $dossier;

    #[ORM\JoinColumn(name: 'ua_t_facturefrscab_id', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \App\Entity\UaTFacturefrscab::class)]
    private $facture;
    
     #[ORM\JoinColumn(name: 'ua_t_livraisonfrscab_id', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \App\Entity\UaTLivraisonfrscab::class)]
    private $reception;

    #[ORM\JoinColumn(name: 'ua_t_commandefrscab_id', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \App\Entity\UATCommandefrscab::class, inversedBy: 'acomptes')]
    private $commande;

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

    #[ORM\JoinColumn(name: 'user_created', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \User::class)]
    private $userCreated;

    #[ORM\JoinColumn(name: 'user_updated', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \User::class)]
    private $userUpdated;

    /**
     * @var string|null
     */
    #[ORM\Column(type: 'text', nullable: true)]
    private $description;

    #[ORM\PrePersist]
    public function setCreatedValue() {

        $this->created = new \DateTime();
    }

    #[ORM\PreUpdate]
    public function setUpdatedValue() {
        $this->updated = new \DateTime();
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

    public function getDate(): ?\DateTimeInterface {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self {
        $this->date = $date;

        return $this;
    }

    public function getMontant(): ?float {
        return $this->montant;
    }

    public function setMontant(float $montant): self {
        $this->montant = $montant;

        return $this;
    }

    public function getDateecheance(): ?\DateTimeInterface {
        return $this->dateecheance;
    }

    public function setDateecheance(?\DateTimeInterface $dateecheance): self {
        $this->dateecheance = $dateecheance;

        return $this;
    }

    public function getNumcheque(): ?string {
        return $this->numcheque;
    }

    public function setNumcheque(?string $numcheque): self {
        $this->numcheque = $numcheque;

        return $this;
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

    public function getDescription(): ?string {
        return $this->description;
    }

    public function setDescription(?string $description): self {
        $this->description = $description;

        return $this;
    }

    public function getBanque(): ?UXBanque {
        return $this->banque;
    }

    public function setBanque(?UXBanque $banque): self {
        $this->banque = $banque;

        return $this;
    }

    public function getModepaiement(): ?PModepaiement {
        return $this->modepaiement;
    }

    public function setModepaiement(?PModepaiement $modepaiement): self {
        $this->modepaiement = $modepaiement;

        return $this;
    }

    public function getDevise(): ?UPDevise {
        return $this->devise;
    }

    public function setDevise(?UPDevise $devise): self {
        $this->devise = $devise;

        return $this;
    }

    public function getDossier(): ?PDossier {
        return $this->dossier;
    }

    public function setDossier(?PDossier $dossier): self {
        $this->dossier = $dossier;

        return $this;
    }

   

    public function getCommande(): ?UATCommandefrscab {
        return $this->commande;
    }

    public function setCommande(?UATCommandefrscab $commande): self {
        $this->commande = $commande;

        return $this;
    }

    public function getUserCreated(): ?User {
        return $this->userCreated;
    }

    public function setUserCreated(?User $userCreated): self {
        $this->userCreated = $userCreated;

        return $this;
    }

    public function getUserUpdated(): ?User {
        return $this->userUpdated;
    }

    public function setUserUpdated(?User $userUpdated): self {
        $this->userUpdated = $userUpdated;

        return $this;
    }

    public function getPourcentage(): ?float
    {
        return $this->pourcentage;
    }

    public function setPourcentage(float $pourcentage): self
    {
        $this->pourcentage = $pourcentage;

        return $this;
    }

    public function getFacture(): ?UaTFacturefrscab
    {
        return $this->facture;
    }

    public function setFacture(?UaTFacturefrscab $facture): self
    {
        $this->facture = $facture;

        return $this;
    }

    public function getReception(): ?UaTLivraisonfrscab
    {
        return $this->reception;
    }

    public function setReception(?UaTLivraisonfrscab $reception): self
    {
        $this->reception = $reception;

        return $this;
    }

}
