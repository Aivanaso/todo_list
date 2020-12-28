<?php


namespace AppBundle\Domain\Todo;


interface TodoRepository
{
    public function save(Todo $todo);

    public function searchAll(): array;

    public function search(TodoId $id): ?Todo;

}