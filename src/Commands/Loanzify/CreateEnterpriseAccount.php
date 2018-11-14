<?php

namespace LHP\Services\Commands\Loanzify;

use LHP\Services\Events\Loanzify\EnterpriseAccountCreated;

class CreateEnterpriseAccount
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
     * @var int
     */
    private $maxBranches;

    /**
     * CreateStandardAccount constructor.
     *
     * @param int $ssoId
     * @param int $maxLoanOfficers
     * @param int $maxBranches
     */
    public function __construct(int $ssoId, int $maxLoanOfficers, int $maxBranches)
    {
        $this->ssoId           = $ssoId;
        $this->maxLoanOfficers = $maxLoanOfficers;
        $this->maxBranches     = $maxBranches;
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
            'maxBranches'     => $this->maxBranches,
        ];
    }
}