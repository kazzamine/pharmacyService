<?php

namespace App\Entity;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * projet
 *
 *
 *
 *
 *
 *
 *
 */
#[ORM\Table(name: 'u_p_projet')]
#[ORM\HasLifecycleCallbacks]
#[ORM\Entity(repositoryClass: \App\Repository\UPProjetRepository::class)]
class UPProjet
{

    /**
     * @var int
     */
    #[ORM\Column(name: 'id', type: 'integer')]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    private $id;

    /**
     * @var string
     */
    #[ORM\Column(name: 'code', type: 'string', length: 255, nullable: true)]
    private $code;

    /**
     * @var string
     */
    #[Assert\NotBlank]
    #[ORM\Column(name: 'intitule', type: 'string', length: 255, nullable: false)]
    private $intitule;

    /**
     * @var string
     */
    #[Assert\NotBlank]
    #[ORM\Column(name: 'designation', type: 'string', length: 255, nullable: true)]
    private $designation;

    /**
     * @var string
     */
    #[Assert\NotBlank]
    #[ORM\Column(name: 'abreviation', type: 'string', length: 100, nullable: true)]
    private $abreviation;

    /**
     * @var string
     */
    #[ORM\Column(name: 'description', type: 'text', nullable: true)]
    private $description;

    /**
     * @var int
     */
    #[ORM\Column(type: 'boolean', nullable: true)]
    private $active;

    #[ORM\OneToMany(targetEntity: \App\Entity\PProjetSous::class, mappedBy: 'projet')]
    private $sous;


    /**
     * @var int
     */
    #[ORM\Column(type: 'boolean', nullable: true)]
    private $cloturer;



    /**
     * @var int
     */
    #[ORM\Column(type: 'boolean', nullable: true)]
    private $facturer;




    /**
     * @var string
     */
    #[ORM\Column(name: 'description_detail', type: 'text', nullable: true)]
    private $descriptionDetail;

    /**
     *
     * @var \DateTime
     *
     *
     *
     */
    #[Assert\Date]
    #[ORM\Column(name: 'date_debut', type: 'datetime', nullable: true)]
    private $dateDebut;

    /**
     *
     * @var \DateTime
     */
    #[Assert\Date]
    #[ORM\Column(name: 'date_fin', type: 'datetime', nullable: true)]
    private $dateFin;









    /**
     *
     * @var \DateTime
     */
    #[ORM\Column(name: 'created', type: 'datetime', nullable: true)]
    private $created;

    /**
     * @var \DateTime
     */
    #[ORM\Column(name: 'updated', type: 'datetime', nullable: true)]
    private $updated;



    #[ORM\JoinColumn(name: 'user_created', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \User::class)]
    private $userCreated;

    #[ORM\JoinColumn(name: 'user_updated', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \User::class)]
    private $userUpdated;

    #[ORM\ManyToOne(targetEntity: \App\Entity\UPResponsable::class, inversedBy: 'uPProjets')]
    private $responsable;

    #[ORM\JoinTable(name: 'p_projets_dossiers')]
    #[Assert\Count(min: '1', minMessage: 'Cette valeur ne doit pas être vide.')]
    #[ORM\ManyToMany(targetEntity: \App\Entity\PDossier::class, inversedBy: 'projets')]
    private $dossiers;



    public function __construct()
    {
        $this->dossiers = new ArrayCollection();
        $this->sous = new ArrayCollection();
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

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIntitule(): ?string
    {
        return $this->intitule;
    }

    public function setIntitule(string $intitule): self
    {
        $this->intitule = $intitule;

        return $this;
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Collection|Uarticle[]
     */
    public function getSous(): Collection
    {
        return $this->sous;
    }

    public function addSous(PProjetsous $sous): self
    {
        if (!$this->sous->contains($sous)) {
            $this->sous[] = $sous;
            $sous->setProjet($this);
        }

        return $this;
    }

    public function removeSous(PProjetsous $sous): self
    {
        if ($this->sous->contains($sous)) {
            $this->sous->removeElement($sous);
            // set the owning side to null (unless already changed)
            if ($sous->getProjet() === $this) {
                $sous->setProjet(null);
            }
        }

        return $this;
    }


    public function getDescriptionDetail(): ?string
    {
        return $this->descriptionDetail;
    }

    public function setDescriptionDetail(?string $descriptionDetail): self
    {
        $this->descriptionDetail = $descriptionDetail;

        return $this;
    }

    public function getDateDebut(): ?\DateTimeInterface
    {
        return $this->dateDebut;
    }

    public function setDateDebut(?\DateTimeInterface $dateDebut): self
    {
        $this->dateDebut = $dateDebut;

        return $this;
    }

    public function getDateFin(): ?\DateTimeInterface
    {
        return $this->dateFin;
    }

    public function setDateFin(?\DateTimeInterface $dateFin): self
    {
        $this->dateFin = $dateFin;

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

    public function getCloturer(): ?bool
    {
        return $this->cloturer;
    }

    public function setCloturer(?bool $cloturer): self
    {
        $this->cloturer = $cloturer;

        return $this;
    }

    public function getFacturer(): ?bool
    {
        return $this->facturer;
    }

    public function setFacturer(?bool $facturer): self
    {
        $this->facturer = $facturer;

        return $this;
    }

    public function getResponsable(): ?UPResponsable
    {
        return $this->responsable;
    }

    public function setResponsable(?UPResponsable $responsable): self
    {
        $this->responsable = $responsable;

        return $this;
    }

    /**
     * @return Collection|PDossier[]
     */
    public function getDossiers(): Collection
    {
        return $this->dossiers;
    }

    public function addDossiers(PDossier $dossier): self
    {
        if (!$this->dossiers->contains($dossier)) {
            $this->dossiers[] = $dossier;
        }

        return $this;
    }

    public function removeDossiers(PDossier $dossier): self
    {
        if ($this->dossiers->contains($dossier)) {
            $this->dossiers->removeElement($dossier);
        }

        return $this;
    }

    public function addDossier(PDossier $dossier): self
    {
        if (!$this->dossiers->contains($dossier)) {
            $this->dossiers[] = $dossier;
        }

        return $this;
    }

    public function removeDossier(PDossier $dossier): self
    {
        if ($this->dossiers->contains($dossier)) {
            $this->dossiers->removeElement($dossier);
        }

        return $this;
    }
}
