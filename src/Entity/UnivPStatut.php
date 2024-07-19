<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * PStatut
 *
 */
#[ORM\Table(name: 'univ_p_statut')]
#[ORM\UniqueConstraint(name: 'abreviation_sous_module', columns: ['abreviation', 'sous_module'])]
#[ORM\Entity]
#[ORM\HasLifecycleCallbacks]
class UnivPStatut {

        
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
    #[ORM\Column(type: 'string', length: 100, nullable: true)]
    private $designation;

    /**
     * @var string
     *
     */
    #[Assert\NotBlank]
    #[ORM\Column(type: 'string', length: 100, nullable: true)]
    private $abreviation;

    /**
     * @var string
     */
    #[ORM\Column(name: 'table_0', type: 'string', length: 100, nullable: true)]
    private $table0;

    /**
     * @var string
     */
    #[ORM\Column(name: 'phase_0', type: 'string', length: 100, nullable: true)]
    private $phase0;

    /**
     * @var integer
     */
    #[ORM\Column(type: 'integer', nullable: true)]
    private $visible ;

    /**
     * @var integer
     */
    #[ORM\Column(type: 'integer', nullable: true)]
    private $visibleAdmission;

    /**
     * @var string
     */
    #[ORM\Column(length: 100, nullable: true)]
    private $next;

    /**
     * @var integer
     */
    #[ORM\Column(type: 'boolean', nullable: true)]
    private $active;

    /**
     * @var integer
     */
    #[ORM\Column(type: 'smallint', nullable: true)]
    private $annuler;

    

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

    #[ORM\Column(type: 'string', length: 100, nullable: true)]
    private $sousModule;

    #[ORM\Column(type: 'string', length: 100, nullable: true)]
    private $rubrique;

    #[ORM\PrePersist]
    public function setCreatedValue() {

        $this->created = new \DateTime();
    }

    #[ORM\PreUpdate]
    public function setUpdatedValue() {
        $this->updated = new \DateTime();
    }

    public function __construct() {

       
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getDesignation(): ?string
    {
        return $this->designation;
    }

    public function setDesignation(?string $designation): self
    {
        $this->designation = $designation;

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

    public function getTable0(): ?string
    {
        return $this->table0;
    }

    public function setTable0(?string $table0): self
    {
        $this->table0 = $table0;

        return $this;
    }

    public function getPhase0(): ?string
    {
        return $this->phase0;
    }

    public function setPhase0(?string $phase0): self
    {
        $this->phase0 = $phase0;

        return $this;
    }

    public function getVisible(): ?int
    {
        return $this->visible;
    }

    public function setVisible(?int $visible): self
    {
        $this->visible = $visible;

        return $this;
    }

    public function getVisibleAdmission(): ?int
    {
        return $this->visibleAdmission;
    }

    public function setVisibleAdmission(?int $visibleAdmission): self
    {
        $this->visibleAdmission = $visibleAdmission;

        return $this;
    }

    public function getNext(): ?string
    {
        return $this->next;
    }

    public function setNext(?string $next): self
    {
        $this->next = $next;

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

    public function getAnnuler(): ?int
    {
        return $this->annuler;
    }

    public function setAnnuler(?int $annuler): self
    {
        $this->annuler = $annuler;

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

    public function getSousModule(): ?string
    {
        return $this->sousModule;
    }

    public function setSousModule(?string $sousModule): self
    {
        $this->sousModule = $sousModule;

        return $this;
    }

    public function getRubrique(): ?string
    {
        return $this->rubrique;
    }

    public function setRubrique(?string $rubrique): self
    {
        $this->rubrique = $rubrique;

        return $this;
    }


    
}
