<?php

namespace Kamp\Integration\Adapter\Out\Persistence;

use Kamp\Integration\Application\Port\Out\CreateAccessTokenPort;
use Kamp\Integration\Domain\AccessToken;

class AccessTokenPersistenceAdapter implements CreateAccessTokenPort
{
    public function __construct(
        private readonly AccessTokenRepository $repository,
        private readonly AccessTokenMapper $mapper
    )
    {}

    public function create(AccessToken $token): void
    {

        $this->repository->create(
            $this->mapper->toDTO($token)
        );
    }
}
