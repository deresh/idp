<?php

namespace App\MemberUseCases;

use Domain\Member\Model\Member;
use Domain\Member\Model\MembersRepository;

class FetchMember
{
    public MembersRepository $membersRepository;

    /**
     * @param MembersRepository $membersRepository
     */
    public function __construct(MembersRepository $membersRepository)
    {
        $this->membersRepository = $membersRepository;
    }


    public function __invoke(string $email): ?Member
    {
        return $this->membersRepository->byEmail($email);
    }
}