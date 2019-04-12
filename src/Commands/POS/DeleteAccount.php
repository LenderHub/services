<?php

namespace LHP\Services\Commands\POS;

use LHP\Services\Commands\ServiceCommand;
use LHP\Services\Events\Loanzify\AccountDeleted;

class DeleteAccount extends ServiceCommand
{
    private $ssoUserId;
    
    public function __construct(int $ssoUserId)
    {
        $this->ssoUserId = $ssoUserId;
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