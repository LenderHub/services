<?php

namespace LHP\Services\Commands\Loanzify;

use LHP\Services\Commands\ServiceCommand;
use LHP\Services\Events\Loanzify\StandardAccountCreated;

class CreateStandardAccount extends ServiceCommand
{
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
        return StandardAccountCreated::class;
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
        ];
}}
