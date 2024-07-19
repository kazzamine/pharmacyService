<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UserAction
 */
#[ORM\Table(name: 'user_action')]
#[ORM\Index(name: 'login', columns: ['login'])]
#[ORM\Index(name: 'code_action', columns: ['code_action'])]
#[ORM\Entity]
class UserAction
{
    
       #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'code_action', type: 'string', length: 100, nullable: true)]
    private $codeAction;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'login', type: 'string', length: 150, nullable: true)]
    private $login;

    /**
     * @var int|null
     */
    #[ORM\Column(name: 'code_dossier', type: 'integer', nullable: true)]
    private $codeDossier;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCodeAction(): ?string
    {
        return $this->codeAction;
    }

    public function setCodeAction(?string $codeAction): self
    {
        $this->codeAction = $codeAction;

        return $this;
    }

    public function getLogin(): ?string
    {
        return $this->login;
    }

    public function setLogin(?string $login): self
    {
        $this->login = $login;

        return $this;
    }

    public function getCodeDossier(): ?int
    {
        return $this->codeDossier;
    }

    public function setCodeDossier(?int $codeDossier): self
    {
        $this->codeDossier = $codeDossier;

        return $this;
    }


}
