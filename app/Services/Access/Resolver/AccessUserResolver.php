<?php

namespace App\Services\Access\Resolver;

use App\Services\Access\UserHasAccessService;
use Coderello\SocialGrant\Resolvers\SocialUserResolverInterface;
use Exception;
use Illuminate\Contracts\Auth\Authenticatable;
use Laravel\Socialite\Facades\Socialite;

class AccessUserResolver implements SocialUserResolverInterface
{

    public function resolveUserByProviderCredentials(string $provider, string $accessToken): ?Authenticatable
    {
        $providerUser = null;

        try {
            $providerUser = Socialite::driver($provider)->userFromToken($accessToken);
        } catch (Exception $exception) {

        }

        if ($providerUser) {
            return UserHasAccessService::findOrCreate($providerUser, $provider);
        }
        return null;
    }
}
