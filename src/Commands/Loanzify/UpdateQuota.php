<?php

namespace LHP\Services\Commands\Loanzify;

use LHP\Services\Commands\ServiceCommand;
use LHP\Services\Events\Loanzify\QuotaUpdated;

class UpdateQuota extends ServiceCommand
{
    /**
     * @var int
     */
    private $serviceUserId;

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
     * @param int $serviceUserId
     * @param int $maxLoanOfficers
     * @param int $maxBranches
     */
    public function __construct(int $serviceUserId, int $maxLoanOfficers, int $maxBranches)
    {
        $this->serviceUserId   = $serviceUserId;
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
        return QuotaUpdated::class;
    }

    /**
     * The payload of the command
     *
     * @return array
     */
    public function payload(): array
    {
        return [
            'serviceUserId'   => $this->serviceUserId,
            'maxLoanOfficers' => $this->maxLoanOfficers,
            'maxBranches'     => $this->maxBranches,
        ];
    }
}