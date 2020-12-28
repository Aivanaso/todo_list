<?php


namespace AppBundle\Shared\Domain\ValueObject;


abstract class BoolValueObject
{
    protected $value;

    public function __construct(bool $value)
    {
        $this->value = $value;
    }

    public function value(): bool
    {
        return $this->value;
    }
}