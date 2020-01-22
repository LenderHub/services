<?php

namespace LHP\Services\Commands\POS;

use LHP\Services\Commands\ServiceCommand;
use LHP\Services\Events\POS\PartnerCreated;

class CreatePartner extends ServiceCommand
{
    private $ssoUserId;
    private $ssoParentUserId;
    /**
     * @var string
     */
    private $firstName;
    /**
     * @var string
     */
    private $lastName;

    /**
     * CreatePartner constructor.
     * @param int $ssoUserId
     * @param int $ssoParentUserId
     * @param string $firstName
     * @param string $lastName
     */
    public function __construct(int $ssoUserId, int $ssoParentUserId, string $firstName, string $lastName)
    {
        $this->ssoUserId = $ssoUserId;
        $this->ssoParentUserId = $ssoParentUserId;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
    }

    public function expects(): string
    {
        return PartnerCreated::class;
    }

    public function payload(): array
    {
        return [
            'ssoUserId' => $this->ssoUserId,
            'ssoParentUserId' => $this->ssoParentUserId,
            'firstName' => $this->firstName,
            'lastName' => $this->lastName,
        ];
    }
}