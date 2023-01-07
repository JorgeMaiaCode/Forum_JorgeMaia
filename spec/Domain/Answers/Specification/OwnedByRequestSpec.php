<?php

namespace spec\App\Domain\Answers\Specification;

use App\Domain\Answers\Answer;
use App\Domain\Answers\AnswerSpecification;
use App\Domain\Answers\Specification\OwnedByRequest;
use App\Domain\UserManagement\User;
use App\Domain\UserManagement\UserIdentifier;
use PhpSpec\ObjectBehavior;

class OwnedByRequestSpec extends ObjectBehavior
{

    function let(
        UserIdentifier $identifier,
        User $loggedInUser
    ) {
        $loggedInUser->userId()->willReturn(new User\UserId());
        $identifier->currentUser()->willReturn($loggedInUser);

        $this->beConstructedWith($identifier);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(OwnedByRequest::class);
    }

    function its_a_answer_specification()
    {
        $this->shouldBeAnInstanceOf(AnswerSpecification::class);
    }

    function it_is_satisfied_by_an_answer_owned_by_the_logged_in_user(
        User $loggedInUser,
        Answer $answer
    ) {
        $answer->owner()->willReturn($loggedInUser);

        $this->isSatisfiedBy($answer)->shouldBe(true);
    }

    function it_fails_when_owner_is_not_the_logged_in_user(
        Answer $answer,
        User $owner
    ) {
        $answer->owner()->willReturn($owner);
        $owner->userId()->willReturn(new User\UserId());
        $this->isSatisfiedBy($answer)->shouldBe(false);
    }
}
