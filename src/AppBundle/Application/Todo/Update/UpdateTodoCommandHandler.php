<?php

namespace AppBundle\Application\Todo\Update;

use AppBundle\Domain\Todo\TodoDueDate;
use AppBundle\Domain\Todo\TodoId;
use AppBundle\Domain\Todo\TodoName;
use AppBundle\Domain\Todo\TodoStatus;

class UpdateTodoCommandHandler
{
    private $updater;

    public function __construct(TodoUpdater $updater)
    {
        $this->updater = $updater;
    }

    public function __invoke(string $id, string $name, string $dueDate, bool $status)
    {
        ($this->updater)(
            new TodoId($id),
            new TodoName($name),
            new TodoDueDate($dueDate),
            new TodoStatus($status)
        );
    }
}