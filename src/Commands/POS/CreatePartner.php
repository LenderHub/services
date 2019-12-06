<?php

namespace LHP\Services\Commands\POS;

use LHP\Services\Commands\ServiceCommand;
use LHP\Services\Events\POS\PartnerCreated;

class CreatePartner extends ServiceCommand
{
    private $ssoUserId;
    private $ssoParentUserId;

    public function __construct(int $ssoUserId, int $ssoParentUserId)
    {
        $this->ssoUserId = $ssoUserId;
        $this->ssoParentUserId = $ssoParentUserId;
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
        ];
    }
}