<?php

namespace LHP\Services\Events\POS;

use LHP\Services\Events\Contracts\ServiceEvent;

class AccountCreated implements ServiceEvent
{
    private $posAccountId;
    private $posAccountUserId;
    private $domain;

    public function __construct(int $posAccountId, int $posAccountUserId, $domain)
    {
        $this->posAccountId = $posAccountId;
        $this->posAccountUserId = $posAccountUserId;
        $this->domain = $domain;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'posAccountId' => $this->posAccountId,
            'posAccountUserId' => $this->posAccountUserId,
            'domain' => $this->domain,
        ];
    }
}