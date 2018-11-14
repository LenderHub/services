<?php

namespace LHP\Services\Http\Middleware;

use Closure;
use Exception;
use Firebase\JWT\BeforeValidException;
use Firebase\JWT\ExpiredException;
use Firebase\JWT\JWT;
use LHP\Services\Exceptions\Http\InvalidInternalJWTToken;
use LHP\Services\Exceptions\Http\MissingInternalJWTToken;
use UnexpectedValueException;

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

        if (empty($authHeader) || strtolower(substr($authHeader, 0, 7)) != 'bearer ') {
            throw new MissingInternalJWTToken('Missing API key');
        }

        $key   = substr($authHeader, 7);
        $error = null;

        try {
            JWT::$leeway = 480;

            JWT::decode($key, config('lhp-services.sso.secret'), ['HS256']);

            return $next($request);
        } catch (Exception $e) {
            throw new InvalidInternalJWTToken($e->getMessage());
        }
    }
}