<?php

namespace LHP\Services\Commands\POS;

use LHP\Services\Commands\ServiceCommand;
use LHP\Services\Events\POS\AccountCreated;

class CreateAccount extends ServiceCommand
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
    public function __construct(int $ssoId, int $smartappSiteProfileId)
    {
        $this->ssoId = $ssoId;
        $this->smartappSiteProfileId = $smartappSiteProfileId;
    }

    /**
     * The event class the command expects to receive on successful execution
     *
     * @return string
     */
    public function expects(): string
    {
        return AccountCreated::class;
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
            'smartappSiteProfileId' => $this->smartappSiteProfileId,
        ];
    }
}