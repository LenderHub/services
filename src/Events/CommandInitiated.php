<?php

namespace LHP\Services\Events;

use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;

class CommandInitiated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * @var string
     */
    public $command;

    /**
     * @var array
     */
    public $payload;

    /**
     * @var string
     */
    public $expects;

    /**
     * CommandInitiated constructor.
     *
     * @param string $command
     * @param array  $payload
     * @param string $expects
     */
    public function __construct(string $command, array $payload, string $expects)
    {
        $this->command = $command;
        $this->payload = $payload;
        $this->expects = $expects;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
