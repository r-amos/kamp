<?php

declare(strict_types=1);

namespace Kamp\Integration\Domain;

class AccessToken
{
    public function __construct(
        private readonly UUID $id,
        private readonly Token $bearerToken,
        private readonly Token $refreshToken,
        private readonly ExpiryDate $expiry
    )
    {}

    public function getIdentifier()
    {
        return $this->id->toString();
    }
}


class Token
{}

class  ExpiryDate {

}

class UUID {
    public function toString()
    {
        return '';
    }
}