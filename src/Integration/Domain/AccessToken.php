<?php

declare(strict_types=1);

namespace Kamp\Integration\Domain;

use Kamp\Integration\Domain\ValueObject\ExpiryDate;
use Kamp\Integration\Domain\ValueObject\Token;
use Kamp\Integration\Domain\ValueObject\UUID;

class AccessToken
{
    public function __construct(
        private readonly UUID $id,
        private readonly Token $bearerToken,
        private readonly Token $refreshToken,
        private readonly ExpiryDate $expiry
    ) {
    }

    public function getIdentifier(): string
    {
        return $this->id->getValue();
    }
}
