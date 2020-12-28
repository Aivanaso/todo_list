<?php

namespace AppBundle\Infrastructure\Todo\Persistence;

use AppBundle\Domain\Todo\Todo;
use AppBundle\Domain\Todo\TodoRepository;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

class DoctrineTodoRepository extends ServiceEntityRepository implements TodoRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Todo::class);
    }

    public function save(Todo $todo)
    {
        $this->getEntityManager()->persist($todo);
        $this->getEntityManager()->flush();
    }

    public function searchAll(): array
    {
        // TODO: Implement searchAll() method.
    }
}