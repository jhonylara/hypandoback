<?php

namespace App\Services;

use Illuminate\Support\Facades\Redis;

class RedisService
{

    /**
     * @param string $key
     * @param mixed $content
     * @return void
     */
    public static function set(string $key, mixed $content)
    {
        $redis = Redis::connection();

        $contentEncoded = json_encode($content);

        $redis->set($key, $contentEncoded);
    }

    /**
     * @param string $key
     * @return mixed
     */
    public static function get(string $key): mixed
    {
        $redis = Redis::connection();

        $content = $redis->get($key);

        return json_decode($content);
    }
}
