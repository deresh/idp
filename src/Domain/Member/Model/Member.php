<?php

namespace Domain\Member\Model;

use Infrastructure\Doctrine\MemberEntity;

class Member
{

    public int $id;
    public string $email;
    public string $firstName;

    public string $lastName;

    public Seniority $seniority;

    /**
     * @var array|Role[]
     */
    public array $roles;

    public string $team;

    public function __construct(int $id, string $email, string $firstName, string $lastName, Seniority $seniority, Role $role, string $team)
    {
        $this->id = $id;
        $this->email = $email;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->seniority = $seniority;
        $this->team = $team;
        $this->roles = [$role];
    }

    public static function fromEntity(MemberEntity $entity): self
    {
        return new self($entity->getId(), $entity->getEmail(),$entity->getFirstName(), $entity->getLastName(), Seniority::Any, Role::Backend, '');
    }

    public function getRole(): Role
    {
        return current($this->roles);
    }

    public function setRole(Role $role): void
    {
        $this->roles[] = $role;
    }
}