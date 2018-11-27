<?php

Route::get('/api/lenderhub/services/tokens', function () {
    return [
        'sso' => Firebase\JWT\JWT::encode(
            [
                'iat'   => time(),
                'exp'   => time() + 300,
            ],
            //env('SECRET_KEY'),
            config('lhp-services.sso.secret'),
            'HS256'
        ),
        'lhp' => Firebase\JWT\JWT::encode(
            [
                'iat'   => time(),
                'exp'   => time() + 300,
            ],
            //env('SECRET_KEY'),
            config('lhp-services.lhp.secret'),
            'HS256'
        ),
        'loanzify' => Firebase\JWT\JWT::encode(
            [
                'iat'   => time(),
                'exp'   => time() + 300,
            ],
            //env('SECRET_KEY'),
            config('lhp-services.loanzify.secret'),
            'HS256'
        ),
        'loanzifyV3' => Firebase\JWT\JWT::encode(
            [
                'iat'   => time(),
                'exp'   => time() + 300,
            ],
            //env('SECRET_KEY'),
            config('lhp-services.loanzifyV3.secret'),
            'HS256'
        ),
        'smartapp' => Firebase\JWT\JWT::encode(
            [
                'iat'   => time(),
                'exp'   => time() + 300,
            ],
            //env('SECRET_KEY'),
            config('lhp-services.smartapp.secret'),
            'HS256'
        ),
    ];
});
