<?php

namespace Kamp\Integration\Application\Port\Out;

use Kamp\Integration\Domain\Integration;

interface CreateIntegrationPort
{
    public function create(Integration $integration);
}
