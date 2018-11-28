<?php

namespace LHP\Services\Commands\Laravel;

use Illuminate\Console\Command;
use LHP\Services\Commands\ServiceCommandHandler;
use LHP\Services\Commands\SSO\CreateAdminUser;
use LHP\Services\Exceptions\MissingCommandException;

class Run extends Command
{
    /**
     * @var array
     */
    protected $commands = [
        CreateAdminUser::class,
    ];

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'lhp-services:run {service} {command} {--arg=*}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run an SSO command';

    /**
     * Create a new command instance.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $service = $this->argument('service');
        $command = $this->argument('command');
        $args    = $this->argument('arg');

        $class = "\\LHP\\Services\\Commands\\$service\\$command";

        $this->line("Running command $class with args:");
        print_r($args);

        if (! class_exists($class)) {
            throw new MissingCommandException($class);
        }

        $handler = new ServiceCommandHandler(
            config('lhp-services.commands.handlers')
        );

        $command = new $class(...$args);

        $event = $handler->handle($command->toArray());

        print_r($event->toArray());

        $this->line('Complete!');

        return;
    }
}
