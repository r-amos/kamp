<?php

namespace Kamp\Integration\Domain\Factory;

use Kamp\Integration\Domain\Integration;
use Kamp\Integration\Domain\UUID;

class IntegrationFactory
{
    public function __construct(private readonly AccessTokenFactory $tokenFactory)
    {}

    public function build(
        string $refreshToken, 
        string $bearerToken, 
        string $expiry
    ): Integration
    {
        return new Integration(
            new UUID(''),
            $this->tokenFactory->build(
                $refreshToken,
                $bearerToken, 
                $expiry
            )
        );
    }
}