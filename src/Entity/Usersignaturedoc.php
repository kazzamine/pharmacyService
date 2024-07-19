<?php

namespace App\Entity;

use App\Repository\UsersignaturedocRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UsersignaturedocRepository::class)]
class Usersignaturedoc
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $tableName;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $idDoc;

    #[ORM\JoinColumn(name: 'user_id', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \User::class)]
    private $user;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $postion;
   #[ORM\Column(name: 'datesigner', type: 'datetime', nullable: true)]
    private $dateSigner;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTableName(): ?int
    {
        return $this->tableName;
    }

    public function setTableName(?int $tableName): self
    {
        $this->tableName = $tableName;

        return $this;
    }

    public function getIdDoc(): ?int
    {
        return $this->idDoc;
    }

    public function setIdDoc(?int $idDoc): self
    {
        $this->idDoc = $idDoc;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getPostion(): ?int
    {
        return $this->postion;
    }

    public function setPostion(?int $postion): self
    {
        $this->postion = $postion;

        return $this;
    }
    public function getDateSigner(): ?\DateTimeInterface
    {
        return $this->dateSigner;
    }

    public function setDateSigner(?\DateTimeInterface $dateSigner): self
    {
        $this->dateSigner = $dateSigner;

        return $this;
    }

}
