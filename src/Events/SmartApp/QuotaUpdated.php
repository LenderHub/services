<?php

namespace LHP\Services\Events\SmartApp;

use LHP\Services\Events\Contracts\ServiceEvent;

class QuotaUpdated implements ServiceEvent
{

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [];
    }
}