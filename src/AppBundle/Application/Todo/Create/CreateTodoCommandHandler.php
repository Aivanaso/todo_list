<?php


namespace AppBundle\Application\Todo\Create;


use AppBundle\Domain\Todo\TodoDueDate;
use AppBundle\Domain\Todo\TodoId;
use AppBundle\Domain\Todo\TodoName;

class CreateTodoCommandHandler
{
    private $creator;

    public function __construct(TodoCreator $creator)
    {
        $this->creator = $creator;
    }

    public function __invoke(
        string $id,
        string $name,
        string $dueDate
    ): void {
        $id = new TodoId($id);
        $name = new TodoName($name);
        $dueDate = new TodoDueDate($dueDate);

        $this->creator->__invoke($id, $name, $dueDate);
    }
}