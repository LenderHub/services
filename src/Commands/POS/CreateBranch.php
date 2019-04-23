<?php

namespace LHP\Services\Commands\POS;

use LHP\Services\Commands\ServiceCommand;
use LHP\Services\Events\POS\BranchCreated;

class CreateBranch extends ServiceCommand
{
    private $ssoUserIdBranchOwner;
    private $ssoBranchId;
    private $ssoUserIdBranchAdmin;
    private $smartappSiteProfileId;
    
    public function __construct(
        int $ssoUserIdBranchOwner, 
        int $ssoBranchId, 
        int $ssoUserIdBranchAdmin, 
        int $smartappSiteProfileId
    ) {
        $this->ssoUserIdBranchOwner = $ssoUserIdBranchOwner;
        $this->ssoBranchId = $ssoBranchId;
        $this->ssoUserIdBranchAdmin = $ssoUserIdBranchAdmin;
        $this->smartappSiteProfileId = $smartappSiteProfileId;
    }

    public function expects(): string
    {
        return BranchCreated::class;
    }

    public function payload(): array
    {
        return [
            'ssoUserIdBranchOwner' => $this->ssoUserIdBranchOwner,
            'ssoBranchId' => $this->ssoBranchId,
            'ssoUserIdBranchAdmin' => $this->ssoUserIdBranchAdmin,
            'smartappSiteProfileId' => $this->smartappSiteProfileId,
        ];
    }
}