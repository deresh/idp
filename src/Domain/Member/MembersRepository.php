<?php

namespace Domain\Member;

use RuntimeException;

class MembersRepository
{
    /**
     * @return array|Member[]
     */
    public function all(): array{

        return [
            new Member(
                id: 1,
                email: 'kreso.kunjas@mstart.hr',
                firstName: 'Krešo',
                lastName: "Kunjas",
                seniority: Seniority::Principal,
                role: Role::Director, team: "Team support"
            ),
            new Member(
                id: 2,
                email: 'marko.vusak@mstart.hr',
                firstName: 'Marko',
                lastName: "Vušak",
                seniority: Seniority::Senior,
                role: Role::Backend, team: "Team A"
            )
        ];
    }

    public function byId(int $memberId)
    {
        $all = $this->all();

        foreach ($all as $member) {
            if ($member->id === $memberId) {
                return $member;
            }
        }

        throw new RuntimeException('Member with id ' . $memberId . ' not found');
    }
}