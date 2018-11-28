<?php

namespace LHP\Services\Commands\SSO;

use LHP\Services\Commands\ServiceCommand;
use LHP\Services\Events\SSO\ServiceAdded;

class AddUserService extends ServiceCommand
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
     * @var int
     */
    private $type;

    /**
     * AddUserService constructor.
     *
     * @param string $email
     * @param int    $serviceId
     * @param int    $type
     */
    public function __construct(string $email, int $serviceId, int $type)
    {
        $this->email         = $email;
        $this->serviceTypeId = $serviceId;
        $this->type          = $type;
    }

    /**
     * The event class the command expects to receive on successful execution
     *
     * @return string
     */
    public function expects(): string
    {
        return ServiceAdded::class;
    }

    /**
     * The payload of the command
     *
     * @return array
     */
    public function payload(): array
    {
        return [
            'email'     => $this->email,
            'serviceId' => $this->serviceId,
        ];
    }
}
