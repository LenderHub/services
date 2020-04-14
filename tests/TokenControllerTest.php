<?php

namespace LHP\Services\Tests;

use Orchestra\Testbench\TestCase;

class TokenControllerTest extends TestCase
{
    /**
     * Test that the controlled generates tokens.
     *
     * @return void
     */
    public function testInvoke()
    {
        $keys = [
            'sso',
            'lhp',
            'loanzify',
            'loanzifyV3',
            'smartapp',
        ];

        $this->getJson('api/lenderhub/services/tokens')
            ->assertOk()
            ->assertJsonStructure($keys);
    }

    /**
     * Get package providers.
     *
     * @param  \Illuminate\Foundation\Application  $app
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return ['LHP\Services\ApiServiceProvider'];
    }
}
