<?php

namespace LHP\Services\Commands\Loanzify;

use LHP\Services\Commands\ServiceCommand;
use LHP\Services\Events\Loanzify\EnterpriseAccountCreated;

class CreateEnterpriseAccount extends ServiceCommand
{
    /**
     * @var int
     */
    private $ssoId;

    /**
     * @var int
     */
    private $maxLoanOfficers;

    /**
     * CreateStandardAccount constructor.
     *
     * @param int $ssoId
     * @param int $maxLoanOfficers
     */
    public function __construct(int $ssoId, int $maxLoanOfficers)
    {
        $this->ssoId           = $ssoId;
        $this->maxLoanOfficers = $maxLoanOfficers;
    }

    /**
     * The event class the command expects to receive on successful execution
     *
     * @return string
     */
    public function expects(): string
    {
        return EnterpriseAccountCreated::class;
    }

    /**
     * The payload of the command
     *
     * @return array
     */
    public function payload(): array
    {
        return [
            'ssoId'           => $this->ssoId,
            'maxLoanOfficers' => $this->maxLoanOfficers,
        ];
    }
}