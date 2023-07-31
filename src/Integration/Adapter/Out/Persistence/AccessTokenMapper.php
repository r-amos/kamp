<?php

namespace Kamp\Integration\Adapter\Out\Persistence;

use Kamp\Integration\Application\DTO\AccessTokenCreationDTO;
use Kamp\Integration\Domain\AccessToken;
use Kamp\Integration\Domain\ValueObject\ExpiryDate;
use Kamp\Integration\Domain\ValueObject\Token;
use Kamp\Integration\Domain\ValueObject\UUID;

class AccessTokenMapper
{
    public function toDomain(AccessTokenCreationDTO $token): AccessToken
    {
        return new AccessToken(
            new UUID(''),
            new Token($token->getBearerToken()),
            new Token($token->getRefreshToken()),
            new ExpiryDate($token->getExpiryDate())
        );
    }

    public function toDTO(AccessToken $token): AccessTokenCreationDTO
    {
        return new AccessTokenCreationDTO([]);
    }
}
