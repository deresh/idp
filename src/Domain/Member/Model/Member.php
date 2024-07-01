<?php

namespace Domain\Member\Model;

use Infrastructure\Doctrine\MemberEntity;

class Member
{

    public int $id;
    public string $email;
    public string $firstName;

    public string $lastName;

    public SeniorityLevel $seniority;

    /**
     * @var array|Role[]
     */
    public array $roles;

    public string $team;

    public \DateTime $hiredAt;

    public string $imgUrl;

    public function __construct(int $id, string $email, string $firstName, string $lastName, SeniorityLevel $seniority, array $roles, string $team, string $imgUrl, \DateTime $hiredAt)
    {
        $this->id = $id;
        $this->email = $email;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->seniority = $seniority;
        $this->team = $team;
        $this->roles = $roles;
        $this->imgUrl = $imgUrl;
        $this->hiredAt = $hiredAt;
    }

    public static function fromEntity(MemberEntity $entity): self
    {
        $roles = [];
        foreach ($entity->getRoles()->toArray() as $roleEntity) {
            $roles[] = $roleEntity->getRole();
        };
        return new self($entity->getId(), $entity->getEmail(),$entity->getFirstName(), $entity->getLastName(), $entity->getSeniority(), $roles, $entity->getTeam()->getName(), (string) $entity->getImage(), $entity->getHireDate());
    }
}