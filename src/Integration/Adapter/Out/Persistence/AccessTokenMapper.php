<?php

namespace Kamp\Integration\Adapter\Out\Persistence;

use Kamp\Integration\Application\DTO\AccessTokenCreationDTO;
use Kamp\Integration\Domain\AccessToken;
use Kamp\Integration\Domain\ExpiryDate;
use Kamp\Integration\Domain\Token;
use Kamp\Integration\Domain\UUID;

class AccessTokenMapper 
{
    public function toDomain(AccessTokenCreationDTO $token): AccessToken
    {
        return new AccessToken(
            new UUID,
            new Token,
            new Token,
            new ExpiryDate
        );
    }
    
    public function toDTO(AccessToken $token): AccessTokenCreationDTO    
    {
        return new AccessTokenCreationDTO([]);
    }
}
