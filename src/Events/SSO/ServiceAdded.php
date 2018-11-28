<?php

namespace LHP\Services\Events\SSO;

use LHP\Services\Events\Contracts\ServiceEvent;

class ServiceAdded implements ServiceEvent
{
    /**
     * @var int
     */
    private $parentUserId;

    /**
     * @var int
     */
    private $userId;

    /**
     * @var int
     */
    private $serviceUserId;

    /**
     * UserCreated constructor.
     *
     * @param int $id
     */
    public function __construct(int $parentUserId, int $userId, int $serviceUserId)
    {
        $this->parentUserId  = $parentUserId;
        $this->userId        = $userId;
        $this->serviceUserId = $serviceUserId;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'parent_user_id'  => $this->parentUserId,
            'user_id'         => $this->userId,
            'service_user_id' => $this->serviceUserId,
        ];
    }
}
