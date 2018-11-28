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
    private $serviceType;

    /**
     * @var int|null
     */
    private $serviceUserId;

    /***
     * AddUserService constructor.
     *
     * @param string   $email
     * @param int      $serviceId
     * @param int      $serviceType
     * @param int|null $serviceUserId
     */
    public function __construct(string $email, int $serviceId, int $serviceType, ?int $serviceUserId = null)
    {
        $this->email         = $email;
        $this->serviceTypeId = $serviceId;
        $this->serviceType   = $serviceType;
        $this->serviceUserId = $serviceUserId;
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
            'email'                => $this->email,
            'service_id'           => $this->serviceId,
            'service_user_type_id' => $this->serviceType,
            'service_user_id'      => $this->serviceUserId,
        ];
    }
}
