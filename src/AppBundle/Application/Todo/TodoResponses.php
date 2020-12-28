<?php


namespace AppBundle\Application\Todo;


class TodoResponses
{

    private $todoResponses;

    public function __construct(TodoResponse ...$todoResponses)
    {
        $this->todoResponses = $todoResponses;
    }

    public function todolist(): array
    {
        return $this->todoResponses;
    }
}