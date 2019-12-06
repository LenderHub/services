<?php

namespace LHP\Services\Commands\POS;

use LHP\Services\Commands\ServiceCommand;
use LHP\Services\Events\POS\PartnerCreated;

class CreatePartner extends ServiceCommand
{
    private $ssoUserId;
    private $ssoParentUserId;
    private $ssoBranchId;
    
    public function __construct(int $ssoUserId, int $ssoParentUserId, ?int $ssoBranchId)
    {
        $this->ssoUserId = $ssoUserId;
        $this->ssoParentUserId = $ssoParentUserId;
        $this->ssoBranchId = $ssoBranchId;
    }

    public function expects(): string
    {
        return PartnerCreated::class;
    }

    public function payload(): array
    {
        return [
            'ssoUserId' => $this->ssoUserId,
            'ssoParentUserId' => $this->ssoParentUserId,
        ];
    }
}