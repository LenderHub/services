<?php

namespace LHP\Services\Events\SSO;

use LHP\Services\Events\Contracts\ServiceEvent;

class ConsumerRegistered implements ServiceEvent
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var int
     */
    private $serviceId;

    /**
     * @var int|null
     */
    private $smartappUserId;

    /**
     * @var int|null
     */
    private $smartappApplicationId;

    /**
     * ConsumerRegistered constructor.
     *
     * @param int      $id
     * @param int      $serviceId
     * @param int|null $smartappUserId
     * @param int|null $smartappApplicationId
     */
    public function __construct(int $id, int $serviceId, ?int $smartappUserId = null, ?int $smartappApplicationId = null)
    {
        $this->id                    = $id;
        $this->serviceId             = $serviceId;
        $this->smartappUserId        = $smartappUserId;
        $this->smartappApplicationId = $smartappApplicationId;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'id'                      => $this->id, // consumer.id
            'service_id'              => $this->serviceId, // consumer_service.id
            'smartapp_user_id'        => $this->smartappUserId,
            'smartapp_application_id' => $this->smartappApplicationId,
        ];
    }
}
