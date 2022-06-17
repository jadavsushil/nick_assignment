<?php

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;

if (!function_exists('ApiResponse')) {
    /**
     * @param        $success
     * @param        $message
     * @param array $data
     * @param int $status
     *
     * @return JsonResponse
     */
    function ApiResponse($success, $message, $data = [], int $status = 200): JsonResponse
    {
        return response()->json(['success' => $success, 'message' => $message, 'data' => $data], $status);
    }
}

if (!function_exists('ApiException')) {
    /**
     * @param $e
     *
     * @return JsonResponse
     */
    function ApiException($e): JsonResponse
    {
        Log::debug("\nCode: " . $e->getCode() . "\nLine: " . $e->getLine() . "\nMessage: " . $e->getMessage());
        return ApiResponse(false, 'Something went wrong!.', [], 500);
    }
}

if (!function_exists('getClientIp')) {
    function getClientIp()
    {
        if (isset($_SERVER['HTTP_CLIENT_IP'])) {
            $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
        } else {
            if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
                $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
            } else {
                if (isset($_SERVER['HTTP_X_FORWARDED'])) {
                    $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
                } else {
                    if (isset($_SERVER['HTTP_FORWARDED_FOR'])) {
                        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
                    } else {
                        if (isset($_SERVER['HTTP_FORWARDED'])) {
                            $ipaddress = $_SERVER['HTTP_FORWARDED'];
                        } else {
                            if (isset($_SERVER['REMOTE_ADDR'])) {
                                $ipaddress = $_SERVER['REMOTE_ADDR'];
                            } else {
                                $ipaddress = 'UNKNOWN';
                            }
                        }
                    }
                }
            }
        }
        return $ipaddress;
    }
}
