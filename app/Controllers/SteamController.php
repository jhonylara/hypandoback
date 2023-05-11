<?php

namespace App\Controllers;

use App\Api\AbstractApi;
use App\Services\RedisService;
use App\Services\SteamService;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SteamController extends AbstractApi
{
    const ALL_STEAM_GAMES_LIST = 'steamAllGamesList';

    /**
     * @throws GuzzleException
     */
    public static function allGamesList(): Response
    {
        $gameList = RedisService::get(self::ALL_STEAM_GAMES_LIST);

        if ($gameList) {
            return self::apiResponse($gameList);
        }

        $gameList = SteamService::allGamesListRequest();

        RedisService::set(self::ALL_STEAM_GAMES_LIST, $gameList);

        return self::apiResponse($gameList);
    }

    /**
     * @throws GuzzleException
     */
    public static function storeGameDetails(Request $request): Response
    {
        $storeGameDetailsEncoded = SteamService::storeGameDetailsRequest($request->gameId);

        $storeGameDetails = json_decode($storeGameDetailsEncoded, true);
        $onlyGameInfo = array_shift($storeGameDetails);

        return self::apiResponse($onlyGameInfo);
    }
}
