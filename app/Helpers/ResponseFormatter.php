<?php

namespace App\Helpers;

/**
 * Format response.
 */
class ResponseFormatter
{
    /**
     * API Response
     *
     * @var array
     */
    protected static $response = [
        'metadata' => [
            'code' => 200,
            'message' => null,
        ],
        'response' => null,
    ];

    /**
     * Give success response.
     */
    public static function success($data = null, $message = null, $code = 200)
    {
        self::$response['metadata']['code'] = $code;
        self::$response['metadata']['message'] = $message;
        self::$response['response'] = $data;

        return response()->json(self::$response, self::$response['metadata']['code']);
    }

    /**
     * Give error response.
     */
    public static function error($data = null, $message = null, $code = 400)
    {
        self::$response['metadata']['code'] = $code;
        self::$response['metadata']['message'] = $message;
        self::$response['response'] = $data;

        return response()->json(self::$response, self::$response['metadata']['code']);
    }
}
