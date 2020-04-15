<?php

namespace LHP\Services\Http\Controllers;

use Firebase\JWT\JWT;

class TokenController extends Controller
{
    /**
     * Handle the controller action.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke()
    {
        return response()->json([
            'sso' => $this->token('sso'),
            'lhp' => $this->token('lhp'),
            'loanzify' => $this->token('loanzify'),
            'loanzifyV3' => $this->token('loanzifyV3'),
            'smartapp' => $this->token('smartapp'),
        ]);
    }

    /**
     * Generate token for a given service.
     *
     * @param  string  $service
     * @return string
     */
    protected function token(string $service)
    {
        return JWT::encode([
            'iat'   => time(),
            'exp'   => time() + 300,
        ], config('lhp-services.'.$service.'.secret'), 'HS256');
    }
}
