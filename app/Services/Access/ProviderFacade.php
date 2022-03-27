<?php

namespace App\Services\Access;

use App\Enums\ProviderEnum;
use App\Models\User;
use App\Services\Access\Providers\Configs\GoogleProviderConfig;
use App\Services\Access\Providers\Configs\LocalProviderConfig;
use App\Services\Access\Providers\ProviderService;
use Exception;
use Symfony\Component\HttpFoundation\RedirectResponse;

class ProviderFacade
{
    /**
     * @throws Exception
     */
    public static function authenticate($request, $providerName)
    {
        $providerService = new ProviderService($providerName);
        $provider = $providerService->getProvider();

        switch ($providerName) {
            case ProviderEnum::GOOGLE:
                GoogleProviderConfig::default($request, $provider);
                break;
//            case ProviderEnum::LOCAL:
//                LocalProviderConfig::default($request, $provider);
//                break;
            default:
                throw new Exception('Provider invalido');
        }

        $userInfo = self::userInfoOnProvider($providerService);
        $access = null;

        if ($userInfo->user) {
            $access = self::validateAccess($userInfo, $providerName);
        }

        if ($access instanceof User && $access->email) {
            return $userInfo->accessTokenResponseBody;
        }

        throw new Exception('Nao foi possivel logar');

    }

    private static function userInfoOnProvider(ProviderService $providerService): \Laravel\Socialite\Contracts\User
    {
        return $providerService->findUserInfoOnProvider();
    }

    private static function validateAccess($userInfo, $providerName): User
    {
        return UserHasAccessService::findOrCreate($userInfo, $providerName);
    }
}
