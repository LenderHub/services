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
     * @var string
     */
    private $email;

    /**
     * CreatePartner constructor.
     * @param int $ssoUserId
     * @param int $ssoParentUserId
     * @param string $email
     * @param string $firstName
     * @param string $lastName
     */
    public function __construct(int $ssoUserId, int $ssoParentUserId, string $email, string $firstName, string $lastName)
    {
        $this->ssoUserId = $ssoUserId;
        $this->ssoParentUserId = $ssoParentUserId;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
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
            'email' => $this->email,
            'firstName' => $this->firstName,
            'lastName' => $this->lastName,
        ];
    }
}