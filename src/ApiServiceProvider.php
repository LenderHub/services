<?php

namespace LHP\Services;

use Illuminate\Support\ServiceProvider;

class ApiServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot(\Illuminate\Routing\Router $router)
    {
        $this->publishes([
            __DIR__.'/config/lhp-services.php' => config_path('lhp-services.php'),
        ]);

        $this->loadRoutesFrom(__DIR__.'/routes/api.php');
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');

        $router->aliasMiddleware('lhp.services.internal-jwt', \LHP\Services\Http\Middleware\CheckInternalJWT::class);

        if ($this->app->runningInConsole()) {
            // Laravel commands are located in src/Commands/Laravel
            $this->commands([
                //FooCommand::class,
            ]);
        }
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
        $this->registerLoanzifyV3();
    }

    /**
     * @return void
     */
    public function registerSSO()
    {
        $this->app->singleton(SSO::class, function ($app) {
            return Builder::service(
                'sso',
                config('lhp-services.sso.base_uri'),
                config('lhp-services.sso.secret')
            );
        });
    }

    /**
     * @return void
     */
    public function registerLoanzify()
    {
        $this->app->singleton(Loanzify::class, function ($app) {
            return Builder::service(
                'loanzify',
                config('lhp-services.loanzify.base_uri'),
                config('lhp-services.loanzify.secret')
            );
        });
    }

    /**
     * @return void
     */
    public function registerLoanzifyV3()
    {
        $this->app->singleton(LoanzifyV3::class, function ($app) {
            return Builder::service(
                'loanzifyV3',
                config('lhp-services.loanzifyV3.base_uri'),
                config('lhp-services.loanzifyV3.secret')
            );
        });
    }

    /**
     * @return void
     */
    public function registerLHP()
    {
        $this->app->singleton(LHP::class, function ($app) {
            return Builder::service(
                'lhp',
                config('lhp-services.lhp.base_uri'),
                config('lhp-services.lhp.secret')
            );
        });
    }

    /**
     * @return void
     */
    public function registerSmartApp()
    {
        $this->app->singleton(SmartApp::class, function ($app) {
            return Builder::service(
                'smartapp',
                config('lhp-services.smartapp.base_uri'),
                config('lhp-services.smartapp.secret')
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
