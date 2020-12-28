<?php


namespace AppBundle\Application\Todo\Create;


use AppBundle\Domain\Todo\Todo;
use AppBundle\Domain\Todo\TodoCreationDate;
use AppBundle\Domain\Todo\TodoDueDate;
use AppBundle\Domain\Todo\TodoId;
use AppBundle\Domain\Todo\TodoName;
use AppBundle\Domain\Todo\TodoRepository;
use AppBundle\Domain\Todo\TodoStatus;

class TodoCreator
{
    private $repository;

    public function __construct(TodoRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(TodoId $id, TodoName $name, TodoDueDate $dueDate)
    {
        $creationDate = new TodoCreationDate(date('Y-m-d'));
        $status = new TodoStatus(false);

        $todo = new Todo($id, $name, $creationDate, $dueDate, $status);

        $this->repository->save($todo);
    }
}