<?php

namespace App\Controllers;

use App\Models\Genre;
use App\Services\RedisService;

class GenreController extends AbstractApi
{
    const GENRES_KEY = 'genres';

    public static function genres(): mixed
    {
        $genres = RedisService::get(self::GENRES_KEY);

        if ($genres) {
            self::apiResponse($genres);
        }

        $genres = Genre::all();

        RedisService::set(self::GENRES_KEY, $genres);

        return self::apiResponse($genres);
    }
}
