<?php

namespace LHP\Services\Events\Contracts;

interface ServiceEvent
{
    /**
     * @return array
     */
    public function toArray(): array;
}
