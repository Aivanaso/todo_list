<?php

namespace AppBundle\Infrastructure\Todo\Persistence\Doctrine;

use AppBundle\Domain\Todo\TodoId;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\GuidType;

class TodoIdType extends GuidType
{
    public function getName()
    {
        return 'todo_id';
    }

    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        return new TodoId($value);
    }

    public function convertToDatabaseValue($value, AbstractPlatform $platform)
    {
        if (null === $value) {
            return null;
        }

        return $value->value();
    }
}