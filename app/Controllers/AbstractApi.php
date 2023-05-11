<?php

namespace App\Controllers;

use App\Services\ApiResponseService;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\Response as ResponseCode;

abstract class AbstractApi
{
    const SUCCESS = 'success';
    const ERROR = 'error';

    public static function apiResponse($data, $responseCode = ResponseCode::HTTP_OK): Response
    {
        return ApiResponseService::response($data, $responseCode);
    }

    public static function apiError($message): Response
    {
        return self::apiResponse($message, ResponseCode::HTTP_INTERNAL_SERVER_ERROR);
    }

    public static function apiUserError($message): Response
    {
        return self::apiResponse($message, ResponseCode::HTTP_BAD_REQUEST);
    }
}
