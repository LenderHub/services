<?php

namespace LHP\Services\Events\Loanzify;

use LHP\Services\Events\Contracts\ServiceEvent;

class StandardAccountCreated implements ServiceEvent
{
    private $serviceUserId;

    public function __construct($serviceUserId)
    {

        $this->serviceUserId = $serviceUserId;
    }

    public function toArray()
    {
        return [
            'serviceUserId' => $this->serviceUserId,
        ];
    }
}