<?php

namespace App\MemberUseCases;

use Domain\Member\Model\Member;
use Domain\Member\Model\MembersRepository;

class CreateMember
{
    public MembersRepository $membersRepository;

    /**
     * @param MembersRepository $membersRepository
     */
    public function __construct(MembersRepository $membersRepository)
    {
        $this->membersRepository = $membersRepository;
    }


    public function __invoke(NewMemberDto $newMember): void
    {

        $memberId = $this->membersRepository->nextId();
        $member = Member::fromNewMember($newMember, $memberId);

        $this->membersRepository->persist($member);

    }
}