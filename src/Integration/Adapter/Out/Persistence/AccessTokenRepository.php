<?php

namespace Kamp\Integration\Adapter\Out\Persistence;

use Kamp\Integration\Application\DTO\AccessTokenCreationDTO;

interface AccessTokenRepository
{
    public function create(AccessTokenCreationDTO $token);
}
