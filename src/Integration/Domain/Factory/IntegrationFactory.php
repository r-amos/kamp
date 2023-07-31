<?php

namespace Kamp\Integration\Domain\Factory;

use Kamp\Integration\Domain\Integration;
use Kamp\Integration\Domain\ValueObject\UUID;

class IntegrationFactory
{
    public function __construct(private readonly AccessTokenFactory $tokenFactory)
    {
    }

    public function build(
        string $uuid,
        string $refreshToken,
        string $bearerToken,
        string $expiry
    ): Integration {
        return new Integration(
            new UUID($uuid),
            $this->tokenFactory->build(
                $refreshToken,
                $bearerToken,
                $expiry
            )
        );
    }
}
