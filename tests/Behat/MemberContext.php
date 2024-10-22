<?php

namespace Tests\Behat;

use App\MemberUseCases\CreateMember;
use App\MemberUseCases\NewMemberDto;
use Behat\Behat\Context\Context;

/**
 * Defines application features from the specific context.
 */
class MemberContext implements Context
{

    private CreateMember $addMember;
    private NewMemberDto $newMemberDto;

    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct(CreateMember $addMember)
    {
        $this->addMember = $addMember;
    }
    /**
     * @Given user enters his data :arg1, :arg2, :arg3 and :arg4
     */
    public function userEntersHisDataAnd($arg1, $arg2, $arg3, $arg4)
    {
        $this->newMemberDto = new NewMemberDto($arg1, $arg2, $arg3, $arg4, 'junior');
    }

    /**
     * @Given chooses to become member
     */
    public function choosesToBecomeMember()
    {
        ($this->addMember)($this->newMemberDto);
    }

    /**
     * @Then member is created
     */
    public function memberIsCreated()
    {
        throw new PendingException();
    }

}
