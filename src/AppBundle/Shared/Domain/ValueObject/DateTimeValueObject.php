<?php


namespace AppBundle\Shared\Domain\ValueObject;


use DateTime;
use InvalidArgumentException;

abstract class DateTimeValueObject
{
    protected $value;

    public function __construct(string $value)
    {
        $date = $this->ensureIsValidDate($value);
        $this->value = $date;
    }

    public function value(): DateTime
    {
        return $this->value;
    }

    public function __toString(): string
    {
        return $this->value->format('Y-m-d');
    }

    private function ensureIsValidDate(string $date, bool $strict = true): DateTime
    {
        $dateTime = DateTime::createFromFormat('Y-m-d', $date);
        if ($strict) {
            $errors = DateTime::getLastErrors();
            if (!empty($errors['warning_count'])) {
                throw new InvalidArgumentException(sprintf('<%s> does not allow the value <%s>.', static::class, $date));
            }
        }
        return $dateTime;
    }
}