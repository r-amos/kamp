<?php

namespace Kamp\Integration\Adapter\Out\Persistence;

use Kamp\Integration\Application\Port\Out\CreateIntegrationPort;
use Kamp\Integration\Domain\Integration;

class IntegrationPersistenceAdapter implements CreateIntegrationPort
{
    public function __construct(
        private readonly IntegrationRepository $repository,
        private readonly IntegrationMapper $mapper
    ) {
    }

    public function create(Integration $integration): void
    {
        $this->repository->create(
            $this->mapper->toDTO($integration)
        );
    }
}
