<?php

namespace LHP\Services\Events\Loanzify;

class AccountDeleted
{
    /**
     * @var
     */
    private $serviceUserId;

    /**
     * StandardAccountCreated constructor.
     *
     * @param $serviceUserId
     */
    public function __construct($serviceUserId)
    {
        $this->serviceUserId = $serviceUserId;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'serviceUserId' => $this->serviceUserId,
        ];
    }
}