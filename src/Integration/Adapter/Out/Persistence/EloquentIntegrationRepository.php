<?php

use App\Models\Integration as EloquentIntegration;
use Kamp\Integration\Adapter\Out\Persistence\IntegrationRepository;
use Kamp\Integration\Application\DTO\AccessTokenCreationDTO;

class EloquentIntegrationRepository implements IntegrationRepository
{
    private EloquentIntegration $entity;

    public function __construct(private readonly EloquentAccessTokenRepository $tokenRepository)
    {
        $this->entity = EloquentIntegration::class;
    }

    public function create(AccessTokenCreationDTO $token)
    {
        /** @var EloquentIntegration */
        $integration = $this->entity->make([]);
        $integration
            ->accessTokens()
            ->save(
                $this->tokenRepository->create($token)
            );
        $integration->save();
    }
}