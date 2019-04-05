<?php

namespace LHP\Services\Commands\POS;

use LHP\Services\Commands\ServiceCommand;
use LHP\Services\Events\POS\AfterAccountCreated;

class AfterCreateAccount extends ServiceCommand
{
    private $posAccountId;
    private $posAccountUserId;
    private $ssoUserServiceId;
    private $ssoUserId;

    public function __construct(int $posAccountId, int $posAccountUserId, int $ssoUserServiceId, int $ssoUserId)
    {
        $this->posAccountId = $posAccountId;
        $this->posAccountUserId = $posAccountUserId;
        $this->ssoUserServiceId = $ssoUserServiceId;
        $this->ssoUserId = $ssoUserId;
    }

    /**
     * The event class the command expects to receive on successful execution
     *
     * @return string
     */
    public function expects(): string
    {
        return AfterAccountCreated::class;
    }

    /**
     * The payload of the command
     *
     * @return array
     */
    public function payload(): array
    {
        return [
            'posAccountId' => $this->posAccountId,
            'posAccountUserId' => $this->posAccountUserId,
            'ssoUserServiceId' => $this->ssoUserServiceId,
            'ssoUserId' => $this->ssoUserId,
        ];
    }
}