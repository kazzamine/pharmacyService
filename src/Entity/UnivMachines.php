<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Table(name: 'univ_machines')]
#[ORM\Entity(repositoryClass: \App\Repository\UnivMachinesRepository::class)]
class UnivMachines
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(name: 'MachineAlias', type: 'string', length: 20, nullable: true)]
    private $machineAlias;

    #[ORM\Column(name: 'ConnectType', type: 'integer', nullable: true)]
    private $connectType;

    #[ORM\Column(type: 'string', length: 20, nullable: true)]
    private $ip;

    #[ORM\Column(name: 'SerialPort', type: 'integer', nullable: true)]
    private $serialPort;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $port;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $baudrate;

    #[ORM\Column(name: 'MachineNumber', type: 'integer', nullable: true)]
    private $machineNumber;

    #[ORM\Column(name: 'IsHost', type: 'boolean', nullable: true)]
    private $isHost;

    #[ORM\Column(type: 'boolean', nullable: true)]
    private $enabled;

    #[ORM\Column(name: 'CommPassword', type: 'string', length: 12, nullable: true)]
    private $commPassword;

    #[ORM\Column(name: 'UILanguage', type: 'smallint', nullable: true)]
    private $uILanguage;

    #[ORM\Column(name: 'DateFormat', type: 'smallint', nullable: true)]
    private $dateFormat;

    #[ORM\Column(name: 'InOutRecordWarn', type: 'smallint', nullable: true)]
    private $inOutRecordWarn;

    #[ORM\Column(type: 'smallint', nullable: true)]
    private $idle;

    #[ORM\Column(type: 'smallint', nullable: true)]
    private $voice;

    #[ORM\Column(type: 'smallint', nullable: true)]
    private $managercount;

    #[ORM\Column(type: 'smallint', nullable: true)]
    private $usercount;

    #[ORM\Column(type: 'smallint', nullable: true)]
    private $fingercount;

    #[ORM\Column(name: 'SecretCount', type: 'smallint', nullable: true)]
    private $secretCount;

    #[ORM\Column(name: 'FirmwareVersion', type: 'string', length: 20, nullable: true)]
    private $firmwareVersion;

    #[ORM\Column(name: 'ProductType', type: 'string', length: 20, nullable: true)]
    private $productType;

    #[ORM\Column(name: 'LockControl', type: 'smallint', nullable: true)]
    private $lockControl;

    #[ORM\Column(type: 'smallint', nullable: true)]
    private $purpose;

    #[ORM\Column(name: 'ProduceKind', type: 'integer', nullable: true)]
    private $produceKind;

    #[ORM\Column(type: 'string', length: 20, nullable: true)]
    private $sn;

    #[ORM\Column(name: 'PhotoStamp', type: 'string', length: 20, nullable: true)]
    private $photoStamp;

    #[ORM\Column(name: 'IsIfChangeConfigServer2', type: 'integer', nullable: true)]
    private $isifchangeconfigserver2;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $pushver;

    #[ORM\Column(name: 'IsAndroid', type: 'string', length: 1, nullable: true)]
    private $isandroid;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMachineAlias(): ?string
    {
        return $this->machineAlias;
    }

    public function setMachineAlias(?string $machineAlias): self
    {
        $this->machineAlias = $machineAlias;

        return $this;
    }

    public function getConnectType(): ?int
    {
        return $this->connectType;
    }

    public function setConnectType(?int $connectType): self
    {
        $this->connectType = $connectType;

        return $this;
    }

    public function getIp(): ?string
    {
        return $this->ip;
    }

    public function setIp(?string $ip): self
    {
        $this->ip = $ip;

        return $this;
    }

    public function getSerialPort(): ?int
    {
        return $this->serialPort;
    }

    public function setSerialPort(?int $serialPort): self
    {
        $this->serialPort = $serialPort;

        return $this;
    }

    public function getPort(): ?int
    {
        return $this->port;
    }

    public function setPort(?int $port): self
    {
        $this->port = $port;

        return $this;
    }

    public function getBaudrate(): ?int
    {
        return $this->baudrate;
    }

    public function setBaudrate(?int $baudrate): self
    {
        $this->baudrate = $baudrate;

        return $this;
    }

    public function getMachineNumber(): ?int
    {
        return $this->machineNumber;
    }

    public function setMachineNumber(?int $machineNumber): self
    {
        $this->machineNumber = $machineNumber;

        return $this;
    }

    public function getIsHost(): ?bool
    {
        return $this->isHost;
    }

    public function setIsHost(?bool $isHost): self
    {
        $this->isHost = $isHost;

        return $this;
    }

    public function getEnabled(): ?bool
    {
        return $this->enabled;
    }

    public function setEnabled(?bool $enabled): self
    {
        $this->enabled = $enabled;

        return $this;
    }

    public function getCommPassword(): ?string
    {
        return $this->commPassword;
    }

    public function setCommPassword(?string $commPassword): self
    {
        $this->commPassword = $commPassword;

        return $this;
    }

    public function getUILanguage(): ?int
    {
        return $this->uILanguage;
    }

    public function setUILanguage(?int $uILanguage): self
    {
        $this->uILanguage = $uILanguage;

        return $this;
    }

    public function getDateFormat(): ?int
    {
        return $this->dateFormat;
    }

    public function setDateFormat(?int $dateFormat): self
    {
        $this->dateFormat = $dateFormat;

        return $this;
    }

    public function getInOutRecordWarn(): ?int
    {
        return $this->inOutRecordWarn;
    }

    public function setInOutRecordWarn(?int $inOutRecordWarn): self
    {
        $this->inOutRecordWarn = $inOutRecordWarn;

        return $this;
    }

    public function getIdle(): ?int
    {
        return $this->idle;
    }

    public function setIdle(?int $idle): self
    {
        $this->idle = $idle;

        return $this;
    }

    public function getVoice(): ?int
    {
        return $this->voice;
    }

    public function setVoice(?int $voice): self
    {
        $this->voice = $voice;

        return $this;
    }

    public function getManagercount(): ?int
    {
        return $this->managercount;
    }

    public function setManagercount(?int $managercount): self
    {
        $this->managercount = $managercount;

        return $this;
    }

    public function getUsercount(): ?int
    {
        return $this->usercount;
    }

    public function setUsercount(?int $usercount): self
    {
        $this->usercount = $usercount;

        return $this;
    }

    public function getFingercount(): ?int
    {
        return $this->fingercount;
    }

    public function setFingercount(?int $fingercount): self
    {
        $this->fingercount = $fingercount;

        return $this;
    }

    public function getSecretCount(): ?int
    {
        return $this->secretCount;
    }

    public function setSecretCount(?int $secretCount): self
    {
        $this->secretCount = $secretCount;

        return $this;
    }

    public function getFirmwareVersion(): ?string
    {
        return $this->firmwareVersion;
    }

    public function setFirmwareVersion(?string $firmwareVersion): self
    {
        $this->firmwareVersion = $firmwareVersion;

        return $this;
    }

    public function getProductType(): ?string
    {
        return $this->productType;
    }

    public function setProductType(?string $productType): self
    {
        $this->productType = $productType;

        return $this;
    }

    public function getLockControl(): ?int
    {
        return $this->lockControl;
    }

    public function setLockControl(?int $lockControl): self
    {
        $this->lockControl = $lockControl;

        return $this;
    }

    public function getPurpose(): ?int
    {
        return $this->purpose;
    }

    public function setPurpose(?int $purpose): self
    {
        $this->purpose = $purpose;

        return $this;
    }

    public function getProduceKind(): ?int
    {
        return $this->produceKind;
    }

    public function setProduceKind(?int $produceKind): self
    {
        $this->produceKind = $produceKind;

        return $this;
    }

    public function getSn(): ?string
    {
        return $this->sn;
    }

    public function setSn(?string $sn): self
    {
        $this->sn = $sn;

        return $this;
    }

    public function getPhotoStamp(): ?string
    {
        return $this->photoStamp;
    }

    public function setPhotoStamp(?string $photoStamp): self
    {
        $this->photoStamp = $photoStamp;

        return $this;
    }

    public function getIsifchangeconfigserver2(): ?int
    {
        return $this->isifchangeconfigserver2;
    }

    public function setIsifchangeconfigserver2(?int $isifchangeconfigserver2): self
    {
        $this->isifchangeconfigserver2 = $isifchangeconfigserver2;

        return $this;
    }

    public function getPushver(): ?int
    {
        return $this->pushver;
    }

    public function setPushver(?int $pushver): self
    {
        $this->pushver = $pushver;

        return $this;
    }

    public function getIsandroid(): ?string
    {
        return $this->isandroid;
    }

    public function setIsandroid(?string $isandroid): self
    {
        $this->isandroid = $isandroid;

        return $this;
    }

  
}
