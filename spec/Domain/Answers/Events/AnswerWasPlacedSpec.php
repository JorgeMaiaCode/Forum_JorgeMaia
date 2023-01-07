<?php

namespace spec\App\Domain\Answers\Events;

use App\Domain\AbstractEvent;
use App\Domain\Answers\Answer\AnswerId;
use App\Domain\Answers\Events\AnswerWasPlaced;
use PhpSpec\ObjectBehavior;
use Symfony\Contracts\EventDispatcher\Event;

class AnswerWasPlacedSpec extends ObjectBehavior
{

    private $answerId;
    private $body;

    function let()
    {
        $this->answerId = new AnswerId();
        $this->body = 'Some body';
        $this->beConstructedWith(
            $this->answerId,
            $this->body
        );
    }
    function it_is_initializable()
    {
        $this->shouldHaveType(AnswerWasPlaced::class);
    }

    function its_an_event()
    {
        $this->shouldBeAnInstanceOf(Event::class);
        $this->shouldHaveType(AbstractEvent::class);
        $this->occurredOn()->shouldBeAnInstanceOf(\DateTimeImmutable::class);
    }

    function it_has_an_answerId()
    {
        $this->answerId()->shouldBe($this->answerId);
    }

    function it_has_a_body()
    {
        $this->body()->shouldBe($this->body);
    }

    function it_can_be_converted_to_json()
    {
        $this->shouldBeAnInstanceOf(\JsonSerializable::class);
        $this->jsonSerialize()->shouldBe([
            'answerId' => $this->answerId,
            'body' => $this->body
        ]);
    }
}