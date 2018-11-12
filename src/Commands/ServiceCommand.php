<?php

namespace LHP\Services\Commands;

use Illuminate\Contracts\Support\Arrayable;

abstract class ServiceCommand implements Arrayable
{
    /**
     * The event class the command expects to receive on successful execution
     *
     * @return string
     */
    abstract public function expects(): string;

    /**
     * The payload of the command
     *
     * @return array
     */
    abstract public function payload(): array;

    /**
     * Serialize the command for use in HTTP requests
     * @return array
     * @throws \Exception
     */
    public function toArray()
    {
        return [
            'command' => self::class,
            'expects' => $this->expects(),
            'payload' => $this->payload(),
        ];
    }
}
