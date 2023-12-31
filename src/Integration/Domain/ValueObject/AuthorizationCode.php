<?php

declare(strict_types=1);

namespace Kamp\Integration\Domain\ValueObject;

use Kamp\Common\Domain\ValueObject;

class AuthorizationCode extends ValueObject
{
    public function __construct(private readonly string $code)
    {
    }

    public function getValue(): string
    {
        return $this->code;
    }
}
