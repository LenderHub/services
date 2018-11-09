<?php

return [
    'sso' => [
        'base_uri' => env('API_SSO_BASE_URI'),
        'secret'   => env('SECRET_KEY'),
    ],

    'loanzify' => [
        'base_uri' => env('API_LOANZIFY_BASE_URI'),
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
];
