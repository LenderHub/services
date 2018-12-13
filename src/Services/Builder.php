<?php

namespace LHP\Services;

use Firebase\JWT\JWT;
use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;
use LHP\Services\Contracts\ApiInterface;
use LHP\Services\Exceptions\InvalidServiceException;
use Psr\Http\Message\RequestInterface;

class Builder
{
    /**
     * @param string $name
     * @param string $uri
     * @param string $secret
     *
     * @return \LHP\Services\Contracts\ApiInterface
     * @throws \LHP\Services\Exceptions\InvalidServiceException
     */
    public static function service(string $name, string $uri, string $secret): ApiInterface
    {
        switch ($name) {
            case 'lhp':
                return self::buildService(LHP::class, $uri, $secret);
                break;
            case 'sso':
                return self::buildService(SSO::class, $uri, $secret);
                break;
            case 'smartapp':
                return self::buildService(SmartApp::class, $uri, $secret);
                break;
            case 'loanzify':
                return self::buildService(Loanzify::class, $uri, $secret);
                break;
            case 'loanzifyV3':
                return self::buildService(LoanzifyV3::class, $uri, $secret);
                break;
            default:
                throw new InvalidServiceException($name);
                break;
        }
    }

    /**
     * @param string $class
     * @param string $uri
     * @param string $secret
     *
     * @return \LHP\Services\AbstractApi
     */
    private static function buildService(string $class, string $uri, string $secret): AbstractApi
    {
        $token = JWT::encode(
            [
                'iat'   => time(),
                'exp'   => time() + 300,
            ],
            $secret,
            'HS256'
        );

        $stack = HandlerStack::create();

        $stack->unshift(Middleware::mapRequest(function (RequestInterface $r) use ($token) {
            $uri = $r->getUri();

            return $r
                ->withUri($uri->withQuery($uri->getQuery()))
                ->withHeader('Content-Type', 'application/json')
                ->withHeader('Authorization', "Bearer $token");
        }), 'add_lhp_headers');

        return new $class(
            new Client([
                'base_uri' => $uri,
                'handler'  => $stack,
            ])
        );
    }
}
