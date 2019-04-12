<?php

namespace LHP\Services\Events\POS;

use LHP\Services\Events\Contracts\ServiceEvent;

class LoanOfficerDeleted implements ServiceEvent
{
    private $ssoUserServiceId;
    private $posAccountUserId;
    
    public function __construct(int $ssoUserServiceId, ?int $posAccountUserId)
    {
        $this->ssoUserServiceId = $ssoUserServiceId;
        $this->posAccountUserId = $posAccountUserId;
    }
    
    public function toArray(): array
    {
        return [
            'ssoUserServiceId' => $this->ssoUserServiceId,
            'posAccountUserId' => $this->posAccountUserId,
        ];
    }
}