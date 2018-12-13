<?php

namespace LHP\Services\Commands\SSO;

use LHP\Services\Commands\ServiceCommand;
use LHP\Services\Events\SSO\ConsumerRegistered;

class RegisterConsumer extends ServiceCommand
{
    /**
     * @var string
     */
    private $email;

    /**
     * @var int
     */
    private $serviceId;

    /**
     * @var int|null
     */
    private $loanOfficerId;

    /**
     * @var int|null
     */
    private $branchId;

    /**
     * RegisterConsumer constructor.
     *
     * @param string   $email
     * @param int      $serviceId
     * @param int|null $loanOfficerId
     * @param int|null $branchId
     */
    public function __construct(string $email, int $serviceId, ?int $loanOfficerId = null, ?int $branchId = null)
    {
        $this->email         = $email;
        $this->serviceId     = $serviceId;
        $this->loanOfficerId = $loanOfficerId;
        $this->branchId      = $branchId;
    }

    /**
     * @return string
     */
    public function expects(): string
    {
        return ConsumerRegistered::class;
    }

    /**
     * The payload of the command
     *
     * @return array
     */
    public function payload(): array
    {
        return [
            'email'         => $this->email,
            'serviceId'     => $this->serviceId,
            'loanOfficerId' => $this->loanOfficerId,
            'branchId'      => $this->branchId,
        ];
    }
}
