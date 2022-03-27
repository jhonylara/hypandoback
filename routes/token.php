<?php

use App\Enums\ProviderEnum;
use App\Http\Controllers\Auth\AuthenticateToken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post('/google', function(Request $request) {
    return AuthenticateToken::byProvider($request, ProviderEnum::GOOGLE);
});


