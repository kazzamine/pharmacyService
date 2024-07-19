<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;


#[ORM\Table]
#[ORM\UniqueConstraint(name: '_unique_inscription_controle_element', columns: ['inscription_id', 'controle_element_id'])]
#[ORM\Entity(repositoryClass: \App\Repository\UnivExEnotesRepository::class)]
#[ORM\HasLifecycleCallbacks]
class UnivExEnotes
{

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', nullable: true)]
    private $reference;

    #[ORM\JoinColumn(referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \UnivTInscription::class)]
    private $inscription;

    #[ORM\JoinColumn(referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \UnivAcAnnee::class)]
    private $annee;

    #[ORM\JoinColumn(referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \UnivExControleElement::class, inversedBy: 'enotes')]
    private $controleElement;

    #[ORM\Column(type: 'float', nullable: true)]
    private $mCc;

    #[ORM\Column(type: 'float', nullable: true)]
    private $mTp;

    #[ORM\Column(type: 'float', nullable: true)]
    private $mEf;

    #[ORM\Column(type: 'float', nullable: true)]
    private $ccR;

    #[ORM\Column(type: 'float', nullable: true)]
    private $tpR;

    #[ORM\Column(type: 'float', nullable: true)]
    private $efR;

    #[ORM\Column(type: 'float', nullable: true)]
    private $noteIni;

    #[ORM\Column(type: 'float', nullable: true)]
    private $note;

    #[ORM\Column(name: 'pond_m_cc', type: 'integer', nullable: true)]
    private $pondMCc = 1;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $pondCcR = 1;

    #[ORM\Column(name: 'pond_m_tp', type: 'integer', nullable: true)]
    private $pondMTp = 1;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $pondTpR = 1;

    #[ORM\Column(name: 'pond_m_ef', type: 'integer', nullable: true)]
    private $pondMEf = 1;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $pondEfR = 1;

    #[ORM\Column(type: 'float', nullable: true)]
    private $noteRat;

    
    #[Assert\Range(min: 0, max: 20)]
    #[Assert\Type(type: 'numeric')]
    #[ORM\Column(type: 'float', nullable: true)]
    private $noteRachat;

    #[ORM\Column(type: 'text', nullable: true)]
    private $observation;

    #[ORM\Column(type: 'float', nullable: true)]
    private $ccRachat;

    #[ORM\Column(type: 'float', nullable: true)]
    private $tpRachat;

    #[ORM\Column(type: 'float', nullable: true)]
    private $exRachat;

    #[ORM\JoinColumn(referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \UnivPEstatut::class)]
    private $statutS1;

    #[ORM\JoinColumn(referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \UnivPEstatut::class)]
    private $statutS2;
    
     #[ORM\JoinColumn(referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \UnivPEstatut::class)]
    private $statutRachat;
    

    #[ORM\JoinColumn(referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \UnivPEstatut::class)]
    private $statutDef;

    #[ORM\JoinColumn(referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \UnivPEstatut::class)]
    private $statutAff;

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

    #[ORM\PrePersist]
    public function setCreatedValue()
    {

        $this->created = new \DateTime();
    }

    #[ORM\PreUpdate]
    public function setUpdatedValue()
    {
        $this->updated = new \DateTime();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getMCc(): ?float
    {
        return $this->mCc;
    }

    public function setMCc(?float $mCc): self
    {
        $this->mCc = $mCc;

        return $this;
    }

    public function getMTp(): ?float
    {
        return $this->mTp;
    }

    public function setMTp(?float $mTp): self
    {
        $this->mTp = $mTp;

        return $this;
    }

    public function getMEf(): ?float
    {
        return $this->mEf;
    }

    public function setMEf(?float $mEf): self
    {
        $this->mEf = $mEf;

        return $this;
    }

    public function getCcR(): ?float
    {
        return $this->ccR;
    }

    public function setCcR(?float $ccR): self
    {
        $this->ccR = $ccR;

        return $this;
    }

    public function getTpR(): ?float
    {
        return $this->tpR;
    }

    public function setTpR(?float $tpR): self
    {
        $this->tpR = $tpR;

        return $this;
    }

    public function getEfR(): ?float
    {
        return $this->efR;
    }

    public function setEfR(?float $efR): self
    {
        $this->efR = $efR;

        return $this;
    }

    public function getNoteIni(): ?float
    {
        return $this->noteIni;
    }

    public function setNoteIni(?float $noteIni): self
    {
        $this->noteIni = $noteIni;

        return $this;
    }

    public function getNote(): ?float
    {
        return $this->note;
    }

    public function setNote(?float $note): self
    {
        $this->note = $note;

        return $this;
    }

    public function getPondMCc(): ?int
    {
        return $this->pondMCc;
    }

    public function setPondMCc(?int $pondMCc): self
    {
        $this->pondMCc = $pondMCc;

        return $this;
    }

    public function getPondCcR(): ?int
    {
        return $this->pondCcR;
    }

    public function setPondCcR(?int $pondCcR): self
    {
        $this->pondCcR = $pondCcR;

        return $this;
    }

    public function getPondMTp(): ?int
    {
        return $this->pondMTp;
    }

    public function setPondMTp(?int $pondMTp): self
    {
        $this->pondMTp = $pondMTp;

        return $this;
    }

    public function getPondTpR(): ?int
    {
        return $this->pondTpR;
    }

    public function setPondTpR(?int $pondTpR): self
    {
        $this->pondTpR = $pondTpR;

        return $this;
    }

    public function getPondMEf(): ?int
    {
        return $this->pondMEf;
    }

    public function setPondMEf(?int $pondMEf): self
    {
        $this->pondMEf = $pondMEf;

        return $this;
    }

    public function getPondEfR(): ?int
    {
        return $this->pondEfR;
    }

    public function setPondEfR(?int $pondEfR): self
    {
        $this->pondEfR = $pondEfR;

        return $this;
    }

    public function getNoteRat(): ?float
    {
        return $this->noteRat;
    }

    public function setNoteRat(?float $noteRat): self
    {
        $this->noteRat = $noteRat;

        return $this;
    }

    public function getNoteRachat(): ?float
    {
        return $this->noteRachat;
    }

    public function setNoteRachat(?float $noteRachat): self
    {
        $this->noteRachat = $noteRachat;

        return $this;
    }

    public function getObservation(): ?string
    {
        return $this->observation;
    }

    public function setObservation(?string $observation): self
    {
        $this->observation = $observation;

        return $this;
    }

    public function getCcRachat(): ?float
    {
        return $this->ccRachat;
    }

    public function setCcRachat(?float $ccRachat): self
    {
        $this->ccRachat = $ccRachat;

        return $this;
    }

    public function getTpRachat(): ?float
    {
        return $this->tpRachat;
    }

    public function setTpRachat(?float $tpRachat): self
    {
        $this->tpRachat = $tpRachat;

        return $this;
    }

    public function getExRachat(): ?float
    {
        return $this->exRachat;
    }

    public function setExRachat(?float $exRachat): self
    {
        $this->exRachat = $exRachat;

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

    public function getInscription(): ?UnivTInscription
    {
        return $this->inscription;
    }

    public function setInscription(?UnivTInscription $inscription): self
    {
        $this->inscription = $inscription;

        return $this;
    }

    public function getAnnee(): ?UnivAcAnnee
    {
        return $this->annee;
    }

    public function setAnnee(?UnivAcAnnee $annee): self
    {
        $this->annee = $annee;

        return $this;
    }


    public function getStatutS1(): ?UnivPEstatut
    {
        return $this->statutS1;
    }

    public function setStatutS1(?UnivPEstatut $statutS1): self
    {
        $this->statutS1 = $statutS1;

        return $this;
    }

    public function getStatutS2(): ?UnivPEstatut
    {
        return $this->statutS2;
    }

    public function setStatutS2(?UnivPEstatut $statutS2): self
    {
        $this->statutS2 = $statutS2;

        return $this;
    }

    public function getStatutDef(): ?UnivPEstatut
    {
        return $this->statutDef;
    }

    public function setStatutDef(?UnivPEstatut $statutDef): self
    {
        $this->statutDef = $statutDef;

        return $this;
    }

    public function getStatutAff(): ?UnivPEstatut
    {
        return $this->statutAff;
    }

    public function setStatutAff(?UnivPEstatut $statutAff): self
    {
        $this->statutAff = $statutAff;

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

    public function getControleElement(): ?UnivExControleElement
    {
        return $this->controleElement;
    }

    public function setControleElement(?UnivExControleElement $controleElement): self
    {
        $this->controleElement = $controleElement;

        return $this;
    }

    public function getStatutRachat(): ?UnivPEstatut
    {
        return $this->statutRachat;
    }

    public function setStatutRachat(?UnivPEstatut $statutRachat): self
    {
        $this->statutRachat = $statutRachat;

        return $this;
    }
}
