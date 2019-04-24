<?php

namespace LHP\Services\Commands\POS;

use LHP\Services\Commands\ServiceCommand;
use LHP\Services\Events\POS\LoanOfficerCreated;

class CreateLoanOfficer extends ServiceCommand
{
    private $ssoUserId;
    private $ssoParentUserId;
    private $smartappLoanOfficerId;
    private $ssoBranchId;
    
    public function __construct(int $ssoUserId, int $ssoParentUserId, int $smartappLoanOfficerId, ?int $ssoBranchId)
    {
        $this->ssoUserId = $ssoUserId;
        $this->ssoParentUserId = $ssoParentUserId;
        $this->smartappLoanOfficerId = $smartappLoanOfficerId;
        $this->ssoBranchId = $ssoBranchId;
    }

    public function expects(): string
    {
        return LoanOfficerCreated::class;
    }

    public function payload(): array
    {
        return [
            'ssoUserId' => $this->ssoUserId,
            'ssoParentUserId' => $this->ssoParentUserId,
            'smartappLoanOfficerId' => $this->smartappLoanOfficerId,
            'ssoBranchId' => $this->ssoBranchId,
        ];
    }
}