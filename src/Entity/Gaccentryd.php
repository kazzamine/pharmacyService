<?php

namespace App\Entity;
use App\Entity\Gaccentry;
use Doctrine\ORM\Mapping as ORM;


#[ORM\Table(name: 'gaccentryd')]
#[ORM\Entity(repositoryClass: \App\Repository\GaccentrydRepository::class)]
class Gaccentryd
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\ManyToOne(targetEntity: Gaccentry::class, inversedBy: 'ecritureDets')]
    private $ecritureCab;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $typUg ;


    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $num ;


    #[ORM\Column(type: 'integer', nullable: true)]
    private $lin ;

     #[ORM\Column(type: 'integer', nullable: true)]
    private $ledtyp ;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $led ;


     #[ORM\Column(type: 'integer', nullable: true)]
    private $accnum ;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $cpy ;


    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $fcylin ;


    #[ORM\Column(type: 'datetime', nullable: true)]
    private $accdat ;

     #[ORM\Column(type: 'integer', nullable: true)]
    private $fiy ;

     #[ORM\Column(type: 'integer', nullable: true)]
    private $per ;

    

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $sac ;


    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $acc ;


    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $bpr ;


     #[ORM\Column(type: 'integer', nullable: true)]
    private $sns ;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $cur ;


    #[ORM\Column(type: 'float', nullable: true)]
    private $amtcur ;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $curled ;


    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $des ;


    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $mtc ;


    #[ORM\Column(type: 'datetime', nullable: true)]
    private $mtcdat ;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $freref ;


    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $chk ;


    #[ORM\Column(type: 'datetime', nullable: true)]
    private $chkdat ;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $fczIdSystemeCom ;


    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $fczIdComptable ;


    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $fczAccLibelle ;


    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $cce0 ;


    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $fcy0 ;


    

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $typ0 ;


    #[ORM\Column(type: 'datetime', nullable: true)]
    private $credattim0 ;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private $upddattim0 ;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $auuid0 ;


    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $creusr0 ;


    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $updusr0 ;


    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $updtick0 ;


    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $freref0 ;





    public function __construct()
    {
        $this->accdat = new \DateTime();
        $this->mtcdat = new \DateTime();
        $this->chkdat = new \DateTime();
        $this->credattim0 = new \DateTime();
        $this->upddattim0 = new \DateTime();
    }
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEcritureCab(): ?Gaccentry
    {
        return $this->ecritureCab;
    }

    public function setEcritureCab(?Gaccentry $ecritureCab): self
    {
        $this->ecritureCab = $ecritureCab;

        return $this;
    }

    public function getTyp(): ?string
    {
        return $this->typUg;
    }

    public function setTyp(?string $typ): self
    {
        $this->typUg = $typ;

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

    public function getLin(): ?int
    {
        return $this->lin;
    }

    public function setLin(?int $lin): self
    {
        $this->lin = $lin;

        return $this;
    }

    public function getLedtyp(): ?int
    {
        return $this->ledtyp;
    }

    public function setLedtyp(?int $ledtyp): self
    {
        $this->ledtyp = $ledtyp;

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

    public function getAccnum(): ?int
    {
        return $this->accnum;
    }

    public function setAccnum(?int $accnum): self
    {
        $this->accnum = $accnum;

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

    public function getFcylin(): ?string
    {
        return $this->fcylin;
    }

    public function setFcylin(?string $fcylin): self
    {
        $this->fcylin = $fcylin;

        return $this;
    }

    public function getAccdat(): ?\DateTimeInterface
    {
        return $this->accdat;
    }

    public function setAccdat(\DateTimeInterface $accdat): self
    {
        $this->accdat = $accdat;

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

    

    public function getSac(): ?string
    {
        return $this->sac;
    }

    public function setSac(?string $sac): self
    {
        $this->sac = $sac;

        return $this;
    }

    public function getAcc(): ?string
    {
        return $this->acc;
    }

    public function setAcc(?string $acc): self
    {
        $this->acc = $acc;

        return $this;
    }

    public function getBpr(): ?string
    {
        return $this->bpr;
    }

    public function setBpr(?string $bpr): self
    {
        $this->bpr = $bpr;

        return $this;
    }

    public function getSns(): ?int
    {
        return $this->sns;
    }

    public function setSns(?int $sns): self
    {
        $this->sns = $sns;

        return $this;
    }

    public function getCur(): ?string
    {
        return $this->cur;
    }

    public function setCur(?string $cur): self
    {
        $this->cur = $cur;

        return $this;
    }

    public function getAmtcur(): ?float
    {
        return $this->amtcur;
    }

    public function setAmtcur(?float $amtcur): self
    {
        $this->amtcur = $amtcur;

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

    public function getDes(): ?string
    {
        return $this->des;
    }

    public function setDes(?string $des): self
    {
        $this->des = $des;

        return $this;
    }

    public function getMtc(): ?string
    {
        return $this->mtc;
    }

    public function setMtc(?string $mtc): self
    {
        $this->mtc = $mtc;

        return $this;
    }

    public function getMtcdat(): ?\DateTimeInterface
    {
        return $this->mtcdat;
    }

    public function setMtcdat(?\DateTimeInterface $mtcdat): self
    {
        $this->mtcdat = $mtcdat;

        return $this;
    }

    public function getFreref(): ?string
    {
        return $this->freref;
    }

    public function setFreref(?string $freref): self
    {
        $this->freref = $freref;

        return $this;
    }

    public function getChk(): ?string
    {
        return $this->chk;
    }

    public function setChk(?string $chk): self
    {
        $this->chk = $chk;

        return $this;
    }

    public function getChkdat(): ?\DateTimeInterface
    {
        return $this->chkdat;
    }

    public function setChkdat(?\DateTimeInterface $chkdat): self
    {
        $this->chkdat = $chkdat;

        return $this;
    }

    public function getFczIdSystemeCom(): ?string
    {
        return $this->fczIdSystemeCom;
    }

    public function setFczIdSystemeCom(?string $fczIdSystemeCom): self
    {
        $this->fczIdSystemeCom = $fczIdSystemeCom;

        return $this;
    }

    public function getFczIdComptable(): ?string
    {
        return $this->fczIdComptable;
    }

    public function setFczIdComptable(?string $fczIdComptable): self
    {
        $this->fczIdComptable = $fczIdComptable;

        return $this;
    }

    public function getFczAccLibelle(): ?string
    {
        return $this->fczAccLibelle;
    }

    public function setFczAccLibelle(?string $fczAccLibelle): self
    {
        $this->fczAccLibelle = $fczAccLibelle;

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

    public function getFcy0(): ?string
    {
        return $this->fcy0;
    }

    public function setFcy0(?string $fcy0): self
    {
        $this->fcy0 = $fcy0;

        return $this;
    }

    

    public function getTyp0(): ?string
    {
        return $this->typ0;
    }

    public function setTyp0(?string $typ0): self
    {
        $this->typ0 = $typ0;

        return $this;
    }

    public function getTypUg(): ?string
    {
        return $this->typUg;
    }

    public function setTypUg(?string $typUg): self
    {
        $this->typUg = $typUg;

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

    public function setUpddattim0(?\DateTimeInterface $upddattim0): self
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

    public function getCreusr0(): ?string
    {
        return $this->creusr0;
    }

    public function setCreusr0(?string $creusr0): self
    {
        $this->creusr0 = $creusr0;

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

    public function getUpdtick0(): ?string
    {
        return $this->updtick0;
    }

    public function setUpdtick0(?string $updtick0): self
    {
        $this->updtick0 = $updtick0;

        return $this;
    }

    public function getFreref0(): ?string
    {
        return $this->freref0;
    }

    public function setFreref0(?string $freref0): self
    {
        $this->freref0 = $freref0;

        return $this;
    }

   

}
