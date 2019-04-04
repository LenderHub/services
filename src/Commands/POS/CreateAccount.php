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

    /**
     * CreateStandardAccount constructor.
     *
     * @param int $ssoId
     */
    public function __construct(int $ssoId)
    {
        $this->ssoId = $ssoId;
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
            'ssoId' => $this->ssoId
        ];
    }
}