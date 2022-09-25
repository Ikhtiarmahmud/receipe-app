<?php

namespace App\Services;

use App\Interfaces\ApiBaseServiceInterface;
use Illuminate\Http\JsonResponse;

class ApiBaseService implements ApiBaseServiceInterface
{
    /**
     * @param $result
     * @param $message
     * @param array $pagination
     * @param int $http_status
     * @param int $status_code
     * @return JsonResponse
     */

    public function sendSuccessResponse($result, $message, array $pagination = [], int $http_status = 200, int $status_code = 200): JsonResponse
    {
        $response = [
            'status' => 'SUCCESS',
            'status_code' => $status_code,
            'message' => $message,
            'data' => $result
        ];

        if (!empty($pagination)) {
            $response ['pagination'] = $pagination;
        }

        return response()->json($response, $http_status);
    }

    /**
     * @param $message
     * @param array $errorMessages
     * @param int $status_code
     * @return JsonResponse
     */
    public function sendErrorResponse($message, array $errorMessages = [], int $status_code = 422): JsonResponse
    {
        $response = [
            'status' => 'FAIL',
            'status_code' => $status_code,
            'message' => $message,
        ];

        if (!empty($errorMessages)) {
            $response['error'] = $errorMessages;
        }

        return response()->json($response, $status_code);
    }
}
