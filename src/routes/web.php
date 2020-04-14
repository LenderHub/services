<?php

Route::namespace('LHP\Services\Http\Controllers')->group(function () {
    Route::get('api/lenderhub/services/tokens', 'TokenController');
});
