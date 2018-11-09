<?php

namespace LHP\Services\Contracts;

use LHP\Services\Commands\Contracts\ServiceCommand;

interface ServiceCommandHandler
{
    public function handle($serializedCommand);
}