<?php

namespace App\Services\Access\Providers\Configs;

class GoogleProviderConfig
{
    public static function default($request, $provider)
    {
        $request->session()->put('code_verifier', $request->get('code_verifier'));
        $provider->enablePKCE()->stateless();
    }
}
