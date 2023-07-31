<?php

namespace Kamp\Integration\Adapter\Out\Web;

use Illuminate\Support\Facades\Http;
use Kamp\Integration\Application\DTO\AccessTokenCreationDTO;
use Kamp\Integration\Application\Port\Out\ExchangeTokenPort;
use Kamp\Integration\Domain\ValueObject\AuthorizationCode;
use Kamp\Integration\Domain\ValueObject\ClientIdentifier;
use Kamp\Integration\Domain\ValueObject\ClientSecret;

class StravaService implements ExchangeTokenPort
{
    public function exchangeAuthorizationCodeForAccessToken(
        ClientIdentifier $clientIdentifier,
        ClientSecret $clientSecret,
        AuthorizationCode $authorizationCode
    ): AccessTokenCreationDTO {
        $httpResponse = Http::asForm()->post('https://www.strava.com/oauth/token', [
            'client_id'     => $clientIdentifier->getValue(),
            'client_secret' => $clientSecret->getValue(),
            'code'          => $authorizationCode->getValue(),
            'grant_type'    => 'authorization_code'
        ]);

        return new AccessTokenCreationDTO(
            (array) $httpResponse
        );
    }
}
