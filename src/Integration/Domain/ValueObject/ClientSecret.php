<?php

declare(strict_types=1);

namespace Kamp\Integration\Domain\ValueObject;

use Kamp\Common\Domain\ValueObject;

class ClientSecret extends ValueObject
{
    public function __construct(private string $secret)
    {
        $this->secret = $secret;
    }

    public function getValue(): string
    {
        return $this->secret;
    }
}
