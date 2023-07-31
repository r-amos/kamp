<?php

declare(strict_types=1);

namespace Kamp\Integration\Application\DTO;

class AccessTokenCreationDTO
{
    private readonly string $bearerToken;

    private readonly string $refreshToken;

    private readonly string $expiryDate;

    public function __construct(array $parameters)
    {
        $this->bearerToken = $parameters['bearerToken'];
    }

    public function getBearerToken(): string
    {
        return $this->bearerToken;
    }

    public function getRefreshToken(): string
    {
        return $this->refreshToken;
    }

    public function getExpiryDate(): string
    {
        return $this->expiryDate;
    }
}
