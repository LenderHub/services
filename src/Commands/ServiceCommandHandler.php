<?php

namespace LHP\Services\Commands;

class ServiceCommandHandler implements \LHP\Services\Contracts\ServiceCommandHandler
{
    /**
     * A mapping of ServiceCommand::class => ServiceEvent::class
     * @var array $commandHandlerMapping
     */
    private $commandHandlerMapping;

    public function __construct($commandHandlerMapping)
    {
        $this->commandHandlerMapping = $commandHandlerMapping;
    }

    public function handle($serializedCommand)
    {
        $command = $serializedCommand['command'];
        $expects = $serializedCommand['expects'];
        $payload = $serializedCommand['payload'];

        if (! isset($this->commandHandlerMapping[$command])) {
            throw new \Exception("Handler for {$command} not found");
        }
        $handlerClass = $this->commandHandlerMapping[$command];

        /**
         * @var \LHP\Services\Commands\Contracts\ExecutesCommand $handler
         */
        $handler = new $handlerClass;

        if ($handler::$emits !== $expects) {
            // TODO: Make custom exception
            throw new \Exception('Invalid event returned from handler');
        }

        return $handler->executeCommand($payload);
    }
}