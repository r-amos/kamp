<?php

declare(strict_types=1);

namespace Kamp\Integration\Domain\ValueObject;

use Kamp\Common\Domain\ValueObject;

class Token extends ValueObject
{
    public function __construct(private readonly string $token)
    {
    }

    public function getValue(): string
    {
        return $this->token;
    }
}
