<?php

namespace Kamp\Integration\Adapter\Out\Persistence;

use Kamp\Integration\Application\DTO\AccessTokenCreationDTO;
use Kamp\Integration\Domain\Integration;

class IntegrationMapper
{
    public function toDTO(Integration $token): AccessTokenCreationDTO
    {
        return new AccessTokenCreationDTO([]);
    }
}
