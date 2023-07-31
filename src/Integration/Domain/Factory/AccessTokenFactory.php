<?php

namespace Kamp\Integration\Domain\Factory;

use Kamp\Integration\Domain\AccessToken;
use Kamp\Integration\Domain\ExpiryDate;
use Kamp\Integration\Domain\Token;
use Kamp\Integration\Domain\UUID;

class AccessTokenFactory
{
    public function build(
        string $refreshToken, 
        string $bearerToken, 
        string $expiry
    ): AccessToken
    {
        return new AccessToken(
            new UUID,
            new Token($bearerToken),
            new Token($refreshToken),
            new ExpiryDate($expiry)
        );
    }
}