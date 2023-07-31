<?php

namespace Kamp\Integration\Adapter\Out\Persistence;

use Kamp\Integration\Application\DTO\AccessTokenCreationDTO;

interface IntegrationRepository
{
    public function create(AccessTokenCreationDTO $token);
}
