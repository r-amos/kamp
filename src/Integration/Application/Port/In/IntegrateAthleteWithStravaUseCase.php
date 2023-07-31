<?php

declare(strict_types=1);

namespace Kamp\Integration\Application\Port\In;

use Kamp\Integration\Application\Port\In\IntegrateAthleteWithStravaCommand;

interface IntegrateAthleteWithStravaUseCase
{
    public function handle(IntegrateAthleteWithStravaCommand $command);
}
