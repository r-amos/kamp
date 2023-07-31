<?php

declare(strict_types=1);

namespace Kamp\Common\Infrastructure\Contract;


interface EventDispatcher
{
    public function dispatch(Event $event);
}