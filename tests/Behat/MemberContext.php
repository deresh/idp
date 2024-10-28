<?php

namespace Tests\Behat;

use App\MemberUseCases\CreateMember;
use App\MemberUseCases\DuplicateEmailException;
use App\MemberUseCases\NewMemberDto;
use App\MemberUseCases\FetchMember;
use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\TableNode;
use BehatExpectException\ExpectException;
use Behat\Behat\Hook\Scope\BeforeFeatureScope;
/**
 * Defines application features from the specific context.
 */
class MemberContext implements Context
{

    use ExpectException;

    private CreateMember $addMember;

    private FetchMember $showMember;
    private NewMemberDto $newMemberDto;

    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct(CreateMember $addMember, FetchMember $showMember)
    {
        $this->addMember = $addMember;
        $this->showMember = $showMember;
    }

    #[BeforeFeatureScope(, 'member')]
    public function cleanData(): void
    {

    }


    /**
     * @Given user enters his email::arg1, first name :arg2, last name :arg3 and hiring date :arg4
     */
    public function userEntersHisEmailFirstNameLastNameAndHiringDate($arg1, $arg2, $arg3, $arg4)
    {
        $this->newMemberDto = new NewMemberDto(
            email: $arg1,
            firstName: $arg2,
            lastName: $arg3,
            hiredAt: $arg4
        );
    }

    /**
     * @Given chooses to become member
     */
    public function choosesToBecomeMember()
    {
        $this->mayFail(
            fn() => ($this->addMember)($this->newMemberDto)
        );
    }

    /**
     * @Then member is created
     */
    public function memberIsCreated()
    {
        $member = ($this->showMember)($this->newMemberDto->email);
    }

    /**
     * @Then error is displayed
     */
    public function errorIsDisplayed()
    {
        $this->assertCaughtExceptionMatches(DuplicateEmailException::class);
    }

    /**
     * @Then user is not created
     */
    public function userIsNotCreated()
    {
        $this->assertCaughtExceptionMatches(DuplicateEmailException::class);
    }

    /**
     * @Given /^user with email "([^"]*)", first name "([^"]*)", last name "([^"]*)" and hiring date "([^"]*)" exists$/
     */
    public function userWithEmailFirstNameLastNameAndHiringDateExists($arg1, $arg2, $arg3, $arg4)
    {
        $member = new NewMemberDto($arg1, $arg2, $arg3, $arg4, $arg4);
        ($this->addMember)($member);
    }

    /**
     * @Given there are users:
     */
    public function thereAreUsers(TableNode $table)
    {
        foreach ($table as $item) {
            ($this->addMember)(new NewMemberDto(
                email: $item['email'],
                firstName: $item['firstName'],
                lastName: $item['lastName'],
                hiredAt: $item['hiringDate'],
            ));
        }
    }
}
