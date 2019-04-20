<?php

namespace LHP\Services\Commands\POS;

use LHP\Services\Commands\ServiceCommand;
use LHP\Services\Events\POS\AccountUserServiceIdUpdated;

class UpdateAccountUserServiceId extends ServiceCommand
{
    private $isCreatingAccount;
    private $posAccountId;
    private $posAccountUserId;
    private $ssoUserServiceId;
    private $ssoUserId;

    public function __construct(bool $isCreatingAccount, int $posAccountId, int $posAccountUserId, int $ssoUserServiceId, int $ssoUserId)
    {
        $this->isCreatingAccount = $isCreatingAccount;
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
        return AccountUserServiceIdUpdated::class;
    }

    /**
     * The payload of the command
     *
     * @return array
     */
    public function payload(): array
    {
        return [
            'isCreatingAccount' => $this->isCreatingAccount,
            'posAccountId' => $this->posAccountId,
            'posAccountUserId' => $this->posAccountUserId,
            'ssoUserServiceId' => $this->ssoUserServiceId,
            'ssoUserId' => $this->ssoUserId,
        ];
    }
}