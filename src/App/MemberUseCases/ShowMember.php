<?php

namespace App\MemberUseCases;

use Domain\Member\Model\Member;
use Domain\Member\Model\MembersRepository;

class ShowMember
{
    public MembersRepository $membersRepository;

    /**
     * @param MembersRepository $membersRepository
     */
    public function __construct(MembersRepository $membersRepository)
    {
        $this->membersRepository = $membersRepository;
    }


    public function __invoke(string $email): MemberDto
    {

        return $this->membersRepository->byEmail($email);
    }
}