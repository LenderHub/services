<?php

namespace LHP\Services\Facades;

use Illuminate\Support\Facades\Facade;

class LHP extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return \LHP\Services\LHP::class;
    }
}
