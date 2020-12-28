<?php

namespace AppBundle\Shared\Domain\ValueObject;

use http\Exception\InvalidArgumentException;
use Ramsey\Uuid\Uuid;

abstract class UuidValueObject
{
    protected $id;

    public function __construct($id)
    {
        $this->ensureIsValidUuid($id);
        $this->id = $id;
    }

    public function value()
    {
        return $this->id;
    }

    public function __toString()
    {
        return $this->id;
    }

    private function ensureIsValidUuid($id)
    {
        if (false === Uuid::isValid($id)) {
            throw new InvalidArgumentException(
                sprintf('The value <%s> is invalid', $id)
            );
        }
    }
}