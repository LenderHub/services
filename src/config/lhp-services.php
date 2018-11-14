<?php

return [
    // Set this value to whatever "secret" is for the service this package is installed on.
    'service_secret' => env('SECRET_KEY'),

    'sso' => [
        'base_uri' => env('API_SSO_BASE_URI'),
        'secret'   => env('SECRET_KEY'),
    ],

    'loanzify' => [
        'base_uri' => env('API_LOANZIFY_BASE_URI'),
        'secret'   => env('SECRET_KEY'),
    ],

    'loanzifyV3' => [
        'base_uri' => env('API_LOANZIFY_V3_BASE_URI'),
        'secret'   => env('SECRET_KEY'),
    ],

    'lhp' => [
        'base_uri' => env('API_LHP_BASE_URI'),
        'secret'   => env('SECRET_KEY'),
    ],

    'smartapp' => [
        'base_uri' => env('API_SMARTAPP_BASE_URI'),
        'secret'   => env('SECRET_KEY'),
    ],

    'commands' => [
        'handlers' => [
            // ServiceCommand::class => LocalHandler::class
            // \LHP\Services\Commands\Loanzify\CreateStandardAccount::class => \App\CommandHandlers\CreateStandardAccount::class,
        ],
    ],
];
