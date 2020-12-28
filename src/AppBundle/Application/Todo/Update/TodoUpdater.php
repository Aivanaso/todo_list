<?php


namespace AppBundle\Application\Todo\Update;


use AppBundle\Domain\Todo\Exception\TodoNotExists;
use AppBundle\Domain\Todo\Todo;
use AppBundle\Domain\Todo\TodoDueDate;
use AppBundle\Domain\Todo\TodoId;
use AppBundle\Domain\Todo\TodoName;
use AppBundle\Domain\Todo\TodoRepository;
use AppBundle\Domain\Todo\TodoStatus;

class TodoUpdater
{
    private $repository;

    public function __construct(TodoRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(
        TodoId $id,
        TodoName $name,
        TodoDueDate $dueDate,
        TodoStatus $status
    ){
        $todo = $this->ensureTodoExists($id);

        $todo->changeName($name);
        $todo->changeDueDate($dueDate);
        $todo->changeStatus($status);

        $this->repository->save($todo);
    }

    private function ensureTodoExists(TodoId $id): Todo
    {
        $todo = $this->repository->find($id);
        if (null === $todo) {
            throw new TodoNotExists($id);
        }
        return $todo;
    }
}