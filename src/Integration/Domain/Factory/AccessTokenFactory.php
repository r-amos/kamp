<?php

namespace Kamp\Integration\Domain\Factory;

use Kamp\Integration\Domain\ValueObject\ExpiryDate;
use Kamp\Integration\Domain\ValueObject\Token;
use Kamp\Integration\Domain\ValueObject\UUID;
use Kamp\Integration\Domain\AccessToken;

class AccessTokenFactory
{
    public function build(
        string $refreshToken,
        string $bearerToken,
        string $expiry
    ): AccessToken {
        return new AccessToken(
            new UUID(''),
            new Token($bearerToken),
            new Token($refreshToken),
            new ExpiryDate($expiry)
        );
    }
}
