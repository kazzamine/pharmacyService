<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Table(name: 'univ_t_reglement')]
#[ORM\Entity(repositoryClass: \App\Repository\UnivTReglementRepository::class)]
#[ORM\HasLifecycleCallbacks]
class UnivTReglement {

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
     * @var string
     *
     */
    #[Assert\NotBlank]
    #[ORM\Column(type: 'float', nullable: true)]
    private $montant;

    /**
     *
     * @var string
     */
    #[ORM\Column(type: 'string', nullable: true)]
    private $reference;

    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=true)
     */
    /**
     * @var string
     */
    #[ORM\Column(type: 'string', nullable: true)]
    private $impayer;

    /**
     * @var string
     */
    #[ORM\Column(type: 'float', nullable: true)]
    private $remise;

    /**
     * @var \DateTime
     *
     *
     */
    #[Assert\NotBlank]
    #[ORM\Column(type: 'date', nullable: true)]
    private $dateReglement;

    /**
     * @var \DateTime
     *
     *
     */
    #[ORM\Column(type: 'date', nullable: true)]
    private $dateEcheance;

    /**
     *
     * @var \DateTime
     *
     *
     */
    #[ORM\Column(type: 'string', length: 100, nullable: true)]
    private $sens;

    #[ORM\JoinColumn(referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \UnivTOperationcab::class)]
    private $cab;

    #[ORM\JoinColumn(referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \UnivXModalite::class)]
    private $modalite;

    #[ORM\JoinColumn(referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \UnivXBanque::class)]
    private $banque;

    /**
     * @var integer
     */
    #[ORM\Column(type: 'boolean', nullable: true)]
    private $active;

    /**
     *
     * @var \DateTime
     *
     *
     */
    #[ORM\Column(type: 'datetime', nullable: true)]
    private $created;

    /**
     *
     * @var \DateTime
     *
     */
    #[ORM\Column(type: 'datetime', nullable: true)]
    private $updated;

    #[ORM\JoinColumn(referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \User::class)]
    private $userCreated;

    #[ORM\JoinColumn(referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \User::class)]
    private $userUpdated;

    #[ORM\ManyToOne(targetEntity: \App\Entity\UnivTBrdpaiement::class, inversedBy: 'univTReglements')]
    private $brd;

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

    public function getMontant(): ?float {
        return $this->montant;
    }

    public function setMontant(?float $montant): self {
        $this->montant = $montant;

        return $this;
    }

    public function getReference(): ?string {
        return $this->reference;
    }

    public function setReference(?string $reference): self {
        $this->reference = $reference;

        return $this;
    }

 


    public function getBrd(): ?UnivTBrdpaiement {
        return $this->brd;
    }

    public function setBrd(?UnivTBrdpaiement $brd): self {
        $this->brd = $brd;

        return $this;
    }

    public function getImpayer(): ?string {
        return $this->impayer;
    }

    public function setImpayer(?string $impayer): self {
        $this->impayer = $impayer;

        return $this;
    }

    public function getRemise(): ?float {
        return $this->remise;
    }

    public function setRemise(?float $remise): self {
        $this->remise = $remise;

        return $this;
    }

    public function getDateReglement(): ?\DateTimeInterface {
        return $this->dateReglement;
    }

    public function setDateReglement(?\DateTimeInterface $dateReglement): self {
        $this->dateReglement = $dateReglement;

        return $this;
    }

    public function getSens(): ?string {
        return $this->sens;
    }

    public function setSens(?string $sens): self {
        $this->sens = $sens;

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

    public function getCab(): ?UnivTOperationcab {
        return $this->cab;
    }

    public function setCab(?UnivTOperationcab $cab): self {
        $this->cab = $cab;

        return $this;
    }

    public function getModalite(): ?UnivXModalite {
        return $this->modalite;
    }

    public function setModalite(?UnivXModalite $modalite): self {
        $this->modalite = $modalite;

        return $this;
    }

    public function getBanque(): ?UnivXBanque {
        return $this->banque;
    }

    public function setBanque(?UnivXBanque $banque): self {
        $this->banque = $banque;

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

    public function getDateEcheance(): ?\DateTimeInterface
    {
        return $this->dateEcheance;
    }

    public function setDateEcheance(?\DateTimeInterface $dateEcheance): self
    {
        $this->dateEcheance = $dateEcheance;

        return $this;
    }

}
