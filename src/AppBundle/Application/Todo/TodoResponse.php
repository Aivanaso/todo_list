<?php


namespace AppBundle\Application\Todo;


class TodoResponse
{
    private $id;
    private $name;
    private $creationDate;
    private $dueDate;
    private $status;

    public function __construct(
        string $id,
        string $name,
        string $creationDate,
        string $dueDate,
        bool $status
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->creationDate = $creationDate;
        $this->dueDate = $dueDate;
        $this->status = $status;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getCreationDate(): string
    {
        return $this->creationDate;
    }

    public function getDueDate(): string
    {
        return $this->dueDate;
    }

    public function isStatus(): bool
    {
        return $this->status;
    }
}