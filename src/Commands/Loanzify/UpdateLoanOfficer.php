<?php

namespace LHP\Services\Commands\Loanzify;

use LHP\Services\Commands\ServiceCommand;
use LHP\Services\Events\Loanzify\LoanOfficerUpdated;

class UpdateLoanOfficer extends ServiceCommand
{
    /**
     * @var array
     */
    private $userId;

    /**
     * @var int
     */
    private $serviceUserId;

    /**
     * UpdateAccount constructor.
     *
     * @param int $serviceUserId
     */
    public function __construct(int $userId, int $serviceUserId)
    {
        $this->serviceUserId    = $serviceUserId;
        $this->userId = $userId;
    }

    /**
     * The event class the command expects to receive on successful execution
     *
     * @return string
     */
    public function expects(): string
    {
        return LoanOfficerUpdated::class;
    }

    /**
     * The payload of the command
     *
     * @return array
     */
    public function payload(): array
    {
        return [
            'serviceUserId' => $this->serviceUserId,
            'userId' => $this->userId,
        ];
    }
}