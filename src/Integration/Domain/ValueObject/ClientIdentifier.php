<?php

declare(strict_types=1);

namespace Kamp\Integration\Domain\ValueObject;

use Kamp\Common\Domain\ValueObject;

class ClientIdentifier extends ValueObject
{    
    public function __construct(private string $identifier)
    {
        $this->identifier = $identifier;
    }

    public function getValue(): string
    {
        return $this->identifier;
    }
}
