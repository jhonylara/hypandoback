<?php

namespace App\Services;

use GuzzleHttp\Client;

class SteamService
{

    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function allGamesListRequest(): string
    {

        $client = new Client();

        $response = $client->request('GET', 'https://api.steampowered.com/ISteamApps/GetAppList/v2/');

        return $response->getBody()->getContents();

    }


    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function storeGameDetailsRequest(int $gameId): string
    {
        $client = new Client();
        $params = ['query' => ['appids' => $gameId]];

        $response = $client->request('GET', 'https://store.steampowered.com/api/appdetails', $params);
        return $response->getBody()->getContents();
    }
}
