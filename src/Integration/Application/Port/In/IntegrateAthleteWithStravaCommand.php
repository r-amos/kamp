<?php

declare(strict_types=1);

namespace Kamp\Integration\Application\Port\In;

use Kamp\Integration\Domain\ValueObject\AuthorizationCode;
use Kamp\Integration\Domain\ValueObject\ClientIdentifier;
use Kamp\Integration\Domain\ValueObject\ClientSecret;

class IntegrateAthleteWithStravaCommand
{
    public function __construct(
        private AuthorizationCode $code,
        private ClientIdentifier $identifier,
        private ClientSecret $secret
    ) {
    }

    public function getAuthorizationCode(): AuthorizationCode
    {
        return $this->code;
    }

    public function getClientIdentifier(): ClientIdentifier
    {
        return $this->identifier;
    }

    public function getClientSecret(): ClientSecret
    {
        return $this->secret;
    }
}
