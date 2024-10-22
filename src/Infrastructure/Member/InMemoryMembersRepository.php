<?php

namespace Infrastructure\Member;

use Domain\Member\Model\Member;
use Domain\Member\Model\MembersRepository;
use Domain\Member\Model\Role;
use Domain\Member\Model\SeniorityLevel;
use RuntimeException;
use Symfony\Component\Uid\Uuid;

class InMemoryMembersRepository  implements MembersRepository
{
    /**
     * @return array|Member[]
     */
    public function all(array $filters = []): array{

        return [
            new Member(
                id: 1,
                email: 'kreso.kunjas@mstart.hr',
                firstName: 'Krešo',
                lastName: "Kunjas",
                seniority: SeniorityLevel::Principal,
                role: Role::Director, team: "Team support"
            ),
            new Member(
                id: 2,
                email: 'marko.vusak@mstart.hr',
                firstName: 'Marko',
                lastName: "Vušak",
                seniority: SeniorityLevel::Senior,
                role: Role::Backend, team: "Team A"
            )
        ];
    }

    public function byId(int $memberId): ?Member
    {
        $all = $this->all();

        foreach ($all as $member) {
            if ($member->id === $memberId) {
                return $member;
            }
        }

        return null;
    }

    public function byEmail(string $email): ?Member
    {
        $all = $this->all();

        foreach ($all as $member) {
            if ($member->email === $email) {
                return $member;
            }
        }

        return null;
    }

    public function persist(Member $member): void
    {

    }

    public function nextId(): string
    {
        return UUID::v4()->toString();
    }
}