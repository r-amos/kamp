<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Kamp\Common\Infrastructure\Contract\EventDispatcher;
use Kamp\Common\Infrastructure\Contract\UUIDService;
use Kamp\Common\Infrastructure\CreateUUIDService;
use Kamp\Common\Infrastructure\EventDispatcherService;
use Kamp\Integration\Adapter\In\Web\IntegrateAthleteWithStravaController;
use Kamp\Integration\Adapter\Out\Persistence\EloquentIntegrationRepository;
use Kamp\Integration\Adapter\Out\Persistence\IntegrationPersistenceAdapter;
use Kamp\Integration\Adapter\Out\Persistence\IntegrationRepository;
use Kamp\Integration\Adapter\Out\Web\StravaService;
use Kamp\Integration\Application\IntegrateAthleteWithStravaHandler;
use Kamp\Integration\Application\Port\In\IntegrateAthleteWithStravaUseCase;
use Kamp\Integration\Application\Port\Out\CreateIntegrationPort;
use Kamp\Integration\Application\Port\Out\ExchangeTokenPort;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app
            ->when(IntegrateAthleteWithStravaController::class)
            ->needs('$clientIdentifier')
            ->giveConfig('integration.strava.id');
        $this->app
            ->when(IntegrateAthleteWithStravaController::class)
            ->needs('$clientSecret')
            ->giveConfig('integration.strava.secret');
        $this->app->bind(IntegrateAthleteWithStravaUseCase::class, function ($app) {
            return $app->make(IntegrateAthleteWithStravaHandler::class);
        });
        $this->app->bind(EventDispatcher::class, function ($app) {
            return $app->make(EventDispatcherService::class);
        });
        $this->app
            ->when(IntegrateAthleteWithStravaHandler::class)
            ->needs(ExchangeTokenPort::class)
            ->give(StravaService::class);
        $this->app
            ->when(IntegrationPersistenceAdapter::class)
            ->needs(IntegrationRepository::class)
            ->give(EloquentIntegrationRepository::class);
        $this->app
            ->when(IntegrateAthleteWithStravaHandler::class)
            ->needs(CreateIntegrationPort::class)
            ->give(IntegrationPersistenceAdapter::class);
        $this->app
            ->bind(UUIDService::class, function ($app) {
                return $app->make(CreateUUIDService::class);
            });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
