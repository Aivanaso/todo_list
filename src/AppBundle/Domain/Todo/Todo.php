<?php

namespace AppBundle\Domain\Todo;

class Todo
{
    private $id;
    private $name;
    private $creationDate;
    private $dueDate;
    private $status;

    public function __construct(
        TodoId $id,
        TodoName $name,
        TodoCreationDate $creationDate,
        TodoDueDate $dueDate,
        TodoStatus $status
    ){
        $this->id = $id;
        $this->name = $name;
        $this->creationDate = $creationDate;
        $this->dueDate = $dueDate;
        $this->status = $status;
    }

    public function id(): TodoId
    {
        return $this->id;
    }

    public function name(): TodoName
    {
        return $this->name;
    }

    public function creationDate(): TodoCreationDate
    {
        return $this->creationDate;
    }

    public function dueDate(): TodoDueDate
    {
        return $this->dueDate;
    }

    public function getStatus(): TodoStatus
    {
        return $this->status;
    }

    public function changeName(TodoName $name)
    {
        if (!$this->name()->isEqual($name)) {
            $this->name = $name;
        }
    }

    public function changeDueDate(TodoDueDate $dueDate)
    {
        if (!$this->dueDate()->isEqual($dueDate)) {
            $this->dueDate = $dueDate;
        }
    }

    public function changeStatus(TodoStatus $status)
    {
        if (!$this->getStatus()->isEqual($status)) {
            $this->status = $status;
        }
    }
}