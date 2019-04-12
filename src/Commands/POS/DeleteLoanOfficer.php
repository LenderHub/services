<?php

namespace LHP\Services\Commands\POS;

use LHP\Services\Commands\ServiceCommand;
use LHP\Services\Events\POS\LoanOfficerDeleted;


class DeleteLoanOfficer extends ServiceCommand
{
    private $ssoUserServiceId;
    
    public function __construct(int $ssoUserServiceId)
    {
        $this->ssoUserServiceId = $ssoUserServiceId;
    }

    public function expects(): string
    {
        return LoanOfficerDeleted::class;
    }
    
    public function payload(): array
    {
        return [
            'ssoUserServiceId' => $this->ssoUserServiceId,
        ];
    }
}