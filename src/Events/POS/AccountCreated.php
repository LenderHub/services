<?php

namespace LHP\Services\Events\POS;

use LHP\Services\Events\Contracts\ServiceEvent;

class AccountCreated implements ServiceEvent
{
    private $accountId;
    private $serviceUserId;
    private $domain;

    public function __construct($accountId, $serviceUserId, $domain)
    {
        $this->accountId = $accountId;
        $this->serviceUserId = $serviceUserId;
        $this->domain = $domain;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'account_id' => $this->accountId,
            'serviceUserId' => $this->serviceUserId,
            'domain' => $this->domain
        ];
    }
}