<?php

namespace LHP\Services;

use LHP\Services\Commands\ServiceCommand;

class LHP extends AbstractApi
{
    /**
     * @param \LHP\Services\Commands\ServiceCommand $command
     *
     * @return mixed
     * @throws \Exception
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function sendCommand(ServiceCommand $command)
    {
        // Add trailing slash because of .htaccess sadness
        return $this->post('commands/', $command->toArray());
    }
}
