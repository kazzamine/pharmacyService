<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * XLangues
 */
#[ORM\Table(name: 'univ_p_type_element')]
#[ORM\Entity]
class UnivPTypeElement {

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    /**
     * @var string
     */
    #[ORM\Column(type: 'string', length: 100, nullable: true)]
    private $code;

    /**
     * @var string
     *
     */
    #[Assert\NotBlank]
    #[ORM\Column(type: 'string', length: 100, nullable: true)]
    private $designation;

    /**
     * @var string
     *
     */
    #[Assert\NotBlank]
    #[ORM\Column(type: 'string', length: 200, nullable: true)]
    private $abreviation;
    
     
     /**
     * @var integer
     */
    #[ORM\Column(type: 'boolean', nullable: true)]
    private $active;

    #[ORM\OneToMany(targetEntity: \App\Entity\UnivAcElement::class, mappedBy: 'nature')]
    private $univAcElements;


    #[ORM\OneToMany(targetEntity: \App\Entity\UnivExControleElement::class, mappedBy: 'typeElement')]
    private $controleElements;

    public function __construct()
    {
        $this->univAcElements = new ArrayCollection();
        $this->controleElements = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getActive(): ?bool
    {
        return $this->active;
    }

    public function setActive(?bool $active): self
    {
        $this->active = $active;

        return $this;
    }

    /**
     * @return Collection|UnivAcElement[]
     */
    public function getUnivAcElements(): Collection
    {
        return $this->univAcElements;
    }

    public function addUnivAcElement(UnivAcElement $univAcElement): self
    {
        if (!$this->univAcElements->contains($univAcElement)) {
            $this->univAcElements[] = $univAcElement;
            $univAcElement->setNature($this);
        }

        return $this;
    }

    public function removeUnivAcElement(UnivAcElement $univAcElement): self
    {
        if ($this->univAcElements->contains($univAcElement)) {
            $this->univAcElements->removeElement($univAcElement);
            // set the owning side to null (unless already changed)
            if ($univAcElement->getNature() === $this) {
                $univAcElement->setNature(null);
            }
        }

        return $this;
    }









    /**
     * @return Collection|UnivAcElement[]
     */
    public function getControleElements(): Collection
    {
        return $this->controleElements;
    }

    public function addControleElements(UnivExControleElement $controleElement): self
    {
        if (!$this->controleElements->contains($controleElement)) {
            $this->controleElements[] = $controleElement;
            $controleElement->setTypeElement($this);
        }

        return $this;
    }

    public function removeControleElements(UnivExControleElement $controleElement): self
    {
        if ($this->controleElements->contains($controleElement)) {
            $this->controleElements->removeElement($controleElement);
            // set the owning side to null (unless already changed)
            if ($controleElement->getTypeElement() === $this) {
                $controleElement->setTypeElement(null);
            }
        }

        return $this;
    }

    public function addControleElement(UnivExControleElement $controleElement): self
    {
        if (!$this->controleElements->contains($controleElement)) {
            $this->controleElements[] = $controleElement;
            $controleElement->setTypeElement($this);
        }

        return $this;
    }

    public function removeControleElement(UnivExControleElement $controleElement): self
    {
        if ($this->controleElements->contains($controleElement)) {
            $this->controleElements->removeElement($controleElement);
            // set the owning side to null (unless already changed)
            if ($controleElement->getTypeElement() === $this) {
                $controleElement->setTypeElement(null);
            }
        }

        return $this;
    }
}
