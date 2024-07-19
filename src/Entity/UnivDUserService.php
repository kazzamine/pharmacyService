<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Table(name: 'univ_d_user_service')]
#[ORM\Entity(repositoryClass: \App\Repository\UnivDUserServiceRepository::class)]
class UnivDUserService
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: 'id', type: 'integer')]
    private $id;

    #[ORM\Column(name: 'code_service', type: 'string', length: 100)]
    private $codeService;

    #[ORM\Column(name: 'login_user', type: 'string', length: 150, nullable: true)]
    private $login_user;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCodeService(): ?string
    {
        return $this->codeService;
    }

    public function setCodeService(string $codeService): self
    {
        $this->codeService = $codeService;

        return $this;
    }

    public function getLoginUser(): ?string
    {
        return $this->login_user;
    }

    public function setLoginUser(?string $login_user): self
    {
        $this->login_user = $login_user;

        return $this;
    }
}
