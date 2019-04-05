<?php

namespace LHP\Services\Commands\POS;

use LHP\Services\Commands\ServiceCommand;
use LHP\Services\Events\POS\AccountCreated;

class AfterCreateAccount extends ServiceCommand
{
    /**
     * @var int
     */
    private $ssoId;
    private $smartappSiteProfileId;

    /**
     * CreateStandardAccount constructor.
     *
     * @param int $ssoId
     */
    public function __construct(int $ssoId, int $ssoUserServiceId)
    {
        $this->ssoId = $ssoId;
        $this->ssoUserServiceId = $ssoUserServiceId;
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
            'ssoId' => $this->ssoId,
            'ssoUserServiceId' => $this->ssoUserServiceId,
        ];
    }
}