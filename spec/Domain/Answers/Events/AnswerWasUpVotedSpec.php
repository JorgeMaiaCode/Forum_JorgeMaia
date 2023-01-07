<?php

namespace spec\App\Domain\Answers\Events;

use App\Domain\AbstractEvent;
use App\Domain\Answers\Answer\AnswerId;
use App\Domain\Answers\Events\AnswerWasUpVoted;
use App\Domain\DomainEvent;
use App\Domain\UserManagement\User;
use PhpSpec\ObjectBehavior;

class AnswerWasUpVotedSpec extends ObjectBehavior
{

    private $answerId;

    function let(User $owner)
    {
        $this->answerId = new AnswerId();
        $this->beConstructedWith($this->answerId, $owner);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(AnswerWasUpVoted::class);
    }


    function its_an_event()
    {
        $this->shouldBeAnInstanceOf(DomainEvent::class);
        $this->shouldHaveType(AbstractEvent::class);
        $this->occurredOn()->shouldBeAnInstanceOf(\DateTimeImmutable::class);
    }

    function it_has_an_answer_id()
    {
        $this->answerId()->shouldBe($this->answerId);
    }

    function it_has_an_owner(User $owner)
    {
        $this->owner()->shouldBe($owner);
    }

}
