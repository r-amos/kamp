<?php

namespace Kamp\Integration\Application\Port\Out;

use Kamp\Integration\Domain\AccessToken;

interface CreateAccessTokenPort
{
    public function create(AccessToken $token): void;
}
