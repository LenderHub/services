<?php

namespace LHP\Services\Events\POS;

use LHP\Services\Events\Contracts\ServiceEvent;

class AfterAccountCreated implements ServiceEvent
{
    /**
     * @var
     */
    private $serviceUserId;
    private $domain;

    /**
     * StandardAccountCreated constructor.
     *
     * @param $serviceUserId
     */
    public function __construct($serviceUserId, $domain)
    {
        $this->serviceUserId = $serviceUserId;
        $this->domain = $domain;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'serviceUserId' => $this->serviceUserId,
            'domain' => $this->domain
        ];
    }
}