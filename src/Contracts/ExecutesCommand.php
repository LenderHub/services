<?php

namespace LHP\Services\Commands\Contracts;

abstract class ExecutesCommand
{
    /**
     * @var \LHP\Services\Events\Contracts\ServiceEvent
     */
    static $emits;

    abstract public function executeCommand($payload);
}