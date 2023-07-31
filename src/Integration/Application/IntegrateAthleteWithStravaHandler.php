<?php

namespace Kamp\Integration\Application;

use Kamp\Common\Infrastructure\Contract\EventDispatcher;
use Kamp\Common\Infrastructure\Contract\UUIDService;
use Kamp\Integration\Application\Port\In\IntegrateAthleteWithStravaCommand;
use Kamp\Integration\Application\Port\In\IntegrateAthleteWithStravaUseCase;
use Kamp\Integration\Application\Port\Out\CreateIntegrationPort;
use Kamp\Integration\Application\Port\Out\ExchangeTokenPort;
use Kamp\Integration\Domain\Event\IntegrationCreated;
use Kamp\Integration\Domain\Factory\IntegrationFactory;

class IntegrateAthleteWithStravaHandler implements IntegrateAthleteWithStravaUseCase
{
    public function __construct(
        private readonly EventDispatcher $eventDispatcher,
        private readonly ExchangeTokenPort $exchangeToken,
        private readonly CreateIntegrationPort $createIntegrationPort,
        private readonly IntegrationFactory $integrationFactory,
        private readonly UUIDService $uuidService
    ) {
    }

    public function handle(IntegrateAthleteWithStravaCommand $command): string
    {
        $uuid = $this->uuidService->create();
        $token = $this
            ->exchangeToken
            ->exchangeAuthorizationCodeForAccessToken(
                $command->getClientIdentifier(),
                $command->getClientSecret(),
                $command->getAuthorizationCode()
            );

        $this->createIntegrationPort->create(
            $this->integrationFactory->build(
                $uuid,
                $token->getBearerToken(),
                $token->getRefreshToken(),
                $token->getExpiryDate()
            )
        );

        $this->eventDispatcher->dispatch(
            new IntegrationCreated()
        );

        return $uuid;
    }
}
