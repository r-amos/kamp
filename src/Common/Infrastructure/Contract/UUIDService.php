<?php

declare(strict_types=1);

namespace Kamp\Common\Infrastructure\Contract;

interface UUIDService
{
    public function create(): string;
}
