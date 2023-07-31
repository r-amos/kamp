<?php

namespace Kamp\Integration\Adapter\Out\Persistence;

use App\Models\AccessToken as EloquentAccessToken;
use Kamp\Integration\Adapter\Out\Persistence\AccessTokenRepository;
use Kamp\Integration\Application\DTO\AccessTokenCreationDTO;

class EloquentAccessTokenRepository implements AccessTokenRepository
{
    private string $entity;

    public function __construct()
    {
        $this->entity = EloquentAccessToken::class;
    }

    public function create(AccessTokenCreationDTO $token): EloquentAccessToken
    {
        return $this->entity::create([]);
    }
}
