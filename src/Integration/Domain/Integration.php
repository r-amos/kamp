<?php

declare(strict_types=1);

namespace Kamp\Integration\Domain;

class Integration
{
    public function __construct(
        private readonly UUID $uuid,
        private readonly AccessToken $token
    ) 
    {}

    public function getIdentifier(): UUID
    {
        return $this->uuid;
    }
}