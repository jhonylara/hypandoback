<?php

namespace App\Services\Access\Providers\Configs;

use \GuzzleHttp\Client;

class LocalProviderConfig
{
    /**
     * @param $request
     * @param $provider
     * @return void
     */
    public static function default($request, $provider)
    {

        $request->session()->put('code_verifier', $request->get('code_verifier'));
        $client = new Client(['base_uri' => 'http://nginx/']);

        $provider->setHttpClient($client);
        $provider->enablePKCE()->stateless();
    }
}
