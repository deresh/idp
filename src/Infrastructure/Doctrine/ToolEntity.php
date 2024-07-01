<?php

namespace Infrastructure\Doctrine;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\Embedded;
use Domain\Member\Model\Role;
use Domain\Member\Model\SeniorityLevel;
use Domain\Tools\Priority;

#[ORM\Entity()]
class ToolEntity
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: 'integer', enumType: Priority::class)]
    private Priority $priority = Priority::Low;

    #[ORM\Column(length: 50)]
    private ?string $name = null;

    #[ORM\Column(type: 'string', length: 500)]
    private ?string $description = null;

    #[ORM\Column(type: 'string', enumType: Role::class)]
    private Role $role;
    #[ORM\Column(type: 'string', enumType: SeniorityLevel::class)]
    private SeniorityLevel $seniority;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }

    public function getSeniority(): SeniorityLevel
    {
        return $this->seniority;
    }

    public function setSeniority(SeniorityLevel $seniority): void
    {
        $this->seniority = $seniority;
    }

    public function getRole(): Role
    {
        return $this->role;
    }

    public function setRole(Role $role): void
    {
        $this->role = $role;
    }

    public function getPriority(): Priority
    {
        return $this->priority;
    }

    public function setPriority(Priority $priority): void
    {
        $this->priority = $priority;
    }

    public function __toString(): string
    {
        return $this->getSeniority()->name. ' '. $this->name  ?? '';
    }


}
