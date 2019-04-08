<?php

namespace LHP\Services\Commands;

use LHP\Services\Commands\Contracts\ServiceCommandHandler as ServiceCommandHandlerInterface;
use LHP\Services\Exceptions\Commands\InvalidHandlerEventException;
use LHP\Services\Exceptions\Commands\MissingHandlerException;


class ServiceCommandHandler implements ServiceCommandHandlerInterface
{
    /**
     * A mapping of ServiceCommand::class => ServiceEvent::class
     *
     * @var array $commandHandlerMapping
     */
    private $commandHandlerMapping;

    /**
     * ServiceCommandHandler constructor.
     *
     * @param $commandHandlerMapping
     */
    public function __construct($commandHandlerMapping)
    {
        $this->commandHandlerMapping = $commandHandlerMapping;
    }

    /**
     * @param $serializedCommand
     *
     * @return mixed
     * @throws \Exception
     */
    public function handle($serializedCommand)
    {
        $command = $serializedCommand['command'];
        $expects = $serializedCommand['expects'];
        $payload = $serializedCommand['payload'];

        if (! isset($this->commandHandlerMapping[$command])) {
            throw new MissingHandlerException("Handler for {$command} not found");
        }

        $handlerClass = $this->commandHandlerMapping[$command];

        /**
         * @var \LHP\Services\Commands\Contracts\ExecutesCommand $handler
         */
        $handler = new $handlerClass;

        if ($handler::$emits !== $expects) {
            throw new InvalidHandlerEventException('Invalid event returned from handler');
        }

        return $handler->executeCommand($payload);
    }
}
