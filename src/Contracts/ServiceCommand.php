<?php

namespace LHP\Services\Commands\Contracts;

abstract class ServiceCommand
{
    /**
     * The event class the command expects to receive on successful execution
     * @return string
     */
    abstract public function expects(): string;

    /**
     * The payload of the command
     * @return array
     */
    abstract protected function payload(): array;

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