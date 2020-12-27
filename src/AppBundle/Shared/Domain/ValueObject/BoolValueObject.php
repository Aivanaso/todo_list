<?php


namespace AppBundle\Shared\Domain\ValueObject;


abstract class BoolValueObject
{
    private $value;

    public function __construct(bool $value)
    {
        $this->value = $value;
    }

    public function value(): bool
    {
        return $this->value;
    }
}