<?php

namespace Infrastructure\Doctrine;

use Doctrine\ORM\Mapping as ORM;
use Domain\Member\Model\Role;

#[ORM\Entity()]
class RoleEntity
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?Role $role;



    #[ORM\Column(type: 'string', length: 5000)]
    private ?string $description = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    public function getRole(): Role
    {
        return $this->role;
    }

    public function setRole(Role $role): void
    {
        $this->role = $role;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }

    public function __toString(): string
    {
        return (string) $this->role->name;
    }


}
