<?php

namespace App\Services;

use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\Response as ResponseCode;

class ApiResponseService
{
    const SUCCESS = true;
    const ERROR = false;

    public static function response($data, $responseCode = ResponseCode::HTTP_OK): Response
    {

        $type = self::SUCCESS;

        if ($responseCode != ResponseCode::HTTP_OK) {
            $type = self::ERROR;
        }

        $resultArray = ['success' => $type, 'data' => $data];

        return response($resultArray, $responseCode);
    }

    public static function serverError($message): Response
    {
        return self::response($message, ResponseCode::HTTP_INTERNAL_SERVER_ERROR);
    }

    public static function userError($message): Response
    {
        return self::response($message, ResponseCode::HTTP_BAD_REQUEST);
    }
}
