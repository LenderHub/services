<?php

namespace LHP\Services\Contracts;

use LHP\Services\Commands\Contracts\ServiceCommand;

interface SendsCommands
{
    public function sendCommand(ServiceCommand $command);
}