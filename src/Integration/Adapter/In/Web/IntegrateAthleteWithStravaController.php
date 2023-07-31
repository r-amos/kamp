<?php

declare(strict_types=1);

namespace Kamp\Integration\Adapter\In\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Kamp\Integration\Application\Port\In\IntegrateAthleteWithStravaCommand;
use Kamp\Integration\Application\Port\In\IntegrateAthleteWithStravaUseCase;
use Kamp\Integration\Domain\ValueObject\AuthorizationCode;
use Kamp\Integration\Domain\ValueObject\ClientIdentifier;
use Kamp\Integration\Domain\ValueObject\ClientSecret;

class IntegrateAthleteWithStravaController extends Controller
{
    public function __invoke(
        Request $request,
        IntegrateAthleteWithStravaUseCase $handler,
        string $clientIdentifier,
        string $clientSecret
    ) {
        $authorizationCode = new AuthorizationCode($request->get('code'));

        $command = new IntegrateAthleteWithStravaCommand(
            $authorizationCode,
            new ClientIdentifier($clientIdentifier),
            new ClientSecret($clientSecret)
        );

        // @TODO: Make Response
        return $handler->handle($command);
    }
}
