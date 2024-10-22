<?php

namespace App\MemberUseCases;

use Domain\Member\Model\SeniorityLevel;

readonly class NewMemberDto
{
    public function __construct(
        public int $id,
        public string $email,
        public string $firstName,
        public string $lastName,
        public string $hiredAt)
    {
    }
}