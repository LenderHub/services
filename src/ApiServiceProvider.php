<?php

namespace LHP\Services;

use Firebase\JWT\JWT;
use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;
use Illuminate\Support\ServiceProvider;
use Psr\Http\Message\RequestInterface;

class ApiServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/config/lhp-services.php' => config_path('lhp-services.php'),
        ]);

        $this->loadRoutesFrom(__DIR__.'/routes/api.php');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerSSO();
        $this->registerLHP();
        $this->registerLoanzify();
        $this->registerSmartApp();
    }

    /**
     * @return void
     */
    public function registerSSO()
    {
        $this->app->singleton(SSO::class, function ($app) {
            $token = JWT::encode(
                [
                    'iat'   => time(),
                    'exp'   => time() + 300,
                ],
                //env('SECRET_KEY'),
                config('lhp-services.sso.secret'),
                'HS256'
            );

            $stack = HandlerStack::create();

            $stack->unshift(Middleware::mapRequest(function (RequestInterface $r) use ($token) {
                $uri = $r->getUri();

                return $r
                    ->withUri($uri->withQuery($uri->getQuery()))
                    ->withHeader('Content-Type', 'application/json')
                    ->withHeader('Authorization', "Bearer $token");
            }), 'add_sso_headers');

            return new SSO(
                new Client([
                    'base_uri' => config('lhp-services.sso.base_uri') . '/api/v1/private/',
                    'handler'  => $stack,
                ])
            );
        });
    }

    /**
     * @return void
     */
    public function registerLoanzify()
    {
        $this->app->singleton(Loanzify::class, function ($app) {
            $token = JWT::encode(
                [
                    'iat'   => time(),
                    'exp'   => time() + 300,
                ],
                //env('SECRET_KEY'),
                config('lhp-services.loanzify.secret'),
                'HS256'
            );

            $stack = HandlerStack::create();

            $stack->unshift(Middleware::mapRequest(function (RequestInterface $r) use ($token) {
                $uri = $r->getUri();

                return $r
                    ->withUri($uri->withQuery($uri->getQuery()))
                    ->withHeader('Content-Type', 'application/json')
                    ->withHeader('Authorization', "Bearer $token");
            }), 'add_loanzify_headers');

            return new SSO(
                new Client([
                    'base_uri' => config('lhp-services.loanzify.base_uri'),
                    'handler'  => $stack,
                ])
            );
        });
    }

    /**
     * @return void
     */
    public function registerLoanzifyV3()
    {
        $this->app->singleton(LoanzifyV3::class, function ($app) {
            $token = JWT::encode(
                [
                    'iat'   => time(),
                    'exp'   => time() + 300,
                ],
                //env('SECRET_KEY'),
                config('lhp-services.loanzifyV3.secret'),
                'HS256'
            );

            $stack = HandlerStack::create();

            $stack->unshift(Middleware::mapRequest(function (RequestInterface $r) use ($token) {
                $uri = $r->getUri();

                return $r
                    ->withUri($uri->withQuery($uri->getQuery()))
                    ->withHeader('Content-Type', 'application/json')
                    ->withHeader('Authorization', "Bearer $token");
            }), 'add_loanzify_headers');

            return new SSO(
                new Client([
                    'base_uri' => config('lhp-services.loanzifyV3.base_uri'),
                    'handler'  => $stack,
                ])
            );
        });
    }

    /**
     * @return void
     */
    public function registerLHP()
    {
        $this->app->singleton(LHP::class, function ($app) {
            $token = JWT::encode(
                [
                    'iat'   => time(),
                    'exp'   => time() + 300,
                ],
                //env('SECRET_KEY'),
                config('lhp-services.lhp.secret'),
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

            return new SSO(
                new Client([
                    'base_uri' => config('lhp-services.lhp.base_uri'),
                    'handler'  => $stack,
                ])
            );
        });
    }

    /**
     * @return void
     */
    public function registerSmartApp()
    {
        $this->app->singleton(SmartApp::class, function ($app) {
            $token = JWT::encode(
                [
                    'iat'   => time(),
                    'exp'   => time() + 300,
                ],
                //env('SECRET_KEY'),
                config('lhp-services.smartapp.secret'),
                'HS256'
            );

            $stack = HandlerStack::create();

            $stack->unshift(Middleware::mapRequest(function (RequestInterface $r) use ($token) {
                $uri = $r->getUri();

                return $r
                    ->withUri($uri->withQuery($uri->getQuery()))
                    ->withHeader('Content-Type', 'application/json')
                    ->withHeader('Authorization', "Bearer $token");
            }), 'add_smartapp_headers');

            return new SSO(
                new Client([
                    'base_uri' => config('lhp-services.smartapp.base_uri'),
                    'handler'  => $stack,
                ])
            );
        });
    }

    /**
     * @return array
     */
    public function provides()
    {
        return [
            SSO::class,
            LHP::class,
            Loanzify::class,
            SmartApp::class,
            LoanzifyV3::class,
        ];
    }
}
