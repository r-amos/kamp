<?php

namespace Kamp\Integration\Application;

use Kamp\Common\Infrastructure\Contract\EventDispatcher;
use Kamp\Integration\Application\Port\In\IntegrateAthleteWithStravaCommand;
use Kamp\Integration\Application\Port\In\IntegrateAthleteWithStravaUseCase;
use Kamp\Integration\Application\Port\Out\CreateIntegrationPort;
use Kamp\Integration\Application\Port\Out\ExchangeTokenPort;
use Kamp\Integration\Domain\Event\IntegrationCreated;
use Kamp\Integration\Domain\Factory\IntegrationFactory;
use Kamp\Integration\Domain\UUID;

class IntegrateAthleteWithStravaHandler implements IntegrateAthleteWithStravaUseCase
{
    public function __construct(
        private readonly EventDispatcher $eventDispatcher,
        private readonly ExchangeTokenPort $exchangeToken,
        private readonly CreateIntegrationPort $createIntegrationPort,
        private readonly IntegrationFactory $integrationFactory
    ) {
    }

    public function handle(IntegrateAthleteWithStravaCommand $command): UUID
    {
        $token = $this
            ->exchangeToken
            ->exchangeAuthorizationCodeForAccessToken(
                $command->getClientIdentifier(),
                $command->getClientSecret(),
                $command->getAuthorizationCode()
            );

        $this->createIntegrationPort->create(
            $integration = $this->integrationFactory->build(
                $token->getBearerToken(),
                $token->getExpiryDate(),
                $token->getExpiryDate()
            )
        );

        $this->eventDispatcher->dispatch(
            new IntegrationCreated()
        );

        return $integration->getIdentifier();
    }
}
