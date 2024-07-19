<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Notification
 */
#[ORM\Table(name: 'arc_notification')]
#[ORM\Entity(repositoryClass: \App\Repository\NotificationRepository::class)]
class ArcNotification
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
    #[ORM\Column(name: 'text', type: 'text', nullable: true)]
    private $text;
    
    
    
      #[ORM\JoinColumn(name: 'save_tree_id', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: \ArcTree::class, inversedBy: 'notifications')]
    private $saveTree;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(?string $text): self
    {
        $this->text = $text;

        return $this;
    }

    public function getSaveTree(): ?ArcTree
    {
        return $this->saveTree;
    }

    public function setSaveTree(?ArcTree $saveTree): self
    {
        $this->saveTree = $saveTree;

        return $this;
    }


   
}
