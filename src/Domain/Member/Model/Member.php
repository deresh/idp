<?php

namespace Domain\Member\Model;

use App\MemberUseCases\NewMemberDto;
use Domain\Tools\MemberTool;
use Infrastructure\Doctrine\MemberEntity;

class Member
{
    public function __construct(
        public string $id,
        public string $email,
        public string $firstName,
        public string $lastName,
        public SeniorityLevel $seniority,
        public array $roles,
        public string $imgUrl,
        public \DateTime $hiredAt,
        public array $tools,
        public ?string $team = null,
    ) {

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

        return new self(
            id: $entity->getId(),
            email: $entity->getEmail(),
            firstName: $entity->getFirstName(),
            lastName: $entity->getLastName(),
            seniority: $entity->getSeniority(),
            roles: $roles,
            team: $entity->getTeam()->getName(),
            imgUrl: (string) $entity->getImage(),
            hiredAt: $entity->getHireDate(),
            tools: $tools);
    }

    public static function fromNewMember(NewMemberDto $newMember, string $id): self
    {
        return new self(
            id: $id,
            email: $newMember->email,
            firstName: $newMember->firstName,
            lastName: $newMember->lastName,
            seniority: SeniorityLevel::Any,
            roles: [Role::Any],
            team: null,
            imgUrl: '',
            hiredAt: new \DateTime($newMember->hiredAt),
            tools: []
        );
    }
}