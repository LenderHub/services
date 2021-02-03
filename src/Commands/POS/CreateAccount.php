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
     * @var string
     */
    private $companyName;
    /**
     * @var bool
     */
    private $lite;

    /**
     * CreateStandardAccount constructor.
     *
     * @param int $ssoId
     * @param string $companyName
     * @param bool $lite
     */
    public function __construct(int $ssoId, string $companyName, bool $lite = false)
    {
        $this->ssoId = $ssoId;
        $this->companyName = $companyName;
        $this->lite = $lite;
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
            'companyName' => $this->companyName,
            'lite' => $this->lite,
        ];
    }
}