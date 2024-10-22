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
     * @Given user enters his email::arg1, first name :arg2, last name :arg3 and hiring date :arg4
     */
    public function userEntersHisEmailFirstNameLastNameAndHiringDate($arg1, $arg2, $arg3, $arg4)
    {
        $this->newMemberDto = new NewMemberDto($arg1, $arg2, $arg3, $arg4, $arg4);
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

    }

}
