<?php

namespace App\Services\Access;
use App\Enums\ProviderEnum;
use App\Models\Access;
use App\Models\User;
use \Laravel\Socialite\Contracts\User as ProviderUser;

class UserHasAccessService
{

    public static function findOrCreate(ProviderUser $user, string $providerName): User
    {

        $linkedAccess = self::findUserAccess($user, $providerName);

        if($linkedAccess){
            return $linkedAccess->user;
        }

         return self::createNew($user, $providerName);
    }

    private static function findUserAccess(ProviderUser $user, string $providerName)
    {
        return Access::where('provider_name', $providerName)
            ->where('provider_id', $user->getId())
            ->first();
    }

    private static function createNew(ProviderUser $user, string $providerName)
    {
        $newUser = User::where('email', $user->getEmail())->first();

        if(!$newUser) {
            $newUser = User::create([
                'name' => $user->getName(),
                'email' => $user->getEmail()
            ]);
        }

        $newUser->access()->create([
            'provider_id' => ProviderEnum::getId($providerName),
            'provider_name' => $providerName,
            'isLoginAccess' => true,
        ]);

        return $newUser;
    }
}
