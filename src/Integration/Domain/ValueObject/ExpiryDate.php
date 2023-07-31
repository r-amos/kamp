<?php

declare(strict_types=1);

namespace Kamp\Integration\Domain\ValueObject;

use Kamp\Common\Domain\ValueObject;

class ExpiryDate extends ValueObject
{
    public function __construct(private readonly string $expiryDate)
    {
    }

    public function getValue(): string
    {
        return $this->expiryDate;
    }
}
