<?php

namespace Kamp\Common\Infrastructure;

use Illuminate\Support\Str;
use Kamp\Common\Infrastructure\Contract\Event;
use Kamp\Common\Infrastructure\Contract\EventDispatcher;

class EventDispatcherService implements EventDispatcher
{
    public function __construct(private readonly Str $helper)
    {
    }

    public function dispatch(Event $event)
    {
        //
    }
}
