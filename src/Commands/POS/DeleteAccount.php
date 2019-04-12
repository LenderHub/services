<?php

namespace LHP\Services\Commands\POS;

use LHP\Services\Commands\ServiceCommand;
use LHP\Services\Events\Loanzify\AccountDeleted;
use LHP\Services\Events\POS\AccountCreated;

class DeleteAccount extends ServiceCommand
{
    private $ssoUserId;
    
    public function __construct(int $ssoId, int $smartappSiteProfileId)
    {
        $this->ssoId = $ssoId;
        $this->smartappSiteProfileId = $smartappSiteProfileId;
    }

    public function expects(): string
    {
        return AccountDeleted::class;
    }
    
    public function payload(): array
    {
        return [
            'ssoUserId' => $this->ssoUserId,
        ];
    }
}