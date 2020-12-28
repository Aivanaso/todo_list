<?php


namespace AppBundle\Application\Todo\SearchAll;


class SearchAllTodoCommandHandler
{
    private $finder;

    public function __construct(TodoFinder $finder)
    {
        $this->finder = $finder;
    }

    public function __invoke()
    {
        return $this->finder->__invoke();
    }
}