<?php

namespace App\Enums;

class ProviderEnum
{
    const GOOGLE = 'google';
    const GOOGLE_ID = 1;
    const PROVIDERS = [
        ['name' => self::GOOGLE, 'id' => self::GOOGLE_ID]
    ];

    public static function getId(string $name)
    {
        foreach(self::PROVIDERS as $provider) {
            if ($provider['name'] == $name) {
                return $provider['id'];
            }
        }

        return null;
    }

}
