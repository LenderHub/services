<?php

namespace LHP\Services\Events\SSO;

use LHP\Services\Events\Contracts\ServiceEvent;

class UserCreated implements ServiceEvent
{
    /**
     * @var int
     */
    private $id;

    /**
     * UserCreated constructor.
     *
     * @param int $id
     */
    public function __construct(int $id)
    {
        $this->id = $id;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'id' => $this->id,
        ];
    }
}
