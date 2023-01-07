<?php

namespace App\Domain\Answers\Events;

use App\Domain\AbstractEvent;
use App\Domain\Answers\Answer\AnswerId;
use App\Domain\DomainEvent;
use App\Domain\UserManagement\User;

class AnswerWasDownVoted extends AbstractEvent implements DomainEvent
{
    /**
     * Creates a QuestionWasDownVoted
     *
     * @param AnswerId $answerId
     * @param User $owner
     */

    public function __construct(private readonly AnswerId $answerId, private readonly User $owner)
    {
        parent::__construct();
    }

    /**
     * answerId
     *
     * @return AnswerId
     */
    public function answerId(): AnswerId
    {
        return $this->answerId;
    }

    /**
     * owner
     *
     * @return User
     */

    public function owner(): User

    {
        return $this->owner;
    }
}
