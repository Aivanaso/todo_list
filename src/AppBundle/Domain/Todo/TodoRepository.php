<?php


namespace AppBundle\Domain\Todo;


interface TodoRepository
{
    public function save(Todo $todo);

    public function searchAll(): array;

}