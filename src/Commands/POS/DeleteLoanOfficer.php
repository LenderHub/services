<?php

namespace LHP\Services\Commands\POS;

use LHP\Services\Commands\ServiceCommand;
use LHP\Services\Events\POS\LoanOfficerDeleted;


class DeleteLoanOfficer extends ServiceCommand
{
    private $ssoUserId;
    private $ssoUserIdOwner;
    
    public function __construct(int $ssoUserServiceId, int $ssoUserIdOwner)
    {
        $this->ssoUserId = $ssoUserServiceId;
        $this->ssoUserIdOwner = $ssoUserIdOwner;
    }

    public function expects(): string
    {
        return LoanOfficerDeleted::class;
    }
    
    public function payload(): array
    {
        return [
            'ssoUserId' => $this->ssoUserId,
            'ssoUserIdOwner' => $this->ssoUserIdOwner
        ];
    }
}