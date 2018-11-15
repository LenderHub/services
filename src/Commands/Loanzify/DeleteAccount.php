<?php

namespace LHP\Services\Commands\Loanzify;

use LHP\Services\Commands\ServiceCommand;
use LHP\Services\Events\Loanzify\AccountDeleted;

class DeleteAccount extends ServiceCommand
{
    /**
     * @var int
     */
    private $serviceUserId;

    /**
     * CreateStandardAccount constructor.
     *
     * @param int $serviceUserId
     */
    public function __construct(int $serviceUserId)
    {

        $this->serviceUserId = $serviceUserId;
    }

    /**
     * The event class the command expects to receive on successful execution
     *
     * @return string
     */
    public function expects(): string
    {
        return AccountDeleted::class;
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
        ];
    }
}