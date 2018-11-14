<?php

namespace LHP\Services\Http\Middleware;

use Closure;
use Exception;
use Firebase\JWT\JWT;
use LHP\Services\Exceptions\Http\InvalidInternalJWTToken;
use LHP\Services\Exceptions\Http\MissingInternalJWTToken;

class CheckInternalJWT
{
    /**
     * Checks for valid JWT API key in Authorization header
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     *
     * @throws \LHP\Services\Exceptions\Http\MissingInternalJWTToken
     * @throws \LHP\Services\Exceptions\Http\InvalidInternalJWTToken
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // check Authorization header for key
        $authHeader = $request->header('Authorization');

        if (1 !== preg_match('/^Bearer\s(.*)/i', $authHeader, $authToken)) {
            throw new MissingInternalJWTToken('Missing API key');
        }

        try {
            JWT::$leeway = 480;

            JWT::decode($authToken[1], config('lhp-services.service_secret'), ['HS256']);

            return $next($request);
        } catch (Exception $e) {
            throw new InvalidInternalJWTToken($e->getMessage());
        }
    }
}