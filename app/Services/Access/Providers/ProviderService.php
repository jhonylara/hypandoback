<?php

namespace App\Services\Access\Providers;

use Laravel\Socialite\Contracts\Provider;
use Laravel\Socialite\Two\User ;
use Laravel\Socialite\Facades\Socialite;

class ProviderService
{
    private string $providerName;
    private Provider $provider;

    public function __construct($providerName)
    {
        $this->providerName = $providerName;
        $this->provider = Socialite::driver($this->providerName);
    }

    public function getProvider(): Provider
    {
        return $this->provider;
    }

    public function getProviderName(): string
    {
        return $this->providerName;
    }

    public function findUserInfoOnProvider(): \Laravel\Socialite\Contracts\User
    {
        return $this->provider->user();
    }
}
