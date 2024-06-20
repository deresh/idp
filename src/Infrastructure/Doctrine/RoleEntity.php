<?php

namespace Infrastructure\Doctrine;

use Doctrine\ORM\Mapping as ORM;
use Domain\Member\Model\Role;

#[ORM\Entity()]
class RoleEntity
{
    #[ORM\Id]
    #[ORM\Column]
    private Role $id;

    #[ORM\Column(type: 'string', length: 1500)]
    private ?string $description = null;

    public function getId(): Role
    {
        return $this->id;
    }

    public function setId(Role $id): void
    {
        $this->id = $id;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }
}
