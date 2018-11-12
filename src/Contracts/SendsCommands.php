<?php

namespace LHP\Services\Contracts;

use LHP\Services\Commands\ServiceCommand;

interface SendsCommands
{
    /**
     * @param \LHP\Services\Commands\ServiceCommand $command
     *
     * @return mixed
     */
    public function sendCommand(ServiceCommand $command);
}
