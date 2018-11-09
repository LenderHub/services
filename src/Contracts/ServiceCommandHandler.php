<?php

namespace LHP\Services\Contracts;

interface ServiceCommandHandler
{
    public function handle($serializedCommand);
}