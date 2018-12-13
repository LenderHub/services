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
    private $accountId;

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
     * @param int      $accountId
     * @param int|null $loanOfficerId
     * @param int|null $branchId
     */
    public function __construct(string $email, int $accountId, ?int $loanOfficerId = null, ?int $branchId = null)
    {
        $this->email         = $email;
        $this->accountId     = $accountId;
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
     * @return array
     */
    public function payload(): array
    {
        return [
            'email'         => $this->email,
            'accountId'     => $this->accountId,
            'loanOfficerId' => $this->loanOfficerId,
            'branchId'      => $this->branchId,
        ];
    }
}
