<?php

declare(strict_types=1);

namespace Kamp\Integration\Domain\ValueObject;

use Kamp\Common\Domain\ValueObject;

class UUID extends ValueObject
{
    public function __construct(private readonly string $uuid)
    {
    }

    public function getValue(): string
    {
        return $this->uuid;
    }
}
