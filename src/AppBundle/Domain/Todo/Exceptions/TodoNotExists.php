<?php

namespace AppBundle\Domain\Todo\Exceptions;

use AppBundle\Domain\Todo\TodoId;
use DomainException;

class TodoNotExists extends DomainException
{
    private $id;

    public function __construct(TodoId $id)
    {
        parent::__construct();
        $this->id = $id;
    }
}