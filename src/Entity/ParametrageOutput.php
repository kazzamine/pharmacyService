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
#[ORM\Table(name: 'parametrage_output')]
#[ORM\Entity(repositoryClass: ParametrageOutputRepository::class)]
class ParametrageOutput {

    /**
     * @var int
     */
    #[ORM\Column(name: 'id', type: 'integer')]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    private $id;

    /**
     * @var string
     *
     *
     */
    #[ORM\Column(name: 'piece', type: 'string', length: 255)]
    private $piece;
    
    /**
     * @var string
     *
     *
     */
    #[ORM\Column(name: 'condition_ec', type: 'string', length: 255)]
    private $conditionEc;
    
   
    /**
     * @var string
     *
     *
     */
    #[ORM\Column(name: 'resultat_ec', type: 'string', length: 255)]
    private $resultatEc;
   


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPiece(): ?string
    {
        return $this->piece;
    }
   
    public function getConditionEc(): ?string
    {
        return $this->conditionEc;
    }
    public function setConditionEc(?string $conditionEc)
    {
        $this->conditionEc = $conditionEc;
        return $this;
    }
   
    public function getResultatEc(): ?string
    {
        return $this->resultatEc;
    }
    public function setResultatEc(?string $resultatEc)
    {
        $this->resultatEc = $resultatEc;
        return $this;
    }

    
    
}
