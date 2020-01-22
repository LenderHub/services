<?php

namespace LHP\Services\Commands\POS;

use LHP\Services\Commands\ServiceCommand;
use LHP\Services\Events\POS\StaffCreated;

class CreateStaff extends ServiceCommand
{
    private $ssoUserId;
    private $ssoParentUserId;
    private $ssoBranchId;
    /**
     * @var string
     */
    private $firstName;
    /**
     * @var string
     */
    private $lastName;
    /**
     * @var string
     */
    private $email;

    /**
     * CreateStaff constructor.
     * @param int $ssoUserId
     * @param int $ssoParentUserId
     * @param int|null $ssoBranchId
     * @param string $email
     * @param string $firstName
     * @param string $lastName
     */
    public function __construct(int $ssoUserId, int $ssoParentUserId, ?int $ssoBranchId, string $email, string $firstName, string $lastName)
    {
        $this->ssoUserId = $ssoUserId;
        $this->ssoParentUserId = $ssoParentUserId;
        $this->ssoBranchId = $ssoBranchId;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
    }

    public function expects(): string
    {
        return StaffCreated::class;
    }

    public function payload(): array
    {
        return [
            'ssoUserId' => $this->ssoUserId,
            'ssoParentUserId' => $this->ssoParentUserId,
            'ssoBranchId' => $this->ssoBranchId,
            'email' => $this->email,
            'firstName' => $this->firstName,
            'lastName' => $this->lastName,
        ];
    }
}