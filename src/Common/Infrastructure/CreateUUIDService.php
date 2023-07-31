<?php

namespace Kamp\Common\Infrastructure;

use Kamp\Common\Infrastructure\Contract\UUIDService;
use Illuminate\Support\Str;

class CreateUUIDService implements UUIDService
{
    public function __construct(private readonly Str $helper)
    {
    }

    public function create(): string
    {
        return $this->helper->uuid();
    }
}
