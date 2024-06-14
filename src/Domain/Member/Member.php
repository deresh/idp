<?php

namespace Domain\Member;

readonly class Member
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

}