<?php

namespace Domain\Member\Model;

interface MembersRepository
{
    /**
     * @return array|Member[]
     */
    public function all(array $filters = []): array;

    public function byId(int $memberId): ?Member;

    public function persist(Member $member): void;

    public function nextId();

    public function byEmail(string $email);
}