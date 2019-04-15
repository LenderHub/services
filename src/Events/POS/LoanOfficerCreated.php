<?php

namespace LHP\Services\Events\POS;

use LHP\Services\Events\Contracts\ServiceEvent;

class LoanOfficerCreated implements ServiceEvent
{
    private $posAccountId;
    private $posAccountUserId;
    
    public function __construct(int $posAccountId, int $posAccountUserId)
    {
        $this->posAccountId = $posAccountId;
        $this->posAccountUserId = $posAccountUserId;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'posAccountId' => $this->posAccountId,
            'posAccountUserId' => $this->posAccountUserId,
        ];
    }
}