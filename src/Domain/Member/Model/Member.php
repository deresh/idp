<?php

namespace Domain\Member\Model;

use Domain\Tools\MemberTool;
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

    public array $tools;

    public function __construct(int $id, string $email, string $firstName, string $lastName, SeniorityLevel $seniority, array $roles, string $team, string $imgUrl, \DateTime $hiredAt, array $tools)
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
        $this->tools = $tools;
    }

    public static function fromEntity(MemberEntity $entity): self
    {
        $roles = [];
        $tools = [];
        foreach ($entity->getRoles()->toArray() as $roleEntity) {
            $roles[] = $roleEntity->getRole();
        };

        foreach ($entity->getTools()->toArray() as $toolEntity) {
            $tools[] = MemberTool::fromEntity($toolEntity);
        }

        return new self($entity->getId(), $entity->getEmail(),$entity->getFirstName(), $entity->getLastName(), $entity->getSeniority(), $roles, $entity->getTeam()->getName(), (string) $entity->getImage(), $entity->getHireDate(), $tools);
    }
}