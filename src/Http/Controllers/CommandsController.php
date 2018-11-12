<?php

namespace LHP\Services\Http\Controllers;

use LHP\Services\Commands\ServiceCommandHandler;
use LHP\Services\Http\Requests\Commands\StoreRequest;

class CommandsController extends Controller
{
    /**
     * @param \LHP\Services\Http\Requests\Commands\StoreRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreRequest $request)
    {
        $handler = new ServiceCommandHandler(
            config('lhp-services.commands.handlers')
        );

        $event = $handler->handle(
            $request->only('command', 'expects', 'payload')
        );

        return response()->json($event->toArray(), 201);
    }
}
