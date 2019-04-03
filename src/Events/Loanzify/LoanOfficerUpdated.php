<?php

namespace LHP\Services\Events\Loanzify;

use LHP\Services\Events\Contracts\ServiceEvent;

class LoanOfficerUpdated implements ServiceEvent
{
    /**
     * @var
     */
    private $serviceUserId;

    /**
     * StandardAccountCreated constructor.
     *
     * @param $serviceUserId
     */
    public function __construct($serviceUserId)
    {
        $this->serviceUserId = $serviceUserId;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'serviceUserId' => $this->serviceUserId,
        ];
    }
}