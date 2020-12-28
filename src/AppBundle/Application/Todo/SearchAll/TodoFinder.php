<?php


namespace AppBundle\Application\Todo\SearchAll;


use AppBundle\Application\Todo\TodoResponse;
use AppBundle\Application\Todo\TodoResponses;
use AppBundle\Domain\Todo\Todo;
use AppBundle\Domain\Todo\TodoRepository;

class TodoFinder
{
    private $repository;

    public function __construct(TodoRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke()
    {
        $todolist = $this->repository->searchAll();

        $todoResponses = [];

        foreach($todolist as $todo) {
            $todoResponses[] = $this->toResponse($todo);
        }

        return new TodoResponses(...$todoResponses);
    }

    private function toResponse(Todo $todo): TodoResponse
    {
        return new TodoResponse(
            $todo->id()->value(),
            $todo->name()->value(),
            $todo->creationDate()->value()->format('d/m/Y'),
            $todo->dueDate()->value()->format('Y-m-d'),
            $todo->getStatus()->value()
        );
    }
}