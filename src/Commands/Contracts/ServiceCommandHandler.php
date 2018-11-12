<?php

namespace LHP\Services\Commands\Contracts;

interface ServiceCommandHandler
{
    /**
     * @param $serializedCommand
     *
     * @return mixed
     */
    public function handle($serializedCommand);
}
