<?php

namespace LHP\Services\Commands\Contracts;

abstract class ExecutesCommand
{
    /**
     * @var \LHP\Services\Events\Contracts\ServiceEvent
     */
    static $emits;

    /**
     * @param $payload
     *
     * @return mixed
     */
    abstract public function executeCommand($payload);
}
