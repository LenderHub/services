<?php

namespace LHP\Services\Events\POS;

use LHP\Services\Events\Contracts\ServiceEvent;

class AccountDeleted implements ServiceEvent
{
    private $ssoUserId;
    private $posAccountId;
    
    public function __construct(int $ssoUserId, ?int $posAccountId)
    {
        $this->ssoUserId = $ssoUserId;
        $this->posAccountId = $posAccountId;
    }
    
    public function toArray(): array
    {
        return [
            'ssoUserId' => $this->ssoUserId,
            'posAccountId' => $this->posAccountId,
        ];
    }
}