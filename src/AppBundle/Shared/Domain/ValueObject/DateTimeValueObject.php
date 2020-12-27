<?php


namespace AppBundle\Shared\Domain\ValueObject;


use DateTimeImmutable;
use InvalidArgumentException;

abstract class DateTimeValueObject
{
    protected $value;

    public function __construct(string $value)
    {
        $date = $this->ensureIsValidDate($value);
        $this->value = $date;
    }

    public function value(): DateTimeImmutable
    {
        return $this->value;
    }

    public function __toString(): string
    {
        $this->value->format('Y-m-d H:i:s');
    }

    private function ensureIsValidDate(string $date, bool $strict = true): DateTimeImmutable
    {
        $dateTime = DateTimeImmutable::createFromFormat('Y-m-d', $date);
        if ($strict) {
            $errors = DateTimeImmutable::getLastErrors();
            if (!empty($errors['warning_count'])) {
                throw new InvalidArgumentException(sprintf('<%s> does not allow the value <%s>.', static::class, $date));
            }
        }
        return $dateTime;
    }
}