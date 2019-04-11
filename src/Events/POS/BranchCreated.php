<?php

namespace LHP\Services\Events\POS;

use LHP\Services\Events\Contracts\ServiceEvent;

class BranchCreated implements ServiceEvent
{
    private $posBranchId;
    private $posAccountId;
    private $posAccountUserId;
    
    public function __construct(int $posBranchId, int $posAccountId, int $posAccountUserId)
    {
        $this->posBranchId = $posBranchId;
        $this->posAccountId = $posAccountId;
        $this->posAccountUserId = $posAccountUserId;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'posBranchId' => $this->posBranchId,
            'posAccountId' => $this->posAccountId,
            'posAccountUserId' => $this->posAccountUserId,
        ];
    }
}