<?php

namespace App\Http\Controllers\Auth;

use App\Services\Access\ProviderFacade;

class AuthenticateToken
{
    /**
     * @throws \Exception
     */
    public static function byProvider($request, $providerName)
    {
        return ProviderFacade::authenticate($request, $providerName);
    }
}
