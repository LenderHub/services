<?php

Route::post('/api/v1/sso/commands', '\LHP\Services\Http\Controllers\CommandsController@store')
    ->middleware('lhp.services.internal-jwt');
