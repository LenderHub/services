<?php

namespace LHP\Services\Events\POS;

use LHP\Services\Events\Contracts\ServiceEvent;

class AccountUserServiceIdUpdated implements ServiceEvent
{
    public function __construct()
    {
        //
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [];
    }
}