<?php

namespace LHP\Services\Commands\Loanzify;

use LHP\Services\Commands\Contracts\ServiceCommand;
use LHP\Services\Events\Loanzify\StandardAccountCreated;

class CreateStandardAccount extends ServiceCommand
{
    private $ssoEmail;

    public function __construct(string $ssoEmail)
    {
        $this->ssoEmail = $ssoEmail;
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
    protected function payload(): array
    {
        return [
            'ssoEmail' => $this->ssoEmail,
        ];
}}