<?php

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;

if (!function_exists('returnJson')) {
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

if (!function_exists('returnException')) {
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
