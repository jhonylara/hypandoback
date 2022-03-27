<?php

namespace App\Services;

use Defuse\Crypto\Key;
use League\OAuth2\Server\Entities\AccessTokenEntityInterface;
use League\OAuth2\Server\Entities\RefreshTokenEntityInterface;
use League\OAuth2\Server\ResponseTypes\ResponseTypeInterface;
use Psr\Http\Message\ResponseInterface;

class Resp implements ResponseTypeInterface
{


    public function setAccessToken(AccessTokenEntityInterface $accessToken)
    {
        // TODO: Implement setAccessToken() method.
    }

    public function setRefreshToken(RefreshTokenEntityInterface $refreshToken)
    {
        // TODO: Implement setRefreshToken() method.
    }

    public function generateHttpResponse(ResponseInterface $response)
    {
        // TODO: Implement generateHttpResponse() method.
    }

    public function setEncryptionKey($key = null)
    {
        // TODO: Implement setEncryptionKey() method.
    }
}
