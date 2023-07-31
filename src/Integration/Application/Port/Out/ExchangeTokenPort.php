<?php

namespace Kamp\Integration\Application\Port\Out;

use Kamp\Integration\Application\DTO\AccessTokenCreationDTO;
use Kamp\Integration\Domain\ValueObject\AuthorizationCode;
use Kamp\Integration\Domain\ValueObject\ClientIdentifier;
use Kamp\Integration\Domain\ValueObject\ClientSecret;

interface ExchangeTokenPort
{
    public function exchangeAuthorizationCodeForAccessToken(
        ClientIdentifier $clientIdentifier,
        ClientSecret $clientSecret, 
        AuthorizationCode $authorizationCode
    ): AccessTokenCreationDTO;
}
