<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;


#[ORM\Table(name: 'notification')]
#[ORM\UniqueConstraint(name: '_idx', columns: ['user_id', 'tache_id'])]
#[ORM\Entity(repositoryClass: \App\Repository\TaNotificationRepository::class)]
#[UniqueEntity(fields: ['user', 'tache'], errorPath: 'port', message: 'This port is already in use on that host.')]
class TaNotification
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;
    
     /**
     * @var int
     */
    #[ORM\Column(name: 'notification', type: 'integer', nullable: true)]
    private $notification;
    
    
    
     #[ORM\JoinColumn(name: 'user_id', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \User::class)]
    private $user;
    
    
    #[ORM\JoinColumn(name: 'tache_id', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \TaTache::class, inversedBy: 'notifications')]
    private $tache;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNotification(): ?int
    {
        return $this->notification;
    }

    public function setNotification(?int $notification): self
    {
        $this->notification = $notification;

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

    public function getTache(): ?TaTache
    {
        return $this->tache;
    }

    public function setTache(?TaTache $tache): self
    {
        $this->tache = $tache;

        return $this;
    }
}
