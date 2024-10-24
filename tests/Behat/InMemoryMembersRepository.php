<?php

namespace Tests\Behat;

use Domain\Member\Model\Member;
use Domain\Member\Model\MembersRepository;
use Symfony\Component\Uid\Uuid;

class InMemoryMembersRepository implements MembersRepository
{

    private static $members = [];

    /**
     * @return array|Member[]
     */
    public function all(array $filters = []): array{

        return self::$members;
    }

    public function byId(int $memberId): ?Member
    {
        if(isset(self::$members[$memberId])){
            return self::$members[$memberId];
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
        self::$members[$member->id] = $member;
    }

    public function nextId(): string
    {
        return UUID::v4()->toString();
    }
}