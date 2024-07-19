<?php

namespace App\Entity;

use App\Repository\GaccentryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use App\Entity\Gaccentryd;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Table(name: 'gaccentry')]
#[ORM\Entity(repositoryClass: \App\Repository\GaccentryRepository::class)]
class Gaccentry
{
   #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $typ;
    

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $num ;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $cpy ;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $fcy ;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $jou ;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $fiy ;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $per ;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private $accdat ;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private $duddat ;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private $ratdat ;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $cat ;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $sta ;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $orimod ;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $dacdia ;

    #[ORM\Column(type: 'boolean', nullable: true)]
    private $flgpaz ;

    #[ORM\Column(type: 'boolean', nullable: true)]
    private $flggen ;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $cur ;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $typrat ;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $led ;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $curled ;

    #[ORM\Column(type: 'float', nullable: true)]
    private $ratmlt ;

    #[ORM\Column(type: 'float', nullable: true)]
    private $ratdiv ;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $desvcr ;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $ref ;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $bprvcr ;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $rvs ;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private $rvsdat ;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $rvsorinum ;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $xdossier ;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $xidfacini ;

 
    #[ORM\OneToMany(targetEntity: Gaccentryd::class, mappedBy: 'ecritureCab')]
    private $ecritureDets;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $fczIdLocal ;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $fczIdSystemeCm ;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $fczIdCp ;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $fczDescriptionSysteme ;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $fczIdTierPiece ;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $fczIdSite ;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $fczDescriptionSite ;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $fczDescriptionTierPiece ;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $fczIdDoc2Asso ;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $fczIdDoc1Asso ;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $fczEcRef ;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $fczFactureini ;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $fczMotifAnnul ;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $fczAutreInformation ;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $fczTypePaiement ;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $fczTypeBanque ;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $fczCheqNum ;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $fczCheqType ;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $fczCheqBnq ;

    #[ORM\Column(type: 'float', nullable: true)]
    private $fczMontantInitial ;

    #[ORM\Column(type: 'float', nullable: true)]
    private $fczMontantRemise ;

    #[ORM\Column(type: 'float', nullable: true)]
    private $fczMontantRetenu ;

    #[ORM\Column(type: 'float', nullable: true)]
    private $fczMontantNet ;

    #[ORM\Column(type: 'float', nullable: true)]
    private $fczMontantAutre1 ;

    #[ORM\Column(type: 'float', nullable: true)]
    private $fczMontantAutre2 ;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $fczCcMaxRef ;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $fczCcMaxMt ;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $fczFlag1=true ;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $fczFlag2=false ;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $fczFlag3=false ;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $fczFlag4=false ;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $fczFlag5=false ;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private $fczDateInterfCm ;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $fczUserNameCm ;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private $fczDateInterfCp ;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $fczUserNameCp ;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $fczIdAdPiece ;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $typ1 ;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $cpy1 ;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $fcy1 ;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $cce0 ;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $numx30 ;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $updtick0 ;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private $bprdatvcr0 ;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $expnum0 ;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private $credat0 ;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $creusr0 ;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private $upddat0 ;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $updusr0 ;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private $credattim0 ;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private $upddattim0 ;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $auuid0 ;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $flagInerfacage ;
    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $code ;
   

    public function __construct()
    {
        $this->ecritureDets = new ArrayCollection();
        $this->accdat = new \DateTime();
        $this->upddattim0 = new \DateTime();
        $this->credattim0 = new \DateTime();
        $this->upddat0 = new \DateTime();
        $this->credat0 = new \DateTime();
        $this->bprdatvcr0 = new \DateTime();
        $this->fczDateInterfCp = new \DateTime();
        $this->fczDateInterfCm = new \DateTime();
        $this->duddat = new \DateTime();
        $this->ratdat = new \DateTime();
        $this->rvsdat = new \DateTime();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTyp(): ?string
    {
        return $this->typ;
    }

    public function setTyp(?string $typ): self
    {
        $this->typ = $typ;

        return $this;
    }

    public function getNum(): ?string
    {
        return $this->num;
    }

    public function setNum(?string $num): self
    {
        $this->num = $num;

        return $this;
    }

    public function getCpy(): ?string
    {
        return $this->cpy;
    }

    public function setCpy(?string $cpy): self
    {
        $this->cpy = $cpy;

        return $this;
    }

    public function getFcy(): ?string
    {
        return $this->fcy;
    }

    public function setFcy(?string $fcy): self
    {
        $this->fcy = $fcy;

        return $this;
    }

    public function getJou(): ?string
    {
        return $this->jou;
    }

    public function setJou(?string $jou): self
    {
        $this->jou = $jou;

        return $this;
    }

    public function getFiy(): ?int
    {
        return $this->fiy;
    }

    public function setFiy(?int $fiy): self
    {
        $this->fiy = $fiy;

        return $this;
    }

    public function getPer(): ?int
    {
        return $this->per;
    }

    public function setPer(?int $per): self
    {
        $this->per = $per;

        return $this;
    }

    public function getAccdat(): ?\DateTimeInterface
    {
        return $this->accdat;
    }

    public function setAccdat(?\DateTimeInterface $accdat): self
    {
        $this->accdat = $accdat;

        return $this;
    }

    public function getDuddat(): ?\DateTimeInterface
    {
        return $this->duddat;
    }

    public function setDuddat(?\DateTimeInterface $duddat): self
    {
        $this->duddat = $duddat;

        return $this;
    }

    public function getRatdat(): ?\DateTimeInterface
    {
        return $this->ratdat;
    }

    public function setRatdat(?\DateTimeInterface $ratdat): self
    {
        $this->ratdat = $ratdat;

        return $this;
    }

    public function getCat(): ?int
    {
        return $this->cat;
    }

    public function setCat(?int $cat): self
    {
        $this->cat = $cat;

        return $this;
    }

    public function getSta(): ?int
    {
        return $this->sta;
    }

    public function setSta(?int $sta): self
    {
        $this->sta = $sta;

        return $this;
    }

    public function getOrimod(): ?int
    {
        return $this->orimod;
    }

    public function setOrimod(int $orimod): self
    {
        $this->orimod = $orimod;

        return $this;
    }

    public function getDacdia(): ?string
    {
        return $this->dacdia;
    }

    public function setDacdia(?string $dacdia): self
    {
        $this->dacdia = $dacdia;

        return $this;
    }

    public function isFlgpaz(): ?bool
    {
        return $this->flgpaz;
    }

    public function setFlgpaz(?bool $flgpaz): self
    {
        $this->flgpaz = $flgpaz;

        return $this;
    }

    public function isFlggen(): ?bool
    {
        return $this->flggen;
    }

    public function setFlggen(?bool $flggen): self
    {
        $this->flggen = $flggen;

        return $this;
    }

    public function getCur(): ?string
    {
        return $this->cur;
    }

    public function setCur(string $cur): self
    {
        $this->cur = $cur;

        return $this;
    }

    public function getTyprat(): ?int
    {
        return $this->typrat;
    }

    public function setTyprat(?int $typrat): self
    {
        $this->typrat = $typrat;

        return $this;
    }

    public function getLed(): ?string
    {
        return $this->led;
    }

    public function setLed(?string $led): self
    {
        $this->led = $led;

        return $this;
    }

    public function getCurled(): ?string
    {
        return $this->curled;
    }

    public function setCurled(?string $curled): self
    {
        $this->curled = $curled;

        return $this;
    }

    public function getRatmlt(): ?float
    {
        return $this->ratmlt;
    }

    public function setRatmlt(?float $ratmlt): self
    {
        $this->ratmlt = $ratmlt;

        return $this;
    }

    public function getRatdiv(): ?float
    {
        return $this->ratdiv;
    }

    public function setRatdiv(?float $ratdiv): self
    {
        $this->ratdiv = $ratdiv;

        return $this;
    }

    public function getDesvcr(): ?string
    {
        return $this->desvcr;
    }

    public function setDesvcr(?string $desvcr): self
    {
        $this->desvcr = $desvcr;

        return $this;
    }

    public function getRef(): ?string
    {
        return $this->ref;
    }

    public function setRef(?string $ref): self
    {
        $this->ref = $ref;

        return $this;
    }

    public function getBprvcr(): ?string
    {
        return $this->bprvcr;
    }

    public function setBprvcr(?string $bprvcr): self
    {
        $this->bprvcr = $bprvcr;

        return $this;
    }

    public function getRvs(): ?int
    {
        return $this->rvs;
    }

    public function setRvs(?int $rvs): self
    {
        $this->rvs = $rvs;

        return $this;
    }

    public function getRvsdat(): ?\DateTimeInterface
    {
        return $this->rvsdat;
    }

    public function setRvsdat(?\DateTimeInterface $rvsdat): self
    {
        $this->rvsdat = $rvsdat;

        return $this;
    }

    public function getRvsorinum(): ?string
    {
        return $this->rvsorinum;
    }

    public function setRvsorinum(?string $rvsorinum): self
    {
        $this->rvsorinum = $rvsorinum;

        return $this;
    }

    public function getXdossier(): ?string
    {
        return $this->xdossier;
    }

    public function setXdossier(?string $xdossier): self
    {
        $this->xdossier = $xdossier;

        return $this;
    }

    public function getXidfacini(): ?string
    {
        return $this->xidfacini;
    }

    public function setXidfacini(?string $xidfacini): self
    {
        $this->xidfacini = $xidfacini;

        return $this;
    }

    /**
     * @return Collection|EcritureDets[]
     */
    public function getEcritureDets(): Collection
    {
        return $this->ecritureDets;
    }

    public function addEcritureDet(Gaccentryd $ecritureDet1): self
    {
        if (!$this->ecritureDets->contains($ecritureDet1)) {
            $this->ecritureDets[] = $ecritureDet1;
            $ecritureDet1->setEcritureCab($this);
        }

        return $this;
    }

    public function removeEcritureDet(Gaccentryd $ecritureDet1): self
    {
        if ($this->ecritureDets->removeElement($ecritureDet1)) {
            // set the owning side to null (unless already changed)
            if ($ecritureDet1->getEcritureCab() === $this) {
                $ecritureDet1->setEcritureCab(null);
            }
        }

        return $this;
    }

    public function getFczIdLocal(): ?int
    {
        return $this->fczIdLocal;
    }

    public function setFczIdLocal(?int $fczIdLocal): self
    {
        $this->fczIdLocal = $fczIdLocal;

        return $this;
    }

    public function getFczIdSystemeCm(): ?string
    {
        return $this->fczIdSystemeCm;
    }

    public function setFczIdSystemeCm(?string $fczIdSystemeCm): self
    {
        $this->fczIdSystemeCm = $fczIdSystemeCm;

        return $this;
    }

    public function getFczIdCp(): ?string
    {
        return $this->fczIdCp;
    }

    public function setFczIdCp(?string $fczIdCp): self
    {
        $this->fczIdCp = $fczIdCp;

        return $this;
    }

    public function getFczDescriptionSysteme(): ?string
    {
        return $this->fczDescriptionSysteme;
    }

    public function setFczDescriptionSysteme(?string $fczDescriptionSysteme): self
    {
        $this->fczDescriptionSysteme = $fczDescriptionSysteme;

        return $this;
    }

    public function getFczIdSite(): ?int
    {
        return $this->fczIdSite;
    }

    public function setFczIdSite(?int $fczIdSite): self
    {
        $this->fczIdSite = $fczIdSite;

        return $this;
    }

    public function getFczDescriptionSite(): ?string
    {
        return $this->fczDescriptionSite;
    }

    public function setFczDescriptionSite(?string $fczDescriptionSite): self
    {
        $this->fczDescriptionSite = $fczDescriptionSite;

        return $this;
    }

    public function getFczDescriptionTierPiece(): ?string
    {
        return $this->fczDescriptionTierPiece;
    }

    public function setFczDescriptionTierPiece(?string $fczDescriptionTierPiece): self
    {
        $this->fczDescriptionTierPiece = $fczDescriptionTierPiece;

        return $this;
    }

    public function getFczIdDoc2Asso(): ?string
    {
        return $this->fczIdDoc2Asso;
    }

    public function setFczIdDoc2Asso(?string $fczIdDoc2Asso): self
    {
        $this->fczIdDoc2Asso = $fczIdDoc2Asso;

        return $this;
    }

    public function getFczIdDoc1Asso(): ?string
    {
        return $this->fczIdDoc1Asso;
    }

    public function setFczIdDoc1Asso(?string $fczIdDoc1Asso): self
    {
        $this->fczIdDoc1Asso = $fczIdDoc1Asso;

        return $this;
    }

    public function getFczEcRef(): ?string
    {
        return $this->fczEcRef;
    }

    public function setFczEcRef(?string $fczEcRef): self
    {
        $this->fczEcRef = $fczEcRef;

        return $this;
    }

    public function getFczFactureini(): ?int
    {
        return $this->fczFactureini;
    }

    public function setFczFactureini(?int $fczFactureini): self
    {
        $this->fczFactureini = $fczFactureini;

        return $this;
    }

    public function getFczMotifAnnul(): ?string
    {
        return $this->fczMotifAnnul;
    }

    public function setFczMotifAnnul(?string $fczMotifAnnul): self
    {
        $this->fczMotifAnnul = $fczMotifAnnul;

        return $this;
    }

    public function getFczAutreInformation(): ?string
    {
        return $this->fczAutreInformation;
    }

    public function setFczAutreInformation(?string $fczAutreInformation): self
    {
        $this->fczAutreInformation = $fczAutreInformation;

        return $this;
    }

    public function getFczTypePaiement(): ?string
    {
        return $this->fczTypePaiement;
    }

    public function setFczTypePaiement(?string $fczTypePaiement): self
    {
        $this->fczTypePaiement = $fczTypePaiement;

        return $this;
    }

    public function getFczTypeBanque(): ?string
    {
        return $this->fczTypeBanque;
    }

    public function setFczTypeBanque(?string $fczTypeBanque): self
    {
        $this->fczTypeBanque = $fczTypeBanque;

        return $this;
    }

    public function getFczCheqNum(): ?string
    {
        return $this->fczCheqNum;
    }

    public function setFczCheqNum(?string $fczCheqNum): self
    {
        $this->fczCheqNum = $fczCheqNum;

        return $this;
    }

    public function getFczCheqType(): ?string
    {
        return $this->fczCheqType;
    }

    public function setFczCheqType(?string $fczCheqType): self
    {
        $this->fczCheqType = $fczCheqType;

        return $this;
    }

    public function getFczCheqBnq(): ?string
    {
        return $this->fczCheqBnq;
    }

    public function setFczCheqBnq(?string $fczCheqBnq): self
    {
        $this->fczCheqBnq = $fczCheqBnq;

        return $this;
    }

    public function getFczMontantInitial(): ?float
    {
        return $this->fczMontantInitial;
    }

    public function setFczMontantInitial(?float $fczMontantInitial): self
    {
        $this->fczMontantInitial = $fczMontantInitial;

        return $this;
    }

    public function getFczMontantRemise(): ?float
    {
        return $this->fczMontantRemise;
    }

    public function setFczMontantRemise(?float $fczMontantRemise): self
    {
        $this->fczMontantRemise = $fczMontantRemise;

        return $this;
    }

    public function getFczMontantRetenu(): ?float
    {
        return $this->fczMontantRetenu;
    }

    public function setFczMontantRetenu(?float $fczMontantRetenu): self
    {
        $this->fczMontantRetenu = $fczMontantRetenu;

        return $this;
    }

    public function getFczMontantNet(): ?float
    {
        return $this->fczMontantNet;
    }

    public function setFczMontantNet(?float $fczMontantNet): self
    {
        $this->fczMontantNet = $fczMontantNet;

        return $this;
    }

    public function getFczMontantAutre1(): ?float
    {
        return $this->fczMontantAutre1;
    }

    public function setFczMontantAutre1(?float $fczMontantAutre1): self
    {
        $this->fczMontantAutre1 = $fczMontantAutre1;

        return $this;
    }

    public function getFczMontantAutre2(): ?float
    {
        return $this->fczMontantAutre2;
    }

    public function setFczMontantAutre2(?float $fczMontantAutre2): self
    {
        $this->fczMontantAutre2 = $fczMontantAutre2;

        return $this;
    }

    public function getFczCcMaxRef(): ?int
    {
        return $this->fczCcMaxRef;
    }

    public function setFczCcMaxRef(?int $fczCcMaxRef): self
    {
        $this->fczCcMaxRef = $fczCcMaxRef;

        return $this;
    }

    public function getFczCcMaxMt(): ?int
    {
        return $this->fczCcMaxMt;
    }

    public function setFczCcMaxMt(?int $fczCcMaxMt): self
    {
        $this->fczCcMaxMt = $fczCcMaxMt;

        return $this;
    }

    public function getFczFlag1(): ?int
    {
        return $this->fczFlag1;
    }

    public function setFczFlag1(int $fczFlag1): self
    {
        $this->fczFlag1 = $fczFlag1;

        return $this;
    }

    public function getFczFlag2(): ?int
    {
        return $this->fczFlag2;
    }

    public function setFczFlag2(?int $fczFlag2): self
    {
        $this->fczFlag2 = $fczFlag2;

        return $this;
    }

    public function getFczFlag3(): ?int
    {
        return $this->fczFlag3;
    }

    public function setFczFlag3(?int $fczFlag3): self
    {
        $this->fczFlag3 = $fczFlag3;

        return $this;
    }

    public function getFczFlag4(): ?int
    {
        return $this->fczFlag4;
    }

    public function setFczFlag4(?int $fczFlag4): self
    {
        $this->fczFlag4 = $fczFlag4;

        return $this;
    }

    public function getFczFlag5(): ?int
    {
        return $this->fczFlag5;
    }

    public function setFczFlag5(?int $fczFlag5): self
    {
        $this->fczFlag5 = $fczFlag5;

        return $this;
    }

    public function getFczDateInterfCm(): ?\DateTimeInterface
    {
        return $this->fczDateInterfCm;
    }

    public function setFczDateInterfCm(?\DateTimeInterface $fczDateInterfCm): self
    {
        $this->fczDateInterfCm = $fczDateInterfCm;

        return $this;
    }

    public function getFczUserNameCm(): ?string
    {
        return $this->fczUserNameCm;
    }

    public function setFczUserNameCm(?string $fczUserNameCm): self
    {
        $this->fczUserNameCm = $fczUserNameCm;

        return $this;
    }

    public function getFczDateInterfCp(): ?\DateTimeInterface
    {
        return $this->fczDateInterfCp;
    }

    public function setFczDateInterfCp(?\DateTimeInterface $fczDateInterfCp): self
    {
        $this->fczDateInterfCp = $fczDateInterfCp;

        return $this;
    }

    public function getFczUserNameCp(): ?string
    {
        return $this->fczUserNameCp;
    }

    public function setFczUserNameCp(?string $fczUserNameCp): self
    {
        $this->fczUserNameCp = $fczUserNameCp;

        return $this;
    }
    public function getFczIdTierPiece(): ?string
    {
        return $this->fczIdTierPiece;
    }

    public function setFczIdTierPiece(?string $fczIdTierPiece): self
    {
        $this->fczIdTierPiece = $fczIdTierPiece;

        return $this;
    }

    public function getFczIdAdPiece(): ?string
    {
        return $this->fczIdAdPiece;
    }

    public function setFczIdAdPiece(?string $fczIdAdPiece): self
    {
        $this->fczIdAdPiece = $fczIdAdPiece;

        return $this;
    }

    public function getTyp1(): ?string
    {
        return $this->typ1;
    }

    public function setTyp1(?string $typ1): self
    {
        $this->typ1 = $typ1;

        return $this;
    }

    public function getCpy1(): ?string
    {
        return $this->cpy1;
    }

    public function setCpy1(?string $cpy1): self
    {
        $this->cpy1 = $cpy1;

        return $this;
    }

    public function getFcy1(): ?string
    {
        return $this->fcy1;
    }

    public function setFcy1(?string $fcy1): self
    {
        $this->fcy1 = $fcy1;

        return $this;
    }

    public function getCce0(): ?string
    {
        return $this->cce0;
    }

    public function setCce0(?string $cce0): self
    {
        $this->cce0 = $cce0;

        return $this;
    }

    public function getNumx30(): ?string
    {
        return $this->numx30;
    }

    public function setNumx30(?string $numx30): self
    {
        $this->numx30 = $numx30;

        return $this;
    }

    public function getUpdtick0(): ?string
    {
        return $this->updtick0;
    }

    public function setUpdtick0(?string $updtick0): self
    {
        $this->updtick0 = $updtick0;

        return $this;
    }

    public function getBprdatvcr0(): ?\DateTimeInterface
    {
        return $this->bprdatvcr0;
    }

    public function setBprdatvcr0(?\DateTimeInterface $bprdatvcr0): self
    {
        $this->bprdatvcr0 = $bprdatvcr0;

        return $this;
    }

    public function getExpnum0(): ?string
    {
        return $this->expnum0;
    }

    public function setExpnum0(?string $expnum0): self
    {
        $this->expnum0 = $expnum0;

        return $this;
    }

    public function getCredat0(): ?\DateTimeInterface
    {
        return $this->credat0;
    }

    public function setCredat0(?\DateTimeInterface $credat0): self
    {
        $this->credat0 = $credat0;

        return $this;
    }

    public function getCreusr0(): ?string
    {
        return $this->creusr0;
    }

    public function setCreusr0(?string $creusr0): self
    {
        $this->creusr0 = $creusr0;

        return $this;
    }

    public function getUpddat0(): ?\DateTimeInterface
    {
        return $this->upddat0;
    }

    public function setUpddat0(?\DateTimeInterface $upddat0): self
    {
        $this->upddat0 = $upddat0;

        return $this;
    }

    public function getUpdusr0(): ?string
    {
        return $this->updusr0;
    }

    public function setUpdusr0(?string $updusr0): self
    {
        $this->updusr0 = $updusr0;

        return $this;
    }

    public function getCredattim0(): ?\DateTimeInterface
    {
        return $this->credattim0;
    }

    public function setCredattim0(?\DateTimeInterface $credattim0): self
    {
        $this->credattim0 = $credattim0;

        return $this;
    }

    public function getUpddattim0(): ?\DateTimeInterface
    {
        return $this->upddattim0;
    }

    public function setUpddattim0(\DateTimeInterface $upddattim0): self
    {
        $this->upddattim0 = $upddattim0;

        return $this;
    }

    public function getAuuid0(): ?string
    {
        return $this->auuid0;
    }

    public function setAuuid0(?string $auuid0): self
    {
        $this->auuid0 = $auuid0;

        return $this;
    }

    public function getFlagInerfacage(): ?string
    {
        return $this->flagInerfacage;
    }

    public function setFlagInerfacage(?string $flagInerfacage): self
    {
        $this->flagInerfacage = $flagInerfacage;

        return $this;
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
    
}
