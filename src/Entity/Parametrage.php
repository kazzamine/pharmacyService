<?php

namespace App\Entity;

use App\Entity\Uarticle;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use App\Repository\ArticlePlanComptableRepository;

/**
 * SaveTree
 */
#[ORM\Table(name: 'parametrage')]
#[ORM\Entity(repositoryClass: ParametrageRepository::class)]
class Parametrage {

    /**
     * @var int
     */
    #[ORM\Column(name: 'id', type: 'integer')]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    private $id;

    /**
     * @var int
     *
     *
     */
    #[ORM\Column(name: 'piece_id', type: 'integer')]
    private $piece;
    /**
     * @var string
     *
     *
     */
    #[ORM\Column(name: 'doc_type', type: 'string', length: 255)]
    private $docType;
    /**
     * @var string
     *
     *
     */
    #[ORM\Column(name: 'condition_1', type: 'string', length: 255)]
    private $condition1;
    /**
     * @var string
     *
     *
     */
    #[ORM\Column(name: 'condition_2', type: 'string', length: 255)]
    private $condition2;
    /**
     * @var string
     *
     *
     */
    #[ORM\Column(name: 'condition_3', type: 'string', length: 255)]
    private $condition3;
    /**
     * @var string
     *
     *
     */
    #[ORM\Column(name: 'condition_4', type: 'string', length: 255)]
    private $condition4;
    /**
     * @var string
     *
     *
     */
    #[ORM\Column(name: 'ec1_associee', type: 'string', length: 255)]
    private $ec1Associee;
    /**
     * @var string
     *
     *
     */
    #[ORM\Column(name: 'ec2_associee', type: 'string', length: 255)]
    private $ec2Associee;
    /**
     * @var string
     *
     *
     */
    #[ORM\Column(name: 'ec3_associee', type: 'string', length: 255)]
    private $ec3Associee;
    /**
     * @var string
     *
     *
     */
    #[ORM\Column(name: 'ec4_associee', type: 'string', length: 255)]
    private $ec4Associee;
    



     


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPiece(): ?int
    {
        return $this->piece;
    }
    public function setPiece(?int $piece)
    {
        $this->piece = $piece;
        return $this;
    }
    public function getDocType(): ?string
    {
        return $this->docType;
    }
    public function setDocType(?string $docType)
    {
        $this->docType = $docType;
        return $this;
    }
    public function getCondition1(): ?string
    {
        return $this->condition1;
    }
    public function setCondition1(?string $condition1)
    {
        $this->condition1 = $condition1;
        return $this;
    }
    public function getCondition2(): ?string
    {
        return $this->condition2;
    }
    public function setCondition2(?string $condition2)
    {
        $this->condition2 == $condition2;
        return $this;
    }
    public function getCondition3(): ?string
    {
        return $this->condition3;
    }
    public function setCondition3(?string $condition3)
    {
        $this->condition3 = $condition3;
        return $this;
    }
    public function getCondition4(): ?string
    {
        return $this->condition4;
    }
    public function setCondition4(?string $condition4)
    {
        $this->condition4 = $condition4;
        return $this;
    }
    public function getEc1Associee(): ?string
    {
        return $this->ec1Associee;
    }
    public function setEc1Associee(?string $ec1Associee)
    {
        $this->ec1Associee = $ec1Associee;
        return $this;
    }
    public function getEc2Associee(): ?string
    {
        return $this->ec2Associee;
    }
    public function setEc2Associee(?string $ec2Associee)
    {
        $this->ec2Associee = $ec2Associee;
        return $this;
    }
    public function getEc3Associee(): ?string
    {
        return $this->ec3Associee;
    }
    public function setEc3Associee(?string $ec3Associee)
    {
        $this->ec3Associee = $ec3Associee;
        return $this;
    }
    public function getEc4Associee(): ?string
    {
        return $this->ec1Associee;
    }
    public function setEc4Associee(?string $ec4Associee)
    {
        $this->ec4Associee = $ec4Associee;
        return $this;
    }

    
    
}
