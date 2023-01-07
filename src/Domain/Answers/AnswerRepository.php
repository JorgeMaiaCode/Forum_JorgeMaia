<?php

/** This file is part of forum ... */

declare(strict_types=1);

namespace App\Domain\Answers;


use App\Domain\Answers\Answer\AnswerId;
use App\Domain\Exception\EntityNotFound;
use RuntimeException;

/**
 * AnswerRepository
 *
 * @package App\Domain\Answers
 */
interface AnswerRepository
{
    /**
     * Adds an answer to the repository
     *
     * @param Answer $answer
     * @return Answer
     */

    public function add(Answer $answer): Answer;

    /**
     * Retrieves a answer saved with provided answer identifier
     *
     * @param AnswerId $answerId
     * @return Answer
     * @throws RuntimeException|EntityNotFound
     */
    public function withAnswerId(AnswerId $answerId): Answer;

    /**
     * Removes a provided answer from repository
     *
     * @param Answer $answer
     * @return Answer
     */

    public function remove(Answer $answer): Answer;
}
