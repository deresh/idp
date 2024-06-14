<?php

namespace Member;

readonly class Member
{
    public int $id;
    public string $name;
    public string $email;
    public string $firstName;

    public string $lastName;

    public Seniority $seniority;

    public string $team;

    public function __construct(int $id, string $name, string $email, string $firstName, string $lastName, Seniority $seniority, string $team)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->seniority = $seniority;
        $this->team = $team;
    }
}